<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

/*----------------------*/
$cuerpo ='';
/*----------------------*/

/*----------------------*/
$error = '';
$empresa = '';
$direccionEmpresa = '';
$giroIndustrial = '';
$proyecto ='';
$personaContacto ='';
$telefono ='';
$correo ='';
/*----------------------*/

/*----------------------*/
$agua ='';
/*----------------------*/

/*----------------------*/
$procesamiento ='';

/*-- Validacion --*/
$gpm = '';
$cantidadGPMDia ='';
$horasTrabajoGPM ='';

/*-- Validacion --*/
$lpm = '';
$cantidadLPMDia ='';
$horasTrabajoLPM ='';
/*----------------------*/

/*----------------------*/
$separacion ='';

/*Validacion*/
$cromo ='';
$cianuro ='';
/*----------------------*/

/*Archivo adjunto*/

/*----------------------*/
$quimicos ='';
$arrayQuimicos ='';
$otrosQuimicos ='';
/*----------------------*/

/*----------------------*/
$tds ='';
$ph ='';
$temperatura ='';
/*----------------------*/

/*----------------------*/
$normaOficial ='';
/*----------------------*/

/*----------------------*/
$reutilizar ='';

/*Validacion*/
$cantidadPuntosDescarga ='';
/*----------------------*/

/*----------------------*/
$importante ='';
/*----------------------*/

/*----------------------*/
$captcha = '';
/*----------------------*/

//CONFIGURAR PARAMETROS, LEER, EVALUAR Y ENVIAR reCaptcha V2
/*function post_captcha($user_response) {
    $fields_string = '';
    $fields = array(
        'secret' => 'mi-clave-secreta',
        'response' => $user_response
    );
    foreach($fields as $key=>$value)
    $fields_string .= $key . '=' . $value . '&';
    $fields_string = rtrim($fields_string, '&');

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

    $result = curl_exec($ch);
    curl_close($ch);

    return json_decode($result, true);
}

//VALIDAR reCaptcha V2
if(empty($_POST['g-recaptcha-response']))
{
    $error .= 'Completa el reCaptcha <br>';
}
else
{
    $captcha = $_POST["g-recaptcha-response"];
}*/

//VALIDAR NOMBRE DE EMPRESA
if(empty($_POST["empresa"]))
{
    $error .= 'Ingresa el nombre de su empresa <br>';
}
else
{
    $empresa = $_POST["empresa"];
    $empresa = filter_var($empresa, FILTER_SANITIZE_STRING);
    $empresa = trim($empresa);

    if($empresa == '')
    {
        $error .= 'Empresa no puede estár vacío </br>';
    }
}

//VALIDAR DIRECCIÓN DE EMPRESA
if(empty($_POST["direccionEmpresa"]))
{
    $error .= 'Ingresa la dirección de su empresa <br>';
}
else
{
    $direccionEmpresa = $_POST["direccionEmpresa"];
    $direccionEmpresa = filter_var($direccionEmpresa, FILTER_SANITIZE_STRING);
    $direccionEmpresa = trim($direccionEmpresa);

    if($direccionEmpresa == '')
    {
        $error .= 'Dirección empresa no puede estár vacío </br>';
    }
}

//VALIDAR GIRO INDUSTRIAL
if(empty($_POST["giroIndustrial"]))
{
    $error .= 'Ingresa el giro industrial <br>';
}
else
{
    $giroIndustrial = $_POST["giroIndustrial"];
    $giroIndustrial = filter_var($giroIndustrial, FILTER_SANITIZE_STRING);
    $giroIndustrial = trim($giroIndustrial);

    if($giroIndustrial == '')
    {
        $error .= 'Giro industrial no puede estár vacío </br>';
    }
}

//VALIDAR NOMBRE PROYECTO
if(empty($_POST["proyecto"]))
{
    $error .= 'Ingresa el nombre del proyecto <br>';
}
else
{
    $proyecto = $_POST["proyecto"];
    $proyecto = filter_var($proyecto, FILTER_SANITIZE_STRING);
    $proyecto = trim($proyecto);

    if($proyecto == '')
    {
        $error .= 'Nombre de proyecto no puede estár vacío </br>';
    }
}

