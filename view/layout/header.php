<!doctype html>
<html lang="fa" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="public/default/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="public/default/css/mds.bs.datetimepicker.style.css" type="text/css">
  <link rel="stylesheet" href="public/default/style.css" type="text/css">
</head>

<body>
  <header>
    <div class="container">
      <div class="logoarea">
        <img src="public/default/images/logo.png" alt="logo">
        <h1>سامانه رفاهی و رزرو اماکن اقامتی</h1>
      </div>
      <?php if($user->isLogin()):?>
      <div class="userarea">
        <span>کاربر: <?=$_SESSION['userFullName']?></span>
        <a href="index.php?controller=user&action=logout">خروج</a>
      </div>
      <?php endif;?>
    </div>
  </header>
  <div class="menu">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav px-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">صفحه اصلی</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">تماس با ما</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                اقدامات رزرو
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">رزرو اماکن اقامتی</a></li>
                <li><a class="dropdown-item" href="#">لیست رزرو های انجام شده</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">سهمیه های آزاد</a></li>
              </ul>
            </li>
            <?php if($user->isLogin()):?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?controller=user&action=edit">ویرایش مشخصات کاربری</a>
            </li>
            <?php endif;?>
          </ul>
        </div>
      </div>
    </nav>
  </div>