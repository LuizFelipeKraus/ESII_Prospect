<?php
namespace controllers;

$separador = DIRECTORY_SEPARATOR;
$root = $_SERVER['DOCUMENT_ROOT'];

require_once($root.'/esii-prospect/DAO/DAOProspect.php');

use DAO\DAOProspect;
use models\Prospect;

/**
 * Essa classe trata as regras da classe
 * Prospect.
 * Seu escopo limita-se às funções da entidade Prospect
 * 
 * @author Luiz Felipe Kraus
 * 
 */
class ControllerProspect{

    /**
     * Recebe um Cadastro de Propsect, faz os  tratamentos e envia para o DAO executar
     * no banco de dados
     * @param string $nome Nome do Prospect
     * @param string $email Email do Prospect
     * @param string $celular Celular do Prospect
     * @param string $facebook Facebook do Prospect
     * @param string $whatsapp Whatsapp do Prospect
     * @return TRUE|Exception Retorna TRUE caso a inclusão tenha sido bem sucedida
     * ou uma Exception caso não tenha.
     */
    public function salvarProspect($prospect) {
              
        $daoProspect = new DAOProspect();
  
        if($prospect->codigo === null) {
           
           try {
              $daoProspect->incluirProspect($prospect->nome, $prospect->email, $prospect->celular, $prospect->facebook,
                                         $prospect->whatsapp);
              return TRUE;
  
           }catch(\Exception $e) {
              throw new \Exception($e->getMessage());
           }
  
        } else {            
            try {
              $daoProspect->atualizarProspect(
                 $prospect->nome,
                 $prospect->email,
                 $prospect->celular,
                 $prospect->facebook,
                 $prospect->whatsapp,
                 $prospect->codigo
              );
  
              unset($daoProspect);
              return TRUE;
  
           } catch (\Exception $ex) {
              throw new \Exception($ex->getMessage());
           }
        }
     }
     /**
      * Recebe um objeto do tipo Prospect e envia para a DAO concluir a exclusão
      *
      * @param Prospect $prospect Objeto Prospect informando o código do prospect a ser excluído
      * @return TRUE|Exception Retorna TRUE caso a inclusão tenha sido bem sucedida
      * ou uma Exception caso não tenha.
      */
     public function excluirProspect($prospect){
         $daoProspect = new DAOProspect();
        try{
           $daoProspect->excluirProspect($prospect->codigo);
           unset($daoProspect);
           return TRUE;
  
        }catch(\Exception $e){
           throw new \Exception($e->getMessage());
        }
     }
    /**
      * Recebe um objeto do tipo Prospect Email e envia para a DAO concluir a exclusão
      *
      * @param Prospect $prospect Objeto Prospect informando o código do prospect a ser excluído
      * @return array[Prospect] Retorna array de Prospect.
      */ 
     public function buscarProspects($email=null){
       $daoProspect = new DAOProspect();
       $prospects = array();
       
       if($email === null){
          $prospects = $daoProspect->buscarProspects();
          return $prospects;
       }else{
          $prospects = $daoProspect->buscarProspects($email);
          return $prospects;
       }
     }
}

 ?>