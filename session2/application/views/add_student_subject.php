<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JOSEF FRIEDRICH S. BALDO
 * Date Time: 10/18/15 4:13 PM
 */
//echo '<pre>';
//print_r($Subject);
//echo '</pre>';
?>
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
<?php if ($Subject) { ?>
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <?php echo form_open('',array('class'=>'form-horizontal')) ?>
        <div class="form-group">
            <label>Student Name:</label>
            <?php
                $student_details = new Student_Model();
            ?>
            <?php echo $student_details->getStudentName($student_id) ?>
        </div>
        <div class="form-group">
            <label>Subject:</label>
            <select class="form-control" name="subject_id">
                <option select value="">Please select</option>
                <?php foreach($Subject as $Subjects): ?>
                    <option value="<?php echo $Subjects->subject_id ?>"><?php echo $Subjects->subject_name ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="btn-group">
            <button class="btn btn-sm btn-success" type="submit" name="submit" value="submit"><i class="fa fa-plus-circle"></i> Add</button>
            <a class="btn btn-sm btn-primary" href="<?php echo base_url('students/student_masterview/' . $student_id . '.html') ?>"><i class="fa fa-refresh"></i> Back</a>
        </div>
        <?php echo form_close() ?>
    </div>
    <div class="col-md-4"></div>
<?php } ?>