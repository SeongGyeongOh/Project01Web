<?php

    header("Content-Type:application/json; charset=utf-8");

    $data = file_get_contents('php://input');
    $_POST = json_decode($data, true);

    $profileImage = $_POST['profileImage'];
    $profileName = $_POST['profileName'];
    $bookCover = $_POST['bookCover'];
    $bookTitle = $_POST['bookTitle'];
    $bookAuthor = $_POST['bookAuthor'];
    $reviewTitle = $_POST['reviewTitle'];
    $reviewContent = $_POST['reviewContent'];

    $now = date("Y-m-d h:i");

    $conn = mysqli_connect("localhost", "kamniang", "rhdiddl12!", "kamniang");
    mysqli_query($conn, "set names utf8");

    $sql = "INSERT INTO SharedReview(ProfileImage,ProfileName,bookCover,bookTitle,bookAuthor,reviewTitle,reviewContent,date) 
    VALUES('$profileImage','$profileName','$bookCover','$bookTitle','$bookAuthor','$reviewTitle','$reviewContent','$now')";

    $result = mysqli_query($conn, $sql);

    if($result) echo "DB 저장 완료";
    else echo "DB 저장 실패";

    mysqli_close($conn);



    // $arr = array();
    // $arr['bookCover'] = $bookCover;
    // $arr['bookTitle'] = $bookTitle;
    
    // echo json_encode($arr);

?>