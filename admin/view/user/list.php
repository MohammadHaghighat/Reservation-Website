<title>پنل <?=($user->isAdmin($_SESSION['userId']))?'مدیریت':'کاربری'?> | لیست کاربران</title><div class="row">
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            لیست کاربران
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">همه‌ی کاربران</h3>

                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right"
                                       placeholder="جستجو">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>شماره</th>
                                <th>نام</th>
                                <th>نام خانوادگی</th>
                                <th>نام پدر</th>
                                <th>کد ملی</th>
                                <th>مقطع تحصیلی</th>
                                <th>عکس</th>
                                <th>سطح دسترسی</th>
                                <th>تاریخ تولد</th>
                                <th></th>
                                <th></th>
                            </tr>
                            <?php $i = 1;
                            foreach ($list as $item): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $item['fname'] ?></td>
                                    <td><?= $item['lname'] ?></td>
                                    <td><?= $item['father_name'] ?></td>
                                    <td><?=$item['code_melli']  ?></td>
                                    <td><?=$item['grade']  ?></td>
                                    <td><img height="30px" src="../<?= ($item['image_path'])?$item['image_path']:'public/admin/images/users/profile.png' ?>"/></td>
                                    <td>
                                        <?php
                                        if ($item['role'] === 'admin') {
                                            echo "مدیر سایت";
                                        } else {
                                            echo "کاربر";
                                        }
                                        ?>
                                    </td>
                                    <td><?= substr($item['birth_date'],0,10) ?></td>
                                    <td><span><a class="btn btn-primary"
                                                 href="index.php?controller=user&action=edit&id=<?= $item['id'] ?>">ویرایش</a></span>
                                    </td>
                                    <td><span><a class="btn btn-danger"
                                                 href="index.php?controller=user&action=delete&id=<?= $item['id'] ?>">حذف</a></span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
