<?php
namespace controllers;

$separator = DIRECTORY_SEPARATOR;
$root = $_SERVER['DOCUMENT_ROOT'];

require_once($root.'../DAO/DAOProspect.php' );

use DAO\DAOProspect;
    /**
     * Esta classe serve para tratar as regras de negócio pertencentes à
     * Classe Prospect.
     * Seu escopo limita-se às funções da entidade Prospect
     * 
     * @author Luiz Felipe Kraus
     */
    class ControllerProspect{
        /**
         * Recebe o codigo do prospect, faz o devido tratamento e envia para o DAO executar
         * no banco de dados
         * @param int $codPropect codigo do Prospect
         * @return TRUE|EXCEPTION
         */
        public function excluir($codPropect){
            $daoProspect = new DAOProspect();

            try{
                $retorno =  $usuario = $daoProspect->excluirProspect($codPropect);
            }catch(\Exception $e){
                throw new \Exception($e->getMessage());
            }  
            return $retorno ;     
          

        }

        /**
        * Recebe o codigo do prospect e atualiza, faz o devido tratamento e envia para o DAO executar
        * no banco de dados
        * @param string $nome Novo nome para o Prospect
        * @param string $email Novo email para o Prospect
        * @param string $celular Novo celular para o prospect
        * @param string $facebook Novo endereço de facebook para o Prospect
        * @param string $whatsapp Novo número de whatsapp para o Prospect
        * @param string $codProspect Código do Prospect que deve ser alterado
        * @return TRUE|Exception
        */
        public function alterar($nome, $email, $celular, $facebook, $whatsapp, $codProspect){
            $daoProspect = new DAOProspect();
            try{
                $retorno = $usuario = $daoProspect->atualizarProspect($nome, $email, $celular, $facebook, $whatsapp, $codProspect);
            }catch(\Exception $e){
                throw new \Exception($e->getMessage());
            }   
            return  $retorno;
        }
            /**
        * Recebe um prospect, faz o devido tratamento e envia para o DAO executar
        * no banco de dados
        * @param string $nome Nome do novo prospect
        * @param string $email Email do novo prospect
        * @param string $celular Celular do novo prospect
        * @param string $facebook Endereço do facebook do novo prospect
        * @param string $whatsapp Número do whatsapp do novo prospect
        * @return TRUE|Exception
        */
        public function adiacionar($nome, $email, $celular, $facebook, $whatsapp){
            $daoProspect = new DAOProspect();
            try{
                $retorno = $usuario = $daoProspect->incluirProspect($nome, $email, $celular, $facebook, $whatsapp);
            }catch(\Exception $e){
                throw new \Exception($e->getMessage());
            }   
            return  $retorno;
        }

        /**  public function buscar($email){
        *    $daoProspect = new DAOProspect();
        * }
        */

    }    
?>