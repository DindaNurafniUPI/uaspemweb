<?php
include 'functions.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 5;


// Prepare the SQL statement and get records from our contacts table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM komentar ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Get the total number of contacts, this is so we can determine whether there should be a next and previous button
$num_contacts = $pdo->query('SELECT COUNT(*) FROM komentar')->fetchColumn();
?>




<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>ISWORLD</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/blog/">

    <!-- Bootstrap core CSS -->
<link href="/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
 
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>ISWORLD</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/jumbotron/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS -->
<link href="/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }.y{
          font-family: Helvetica;
          font-size: 50;
          color: #008080;
        }.jumbotron{
          background: #AFEEEE	;
        }.ya{
          navbar-brand;
          font-family: Impact;
          font-size: 23;
          color:#008080;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
  </head>
  <br><br>
  <body data-new-gr-c-s-check-loaded="14.1001.0" data-gr-ext-installed="">
    
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-white">
  <a class="ya" href="">ISWORLD</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      </li>
      <li class="nav-item active">
        <a class="nav-link text-dark" href="berita.php">Berita<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-dark" href="wisata.php">Wisata<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-dark" href="ekosistem.php">Ekosistem <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-dark" href="jagalaut.php">Save our sea <span class="sr-only">(current)</span></a>
      </li>
    
      <li class="nav-item">
      </li>
      <li class="nav-item active">
        <a class="nav-link text-dark" href="home.php"><img src="img/contact-mail.png" width="20" height="20"> <span class="sr-only">(current)</span></a>
      </li>
    
    </ul>
    <form class="form-inline my-2 my-lg-0">
    </form>
  </div>
</nav>

  </header>

<body>
<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
      </h3>

      <div class="blog-post">
        <h2 class="blog-post-title">Lima Badan Usaha di Kepulauan Seribu Lolos Verifikasi Program BPUP

</h2>
        <p class="blog-post-meta"> Kategori : Pemerintahan | Reporter : Petrus Ardianto | Editor : Petrus Ardianto | 13 Dec 2021
sumber: https://pulauseribu.jakarta.go.id</a></p>

        <hr>
        <p>
Sebanyak lima badan usaha di Kepulauan Seribu dinyatakan lolos verifikasi untuk program Bantuan Pemerintah bagi Usaha Pariwisata (BPUP) dari Kementerian Pariwisata dan Ekonomi Kreatif (Kemenparekraf) RI.

Menurut Kepala Suku Dinas Pariwisata dan Ekonomi Kreatif Kepulauan Seribu, Puji Hastuti, sejak dibuka pendaftaran pada 15-26 November 2021, total hanya lima badan usaha yang dinyatakan lolos verifikasi Program BPUP.

“Lima badan usaha diantaranya Mazu Ecowisata dengan jenis usaha penyediaan akomodasi jangka pendek lainnya, Pulau Seribu Tours dengan jenis usaha agen perjalanan wisata, Opiek Tidung dengan jenis usaha agen perjalanan wisata, Kaloran Group dengan jenis usaha agen perjalanan wisata, dan Mari Melangkah Bersama dengan jenis usaha biro perjalanan wisata,” kata Puji, Senin (13/12/2021).

Tercatat, sasaran program BPUP Kemenparekraf RI yakni, agen perjalanan wisata, biro perjalanan wisata, spa, hotel melati, homestay dan penyedia akomodasi pariwisata.

"Nilai bantuan usaha pariwisata sebesar Rp 2 juta per bulan yang diberikan selama dua bulan," tutur Puji.

Puji berharap, program BPUP Kemenparekraf RI bisa memotivasi para pelaku usaha pariwisata untuk terus melengkapi berbagai administrasi dan perizinan.

"Ini akan sangat berguna untuk berbagai kebutuhan, termasuk mengakses program-program bantuan dari pemerintah," tandasnya. </p>
        <img src="img/2as.jpg" width="750" height="450" align="center">
        </ul>
        <p></p>
        <ol>
        </ol>
        <p></p>
      </div><!-- /.blog-post -->

      <div class="blog-post">
        <h2 class="blog-post-title"></h2>
        <p class="blog-post-meta"> <a href="#"></a></p>

        <p></p>
        <blockquote>
          <p></p>
        </blockquote>
        <p></p>
      </div><!-- /.blog-post -->

      <div class="blog-post">
        <h2 class="blog-post-title"></h2>
        <p class="blog-post-meta"> <a href="#"></a></p>

        <p></p>
        <ul>
      
        </ul>
        <p></p>
      </div><!-- /.blog-post -->

      <nav class="blog-pagination">
      </nav>

    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">
      <div class="p-4 mb-3 bg-light rounded">
        <h4 class="font-italic">About</h4>
        <p class="mb-0">Tentang page berita <em>kepulauan seribu</em> Berita ini diangkat dari beberapa website official kepulauan seribu salah satunya yaitu pulauseribu.jakarta.go.id</p>
      </div>


      <div class="p-4">
        <h4 class="font-italic">Elsewhere</h4>
        <ol class="list-unstyled">
          <li><a href="ekosistem.php">Ekosistem</a></li>
          <li><a href="jagalaut.php">Save our sea</a></li>
          <li><a href="wisata.php">Wisata</a></li>
        </ol>
      </div>
    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->

</main>




<?=template_header('Read')?>
<br><br>
<div class="content read">
  
  <a class="btn btn-outline-success my-2 my-sm-0 text-black" href="create.php" role="button" align="center">Create komentar »</a>

	<table>
        <thead>
            <tr>
                <td>id</td>
                <td>Nama</td>
                <td>Email</td>
                <td>Komentar</td>
                <td>Id_berita</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?=$contact['id']?></td>
                <td><?=$contact['nama']?></td>
                <td><?=$contact['email']?></td>
                <td><?=$contact['komentar']?></td>
                <td><?=$contact['id_berita']?></td>
             
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_contacts): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>
</body>

<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
       
 <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      <span class="text-muted">© 2021 ISWORLD</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
    </ul>
    <p class="float-end"><a href="#">Back to top</a></p>

  </footer>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body><grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration></html>

</body><grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration></html>
</html>