<?php
/**
 * Created by PhpStorm.
 * User: GD
 * Date: 19/09/2014
 * Time: 13:25
 */

if(isset($_POST['title']) && isset($_POST['text'])){

    $photo = "";
    if(isset($_FILES["FileInput"]) && $_FILES["FileInput"]["error"]== UPLOAD_ERR_OK){
        $UploadDirectory    = '/images/photos/';
        if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
            die();
        }


        //Is file size is less than allowed size.
        if ($_FILES["FileInput"]["size"] > 5242880) {
            die("File size is too big!");
        }
        switch(strtolower($_FILES['FileInput']['type']))
        {
            //allowed file types
            case 'image/png':
            case 'image/gif':
            case 'image/jpeg':
            case 'image/pjpeg':
            case 'text/plain':
            case 'text/html': //html file
            case 'application/x-zip-compressed':
            case 'application/pdf':
            case 'application/msword':
            case 'application/vnd.ms-excel':
            case 'video/mp4':
                break;
            default:
                die('Unsupported File!'); //output error
        }
        $File_Name          = strtolower($_FILES['FileInput']['name']);
        $File_Ext           = substr($File_Name, strrpos($File_Name, '.'));
        $Random_Number      = rand(0, 9999999999);
        $NewFileName        = $Random_Number.$File_Ext;
        if(move_uploaded_file($_FILES['FileInput']['tmp_name'], $UploadDirectory.$NewFileName ))
        {
            // do other stuff
            $photo = $UploadDirectory.$NewFileName;
        }else{
            die('error uploading File!');
        }


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
    $query='INSERT INTO newsletter
            VALUES (
            null,
            0,
            \''.$title.'\',
            \''.$text.'\',
            \''.$date.'\',
            \''.$photo.'\'
            )';
    $insert = $db->query($query);
    echo 'success';

}
else{
    echo 'missing data';
}