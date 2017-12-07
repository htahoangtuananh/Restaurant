<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 11/24/2017
 * Time: 2:48 PM
 */
$M2 = '';
$A2 = '';
$E2 = '';
$M3 = '';
$A3 = '';
$E3 = '';
$M4 = '';
$A4 = '';
$E4 = '';
$M5 = '';
$A5 = '';
$E5 = '';
$M6 = '';
$A6 = '';
$E6 = '';
$M7 = '';
$A7 = '';
$E7 = '';
$M8 = '';
$A8 = '';
$E8 = '';
for($i = 0; $i<count($schedule_detail); $i++){
    switch ($schedule_detail[$i]['date']){
        case '2':
            switch ($schedule_detail[$i]['day']){
                case '1':
                    $M2 = $schedule_detail[$i]['start_time'].' - '.$schedule_detail[$i]['end_time'];
                    break;
                case '2':
                    $A2 = $schedule_detail[$i]['start_time'].' - '.$schedule_detail[$i]['end_time'];
                    break;
                case '3':
                    $E2 = $schedule_detail[$i]['start_time'].' - ' .$schedule_detail[$i]['end_time'];
                    break;
                default:
                    $M2 = $A2 = $E2 = $this->lang->line('Empty');
                    break;
            }
            break;
        case '3':
            switch ($schedule_detail[$i]['day']){
                case '1':
                    $M3 = $schedule_detail[$i]['start_time'].' - ' .$schedule_detail[$i]['end_time'];
                    break;
                case '2':
                    $A3 = $schedule_detail[$i]['start_time'].' - ' .$schedule_detail[$i]['end_time'];
                    break;
                case '3':
                    $E3 = $schedule_detail[$i]['start_time'].' - ' .$schedule_detail[$i]['end_time'];
                    break;
                default:
                    $M3 = $A3 = $E3 = $this->lang->line('Empty');
                    break;
            }
            break;
        case '4':
            switch ($schedule_detail[$i]['day']){
                case '1':
                    $M4 = $schedule_detail[$i]['start_time'].' - ' .$schedule_detail[$i]['end_time'];
                    break;
                case '2':
                    $A4 = $schedule_detail[$i]['start_time'].' - ' .$schedule_detail[$i]['end_time'];
                    break;
                case '3':
                    $E4 = $schedule_detail[$i]['start_time'].' - ' .$schedule_detail[$i]['end_time'];
                    break;
                default:
                    $M4 = $A4 = $E4 = $this->lang->line('Empty');
                    break;
            }
            break;
        case '5':
            switch ($schedule_detail[$i]['day']){
                case '1':
                    $M5 = $schedule_detail[$i]['start_time'].' - ' .$schedule_detail[$i]['end_time'];
                    break;
                case '2':
                    $A5 = $schedule_detail[$i]['start_time'].' - ' .$schedule_detail[$i]['end_time'];
                    break;
                case '3':
                    $E5 = $schedule_detail[$i]['start_time'].' - ' .$schedule_detail[$i]['end_time'];
                    break;
                default:
                    $M5 = $A5 = $E5 = $this->lang->line('Empty');
                    break;
            }
            break;
        case '6':
            switch ($schedule_detail[$i]['day']){
                case '1':
                    $M6 = $schedule_detail[$i]['start_time'].' - ' .$schedule_detail[$i]['end_time'];
                    break;
                case '2':
                    $A6 = $schedule_detail[$i]['start_time'].' - ' .$schedule_detail[$i]['end_time'];
                    break;
                case '3':
                    $E6 = $schedule_detail[$i]['start_time'].' - ' .$schedule_detail[$i]['end_time'];
                    break;
                default:
                    $M6 = $A6 = $E6 = $this->lang->line('Empty');
                    break;
            }
            break;
        case '7':
            switch ($schedule_detail[$i]['day']){
                case '1':
                    $M7 = $schedule_detail[$i]['start_time'].' - ' .$schedule_detail[$i]['end_time'];
                    break;
                case '2':
                    $A7 = $schedule_detail[$i]['start_time'].' - ' .$schedule_detail[$i]['end_time'];
                    break;
                case '3':
                    $E7 = $schedule_detail[$i]['start_time'].' - ' .$schedule_detail[$i]['end_time'];
                    break;
                default:
                    $M7 = $A7 = $E7 = $this->lang->line('Empty');
                    break;
            }
            break;
        case '8':
            switch ($schedule_detail[$i]['day']){
                case '1':
                    $M8 = $schedule_detail[$i]['start_time'].' - ' .$schedule_detail[$i]['end_time'];
                    break;
                case '2':
                    $A8 = $schedule_detail[$i]['start_time'].' - ' .$schedule_detail[$i]['end_time'];
                    break;
                case '3':
                    $E8 = $schedule_detail[$i]['start_time'].' - ' .$schedule_detail[$i]['end_time'];
                    break;
                default:
                    $M8 = $A8 = $E8 = $this->lang->line('Empty');
                    break;
            }
            break;
    }
}
?>
<section class="content-header">
    <h1><?= $this->lang->line('Schedule for address').' : '.$schedule['address_name'] ; ?></h1>
