<?php
/**
 * Created by PhpStorm.
 * User: GD
 * Date: 19/09/2014
 * Time: 13:25
 */

if(isset($_POST['title']) && isset($_POST['text'])){

    $photo = "";
    if(isset($_POST['photo'])){
        $photo = $_POST['photo'];
    }
    $date = $_POST['date'];
    $title = $_POST['title'];
    $text = $_POST['text'];

    try{
        $db = new PDO('mysql:host=mysql51-136.perso;dbname=jordandefmbdd', 'jordandefmbdd', 'hgz5pTRuktht');
    }
    catch (PDOException $e) {
        echo "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    $query='INSERT INTO newsletter VALUES (null,\''.$email.'\')';
    $insert = $db->query($query);
    echo 'success';

}
else{
    echo 'missing data';
}