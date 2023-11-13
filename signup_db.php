<?php
session_start();
require_once 'config/connect.php';

if (isset($_POST['signup'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verifypassword = $_POST['c_password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $identify = $_POST['ident'];
    $birthday = $_POST['birth'];
    $homenumber = $_POST['homenum'];
    $subdistrict = $_POST['subdis'];
    $district = $_POST['dis'];
    $street = $_POST['street'];
    $province = $_POST['province'];
    $post = $_POST['post'];
    $phone = $_POST['phone'];
    $urole = 'user';

    if (empty($email)) {
        $_SESSION['error'] = 'กรุณากรอก email';
        header("location: signup.php");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'รูปแบบ email ไม่ถูกต้อง';
        header("location: signup.php");
    } else if (empty($password)) {
        $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
        header("location: signup.php");
    } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
        $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
        header("location: signup.php");
    } else if (empty($verifypassword)) {
        $_SESSION['error'] = 'กรุณากรอกเพื่อยืนยันรหัสผ่าน';
        header("location: signup.php");
    } else if ($password != $verifypassword) {
        $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
        header("location: signup.php");
    } else if (empty($firstname)) {
        $_SESSION['error'] = 'กรุณากรอกชื่อจริง';
        header("location: signup.php");
    } else if (empty($lastname)) {
        $_SESSION['error'] = 'กรุณากรอกนามสกุล';
        header("location: signup.php");
    } else if (empty($identify)) {
        $_SESSION['error'] = 'กรุณากรอกรหัสบัตรประชาชน';
        header("location: signup.php");
    } else if (empty($birthday)) {
        $_SESSION['error'] = 'กรุณากรอกวันเกิด';
        header("location: signup.php");
    } else if (empty($homenumber)) {
        $_SESSION['error'] = 'กรุณากรอกบ้านเลขที่';
        header("location: signup.php");
    } else if (empty($subdistrict)) {
        $_SESSION['error'] = 'กรุณากรอกตำบล';
        header("location: signup.php");
    } else if (empty($district)) {
        $_SESSION['error'] = 'กรุณากรอกอำเภอ';
        header("location: signup.php");
    } else if (empty($province)) {
        $_SESSION['error'] = 'กรุณากรอกจังหวัด';
        header("location: signup.php");
    } else if (empty($post)) {
        $_SESSION['error'] = 'กรุณากรอกรหัสไปรษณีย์';
        header("location: signup.php");
    } else if (empty($phone)) {
        $_SESSION['error'] = 'กรุณากรอกเบอร์โทร';
        header("location: signup.php");
    } else {
        try {

            $check_email = $conn->prepare("SELECT email FROM user_account WHERE email = :email");
            $check_email->bindParam(":email", $email);
            $check_email->execute();
            $row = $check_email->fetch(PDO::FETCH_ASSOC);
            if ($row['email'] == $email) {
                $_SESSION['warning'] = "มีอีเมลนี้อยู่ในระบบแล้ว click ที่ login ด้านขวาบนเพื่อ login";
                header("location: signup.php");
            } else if (!isset($_SESSION['error'])) {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("INSERT INTO user_account(email, password, firstname, lastname, citizen_ID, birthday,
                homenumber, subdistrict, district, street, province, zipcode, phone, urole) VALUE (:email, :password,
                :firstname, :lastname, :identify, :birthday, :homenumber, :subdistrict, :district, :street, :province, :post, 
                :phone, :urole)");
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":password", $password);
                $stmt->bindParam(":firstname", $firstname);
                $stmt->bindParam(":lastname", $lastname);
                $stmt->bindParam(":identify", $identify);
                $stmt->bindParam(":birthday", $birthday);
                $stmt->bindParam(":homenumber", $homenumber);
                $stmt->bindParam(":subdistrict", $subdistrict);
                $stmt->bindParam(":district", $district);
                $stmt->bindParam(":street", $street);
                $stmt->bindParam(":province", $province);
                $stmt->bindParam(":post", $post);
                $stmt->bindParam(":phone", $phone);
                $stmt->bindParam(":urole", $urole);
                $stmt->execute();
                $_SESSION['success'] = "สมัครสมาชิกเรียบร้อยแล้ว";
                header("location: signup.php");
            } else {
                $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                header("location: signup.php");
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}


?>