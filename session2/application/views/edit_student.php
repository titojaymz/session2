<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JOSEF FRIEDRICH S. BALDO
 * Date Time: 10/18/15 12:57 AM
 */
if (!$this->session->userdata('user_data')){
    redirect('/users/login','location');
}
echo validation_errors();
echo $form_message;
?>
<div class="col-md-3"></div>
<div class="col-md-6">
    <form method="post" class="form-horizontal">
        <div class="form-group">
            <label for="student_id">Student ID:</label>
            <span class="h4"><?php echo $student_details->student_id ?></span>
            <input class="form-control" type="hidden" name="student_id" value="<?php echo $student_details->student_id ?>">
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input class="form-control" type="text" name="lastname" value="<?php echo $student_details->lastname ?>" placeholder="lastname" required autofocus>
        </div>
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input class="form-control" type="text" name="firstname" value="<?php echo $student_details->firstname ?>" placeholder="firstname" required autofocus>
        </div>
        <div class="form-group">
            <label for="middlename">Middle Name</label>
            <input class="form-control" type="text" name="middlename" value="<?php echo $student_details->middlename ?>" placeholder="middlename">
        </div>
        <div class="form-group">
            <label for="extname">Extension Name</label>
            <input class="form-control" type="text" name="extname" value="<?php echo $student_details->extname ?>" placeholder="Extname">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" type="text-field" name="address" required autofocus placeholder="Address"><?php echo $student_details->address ?></textarea>
        </div>
        <div class="form-group">
            <label for="contact_no">Contact No.</label>
            <input class="form-control" type="text" name="contact_no" value="<?php echo $student_details->contact_no ?>" placeholder="Contact No.">
        </div>
        <div class="form-group">
            <label for="course">Course</label>
            <input class="form-control" type="text" name="course" value="<?php echo $student_details->course ?>" placeholder="Course">
        </div>
        <div class="form-group">
            <label for="year">Year Level</label>
            <input class="form-control" type="text" name="year" value="<?php echo $student_details->year ?>" placeholder="year">
        </div>
        <div class="form-group">
            <label for="sem">Semester</label>
            <input class="form-control" type="text" name="sem" value="<?php echo $student_details->sem ?>" placeholder="Senester">
        </div>
        <div class="btn-group">
            <button class="btn btn-success" type="submit" name="submit" value="submit"><i class="fa fa-save"></i> Save</button>
            <a class="btn btn-warning btn-group" href="<?php echo base_url('students/index.html') ?>"><i class="fa fa-refresh"></i> Cancel</a>
        </div>
    </form>
</div>
<div class="col-md-3"></div>