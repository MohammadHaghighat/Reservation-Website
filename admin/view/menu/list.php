<title>پنل <?=($user->isAdmin($_SESSION['userId']))?'مدیریت':'کاربری'?> | لیست منوها</title><div class="row">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            لیست منوها
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">همه‌ی منوها</h3>

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
                            <tbody >
                            <tr>
                                <th>شماره</th>
                                <th>عنوان منو</th>
                                <th>آدرس منو</th>
                                <th>دسته بندی مادر</th>
                                <th>وضعیت</th>
                                <th>ترتیب نمایش</th>
                                <th></th>
                                <th></th>
                            </tr>
                            <?php $i=1;
                            foreach ($list as $item): ?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$item['title']?></td>
                                    <td dir="ltr"><?=$item['url']?></td>
                                    <td>
                                        <?php
                                            if ($item['parent_id']){
                                                echo $obj->menu_list($item['parent_id'])['title'];
                                            }
                                            else{
                                                echo "سرگروه";
                                            }
                                        ?>
                                    </td>
                                    <td><span class="label label-<?=$item['status']?"success":"danger"?>"><?=$item['status']?"فعال":"غیرفعال"?></span></td>
                                    <td><?=$item['sort']?></td>
                                    <td><span><a class="btn btn-primary" href="index.php?controller=menu&action=edit&id=<?=$item['id']?>">ویرایش</a></span></td>
                                    <td><span><a class="btn btn-danger" href="index.php?controller=menu&action=delete&id=<?=$item['id']?>">حذف</a></span></td>
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
