<?php
/**
 * Created by PhpStorm.
 * User: GD
 * Date: 21/09/2014
 * Time: 23:05
 */


$nb_of_photo = 9;

if($_GET['photo_id'] != NULL) {
    $id=$_GET['photo_id'];
    $db = new PDO('mysql:host=mysql51-136.perso;dbname=jordandefmbdd', 'jordandefmbdd', 'hgz5pTRuktht');
    $query = 'SELECT * FROM photos ORDER BY id DESC LIMIT '.($id*$nb_of_photo).','.$nb_of_photo;
    $result = $db->query($query);
    $data = $result->fetchAll(PDO::FETCH_OBJ);
    //echo json_encode('{"query":'.$query.'}');
    echo json_encode($data);
}


else{echo json_encode('{"test":'+$_GET["photo_id"]+'}');}

?>
