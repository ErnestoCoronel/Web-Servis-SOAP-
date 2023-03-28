<?php

/* ESTRUCTURA PARA PODER CONSUMIR NUESTRO PROYECTO
*/

$location = "http://proyect.test/persona-soapservis/InsertCategoria.php?wsdl";

$request = "
<soapenv:Envelope xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:ins=\"InsertCategoriaSOAP\">
   <soapenv:Header/>
   <soapenv:Body>
    <ins:InsertCategoriaService soapenv:encodingStyle=\"http://schemas.xmlsoap.org/soap/encoding/\">
        <InsertCategoria xsi:type=\"ins:InsertCategoria\">
            <!--You may enter the following 3 items in any order-->
        <usu_nom xsi:type=\"xsd:string\">rest</usu_nom>
        <usu_ape xsi:type=\"xsd:string\">restfazt</usu_ape>
        <usu_correo xsi:type=\"xsd:string\">restf@gmail.com</usu_correo>
         </InsertCategoria>
      </ins:InsertCategoriaService>
   </soapenv:Body>
</soapenv:Envelope>
";

print("Request : <br>");
print("<pre>".htmlentities($request)."</pre>");
// etiqueta pre es para leer los xml 
// hmtentities los trae cmo una entidad

$action = "InsertCategoriaService";
$headers = [
'Method: POST',
'Connection: Keep-Alive',
'Accept-Encoding: gzip,deflate',
'User-Agent: PHP-SOAP-CURL',
'Content-Type: text/xml;charset=UTF-8',
'SOAPAction: "http://proyect.test/persona-soapservis/InsertCategoria.php/InsertCategoriaService"',
'Content-Length: 774',
//'Host: proyect.test',
'User-Agent: Apache-HttpClient/4.5.5 (Java/16.0.1)',

];

// SEGUN DOCUMENTACION 
$ch = curl_init($location);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

$response = curl_exec($ch);
$err_status = curl_errno($ch);

print("Request : <br>");
print("<pre>".$response."</pre>");


?>