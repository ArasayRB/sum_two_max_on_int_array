<?php

require __DIR__ . '/vendor/autoload.php';

use config\Common;
use Phroute\Phroute\{RouteCollector,RouteParser,Dispatcher};
use Phroute\Phroute\Exception\{HttpMethodNotAllowedException,HttpRouteNotFoundException};

define("ROOT_DIRECTORY", __DIR__);
define("API_DIRECTORY", ROOT_DIRECTORY . "/app");
define("VIEW_DIRECTORY", ROOT_DIRECTORY . "/app/views");
define("LOGS_PATH", __DIR__ . DIRECTORY_SEPARATOR . "logs");
define("BASE_URL", Common::env("BASE_URL"));
define("API_PATH", BASE_URL . "/api");
define("API_NAME", "Sum Int Array");
define("AUTHOR", "Arasay Rodriguez Bastida | arbast");
ini_set('display_errors', 0);
ini_set("log_errors", 1);
ini_set("error_log", __DIR__ . "/logs/" . date("Y-m-d") . ".log");
if (!file_exists(LOGS_PATH)) {
    mkdir(LOGS_PATH);
}


$enrutador = require_once "routes.php";

$despachador = new Dispatcher($enrutador->getData());
$rutaCompleta = $_SERVER["REQUEST_URI"];
$metodo = $_SERVER['REQUEST_METHOD'];
$rutaLimpia = parseUrl($rutaCompleta);

try {
    echo $despachador->dispatch($metodo, $rutaLimpia);
} catch (HttpRouteNotFoundException $e) {
    echo "Error: Path not found";
} catch (HttpMethodNotAllowedException $e) {
    echo "Error: Path found but method is not allow";
}


function parseUrl($uri)
{

    $posicionSignoDeInterrogacion = strpos($uri, "?");
    if ($posicionSignoDeInterrogacion !== false) {
        $uri = substr($uri, 0, $posicionSignoDeInterrogacion);
    }

    return implode('/',
        array_slice(
            explode('/', $uri), Common::env("OFFSET_ROUTE")));
}
