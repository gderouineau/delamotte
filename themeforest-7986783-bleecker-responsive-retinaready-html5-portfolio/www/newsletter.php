<?php
/**
 * Created by PhpStorm.
 * User: GD
 * Date: 21/09/2014
 * Time: 23:05
 */


if(isset($_POST['email'])){
    $email = $_POST['email'];
    $db = new PDO('mysql:host=jordandefmbdd.mysql.db;dbname=jordandefmbdd', 'jordandefmbdd', 'hgz5pTRuktht');
    $result = $db->query('SELECT * FROM newsletter WHERE email = \''.$email.'\'');
    $data = $result->fetch();
    if(count($data) == 0){
        $insert = $db->query('INSERT INTO newsletter VALUES (null,\''.$email.'\')');
        echo 'success';
    }
    else{
        echo 'failed';
    }

}
