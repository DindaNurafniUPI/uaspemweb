<!DOCTYPE html>
<html lang="en">
<head>
   
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Login isworld</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS -->
<link href="/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }.y{
          font-family: Impact;
          font-size: 1.5rem;
          color: #FFFF;
        }.body{
          background-image: url('img/uio.jpg');
          background-size: cover;
          text-center
          opacity: 0.5px;
        }.h{
          color: #FFFF;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <br>
  <br>
  <body class="body" w3-opacity data-new-gr-c-s-check-loaded="14.1001.0" data-gr-ext-installed="">
    <center>
<main class="form-signin">
  <form action=" " method="POST">
    <img class="mb-4" src="img/ha.png" alt="" width="112" height="107">
    <h1 class="y">Sign In to Isworld</h1>

    <div class="form-floating" style="width:250px">
      <input type="email" class="form-control" name="email" placeholder="yourmail@gmail.com">
      <label for="floatingInput">email</label>
    </div>
    <div class="form-floating" style="width:250px">
      <input type="password" class="form-control" name="pass" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
<br>
    <div class="checkbox mb-3 w-100">
      
    </div>
    <button class="w-40 btn btn-lg btn-primary" type="submit" name="login">Sign in</button>
  </form>
</main>
<br> 
<b class="h">belum punya akun?</b>
<a class="h" href="regis.php"> buat akun </a>
    </center>

    
  

</body><grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration></html>

<?php
if(isset($_POST['login'])){
    include'koneksi.php';
    $sql = mysqli_query($conn, "select * from user where email= '".$_POST['email']."'
    and password ='".$_POST['pass']."'");

    $cek = mysqli_num_rows($sql);
    if($cek > 0){
        $_SESSION['email'] = $_POST['email'];

        header("location:berita.php");
    }else{
        echo"<p align=center><font color='yellow'> Username dan password anda salah </b></p>";
        echo "<meta http-equiv=refresh content=2;URL:'login.php'>";

    }
}
?>
</body>
</html>