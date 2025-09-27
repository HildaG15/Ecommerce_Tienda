<?php
// debug_env.php - Verificar variables de entorno
echo "<h2>Debug de Variables de Entorno</h2>";
echo "<h3>Variables MySQL de Railway:</h3>";
echo "MYSQL_PUBLIC_URL: <strong>" . (getenv("MYSQL_PUBLIC_URL") ?: "NO CONFIGURADO") . "</strong><br>";
echo "MYSQLHOST: <strong>" . (getenv("MYSQLHOST") ?: "NO CONFIGURADO") . "</strong><br>";
echo "MYSQLPORT: <strong>" . (getenv("MYSQLPORT") ?: "NO CONFIGURADO") . "</strong><br>";
echo "MYSQLDATABASE: <strong>" . (getenv("MYSQLDATABASE") ?: "NO CONFIGURADO") . "</strong><br>";
echo "MYSQLUSER: <strong>" . (getenv("MYSQLUSER") ?: "NO CONFIGURADO") . "</strong><br>";
echo "MYSQLPASSWORD: <strong>" . (getenv("MYSQLPASSWORD") ? "CONFIGURADO" : "NO CONFIGURADO") . "</strong><br>";

echo "<h3>Todas las variables disponibles:</h3>";
echo "<pre>";
foreach ($_SERVER as $key => $value) {
    if (strpos(strtolower($key), 'mysql') !== false || 
        strpos(strtolower($key), 'db') !== false) {
        if (strpos(strtolower($key), 'password') !== false || 
            strpos(strtolower($key), 'url') !== false) {
            echo "$key = ***OCULTO***\n";
        } else {
            echo "$key = $value\n";
        }
    }
}
echo "</pre>";
?>