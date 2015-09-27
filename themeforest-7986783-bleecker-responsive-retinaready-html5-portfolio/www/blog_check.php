<?php

$data = array();
$language = 'fr';
$photo = "";
$title = "";
$text  = "";
$date  = date("Y-m-d H:i:s");
$place = 0;
$rand = rand(1,99999);
if(isset($_GET['files']))
{
    $error = false;
    $files = array();

    $uploaddir = 'images/tofsactualite/';
    foreach($_FILES as $file)
    {
        if(move_uploaded_file($file['tmp_name'], $uploaddir .'blog_'.basename($file['name'])))
        {
            $files[] = $uploaddir .$file['name'];
            $photo = $uploaddir .$file['name'];
        }
        else
        {
            $error = true;
        }
    }
    $data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);

}
else
{

    $data = array('success' => 'file uploaded', 'formData' => $_POST);


}

if(isset($_POST['title']) && isset($_POST['text'])){
    $title = $_POST['title'];
    $text = $_POST['text'];
    $author = $_POST['author'];
    $author_id = $_POST['authorid'];
    $photo = 'images/tofsactualite/'.'blog_'.$_POST['photoname'];
    $db = new PDO('mysql:host=mysql51-136.perso;dbname=jordandefmbdd', 'jordandefmbdd', 'hgz5pTRuktht');
    $query =
        'INSERT INTO actualite VALUES (
        null,
        \''.addslashes(urldecode($place)).'\' ,
        \''.$language.'\',
        \''.addslashes(urldecode($title)).'\',
        \''.addslashes(urldecode($text)).'\',
        \''.addslashes($date).'\',
        \''.addslashes($photo).'\',
        \''.addslashes($author_id).'\',
        \''.addslashes($author).'\'
        )';

    $result = $db->query($query);
    $data = array('success' => $query, 'formData' => $_POST);

}
echo json_encode($data);

?>