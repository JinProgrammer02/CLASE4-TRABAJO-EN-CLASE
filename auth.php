<?php
class Auth {
    private static $tokenHash = '$2y$10$J81qxyzWxyzABC123xyzxyzXYZxyzXYZxyzXYZxyzXYZxyzXYZxyz'; // Reemplázalo con el token generado

    public static function generarToken($secreto) {
        return password_hash($secreto, PASSWORD_BCRYPT);
    }

    public static function autenticar($token) {
        return password_verify($token, self::$tokenHash);
    }
}

// Para probar la generación del token (Ejecutar solo una vez)
// echo Auth::generarToken("mi_token_secreto");
?>
