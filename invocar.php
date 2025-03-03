<?php

require_once "vendor/autoload.php";
require_once "vendor/econea/nusoap/src/nusoap.php";
require_once "servidor.php";

$namespace = "urn:miserviciowsdl";

$server = new nusoap_server();
$server->configureWSDL("MiServicioBasico");
$server->wsdl->schemaTargetNamespace = $namespace;

// Registrar los métodos
$server->register("Servidor.Sumar",
    array("num1" => "xsd:integer", "num2" => "xsd:integer"),
    array("return" => "xsd:string"),
    $namespace,
    'Suma dos números'
);

//ACA RESTA LOS NUMEROS
$server->register("Servidor.Restar",
    array("num1" => "xsd:integer", "num2" => "xsd:integer"),
    array("return" => "xsd:string"),
    $namespace,
    'Resta dos números'
);
//ACA MULTIPLICA LOS NUMEROS
$server->register("Servidor.Multiplicar",
    array("num1" => "xsd:integer", "num2" => "xsd:integer"),
    array("return" => "xsd:string"),
    $namespace,
    'Multiplica dos números'
);
//ACA DIVIDE LOS NUMEROS
$server->register("Servidor.Dividir",
    array("num1" => "xsd:integer", "num2" => "xsd:integer"),
    array("return" => "xsd:string"),
    $namespace,
    'Divide dos números'
);

$server->service(file_get_contents("php://input"));
exit();

?>