<?php 

namespace Classes\Model;

use \Classes\DB\Sql;
use \Classes\Model;

	class Eventos extends Model{


        public function getIncident($id){
			$sql = new Sql();

			$result = $sql->select("SELECT * from tb_status where id=:id", array(
				":id" => $id
			));

            $this->setData($result[0]);
            
            for ($i=0; $i < count($result) ; $i++) { 

                $result[$i]['dt_criacao'] = date("d-m-Y", strtotime($result[$i]['dt_criacao']) );
                
                if ((int)$result[$i]['status_service'] === 0)
                {
                    $result[$i]['status_service'] = "Resolvido";
                }
                elseif((int)$result[$i]['status_service'] === 1 )
                {
                    $result[$i]['status_service'] = "Em Análise";
                }    
               
            
                
            }

            return $result;
        }

        public function save(){
			$sql = new Sql();
			
            $sql->query("INSERT INTO tb_status (title,descricao,previsao,status_service,category) values (:title,:descricao,:previsao,:status_service,:category)", array(
                ":title" =>$this->gettitle(),
                ":descricao" =>$this->getdescricao(),
                ":previsao" =>$this->getprevisao(),
                ":status_service" =>$this->getstatus_service(),
                ":category" =>$this->getcategory()
            ) );           
            
			
        }

        public function saveCommunicated(){
			$sql = new Sql();
			
            $sql->query("INSERT INTO tb_comunicados (title,descricao) values (:title,:descricao)", array(
                ":title" =>$this->gettitle(),
                ":descricao" =>$this->getdescricao()
            ) );           
            
			
        }

        public function update(){
			$sql = new Sql();
			
			$results = $sql->select("UPDATE tb_status  SET title = :title, descricao = :descricao, previsao = :previsao,status_service = :status_service, category = :category WHERE id = :id", array(
				":title" =>$this->gettitle(),
                ":descricao" =>$this->getdescricao(),
                ":previsao" =>$this->getprevisao(),
                ":status_service" =>$this->getstatus_service(),
                ":category" =>$this->getcategory(),
                ":id" => $this->getid()
			));

			$this->setData($results);
        }

        public function updateCommunicated(){
			$sql = new Sql();
			
			$results = $sql->select("UPDATE tb_comunicados  SET title = :title, descricao = :descricao WHERE id = :id", array(
				":title" =>$this->gettitle(),
                ":descricao" =>$this->getdescricao(),                
                ":id" => $this->getid()
			));

			$this->setData($results);
        }

        
        
        public function delete(){
			$sql = new Sql();

			$sql->query("DELETE FROM tb_status WHERE id = :id", array(
				":id" => $this->getid()
			));
        }
        
        public function deleteCommunicated(){
			$sql = new Sql();

			$sql->query("DELETE FROM tb_comunicados WHERE id = :id", array(
				":id" => $this->getid()
			));
		}
        
        public function get($id){
			$sql = new Sql();

			$results = $sql->select("SELECT * FROM tb_status WHERE id = :id", array(
				":id" => $id
            ));
            
            if($results[0]["status_service"] == 0 )
            {
                $results[0]["status_service"] = "Resolvido";
            }
            elseif ($results[0]["status_service"] == 1)
            {
                $results[0]["status_service"] = "Em analise";
            }
            
            $this->setData($results[0]);
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

        public function verifyStatus($tableStatus){
           // print_r($tableStatus); exit;

            
            for ($i=0; $i < count($tableStatus) ; $i++) { 
                
                if ($tableStatus[$i]["status_service"] == 1) {

                    return 1; exit;

                }
            }

            

        }

        public function verifyPrevisao($tableStatus){            
 
           
             for ($i=0; $i < count($tableStatus) ; $i++) { 
                
                 if ($tableStatus[$i]["status_service"] == 1) {                                          
                     return $tableStatus[$i]["previsao"];
                     exit;
 
                 }
                    
                 return "0";
                 
             }
 
             
 
         }

        




    }

?>