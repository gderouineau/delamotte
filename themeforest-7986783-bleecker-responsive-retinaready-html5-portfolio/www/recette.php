<?php
/**
 * Created by PhpStorm.
 * User: GD
 * Date: 21/09/2014
 * Time: 23:05
 */


if(($_GET['lang'] != NULL)) {
    $lang=$_GET['lang'];
    $db = new PDO('mysql:host=mysql51-136.perso;dbname=jordandefmbdd', 'jordandefmbdd', 'hgz5pTRuktht');
    $query = 'SELECT * FROM recette WHERE (lang="'.$lang.'") ORDER BY id ASC';
    $result = $db->query($query);
    $data = $result->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($data);
}


?>
