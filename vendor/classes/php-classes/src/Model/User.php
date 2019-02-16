<?php 

namespace Classes\Model;

use \Classes\DB\Sql;
use \Classes\Model;
	
	class User extends Model{

		const SESSION = "User";

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

				$user->setData($data);

				$_SESSION[User::SESSION] = $user->getValue();

				return $user;

			}else{

				throw new \Exception("Usuárion inexistente ou senha inválida", 1);
							
			}
		}

		public static function verifylogin($inadmin = true){

			if(
				!isset($_SESSION[User::SESSION])
				|| 
				!$_SESSION[User::SESSION]
				||
				!(int)$_SESSION[User::SESSION]["iduser"] > 0
				||
				(bool)$_SESSION[User::SESSION]["inadmin"] !== $inadmin
			  )
			  {
				header("Location: /admin/login");
				exit;
			  }

		}

		public static function logout(){

			$_SESSION[User::SESSION] = NULL;

		}
	}
?>