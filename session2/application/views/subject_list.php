<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JOSEF FRIEDRICH S. BALDO
 * Date Time: 10/18/15 5:54 PM
 */
if (!$this->session->userdata('user_data')){
    redirect('/users/login','location');
}
?>
<div class="col-md-12">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <a class="btn btn-sm btn-success" href="<?php echo base_url('subjects/addsubject.html') ?>"><i class="fa fa-plus-circle"></i> Add Subject</a>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th><input type="checkbox"></th>
                <th>Subject ID</th>
                <th>Subject Name</th>
                <th>Course</th>
                <th>Year</th>
                <th>Semester</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($Subjects_Model as $subjectsList): ?>
            <tr>
                <td><input type="checkbox" value="<?php echo $subjectsList->subject_id ?>"></td>
                <td><?php echo $subjectsList->subject_id ?></td>
                <td><?php echo $subjectsList->subject_name ?></td>
                <td><?php echo $subjectsList->course ?></td>
                <td><?php echo $subjectsList->year ?></td>
                <td><?php echo $subjectsList->sem ?></td>
                <?php
                /**
                 * October 21, 2015
                 * kailangan din ng delete page
                 * subukan din ang checkbox para sa multidelete
                */
                ?>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('subjects/editsubject/' . $subjectsList->subject_id . '.html') ?>"><i class="fa fa-edit"></i> </a>
                        <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> </a>
                    </div>
                </td>
            </tr>
            <?php endforeach ?>
            </tbody>
        </table>
        </div>
    <div class="col-md-1"></div>
</div>