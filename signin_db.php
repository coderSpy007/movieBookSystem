<?php
session_start();
require_once 'config/connect.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email)) {
        $_SESSION['error'] = 'กรุณากรอก email';
        header("location: signin.php");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'รูปแบบ email ไม่ถูกต้อง';
        header("location: signin.php");
    } else if (empty($password)) {
        $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
        header("location: signin.php");
    } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
        $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
        header("location: signin.php");
    } else {
        try {

            $check_data = $conn->prepare("SELECT * FROM user_account WHERE email = :email");
            $check_data->bindParam(":email", $email);
            $check_data->execute();
            $row = $check_data->fetch(PDO::FETCH_ASSOC);
            $userID = $row['user_ID'];
            $_SESSION['userID'] = $userID;

            if ($check_data->rowCount() > 0) {

                if ($email == $row['email']) {
                    if ($password == $row['password']) {
                        if ($row['urole'] == 'admin') {
                            $_SESSION['admin_login'] = $row['user_ID'];
                            header("location: admin.php");
                        } else {
                            $_SESSION['user_login'] = $row['user_ID'];
                            header("location: nowShowing.php?userID=$userID");
                        }
                    } else {
                        $_SESSION['error'] = 'รหัสผ่านผิด';
                        header("location: signin.php");
                    }

                } else {
                    $_SESSION['error'] = 'email ผิด';
                    header("location: signin.php");
                }

            } else {
                $_SESSION['error'] = "ไม่มีข้อมูลนี้ในระบบ กรุณาสมัครสมาชิกเพื่อเข้าสู่ระบบ";
                header("location: signin.php");
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>