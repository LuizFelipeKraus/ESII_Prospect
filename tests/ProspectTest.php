<?php
namespace tests;

require_once('../uteis/vendor/autoload.php');
require_once('../models/Prospect.php');
require_once('../DAO/DAOProspect.php');

use PHPUnit\Framework\TestCase;
use models\Prospect;
use dao\DAOProspect;

class ProspectTest extends TestCase{

   /** @test */
   public function testIncluirProspect(){
      $daoProspect = new DAOProspect();
      try{
         $this->assertEquals(
            TRUE,
            $daoProspect->incluirProspect("senhor", "oi@gmail.com","(49)98855-1122", "facebook/senhor", "(49)98855-1122")
         );
         unset($daoProspect);
      }catch(\Exception $e){
         $this->fail($e->getMessage());
      }
   }

   /** @test */
    public function testExcluirProspect(){
         $daoProspect = new DAOProspect();
         try{
            $this->assertEquals(
               TRUE,
               $daoProspect->excluirProspect('44')
            );
         unset($daoProspect);
         } 
         catch(\Exception $e){
            $this->fail($e->getMessage());
        }
    }
    
    /* @test */
   public function testAtualizarProspect(){
      $daoProspect = new DAOProspect();
      try{   
         $this->assertEquals(
         TRUE,      
            $daoProspect->atualizarProspect("Felipe", "email@gmail.com","(49)98855-1122", "facebook/felipe", "(49)98855-1122", "42")
           
         );
         
         unset($daoProspect);
      }catch(\Exception $e){
         $this->fail($e->getMessage());
      }
   }
   /* @test */
   public function testBuscarProspect(){
      $daoProspect = new DAOProspect();
      try{
         $daoProspect->buscarProspects("email@gmail.com");
         unset($daoProspect);
         
      }catch(\Exception $e){
         $this->fail($e->getMessage());
      }
   }
}
?>