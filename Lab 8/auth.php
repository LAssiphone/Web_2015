<?
require_once('include/common.inc.php');

$login = $_POST['login'];
$pass = $_POST['password'];

# ������� ��� ��������� ��������� ������
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
    # ����������� �� �� ������, � ������� ����� ���������� ����������+
    $user = findUser($login);

    
    //print_r (md5(md5($pass)));
     
    # ���������� ������
    if($user['0']['user_password'] === md5(md5($pass)))
    {
        # ���������� ��������� ����� � ������� ���
        $hash = md5(generateCode(10));
        if(!@$_POST['not_attach_ip'])
        {
            # ��������� IP � ������
            $insip = ", user_ip=INET_ATON('".$_SERVER['REMOTE_ADDR']."')";
        }       
        
        print_r ($insip);

        # ���������� � �� ����� ��� ����������� � IP
        mysql_query("UPDATE users SET user_hash='".$hash."' ".$insip." WHERE user_id='".$user['0']['user_id']."'");      

        # ������ ����
        //setcookie("id", $user['0']['user_id'], time()+60*60*24*30);
        //setcookie("hash", $hash, time()+60*60*24*30);       
    }
    else
    {
        $err[] = "�� ����� ������������ �����/������";
    }
}

$vars = array(
    'error' => $err
);

buildLayout('auth.html', $vars);