$("#email-validation").click(function (event) {
    $.ajax({
        url: "form/send-email-validation.php",
        type: "post",
        dataType: "json",
        data: {
            "user-email": $("#user-email").val(),
        }
    }).always(function (data) {
        alert(data.responseText);
    });
});

$("#team-validation").click(function (event) {
    if ($("#track-form option:selected").val() == "") {
        alert('트랙을 선택해 주세요.');
        return;
    }
    $.ajax({
        url: "form/team-validation.php",
        type: "post",
        dataType: "json",
        data: {
            "create-team-flag": $("#create-team").prop('checked'),
            "join-team-flag": $("#join-team").prop('checked'),
            "team-id": $("#team-id").val(),
            "team-pw": $("#team-pw").val(),
            "user-track": $("#track-form option:selected").val(),
        }
    }).always(function (data) {
        alert(data.responseText);
    });
});

$("#id-validation").click(function (event) {
    if ($("#user-id").val() == "") {
        alert('아이디를 입력해 주세요');
        return;
    }

    $.ajax({
        url: "form/user-id-validation.php",
        type: "post",
        dataType: "json",
        data: {
            "user-id": $("#user-id").val(),
        }
    }).always(function (data) {
        alert(data.responseText);
    });
});

$("#submit-form").click(function (event) {
    if ($("#track-form option:selected").val() == "") {
        alert('트랙을 선택해 주세요.');
        return;
    }

    if ($("#user-id").val() == "") {
        alert('아이디를 입력 해주세요');
        return;
    }

    if ($("#user-pw").val() == "") {
        alert('비밀번호를 입력 해주세요');
        return;
    }

    if ($("#user-pw-chk").val() == "") {
        alert('비밀번호를 확인 해주세요');
        return;
    }

    if ($("#team-id").val() == "") {
        alert('팀 명을 입력 해주세요');
        return;
    }

    if ($("#team-pw").val() == "") {
        alert('팀 암호를 입력 해주세요');
        return;
    }

    if ($("#user-name").val() == "") {
        alert('성명을 입력 해주세요');
        return;
    }

    if ($("#user-ph").val() == "") {
        alert('연락처를 입력 해주세요.');
        return;
    }

    if ($("#user-email").val() == "") {
        alert('이메일을 입력해 주세요');
        return;
    }

    if ($("#user-email-chk").val() == "") {
        alert('이메일 인증을 입력해 주세요');
        return;
    }

    $.ajax({
        url: "form/submit-register.php",
        type: "post",
        dataType: "json",
        data: {
            "create-team-flag": $("#create-team").prop('checked'),
            "join-team-flag": $("#join-team").prop('checked'),
            "user-track": $("#track-form option:selected").val(),
            "user-id": $("#user-id").val(),
            "user-pw": $("#user-pw").val(),
            "user-pw-chk": $("#user-pw-chk").val(),
            "team-id": $("#team-id").val(),
            "team-pw": $("#team-pw").val(),
            "user-name": $("#user-name").val(),
            "user-ph": $("#user-ph").val(),
            "user-email": $("#user-email").val(),
            "user-email-chk": $("#user-email-chk").val(),
            "policy-agree": $("#policy-agree").is(":checked"),
        }
    }).always(function (data) {
        alert(data.responseText);
    });
});

// 8.20 코드 수정
$("#join-team").click(function () {
    $("#team-validation").html("팀 참가");
});

$("#create-team").click(function () {
    $("#team-validation").html("팀 생성");
});

// 8.20 핸드폰번호 js 추가
function autoHypenTel(str) {
  str = str.replace(/[^0-9]/g, '');
  var tmp = '';
    // 핸드폰 및 다른 지역 전화번호 일 경우
  if (str.length < 4) {
    return str;
  } else if (str.length < 8) {
    tmp += str.substr(0, 3);
    tmp += '-';
    tmp += str.substr(3);
    return tmp;
  } else {
    tmp += str.substr(0, 3);
    tmp += '-';
    tmp += str.substr(3, 4);
    tmp += '-';
    tmp += str.substr(7);
    return tmp;
  }

  return str;
}

$('#user-ph').keyup(function (event) {
  event = event || window.event;
  var _val = this.value.trim();
  this.value = autoHypenTel(_val);
});
