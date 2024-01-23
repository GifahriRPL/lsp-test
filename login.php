<?php
    session_start();
    include 'koneksi.php';

    if(isset($_POST['submit'])){
        $username = $_POST['user'];
        $password = $_POST['pw'];
        
        // Logic Login
        $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
            
        if(mysqli_num_rows($query) > 0){
         $data = mysqli_fetch_assoc($query);
           if($data['role'] === 'admin'){
              if($password == $data['password']){
                $_SESSION['admin'] = true;
                header("Location: admin.php");
              }
       
           } else{
              if($password == $data['password']){
                $_SESSION['costumer'] = $username;
                $_SESSION['id_user'] = $data['id_user'];
                header("Location: index.php");
              }
           }


        } else{
            echo "user tidak ada";
        }
        

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Login</h4>
        </div>
        <div class="card-body">
          <form action="" method="post">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" name="user" class="form-control" id="username" placeholder="Enter your username">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="pw" class="form-control" id="password" placeholder="Enter your password">
            </div>
            <div class="d-grid">
              <button type="submit" name="submit" class="btn btn-primary">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
