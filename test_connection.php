<?php
// Script de prueba de conexión - test_connection.php
echo "<h2>Prueba de conexión a la base de datos</h2>";

// Mostrar variables de entorno
echo "<h3>Variables de entorno:</h3>";
echo "MYSQLHOST: " . getenv("MYSQLHOST") . "<br>";
echo "MYSQLPORT: " . getenv("MYSQLPORT") . "<br>";
echo "MYSQLDATABASE: " . getenv("MYSQLDATABASE") . "<br>";
echo "MYSQLUSER: " . getenv("MYSQLUSER") . "<br>";
echo "MYSQLPASSWORD: " . (getenv("MYSQLPASSWORD") ? "***CONFIGURADO***" : "NO CONFIGURADO") . "<br>";

// Intentar conexión directa
$host = getenv("MYSQLHOST") ?: "switchback.proxy.rlwy.net";
$port = getenv("MYSQLPORT") ?: "38987";
$dbname = getenv("MYSQLDATABASE") ?: "railway";
$user = getenv("MYSQLUSER") ?: "root";
$password = getenv("MYSQLPASSWORD") ?: "snaxrNdnVaqWYUTLKmgOzwHHGbEHZrkD";

$connectionString = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";

echo "<h3>Intentando conexión...</h3>";
echo "Connection String: $connectionString<br>";
echo "Usuario: $user<br>";

try {
    $pdo = new PDO($connectionString, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_TIMEOUT => 30
    ]);
    
    echo "<div style='color: green; font-weight: bold;'>✓ CONEXIÓN EXITOSA</div>";
    
    // Probar una consulta simple
    $stmt = $pdo->query("SELECT 1 as test");
    $result = $stmt->fetch();
    echo "Consulta de prueba: " . $result['test'] . "<br>";
    
} catch (PDOException $e) {
    echo "<div style='color: red; font-weight: bold;'>✗ ERROR DE CONEXIÓN</div>";
    echo "Mensaje: " . $e->getMessage() . "<br>";
    echo "Código: " . $e->getCode() . "<br>";
}

// Verificar extensiones PHP
echo "<h3>Extensiones PHP:</h3>";
echo "PDO: " . (extension_loaded('pdo') ? "✓ Instalado" : "✗ No instalado") . "<br>";
echo "PDO MySQL: " . (extension_loaded('pdo_mysql') ? "✓ Instalado" : "✗ No instalado") . "<br>";
?>