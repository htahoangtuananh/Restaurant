<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 12/2/2017
 * Time: 3:31 PM
 */
?>
<section class="content-header">
    <h1><?= $contact['contact_name'];?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <?php echo validation_errors(); ?>
                            <?php echo form_open('Admin/viewContact/'.$contact['contact_id']); ?>
                            <div class="form-group">
                                <label for="class_name" class="text-align-left control-label"><?= $this->lang->line('Contact name')?></label>
                                <input type="text" name="contact_name" class="form-control number-field" value="<?= $contact['contact_name'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="class_link" class="text-align-left control-label"><?= $this->lang->line('Contact detail')?></label>
                                <input type="text" name="contact_detail" class="form-control number-field" value="<?= $contact['contact_detail'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="type" class="text-align-left control-label"><?= $this->lang->line('Contact type')?></label>
                                <select class="form-control" id="type" name="type">
                                    <option <?php if($contact['type'] == 'Facebook'):?>selected<?php endif;?>>Facebook</option>
                                    <option <?php if($contact['type'] == 'Youtube'):?>selected<?php endif;?>>Youtube</option>
                                    <option <?php if($contact['type'] == 'Phone'):?>selected<?php endif;?>>Phone</option>
                                    <option <?php if($contact['type'] == 'Mail'):?>selected<?php endif;?>>Mail</option>
                                    <option <?php if($contact['type'] == 'Website'):?>selected<?php endif;?>>Website</option>
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
