<title>پنل <?=($user->isAdmin($_SESSION['userId']))?'مدیریت':'کاربری'?> | اضافه کردن برگه جدید</title><div class="row">
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            افزودن برگه جدید
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
                            <form action="#" method="post" name="sabtfrm" enctype="multipart/form-data">
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
                                                <div class="col-sm-8">
                                                    <div class="field placeholder">
                                                        <input required id="code" name="frm[title]" type="text">
                                                        <label for="code" class="active">عنوان برگه</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="field">
                                                        <label class="active">وضعیت برگه : </label>
                                                        <label for="radio1" class="label label-success">انتشار</label>
                                                        <input type="radio" id="radio1" name="frm[status]" value="published" checked>
                                                        <label for="radio2" class="label label-primary">پیش نویس</label>
                                                        <input type="radio" id="radio2" name="frm[status]" value="draft">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="field placeholder cke_rtl">
                                                        <textarea rows="10" class="form-control" id="text" name="frm[text]"></textarea>
                                                        <label for="text" class="active">توضیحات برگه</label>
                                                        <script>
                                                            CKEDITOR.replace( 'text' );
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="DepositeSection3">
                                        <div class="text-left btn-box mt-4">
                                            <button name="frmBtn" type="submit" id="btnsubmit"
                                                    class="btn btn-block btn-success btn-lg">ثبت نهایی
                                                برگه
                                            </button>
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