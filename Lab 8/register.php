<?
require_once('include/common.inc.php');

if(isset($_POST['submit']))
{
    $err = array();
    $login = $_POST['login'];
    $pass = $_POST['password'];
    
    if(!preg_match("/^[a-zA-Z0-9]+$/",$login))
    {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }   

    if(strlen($login) < 3 or strlen($login) > 30)
    {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }   
    
    $result = findUser($login);
    if($result[0]["user_id"] != 0)
    {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    } 
    
    if(count($err) == 0)
    {     
        $result = addUser($login, $pass);
    }
}

$vars = array(
    'error' => $err
);

buildLayout('register.html', $vars);