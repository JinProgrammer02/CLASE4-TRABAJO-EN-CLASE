<?php
require_once "conexion.php";
require_once "auth.php"; // Importar autenticación

class Servidor {
    private $db;

    public function __construct() {
        $this->db = (new Conexion())->getConexion();
    }

    // Obtener un producto por ID
    public function obtenerProducto($id, $token) {
        if (!Auth::autenticar($token)) {
            return ["error" => "Token inválido"];
        }

        $stmt = $this->db->prepare("SELECT id, nombre, precio, stock FROM productos WHERE id = ?");
        $stmt->execute([$id]);
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);

        return $producto ? [
            'id' => (int)$producto['id'],
            'nombre' => $producto['nombre'],
            'precio' => (float)$producto['precio'],
            'stock' => (int)$producto['stock']
        ] : ["error" => "Producto no encontrado"];  
    }

    // Agregar un nuevo producto
    public function agregarProducto($nombre, $precio, $stock, $token) {
        if (!Auth::autenticar($token)) {
            return "Token inválido";
        }
    
        $stmt = $this->db->prepare("INSERT INTO productos (nombre, precio, stock) VALUES (?, ?, ?)");
        $resultado = $stmt->execute([$nombre, $precio, $stock]);
    
        return $resultado ? "Producto agregado con éxito" : "Error al agregar producto";
    }

    // Actualizar un producto
    public function actualizarProducto($id, $nombre, $precio, $stock, $token) {
        if (!Auth::autenticar($token)) {
            return ["error" => "Token inválido"];
        }

        $stmt = $this->db->prepare("UPDATE productos SET nombre = ?, precio = ?, stock = ? WHERE id = ?");
        $resultado = $stmt->execute([$nombre, $precio, $stock, $id]);

        return $resultado ? "Producto actualizado correctamente" : "Error al actualizar producto";
    }

    // Eliminar un producto
    public function eliminarProducto($id, $token) {
        if (!Auth::autenticar($token)) {
            return ["error" => "Token inválido"];
        }

        $stmt = $this->db->prepare("DELETE FROM productos WHERE id = ?");
        $resultado = $stmt->execute([$id]);

        return $resultado ? "Producto eliminado correctamente" : "Error al eliminar producto";
    }
}
?>
