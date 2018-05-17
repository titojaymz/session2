<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JOSEF FRIEDRICH S. BALDO
 * Date Time: 10/18/15 12:57 AM
 */
if (!$this->session->userdata('user_data')){
    redirect('/users/login','location');
}
//echo validation_errors();
?>
<body>
<?php if ($form_message <> '') { ?>
<div class="alert alert-success">
    <strong><?php echo $form_message ?></strong>
</div>
<?php } ?>
<?php if (validation_errors() <> '') { ?>
    <div class="alert alert-danger">
        <strong><?php echo validation_errors() ?></strong>
    </div>
<?php } ?>
<div class="col-md-3"></div>
<div id="addstudent" class="col-md-6">
    <form method="post" class="form-horizontal">
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input class="form-control" type="text" name="lastname" value="<?php echo set_value('lastname') ?>" placeholder="lastname" required autofocus>
        </div>
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input class="form-control" type="text" name="firstname" value="<?php echo set_value('firstname') ?>" placeholder="firstname" required autofocus>
        </div>
        <div class="form-group">
            <label for="middlename">Middle Name</label>
            <input class="form-control" type="text" name="middlename" value="<?php echo set_value('middlename') ?>" placeholder="middlename">
        </div>
        <div class="form-group">
            <label for="extname">Extension Name</label>
            <input class="form-control" type="text" name="extname" value="<?php echo set_value('extname') ?>" placeholder="extname">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" type="" name="address" value="<?php echo set_value('address') ?>" placeholder="address" required autofocus></textarea>
        </div>
        <div class="form-group">
            <label for="contact_no">Contact No.</label>
            <input class="form-control" type="text" name="contact_no" value="<?php echo set_value('contact_no') ?>" placeholder="contact_no">
        </div>
        <div class="form-group">
            <label for="course">Course</label>
            <input class="form-control" type="text" name="course" value="<?php echo set_value('course') ?>" placeholder="course">
        </div>
        <div class="form-group">
            <label for="year">Year Level</label>
            <input class="form-control" type="text" name="year" value="<?php echo set_value('year') ?>" placeholder="year">
        </div>
        <div class="form-group">
            <label for="sem">Semester</label>
            <input class="form-control" type="text" name="sem" value="<?php echo set_value('sem') ?>" placeholder="sem">
        </div>
        <div class="btn-group">
            <button class="btn btn-success" type="submit" name="submit" value="submit"><i class="fa fa-save"></i> Save</button>
            <a class="btn btn-warning btn-group" href="<?php echo base_url('students/index.html') ?>"><i class="fa fa-refresh"></i> Cancel</a>
        </div>
    </form>
</div>
<div class="col-md-3"></div>
</body>