<?php
session_start();
require_once 'config/connect.php';

if (isset($_POST['add'])) {
    $movname = $_POST['moviename'];
    $length = $_POST['mlength'];
    $type = $_POST['mType'];
    $re = $_POST['release'];
    $detail = $_POST['detail'];
    $ac = $_POST['actor'];
    $movimg = $_POST['movieimage'];
    $direct = $_POST['director'];

    $stmt = $conn->prepare("INSERT INTO movie(movie_name, mLength, mType, release_date, detail, actor, M_image, director) 
    VALUE (:movname, :length, :type, :re, :detail, :ac, :movimg, :direct)");
    $stmt->bindParam(":movname", $movname);
    $stmt->bindParam(":length", $length);
    $stmt->bindParam(":re", $re);
    $stmt->bindParam(":type", $type);
    $stmt->bindParam(":detail", $detail);
    $stmt->bindParam(":ac", $ac);
    $stmt->bindParam(":movimg", $movimg);
    $stmt->bindParam(":direct", $direct);
    $stmt->execute();
    $_SESSION['success'] = "เพิ่มภาพยนต์เรียบร้อย!";
    header("location: admin.php");


}
?>