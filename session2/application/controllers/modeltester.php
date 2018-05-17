<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JOSEF FRIEDRICH S. BALDO
 * Date Time: 10/17/15 10:35 PM
 */
class modeltester extends CI_Controller {

    public function index()
    {
        $Student_Model = new Student_Model();
        $test_result = $Student_Model->editStudSubjects(1,2,2,2);
        $this->load->view('modeltester',array('test_result' => $test_result));
    }
}