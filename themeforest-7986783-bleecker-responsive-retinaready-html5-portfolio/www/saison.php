<?php
/**
 * Created by PhpStorm.
 * User: GD
 * Date: 21/09/2014
 * Time: 23:05
 */


if(($_GET['season_id'] != NULL) && ($_GET['lang'] != NULL)) {
    $id=$_GET['season_id'];
    $lang=$_GET['lang'];
    $db = new PDO('mysql:host=mysql51-136.perso;dbname=jordandefmbdd', 'jordandefmbdd', 'hgz5pTRuktht');
    $query = 'SELECT * FROM actualite WHERE (location="saison" AND lang="'.$lang.'") ORDER BY id DESC LIMIT '.($id*6).',6';
    $result = $db->query($query);
    $data = $result->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($data);
}

?>
