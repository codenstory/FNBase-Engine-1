<?php
$is_file = file_exists('./setting.php');
if($is_file == TRUE){
include 'setting.php';
include 'ip_ban.php';
}else{
echo '<script>window.location.href = "./install/index.php";</script>';
}
?>
<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo $fnSiteFab;?>" type="image/x-icon">
    <meta name="description" content="<?php echo $fnSiteDesc;?>">
    <meta name="theme-color" content="<?php echo $fnSiteColor;?>">
    <title><?php echo $fnSiteTitle;?></title>
    <link rel="stylesheet" href="assets/minified/themes/default.min.css" />
<script src="assets/minified/sceditor.min.js"></script>
<link href="/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
          @media (max-width: 800px) { .body .right-sidebar{display: none;}}
          .body .right-sidebar{float:right;width:20rem;padding:1rem 1rem 1rem 0}
    </style>

    <link href="navbar.css" rel="stylesheet">
  </head>
  <body style="background-color: <?php echo $fnSiteSubColor;?>">
<!-- 사전 정의 -->
<header style="display: none">
  <!-- 구글 사이트 관리 -->
<?php echo $fnSite_google; ?>
 <!-- PHP DB 연결 및 세션 시작 -->
                                <?php
session_start();
$conn = mysqli_connect("$fnSiteDB", "$fnSiteDBuser", "$fnSiteDBpw", "$fnSiteDBname");
//    PHP 차단 여부 체크
if(!empty($_SESSION['userid'])){
  $sql = "SELECT * FROM `_account` WHERE `id` LIKE '".$_SESSION['userid']."'";
  $result = mysqli_query($conn, $sql);
  while($raw = mysqli_fetch_array($result)){
  $stat = $raw['ban'];
  }
  }else{
  $stat = '0';
  }
if($stat == 1){
  echo '<div class="jumbotron"><p class="display-4">당신은 차단당했습니다...<br>';
  echo '<a href="#">차단소명 하러가기</a></p></div>';
}
                                ?>
</header>
<!-- 상단바 시작 -->
<nav class="navbar navbar-expand" style="background-color: <?php echo $fnSiteColor;?>">
  <div class="container">
    <a class="navbar-brand text-white" href="<?php echo $fnSite;?>"><?php echo $fnSiteName;?></a>

    <div class="collapse navbar-collapse" id="navbarsExample07">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">공설</a>
          <div class="dropdown-menu">
          <a class="dropdown-item" href="board.fn">방명록</a>
            <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="maint.fn">운영실</a>
              <a class="dropdown-item" href="recent.php">실시간</a>
            </div>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">사립</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="fn2nd.fn">가상국가 채널</a>
              <a class="dropdown-item" href="wrtnv.fn">창작소설 채널</a>
              <a class="dropdown-item" href="alter.fn">대안 채널</a>
            </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link text-white" href="/wiki">위키로</a>
        </li>
      </ul>
  </div>
<?php
if(!empty($_SESSION['userid'])){
      echo '<button class="btn btn-outline-primary" data-toggle="modal" data-target="#Modal" style="background-color: #fff"
      data-toggle="dropdown" id="dropdown08"><a href="#">'.$_SESSION['userck'].'</a></button>';
      echo '<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="Modal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content"><div class="modal-body"><button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <button class="btn btn-outline-dark" style="width: 6em"><a style="color: gray" href="user.php?a='.$_SESSION['userck'].'"><span class="text-dark">회원 정보</span></a></button>
      <button class="btn btn-outline-primary" style="width: 6em"><a style="color: gray" href="tools.php"><span class="text-primary">계정 활용</span></a></button>
        <button class="btn btn-outline-danger" style="width: 6em"><a href="login.php?log=out"><span class="text-danger">로그아웃</span></a></button>
        </div></div></div></div>';
}else{
      echo '<a class="btn btn-outline-primary" style="background-color: #fff" href="login.php">로그인</a>';
}
?>
</nav>
  <main style="background-color: transparent" role="main">
    <div style="height: 40px; width: 100%"></div>
<div class="container">