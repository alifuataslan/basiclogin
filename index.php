<?php 
session_start();
    if (!isset($_SESSION['login']) || $_SESSION['login']==false){
        header('Location:login.php');
    }
    include 'islem.php';
    $veri = file_get_contents("db/".session("kullanici_adi").".txt",htmlspecialchars($veri) );
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
        /* body.bg-dark{ background: #181818!important;} */
        button{position: absolute; bottom: 8px; right: 8px}
        form{position: relative;}
    </style>
  <body class="<?php echo $_SESSION["color"]?>">
    <div class="container"><!--Container Start -->
        <div class="row"><!--row Start -->
            <div class="col-sm-4 offset-sm-4  mt-5 mb-3 text-center" ><!--logo Start -->
                <img src="kodl.png" alt="kodluoruz">
            </div><!--logo end  -->
            <div class="col-sm-4 offset-sm-4  mt-1 border p-0 border-dark rounded-2 <?php echo $_SESSION["color"]?>" >
                <div class="bg-primary p-1">
                    <h2>Profilim</h2>
                </div>
                <div class="mx-3"><!-- profile card start -->
                    <div class="card-body">
                        <h5 class="card-title text-warning"><?php echo session('ad-soyad');?></h5>
                        <h6 class="card-subtitle mb-2 text-secondary"><?php echo session("eposta")?></h6>
                        <form action="islem.php?islem=hakkimda" method="POST">
                            <textarea class="form-control <?php echo $_SESSION["color"];
                            if ($_SESSION["color"]=='bg-dark') {
                                echo ' text-white';
                               } else{
                                    echo ' text-primary';
                                }
                            ?> " name="yazi" id="" cols="30" rows="10"><?php  echo htmlspecialchars_decode($veri) ?></textarea>
                            <button class="btn btn-sm btn-primary" type="submit">Kaydet</button>
                        </form>
                        <a href="islem.php?islem=kapat" class="btn btn-success btn-sm my-2 w-100">Oturumu Kapat</a><br>
                    </div>
                </div ><!--profile card end -->
               
                <div class="card-footer bg-info d-flex align-items-center justify-content-between p-2" >
                    <a href="islem.php?color=bg-light" class="btn btn-sm btn-light px-3">Light Mod</a>
                    <a href="islem.php?color=bg-dark" class="btn btn-sm btn-dark px-3">Dark Mod</a>
                </div> 
                
            </div>
        </div><!-- row end -->
    </div><!--Container end -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>