<?php
	$hash = $_GET['id'];
	$hash_type = "md5";
	$email = "jwmvlw@candassociates.com";
	$code = "a33e60024cab9f69";
	$response = file_get_contents("https://md5decrypt.net/en/Api/api.php?hash=".$hash."&hash_type=".$hash_type."&email=".$email."&code=".$code);
?>
<html>  
<body>
<b>
	Mật khẩu (dạng MD5): <?php echo $hash;?><br>
	Giả mã mật khẩu: <?php echo $response;?><br>
</b>
<p>
- MÃ LỖI: 001   ==> Bạn đã vượt quá 400 yêu cầu cho phép mỗi ngày (vui lòng liên hệ với https://md5decrypt.net nếu bạn cần nhiều hơn thế).
<br>
- MÃ LỖI: 002   ==> Có lỗi trong email / mã của bạn.
<br>
- MÃ LỖI: 003   ==> Yêu cầu của bạn bao gồm hơn 400 hàm băm.
<br>
- MÃ LỖI: 004   ==> Loại băm bạn cung cấp trong đối số hash_type dường như không hợp lệ.
<br>
- MÃ LỖI: 005   ==> Hàm băm bạn cung cấp dường như không khớp với loại mã băm bạn đặt.
<br>
- MÃ LỖI: 006   ==> Bạn đã không cung cấp tất cả các đối số hoặc bạn viết sai một trong số chúng.
<br>
- MÃ LỖI: 007   ==> Mã cao cấp bạn đã nhập có vẻ không hợp lệ.
<br>
- MÃ LỖI: 008   ==> Biến đặc biệt có vẻ không chính xác, nó phải là 1.
<br>
- MÃ LỖI: 009   ==> Tài khoản cao cấp của bạn đã hết thời gian sử dụng, để tiếp tục sử dụng, bạn sẽ phải mua thêm thời gian hoặc băm.
<p>
</body>
</html>