<?php 
  session_start();
  error_reporting(0);
  ini_set('display_errors', 0);
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form login">
      <header>Kyo Chat</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email</label>
          <input type="text" name="email" placeholder="amin*****@gmail.com" required>
        </div>
        <div class="field input">
          <label>Mật khẩu</label>
          <input type="password" name="password" placeholder="********" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Đăng nhập">
        </div>
      </form>
      <div class="link">Chưa có tài khoản? <a href="index.php">Đăng ký ngay!</a></div>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

</body>
</html>
