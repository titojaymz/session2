<?php
/**
 * Created by JOSEF FRIEDRICH S. BALDO
 * Date Time: 10/17/15 11:33 PM
 */
if ($this->session->userdata('user_data')){
    echo 'welcome ' . $this->session->userdata('user_data'); ?>
    <br><a href="<?php echo base_url('users/logout') ?>">Logout</a>
<?php } else {
    redirect('/users/login','location');
}