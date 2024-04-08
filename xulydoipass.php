<?php session_start();
if(isset($_SESSION['login_user'])==false){
    header("location:login.php");
    exit();
}
$u=$_SESSION['login_user'];
 ?>
 <?php //tiếp nhận dữ liệu từ form
    $pass_old = $_POST['pass_old'];
    $pass_new1 = $_POST['pass_new1'];
    $pass_new2 = $_POST['pass_new2'];
?>
 <?php //Kiểm tra dữ liệu
    $pass_old = trim(strip_tags($pass_old));
    $pass_new1 = trim(strip_tags($pass_new1));
    $pass_new2 = trim(strip_tags($pass_new2));
    require_once 'connectdb.php';
    $sql="select count(*) from users where username='{$u}' AND pass='{$pass_old}'";
    $kq=$conn->query($sql);//kiểm tra xem pass old có đúng không
    $row = $kq->fetch();
    if ($row[0]!=1){//pass old khong chinh xac
    $thongbao.="Mật khẩu cũ không đúng<br>";
    header("location: doipass.php?error=SaiMatKhauCu");
    exit();
    }
    if(strlen($pass_new1)<6){
        $thongbao .="Mật khẩu quá ngắn<br>";
        header("location: doipass.php?error=MatKhauNgan");
        exit();
    }
    if($pass_new1!=$pass_new2){
        $thongbao .="Hai mật khẩu phải giống nhau<br>";
        header("location: doipass.php?error=HaiMatKhauKhongGiong");
        exit();
    }

?>
<?php //cap nhat pass moi
 if ($thongbao=="" ){
    require_once 'connectdb.php';
    try {
    $sql = "UPDATE users SET pass = '{$pass_new1}' WHERE username='{$u}'";
    $kq = $conn->exec($sql);
    if ($kq==1) $thongbao= "Đã cập nhật thành công<br>";
    else $thongbao= "Chưa cập nhật được<br>";
    }
    catch (Exception $ex) { $thongbao ="Lỗi : " . $ex->getMessage() ;  }
} ?>



