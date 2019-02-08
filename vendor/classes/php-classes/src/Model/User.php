<?php 

namespace Classes\Model;

use \Classes\DB\Sql;
use \Classes\Model;
	
	class User extends Model{

		public static function login($login, $password){

						
			$sql = new Sql();
			$results = $sql->select("SELECT * FROM tb_users WHERE deslogin = :LOGIN", array(
				":LOGIN" => $login 
			));

			if (count($results) === 0) {
				throw new \Exception("Usuárion inexistente ou senha inválida", 1);
				
			}

			$data = $results[0];

			//var_dump($data); exit;

			if (password_verify($password, $data["despassword"]) === true){
				
				$user = new User();

				$user->setidusuario($data["iduser"]);

				exit();

			}else{

				throw new \Exception("Usuárion inexistente ou senha inválida", 1);
							
			}
		}

	}
?>