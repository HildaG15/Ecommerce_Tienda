<?php
// debug_env.php - Verificar variables de entorno
echo "<h2>Debug de Variables de Entorno</h2>";
echo "<h3>Variables MySQL de Railway:</h3>";
echo "MYSQLHOST: <strong>" . (getenv("MYSQLHOST") ?: "NO CONFIGURADO") . "</strong><br>";
echo "MYSQLPORT: <strong>" . (getenv("MYSQLPORT") ?: "NO CONFIGURADO") . "</strong><br>";
echo "MYSQLDATABASE: <strong>" . (getenv("MYSQLDATABASE") ?: "NO CONFIGURADO") . "</strong><br>";
echo "MYSQLUSER: <strong>" . (getenv("MYSQLUSER") ?: "NO CONFIGURADO") . "</strong><br>";
echo "MYSQLPASSWORD: <strong>" . (getenv("MYSQLPASSWORD") ? "CONFIGURADO" : "NO CONFIGURADO") . "</strong><br>";

echo "<h3>Todas las variables de entorno:</h3>";
echo "<pre>";
foreach ($_ENV as $key => $value) {
    if (strpos(strtolower($key), 'mysql') !== false || strpos(strtolower($key), 'db') !== false) {
        if (strpos(strtolower($key), 'password') !== false) {
            echo "$key = ***OCULTO***\n";
        } else {
            echo "$key = $value\n";
        }
    }
}
echo "</pre>";

// También verificar $_SERVER
echo "<h3>Variables en \$_SERVER:</h3>";
echo "<pre>";
foreach ($_SERVER as $key => $value) {
    if (strpos(strtolower($key), 'mysql') !== false || strpos(strtolower($key), 'db') !== false) {
        if (strpos(strtolower($key), 'password') !== false) {
            echo "$key = ***OCULTO***\n";
        } else {
            echo "$key = $value\n";
        }
    }
}
echo "</pre>";
?>