//VALIDAR PERSONA CONTACTO
if(empty($_POST["personaContacto"]))
{
    $error .= 'Ingresa el nombre de una persona de contacto <br>';
}
else
{
    $personaContacto = $_POST["personaContacto"];
    $personaContacto = filter_var($personaContacto, FILTER_SANITIZE_STRING);
    $personaContacto = trim($personaContacto);

    if($personaContacto == '')
    {
        $error .= 'Persona de contacto no puede estár vacío </br>';
    }
}

//VALIDAR TELÉFONO PERSONA CONTACTO
if(empty($_POST["telefono"]))
{
    $error .= 'Ingresa el telefono de una persona de contacto <br>';
}
else
{
    $telefono = $_POST["telefono"];
    $telefono = filter_var($telefono, FILTER_SANITIZE_STRING);
    $telefono = trim($telefono);

    if($telefono == '')
    {
        $error .= 'Teléfono de contacto no puede estár vacío </br>';
    }
}

//VALIDAR ESTRUCTURA DE EMAIL PERSONA CONTACTO
if(empty($_POST["correo"]))
{
    $error .= 'Ingresa un correo <br>';
}
else
{
    $correo = $_POST["correo"];

    if(!filter_var($correo, FILTER_VALIDATE_EMAIL))
    {
        $error .= 'correo inválido, verifica su estructura';
    }
    else
    {
        $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);
    }
}

//VALIDAR RADIO BUTTON ---> SELECCIÓN ORIGEN AGUA
if(empty($_POST["agua"]))
{
    $error .= 'Selecciona el origen del agua <br>';
}
else
{
    $agua = $_POST["agua"];
    $agua = filter_var($agua, FILTER_SANITIZE_STRING);
    $agua = trim($agua);

    if($agua == '')
    {
        $error .= 'Origen del agua no puede estár vacío </br>';
    }
}

//VALIDAR RADIO BUTTON ---> SELECCIÓN GPM / LPM
if(empty($_POST["procesamiento"]))
{
    $error .= 'Selecciona el tipo de procesamiento de agua <br>';
}
else
{
    $procesamiento = $_POST["procesamiento"];
    $procesamiento = filter_var($procesamiento, FILTER_SANITIZE_STRING);
    $procesamiento = trim($procesamiento);

    if($procesamiento == '')
    {
        $error .= 'Elija un tipo de procesamiento </br>';
    }
}

