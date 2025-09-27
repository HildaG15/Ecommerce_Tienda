<?php
echo "<h2>Prueba Simple de Conexión</h2>";

// Usando datos directos primero
$host = "switchback.proxy.rlwy.net";
$port = "38987";
$dbname = "railway";
$user = "root";
$password = "snaxrNdnVaqWYUTLKmgOzwHHGbEHZrkD";

echo "Conectando a: $host:$port<br>";
echo "Base de datos: $dbname<br>";
echo "Usuario: $user<br><br>";

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
        PDO::ATTR_TIMEOUT => 30
    ];
    
    $pdo = new PDO($dsn, $user, $password, $options);
    echo "<h3 style='color: green;'>✅ CONEXIÓN EXITOSA!</h3>";
    
    // Probar una consulta
    $stmt = $pdo->query("SELECT 1 as test, NOW() as tiempo");
    $result = $stmt->fetch();
    echo "Consulta de prueba: " . $result['test'] . "<br>";
    echo "Tiempo del servidor: " . $result['tiempo'] . "<br>";
    
} catch (PDOException $e) {
    echo "<h3 style='color: red;'>❌ ERROR DE CONEXIÓN</h3>";
    echo "Mensaje: " . $e->getMessage() . "<br>";
    echo "Código: " . $e->getCode() . "<br>";
}

echo "<h3>Info del sistema:</h3>";
echo "PHP: " . phpversion() . "<br>";
echo "PDO: " . (extension_loaded('pdo') ? "✅" : "❌") . "<br>";
echo "PDO MySQL: " . (extension_loaded('pdo_mysql') ? "✅" : "❌") . "<br>";
?>