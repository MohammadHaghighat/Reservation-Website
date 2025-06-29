<title>پنل <?=($user->isAdmin($_SESSION['userId']))?'مدیریت':'کاربری'?> | لیست اسلایدها</title><div class="row">
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            لیست اسلایدها
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">همه‌ی اسلایدها</h3>

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
                                <th>عنوان</th>
                                <th>لینک به</th>
                                <th>عکس</th>
                                <th></th>
                                <th></th>
                            </tr>
                            <?php $i = 1;
                            foreach ($list as $item): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $item['title'] ?></td>
                                    <td dir="ltr"><?= $item['url'] ?></td>
                                    <td>
                                        <?php if ($item['image_path']):?>
                                        <img height="30px" src="../<?=$item['image_path']?>"/>
                                        <?php else: ?>
                                        <span>ندارد</span>
                                        <?php endif;?>
                                    </td>
                                    <td><span><a class="btn btn-primary"
                                                 href="index.php?controller=slider&action=edit&id=<?= $item['id'] ?>">ویرایش</a></span>
                                    </td>
                                    <td><span><a class="btn btn-danger"
                                                 href="index.php?controller=slider&action=delete&id=<?= $item['id'] ?>">حذف</a></span>
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
