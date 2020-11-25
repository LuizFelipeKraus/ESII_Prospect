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
        $ctrlProspect = new ControllerProspect();  
        try{
           $this->assertEquals(
              TRUE,
              $ctrlProspect->adiacionar("leonir de Melo", "leonir@gmail.com","(49)96632-7854", "leonir@facebook", "leonir@whatsapp")
           );
        }catch(\Exception $e){
           $this->fail($e->getMessage());
        }
     }

     /** @test */
    public function testAlterarProspect(){
        $ctrlProspect = new ControllerProspect();  
        try{
           $this->assertEquals(
              TRUE,
              $ctrlProspect->alterar("leonir de Melo Rosa", "Funciona@gmail.com","(49)96632-7854", "Por@facebook", "Favor@whatsapp", 2)
           );
        }catch(\Exception $e){
           $this->fail($e->getMessage());
        }
     }
      /** @test */
    public function testExcluirProspect(){
        $ctrlProspect = new ControllerProspect();  
        try{
           $this->assertEquals(
              TRUE,
              $ctrlProspect->excluir(2)
           );
        }catch(\Exception $e){
           $this->fail($e->getMessage());
        }
     }

}
?>