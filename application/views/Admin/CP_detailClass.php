<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 11/22/2017
 * Time: 10:43 AM
 */
?>
<section class="content-header">
    <h1><?= $class['class_name'];?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <?php echo validation_errors(); ?>
                            <?php echo form_open_multipart('Admin/viewClass/'.$class['class_id']); ?>
                            <div class="form-group">
                                <label for="class_name" class="text-align-left control-label"><?= $this->lang->line('Class name')?></label>
                                <input type="text" name="class_name" class="form-control number-field" value="<?= $class['class_name'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="class_link" class="text-align-left control-label"><?= $this->lang->line('Class link')?></label>
                                <input type="text" name="class_link" class="form-control number-field" value="<?= $class['class_link'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="class_content" class="text-align-left control-label"><?= $this->lang->line('Class content')?></label>
                                <textarea rows="5" cols="50" name="class_content" class="form-control number-field" ><?= $class['class_content'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="class_description" class="text-align-left control-label"><?= $this->lang->line('Class description')?></label>
                                <textarea rows="5" cols="50" name="class_description" class="form-control number-field" ><?= $class['class_description'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="lang" class="text-align-left control-label"><?= $this->lang->line('Language')?></label>
                                <select class="form-control" id="lang" name="lang">
                                    <?php foreach($lang as $langs): ?>
                                        <option value="<?= $langs['lang_acronym']?>" <?php if($langs['lang_acronym']==$class['lang']): ?> selected <?php endif;?>><?= $langs['lang_name']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" name="class_img_old"  value="<?= $class['class_img'] ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="class_img" class="text-align-left control-label"><?= $this->lang->line('Class Image')?></label>
                                <div class="row">
                                    <div class="col-md-5">
                                        <img src='<?= base_url()."assets/uploads/class/".$class["class_img"] ?>' style='margin-bottom: 5px; max-width: 100%'>
                                    </div>
                                </div>
                                <input id="fileUpload" type="file" name="class_img" size="20" />
                                <div id="image-holder"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><?= $this->lang->line('Update')?></button>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>

    </div>
</section>
</div>



