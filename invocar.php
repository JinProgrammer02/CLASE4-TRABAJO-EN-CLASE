<?php
require_once "vendor/autoload.php";
require_once "vendor/econea/nusoap/src/nusoap.php";
require_once "servidor.php";

$namespace = "urn:miserviciowsdl";
$server = new nusoap_server();
$server->configureWSDL("MiServicioWeb", $namespace);
$server->wsdl->schemaTargetNamespace = $namespace;

// Definir el tipo complejo Producto
$server->wsdl->addComplexType(
    'Producto',
    'complexType',
    'struct',
    'all',
    '',
    [
        'id'       => ['name' => 'id', 'type' => 'xsd:int'],
        'nombre'   => ['name' => 'nombre', 'type' => 'xsd:string'],
        'precio'   => ['name' => 'precio', 'type' => 'xsd:decimal'],
        'stock'    => ['name' => 'stock', 'type' => 'xsd:int'],
    ]
);

// Definir el tipo complejo ListaProductos como un array de Producto
$server->wsdl->addComplexType(
    'ListaProductos',
    'complexType',
    'array',
    '',
    'SOAP-ENC:Array',
    [],
    [['ref' => 'SOAP-ENC:arrayType', 'wsdl:arrayType' => 'tns:Producto[]']],
    'tns:Producto'
);

// Registrar métodos con los tipos de datos correctos
$server->register(
    "obtenerProductos",
    ['token' => 'xsd:string'],
    ['return' => 'tns:ListaProductos'],
    $namespace,
    false,
    'rpc',
    'encoded',
    "Obtiene la lista de productos"
);

$server->register(
    "obtenerProducto",
    ["id" => "xsd:int", "token" => "xsd:string"],
    ["return" => "tns:Producto"],
    $namespace,
    false,
    "rpc",
    "encoded",
    "Obtiene un producto por ID"
);

$server->register(
    "Servidor.agregarProducto",
    ["nombre" => "xsd:string", "precio" => "xsd:decimal", "stock" => "xsd:int", "token" => "xsd:string"],
    ["return" => "xsd:string"],
    $namespace,
    false,
    "rpc",
    "encoded",
    "Agrega un nuevo producto"
);

$server->register(
    "actualizarProducto",
    ["id" => "xsd:int", "nombre" => "xsd:string", "precio" => "xsd:decimal", "stock" => "xsd:int", "token" => "xsd:string"],
    ["return" => "xsd:string"],
    $namespace,
    false,
    "rpc",
    "encoded",
    "Actualiza un producto"
);

$server->register(
    "eliminarProducto",
    ["id" => "xsd:int", "token" => "xsd:string"],
    ["return" => "xsd:string"],
    $namespace,
    false,
    "rpc",
    "encoded",
    "Elimina un producto"
);

// Ejecutar servicio SOAP
$server->service(file_get_contents("php://input"));
?>