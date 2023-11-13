<?php
session_start();
require_once 'config/connect.php';

if (isset($_POST['addcoming'])) {
    $movname = $_POST['cname'];
    $movimg = $_POST['cimage'];
    $re = $_POST['crelease'];
    $length = $_POST['clength'];
    $type = $_POST['ctype'];
    $detail = $_POST['cdetail'];
    $ac = $_POST['cactor'];
    $direct = $_POST['cdirector'];

    $stmt = $conn->prepare("INSERT INTO comingSoon(coming_name, cLength, cType, cRelease, detail, actor, c_image, cDirector) 
    VALUE (:movname, :length, :type, :re, :detail, :ac, :movimg, :direct)");
    $stmt->bindParam(":movname", $movname);
    $stmt->bindParam(":length", $length);
    $stmt->bindParam(":type", $type);
    $stmt->bindParam(":re", $re);
    $stmt->bindParam(":detail", $detail);
    $stmt->bindParam(":ac", $ac);
    $stmt->bindParam(":movimg", $movimg);
    $stmt->bindParam(":direct", $direct);
    $stmt->execute();
    $_SESSION['success'] = "เพิ่มภาพยนต์เรียบร้อย!";
    header("location: admin2.php");


}
?>