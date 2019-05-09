<?php 

namespace Classes\Model;

use \Classes\DB\Sql;
use \Classes\Model;

	class Incidents extends Model{
        

        const SESSION_VERIFY_DOMAIN_HOSPEDAGEM_WEB = "verifyDomain";
        const SESSION_VERIFY_DOMAIN_EMAIL = "verifyDomainEmail";

        const SESSION_VERIFY_COLOR_HOSPEDAGEM_WEB = "verifyColorHospedagemWeb";
        const SESSION_VERIFY_COLOR_EMAIL = "verifyColorEmail";


        public function getIncident($id){
			$sql = new Sql();

			$result = $sql->select("SELECT * from tb_incidents where id=:id", array(
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
            /*$sql = new Sql();
            
            
			
            $sql->query("INSERT INTO tb_incidents (title,descricao,previsao,status_service,category) values (:title,:descricao,:previsao,:status_service,:category)", array(
                ":title" =>$this->gettitle(),
                ":descricao" =>$this->getdescricao(),
                ":previsao" =>$this->getprevisao(),
                ":status_service" =>$this->getstatus_service(),
                ":category" =>$this->getcategory()
            ) );   */    

            if((int)$this->getcategory_email() === 1){
                $category = "email";
            }

            if((int)$this->getcategory_hospedagem() === 1){
                $category = "hospedagem";
            }

            if((int)$this->getcategory_backup() === 1){
                $category = "backup";
            }

            if((int)$this->getcategory_painel() === 1){
                $category = "painel";
            }
            
            
            $sql = new Sql();

                       
			
            $results = $sql->select("CALL sp_incident_save 
                        (:title,:descricao,:status_service,:category_email_imap,:category_email_pop,
                            :category_email_smtp,:category_email_webmail,:category_email_fila,:category_email_eas,:category_email_mail01,:category_email_mail02,
                            :category_email_mail03,:previsao_imap_email,:previsao_pop_email,:previsao_smtp_email,:previsao_webmail_email,:previsao_fila_email,
                            :previsao_eas_email,:category_hospedagem_http,:category_hospedagem_bd,:category_hospedagem_lin1,
                            :category_hospedagem_lin3,:category_hospedagem_win,:previsao_http,:previsao_bd,:previsao_backup,:category_email,
                            :category_hospedagem,:category_backup,:dt_modified,:category,:category_painel,:previsao_painel)",
                            [
                                ":title"=>$this->gettitle(),
                                ":descricao"=>$this->getdescricao(),
                                ":status_service"=>$this->getstatus_service(),                                
                                ":category_email_imap"=>(int)$this->getcategory_email_imap(),
                                ":category_email_pop"=>(int)$this->getcategory_email_pop(),
                                ":category_email_smtp"=>(int)$this->getcategory_email_smtp(),
                                ":category_email_webmail"=>(int)$this->getcategory_email_webmail(),
                                ":category_email_fila"=>(int)$this->getcategory_email_fila(),
                                ":category_email_eas"=>(int)$this->getcategory_email_eas(),
                                ":category_email_mail01"=>(int)$this->getcategory_email_mail01(),
                                ":category_email_mail02"=>(int)$this->getcategory_email_mail02(),
                                ":category_email_mail03"=>(int)$this->getcategory_email_mail03(),
                                ":previsao_imap_email"=>$this->getprevisao_imap_email(),
                                ":previsao_pop_email"=>$this->getprevisao_pop_email(),
                                ":previsao_smtp_email"=>$this->getprevisao_smtp_email(),
                                ":previsao_webmail_email"=>$this->getprevisao_webmail_email(),
                                ":previsao_fila_email"=>$this->getprevisao_fila_email(),
                                ":previsao_eas_email"=>$this->getprevisao_eas_email(),
                                ":category_hospedagem_http"=>(int)$this->getcategory_hospedagem_http(),
                                ":category_hospedagem_bd"=>(int)$this->getcategory_hospedagem_bd(),                                
                                ":category_hospedagem_lin1"=>(int)$this->getcategory_hospedagem_lin1(),
                                ":category_hospedagem_lin3"=>(int)$this->getcategory_hospedagem_lin3(),
                                ":category_hospedagem_win"=>(int)$this->getcategory_hospedagem_win(),
                                ":previsao_http"=>$this->getprevisao_http(),
                                ":previsao_bd"=>$this->getprevisao_bd(),                                
                                ":previsao_backup"=>$this->getprevisao_backup(),
                                ":category_email"=>(int)$this->getcategory_email(),
                                ":category_hospedagem"=>(int)$this->getcategory_hospedagem(),
                                ":category_backup"=>(int)$this->getcategory_backup(),
                                ":dt_modified"=>$this->getdt_modified(),
                                ":category"=>$category,
                                ":category_painel"=>$this->getcategory_painel(),
                                ":previsao_painel"=>$this->getprevisao_painel()
                            ]
            );           
            //var_dump($results[0]); exit;
			$this->setData($results[0]);
            
			
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
			
			$results = $sql->select("UPDATE tb_incidents  SET
                title = :title,
                descricao = :descricao, 
                status_service = :status_service, 
                category_email_imap = :category_email_imap,
                category_email_pop = :category_email_pop,
                category_email_smtp = :category_email_smtp,
                category_email_webmail = :category_email_webmail,
                category_email_fila = :category_email_fila,
                category_email_eas = :category_email_eas,
                category_email_mail01 = :category_email_mail01,
                category_email_mail02 = :category_email_mail02,
                category_email_mail03 = :category_email_mail03,
                previsao_imap_email = :previsao_imap_email,
                previsao_pop_email = :previsao_pop_email,
                previsao_smtp_email = :previsao_smtp_email,
                previsao_webmail_email = :previsao_webmail_email,
                previsao_fila_email = :previsao_fila_email,
                previsao_eas_email = :previsao_eas_email,
                category_hospedagem_http = :category_hospedagem_http,
                category_hospedagem_bd = :category_hospedagem_bd,                
                category_hospedagem_lin1 = :category_hospedagem_lin1,
                category_hospedagem_lin3 = :category_hospedagem_lin3,
                category_hospedagem_win = :category_hospedagem_win,
                previsao_http = :previsao_http,
                previsao_bd = :previsao_bd,                
                previsao_backup = :previsao_backup,
                category_email = :category_email,
                category_hospedagem = :category_hospedagem,
                category_backup = :category_backup,
                dt_modified = NOW(),
                category_painel = :category_painel,
                previsao_painel = :previsao_painel

                WHERE id = :id",array(
                ":title"=>$this->gettitle(),
                ":descricao"=>$this->getdescricao(),
                ":status_service"=>$this->getstatus_service(),                                
                ":category_email_imap"=>(int)$this->getcategory_email_imap(),
                ":category_email_pop"=>(int)$this->getcategory_email_pop(),
                ":category_email_smtp"=>(int)$this->getcategory_email_smtp(),
                ":category_email_webmail"=>(int)$this->getcategory_email_webmail(),
                ":category_email_fila"=>(int)$this->getcategory_email_fila(),
                ":category_email_eas"=>(int)$this->getcategory_email_eas(),
                ":category_email_mail01"=>(int)$this->getcategory_email_mail01(),
                ":category_email_mail02"=>(int)$this->getcategory_email_mail02(),
                ":category_email_mail03"=>(int)$this->getcategory_email_mail03(),
                ":previsao_imap_email"=>$this->getprevisao_imap_email(),
                ":previsao_pop_email"=>$this->getprevisao_pop_email(),
                ":previsao_smtp_email"=>$this->getprevisao_smtp_email(),
                ":previsao_webmail_email"=>$this->getprevisao_webmail_email(),
                ":previsao_fila_email"=>$this->getprevisao_fila_email(),
                ":previsao_eas_email"=>$this->getprevisao_eas_email(),
                ":category_hospedagem_http"=>(int)$this->getcategory_hospedagem_http(),
                ":category_hospedagem_bd"=>(int)$this->getcategory_hospedagem_bd(),                
                ":category_hospedagem_lin1"=>(int)$this->getcategory_hospedagem_lin1(),
                ":category_hospedagem_lin3"=>(int)$this->getcategory_hospedagem_lin3(),
                ":category_hospedagem_win"=>(int)$this->getcategory_hospedagem_win(),
                ":previsao_http"=>$this->getprevisao_http(),
                ":previsao_bd"=>$this->getprevisao_bd(),                
                ":previsao_backup"=>$this->getprevisao_backup(),
                ":category_email"=>(int)$this->getcategory_email(),
                ":category_hospedagem"=>(int)$this->getcategory_hospedagem(),
                ":category_backup"=>(int)$this->getcategory_backup(),
                ":id"=>$this->getid(),
                ":category_painel"=>$this->getcategory_painel(),
                ":previsao_painel"=>$this->getprevisao_painel()               
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

			$sql->query("DELETE FROM tb_incidents WHERE id = :id", array(
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

			$results = $sql->select("SELECT * FROM tb_incidents WHERE id = :id", array(
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
           // var_dump($results[0]);exit;
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


            $incidentes = $sql->select("SELECT * from tb_incidents ORDER BY dt_criacao desc LIMIT 3");

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
            elseif ($filtro === "painel") {
                $category = "painel";
            }

            $sql = new Sql();

            if ($filtro == "") {

                $incidentes = $sql->select("SELECT * from tb_incidents ORDER BY dt_criacao desc");

            }else{

                $incidentes = $sql->select("SELECT * from tb_incidents where category = :category ORDER BY dt_criacao desc", array(
                    ":category" => $category
                ));
            }

            for ($i=0; $i < count($incidentes) ; $i++) { 
                $incidentes[$i]['dt_criacao'] = date("d-m-Y", strtotime($incidentes[$i]['dt_criacao']) );
                
            }

            return $incidentes;
        }   


        public function processesIncidentsWhithProblem($filtro){

            if ($filtro === "email") {
                $category = "email";
            }
            elseif ($filtro === "hospedagem") {
                $category = "hospedagem";
            }
           elseif ($filtro === "backup") {
                $category = "backup";
            }
            elseif ($filtro === "painel") {
                $category = "painel";
            }

            $sql = new Sql();
            $incidentes = $sql->select("SELECT * from tb_incidents where category = :category AND status_service=1 ORDER BY dt_criacao desc", array(
                ":category" => $category
            ));

            for ($i=0; $i < count($incidentes) ; $i++) { 
                $incidentes[$i]['dt_criacao'] = date("d-m-Y", strtotime($incidentes[$i]['dt_criacao']) );
                
            }

            return $incidentes;
        }

        public function verifyStatusIncidents($filtro, $cluster, $subcategory){

            $category = $filtro;  
           
           $sub = "category_" . $filtro . "_".$subcategory;
           $clusterBusca = "category_" . $filtro . "_".$cluster;

          

            $sql = new Sql();
            $incidentes = $sql->select("SELECT * from tb_incidents where category = :category AND status_service=1 AND $sub=1 AND $clusterBusca=1", array(
                ":category" => $category
            ));

            for ($i=0; $i < count($incidentes) ; $i++) { 
                $incidentes[$i]['dt_criacao'] = date("d-m-Y", strtotime($incidentes[$i]['dt_criacao']) );
                
            }

            return $incidentes;
        }


        public function getDataForTemplate($filtro, $subcategoria,$status){
            $dataTemplate = [];

            if($filtro == "email"){

                $previsao = "previsao_" . $subcategoria . "_" . $filtro;
                $category = "category_" . $filtro . "_" .  $subcategoria;
            }else{

                $previsao = "previsao_" . $subcategoria;
                $category = "category_" . $filtro . "_" .  $subcategoria;
            }

            
            
            //print_r($previsao);exit;

            if(isset($status[0][$previsao])){
                $previsaoMail = $status[0][$previsao];
            }else{
                   $previsaoMail = "";
            }
       
            if (isset($status[0][$category])) {				  	
                $dataTemplate["status"] = "badge badge-danger";
                $dataTemplate["message"] = "Problema";
                $dataTemplate["previsao"] =  $previsaoMail;
            }else {
                $dataTemplate["status"] = "badge badge-success";
                $dataTemplate["message"] = "Ok";
                $dataTemplate["previsao"] = $previsaoMail;
            }

            return $dataTemplate;
        }

        
        
        public function getProblemSubcategory($incidentes){
            //var_dump($incidentes);exit;
            $b = [];

            for ($i=0; $i < count($incidentes) ; $i++) { 

                //BACKUP
                if ( $incidentes[$i]['category_backup'] == 1 ) {
                    array_push($b,'category_backup');
                    array_push($b, $incidentes[$i]['previsao_backup']);
                    continue;
                }

                if ( $incidentes[$i]['category_painel'] == 1 ) {
                    array_push($b,'category_painel');
                    array_push($b, $incidentes[$i]['previsao_painel']);
                    continue;
                }
            
                if ( $incidentes[$i]['category_email_imap'] == 1 ) {
                    array_push($b,'category_email_imap');
                    array_push($b, $incidentes[$i]['previsao_imap_email']);
                    continue;
                }
                
                //EMAIL
                if ( $incidentes[$i]['category_email_pop'] == 1) {
                    array_push($b,'category_email_pop');
                    array_push($b, $incidentes[$i]['previsao_pop_email']);
                    continue;
                }

                if ( $incidentes[$i]['category_email_smtp'] == 1) {
                    array_push($b,'category_email_smtp');
                    array_push($b, $incidentes[$i]['previsao_smtp_email']);
                    continue;
                }
                if ( $incidentes[$i]['category_email_webmail'] == 1) {
                    array_push($b,'category_email_webmail');
                    array_push($b, $incidentes[$i]['previsao_webmail_email']);
                    continue;
                }

                if ( $incidentes[$i]['category_email_fila'] == 1) {
                    array_push($b,'category_email_fila');
                    array_push($b, $incidentes[$i]['previsao_fila_email']);
                    continue;
                }

                if ( $incidentes[$i]['category_email_eas'] == 1) {
                    array_push($b,'category_email_eas');
                    array_push($b, $incidentes[$i]['previsao_eas_email']);
                    continue;
                }

                if ( $incidentes[$i]['category_email_mail01'] == 1) {
                    array_push($b,'category_email_mail01');
                    
                    continue;
                }

                if ( $incidentes[$i]['category_email_mail02'] == 1) {
                    array_push($b,'category_email_mail02');
                    continue;
                }

                if ( $incidentes[$i]['category_email_mail03'] == 1) {
                    array_push($b,'category_email_mail03');
                    continue;
                }

                //Hospedagem

                if ( $incidentes[$i]['category_hospedagem_http'] == 1) {
                    array_push($b,'category_hospedagem_http');
                    array_push($b, $incidentes[$i]['previsao_http']);
                    continue;
                }

                if ( $incidentes[$i]['category_hospedagem_bd'] == 1) {
                    array_push($b,'category_hospedagem_bd');
                    array_push($b, $incidentes[$i]['previsao_bd']);
                    continue;
                }
                
                if ( $incidentes[$i]['category_hospedagem_lin1'] == 1) {
                    array_push($b,'category_hospedagem_lin1');
                    continue;
                }

                if ( $incidentes[$i]['category_hospedagem_lin3'] == 1) {
                    array_push($b,'category_hospedagem_lin3');
                    continue;
                }

                if ( $incidentes[$i]['category_hospedagem_win'] == 1) {
                    array_push($b,'category_hospedagem_win');
                    continue;
                }
            }
            
            //print_r($b); exit;

            return $b;

        }


        public function getAllIncidents(){
            $sql = new Sql();
            $incidentes = $sql->select("SELECT * from tb_incidents ORDER BY dt_criacao desc ");

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

        public function verifyStatus($tableStatus, $filtro){
           
            $returnVerifyDomain = [];            

                if ($filtro == "") {
                    $j =0;

                    for ($i=0; $i < count($tableStatus) ; $i++) {
                   
                        if ($tableStatus[$i]["status_service"] == 1) {

                            if ($tableStatus[$i]["category"] == "hospedagem" || $tableStatus[$i]["category"] == "email") {

                            
                                
                                    $returnVerifyDomain[$j]["status_service"]  =  $tableStatus[$i]["status_service"];
                                    $returnVerifyDomain[$j]["category"] = $tableStatus[$i]["category"];
                                    $returnVerifyDomain[$j]["category_email_mail01"] = $tableStatus[$i]["category_email_mail01"];
                                    $returnVerifyDomain[$j]["category_email_mail02"] = $tableStatus[$i]["category_email_mail02"];
                                    $returnVerifyDomain[$j]["category_email_mail03"] = $tableStatus[$i]["category_email_mail03"];
                                    $returnVerifyDomain[$j]["category_email_mail03"] = $tableStatus[$i]["category_email_mail03"];
                                    $returnVerifyDomain[$j]["category_hospedagem_lin1"] = $tableStatus[$i]["category_hospedagem_lin1"];
                                    $returnVerifyDomain[$j]["category_hospedagem_lin3"] = $tableStatus[$i]["category_hospedagem_lin3"];
                                    $returnVerifyDomain[$j]["category_hospedagem_win"] = $tableStatus[$i]["category_hospedagem_win"];  
                                
                                    $j++;
                            
                            }
                        

                        }
                    }

                    return $returnVerifyDomain;

                }else{
                    for ($i=0; $i < count($tableStatus) ; $i++) { 
                
                        if ($tableStatus[$i]["status_service"] == 1) {
                            return 1; exit;
                        }
                    }
                }
            

            

        }
/*
        public function verifyDomain($statusGeral, $domainReceived){

            //print_r($statusGeral);exit;
            
            $domain = $domainReceived;
            $mail = 'mail.' . $domainReceived;

            $aaa = dns_get_record($domain, DNS_A);           
            $ip = $aaa[0]['ip'];
            //$hostname = gethostbyaddr($ip); 
            
            
            $bbb = dns_get_record($mail, DNS_CNAME);              
            $cname = $bbb[0]['target'];
            $cname1 = explode(".",$cname);
            
            $msgEmailSemProblemas = "Serviço de e-mail do domínio " . strtoupper($domain) . " não é afetado";
            $msgHospedagemSemProblemas = "Site do domínio " . strtoupper($domain) . " não é afetado";

            $msgEmailComProblemas = "Serviço de e-mail do domínio " . strtoupper($domain) . " é afetado";
            $msgHospedagemComProblemas = "Site do domínio " . strtoupper($domain) . " é afetado";

            $returnHospedagem = $msgHospedagemSemProblemas;
            $returnEmail = $msgEmailSemProblemas;

            $alert_success = "alert-success";
            $alert_danger = "alert-danger";
            $alert_primary ="alert-primary";

            $returnColorAlertEmail = $alert_primary;
            $returnColorAlertHospedagemWeb = $alert_success;

           
          print_r($statusGeral);exit;
                
            for ($i=0; $i < count($statusGeral); $i++) { 
                

                if ($statusGeral[$i]["category"] == "hospedagem") {
                    

                    if ($statusGeral[$i]["category_hospedagem_lin1"] == 1) { 
                    
                        
                        $lin1 = "149.56.175.201";
                        
                        
                        if ($ip == $lin1) {
                            $returnHospedagem =  $msgHospedagemComProblemas;
                            $returnColorAlertHospedagemWeb = $alert_danger;
                        
                        
                        }else{
                            $returnHospedagem =  $msgHospedagemSemProblemas;                            
                            $returnColorAlertHospedagemWeb = $alert_success;
                        }
                    }

                    if($statusGeral[$i]["category_hospedagem_lin3"] == 1){
                        
                        $lin3 = "149.56.157.199";
                        
                        if ($ip == $lin3) {
                            $returnHospedagem =  $msgHospedagemComProblemas;
                            $returnColorAlertHospedagemWeb = $alert_danger;
                            
                        
                        }else{
                            $returnHospedagem =  $msgHospedagemSemProblemas;
                            $returnColorAlertHospedagemWeb = $alert_success;
                        }

                    }
                    

                    if($statusGeral[$i]["category_hospedagem_win"] == 1){
                        $win = "199.59.96.204";
                        
                        if ($ip == $win) {
                            $returnHospedagem =  $msgHospedagemComProblemas;
                            $returnColorAlertHospedagemWeb = $alert_danger;
                        
                        }else{
                            $returnHospedagem =  $msgHospedagemSemProblemas;
                            $returnColorAlertHospedagemWeb = $alert_success;
                        }
                    }
                    
                } 
                

                if ($statusGeral[$i]["category"] == "email") {
                    

                    if ($statusGeral[$i]["category_email_mail01"] == 1) { 
                    
                        
                        $mail01 = $cname1[0];
                        
                        
                        if ($mail01 == 'bhs1-mail01') {
                            $returnEmail = $msgEmailComProblemas;
                            $returnColorAlertEmail = $alert_danger;
                        
                        }else{
                            $returnEmail = $msgEmailSemProblemas;
                            $returnColorAlertEmail = $alert_primary;
                        }

                    }

                    if($statusGeral[$i]["category_email_mail02"] == 1){
                        
                        $mail02 = $cname1[0];
                        
                        if ($mail02 == 'bhs1-mail02') {
                            $returnEmail = $msgEmailComProblemas;
                            $returnColorAlertEmail = $alert_danger;
                        
                        }else{
                            $returnEmail = $msgEmailSemProblemas;
                            $returnColorAlertEmail = $alert_primary;
                        }

                    }

                    if($statusGeral[$i]["category_email_mail03"] == 1){

                        $mail03 = $cname1[0];
                        
                        if ($mail03 == 'bhs1-mail03') {
                            $returnEmail = $msgEmailComProblemas;
                            $returnColorAlertEmail = $alert_danger;
                        
                        }else{
                            $returnEmail = $msgEmailSemProblemas;
                            $returnColorAlertEmail = $$alert_primary;
                        }
                    }
                    
                }
            }

            $returned = [
                $returnHospedagem,
                $returnEmail,                
                $returnColorAlertHospedagemWeb,
                $returnColorAlertEmail
            ];
            /*
            if( $returnHospedagem == "" || $returnHospedagem == NULL) {

                $returned = [$returnEmail, NULL, 0];

            }
            if($returnEmail == "" || $returnEmail == NULL){

                $returned = [$returnHospedagem, NULL, 1];

            }
            if(($returnEmail != "" || $returnEmail != NULL) && ($returnHospedagem != "" || $returnHospedagem != NULL) ){ 

                $returned = [$returnHospedagem,$returnEmail, 2];

            } 
            //print_r($returned); exit;
           
            return $returned;
        } 
*/
        public function verifyDomainEmail($statusGeral, $domainReceived){

           
            
            $domain = $domainReceived;
            $mail = 'mail.' . $domainReceived;

            $aaa = dns_get_record($domain, DNS_A);           
            $ip = $aaa[0]['ip'];            
            
            
            $bbb = dns_get_record($mail, DNS_CNAME);              
            $cname = $bbb[0]['target'];
            $cname1 = explode(".",$cname);
            
            $msgEmailSemProblemas = "Serviço de e-mail do domínio " . strtoupper($domain) . " não é afetado";
            $msgHospedagemSemProblemas = "Site do domínio " . strtoupper($domain) . " não é afetado";

            $msgEmailComProblemas = "Serviço de e-mail do domínio " . strtoupper($domain) . " é afetado";
            $msgHospedagemComProblemas = "Site do domínio " . strtoupper($domain) . " é afetado";

            $returnHospedagem = $msgHospedagemSemProblemas;
            $returnEmail = $msgEmailSemProblemas;

            $alert_success = "alert-success";
            $alert_danger = "alert-danger";
            $alert_primary ="alert-primary";

            $returnColorAlertEmail = $alert_primary;
            $returnColorAlertHospedagemWeb = $alert_success;

           
         // print_r($statusGeral);exit;
                
            for ($i=0; $i < count($statusGeral); $i++) {
               

                if ($statusGeral[$i]["category"] == "email") {
                    

                    if ($statusGeral[$i]["category_email_mail01"] == 1) { 
                    
                        
                        $mail01 = $cname1[0];
                        
                        
                        if ($mail01 == 'bhs1-mail01') {
                            $returnEmail = $msgEmailComProblemas;
                            $returnColorAlertEmail = $alert_danger;

                            $returned = [
                                $returnEmail,                                               
                                $returnColorAlertEmail,
                                
                            ];
                            
                            return $returned;
                        
                        }else{
                            $returnEmail = $msgEmailSemProblemas;
                            $returnColorAlertEmail = $alert_primary;
                        }

                    }

                    if($statusGeral[$i]["category_email_mail02"] == 1){
                        
                        $mail02 = $cname1[0];
                        
                        if ($mail02 == 'bhs1-mail02') {
                            $returnEmail = $msgEmailComProblemas;
                            $returnColorAlertEmail = $alert_danger;

                            $returned = [
                                $returnEmail,                                               
                                $returnColorAlertEmail,
                                
                            ];
                            
                            return $returned;
                        
                        }else{
                            $returnEmail = $msgEmailSemProblemas;
                            $returnColorAlertEmail = $alert_primary;
                        }

                    }

                    if($statusGeral[$i]["category_email_mail03"] == 1){

                        $mail03 = $cname1[0];
                        
                        if ($mail03 == 'bhs1-mail03') {
                            $returnEmail = $msgEmailComProblemas;
                            $returnColorAlertEmail = $alert_danger;

                            $returned = [
                                $returnEmail,                                               
                                $returnColorAlertEmail,
                                
                            ];
                            
                            return $returned;
                        
                        }else{
                            $returnEmail = $msgEmailSemProblemas;
                            $returnColorAlertEmail = $$alert_primary;
                        }
                    }
                    
                }
            }

            $returned = [                
                $returnEmail,
                $returnColorAlertEmail
            ];
                       
            return $returned;
        }
        
        public function verifyDomainHospedagem($statusGeral, $domainReceived){

            
            
            $domain = $domainReceived;
            $mail = 'mail.' . $domainReceived;

            $aaa = dns_get_record($domain, DNS_A);           
            $ip = $aaa[0]['ip'];
           
            
            
            $bbb = dns_get_record($mail, DNS_CNAME);              
            $cname = $bbb[0]['target'];
            $cname1 = explode(".",$cname);
            
            $msgEmailSemProblemas = "Serviço de e-mail do domínio " . strtoupper($domain) . " não é afetado";
            $msgHospedagemSemProblemas = "Site do domínio " . strtoupper($domain) . " não é afetado";

            $msgEmailComProblemas = "Serviço de e-mail do domínio " . strtoupper($domain) . " é afetado";
            $msgHospedagemComProblemas = "Site do domínio " . strtoupper($domain) . " é afetado";

            $returnHospedagem = $msgHospedagemSemProblemas;
            $returnEmail = $msgEmailSemProblemas;

            $alert_success = "alert-success";
            $alert_danger = "alert-danger";
            $alert_primary ="alert-primary";

            $returnColorAlertEmail = $alert_primary;
            $returnColorAlertHospedagemWeb = $alert_success;

           
          //print_r($statusGeral);exit;
                
            for ($i=0; $i < count($statusGeral); $i++) { 
                

                if ($statusGeral[$i]["category"] == "hospedagem") {
                    

                    if ($statusGeral[$i]["category_hospedagem_lin1"] == 1) { 
                    
                        
                        $lin1 = "149.56.175.201";
                        
                        
                        if ($ip == $lin1) {
                            $returnHospedagem =  $msgHospedagemComProblemas;
                            $returnColorAlertHospedagemWeb = $alert_danger;

                            $returned = [
                                $returnHospedagem,                                               
                                $returnColorAlertHospedagemWeb,
                                
                            ];
                            
                            return $returned;
                        
                        }else{
                            $returnHospedagem =  $msgHospedagemSemProblemas;                            
                            $returnColorAlertHospedagemWeb = $alert_success;
                        }
                    }

                    if($statusGeral[$i]["category_hospedagem_lin3"] == 1){
                        
                        $lin3 = "149.56.157.199";
                        
                        if ($ip == $lin3) {
                            $returnHospedagem =  $msgHospedagemComProblemas;
                            $returnColorAlertHospedagemWeb = $alert_danger;

                            $returned = [
                                $returnHospedagem,                                               
                                $returnColorAlertHospedagemWeb,
                                
                            ];
                            
                            return $returned;
                            
                        
                        }else{
                            $returnHospedagem =  $msgHospedagemSemProblemas;
                            $returnColorAlertHospedagemWeb = $alert_success;
                        }

                    }
                    

                    if($statusGeral[$i]["category_hospedagem_win"] == 1){
                        $win = "199.59.96.204";
                        
                        if ($ip == $win) {
                            $returnHospedagem =  $msgHospedagemComProblemas;
                            $returnColorAlertHospedagemWeb = $alert_danger;

                            $returned = [
                                $returnHospedagem,                                               
                                $returnColorAlertHospedagemWeb,
                                
                            ];
                            
                            return $returned;
                        
                        }else{
                            $returnHospedagem =  $msgHospedagemSemProblemas;
                            $returnColorAlertHospedagemWeb = $alert_success;
                        }
                    }
                    
                } 
                
            }

            $returned = [
                $returnHospedagem,                                               
                $returnColorAlertHospedagemWeb,
                
            ];
            
            return $returned;
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

         public static function setMsgVerifyDomainHospedagemWeb($msg){
            $_SESSION[Incidents::SESSION_VERIFY_DOMAIN_HOSPEDAGEM_WEB] = $msg;

            //print_r($_SESSION[Incidents::SESSION_VERIFYDOMAIN]);exit;
         }         

         public static function getMsgVerifyDomainHospedagemWeb(){
            $msg = (isset($_SESSION[Incidents::SESSION_VERIFY_DOMAIN_HOSPEDAGEM_WEB])) ? $_SESSION[Incidents::SESSION_VERIFY_DOMAIN_HOSPEDAGEM_WEB] : "";            
            Incidents::clearMsgVerifyDomainHospedagemWeb();            
            return $msg;
         }
         

         public static function setMsgVerifyDomainEmail($msg){
            $_SESSION[Incidents::SESSION_VERIFY_DOMAIN_EMAIL] = $msg;
            //print_r($_SESSION[Incidents::SESSION_VERIFY_DOMAIN_EMAIL]);exit;
         }

         public static function getMsgVerifyDomainEmail(){
            $msg = (isset($_SESSION[Incidents::SESSION_VERIFY_DOMAIN_EMAIL])) ? $_SESSION[Incidents::SESSION_VERIFY_DOMAIN_EMAIL] : "";            
            Incidents::clearMsgVerifyDomainEmail();
            
            return $msg;
         }

         public static function clearMsgVerifyDomainHospedagemWeb(){
            //isset($_SESSION[Incidents::SESSION_VERIFY_DOMAIN_HOSPEDAGEM_WEB]) ? NULL : "";
            unset($_SESSION[Incidents::SESSION_VERIFY_DOMAIN_HOSPEDAGEM_WEB]); 
         }

         public static function clearMsgVerifyDomainEmail(){
            //isset($_SESSION[Incidents::SESSION_VERIFY_DOMAIN_HOSPEDAGEM_WEB]) ? NULL : "";
            unset($_SESSION[Incidents::SESSION_VERIFY_DOMAIN_EMAIL]); 
         }


         public static function setColorMsgVerifyDomainHospedagemWeb($color){
            $_SESSION[Incidents::SESSION_VERIFY_COLOR_HOSPEDAGEM_WEB] = $color;
         }

         public static function getColorMsgVerifyDomainHospedagemWeb(){
            $color = (isset($_SESSION[Incidents::SESSION_VERIFY_COLOR_HOSPEDAGEM_WEB])) ? $_SESSION[Incidents::SESSION_VERIFY_COLOR_HOSPEDAGEM_WEB] : "";            
            Incidents::clearColorVerifyDomainHospedagemWeb();
            return $color;            
        }

         public static function clearColorVerifyDomainHospedagemWeb(){
            
            unset($_SESSION[Incidents::SESSION_VERIFY_COLOR_HOSPEDAGEM_WEB]); 
         }

         public static function setColorMsgVerifyDomainEmail($color){
            $_SESSION[Incidents::SESSION_VERIFY_COLOR_EMAIL] = $color;
         }

         public static function getColorMsgVerifyDomainEmail(){
            $color = (isset($_SESSION[Incidents::SESSION_VERIFY_COLOR_EMAIL])) ? $_SESSION[Incidents::SESSION_VERIFY_COLOR_EMAIL] : "";            
            Incidents::clearColorVerifyDomainEmail();
            return $color;            
        }

         public static function clearColorVerifyDomainEmail(){            
            unset($_SESSION[Incidents::SESSION_VERIFY_COLOR_EMAIL]); 
         }


         

        




    }

?>