<?php 
    // BASE_URL dinámico: Railway o local
    define("BASE_URL", getenv("APP_URL") ?: "http://localhost:8090");

    // Zona horaria
    date_default_timezone_set('America/Lima');

    // Datos de conexión a Base de Datos (usa getenv o valores por defecto en local)
    define("DB_HOST", getenv("DB_HOST") ?: "switchback.proxy.rlwy.net");
    define("DB_PORT", getenv("DB_PORT") ?: "38987");
    define("DB_NAME", getenv("DB_DATABASE") ?: "railway");
    define("DB_USER", getenv("DB_USERNAME") ?: "root");
    define("DB_PASSWORD", getenv("DB_PASSWORD") ?: "snaxrNdnVaqWYUTLKmgOzwHHGbEHZrkD");
    define("DB_CHARSET", "utf8mb4");

    // Para envío de correo
    const ENVIRONMENT = 1; // Local: 0, Producción: 1;

    // Delimitadores decimal y millar
    const SPD = ".";
    const SPM = ",";

    // Símbolo de moneda
    const SMONEY = "$";
    const CURRENCY = "USD";

    // Api PayPal
    const URLPAYPAL = "https://api-m.sandbox.paypal.com";
    const IDCLIENTE = "";
    const SECRET = "";
    // LIVE PAYPAL
    // const URLPAYPAL = "https://api-m.paypal.com";
    // const IDCLIENTE = "";
    // const SECRET = "";

    // Datos envío de correo
    const NOMBRE_REMITENTE = "Tienda Virtual";
    const EMAIL_REMITENTE = "felben.tk@gmail.com";
    const NOMBRE_EMPESA = "Tienda Virtual";
    const WEB_EMPRESA = "www.felixangulonizama.site";

    const DESCRIPCION = "La mejor tienda en línea con artículos de moda.";
    const SHAREDHASH = "TiendaVirtual";

    // Datos Empresa
    const DIRECCION = "Avenida las Américas Zona 13, Guatemala";
    const TELEMPRESA = "+(502)78787845";
    const WHATSAPP = "+50278787845";
    const EMAIL_EMPRESA = "info@felix.com";
    const EMAIL_PEDIDOS = "info@felix.com"; 
    const EMAIL_SUSCRIPCION = "info@felix.com";
    const EMAIL_CONTACTO = "info@felix.com";

    const CAT_SLIDER = "1,2,3";
    const CAT_BANNER = "4,5,6";
    const CAT_FOOTER = "1,2,3,4,5";

    // Datos para Encriptar / Desencriptar
    const KEY = 'felix';
    const METHODENCRIPT = "AES-128-ECB";

    // Envío
    const COSTOENVIO = 5;

    // Módulos
    const MDASHBOARD = 1;
    const MUSUARIOS = 2;
    const MCLIENTES = 3;
    const MPRODUCTOS = 4;
    const MPEDIDOS = 5;
    const MCATEGORIAS = 6;
    const MSUSCRIPTORES = 7;
    const MDCONTACTOS = 8;
    const MDPAGINAS = 9;

    // Páginas
    const PINICIO = 1;
    const PTIENDA = 2;
    const PCARRITO = 3;
    const PNOSOTROS = 4;
    const PCONTACTO = 5;
    const PPREGUNTAS = 6;
    const PTERMINOS = 7;
    const PSUCURSALES = 8;
    const PERROR = 9;

    // Roles
    const RADMINISTRADOR = 1;
    const RSUPERVISOR = 2;
    const RCLIENTES = 3;

    const STATUS = array('Completo','Aprobado','Cancelado','Reembolsado','Pendiente','Entregado');

    // Productos por página
    const CANTPORDHOME = 8;
    const PROPORPAGINA = 4;
    const PROCATEGORIA = 4;
    const PROBUSCAR = 4;

    // Redes sociales
    const FACEBOOK = "https://www.facebook.com/felix";
    const INSTAGRAM = "https://www.instagram.com/febel24/";
?>