</section>
<section class="content">
    <div class="form-group">
        <a class ='btn btn-primary' data-toggle="modal" data-target="#addSchedule"><i class="fa fa-plus"></i> <?= $this->lang->line('Add new address')?></a>
    </div>
    <div class="box box-default">
        <div class="box-body">
            <table class="col-md-12 table table-bordered table-striped">
                <tr>
                    <td></td>
                    <th scope="col"><?= $this->lang->line('Morning');?></th>
                    <th scope="col"><?= $this->lang->line('Afternoon');?></th>
                    <th scope="col"><?= $this->lang->line('Evening');?></th>
                </tr>

                <tr>
                    <th scope="row"><?= $this->lang->line('Monday');?></th>
                    <td><?= $M2?></td>
                    <td><?= $A2?></td>
                    <td><?= $E2?></td>
                </tr>
                <tr>
                    <th scope="row"><?= $this->lang->line('Tuesday');?></th>
                    <td><?= $M3?></td>
                    <td><?= $A3?></td>
                    <td><?= $E3?></td>
                </tr>
                <tr>
                    <th scope="row"><?= $this->lang->line('Wednesday');?></th>
                    <td><?= $M4?></td>
                    <td><?= $A4?></td>
                    <td><?= $E4?></td>
                </tr>
                <tr>
                    <th scope="row"><?= $this->lang->line('Thursday');?></th>
                    <td><?= $M5?></td>
                    <td><?= $A5?></td>
                    <td><?= $E5?></td>
                </tr>
                <tr>
                    <th scope="row"><?= $this->lang->line('Friday');?></th>
                    <td><?= $M6?></td>
                    <td><?= $A6?></td>
                    <td><?= $E6?></td>
                </tr>
                <tr>
                    <th scope="row"><?= $this->lang->line('Saturday');?></th>
                    <td><?= $M7?></td>
                    <td><?= $A7?></td>
                    <td><?= $E7?></td>
                </tr>
                <tr>
                    <th scope="row"><?= $this->lang->line('Sunday');?></th>
                    <td><?= $M8?></td>
                    <td><?= $A8?></td>
                    <td><?= $E8?></td>
                </tr>

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
                <?php echo form_open_multipart('Admin/addDetailSchedule/'.$schedule['schedule_id']); ?>
                <div class="form-group">
                    <label for="start_hour" class="text-align-left control-label"><?= $this->lang->line('Start time')?></label>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="start_hour" class="text-align-left control-label"><?= $this->lang->line('Hour')?></label>
                            <input name="start_hour" type="number" class="form-control number-field">
                        </div>
                        <div class="col-md-6">
                            <label for="start_minute" class="text-align-left control-label"><?= $this->lang->line('Minute')?></label>
                            <input name="start_minute" type="number" class="form-control number-field">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="end_time" class="text-align-left control-label"><?= $this->lang->line('End time')?></label>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="end_hour" class="text-align-left control-label"><?= $this->lang->line('Hour')?></label>
                            <input name="end_hour" type="number" class="form-control number-field">
                        </div>
                        <div class="col-md-6">
                            <label for="end_minute" class="text-align-left control-label"><?= $this->lang->line('Minute')?></label>
                            <input name="end_minute" type="number" class="form-control number-field">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lang" class="text-align-left control-label"><?= $this->lang->line('Daytime')?></label>
                    <select class="form-control" id="day" name="day">
                        <option value="1"><?= $this->lang->line('Morning');?></option>
                        <option value="2"><?= $this->lang->line('Afternoon');?></option>
                        <option value="3"><?= $this->lang->line('Evening');?></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="lang" class="text-align-left control-label"><?= $this->lang->line('Day')?></label>
                    <select class="form-control" id="date" name="date">
                        <option value="2"><?= $this->lang->line('Monday');?></option>
                        <option value="3"><?= $this->lang->line('Tuesday');?></option>
                        <option value="4"><?= $this->lang->line('Wednesday');?></option>
                        <option value="5"><?= $this->lang->line('Thursday');?></option>
                        <option value="6"><?= $this->lang->line('Friday');?></option>
                        <option value="7"><?= $this->lang->line('Saturday');?></option>
                        <option value="8"><?= $this->lang->line('Sunday');?></option>
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
