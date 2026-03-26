<?php
session_start();
include_once 'Database.php';
include_once 'User.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $db = new Database();
    $connection = $db->getConnection();
    $user = new User(db: $connection);

    $email = $_POST['email'];
    $password = $_POST['password'];

    if($user->login(email: $email, password: $password)){
        header(header: "Location: booking.php");
        exit;
    }
    else{
        $error_message = "Invalid login credentials!";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://cdn.boxicons.com/3.0.6/fonts/basic/boxicons.min.css' rel='stylesheet'>
</head>

<body class="login-forma">

<?php include 'header.php'; ?>

<div class="login-box">
  <div class="wrapper">
    <form id="loginForm" method="POST" action="login.php">
      <h1>Login</h1>

      <?php if($_SERVER['REQUEST_METHOD']== 'POST' && !empty($error_message)): ?>
        <p style="color: red; text-align:center; font-size: 14px;"><?php echo $error_message;?></p>
      <?php endif; ?>

      <div class="input-boxi">
        <input type="email" name="email" id="username" placeholder="Email" required>
        <i class='bxr bx-user'></i> 
        <small class="error-message" id="usernameError"></small>
      </div>

      <div class="input-boxi">
        <input type="password" name="password" id="password" placeholder="Password" required>
        <i class='bxr bx-lock'></i> 
        <small class="error-message" id="passwordError"></small>
      </div>

      <div class="remember-forgot">
        <label><input type="checkbox"> Remember Me</label>
        <a href="#">Forgot Password</a>
      </div>

      <div id="loginSuccess" class="success-message" style="display:none;"></div>
      <button type="submit" class="btn" id="loginBtn">Login</button>

      <div class="register-link">
        <p>Dont have an account? <a href="register.php">Register</a></p>
      </div>
    </form>
  </div>
</div>


<script src="script1.js"></script>

</body>
</html>