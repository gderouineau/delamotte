<?php
/**
 * Created by PhpStorm.
 * User: GD
 * Date: 21/09/2014
 * Time: 23:05
 */



$db = new PDO('mysql:host=mysql51-136.perso;dbname=jordandefmbdd', 'jordandefmbdd', 'hgz5pTRuktht');
$query = 'SELECT * FROM actualite';
$result = $db->query($query);
$data = $result->fetchAll(PDO::FETCH_OBJ);
echo json_encode($data);




?>
