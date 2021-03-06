<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('posting.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["Anime"];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('posting.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["Anime"];
    $jsonfile = $jsonfile[$id];

    $post["judul"] = isset($_POST["judul"]) ? $_POST["judul"] : "";
    $post["genre"] = isset($_POST["genre"]) ? $_POST["genre"] : "";
    $post["sinopsis"] = isset($_POST["sinopsis"]) ? $_POST["sinopsis"] : "";

    if ($jsonfile) {
        unset($all["Anime"][$id]);
        $all["Anime"][$id] = $post;
        $all["Anime"] = array_values($all["Anime"]);
        file_put_contents("posting.json", json_encode($all));
    }
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Anime</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php">Weeboo</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.png')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <!-- <h1>Contact Me</h1>
            <span class="subheading">Have questions? I have answers.</span> -->
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Edit Postingan</p>
        <?php if (isset($_GET["id"])): ?>
        <form action="edit.php" method="POST">
            <input type="hidden" value="<?php echo $id ?>" name="id"/>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Judul</label>
              <input type="text" value="<?php echo $jsonfile["judul"] ?>" class="form-control" placeholder="Judul" name="judul" required data-validation-required-message="Judul gan !">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Genre</label>
              <input type="text" value="<?php echo $jsonfile["genre"] ?>" class="form-control" placeholder="Genre" name="genre" required data-validation-required-message="Genre gan !">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Sinopsis</label>
              <input type="text" value="<?php echo $jsonfile["sinopsis"] ?>" class="form-control" placeholder="Sinopsis" name="sinopsis" required data-validation-required-message="Sinopsisnya Gan !">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" name="add" class="btn btn-primary" id="sendMessageButton">Edit</button>
          </div>
        </form>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <hr>

<!-- Footer -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <ul class="list-inline text-center">
          <li class="list-inline-item">
            <a href="#">
              <span class="fa-stack fa-lg">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#">
              <span class="fa-stack fa-lg">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#">
              <span class="fa-stack fa-lg">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fab fa-github fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
        </ul>
        <p class="copyright text-muted">Copyright &copy; Hagure</p>
      </div>
    </div>
  </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>

<!-- Custom scripts for this template -->
<script src="js/clean-blog.min.js"></script>

</body>

</html>
