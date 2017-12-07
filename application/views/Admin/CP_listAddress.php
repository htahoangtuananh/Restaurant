<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 11/23/2017
 * Time: 3:26 PM
 */
?>
<section class="content-header">
    <h1><?= $this->lang->line('Manage address'); ?></h1>
</section>
<section class="content">
    <div class="form-group">
        <a class ='btn btn-primary' data-toggle="modal" data-target="#addAddress"><i class="fa fa-plus"></i> <?= $this->lang->line('Add new address')?></a>
    </div>
    <div class="box box-default">
        <div class="box-body">

            <table id="dataTable" class="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->lang->line('Address name'); ?></th>
                    <th><?= $this->lang->line('Address'); ?></th>
                    <th><?= $this->lang->line('Language'); ?></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th><?= $this->lang->line('Address name'); ?></th>
                    <th><?= $this->lang->line('Address'); ?></th>
                    <th><?= $this->lang->line('Language'); ?></th>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach($address as $addresses): ?>
                    <tr>
                        <td><a href='<?= base_url()."Admin/viewAddress/".$addresses["address_id"]?>'><?= $addresses['address_name']?></a></td>
                        <td><?= $addresses['address']?></td>
                        <td><?= $addresses['lang'] ?></td>
                        <td></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

        </div>
    </div>
</section>
</div>

<div id="addAddress" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?= $this->lang->line('Add new address')?></h4>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open_multipart('Admin/addAddress'); ?>
                <div class="form-group">
                    <label for="label" class="text-align-left control-label"><?= $this->lang->line('Address name')?></label>
                    <input type="text" name="address_name" class="form-control number-field">
                </div>
                <div class="form-group">
                    <label for="label" class="text-align-left control-label"><?= $this->lang->line('Address')?></label>
                    <input type="text" name="address" class="form-control number-field">
                </div>
                <div class="form-group">
                    <label for="lang" class="text-align-left control-label"><?= $this->lang->line('Language')?></label>
                    <select class="form-control" id="lang" name="lang">
                        <?php foreach($lang as $langs): ?>
                            <option value="<?= $langs['lang_acronym']?>"><?= $langs['lang_name']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><?= $this->lang->line('Update')?></button>
            </div>
            <?php echo form_close(); ?>
        </div>

    </div>
</div>

