<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JOSEF FRIEDRICH S. BALDO
 * Date Time: 10/18/15 12:31 AM
 */
class students extends CI_Controller {

    public function index()
    {
        $Student_Model = new Student_Model();
        $form_message = '';
        $this->load->view('header');
        $this->load->view('nav');
        $this->load->view('student_list',array(
                        'student_data'=>$Student_Model->getStudents(),
                        'list_fields'=>$this->listFields(),
                        'form_message'=>$form_message
                        ));
        $this->load->view('footer');
    }

    public function editStudent($id = 0)
    {
        if ($id > 0){
            $Student_Model = new Student_Model();

            $this->validateEditForm();

            if (!$this->form_validation->run()){
                $form_message = '';
                $this->load->view('header');
                $this->load->view('nav');
                $this->load->view('edit_student',array(
                    'student_details'=>$Student_Model->getStudentByID($id),
                    'listFields'=>$this->listFields(),
                    'form_message'=>$form_message
                ));
                $this->load->view('footer');
            } else {
                $id = $this->input->post('student_id');
                $lastname = $this->input->post('lastname');
                $firstname = $this->input->post('firstname');
                $middlename = $this->input->post('middlename');
                $extname = $this->input->post('extname');
                $address = $this->input->post('address');
                $contact_no = $this->input->post('contact_no');
                $course = $this->input->post('course');
                $year = $this->input->post('year');
                $sem = $this->input->post('sem');

                $updateResult = $Student_Model->updateStudent($id,$lastname,$firstname,$middlename,$extname,
                                                $address,$contact_no,$course,$year,$sem);
                if ($updateResult){
//                    $this->load->view('student_update_success',array('redirectIndex'=>$this->redirectIndex()));
                    $form_message = 'Update Success';
                    $this->load->view('header');
                    $this->load->view('nav');
                    $this->load->view('student_list',array(
                        'student_data'=>$Student_Model->getStudents(),
                        'list_fields'=>$this->listFields(),
                        'form_message'=>$form_message,
                        $this->redirectIndex()
                    ));
                    $this->load->view('footer');
                }
            }
        } else {
            $this->load->view('no_id',array('redirectIndex'=>$this->redirectIndex()));
        }

    }

    public function addStudent()
    {
        $this->validateAddForm();

        if (!$this->form_validation->run()){
            $form_message = '';
            $this->load->view('header');
            $this->load->view('nav');
            $this->load->view('add_student',array('form_message'=>$form_message));
            $this->load->view('footer');
        } else {
            $Student_Model = new Student_Model();
            $lastname = $this->input->post('lastname');
            $firstname = $this->input->post('firstname');
            $middlename = $this->input->post('middlename');
            $extname = $this->input->post('extname');
            $address = $this->input->post('address');
            $contact_no = $this->input->post('contact_no');
            $course = $this->input->post('course');
            $year = $this->input->post('year');
            $sem = $this->input->post('sem');

            $addResult = $Student_Model->insertStudent($lastname,$firstname,$middlename,$extname,
                $address,$contact_no,$course,$year,$sem);
            if ($addResult){
                $form_message = 'Add Success!';
                $this->load->view('header');
                $this->load->view('nav');
                $this->load->view('student_list',array(
                    'student_data'=>$Student_Model->getStudents(),
                    'list_fields'=>$this->listFields(),
                    'form_message'=>$form_message,
                    $this->redirectIndex()
                ));
                $this->load->view('footer');
            }
        }
    }

    public function student_masterview($id = 0,$form_message = '')
    {
        $Student_Model = new Student_Model();
        $StudentDetails = $Student_Model->getStudentByID($id);
        if ($StudentDetails){
            $form_message = $form_message;
            $data = array(
                'student_id'    =>      $StudentDetails->student_id,
                'lastname'      =>      $StudentDetails->lastname,
                'firstname'     =>      $StudentDetails->firstname,
                'middlename'    =>      $StudentDetails->middlename,
                'extname'       =>      $StudentDetails->extname,
                'address'       =>      $StudentDetails->address,
                'contact_no'    =>      $StudentDetails->contact_no,
                'course'        =>      $StudentDetails->course,
                'year'          =>      $StudentDetails->year,
                'sem'           =>      $StudentDetails->sem,
                'form_message'  =>      $form_message,
                'student_subjects'  =>  $Student_Model->getStudentSubjects($StudentDetails->student_id)
            );
        } else {
            $form_message = 'No records found!';
            $data = array(
                'form_message'      =>      $form_message
            );
        }
        $this->load->view('header');
        $this->load->view('nav');
        $this->load->view('student_masterview',$data);
        $this->load->view('footer');
    }

    public function delete_student($id = 0)
    {
        $Student_Model = new Student_Model();
        if ($id > 0){
            $deleteResult = $Student_Model->deletestudent($id);
            if ($deleteResult){
                $form_message = 'Delete Success!';
                $this->load->view('header');
                $this->load->view('nav');
                $this->load->view('student_list',array(
                    'student_data'=>$Student_Model->getStudents(),
                    'list_fields'=>$this->listFields(),
                    'form_message'=>$form_message,
                    $this->redirectIndex()
                ));
                $this->load->view('footer');
            }
        }
    }

