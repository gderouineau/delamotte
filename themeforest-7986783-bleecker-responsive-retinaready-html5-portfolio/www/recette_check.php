<?php

$data = array();

$photo = "";
$title = "";
$text  = "";
$date  = date("Y-m-d H:i:s");
$language = 'fr';
$rand = rand(1,99999);
if(isset($_GET['files']))
{
    $error = false;
    $files = array();
    $iWidth = $iHeight = 280; // desired image result dimensions
    $iJpgQuality = 90;

    $uploadDirectory = 'images/recette/';
    foreach($_FILES as $file){
        $base = basename($file['name']);
        $newFileName = $uploadDirectory.'large/'.basename($file['name']);
        if(move_uploaded_file($file['tmp_name'],$newFileName)){

        }
        else{
            $error=1;
        }
    }

    $data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);

    $ext = pathinfo($newFileName, PATHINFO_EXTENSION);
    list($width, $height, $type, $attr) = getimagesize($newFileName);
    $SIZE = min($width,$height);
    // check for image type
    if(strtolower($ext=="png")){
        $vImg = @imagecreatefrompng($newFileName);
    }
    if((strtolower($ext=="jpeg"))||(strtolower($ext=="jpg"))){
        $vImg = @imagecreatefromjpeg($newFileName);
    }


    // create a new true color image
    $vDstImg = @imagecreatetruecolor( $iWidth, $iHeight );

    // copy and resize part of an image with resampling
    imagecopyresampled($vDstImg, $vImg, 0, 0, (int)0, (int)0, $iWidth, $iHeight, (int)$SIZE, (int)$SIZE);



    // output image to file
    if(imagejpeg($vDstImg, $uploadDirectory.'small/'.$base, $iJpgQuality)){

    }
    else{
        $error=2;
    }
    if($error){
        return $error;
    }

}
else
{

    $data = array('success' => 'file uploaded', 'formData' => $_POST);


}

if(isset($_POST['title']) && isset($_POST['text'])){
    $title = $_POST['title'];
    $language = $_POST['language'];
    $text = $_POST['text'];
    $nbPers = $_POST['nbpers'];
    $Ingredients = $_POST['ingredients'];
    $photo = 'images/recette/large/'.$_POST['photoname'];
    $photo_small = 'images/recette/small/'.$_POST['photoname'];
    $db = new PDO('mysql:host=mysql51-136.perso;dbname=jordandefmbdd', 'jordandefmbdd', 'hgz5pTRuktht');
    $query =
        'INSERT INTO recette VALUES (
        null,
        \''.addslashes(urldecode($language)).'\',
        \''.addslashes(urldecode($title)).'\',
        \''.addslashes(urldecode($text)).'\',
        \''.addslashes($Ingredients).'\',
        \''.addslashes($nbPers).'\',
        \''.addslashes($photo).'\',
        \''.addslashes($photo_small).'\',
        \''.addslashes($date).'\'
        )';

    $result = $db->query($query);
    $data = array('success' => $text, 'formData' => $_POST);

}
echo json_encode($data);

?>