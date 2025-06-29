<title>پنل <?=($user->isAdmin($_SESSION['userId']))?'مدیریت':'کاربری'?> | ویرایش مکان <?=$item['title']?></title><div class="row">
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ویرایش مکان <?= $item['title'] ?>
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
                                                <div class="col-sm-12">
                                                    <div class="field placeholder">
                                                        <input required id="title" name="frm[title]" type="text"
                                                               value="<?= $item['title'] ?>">
                                                        <label for="title" class="active">عنوان</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="field placeholder">
                                                        <input required id="city" name="frm[city]" type="text"
                                                               value="<?= $item['city'] ?>">
                                                        <label for="city" class="active">شهر</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="field placeholder">
                                                        <input required id="address" name="frm[address]" type="text"
                                                               value="<?= $item['address'] ?>">
                                                        <label for="address" class="active">آدرس</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="field placeholder">
                                                        <input required id="tel" name="frm[tel]" type="number"
                                                               value="<?= $item['tel'] ?>">
                                                        <label for="tel" class="active">تلفن</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="field placeholder">
                                                        <input required id="floors" name="frm[floors]" type="number"
                                                               value="<?= $item['floors'] ?>">
                                                        <label for="floors" class="active">طبقه</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-sm-3">
                                                    <label for="hasElevator" class="label label-default">آسانسور</label>
                                                    <input id="hasElevator" name="frm[hasElevator]" type="checkbox" <?=($item['has_elevator'])?'checked':''?>>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="hasParking" class="label label-default">پارکینگ</label>
                                                    <input id="hasParking" name="frm[hasParking]" type="checkbox" <?=($item['has_parking'])?'checked':''?>>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="hasResturant" class="label label-default">رستوران</label>
                                                    <input id="hasResturant" name="frm[hasResturant]" type="checkbox" <?=($item['has_resturant'])?'checked':''?>>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="hasKitchen" class="label label-default">آشپزخانه</label>
                                                    <input id="hasKitchen" name="frm[hasKitchen]" type="checkbox" <?=($item['has_kitchen'])?'checked':''?>>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="field placeholder cke_rtl">
                                                        <textarea rows="10" class="form-control" id="description" name="frm[description]"><?= $item['description'] ?></textarea>
                                                        <label for="description" class="active">توضیحات مکان</label>
                                                        <script>
                                                            CKEDITOR.replace('description');
                                                        </script>
                                                    </div>
                                                </div>
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
                                                    <?php for ($i = 1; $i <= 8; $i++):
                                                        if (count($files_path) !== 0 and isset($files_path[$i - 1])):?>
                                                            <li id="dv<?= $i ?>"><img
                                                                        src="../<?= $files_path[$i - 1] ?>"
                                                                        class="img-responsive d-inline"
                                                                        onclick="selPic('<?= $i ?>')">
                                                                <a class="ui red right corner label" href="javascript:;"
                                                                   id="lnkIMGID"
                                                                   onclick="deleteimg('<?= $i ?>',this)"><i
                                                                            class="fa fa-close"></i></a>
                                                            </li>
                                                        <?php
                                                        else:
                                                            if ($i === 1):?>
                                                                <li id="dv1" class="firstpic"><img
                                                                            src="../public/admin/dist/img/addimage.png"
                                                                            class="img-responsive d-inline imgUp"
                                                                            onclick="selPic('1')">
                                                                </li>

                                                            <?php else: ?>
                                                                <li id="dv<?= $i ?>" <?= count($files_path) + 1 === $i ? 'class="firstpic"' : "" ?>>
                                                                    <img
                                                                            src="<?= count($files_path) + 1 === $i ? '../public/admin/dist/img/addimage.png' : "../public/admin/dist/img/image.png" ?>"
                                                                            class="img-responsive d-inline <?= count($files_path) + 1 === $i ? 'imgUp' : "" ?>"
                                                                            onclick="selPic('<?= $i ?>')">
                                                                </li>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    <?php endfor; ?>
                                                </ul>
                                                <?php for ($i = 1; $i <= 8; $i++):
                                                    if (count($files_path) !== 0 and isset($files_path[$i - 1])):?>
                                                        <input name="frm[fileOldPath<?=$i?>]" id="fileUploader<?=$i?>"
                                                               class="fileUploader" type="text" accept="image/*"
                                                               style="display: none"  value="<?=$files_path[$i-1]?>">
                                                    <?php else:?>
                                                        <input name="fileUploader<?=$i?>" id="fileUploader<?=$i?>"
                                                               class="fileUploader" type="file" accept="image/*"
                                                               style="display: none">
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                        <div class="text-left btn-box mt-4">
                                            <button name="frmBtn" type="submit" id="btnsubmit"
                                                    class="btn btn-block btn-success btn-lg">ویرایش نهایی
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