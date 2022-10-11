
<?php
    include('mysql_conn.php');

    $create_team_flag = mysqli_real_escape_string($_POST['create-team-flag']);
    $join_team_flag = mysqli_real_escape_string($_POST['join-team-flag']);
    $team_id = mysqli_real_escape_string($_POST['team-id']);
    $team_pw = mysqli_real_escape_string($_POST['team-pw']);
    $track = mysqli_real_escape_string($_POST['user-track']);

    if($create_team_flag === "false" && $join_team_flag === "true") {
        $qry = "select team_name from team where team_name='{$team_id}' and track='{$track}'";
        $sql_result = mysqli_query($conn, $qry);
        $exist = mysqli_num_rows($sql_result);
        if($exist < 1) {
            echo "존재하지 않는 팀명입니다.";
        } else {
            $qry = "select * from team where team_name='{$team_id}' and team_password='{$team_pw}' and track='{$track}'";
            if($result = mysqli_fetch_array(mysqli_query($conn, $qry))) {
                $qry = "select * from team where team_name='{$team_id}' and team_password='{$team_pw}' and track='{$track}'";
                $result = mysqli_query($conn, $qry);
                $row = mysqli_fetch_array($result);
                $number_of_people = (int) $row['number_of_people'];
                if($number_of_people < 4) {
                    echo "팀에 가입 가능합니다.";
                } else {
                    echo "해당 팀의 인원이 초과되었습니다.";
                }
            } else {
                echo "팀 암호가 올바르지 못합니다.";
            }
        }
    } else if($create_team_flag === "true" && $join_team_flag === "false") {
        if(strlen($team_pw) < 8) {
            echo "팀 암호는 8자리 이상이여야 합니다.";
        } else {
            $qry = "select team_name from team where team_name='{$team_id}' and track='{$track}'";
            $sql_result = mysqli_query($conn, $qry);
            $exist = mysqli_num_rows($sql_result);
            if($exist > 0) {
                echo "이미 존재하는 팀 이름입니다.";
            } else {
                echo "사용 가능한 팀명입니다.";
            }
        }
    } else {
        echo "올바르지 못한 요청입니다.";
    }
    include('mysql_disconn.php');
?>
