<?php

   namespace test;
   require_once('../uteis/vendor/autoload.php');
   require_once('../models/Prospect.php');
   require_once('../controllers/Prospect/ControllerProspect.php');
   use PHPUnit\Framework\TestCase;
   use models\Prospect;
   use controllers\ControllerProspect;

   class ControllerProspectTest extends TestCase{

      /** @test */
      public function incluirProspectTest(){
         $cProspect = new ControllerProspect();
         $prospect = new Prospect();

         $prospect->addProspect(null, 'Ivanor Thibes', 'thi@iva.com.br', '9999999', '', '8888888');
         try{
            $this->assertEquals(
               TRUE,
               $cProspect->salvarProspect($prospect)
            );
         }catch(\Exception $e){
            $this->fail($e->getMessage());
         }
      }
      /** @test */
      public function alterarProspect(){
         $cProspect = new ControllerProspect();
         $prospect = new Prospect();

         $prospect->addProspect(19, 'Ivanor Thibes', 'thi@iva.com.br', '9999999', '', '777777');
         try{
            $this->assertEquals(
               TRUE,
               $cProspect->salvarProspect($prospect)
            );
         }catch(\Exception $e){
            $this->fail($e->getMessage());

         }
      }
      /** @test */
      public function excluirProspect(){
         $cProspect = new ControllerProspect();
         $prospect = new Prospect();

         $prospect->addProspect(19, 'Ivanor Thibes', 'thi@iva.com.br', '9999999', '', '777777');
         try{
            $this->assertEquals(
               TRUE,
               $cProspect->excluirProspect($prospect)
            );
         }catch(\Exception $e){
            $this->fail($e->getMessage());

         }
      }
      /** @test */
      public function buscarProspectPorEmail(){
         $cProspect = new ControllerProspect();
         $email = 'paulo@eu.com.br';
         $arrayComparar = array();

         $conn = new \mysqli('localhost', 'root', '', 'bd_prospects');
         $sqlBusca = $conn->prepare("select cod_prospect, nome, email, celular,
                                             facebook, whatsapp
                                             from prospect
                                             where
                                             email = '$email'");
         $sqlBusca->execute();
         $result = $sqlBusca->get_result();
         if($result->num_rows !== 0){
            while($linha = $result->fetch_assoc()) {
               $linhaComparar = new Prospect();
               $linhaComparar->addProspect($linha['cod_prospect'], $linha['nome'], $linha['email'], $linha['celular'],
                                    $linha['facebook'], $linha['whatsapp']);
               $arrayComparar[] = $linhaComparar;
            }
         }
         $this->assertEquals(
            $arrayComparar,
            $cProspect->buscarProspects($email)
         );
      }
      /** @test */
      public function buscarTodosProspectsTest(){
         $cProspect = new ControllerProspect();
         
         $arrayComparar = array();

         $conn = new \mysqli('localhost', 'root', '', 'bd_prospects');
         $sqlBusca = $conn->prepare("select cod_prospect, nome, email, celular,
                                                facebook, whatsapp
                                                from prospect");
         $sqlBusca->execute();
         $result = $sqlBusca->get_result();
         if($result->num_rows !== 0){
            while($linha = $result->fetch_assoc()) {
               $linhaComparar = new Prospect();
               $linhaComparar->addProspect($linha['cod_prospect'], $linha['nome'], $linha['email'], $linha['celular'],
                                     $linha['facebook'], $linha['whatsapp']);
               $arrayComparar[] = $linhaComparar;
               }
         }
         $this->assertEquals(
         $arrayComparar,
         $cProspect->buscarProspects()
         );
      }
}
?>