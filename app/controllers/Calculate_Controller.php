<?php
namespace app\controllers;

use app\models\{User,Session,SessionUser};
use app\Redirect;
use config\{ServiceSession};
use app\controllers\{Session_Controller};
use core\{BaseController};

	class Calculate_Controller extends BaseController
	{
		public function __construct(){
			parent::__construct();
		}

    public function sumPrepare(){
      $array_int=explode(',',$_POST['nums-array']);
      $this->sum($array_int);

    }

    public function sum(array $array_int):int|string{
      $sum;
      $count=count($array_int);
      sort($array_int);
      if (is_numeric(end($array_int))) {
        settype($array_int[$count-1], "integer");
        settype($array_int[$count-2], "integer");
        $sum=end($array_int)+prev($array_int);
      }
      else{

      for ($i=$count-1; $i != 0; $i--) {
        if (!is_int($array_int[$i])) {
          unset($array_int[$i]);
        }
       }
      }
      Redirect::to("/")->with([
        'sum'=>$sum,
      ])->do();
    }

	}
