<?php
namespace app\controllers;

use app\models\{User,Session,SessionUser};
use app\Redirect;
use config\{ServiceSession};
use app\controllers\{Session_Controller};
use core\{BaseController};

	class User_Controller extends BaseController
	{
		public function __construct(){
			parent::__construct();
		}


		public function index(){
			$this->view("index",array());
		}

		/**
		*Return Login view
		*/

	  public function loginView(){
	    if (ServiceSession::read("name")) {
	        Redirect::to("/")->do();
	    }
	    $this->view('login');
	  }

		/**
		*Return principal view page
		*/
	  public function principal(){
	    if (!ServiceSession::read("name")) {
	        Redirect::to("/login")->do();
	    }
	    $this->view('principal');
	  }


   /**
	 *reset $_SESSION['message'] make it =''
	 */
		public function resetMessage(){
			if (isset($_SESSION['message']) && $_SESSION['message']!='') {
				$_SESSION['message']='';
			}
		}

		/**
		*Receive Data by POST for login an user
		*Redirect to product page view if user exist
		*Or to login view if any error
		*/

	  public function login(){
			$this->resetMessage();
	    $username=$_POST["txt-input"];
	    $password=$_POST["password"];
	    $action=$_POST["action"];
			$userList =[];
			$column_value=array('email'=>$username,'password'=>$password);
			$uss=new User();
			$login=$uss->getBy($column_value);
			if (is_array($login)) {
				if (count($login)>0) {
					foreach ($login as $user)
			    {
						$userList[]= array(
			        'user'     =>$user['user_name'],
			        'email'     =>$user['email'],
			        'password'     =>$user['password']);
					}

					$user=$userList[0]["email"];
		      $pass=$userList[0]["password"];
		      Redirect::to("/")->with([
		        'name'=>$userList[0]["email"],
		        'check'=>"true",
		      ])->do();
				}
				else{

					Redirect::to("/login")->with([
		          "message" => "Ha ocurrido un error: usuario o contraseña incorrectos.</br> Revise por favor",
		          "type" => "danger",
		      ])
		          ->do();
				}

			}
			else{

				Redirect::to("/login")->with([
	          "message" => $login,
	          "type" => "danger",
	      ])
	          ->do();
			}
	  }

		/**
		*Logoff user session and destroy session data
		*Redirect to login view
		*/

	  public function logoff(){
	    ServiceSession::destroy();
	    Redirect::to("/login")->do();
	  }

	}
