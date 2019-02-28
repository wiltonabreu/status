<?php 

namespace Classes\Model;

use \Classes\DB\Sql;
use \Classes\Model;

	class Incidentes extends Model{


        public function getIncident($id){
			$sql = new Sql();

			$result = $sql->select("SELECT * from tb_status where id=:id", array(
				":id" => $id
			));

            $this->setData($result[0]);
            
            for ($i=0; $i < count($result) ; $i++) { 

                $result[$i]['dt_criacao'] = date("d-m-Y", strtotime($result[$i]['dt_criacao']) );    
                
            }

            return $result;
        }
        
        public function getcommunicated($id){
            $sql = new Sql();
            

			$result = $sql->select("SELECT * from tb_comunicados where id=:id", array(
				":id" => $id
			));

            $this->setData($result[0]);
            
            for ($i=0; $i < count($result) ; $i++) { 

                $result[$i]['dt_criacao'] = date("d-m-Y", strtotime($result[$i]['dt_criacao']) );    
                
            }

            return $result;
        }

        
        public function processesIncidents(){
            

            $sql = new Sql();


            $incidentes = $sql->select("SELECT * from tb_status ORDER BY dt_criacao desc LIMIT 3");

            for ($i=0; $i < count($incidentes) ; $i++) { 
                $incidentes[$i]['dt_criacao'] = date("d-m-Y", strtotime($incidentes[$i]['dt_criacao']) );
    
                $incidentes[$i]['descricao'] = substr($incidentes[$i]['descricao'], 0, 200);
            }

            return $incidentes;
        }

        public function processesCommunication(){

            $sql = new Sql();

            $comunicados = $sql->select("SELECT * from tb_comunicados ORDER BY dt_criacao desc LIMIT 3");

            for ($i=0; $i < count($comunicados) ; $i++) { 
                $comunicados[$i]['dt_criacao'] = date("d-m-Y", strtotime($comunicados[$i]['dt_criacao']) );
    
                $comunicados[$i]['descricao'] = substr($comunicados[$i]['descricao'], 0, 200);
            }

            return $comunicados;
        }

        public function processesAllIncidents($filtro){

            if ($filtro === "email") {
                $category = "email";
            }
            elseif ($filtro === "hospedagem") {
                $category = "hospedagem";
            }
           elseif ($filtro === "backup") {
                $category = "backup";
            }

            $sql = new Sql();
            $incidentes = $sql->select("SELECT * from tb_status where category = :category ORDER BY dt_criacao desc", array(
                ":category" => $category
            ));

            for ($i=0; $i < count($incidentes) ; $i++) { 
                $incidentes[$i]['dt_criacao'] = date("d-m-Y", strtotime($incidentes[$i]['dt_criacao']) );
                
            }

            return $incidentes;
        }   
        


        public function getAllIncidents(){
            $sql = new Sql();
            $incidentes = $sql->select("SELECT * from tb_status ORDER BY dt_criacao desc ");

            for ($i=0; $i < count($incidentes) ; $i++) { 
                $incidentes[$i]['dt_criacao'] = date("d-m-Y", strtotime($incidentes[$i]['dt_criacao']) );
                
            }

            return $incidentes;
        }

        public function getAllCommunicated(){
            $sql = new Sql();
            $communicated = $sql->select("SELECT * from tb_comunicados ORDER BY dt_criacao desc ");

            for ($i=0; $i < count($communicated) ; $i++) { 
                $communicated[$i]['dt_criacao'] = date("d-m-Y", strtotime($communicated[$i]['dt_criacao']) );
                
            }

            return $communicated;
        }






    }

?>