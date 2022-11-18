<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<body style="background-color: #2c2e44;">
  <div class="wrapper">
    <section class="form login">
      <header style="color: #42a382;">Security Verification</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Phone verification code</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

</body>
</html>