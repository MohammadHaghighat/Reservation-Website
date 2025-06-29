<title>پنل <?= ($user->isAdmin($_SESSION['userId'])) ? 'مدیریت' : 'کاربری' ?> | داشبورد</title>
<div class="row">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                گزارش
                <small><?=($user->isAdmin($_SESSION['userId']))?"مرور کلی بر سایت":'مرروی بر عملکرد شما'?></small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green-gradient">
                    <div class="inner">
                        <h3><?=($report['income'])?numberformat($report['income']):0?> تومان </h3>
                        <p><?=($user->isAdmin($_SESSION['userId']))?"درآمد کل":'مجموع پرداختی شما'?></p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue-gradient">
                    <div class="inner">
                        <h3><?=($user->isAdmin($_SESSION['userId']))?$report['user']:jdate('l d F \ماه Y ',strtotime($report['user_created_date']))?></h3>

                        <p><?=($user->isAdmin($_SESSION['userId']))?"تعداد کاربران":'تاریخ عضویت'?></p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-purple-gradient">
                    <div class="inner">
                        <h3><?=$report['order']?></h3>

                        <p>تعداد سفارشات</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-basket"></i>
                    </div>
                </div>
            </div>
            <?php if ($user->isAdmin($_SESSION['userId'])):?>
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red-gradient">
                    <div class="inner">
                        <h3><?=$report['product']?></h3>

                        <p>تعداد محصولات</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-product-hunt"></i>
                    </div>
                </div>
            </div>
            <?php endif;?>
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow-gradient">
                    <div class="inner">
                        <h3><?=$report['comment']?></h3>

                        <p>تعداد نظرات ثبت شده</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-comments"></i>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->