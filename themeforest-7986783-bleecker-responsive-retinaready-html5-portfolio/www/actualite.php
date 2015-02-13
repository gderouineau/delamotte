<?php
/**
 * Created by PhpStorm.
 * User: GD
 * Date: 21/09/2014
 * Time: 23:05
 */


if($_GET['actu_id'] != NULL) {
    $id=$_GET['actu_id'];
    $db = new PDO('mysql:host=mysql51-136.perso;dbname=jordandefmbdd', 'jordandefmbdd', 'hgz5pTRuktht');
    $query = 'SELECT * FROM actualite ORDER BY id DESC LIMIT '.($id*6).',6';
    $result = $db->query($query);
    $data = $result->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($data);
}


else{echo json_encode('{"test":'+$_GET["actu_id"]+'}');}

?>
