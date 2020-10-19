
<?php
session_start();?>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Piedra&display=swap" rel="stylesheet">

    <!-- main CSs -->
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Hello, world!</title>
</head>
<body style="background-image:url('assets/images/pexels-pixabay-531880.jpg');
    height: 100%;
  background-repeat: no-repeat;
  background-size: cover;
 ">

<?php
    if (isset($_SESSION['email'])) {?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a  style="font-family: 'Piedra', cursive" class="navbar-brand" href="home.php">Website Name</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

          </ul>
          <ul class=" navbar-nav my-2 my-lg-0 mr-4">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <?php echo $_SESSION['fname']." ".$_SESSION['lname']  ?>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a  style="font-family: 'Piedra', cursive; color: black !important;font-size: 13px" class="nav-link" href="#">Profile </a>
                      <a  style="font-family: 'Piedra', cursive; color: black !important;font-size: 13px" class="nav-link" href="#">Setting</a>

                      <div class="dropdown-divider"></div>
                      <a  style="font-family: 'Piedra', cursive; color: black !important;font-size: 13px" class="nav-link" href="logout.php">Log Out ? </a>
                  </div>
              </li>

          </ul>
      </div>
  </nav>

        <h2 style="font-family: 'Piedra', cursive; text-align: center; margin-top: 10%">Hello ,<?php echo $_SESSION['fname']?><br> Welcome To Our Authentication <br> Login | Registration System  <br><span style="font-size: 15px">Landing Page</span></h2>

  <?php
  }

  else
  {
      ?>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a  style="font-family: 'Piedra', cursive" class="navbar-brand" href="index.php">Website Name</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">


              </ul>
              <ul class=" navbar-nav my-2 my-lg-0">

                  <li class="nav-item">
                      <a  style="font-family: 'Piedra', cursive" class="nav-link" href="login.php">Log in ? </a>
                  </li>

              </ul>
          </div>
      </nav>
      <h4 style=" font-weight:bolder;font-family: 'Piedra', cursive; text-align: center; margin-top: 16%">Hello , There <br> This is Authentication Login | Register System <br> Hope you Enjoy<br>
          <span style="font-size: 15px">" Landing Page "</span></h4>
      <?php
  }


  ?>

<script src="assets/js/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="assets/js/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>





