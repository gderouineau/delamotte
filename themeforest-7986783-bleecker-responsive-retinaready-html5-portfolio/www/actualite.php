<?php
/**
 * Created by PhpStorm.
 * User: GD
 * Date: 21/09/2014
 * Time: 23:05
 */


try{
    $db = new PDO('mysql:host=mysql51-136.perso;dbname=jordandefmbdd', 'jordandefmbdd', 'hgz5pTRuktht');
}
catch (PDOException $e) {
    echo "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
$query = 'SELECT * FROM actualite';
$result = $db->query($query);
$data = $result->fetch();
echo $data;


?>
