<?php
$thongbao="";
if (isset($_POST['btn1'])){
  $email = trim(strip_tags($_POST['email']));//tiep nhan email
  if (filter_var($email,FILTER_VALIDATE_EMAIL)==false){ //kiem tra dinh dang
    $thongbao .="Email không đúng <br>";
  }
  //kiem tra email cos phai thanh vien khong
  require_once 'connectdb.php';
  $sql="select count(*) from users where email ='{$email}'";
  $kq=$conn->query($sql);
  $row=$kq->fetch();
  if ($row[0]==0) $thongbao .="Email này không phải là thành viên <br>";
//tao 1 chuoi ngau nhien de lam pas moi va cap nhat vao bảng úe
$pass_moi = md5(random_int(0,9999));
$pass_moi = substr($pass_moi, 0,7);
$sql = "UPDATE users SET pass='{$pass_moi}' WHERE email='{$email}'";
$kq = $conn->query($sql);
if ($kq->rowCount() > 0) {
    $thongbao .= "Cập nhật mật khẩu thành công<br>";
} else {
    $thongbao .= "Cập nhật mật khẩu không thành công<br>";
}
}

?>
<?php if ($thongbao!="") { ?> 
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel= "stylesheet" >
 <div class="col-8 m-auto">
    <div class="alert alert-danger mt-5 text-center "> 
         <?=$thongbao?> 
         <button class="btn btn-primary" onclick="history.back()">Trở lại</button> 
         <a href="index.php" class="btn btn-info">Trang chủ</a>
     </div>
 </div>
<?php exit(); } ?>

