<title>پنل <?=($user->isAdmin($_SESSION['userId']))?'مدیریت':'کاربری'?> | ویرایش اطلاعات وبسایت</title><div class="row">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                ویرایش اطلاعات وبسایت
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
                                                <?php if (isset($sucMsg)): ?>
                                                    <div style="padding: 5px 30px" class="bg-success text-right font-light">
                                                        <h4 class="text-success text-bold"><?= nl2br($sucMsg) ?></h4>
                                                    </div>
                                                <?php endif; ?>
                                                <h4 class="text-bold">ویرایش</h4><br>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="field placeholder">
                                                            <input required id="title" name="frm[title]" type="text"
                                                                   value="<?= $setting->setting('title')['value'] ?>">
                                                            <label for="title" class="active">عنوان</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="field placeholder">
                                                            <textarea rows="10" class="form-control" required id="address" name="frm[address]"><?= $setting->setting('address')['value'] ?></textarea>
                                                            <label for="address" class="active">آدرس</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="field placeholder">
                                                            <input required id="tel" name="frm[tel]" type="number"
                                                                   value="<?= $setting->setting('tel')['value'] ?>">
                                                            <label for="tel" class="active">تلفن</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="field placeholder">
                                                            <input required id="fax" name="frm[fax]" type="number"
                                                                   value="<?= $setting->setting('fax')['value'] ?>">
                                                            <label for="fax" class="active">فکس</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="field placeholder">
                                                            <input id="image" name="image" type="file" class="form-control">
                                                            <label for="image" class="active">لوگو</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="field placeholder">
                                                            <textarea rows="5" class="form-control" required id="footer" name="frm[footer]"><?= $setting->setting('footer')['value'] ?></textarea>
                                                            <label for="footer" class="active">متن فوتر</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 text-center">
                                                        <?php if (!empty($setting->setting('logo')['value'])): ?>
                                                            <img width="200px" src="../<?= $setting->setting('logo')['value'] ?>"
                                                                 class="img-circle"/>
                                                            <button type="button" class="btn btn-danger" id="removeImg" name="removeImg">حذف عکس</button>
                                                            <input id="image_path" hidden type="text" value="<?= $setting->setting('logo')['value'] ?>" name="frm[image_path]">
                                                        <?php else: ?>

                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="DepositeSection3">
                                            <div class="text-left btn-box mt-4">
                                                <button name="frmBtn" type="submit" id="btnsubmit"
                                                        class="btn btn-block btn-success btn-lg">ویرایش نهایی
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