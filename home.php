
<?php
 session_start();
 if(!isset($_SESSION['user'])){
     header("location://localhost/register/index.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
</head>
<style>
    body{
        background-color: black;
    }
    .container{
        margin-top: 0px;
    }
    form{
        padding: 40px;
        background-color: red;
        box-shadow: 20px 30px 0px inset;
    }
    #welcome{
        font-size: 90px;
        font-weight: 800;
        text-align: center;
        color: blueviolet;
    }
    #username{
        font-size: 200px;
        font-weight: 500;
        text-align: center;
        color: blue;
    }
</style>
<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-light">
  <a class="navbar-brand" href="#">Welcome</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"><?php  echo $_SESSION['user']  ?> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-danger" href="logout.php">Logout</a>
      </li>
      
    </ul>
   
  </div>
</nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="offset-md-12" id="welcome">
                WELCOME
            </div>
            <div class="offset-md-12" id="username">
                <?php  echo $_SESSION['user']  ?>
            </div>

        </div>
    </div>
    
</body>
</html>