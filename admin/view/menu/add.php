<title>پنل <?=($user->isAdmin($_SESSION['userId']))?'مدیریت':'کاربری'?> | اضافه کردن منوی جدید</title><div class="row">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            افزودن منوی جدید
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="ui form form-rtl">
                            <form action="#" method="post">
                                <div class="col-deposit-form" id="context">
                                    <div id="DepositeSection2">
                                        <div id="myPartialContainer">
                                            <?php if ($errMsg): ?>
                                                <div style="padding: 5px 30px" class="bg-danger text-right font-light">
                                                    <h4 class="text-danger text-bold"><?= nl2br($errMsg) ?></h4>
                                                </div>
                                            <?php endif; ?>
                                            <h4 class="text-bold">افزودن</h4><br>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="field placeholder">
                                                        <input required id="code" name="frm[title]" type="text">
                                                        <label for="code" class="active">عنوان منو</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="field placeholder">
                                                        <select class="form-control" name="frm[parent_id]" id="sel">
                                                            <option value="0">سرگروه</option>
                                                            <?php foreach ($list as $val): ?>
                                                                <option value="<?= $val['id'] ?>"><?= $val['title'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label for="sel" class="active">دسته بندی مادر</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="field">
                                                        <label class="active">وضعیت : </label>
                                                        <label for="radio1" class="label label-success">فعال</label>
                                                        <input type="radio" id="radio1" name="frm[status]" value="1" checked>
                                                        <label for="radio2" class="label label-danger">غیر فعال</label>
                                                        <input type="radio" id="radio2" name="frm[status]" value="0">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="field placeholder">
                                                        <input required id="url" name="frm[url]" type="text">
                                                        <label for="url" class="active">آدرس منو</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="field placeholder">
                                                        <input required id="sort" name="frm[sort]" type="number">
                                                        <label for="sort" class="active">ترتیب نمایش منو</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-lg-offset-3">
                                                    <button name="frmBtn" type="submit"
                                                            class="btn btn-block btn-success btn-lg">
                                                        افزودن
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->