//VALIDAR INPUTS SELECCIÓN GPM / LPM ---> GPD / HORAS TRABAJO
switch ($procesamiento)
{
    case "GPM":

                if(empty($_POST["cantidadGPMDia"]) && empty($_POST["horasTrabajoGPM"]))
                {
                    $error .= 'Ingrese la cantidad de GPD y Horas de trabajo <br>';
                }
                else if(((is_numeric($_POST["cantidadGPMDia"])) && (is_numeric($_POST["horasTrabajoGPM"]))) > 0)
                {
                    $cantidadGPMDia = $_POST["cantidadGPMDia"];
                    $cantidadGPMDia = filter_var($cantidadGPMDia, FILTER_SANITIZE_STRING);
                    $cantidadGPMDia = trim($cantidadGPMDia);

                    if($cantidadGPMDia == '')
                    {
                        $error .= 'Cantidad GPM/Dia no puede estár vacío </br>';
                    }

                    $horasTrabajoGPM = $_POST["horasTrabajoGPM"];
                    $horasTrabajoGPM = filter_var($horasTrabajoGPM, FILTER_SANITIZE_STRING);
                    $horasTrabajoGPM = trim($horasTrabajoGPM);

                    if($horasTrabajoGPM == '')
                    {
                        $error .= 'Cantidad horas de trabajo no puede estár vacío </br>';
                    }
                }
                else
                {
                    $error .= ' Opción no disponible, seleccione ( GPM / LPM) <br>';
                }
    
                break;
    
    case "LPM":

                if(empty($_POST["cantidadLPMDia"]) && empty($_POST["horasTrabajoLPM"]))
                {
                    $error .= 'Ingrese la cantidad de GPD y Horas de trabajo <br>';
                }
                else if(((is_numeric($_POST["cantidadLPMDia"])) && (is_numeric($_POST["horasTrabajoLPM"]))) > 0)
                {
                    $cantidadLPMDia = $_POST["cantidadLPMDia"];
                    $cantidadLPMDia = filter_var($cantidadLPMDia, FILTER_SANITIZE_STRING);
                    $cantidadLPMDia = trim($cantidadLPMDia);

                    if($cantidadLPMDia == '')
                    {
                        $error .= 'Cantidad LPM/Dia no puede estár vacío </br>';
                    }

                    $horasTrabajoLPM = $_POST["horasTrabajoLPM"];
                    $horasTrabajoLPM = filter_var($horasTrabajoLPM, FILTER_SANITIZE_STRING);
                    $horasTrabajoLPM = trim($horasTrabajoLPM);

                    if($horasTrabajoLPM == '')
                    {
                        $error .= 'Cantidad horas de trabajo no puede estár vacío </br>';
                    }
                }
                else
                {
                    $error .= ' Verifica los campos de LPD y horas de trabajo <br>';
                }

                break;

    default:

                $error .= ' Opción no disponible, seleccione ( GPM / LPM) <br>';

                break;
}

//VALIDAR RADIO BUTTON ---> SELECCIÓN CROMO Y/O CIANURO
if(empty($_POST["separacion"]))
{
    $error .= 'Selecciona si separan efluentes con Cromo y/o Cianuro <br>';
}
else
{
    $separacion = $_POST["separacion"];
    $separacion = filter_var($separacion, FILTER_SANITIZE_STRING);
    $separacion = trim($separacion);

    if($separacion == '')
    {
        $error .= 'Elija un tipo de separacion </br>';
    }
}

//VALIDAR INPUTS SELECCIÓN ---> SELECCIÓN CROMO Y/O CIANURO
switch ($separacion)
{
    case "Si":
    
                if((empty($_POST["cromo"]) || empty($_POST["cianuro"])) || (empty($_POST["cromo"]) && empty($_POST["cianuro"])))
                {
                    $error .= 'Ingrese la cantidad de efluente de Cromo y/o Cianuro <br>';
                }
                else if((((is_numeric($_POST["cromo"])) || (is_numeric($_POST["cianuro"]))) > 0) || (((is_numeric($_POST["cromo"])) && (is_numeric($_POST["cianuro"]))) > 0))
                {
                    $cromo = $_POST["cromo"];
                    $cromo = filter_var($cromo, FILTER_SANITIZE_STRING);
                    $cromo = trim($cromo);

                    if($cromo == '')
                    {
                        $error .= 'Cantidad efluente Cromo no puede estár vacío </br>';
                    }

                    $cianuro = $_POST["cianuro"];
                    $cianuro = filter_var($cianuro, FILTER_SANITIZE_STRING);
                    $cianuro = trim($cianuro);

                    if($cianuro == '')
                    {
                        $error .= 'Cantidad efluente Cianuro no puede estár vacío </br>';
                    }
                }

                else
                {
                    $error .= ' Verifica los campos de GPD y horas de trabajo <br>';
                }

                break;

    default:    $error .= ' Opción no disponible, complete (Cianuro y/o cromo) <br>';

                break;
}

//VALIDANDO ARCHIVO ADJUNTO

/*function restructureArray(array $arr)
{
    $result = array();
    foreach ($arr as $key => $value) {
        for ($i = 0; $i < count($value); $i++) {
            $result[$i][$key] = $value[$i];
        }
    }
    return $result;
}

$files = [];
if (!empty($_FILES['user_file'])) {
    $files = restructureArray($_FILES['user_file']);
}*/  

