<?php
namespace Classes;

use \Rain\Tpl;
use \PHPMailer;

class Mailer{

    const USERNAME = "status@mav.com.br";
    const HOSTNAME = "mail.mav.com.br";
    const PASSWORD = "45@NyOfrr";
    const NAME_FROM = "MAV Tecnologia";

    private $mail;

    public function __construct($toAdrress, $toName, $subject, $tlpName, $data = array()){
    
        $config = array(
			"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]."/views/email/",
			"cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
			"debug"         => false
	    );

		Tpl::configure( $config );

        $tpl = new Tpl;

        
        foreach ($data as $key => $value) {
            $tpl->assign($key,$value);
        }
        
        $html = $tpl->draw($tlpName, true);

        $this->mail = new PHPMailer(); 
        $this->mail->IsSMTP();
        $this->mail->SMTPDebug = 2;
        $this->mail->Host = Mailer::HOSTNAME;
        $this->mail->SMTPAuth = true;
        $this->mail->Port = 587;

        


        //==================$this->mail->SMTPAutoTLS = false========================

        $this->mail->SMTPAutoTLS = false;

        
        $this->mail->Username = Mailer::USERNAME; 
        $this->mail->Password = Mailer::PASSWORD; 
        
        //Define os Remetente 
        $this->mail->setFrom(Mailer::USERNAME,Mailer::NAME_FROM); 
        
        //Define os destinatário(s)     
        $this->mail->AddAddress($toAdrress);

       
        //$this->mail->AddAddress('usuario_destino@dominio.com.br');
        

        $this->mail->IsHTML(true); 
        $this->mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional) 

        //Assunto do E-mail
        $this->mail->Subject  = $subject;
        $this->mail->msgHTML($html);


        //Corpo do E-mail
        $this->mail->AltBody = 'Teste de envio de e-mail';

        
        
    
    }

    public function send(){
       return $this->mail->send();
        
    }
}
?>