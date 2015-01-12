<?php
/**
 * Created by PhpStorm.
 * User: jordandelamotte
 * Date: 19/12/2014
 * Time: 15:28
 */
$id=1;
$email = "chefjordandelamotte@gmail.com";

$html = file_get_contents("newsletter.html");
$html = str_replace("##id##",$id,$html);


$to=$email;
$subject = "Newsletter - jordan-delamotte.com";
$message = $html;
$headers =
    'MIME-Version: 1.0' . "\r\n" .
    'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
    'From: contact@jordan-delamotte.com' . "\r\n" .
    'Reply-To: contacct@jordan-delamotte.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
