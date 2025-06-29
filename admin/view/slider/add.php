<title>پنل <?= ($user->isAdmin($_SESSION['userId'])) ? 'مدیریت' : 'کاربری' ?> | اضافه کردن اسلاید جدید</title>
<div class="row">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                افزودن اسلاید جدید
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
                                                    <div style="padding: 5px 30px"
                                                         class="bg-danger text-right font-light">
                                                        <h4 class="text-danger text-bold"><?= nl2br($errMsg) ?></h4>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (isset($sucMsg)): ?>
                                                    <div style="padding: 5px 30px"
                                                         class="bg-success text-right font-light">
                                                        <h4 class="text-success text-bold"><?= nl2br($sucMsg) ?></h4>
                                                    </div>
                                                <?php endif; ?>
                                                <h4 class="text-bold">افزودن</h4><br>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="field placeholder">
                                                            <input required id="title" name="frm[title]" type="text">
                                                            <label for="title" class="active">عنوان</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="field placeholder">
                                                            <label for="urls-input" class="active">لینک به : </label>
                                                            <input id="urls-input" list="urls" name="frm[url]">
                                                            <?php if ($pros || $pages): ?>
                                                                <datalist id="urls">
                                                                    <?php if ($pros): ?>
                                                                        <?php foreach ($pros as $i): ?>
                                                                            <option value="index.php?controller=product&action=detail&id=<?= $i['id'] ?>"><?= $i['title'] ?></option>
                                                                        <?php endforeach; ?>
                                                                    <?php endif; ?>
                                                                    <?php if ($pages): ?>
                                                                        <?php foreach ($pages as $i): ?>
                                                                            <option value="index.php?controller=page&action=detail&id=<?= $i['id'] ?>"><?= $i['title'] ?></option>
                                                                        <?php endforeach; ?>
                                                                    <?php endif; ?>
                                                                </datalist>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="field placeholder">
                                                            <input required id="image" name="image" type="file"
                                                                   class="form-control" accept="image/*">
                                                            <label for="image" class="active">عکس اسلاید</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="DepositeSection3">

                                            <div class="text-left btn-box mt-4">
                                                <button name="frmBtn" type="submit" id="btnsubmit"
                                                        class="btn btn-block btn-success btn-lg">افزودن
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