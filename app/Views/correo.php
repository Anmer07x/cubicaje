<?php
$paracorrreo ="gilmar019@hotmail.com";
$titulo ="Recuperar contraseña";
$mensaje ="Para recuperar tu contraseña sigue los pasos.";
$tucorreo ="From: cristobapa09@gmail.com";

if(mail($paracorrreo,$titulo,$mensaje,$tucorreo))
{
    echo "Correo enviado";
}else
{
    echo "Error";
}
?>