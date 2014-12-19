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
$headers = 'From: contact@jordan-delamotte.com' . "\r\n" .
    'Reply-To: contacct@jordan-delamotte.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
