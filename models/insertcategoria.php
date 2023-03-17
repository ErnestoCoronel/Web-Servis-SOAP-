<?php

require_once "vendor/econea/nusoap/src/nusoap.php";
$namespace = "RegistroUsuario";
$server = new soap_server();
$server->configureWSDL("SoapService", $namespace);
$server->wsdl->schemaTargetNamespace = $namespace;
?>