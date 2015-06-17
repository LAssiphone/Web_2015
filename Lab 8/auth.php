<?
require_once('include/common.inc.php');

$login = $_POST['login'];
$pass = $_POST['password'];
$userIp = ''.$_SERVER['REMOTE_ADDR'].'';

if(isset($_POST['submit']))
{
    $user = findUser($login);
    if($user['0']['user_password'] === md5(md5($pass)))
    {
        $hash = md5(generateCode(10));
        $test = userLoginUpd($user, $userIp, $hash);  
        
        var_dump($userIp);

       // Ставим куки
       // setcookie("id", $user['0']['user_id'], time() - 3600);
      //  setcookie("hash", $hash, time() - 3600);       
    }
    else
    {
        $err[] = "You entered an incorrect username / password";
    }
}

$vars = array(
    'error' => $err
);

buildLayout('auth.html', $vars);