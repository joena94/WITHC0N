<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>WHITEHAT2021</title>
  <link rel="stylesheet" type="text/css" href="css/header.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/moonspam/NanumSquare/master/nanumsquare.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<?php include('header.html') ?>

  <article id="outBox1">
    <div id="main">
      <div class="mainLogo">
        <img src="assets/img/outbox_logo.png" alt="">
      </div>
      <div class="contestDate">
        <p>참가신청 ㅣ 2021. 8. 23 (월) - 2021. 9. 10(금)</p>
      </div>
      <div class="dDay">
        <span>예선</span>
        <p>D-<?php
        $nDate = date("Y-m-d",time());
        $valDate = Trim('2021-09-11'); // ('yyyy-mm-dd' 형식)
        $leftDate = intval((strtotime($nDate)-strtotime($valDate)) / 86400) * -1;
        echo str_pad($leftDate, 2, "0", STR_PAD_LEFT);

        ?></p>
      </div>
      <div class="host">
        <img src="assets/img/host.png" alt="">
      </div>
      <p class="contact">문의 : admin@whitehatcontest.org</p>
    </div>
  </article>
  <article id="outBox2">
    <div id="main">
      <div class="withcon">
        <span>함께하는 강력한 사이버 국방</span>
        <p class="slogan">Go for CYBER, Go for WITH</p>
        <p class="exp">
          화이트햇 콘테스트는 사이버 위협에 대해<br>
          국가차원의 사이버 인재 발굴 및 육성이 필요하다는 취지로 2013 처음으로 개최되었습니다.
          <br>
          <br>
          해킹대회를 활용하여 우수한 사이버인재를 발굴하고 전문가 강연을 통해<br>
          사이버보안기술 및 현장경험을 나누는 연례행사로 자리매김하였습니다.<br>
        </p>
      </div>
    </div>
  </article>
  <article id="outBox3">
    <div id="main">
      <iframe width="100%" height="600PX" src="https://www.youtube.com/embed/mvDV7xRlYls" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
  </article>
  <article id="outBox4">
    <div id="main">
      <div class="info">
        <img src="assets/img/contest_info2.png" alt="">
      </div>
    </div>
  </article>
  <article id="outBox5">
    <div id="main">
      <p class="outBox5_fr">WHITEHAT CONTEST KOREA 2021</p>
      <p class="outBox5_se">2021 대한민국 화이트햇 콘테스트</p>
      <span>예선결과</span>
      <div class="result">
        <div class="teen re1">청소년</div>
        <div class="adult re1">일 반</div>
        <div class="sol re1">국 방</div>
      </div>
      <table class="teenTable">
        <tr>
          <th>Rank</th>
          <th>Team name</th>
        </tr>
        <tr>
          <td>1</td>
          <td>팀명을 적어주세요</td>
        </tr>
        <tr>
          <td>2</td>
          <td>팀명을 적어주세요</td>
        </tr>
        <tr>
          <td>3</td>
          <td>팀명을 적어주세요</td>
        </tr>
        <tr>
          <td>4</td>
          <td>팀명을 적어주세요</td>
        </tr>
        <tr>
          <td>5</td>
          <td>팀명을 적어주세요</td>
        </tr>
        <tr>
          <td>6</td>
          <td>팀명을 적어주세요</td>
        </tr>
        <tr>
          <td>7</td>
          <td>팀명을 적어주세요</td>
        </tr>
        <tr>
          <td>8</td>
          <td>팀명을 적어주세요</td>
        </tr>
      </table>
      <table class="adultTable">
        <tr>
          <th>Rank</th>
          <th>Team name</th>
        </tr>
        <tr>
          <td>1</td>
          <td>ㅁㅇ팀명을 적어주세요</td>
        </tr>
        <tr>
          <td>2</td>
          <td>팀명을 적어주세요</td>
        </tr>
        <tr>
          <td>3</td>
          <td>팀명을 적어주세요</td>
        </tr>
        <tr>
          <td>4</td>
          <td>팀명을 적어주세요</td>
        </tr>
        <tr>
          <td>5</td>
          <td>팀명을 적어주세요</td>
        </tr>
        <tr>
          <td>6</td>
          <td>팀명을 적어주세요</td>
        </tr>
        <tr>
          <td>7</td>
          <td>팀명을 적어주세요</td>
        </tr>
        <tr>
          <td>8</td>
          <td>팀명을 적어주세요</td>
        </tr>
      </table>
      <table class="solTable">
        <tr>
          <th>Rank</th>
          <th>Team name</th>
        </tr>
        <tr>
          <td>1</td>
          <td>내팀명을 적어주세요</td>
        </tr>
        <tr>
          <td>2</td>
          <td>팀명을 적어주세요</td>
        </tr>
        <tr>
          <td>3</td>
          <td>팀명을 적어주세요</td>
        </tr>
        <tr>
          <td>4</td>
          <td>팀명을 적어주세요</td>
        </tr>
        <tr>
          <td>5</td>
          <td>팀명을 적어주세요</td>
        </tr>
        <tr>
          <td>6</td>
          <td>팀명을 적어주세요</td>
        </tr>
        <tr>
          <td>7</td>
          <td>팀명을 적어주세요</td>
        </tr>
        <tr>
          <td>8</td>
          <td>팀명을 적어주세요</td>
        </tr>
      </table>
    </div>
  </article>
  <article id="outBox6">
    <div id="main">
      <div class="info">
        <img src="assets/img/confe_info.png" alt="">
      </div>
    </div>
  </article>

  <script>
    $(document).ready(function(){
      $(".teen").click(function(){
        $(".teenTable").show();
        $(".adultTable").hide();
        $(".solTable").hide();
      });
      $(".adult").click(function(){
        $(".adultTable").show();
        $(".teenTable").hide();
        $(".solTable").hide();
      });
      $(".sol").click(function(){
        $(".solTable").show();
        $(".teenTable").hide();
        $(".adultTable").hide();
      });
    });
  </script>
  <script>
    var speed = 500;	// 스크롤 스피드 수치로 사용할 변수

    	//로직
    	function scrolling(obj){
    		if (!obj){	// 예외처리, 현재는 기능적으로 필요한 부분은 아님, 관례적 사용
    			$('html, body').animate({scrollTop:0},speed);
    		}else{
    			var posTop = $(obj).offset().top -80;	// posTop = 매개변수로 들어온 컨텐츠 obj 의 offset().top - 네비게이션 높이
    			$('html, body').animate({scrollTop:posTop}, speed )	// body의 스크롤이동 : posTop
    		}
    	};

    	$(".menu li a, #logo").click(function(){	// 네비게이션 클릭시
    		var direction = $(this).attr("href");	// direction = 클릭한 요소의 href 속성
    		scrolling( direction );	// direction 을 인자로 함수 실행
    		return false;	// 본래 이벤트 방지
    	});
  </script>
  <footer>
    <?php include('footer.html') ?>
  </footer>
</body>
</html>
