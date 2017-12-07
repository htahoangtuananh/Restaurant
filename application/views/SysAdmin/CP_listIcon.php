<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 12/4/2017
 * Time: 10:46 AM
 */
?>
<section class="content-header">
    <h1><?= $this->lang->line('Manage icon'); ?></h1>
</section>
<section class="content">
    <div class="form-group">
        <a class ='btn btn-primary' data-toggle="modal" data-target="#addIcon"><i class="fa fa-plus"></i> <?= $this->lang->line('Add new icon')?></a>
    </div>
    <div class="box box-default">
        <div class="box-body">

            <table id="dataTable" class="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->lang->line('Icon'); ?></th>
                    <th><?= $this->lang->line('Created at'); ?></th>
                    <th><?= $this->lang->line('Enable'); ?></th>
                    <th class="deleteLink"><?= $this->lang->line('Delete') ?></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th><?= $this->lang->line('Icon'); ?></th>
                    <th><?= $this->lang->line('Created at'); ?></th>
                    <th><?= $this->lang->line('Enable'); ?></th>
                    <th class="deleteButton"><?= $this->lang->line('Delete') ?></th>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach($icon as $icons): ?>
                    <tr>
                        <td><a href='<?= base_url()."SysAdmin/viewIcon/".$icons["icon_id"]?>'><?= $icons['icon_file']?></a></td>
                        <td><?= date('d-m-Y',$icons['created_date'])?></td>
                        <td class="toggle-button"><input data-id="<?= $icons["icon_id"]; ?>" data-table="icon" data-enable='<?= $icons['is_enable'];?>'  class="toggle" <?php if($icons['is_enable']==1):?>checked<?php endif;?> data-toggle="toggle" type="checkbox"></td>
                        <td><a href='<?= base_url()."SysAdmin/deleteIcon/".$icons["icon_id"]?>' class="deleteLink" onclick="return confirm('Are you sure?')" title="<?= $this->lang->line('Delete') ?>"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

        </div>
    </div>
</section>
</div>

<div id="addIcon" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?= $this->lang->line('Add new icon')?></h4>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open_multipart('SysAdmin/addIcon'); ?>
                <div class="form-group">
                    <label for="icon_file" class="text-align-left control-label"><?= $this->lang->line('Icon')?></label>
                    <input id="fileUpload" type="file" name="icon_file"/>
                    <div id="image-holder"> </div>
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
            url: '<?= base_url()."SysAdmin/handleAjax"?>',
        }).success(function (result) {
            location.reload();
        });
    });
</script>
