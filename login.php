
<?php 
session_start();
include 'islem.php';
?>




<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <style>
        body.bg-dark{
            background: #181818!important;
        }
    </style>
  <body class="<?php echo $_SESSION["color"]?>">
    <div class="container"> <!--Container Start -->
        <div class="row"><!--row Start -->
            
            <div class="col-sm-4 offset-sm-4  mt-5 mb-3 text-center" ><!--Logo  Start -->
             <img src="kodl.png" alt="kodluoruz">
            </div><!--logo end -->
            <div class="col-sm-4 offset-sm-4  mt-1 border p-0 border-dark rounded-2 <?php echo $_SESSION["color"]?>" > <!--Login box Start -->
                <div class="bg-primary p-1">
                    <h2>Giriş Yap</h2>
                </div>
                <?php if(session("error")):?>
                <div class="alert alert-danger m-3" role="alert">
                    <?php 
                        echo session('error');
                    ?>
                </div>
                <?php endif;?>
                <div class="mx-3"><!--Form  Start -->
                    <form action="islem.php?islem=giris" method="post">
                        <label class="text-success" for="username"><strong>Kullanıcı Adınız</strong></label>
                        <input type="text" name="username"  class="form-control" value="<?php echo session('username');?>" >
                        <label class="text-success" for="password"><strong>Şifreniz</strong></label>
                        <input type="password" name="password"  class="form-control mb-4" value="<?php echo session('password');?>">
                        <button class="btn btn-success mb-4 w-100">Giriş Yap</button>
                    </form>
                    
                </div >
               
                <div class="card-footer bg-info d-flex align-items-center justify-content-between p-2" > <!--Mode dark or light Start -->
                    <a href="islem.php?color=bg-light" class="btn btn-sm btn-light">Light Mod</a>
                    <a href="islem.php?color=bg-dark" class="btn btn-sm btn-dark">Dark Mod</a>
                </div><!--mode dark or light end -->
            </div><!--login box end -->
        </div><!-- Row End-->
    </div><!--Container end -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>

<?php 
$_SESSION["error"]=null;
$_SESSION["username"]="";
$_SESSION["password"]=null;
$_SESSION["color"]=null;
    ?>