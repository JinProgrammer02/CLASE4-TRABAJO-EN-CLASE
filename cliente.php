<?php

require_once "vendor/autoload.php";
require_once "vendor/econea/nusoap/src/nusoap.php";

class ClienteSOAP {
    private $cliente;
    private $urlWsdl = "http://localhost/webservices/clase4/invocar.php?wsdl";

    public function __construct() {
        $this->cliente = new nusoap_client($this->urlWsdl, true);
        $error = $this->cliente->getError();
        if ($error) {
            throw new Exception("Error en el constructor: " . $error);
        }
    }

    public function ejecutarOperacion($metodo, $num1, $num2) {
        $result = $this->cliente->call("Servidor." . $metodo, array("num1" => $num1, "num2" => $num2));
        if ($this->cliente->fault) {
            return ["error" => "Fault", "detalle" => $result];
        } else {
            $error = $this->cliente->getError();
            if ($error) {
                return ["error" => "Error", "detalle" => $error];
            } else {
                return ["resultado" => $result];
            }
        }
    }
}

try {
    $clienteSOAP = new ClienteSOAP();

    $operaciones = ["Sumar", "Restar", "Multiplicar", "Dividir"];
    $num1 = 10;
    $num2 = 5;

    foreach ($operaciones as $operacion) {
        $respuesta = $clienteSOAP->ejecutarOperacion($operacion, $num1, $num2);
        echo "<h2>" . $operacion . "</h2><pre>";
        print_r($respuesta);
        echo "</pre>";
    }

    // Prueba de división por cero
    $respuestaDivisionCero = $clienteSOAP->ejecutarOperacion("Dividir", 10, 0);
    echo "<h2>División por Cero</h2><pre>";
    print_r($respuestaDivisionCero);
    echo "</pre>";

} catch (Exception $e) {
    echo "<h2>Excepción</h2><pre>" . $e->getMessage() . "</pre>";
}

?>