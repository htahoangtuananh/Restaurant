<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 11/30/2017
 * Time: 4:17 PM
 */
?>
<section class="content-header">
    <h1><?= $this->lang->line('Manage carousel'); ?></h1>
</section>
<section class="content">
    <div class="form-group">
        <a class ='btn btn-primary' data-toggle="modal" data-target="#addCarousel"><i class="fa fa-plus"></i> <?= $this->lang->line('Add new carousel')?></a>
    </div>
    <div class="box box-default">
        <div class="box-body">

            <table id="dataTable" class="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->lang->line('Carousel file name'); ?></th>
                    <th><?= $this->lang->line('Created at'); ?></th>
                    <th><?= $this->lang->line('Enable'); ?></th>
                    <th class="deleteLink"><?= $this->lang->line('Delete') ?></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th><?= $this->lang->line('Carousel file name'); ?></th>
                    <th><?= $this->lang->line('Created at'); ?></th>
                    <th><?= $this->lang->line('Enable'); ?></th>
                    <th class="deleteButton"><?= $this->lang->line('Delete') ?></th>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach($carousel as $carousels): ?>
                    <tr>
                        <td><a href='<?= base_url()."Admin/viewAddress/".$carousels["carousel_id"]?>'><?= $carousels['carousel_image']?></a></td>
                        <td><?= date('d-m-Y',$carousels['created_date'])?></td>
                        <td class="toggle-button"><input data-id="<?= $carousels["carousel_id"]; ?>" data-table="carousel" data-enable='<?= $carousels['is_enable'];?>'  class="toggle" <?php if($carousels['is_enable']==1):?>checked<?php endif;?> data-toggle="toggle" type="checkbox"></td>
                        <td><a href='<?= base_url()."Admin/deleteCarousel/".$carousels["carousel_id"]?>' class="deleteLink" onclick="return confirm('Are you sure?')" title="<?= $this->lang->line('Delete') ?>"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

        </div>
    </div>
</section>
</div>

<div id="addCarousel" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?= $this->lang->line('Add new carousel')?></h4>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open_multipart('Admin/addCarousel'); ?>
                <div class="form-group">
                    <label for="carousel_img" class="text-align-left control-label"><?= $this->lang->line('Carousel image')?></label>
                    <input id="fileUpload" type="file" name="carousel_img"/>
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
