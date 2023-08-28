<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Kyo Chat</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
          <div class="field input">
            <label>Họ và tên</label>
            <input type="text" name="name" placeholder="Tên" required>
          </div>
		<div class="field input">
            <label>Số điện thoại</label>
            <input type="number" name="phone" placeholder="Số điện thoại" required>
          </div>
        <div class="field input">
          <label>Địa chỉ Email </label>
          <input type="text" name="email" placeholder="a@gmail.com" required>
        </div>
        <div class="field input">
          <label>Mật khẩu</label>
          <input type="password" name="password" placeholder="********" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Chọn avatar</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Đăng ký">
        </div>
      </form>
      <div class="link">Bạn đã có tài khoản? <a href="login.php">Đăng nhập ngay!</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>
</html>
