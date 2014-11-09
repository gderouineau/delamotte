<?php



if( isset($_POST['username']) && isset($_POST['password']) ){

    $email = $_POST['username'];
    $mdp = $_POST['password'];

    $db = new PDO('mysql:host=mysql51-136.perso;dbname=jordandefmbdd', 'jordandefmbdd', 'hgz5pTRuktht');
    $query = 'SELECT * FROM users WHERE email='.$email;
    $result = $db->query($query);
    $data = $result->fetch();

    if($email == $data['email'] && $mdp == $data['mdp']){
        session_start();
        $_SESSION['user']['username'] = $data['user_name'];
        echo "Success";
    }
    else{
        echo "Failed";
    }

}

?>