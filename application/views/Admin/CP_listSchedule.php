<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 11/24/2017
 * Time: 2:55 PM
 */
?>
<section class="content-header">
    <h1><?= $this->lang->line('Manage schedule'); ?></h1>
</section>
<section class="content">
    <div class="form-group">
        <a class ='btn btn-primary' data-toggle="modal" data-target="#addSchedule"><i class="fa fa-plus"></i> <?= $this->lang->line('Add new schedule')?></a>
    </div>
    <div class="box box-default">
        <div class="box-body">

            <table id="dataTable" class="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->lang->line('Schedule for address'); ?></th>
                    <th><?= $this->lang->line('Created at'); ?></th>
                    <th><?= $this->lang->line('Enable'); ?></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th><?= $this->lang->line('Schedule for address'); ?></th>
                    <th><?= $this->lang->line('Created at'); ?></th>
                    <th><?= $this->lang->line('Enable'); ?></th>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach($schedule as $schedule): ?>
                    <tr>
                        <td><a href='<?= base_url()."Admin/viewSchedule/".$schedule["schedule_id"]?>'><?= $schedule['address_name']?></a></td>
                        <td><?= date("d-m-Y", $schedule['created_at']) ?></td>
                        <td class="toggle-button"><input data-id="<?= $schedule["schedule_id"]; ?>" data-table="schedule" data-enable='<?= $schedule['is_enable'];?>'  class="toggle" <?php if($schedule['is_enable']==1):?>checked<?php endif;?> data-toggle="toggle" type="checkbox"></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

        </div>
    </div>
</section>
</div>

<div id="addSchedule" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?= $this->lang->line('Add new schedule')?></h4>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open_multipart('Admin/addSchedule'); ?>
                <div class="form-group">
                    <label for="label" class="text-align-left control-label"><?= $this->lang->line('Schedule name')?></label>
                    <input type="text" name="schedule_name" class="form-control number-field">
                </div>
                <div class="form-group">
                    <label for="lang" class="text-align-left control-label"><?= $this->lang->line('Address name')?></label>
                    <select class="form-control" id="lang" name="address_id">
                        <?php foreach($address as $addresses): ?>
                            <option value="<?= $addresses['address_id']?>"><?= $addresses['address_name']?></option>
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

