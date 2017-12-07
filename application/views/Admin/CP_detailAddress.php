<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 11/23/2017
 * Time: 3:51 PM
 */
?>
<section class="content-header">
    <h1><?= $address['address_name'];?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <?php echo validation_errors(); ?>
                            <?php echo form_open('Admin/viewAddress/'.$address['address_id']); ?>
                            <div class="form-group">
                                <label for="class_name" class="text-align-left control-label"><?= $this->lang->line('Address name')?></label>
                                <input type="text" name="address_name" class="form-control number-field" value="<?= $address['address_name'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="class_link" class="text-align-left control-label"><?= $this->lang->line('Address')?></label>
                                <input type="text" name="address" class="form-control number-field" value="<?= $address['address'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="lang" class="text-align-left control-label"><?= $this->lang->line('Language')?></label>
                                <select class="form-control" id="lang" name="lang">
                                    <?php foreach($lang as $langs): ?>
                                        <option value="<?= $langs['lang_acronym']?>" <?php if($langs['lang_acronym']==$address['lang']): ?> selected <?php endif;?>><?= $langs['lang_name']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><?= $this->lang->line('Update')?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</section>
</div>




