<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 12/1/2017
 * Time: 2:58 PM
 */
?>
<section class="content-header">
    <h1><?= $this->lang->line('Manage contact'); ?></h1>
</section>
<section class="content">
    <div class="form-group">
        <a class ='btn btn-primary' data-toggle="modal" data-target="#addContact"><i class="fa fa-plus"></i> <?= $this->lang->line('Add new contact')?></a>
    </div>
    <div class="box box-default">
        <div class="box-body">

            <table id="dataTable" class="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->lang->line('Contact type'); ?></th>
                    <th><?= $this->lang->line('Contact name'); ?></th>
                    <th><?= $this->lang->line('Contact detail'); ?></th>
                    <th><?= $this->lang->line('Enable'); ?></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th><?= $this->lang->line('Contact type'); ?></th>
                    <th><?= $this->lang->line('Contact name'); ?></th>
                    <th><?= $this->lang->line('Contact detail'); ?></th>
                    <th><?= $this->lang->line('Enable'); ?></th>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach($contact as $contacts): ?>
                    <tr>
                        <td><a href='<?= base_url()."Admin/viewContact/".$contacts["contact_id"]?>'><?= $contacts['contact_name']?></a></td>
                        <td><?= $contacts['type']?></td>
                        <td><?= $contacts['contact_detail'] ?></td>
                        <td class="toggle-button"><input data-id="<?= $contacts["contact_id"]; ?>" data-table="contact" data-enable='<?= $contacts['is_enable'];?>'  class="toggle" <?php if($contacts['is_enable']==1):?>checked<?php endif;?> data-toggle="toggle" type="checkbox"></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

        </div>
    </div>
</section>
</div>

<div id="addContact" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?= $this->lang->line('Add new contact')?></h4>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open_multipart('Admin/addContact'); ?>
                <div class="form-group">
                    <label for="type" class="text-align-left control-label"><?= $this->lang->line('Contact type')?></label>
                    <select class="form-control" id="type" name="type">
                        <option>Facebook</option>
                        <option>Youtube</option>
                        <option>Phone</option>
                        <option>Mail</option>
                        <option>Website</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="label" class="text-align-left control-label"><?= $this->lang->line('Contact name')?></label>
                    <input type="text" name="contact_name" class="form-control number-field">
                </div>
                <div class="form-group">
                    <label for="label" class="text-align-left control-label"><?= $this->lang->line('Contact detail')?></label>
                    <input type="text" name="contact_detail" class="form-control number-field">
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><?= $this->lang->line('Update')?></button>
            </div>
            <?php echo form_close(); ?>
        </div>

    </div>
</div>
<script>
    $('.toggle-button').click(function(){
        var table = $(this).find('input').attr('data-table');
        var target_id = $(this).find('input').attr('data-id');
        var enable = $(this).find('input').attr('data-enable');
        enable = (enable==0)? 1:0;

        var csrf = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrf_token = '<?php echo $this->security->get_csrf_hash(); ?>';

        $.ajax({
            data: {'id': target_id,'table': table, 'enable': enable, '<?php echo $this->security->get_csrf_token_name(); ?>' : csrf_token},
            type: "POST",
            url: '<?= base_url()."Admin/handleAjax"?>',
        }).success(function (result) {
            location.reload();
        });
    });
</script>
