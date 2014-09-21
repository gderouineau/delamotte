<?php
/**
 * Created by PhpStorm.
 * User: GD
 * Date: 21/09/2014
 * Time: 23:05
 */


if(isset($_POST['email'])){
    $email = $_POST['email'];
    try{
        $db = new PDO('mysql:host=mysql51-136.perso;dbname=jordandefmbdd', 'jordandefmbdd', 'hgz5pTRuktht');
    }
    catch (PDOException $e) {
        echo "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    $query = 'SELECT * FROM newsletter WHERE email=\''.$email.'\'';
    $result = $db->query($query);
    $data = $result->fetch();
    $query='INSERT INTO newsletter VALUES (null,\''.$email.'\')';
    if(count($data) == 1){
        $insert = $db->query($query);
        echo 'success';
    }
    elseif(count($data) != 1){
        echo 'existing';
    }
    else{
        echo 'failed';
    }



}

?>
