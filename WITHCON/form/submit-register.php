<?php
    include('mysql_conn.php');

    $policy_agree = $_POST['policy-agree'];

    $user_track = mysqli_real_escape_string($_POST['user-track']);
    $user_ph = mysqli_real_escape_string($_POST['user-ph']);
    $user_name = mysqli_real_escape_string($_POST['user-name']);
    $user_id = mysqli_real_escape_string($_POST['user-id']);
    $user_pw = mysqli_real_escape_string($_POST['user-pw']);
    $user_pw_chk = mysqli_real_escape_string($_POST['user-pw-chk']);

    $create_team_flag = mysqli_real_escape_string($_POST['create-team-flag']);
    $join_team_flag = mysqli_real_escape_string($_POST['join-team-flag']);
    $team_id = mysqli_real_escape_string($_POST['team-id']);
    $team_pw = mysqli_real_escape_string($_POST['team-pw']);

    $user_email = mysqli_real_escape_string($_POST['user-email']);
    $user_email_chk = mysqli_real_escape_string($_POST['user-email-chk']);

    // 약관 확인
    if($policy_agree === "false") {
        echo "이용 약관에 동의하지 않았습니다.";
        exit(0);
    }

    // 아이디 중복 확인
    $qry = "select * from user where user_id='{$user_id}'";
    $sql_result = mysqli_query($conn, $qry);
    $exist = mysqli_num_rows($sql_result);
    if($exist > 0) { // 중복 체크
        echo "이미 가입된 계정입니다.";
        exit(0);
    }

    // 패스워드 확인
    if($user_pw != $user_pw_chk) {
        echo "암호 재입력이 일치하지 않습니다.";
        exit(0);
    }

    // 팀 확인
    if($create_team_flag === "false" && $join_team_flag === "true") {
        $qry = "select team_name from team where team_name='{$team_id}' and track='{$user_track}'";
        $sql_result = mysqli_query($conn, $qry);
        $exist = mysqli_num_rows($sql_result);
        if($exist < 1) {
            echo "존재하지 않는 팀명입니다.";
            exit(0);
        } else {
            $qry = "select * from team where team_name='{$team_id}' and team_password='{$team_pw}' and track='{$user_track}'";
            if($result = mysqli_fetch_array(mysqli_query($conn, $qry))) {
                $qry = "select * from team where team_name='{$team_id}' and team_password='{$team_pw}' and track='{$user_track}'";
                $result = mysqli_query($conn, $qry);
                $row = mysqli_fetch_array($result);
                $number_of_people = (int) $row['number_of_people'];
                if($number_of_people >= 4) {
                    echo "해당 팀의 인원이 초과되었습니다.";
                    exit(0);
                }
            } else {
                echo "팀 암호가 올바르지 못합니다.";
                exit(0);
            }
        }
    } else if($create_team_flag === "true" && $join_team_flag === "false") {
        if(strlen($team_pw) < 8) {
            echo "팀 암호는 8자리 이상이여야 합니다.";
            exit(0);
        } else {
            $qry = "select team_name from team where team_name='{$team_id}' and track='{$user_track}'";
            $sql_result = mysqli_query($conn, $qry);
            $exist = mysqli_num_rows($sql_result);
            if($exist > 0) {
                echo "이미 존재하는 팀 이름입니다.";
                exit(0);
            }
        }
    } else {
        echo "올바르지 못한 팀 요청입니다.";
        exit(0);
    }

    // 연락처 형식 확인
    $phone_expression = "/^[[:digit:]]{2,3}\-[[:digit:]]{3,4}\-[[:digit:]]{4}/"; // '/^(010|011|016|017|018|019)-[^0][0-9]{3,4}-[0-9]{4}/';
    if(!preg_match($phone_expression, $user_ph, $result)) {
        echo "전화번호 형식은 -- 010-0000-0000 으로 제출해주시길 바랍니다.";
        exit(0);
    }

    // 이메일 인증 확인
    $qry = "select * from user where user_email='{$user_email}'";
    $sql_result = mysqli_query($conn, $qry);
    $exist = mysqli_num_rows($sql_result);
    if($exist > 0) { // 중복 체크
        echo "이미 가입된 이메일입니다.";
        exit(0);
    }

    $qry = "select * from email_validation where email='{$user_email}' order by date desc limit 1";
    $sql_result = mysqli_query($conn, $qry);
    $exist = mysqli_num_rows($sql_result);
    $validation_code = mysqli_fetch_assoc($sql_result);
    if($exist == 0) {
        echo "이메일 인증 번호를 먼저 요청해주세요.";
        exit(0);
    } else {
        if($validation_code['validation_code'] == $user_email_chk) {
            if($create_team_flag === "true") {
                $qry = "insert into team(team_name, team_leader, number_of_people, team_password, track) values ('{$team_id}', '{$user_id}', 1, '{$team_pw}', '{$user_track}')";
                mysqli_query($conn, $qry);
            } else {
                $qry = "select * from team where team_name='{$team_id}' and team_password='{$team_pw}' and track='{$user_track}'";
                $result = mysqli_query($conn, $qry);
                $row = mysqli_fetch_array($result);
                $number_of_people = (int) $row['number_of_people'];
                $number_of_people = $number_of_people + 1;
                $qry = "update team set number_of_people={$number_of_people} where team_name='{$team_id}' and track='{$user_track}'";
                mysqli_query($conn, $qry);
            }

            $qry = "insert into user(user_id, password, track, user_name, user_ph, user_email, team_name, policy_agree_yn) values ('{$user_id}', '{$user_pw}', '{$user_track}', '{$user_name}', '{$user_ph}', '{$user_email}', '{$team_id}', 'Y')";
            $sql_result = mysqli_query($conn, $qry);
            if($sql_result) {
                echo "계정이 생성되었습니다.";

                $to = $user_email;

                $subject = "[WITHCON 2021] 화이트햇콘테스트 가입 완료 안내";
            
                $contents =  "안녕하세요, WITHCON 2021 입니다.<br><br>";
                $contents .= "<strong>" . $user_name . "</strong>님의 가입 완료 처리를 알리는 이메일 입니다." . "<br><br>";
                $contents .= "아래 링크로 접근하면 대회 오픈 전, 로그인을 확인해볼 수 있습니다.<br><br>";
                $contents .= "감사합니다.<br><br>";
                $contents .= "<a target='_blank' href='http://3.38.97.221/'>대회 로그인 링크</a>";

                $headers = "From: admin@whitehatcontest.org\r\n";
                $headers .= 'Organization: Sender Organization ' . "\r\n";
                $headers .= 'MIME-Version: 1.0 ' . "\r\n";
                $headers .= 'Content-type: text/html; charset=utf-8 ' . "\r\n";
                $headers .= 'X-Priority: 3 ' ."\r\n" ;
                $headers .= 'X-Mailer: PHP ' . "\r\n" ;
                
                $mail_res = mail($to, $subject, $contents, $headers);
            }
        } else {
            echo "이메일 인증 코드가 다릅니다.";
        }
    }

    include('mysql_disconn.php');

?>