<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JOSEF FRIEDRICH S. BALDO
 * Date Time: 10/18/15 9:21 AM
 */
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Student System</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li <?php if (uri_string() == 'students/index') echo 'class="active"' ?>><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
                <li <?php if (uri_string() == 'students/addStudent') echo 'class="active"' ?>><a href="<?php echo base_url('students/addStudent.html') ?>"><i class="fa fa-user-plus"></i> Students</a></li>
                <li <?php if (uri_string() == 'subjects/index') echo 'class="active"' ?>><a href="<?php echo base_url('subjects/index.html') ?>"><i class="fa fa-list-alt"></i> Subjects</a></li>
                <li><a href="<?php echo base_url('users/logout') ?>"><i class="fa fa-sign-out"></i> Logout [<?php if ($this->session->userdata('user_data') <>'') echo $this->session->userdata('user_data') ?>]</a></li>
            </ul>
        </div><!--/.navbar-collapse -->
    </div>
</nav>