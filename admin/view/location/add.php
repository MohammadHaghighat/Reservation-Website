<title>پنل <?=($user->isAdmin($_SESSION['userId']))?'مدیریت':'کاربری'?> | اضافه کردن مکان جدید</title><div class="row">
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            افزودن مکان جدید
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
                                                <div class="col-sm-12">
                                                    <div class="field placeholder">
                                                        <input required id="title" name="frm[title]" type="text">
                                                        <label for="title" class="active">عنوان</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="field placeholder">
                                                        <input required id="city" name="frm[city]" type="text">
                                                        <label for="city" class="active">شهر</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="field placeholder">
                                                        <input required id="address" name="frm[address]" type="text">
                                                        <label for="address" class="active">آدرس</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="field placeholder">
                                                        <input required id="tel" name="frm[tel]" type="number">
                                                        <label for="tel" class="active">تلفن</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="field placeholder">
                                                        <input required id="floors" name="frm[floors]" type="number">
                                                        <label for="floors" class="active">طبقه</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-sm-3">
                                                    <label for="hasElevator" class="label label-default">آسانسور</label>
                                                    <input id="hasElevator" name="frm[hasElevator]" type="checkbox">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="hasParking" class="label label-default">پارکینگ</label>
                                                    <input id="hasParking" name="frm[hasParking]" type="checkbox">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="hasResturant" class="label label-default">رستوران</label>
                                                    <input id="hasResturant" name="frm[hasResturant]" type="checkbox">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="hasKitchen" class="label label-default">آشپزخانه</label>
                                                    <input id="hasKitchen" name="frm[hasKitchen]" type="checkbox">
                                                </div>
                                            </div>
                                            <br>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="field placeholder cke_rtl">
                                                        <textarea rows="10" class="form-control" id="description" name="frm[description]"></textarea>
                                                        <label for="description" class="active">توضیحات مکان</label>
                                                        <script>
                                                            CKEDITOR.replace('description');
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                    <div id="DepositeSection3">
                                        <div class="PicRow" style="">
                                            <h4 class="text-bold">
                                                عکس های مکان:
                                                <small class="text-blue">اختیاری</small>
                                            </h4>
                                            <div class="four-pic-uploader register-pic clearfix">
                                                <div id="messageDiv" class="hidden ui error message message-rtl">
                                                </div>
                                                <ul class="image-placeholders clearfix">


                                                    <li id="dv1" class="firstpic"><img
                                                                src="../public/admin/dist/img/addimage.png"
                                                                class="img-responsive d-inline imgUp"
                                                                onclick="selPic('1')">
                                                    </li>
                                                    <li id="dv2"><img src="../public/admin/dist/img/image.png"
                                                                      class="img-responsive d-inline"
                                                                      onclick="selPic('2')">
                                                    </li>
                                                    <li id="dv3"><img src="../public/admin/dist/img/image.png"
                                                                      class="img-responsive d-inline"
                                                                      onclick="selPic('3')"></li>
                                                    <li id="dv4"><img src="../public/admin/dist/img/image.png"
                                                                      class="img-responsive d-inline "
                                                                      onclick="selPic('4')"></li>
                                                    <li id="dv5"><img src="../public/admin/dist/img/image.png"
                                                                      class="img-responsive d-inline "
                                                                      onclick="selPic('5')"></li>
                                                    <li id="dv6"><img src="../public/admin/dist/img/image.png"
                                                                      class="img-responsive d-inline "
                                                                      onclick="selPic('6')"></li>
                                                    <li id="dv7"><img src="../public/admin/dist/img/image.png"
                                                                      class="img-responsive d-inline "
                                                                      onclick="selPic('7')"></li>
                                                    <li id="dv8"><img src="../public/admin/dist/img/image.png"
                                                                      class="img-responsive d-inline "
                                                                      onclick="selPic('8')"></li>
                                                </ul>
                                                <input name="fileUploader1" id="fileUploader1" class="fileUploader" type="file"
                                                       accept="image/*"
                                                       style="display: none">
                                                <input name="fileUploader2" id="fileUploader2" class="fileUploader" type="file"
                                                       accept="image/*"
                                                       style="display: none">
                                                <input name="fileUploader3" id="fileUploader3" class="fileUploader" type="file"
                                                       accept="image/*"
                                                       style="display: none">
                                                <input name="fileUploader4" id="fileUploader4" class="fileUploader" type="file"
                                                       accept="image/*"
                                                       style="display: none">
                                                <input name="fileUploader5" id="fileUploader5" class="fileUploader" type="file"
                                                       accept="image/*"
                                                       style="display: none">
                                                <input name="fileUploader6" id="fileUploader6" class="fileUploader" type="file"
                                                       accept="image/*"
                                                       style="display: none">
                                                <input name="fileUploader7" id="fileUploader7" class="fileUploader" type="file"
                                                       accept="image/*"
                                                       style="display: none">
                                                <input name="fileUploader8" id="fileUploader8" class="fileUploader" type="file"
                                                       accept="image/*"
                                                       style="display: none">


                                            </div>
                                        </div>
                                        <div class="text-left btn-box mt-4">
                                            <button name="frmBtn" type="submit" id="btnsubmit"
                                                    class="btn btn-block btn-success btn-lg">ثبت نهایی
                                                مکان
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