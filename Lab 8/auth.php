<?
require_once('include/common.inc.php');

$login = $_POST['login'];
$pass = $_POST['password'];

# Функция для генерации случайной строки
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;  
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];  
    }
    return $code;
}

if(isset($_POST['submit']))
{
    # Вытаскиваем из БД запись, у которой логин равняеться введенному+
    $user = findUser($login);

    
    //print_r (md5(md5($pass)));
     
    # Соавниваем пароли
    if($user['0']['user_password'] === md5(md5($pass)))
    {
        # Генерируем случайное число и шифруем его
        $hash = md5(generateCode(10));
        if(!@$_POST['not_attach_ip'])
        {
            # Переводим IP в строку
            $insip = ", user_ip=INET_ATON('".$_SERVER['REMOTE_ADDR']."')";
        }       
        
        print_r ($insip);

        # Записываем в БД новый хеш авторизации и IP
        mysql_query("UPDATE users SET user_hash='".$hash."' ".$insip." WHERE user_id='".$user['0']['user_id']."'");      

        # Ставим куки
        //setcookie("id", $user['0']['user_id'], time()+60*60*24*30);
        //setcookie("hash", $hash, time()+60*60*24*30);       
    }
    else
    {
        $err[] = "Вы ввели неправильный логин/пароль";
    }
}

$vars = array(
    'error' => $err
);

buildLayout('auth.html', $vars);