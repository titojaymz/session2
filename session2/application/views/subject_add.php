<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JOSEF FRIEDRICH S. BALDO
 * Date Time: 10/18/15 6:09 PM
 */
?>
<?php if (validation_errors() <> '') { ?>
    <div class="col-md-12">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="alert alert-danger">
                <strong><?php echo validation_errors() ?></strong>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
<?php } ?>
<?php if ($form_message <> '') { ?>
    <div class="col-md-12">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="alert alert-success">
                <strong><?php echo $form_message ?></strong>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
<?php } ?>
<div class="col-md-12">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <?php echo form_open('',array('class'=>'form-horizontal')) ?>
        <div class="form-group">
            <label>Subject Name</label>
            <input class="form-control" type="text" name="subject_name" value="<?php echo set_value('subject_name') ?>" placeholder="Subject Name" required autofocus>
        </div>
        <div class="form-group">
            <label>Subject Course</label>
            <input class="form-control" type="text" name="course" value="<?php echo set_value('course') ?>" placeholder="Subject Course" required autofocus>
        </div>
        <div class="form-group">
            <label>Subject Year</label>
            <input class="form-control" type="text" name="year" value="<?php echo set_value('year') ?>" placeholder="Subject Year">
        </div>
        <div class="form-group">
            <label>Subject Senester</label>
            <input class="form-control" type="text" name="sem" value="<?php echo set_value('sem') ?>" placeholder="Subject Senester">
        </div>
        <div class="btn-group">
            <button type="submit" name="submit" value="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
            <a class="btn btn-sm btn-warning" href="<?php echo base_url('subjects/index.html') ?>"><i class="fa fa-refresh"></i> Back</a>
        </div>
        <?php echo form_close() ?>
    </div>
    <div class="col-md-4"></div>
</div>