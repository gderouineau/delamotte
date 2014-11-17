<?php
/**
 * Created by PhpStorm.
 * User: GD
 * Date: 12/11/14
 * Time: 10:37
 */

session_start();
session_destroy();
$_SESSION = array();
header('location: connexion.php');