<?php 
session_start();
$users=[
    'alifuat'=>[
        'ad-soyad'=>'Ali Fuat ASLAN',
        'password'=>'123456',
        'eposta'=>'afuat.aslann@gmail.com',],
        'verifuat'=>[
            'ad-soyad'=>'Veri Fuat KAPLAN',
            'password'=>'456789',
            'eposta'=>'delurcem@gmail.com',]
];
function get($get){
    if (isset($_GET[$get])){
        return trim($_GET[$get]);
    }
    else{
        return false;
    }
}
function post($post){
    if (isset($_POST[$post])){
        return trim($_POST[$post]);
    }
    else{
        return false;
    }
}

function session($session){
    if (isset($_SESSION[$session])){
        return trim($_SESSION[$session]);
    }
    else{
        return false;
    }
}



if (get('islem')=='giris'){
    $_SESSION["username"]=post("username");
    $_SESSION["password"]=post("password");
    
    if (!post('username')){
       $_SESSION["error"]="Lütfen kullanıcı adınızı giriniz..";
       header("Location:login.php");
       exit();
    }elseif (!post('password')) {
        $_SESSION["error"]="Lütfen şifrenizi giriniz..";
       header("Location:login.php");
       exit();
    }
    else{
         if(array_key_exists(post('username'),$users)){
            if($users[post("username")]["password"]==post('password')){
                $_SESSION["login"]=true;
                $_SESSION["ad-soyad"]=$users[post("username")]["ad-soyad"];
                $_SESSION["kullanici_adi"]=post("username");
                $_SESSION["eposta"]=$users[post("username")]["eposta"];
                header("Location:index.php");
                exit();

            }
            else{
                $_SESSION["error"]="Hatalı şifre lütfen şifrenizi giriniz...";
                header("Location:login.php");
                exit();
            }

         }
         else{
            $_SESSION["error"]="Hatalı Kullacı adı Böyle bir Kullanıcı Bulunamadı...";
            header("Location:login.php");
            exit();
         }
    }
}

if (get('islem')=="hakkimda"){
    $veri = post("yazi");
   $islem= file_put_contents('db/'.session("kullanici_adi").".txt",htmlspecialchars($veri) );
    header("Location:index.php");
}
if(get('islem')=="kapat"){
   session_destroy();
   session_start();
   $_SESSION["error"]="Oturum Başarılı Bir şekilde Kapatıldı";
   header("Location:index.php");
}


if (get('color')=='bg-light'){

    $_SESSION["color"]="bg-light";
    header("location:index.php");

}
else if (get('color')=='bg-dark'){
    
    $_SESSION["color"]="bg-dark";
    
    header("location:index.php");
}




?>
<script>
    
    console.log("sebney");
    console.log("<?php $_SESSION["color"]?>");

</script>