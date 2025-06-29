<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../public/admin/dist/css/bootstrap-theme.css">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="../public/admin/dist/css/rtl.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/admin/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
        <link rel="stylesheet" href="../public/admin/dist/css/AdminLTE.css">
        <link rel="stylesheet" href="../public/admin/dist/css/skins/skin-blue.min.css">
    <?php if ($controller == "location" and in_array($action,array("add","edit"))): ?>
    <link rel="stylesheet" href="../public/admin/dist/css/form.css"/>
    <link rel="stylesheet" href="../public/admin/dist/css/picture.css"/>
    <?php endif; ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">
        <a href="../index.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">رزرو</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>سامانه رزرو اقامتگاه</b></span>
        </a>
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="../<?=($user->getUser($_SESSION['userId'])['image_path'])?$user->getUser($_SESSION['userId'])['image_path']:'public/admin/images/users/profile.png'?>" class="user-image">
                            <span class="hidden-xs"><?= $user->getUser($_SESSION['userId'])['fname'] .' '.$user->getUser($_SESSION['userId'])['lname']; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="../<?=($user->getUser($_SESSION['userId'])['image_path'])?$user->getUser($_SESSION['userId'])['image_path']:'public/admin/images/users/profile.png'?>" class="img-circle"
                                     alt="User Image">

                                <p><?= $user->getUser($_SESSION['userId'])['fname'] .' '.$user->getUser($_SESSION['userId'])['lname']; ?>
                                    <small><?= ($user->isAdmin($_SESSION['userId']))?'مدیریت کل سایت' : 'کاربر' ?></small>
                                    <a class="text-white" href="index.php?controller=user&action=edit"><i class="fa fa-gear"></i> ویرایش اطلاعات</a>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="text-center">
                                    <a href="index.php?controller=user&action=logout" class="btn btn-danger">خروج</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">

        <section class="sidebar">

            <div class="user-panel">
                <div class="pull-right image">
                    <img src="../<?=($user->getUser($_SESSION['userId'])['image_path'])?$user->getUser($_SESSION['userId'])['image_path']:'public/admin/images/users/profile.png'?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-right info">
                    <p><?= $user->getUser($_SESSION['userId'])['fname'] .' '.$user->getUser($_SESSION['userId'])['lname']; ?></p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li <?= ($controller==='index')?'class="active"':''?>><a href="index.php"><i class="fa fa-dashboard"></i> <span>داشبورد</span></a></li>
                <?php if ($user->isAdmin($_SESSION['userId'])):?>
                <li>
                    <a id="m1" class="drop-menu" href="#"><i class="fa fa-map-marker"></i><span>  مکان های اقامتی</span><i
                                class="fa fa-angle-left"></i></a>
                    <ul data-widget="tree">
                        <li class="drop-item <?= ($controller==='location' and $action==='add')?'active':''?>"><a href="index.php?controller=location&action=add"><i class="fa fa-plus"></i><span> افزودن مکان جدید</span></a>
                        </li>
                        <li class="drop-item <?= ($controller==='location' and $action==='list')?'active':''?>"><a href="index.php?controller=location&action=list"><i class="fa fa-list"></i><span> لیست اماکن</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a id="m2" class="drop-menu" href="#"><i class="fa fa-dollar"></i><span>وام</span><i
                                class="fa fa-angle-left"></i></a>
                    <ul data-widget="tree">
                        <li class="drop-item <?= ($controller==='loan' and $action==='add')?'active':''?>"><a href="index.php?controller=loan&action=add"><i class="fa fa-plus"></i><span> افزودن وام جدید</span></a>
                        </li>
                        <li class="drop-item <?= ($controller==='loan' and $action==='list')?'active':''?>"><a href="index.php?controller=loan&action=list"><i class="fa fa-list"></i><span> لیست وام ها</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a id="m22" class="drop-menu" href="#"><i class="fa fa-sticky-note"></i><span>اخبار</span><i
                                class="fa fa-angle-left"></i></a>
                    <ul data-widget="tree">
                        <li class="drop-item <?= ($controller==='news' and $action==='add')?'active':''?>"><a href="index.php?controller=news&action=add"><i class="fa fa-plus"></i><span> افزودن خبر جدید</span></a>
                        </li>
                        <li class="drop-item <?= ($controller==='news' and $action==='list')?'active':''?>"><a href="index.php?controller=news&action=list"><i class="fa fa-list"></i><span> لیست اخبار</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a id="m3" class="drop-menu" href="#"><i class="fa fa-navicon"></i><span>  منوها</span><i
                                class="fa fa-angle-left"></i></a>
                    <ul data-widget="tree">
                        <li class="drop-item"><a href="index.php?controller=menu&action=add"><i class="fa fa-plus"></i><span> افزودن منوی جدید</span></a>
                        </li>
                        <li class="drop-item"><a href="index.php?controller=menu&action=list"><i class="fa fa-list"></i><span> لیست منوها</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a id="m4" class="drop-menu" href="#"><i class="fa fa-user"></i><span>  کاربران</span><i
                                class="fa fa-angle-left"></i></a>
                    <ul data-widget="tree">
                        <li class="drop-item"><a href="index.php?controller=user&action=add"><i class="fa fa-user-plus"></i><span> افزودن کاربر جدید</span></a>
                        </li>
                        <li class="drop-item"><a href="index.php?controller=user&action=list"><i class="fa fa-list"></i><span> لیست کاربران</span></a>
                        </li>
                    </ul>
                </li>
                    <li>
                        <a id="m5" class="drop-menu" href="#"><i class="fa fa-file-text"></i><span>  برگه ها</span><i
                                    class="fa fa-angle-left"></i></a>
                        <ul data-widget="tree">
                            <li class="drop-item"><a href="index.php?controller=page&action=add"><i class="fa fa-plus"></i><span> افزودن برگه جدید</span></a>
                            </li>
                            <li class="drop-item"><a href="index.php?controller=page&action=list"><i class="fa fa-list"></i><span> لیست برگه ها</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a id="m6" class="drop-menu" href="#"><i class="fa fa-sliders"></i><span>  مدیریت اسلایدر</span><i
                                    class="fa fa-angle-left"></i></a>
                        <ul data-widget="tree">
                            <li class="drop-item"><a href="index.php?controller=slider&action=add"><i class="fa fa-plus"></i><span> افزودن اسلاید جدید</span></a>
                            </li>
                            <li class="drop-item"><a href="index.php?controller=slider&action=list"><i class="fa fa-list"></i><span> لیست اسلایدها</span></a>
                            </li>
                        </ul>
                    </li>
                    <li <?= ($controller==='comment' and $action==='list')?'class="active"':''?>><a href="index.php?controller=comment&action=list"><i class="fa fa-comments"></i> <span>لیست نظرات </span></a></li>

                <?php endif;?>
                    <li <?= ($controller==='order' and $action==='list')?'class="active"':''?>><a href="index.php?controller=order&action=list"><i class="fa fa-shopping-basket"></i> <span>لیست سفارشات </span></a></li>
                <li <?= ($controller==='user' and $action==='edit' and !isset($_GET['id']))?'class="active"':''?>><a href="index.php?controller=user&action=edit"><i class="fa fa-gear"></i> <span>ویرایش اطلاعات کاربری</span></a></li>
                <?php if ($user->isAdmin($_SESSION['userId'])):?>
                    <li <?= ($controller==='setting')?'class="active"':''?>><a href="index.php?controller=setting&action=edit"><i class="fa fa-gears"></i> <span>ویرایش اطلاعات وبسایت</span></a></li>
                <?php endif;?>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>