
<?php
  if(isset($_POST['save'])){
      $conn=mysqli_connect("localhost", "root", "", "students");
      $user=$_POST['user'];
      $email=$_POST['email'];
      $DateofBirth=$_POST['DateofBirth'];
      $password=$_POST['password'];
      $cpassword=$_POST['cpassword'];
      $sql="SELECT * FROM studentdata WHERE email = '{$email}'";
      $res=mysqli_query($conn, $sql);
      if(mysqli_num_rows($res)>0){
       echo "<div class='alert alert-danger'>Email already exists</div>"; 
      }
      else{
          if($password===$cpassword){
              $pass=md5($password);
              $sql1="INSERT INTO studentdata(username, email, DateofBirth, password) VALUES('{$user}', '{$email}', '{$DateofBirth}', '{$pass}')";
               if(mysqli_query($conn, $sql1)){
                echo "Hello $user registered successfully";
               }else{
                   echo "ERROR";
               }
            }else{
            echo "<div class='alert alert-danger'>Password are not matching</div>";
           }
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
        margin-top: 40px;
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
                    <h1 class="text-center">REGISTER</h1>
                    <div class="form-group">
                        <label for="">UserName</label>
                        <input type="text" name="user" placeholder="UserName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">EMAIL</label>
                        <input type="email" name="email" placeholder="EMAIL" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Date of Birth</label>
                        <input type="date" name="DateofBirth" placeholder="Date of Birth" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" name="cpassword" placeholder="Confirm Password" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <input type="submit" name="save" class="form-control btn btn-success" value="Register">
                    </div>
                    <div class="form-group my-2">
                        Already having an account? <span><a href="index.php">Login</span>
                    </div>
                </form>
            </div>

        </div>
    </div>
    
</body>
</html>