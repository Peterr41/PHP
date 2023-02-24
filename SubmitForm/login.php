<?php
require 'connect.php';
// Bước 1: Thiết lập thông tin xác thực Google
$client_id = '798578647082-9uf403ei9dcpdjjsrvv109t22bn5hlgn.apps.googleusercontent.com';
$client_secret = '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';
$redirect_uri = 'http://localhost:3000/SubmitForm/form.php';

// Bước 2: Chuyển hướng người dùng đến trang xác thực Google
if(!isset($_GET['code'])) {
  $auth_url = 'https://accounts.google.com/o/oauth2/auth?response_type=code&client_id='.$client_id.'&redirect_uri='.$redirect_uri.'&scope=https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email';
  header('Location: '.$auth_url);
  die();
}

// Bước 3: Lấy mã truy cập từ Google
$code = $_GET['code'];
$url = 'https://accounts.google.com/o/oauth2/token';
$data = array(
  'code' => $code,
  'client_id' => $client_id,
  'client_secret' => $client_secret,
  'redirect_uri' => $redirect_uri,
  'grant_type' => 'authorization_code'
);
$options = array(
  'http' => array(
    'header' => "Content-type: application/x-www-form-urlencoded\r\n",
    'method' => 'POST',
    'content' => http_build_query($data)
  )
);
$context = stream_context_create($options);
$result = json_decode(file_get_contents($url, false, $context));

// Bước 4: Lưu thông tin đăng nhập vào session và cơ sở dữ liệu
if(isset($result->access_token)) {
  // Lưu thông tin đăng nhập vào session
  session_start();
  $_SESSION['access_token'] = $result->access_token;

  // Lấy thông tin người dùng từ Google
  $url = 'https://www.googleapis.com/oauth2/v1/userinfo?access_token=' . $result->access_token;
  $user_info = json_decode(file_get_contents($url));

  // Lưu thông tin người dùng vào cơ sở dữ liệu
  if (!$conn) {
    die('Kết nối đến cơ sở dữ liệu thất bại: ' . mysqli_connect_error());
  }
  
  // Thêm bản ghi mới vào bảng users
  $query = "INSERT INTO users (google_id, name, email) VALUES ('".$user_info->id."', '".$user_info->name."', '".$user_info->email."')";
  
  if (mysqli_query($conn, $sql)) {
    echo "Thêm bản ghi mới thành công";
  } else {
    echo "Lỗi khi thêm bản ghi mới: " . mysqli_error($conn);
  }
  
  // Đóng kết nối
  mysqli_close($conn);
}
?>
