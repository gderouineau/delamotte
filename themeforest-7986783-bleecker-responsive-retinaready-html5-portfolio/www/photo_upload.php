<?php
/**
 *
 * HTML5 Image uploader with Jcrop
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Copyright 2012, Script Tutorials
 * http://www.script-tutorials.com/
 */

function uploadImageFile() { // Note: GD library is required for this function

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $iWidth = $iHeight = 570; // desired image result dimensions
        $iJpgQuality = 90;
        $uploadDirectory = 'images/upload_photos/';
        $title_short = $_POST['title_short'];
        $title_long = $_POST['title_long'];
        if ($_FILES) {
            foreach($_FILES as $file){
                $base = basename($file['name']);
                $newFileName = $uploadDirectory.'large/'.basename($file['name']);
                if(move_uploaded_file($file['tmp_name'],$newFileName)){

                }
                else{
                    $error=1;
                }
            }

            $ext = pathinfo($newFileName, PATHINFO_EXTENSION);

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
            imagecopyresampled($vDstImg, $vImg, 0, 0, (int)$_POST['x1'], (int)$_POST['y1'], $iWidth, $iHeight, (int)$_POST['w'], (int)$_POST['h']);



            // output image to file
            if(imagejpeg($vDstImg, $uploadDirectory.'small/'.$base, $iJpgQuality)){

            }
            else{
                $error=2;
            }
            if($error){
                return $error;
            }
            $small_photo = $uploadDirectory.'small/'.$base;
            $large_photo = $newFileName;
            $db = new PDO('mysql:host=mysql51-136.perso;dbname=jordandefmbdd', 'jordandefmbdd', 'hgz5pTRuktht');
            $query =
                'INSERT INTO photos VALUES (
                null,
                \''.addslashes($small_photo).'\',
                \''.addslashes($large_photo).'\',
                \''.addslashes($title_long).'\',
                \''.addslashes($title_short).'\'
                )'
            ;
            $result = $db->query($query);
            return  $uploadDirectory.'small/'.$base;

        }
    }
}

$sImage = uploadImageFile();
echo '<p>'.$sImage.' </p>';
echo '<img src="'.$sImage.'" />';