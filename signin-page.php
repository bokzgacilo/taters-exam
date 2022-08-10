<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Exam</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    
    <div class="signin-container">
      <h2>Sign In</h2>
      <h5>Enter your details here below</h5>

      <form name='signin' action="signin.php" method="post">
        <div>
          <?php if (isset($_GET['error'])) { ?>
            <p class="message"><?php echo $_GET['error']; ?></p>
          <?php } ?>
        </div>
        <input name='username' type="text" placeholder='Username' maxlength='20'>
        <input name='password' type="password" placeholder='Password' maxlength='28'>
        <button type="submit">Sign In</button>
      </form>

      <h5>Doesn't have an account yet?</h5>
      <a name='SignUp' href='register-page.php'>Sign Up</a>
    </div>
  </div>
</body>
</html>