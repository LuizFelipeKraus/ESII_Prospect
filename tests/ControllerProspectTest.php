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
    public function testIncluirProspect(){
        $ctrlUsuario = new ControllerProspect();  
        try{
           $this->assertEquals(
              TRUE,
              $ctrlUsuario->adiacionar("leonir de Melo", "leonir@gmail.com","(49)96632-7854", "leonir@facebook", "leonir@whatsapp")
           );
        }catch(\Exception $e){
           $this->fail($e->getMessage());
        }
     }

     /** @test */
    public function testAlterarProspect(){
        $ctrlUsuario = new ControllerProspect();  
        try{
           $this->assertEquals(
              TRUE,
              $ctrlUsuario->alterar("leonir de Melo Rosa", "Funciona@gmail.com","(49)96632-7854", "Por@facebook", "Favor@whatsapp", 2)
           );
        }catch(\Exception $e){
           $this->fail($e->getMessage());
        }
     }
      /** @test */
    public function testExcluirProspect(){
        $ctrlUsuario = new ControllerProspect();  
        try{
           $this->assertEquals(
              TRUE,
              $ctrlUsuario->excluir(2)
           );
        }catch(\Exception $e){
           $this->fail($e->getMessage());
        }
     }

}
?>