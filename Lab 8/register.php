<?
require_once('include/common.inc.php');

if(isset($_POST['submit']))
{
    $err = array();
    $login = $_POST['login'];
    $pass = $_POST['password'];
    
    if(!preg_match("/^[a-zA-Z0-9]+$/",$login))
    {
        $err[] = "Username may only consist of letters of the alphabet and numbers";
    }   

    if(strlen($login) < 3 or strlen($login) > 30)
    {
        $err[] = "Username must be at least 3 characters and no more than 30";
    }   
    
    $result = findUser($login);
    if($result[0]["user_id"] != 0)
    {
        $err[] = "Members with such password already exist in the database";
    } 
    
    if(count($err) == 0)
    {     
        $result = addUser($login, $pass);
        $params = array
        (
            'login' => $login,
            'password' => $pass,
        );
        $result = file_get_contents('auth.php', false, stream_context_create(array
        (
            'http' => array
            (
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($params),
            )
        )));
    }
}

$vars = array(
    'error' => $err
);

buildLayout('register.html', $vars);