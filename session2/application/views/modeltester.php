<?php
/**
 * Created by JOSEF FRIEDRICH S. BALDO
 * Date Time: 10/17/15 10:38 PM
 */
if (!$this->session->userdata('user_data')){
    redirect('/users/login','location');
}
if (!$test_result){
    echo '<pre>';
    echo 'no defined parameter on model';
    echo '</pre>';
} else {
    echo '<pre>';
    print_r($test_result);
    echo '</pre>';
}
