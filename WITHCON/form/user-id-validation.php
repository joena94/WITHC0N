<?php
    include('mysql_conn.php');

    $user_id = mysqli_real_escape_string($_POST['user-id']);

    $qry = "select * from user where user_id='{$user_id}'";
    $sql_result = mysqli_query($conn, $qry);

    $exist = mysqli_num_rows($sql_result);
    if($exist > 0) { // 중복 체크
        echo "이미 가입된 계정입니다.";
    } else {
        echo "사용 가능한 계정입니다.";
    }

    include('mysql_disconn.php');
?>