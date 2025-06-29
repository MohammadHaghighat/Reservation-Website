<title>پنل <?=($user->isAdmin($_SESSION['userId']))?'مدیریت':'کاربری'?> | ویرایش وام <?=$item['title']?></title><div class="row">
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ویرایش وام <?= $item['title'] ?>
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
                                            <h4 class="text-bold">ویرایش</h4><br>
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="field placeholder">
                                                        <input required id="title" name="frm[title]" type="text"
                                                               value="<?= $item['title'] ?>">
                                                        <label for="title" class="active">عنوان</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="field">
                                                        <label class="active">وضعیت وام : </label>
                                                        <label for="radio1" class="label label-success">قابل رزرو</label>
                                                        <input type="radio" id="radio1" name="frm[status]" value="reservable" <?=($item['status']==='reservable')?'checked':''?>>
                                                        <label for="radio2" class="label label-danger">غیر قابل رزرو</label>
                                                        <input type="radio" id="radio2" name="frm[status]" value="not_reservable" <?=($item['status']==='not_reservable')?'checked':''?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="field placeholder">
                                                        <input required id="bank" name="frm[bank]" type="text"
                                                               value="<?= $item['bank'] ?>">
                                                        <label for="bank" class="active">نام باتک</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="field placeholder">
                                                        <input required id="bank_address" name="frm[bank_address]" type="text"
                                                               value="<?= $item['bank_address'] ?>">
                                                        <label for="bank_address" class="active"> آدرس بانک</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="field placeholder">
                                                        <input required id="count" name="frm[count]" type="number"
                                                               value="<?= $item['count'] ?>">
                                                        <label for="count" class="active">تعداد اقساط</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="field placeholder">
                                                        <input required id="profs" name="frm[profs]" type="number"
                                                               value="<?= $item['profs'] ?>">
                                                        <label for="profs" class="active">سود</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="field placeholder">
                                                        <input required id="winners" name="frm[winners]" type="number"
                                                               value="<?= $item['winners'] ?>">
                                                        <label for="winners" class="active">تعداد برندگان</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="field placeholder">
                                                        <input required id="total_price" name="frm[total_price]" type="number"
                                                               value="<?= $item['total_price'] ?>">
                                                        <label for="total_price" class="active">مبلغ کل</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="field placeholder">
                                                        <input required id="each_price" name="frm[each_price]" type="number"
                                                               value="<?= $item['each_price'] ?>">
                                                        <label for="each_price" class="active">مبلغ قسط اول</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="field placeholder">
                                                        <input required id="first_price" name="frm[first_price]" type="number"
                                                               value="<?= $item['first_price'] ?>">
                                                        <label for="first_price" class="active">مبلغ هر قسط</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="field placeholder cke_rtl">
                                                        <textarea rows="10" class="form-control" id="description" name="frm[description]"><?= $item['description'] ?></textarea>
                                                        <label for="description" class="active">توضیحات وام</label>
                                                        <script>
                                                            CKEDITOR.replace('description');
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="DepositeSection3">
                                        <div class="text-left btn-box mt-4">
                                            <button name="frmBtn" type="submit" id="btnsubmit"
                                                    class="btn btn-block btn-success btn-lg">ویرایش نهایی
                                                وام
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