    public function addStudentSubjects($student_id = 0,$course = 0,$year = 0,$sem = 0)
    {
        $Student_Model = new Student_Model();
        $Subject = $Student_Model->Lib_getAllSubjects($course,$year,$sem);

        if ($Subject){
            $this->validateAddSubjects();

            if (!$this->form_validation->run()){
                $form_message = '';
                $this->load->view('header');
                $this->load->view('nav');
                $this->load->view('add_student_subject',array(
                    'Subject'=>$Subject,
                    'form_message'=>$form_message,
                    'student_id'=>$student_id
                ));
                $this->load->view('footer');
            } else {
                $subject_id_post = $this->input->post('subject_id');
                $student_id_post = $student_id;
                $addResult = $Student_Model->addStudSubjects($student_id_post,$subject_id_post);
                if ($addResult){
                    $form_message = 'Add Success!';
                    $this->load->view('header');
                    $this->load->view('nav');
                    $this->load->view('add_student_subject',array(
                        'Subject'=>$Subject,
                        'form_message'=>$form_message,
                        'student_id'=>$student_id
                    ));
                    $this->load->view('footer');
                    $this->redirectMasterPage($student_id);
                }
            }
        } else {
            $Subject = '';
            $form_message = 'There are discrepancies on the student details, please recheck before adding subjects';
            $this->load->view('header');
            $this->load->view('nav');
            $this->load->view('add_student_subject',array(
                'Subject'=>$Subject,
                'form_message'=>$form_message,
                'student_id'=>$student_id
            ));
            $this->load->view('footer');
            $this->redirectMasterPage($student_id,2);
        }
    }

    public function editstudentsubject($student_subject_id = 0)
    {
        $Student_Model = new Student_Model();
        $SubjDetails = $Student_Model->getOneStudentSubjects($student_subject_id);

        $student_subject_id = $SubjDetails['student_subject_id'];
        $student_id = $SubjDetails['student_id'];
        $subject_id = $SubjDetails['subject_id'];
        $subj_name = $Student_Model->getSubjectName($SubjDetails['subject_id']);
        $grade = $SubjDetails['grade'];
        $remarks = $SubjDetails['remarks'];

        $config = array(
            array(
                'field'   => 'grade',
                'label'   => 'Grade',
                'rules'   => 'required'
            )
        );

        $this->form_validation->set_rules($config);

        if (!$this->form_validation->run()){
            $form_message = '';
            $data = array(
                'form_message' => $form_message,
                'student_subject_id' => $student_subject_id,
                'student_id' => $student_id,
                'subject_id' => $subject_id,
                'subj_name' => $subj_name,
                'grade' => $grade,
                'remarks' => $remarks
            );
            $this->load->view('header');
            $this->load->view('nav');
            $this->load->view('edit_student_subject',$data);
            $this->load->view('footer');
        } else {
            $p_grade = $this->input->post('grade');
            $p_remarks = $this->input->post('remarks');
            $resultUpdate = $Student_Model->editStudSubjects($student_subject_id,$p_grade,$p_remarks);
            if ($resultUpdate){
                $Update_message = 'Update Success';
                $this->student_masterview($student_id,$Update_message);
                $this->redirectMasterPage($student_id,0.5);
            }
        }
    }

    public function deletesubject($student_id,$id = 0)
    {
        $Student_Model = new Student_Model();
        $result = $Student_Model->deleteStudentSubject($id);

        if ($result){
            $message = 'DELETE Success!';
            $this->student_masterview($student_id,$message);
            $this->redirectMasterPage($student_id,0.5);
        }
    }

    // custom classes / behavior
    protected function validateAddSubjects()
    {
        $config = array(
            array(
                'field'   => 'subject_id',
                'label'   => 'Subject',
                'rules'   => 'required'
            )
        );

        return $this->form_validation->set_rules($config);
    }

    protected function validateEditForm()
    {
        $config = array(
            array(
                'field'   => 'student_id',
                'label'   => 'student_id',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'lastname',
                'label'   => 'lastname',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'firstname',
                'label'   => 'firstname',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'address',
                'label'   => 'address',
                'rules'   => 'required'
            )
        );

        return $this->form_validation->set_rules($config);
    }

    protected function validateAddForm()
    {
        $config = array(
            array(
                'field'   => 'lastname',
                'label'   => 'lastname',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'firstname',
                'label'   => 'firstname',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'address',
                'label'   => 'address',
                'rules'   => 'required'
            )
        );

        return $this->form_validation->set_rules($config);
    }

    public function listFields()
    {
        $query = $this->db->query('SELECT student_id,lastname,firstname,middlename,extname,course,year,sem FROM tbl_students');
        return $query->list_fields();
    }

    public function redirectIndex()
    {
        $page = base_url();
        $sec = "1";
        header("Refresh: $sec; url=$page");
    }

    public function refreshCurPage()
    {
        $page = current_url();
        $sec = "1";
        header("Refresh: $sec; url=$page");
    }

    public function redirectMasterPage($id,$sec = 1)
    {
        $page = base_url('students/student_masterview/' . $id . '.html');
        header("Refresh: $sec; url=$page");
    }
}