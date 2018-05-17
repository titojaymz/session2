<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JOSEF FRIEDRICH S. BALDO
 * Date Time: 10/18/15 5:50 PM
 */
class subjects extends CI_Controller {

    public function index()
    {
        $Subjects_Model = new Subjects_Model();
        $listSubjects = $Subjects_Model->listAllSubjects();
        $this->load->view('header');
        $this->load->view('nav');
        $this->load->view('subject_list',array('Subjects_Model'=>$listSubjects));
        $this->load->view('footer');
    }

    public function addsubject()
    {
        $this->validateAddForm();

        if (!$this->form_validation->run()){
            $form_message = '';
            $this->load->view('header');
            $this->load->view('nav');
            $this->load->view('subject_add',array('form_message'=>$form_message));
            $this->load->view('footer');
        } else {
            $subject_name = $this->input->post('subject_name');
            $course = $this->input->post('course');
            $year = $this->input->post('year');
            $sem = $this->input->post('sem');
            $Subjects_Model = new Subjects_Model();
            $addResult = $Subjects_Model->addSubject($subject_name,$course,$year,$sem);
            if ($addResult){
                $form_message = 'Add Success!';
                $this->load->view('header');
                $this->load->view('nav');
                $this->load->view('subject_add',array('form_message'=>$form_message));
                $this->load->view('footer');
                $this->redirectSubjIndex();
            }
        }
    }

    public function editsubject($id = 0)
    {
        $Subjects_Model = new Subjects_Model();

        $SubjDetails = $Subjects_Model->getSubjDetails($id);

        $this->validateAddForm();

        if (!$this->form_validation->run()){
            $form_message = '';
            $studentDetails = array(
                'subject_id'    =>      $SubjDetails['subject_id'],
                'subject_name'  =>      $SubjDetails['subject_name'],
                'course'        =>      $SubjDetails['course'],
                'year'          =>      $SubjDetails['year'],
                'sem'           =>      $SubjDetails['sem'],
                'form_message'  =>      $form_message
            );
            $this->load->view('header');
            $this->load->view('nav');
            $this->load->view('subject_edit',$studentDetails);
            $this->load->view('footer');
        } else {
            $subject_name = $this->input->post('subject_name');
            $course = $this->input->post('course');
            $year = $this->input->post('year');
            $sem = $this->input->post('sem');
            $Subjects_Model = new Subjects_Model();
            $addResult = $Subjects_Model->editSubject($SubjDetails['subject_id'],$subject_name,$course,$year,$sem);
            if ($addResult){
                $form_message = 'Edit Success!';
                $this->load->view('header');
                $this->load->view('nav');
                $this->load->view('subject_edit',array('form_message'=>$form_message));
                $this->load->view('footer');
                $this->redirectSubjIndex();
            }
        }
    }

    protected function validateAddForm()
    {
        $config = array(
            array(
                'field'   => 'subject_name',
                'label'   => 'Subject Name',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'course',
                'label'   => 'Subject Course',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'year',
                'label'   => 'Subject Year',
                'rules'   => 'required|integer'
            ),
            array(
                'field'   => 'sem',
                'label'   => 'Subject Semester',
                'rules'   => 'required|integer'
            )
        );

        return $this->form_validation->set_rules($config);
    }

    public function redirectSubjIndex($sec = 1)
    {
        $page = base_url('subjects/index.html');
        header("Refresh: $sec; url=$page");
    }

}