echo '<pre>';
var_dump($_FILES['archivo']);
echo '</pre>';

if(!empty($_FILES))
{
    $nombre_archivo = $_FILES['archivo']['name'];
        
    $ruta_destino = $_FILES['archivo']['tmp_name'];

    $tipo_archivo = $_FILES['archivo']['type'];

    if(($tipo_archivo == 'image/png') || ($tipo_archivo == 'image/jpeg') || ($tipo_archivo == 'image/jpg') || ($tipo_archivo == 'application/pdf'))
    { 
        echo "$nombre_archivo";
        echo "\n";
        echo "$tipo_archivo";
        echo "\n";
        echo "$ruta_destino";
        echo "\n";

        move_uploaded_file($ruta_destino, $nombre_archivo);

        //move_uploaded_file($nombre_archivo, $ruta_destino);
    }
}
else
{
    $error .= 'Adjunte un archivo válido: (PNG, JPEG, JPG o PDF) <br>';
}

//VALIDANDO QUÍMICOS
if(empty($_POST['quimicos']))
{
    $error .= 'Selecciona al menos un químico <br>';
}
else
{
    $quimicos = $_POST['quimicos'];

    foreach($quimicos as $item)
    {
        $arrayQuimicos .= $item.', ';
    }

    $arrayQuimicos = filter_var($arrayQuimicos, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}

//VALIDANDO otrosQuimicos
$otrosQuimicos = $_POST["otrosQuimicos"];
$otrosQuimicos = filter_var($otrosQuimicos, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$otrosQuimicos = trim($otrosQuimicos);

//VALIDANDO TDS (TOTAL SÓLIDOS DISUELTOS)
if(empty($_POST["tds"])){
    $error .= 'Ingresa el TDS <br>';
}
else if(is_numeric($_POST["tds"]))
{     
    $tds = $_POST["tds"];

    if($tds > 0)
    {
        $tds = filter_var($tds, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        $tds = trim($tds);
    }
    else if($tds < 0)
    {
        $error .= 'El <b>TDS</b> no puede ser negativo <br>';
    }
    else if($tds == 0)
    {
        $error .= 'El <b>TDS</b> no puede ser cero (0) <br>';
    }
}
else
{
    $error .= 'El <b>TDS</b> no puede tener letras  <br>';
}

//VALIDAR pH
if(empty($_POST["ph"]))
{
    $error .= 'Ingresa el pH <br>';
}
else if (is_numeric(($_POST["ph"])))
    
    $ph = $_POST["ph"];

    if(($ph >= 0) && ($ph <= 14))
    {
        $ph = filter_var($ph, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        $ph = trim($ph);
    }
    else if($ph < 0)
    {
        $error .= 'El pH no puede ser negativo <br>';
    }
    else if($ph > 14)
    {
        $error .= 'El pH no puede ser mayor a 14 <br>';
    }
else
{
    $error .= 'El pH no puede tener letras <br>';
}

//VALIDAR TEMPERATURA
if(empty($_POST["temperatura"])){
    $error .= 'Ingresa la temperatura <br>';
}
else if(is_numeric(($_POST["temperatura"]))){ 
    
    $temperatura = $_POST["temperatura"];
     
    if($temperatura > 0)
    {
        $temperatura = filter_var($temperatura, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        $temperatura = trim($temperatura);
    }
    else if($temperatura == 0)
    {
        $error .= 'La temperatura no puede ser cero (0) <br>';
    }
    else if($temperatura < 0)
    {
        $error .= 'La temperatura no puede ser menor a cero (0) <br>';
    }
}
else
{
    $error .= 'La temperatura no puede tener letras <br>';
}

//VALIDAR normaOficial
if(empty($_POST["normaOficial"]))
{
    $error .= 'Ingresa alguna norma oficial breve <br>';
}
else
{
    $normaOficial = $_POST["normaOficial"];
    $normaOficial = filter_var($normaOficial, FILTER_SANITIZE_STRING);
    $normaOficial = trim($normaOficial);

    if($normaOficial == '')
    {
        $error .= 'Norma oficial no puede estár vacío </br>';
    }
}

//VALIDAR RADIO BUTTON ---> REUTILIZACIÓN DE EFLUENTE
if(empty($_POST["reutilizar"]))
{
    $error .= 'Selecciona si desea reutilizar efluente (Si/No) <br>';
}
else
{
    $reutilizar = $_POST["reutilizar"];
    $reutilizar = filter_var($reutilizar, FILTER_SANITIZE_STRING);
    $reutilizar = trim($reutilizar);

    if($reutilizar == '')
    {
        $error .= 'Selecciona si desea reutilizar efluente (Si/No) Input</br>';
    }
}

//VALIDAR INPUTS REUTILIZACIÓN DE EFLUENTE ---> PUNTOS DE DESCARGA
switch ($reutilizar)
{
    case "No quiero reutilizar":
    
                if(empty($_POST["cantidadPuntosDescarga"]))
                {
                    $error .= 'Ingrese la cantidad de puntos de descarga <br>';
                }
                else if((is_numeric($_POST["cantidadPuntosDescarga"])) > 0)
                {
                    $cantidadPuntosDescarga = $_POST["cantidadPuntosDescarga"];
                    $cantidadPuntosDescarga = filter_var($cantidadPuntosDescarga, FILTER_SANITIZE_STRING);
                    $cantidadPuntosDescarga = trim($cantidadPuntosDescarga);

                    if($cantidadPuntosDescarga == '')
                    {
                        $error .= 'Cantidad puntos de descarga no puede estár vacío </br>';
                    }
                }

                else
                {
                    $error .= ' Verifica los puntos de descarga <br>';
                }

                break;

    default:    $error .= ' Opción no disponible, complete (puntos de descarga) <br>';

                break;
}

//VALIDAR normaOficial
if(empty($_POST["importante"]))
{
    $error .= 'Ingresa un comentario <br>';
}
else
{
    $importante = $_POST["importante"];
    $importante = filter_var($importante, FILTER_SANITIZE_STRING);
    $importante = trim($importante);

    if($importante == '')
    {
        $error .= 'La última pregunta no puede estár vacía </br>';
    }
}

//ESTRUCTURANDO EMAIL
$cuerpo .= "Nombre de Empresa: ";
$cuerpo .= $empresa;
$cuerpo .= "<br>";

$cuerpo .= "Dirección Industria: ";
$cuerpo .= $direccionEmpresa;
$cuerpo .= "<br>";

$cuerpo .= "Giro Industrial: ";
$cuerpo .= $giroIndustrial;
$cuerpo .= "<br>";

$cuerpo .= "Nombre Proyecto: ";
$cuerpo .= $proyecto;
$cuerpo .= "<br>";

$cuerpo .= "Nombre Persona de Contacto: ";
$cuerpo .= $personaContacto;
$cuerpo .= "<br>";

$cuerpo .= "Teléfono Persona de Contacto: ";
$cuerpo .= $telefono;
$cuerpo .= "<br>";

$cuerpo .= "Correo Persona de Contacto: ";
$cuerpo .= $correo;
$cuerpo .= "<br>";

$cuerpo .= "<hr>";

$cuerpo .= "Origen del Agua: ";
$cuerpo .= $agua;
$cuerpo .= "<br>";

/*GPD*/
$cuerpo .= "Unidad de Procesamiento: ";
$cuerpo .= $procesamiento;
$cuerpo .= "<br>";

$cuerpo .= "Cantidad de GPD: ";
$cuerpo .= $cantidadGPMDia;
$cuerpo .= "<br>";

$cuerpo .= "Horas de Trabajo al Día: ";
$cuerpo .= $horasTrabajoGPM;
$cuerpo .= "<br>";

/*LPD*/
$cuerpo .= "Unidad de Procesamiento: ";
$cuerpo .= $procesamiento;
$cuerpo .= "<br>";

$cuerpo .= "Cantidad de LPD: ";
$cuerpo .= $cantidadLPMDia;
$cuerpo .= "<br>";

$cuerpo .= "Horas de Trabajo al Día: ";
$cuerpo .= $horasTrabajoLPM;
$cuerpo .= "<br>";

$cuerpo .= "<hr>";

$cuerpo .= "¿Separan efluentes con Cianuro y/o Cromo?: ";
$cuerpo .= $separacion;
$cuerpo .= "<br>";

$cuerpo .= "Cantidad GPM de Cianuro: ";
$cuerpo .= $cianuro;
$cuerpo .= "<br>";

$cuerpo .= "Cantidad GPM de Cromo: ";
$cuerpo .= $cromo;
$cuerpo .= "<br>";

$cuerpo .= "<hr>";

$cuerpo .= "Químicos Detectados en Análisis de Efluente: ";
$cuerpo .= $arrayQuimicos;
$cuerpo .= "<br>";

$cuerpo .= "Otros Químicos Detectados en Análisis de Efluente: ";
$cuerpo .= $otrosQuimicos;
$cuerpo .= "<br>";

$cuerpo .= "<hr>";

$cuerpo .= "Total de Sólidos Disueltos: ";
$cuerpo .= $tds;
$cuerpo .= "<br>";

$cuerpo .= "pH: ";
$cuerpo .= $ph;
$cuerpo .= "<br>";

$cuerpo .= "Temperatura: ";
$cuerpo .= $temperatura;
$cuerpo .= "<br>";

$cuerpo .= "<hr>";

$cuerpo .= "Normas Oficiales y/o Ecológicas Requeridas: ";
$cuerpo .= $normaOficial;
$cuerpo .= "<br>";

$cuerpo .= "<hr>";

$cuerpo .= "¿Desea Reutilizar el Efluente?: ";
$cuerpo .= $reutilizar;
$cuerpo .= "<br>";

$cuerpo .= " Cantidad puntos de descarga : ";
$cuerpo .= $cantidadPuntosDescarga;
$cuerpo .= "<br>";

$cuerpo .= "<hr>";

$cuerpo .= "¿Qué es lo más importante para usted en un sistema de tratamiento de aguas?: ";
$cuerpo .= $importante;
$cuerpo .= "<br>";

//IMPORTANDO PHPMAILER
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('src/Exception.php');
require('src/PHPMailer.php');
require('src/SMTP.php');

//getcwd()

//CREANDO OBJETO
$mail = new PHPMailer(true);

//ENVIAR CORREO
if($error == '')
{
    try
    {
        //Server settings
        $mail->isSMTP();                                    
        $mail->Host       = 'smtpout.secureserver.net';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'contacto@omarmancilla.tech';
        $mail->Password   = '**********';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
    
        //Recipients
        $mail->setFrom('contacto@omarmancilla.tech', 'Omar Mancilla');
        $mail->addAddress($correo, $personaContacto);

        /*if (!empty($files)) {
            foreach ($files as $key => $file) {
                //Attachments
                $mail->addAttachment(
                    $file['tmp_name'], 
                    $file['name']
                );    // Optional name
            }
        }*/
    
        // Attachments
        $mail->addAttachment($nombre_archivo);
    
        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Formulario: Datos Flujo Continuo';
        $mail->Body    = $cuerpo;

        //$mail->addAttachment($nombre_archivo);

        //$mail->addAttachment($nombre_archivo, $ruta_destino);

        // Codification UTF-8
        $mail->CharSet = 'UTF-8';
    
        $mail->send();

        echo 'exito';

        //unlink($nombre_archivo); //BORRA EL ARCHIVO TEMPORAL DEL SERVIDOR
    }
    
    catch (Exception $e)
    {
        echo "El mensaje no se pudo enviar: {$mail->ErrorInfo}";
    }
}
else
{
    echo $error;
}

unlink($nombre_archivo); //BORRA EL ARCHIVO TEMPORAL DEL SERVIDOR
?>
