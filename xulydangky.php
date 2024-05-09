<?php
$host = "localhost";
$dbname = "users";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

$u = $_POST['username'];
$SoDienThoai = $_POST['SoDienThoai'];
$pass = $_POST['pass'];
$repass = $_POST['repass'];
$email = $_POST['email'];

$u = trim(strip_tags($u));
$pass = trim(strip_tags($pass));
$repass = trim(strip_tags($repass));
$email = trim(strip_tags($email));

// Check if the username already exists in the database
$sql_check_username = "SELECT COUNT(*) AS count FROM users WHERE username = ?";
$stmt_check_username = $conn->prepare($sql_check_username);
$stmt_check_username->execute([$u]);
$result_username = $stmt_check_username->fetch(PDO::FETCH_ASSOC);

if ($result_username['count'] > 0) {
    echo '<div class="toast error"><i class="fa-solid fa-exclamation-circle"></i><div class="content"><div class="title">Error</div><span>The username already exists in the system.</span></div><i class="close fa-solid fa-xmark" onclick="(this.parentElement).remove(); canShowToast = true;"></i></div>';
    exit();
}

// Check if the email already exists in the database
$sql_check_email = "SELECT COUNT(*) AS count FROM users WHERE email = ?";
$stmt_check_email = $conn->prepare($sql_check_email);
$stmt_check_email->execute([$email]);
$result_email = $stmt_check_email->fetch(PDO::FETCH_ASSOC);

if ($result_email['count'] > 0) {
    echo '<div class="toast error"><i class="fa-solid fa-exclamation-circle"></i><div class="content"><div class="title">Error</div><span>The email address has already been used.</span></div><i class="close fa-solid fa-xmark" onclick="(this.parentElement).remove(); canShowToast = true;"></i></div>';
    exit();
}

// Proceed with registration if there are no errors
$sql = "INSERT INTO users(username, pass, email, SoDienThoai, ngay) VALUES (?, ?, ?, ?, Now())";
$stmt = $conn->prepare($sql);
$stmt->execute([$u, $pass, $email, $SoDienThoai]);

if ($stmt->rowCount() == 1) {
    echo '<div class="toast success"><i class="fa-solid fa-check-circle"></i><div class="content"><div class="title">Success</div><span>Registration successful, please proceed to the login form and log in.</span></div><i class="close fa-solid fa-xmark" onclick="(this.parentElement).remove(); canShowToast = true;"></i></div>';
    //send email
} else {
    echo "Update unsuccessful";
}
?>
