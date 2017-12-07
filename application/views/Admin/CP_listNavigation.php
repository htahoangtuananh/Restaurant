<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 11/29/2017
 * Time: 2:21 PM
 */
?>
<section class="content-header">
    <h1><?= $this->lang->line('Manage navigation'); ?></h1>
</section>
<section class="content">
    <div class="form-group">
        <a class ='btn btn-primary' data-toggle="modal" data-target="#addNavigation"><i class="fa fa-plus"></i> <?= $this->lang->line('Add new navigation')?></a>
    </div>
    <div class="box box-default">
        <div class="box-body">

            <table id="dataTable" class="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->lang->line('Navigation name'); ?></th>
                    <th><?= $this->lang->line('Navigation link'); ?></th>
                    <th><?= $this->lang->line('Language'); ?></th>
                    <th><?= $this->lang->line('Enable'); ?></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th><?= $this->lang->line('Navigation name'); ?></th>
                    <th><?= $this->lang->line('Navigation link'); ?></th>
                    <th><?= $this->lang->line('Language'); ?></th>
                    <th><?= $this->lang->line('Enable'); ?></th>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach($navigation as $navigation): ?>
                    <tr>
                        <td><a href='<?= base_url()."Admin/viewNavigation/".$navigation["navigation_id"]?>'><?= $navigation['navigation_name']?></a></td>
                        <td><?= $navigation['navigation_link']?></td>
                        <td><?= $navigation['lang'] ?></td>
                        <td class="toggle-button"><input data-id="<?= $navigation["navigation_id"]; ?>" data-table="navigation" data-enable='<?= $navigation['is_enable'];?>'  class="toggle" <?php if($navigation['is_enable']==1):?>checked<?php endif;?> data-toggle="toggle" type="checkbox"></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

        </div>
    </div>
</section>
</div>

<div id="addNavigation" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?= $this->lang->line('Add new navigation')?></h4>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open_multipart('Admin/addNavigation'); ?>
                <div class="form-group">
                    <label for="label" class="text-align-left control-label"><?= $this->lang->line('Navigation name')?></label>
                    <input type="text" name="navigation_name" class="form-control number-field">
                </div>
                <div class="form-group">
                    <label for="label" class="text-align-left control-label"><?= $this->lang->line('Navigation link')?></label>
                    <input type="text" name="navigation_link" class="form-control number-field">
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
