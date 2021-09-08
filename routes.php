<?php
namespace app;

require __DIR__ . '/vendor/autoload.php'; #Cargar todas las dependencias

use Phroute\Phroute\RouteCollector;

$collector = new RouteCollector();

$collector->get("/", ['app\controllers\User_Controller','principal']);
$collector->get("/login", ['app\controllers\User_Controller','loginView']);
$collector->get("/logout", ['app\controllers\User_Controller','logoff']);
$collector->get("/usuarios", function(){
	echo "Obtener los usuarios";
	echo '</br';
	echo $_SESSION['name'];
});
$collector->post("/login", ['app\controllers\User_Controller','login']);
$collector->post("/calculate-sum", ['app\controllers\Calculate_Controller','sumPrepare']);
$collector->get("/calculate-sum/result", ['app\controllers\Calculate_Controller','principalWithSum']);

return $collector;
