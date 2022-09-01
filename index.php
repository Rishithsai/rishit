
<?php
  if(isset($_POST['submit'])){
     $conn=mysqli_connect("localhost", "root", "", "students");
     $email=$_POST['email'];
     $password=$_POST['password'];
     $incpass=md5($password);
     $sql="SELECT * FROM studentdata WHERE email = '{$email}'";
     $res=mysqli_query($conn, $sql);
       if(mysqli_num_rows($res)>0){
         $row=mysqli_fetch_assoc($res);
         $pass=$row['password'];
         if($pass===$incpass){
            session_start();
            $_SESSION['user']=$row['username'];
            header("location://localhost/register/home.php");
         }else{
            echo "<div class='alert alert-danger'>Invalid password</div>";
         }
    }else{
        echo "<div class='alert alert-danger'>Invalid email</div>";
    }
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
    .container{
        margin-top: 120px;
    }
    form{
        padding: 40px;
        background-color: red;
        box-shadow: 20px 30px 0px inset;
    }
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="offset-md-4 col-md-4">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                    <h1 class="text-center">LOGIN</h1>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <input type="submit" name="submit" class="form-control btn btn-success" value="Login">
                    </div>
                    <div class="form-group my-2">
                        Not have a account? <span><a href="register.php">Register</span>
                    </div>
                </form>
            </div>

        </div>
    </div>
    
</body>
</html>