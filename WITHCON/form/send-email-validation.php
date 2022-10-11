<?php
    include('mysql_conn.php');

    if (mysqli_connect_errno()) {
        die('Connect Error: '.mysqli_connect_error());
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    $user_email = mysqli_real_escape_string($_POST['user-email']);
    $email_expression = '/^[a-zA-Z]{1}[a-zA-Z0-9.\-_]+@[a-z0-9]{1}[a-z0-9\-]+[a-z0-9]{1}\.(([a-z]{1}[a-z.]+[a-z]{1})|([a-z]+))$/';
    
    $qry = "select user_email from user where user_email='{$user_email}'";
    $sql_result = mysqli_query($conn, $qry);

    $exist = mysqli_num_rows($sql_result);
    if($exist > 0) { // 중복 체크
        echo "이미 가입된 이메일 입니다.";
    } else {
        /* 이메일 유효성 검증, email@domain.com 형태인지 확인 */
        if(filter_var($user_email, FILTER_VALIDATE_EMAIL)) { // (preg_match($email_expression, $user_email, $result)) {
            // 정상적인 이메일
            $validation_code = generateRandomString(4) . "-" . generateRandomString(4) . "-" . generateRandomString(4) . "-" . generateRandomString(6); // 사용자에게 보낼 인증 키 값 (18 자리 랜덤 문자열)
            $log_date = date("Y-m-d H:i:s");
    
            $to = $user_email;
    
            $subject = "[WITHCON 2021] 화이트햇콘테스트 이메일 인증 코드입니다.";
            
            $contents =  "안녕하세요, WITHCON 2021 입니다.<br><br>";
            $contents .= "이메일 인증을 위해 아래 코드를 가입 페이지에 입력해주세요.<br><br>";
            $contents .= "<strong>" . $validation_code . "</strong><br><br>";
            $contents .= "감사합니다.<br><br>";
    
            $headers = "From: admin@whitehatcontest.org\r\n";
            $headers .= 'Organization: Sender Organization ' . "\r\n";
            $headers .= 'MIME-Version: 1.0 ' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8 ' . "\r\n";
            $headers .= 'X-Priority: 3 ' ."\r\n" ;
            $headers .= 'X-Mailer: PHP ' . "\r\n" ;
            
            $mail_res = mail($to, $subject, $contents, $headers);
    
            if($mail_res) {
                $qry = "insert into email_validation(email, validation_code, date) values ('{$user_email}', '{$validation_code}', now());";
                $result = mysqli_query($conn, $qry);
                if($result) {
                    echo "이메일이 발송되었습니다.";
                } else {
                    echo "이메일 발송에 실패했습니다(error : 100)";
                }
            } else {
                echo "이메일 발송에 실패했습니다(error : 101)";
            }
    
         
        } else {
            // 형태를 안맞췄음
            echo "올바른 이메일 형태를 맞춰주세요. -- (example@domain.com)";
        }
    }

    include('mysql_disconn.php');
?>