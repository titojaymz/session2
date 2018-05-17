<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JOSEF FRIEDRICH S. BALDO
 * Date Time: 10/17/15 11:56 PM
 */
class Student_Model extends CI_Model {

    public function getStudents()
    {
        $query = $this->db->get_where('tbl_students',array('DELETED' => 0));
        if ($query->num_rows() > 0){
            return $query->result();
        } else {
            return FALSE;
        }
        $this->db->close();
    }

    public function getStudentByID($id = 0)
    {
        $query = $this->db->get_where('tbl_students',array('student_id'=>$id,'DELETED'=>0));
        if ($query->num_rows() > 0){
            return $query->row();
        } else {
            return FALSE;
        }
        $this->db->close();
    }

    public function insertStudent($lastname,$firstname,$middlename,$extname,
                                $address,$contact_no,$course,$year,$sem)
    {
        $this->db->trans_begin();

        $this->db->query('INSERT INTO tbl_students(lastname,firstname,middlename,extname,address,contact_no,course,year,sem)
                          VALUES
                          (
                          "'.$lastname.'",
                          "'.$firstname.'",
                          "'.$middlename.'",
                          "'.$extname.'",
                          "'.$address.'",
                          "'.$contact_no.'",
                          "'.$course.'",
                          "'.$year.'",
                          "'.$sem.'"
                          )');

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            return FALSE;
        }
        else
        {
            $this->db->trans_commit();
            return TRUE;
        }
        $this->db->close();
    }

    public function updateStudent($id,$lastname,$firstname,$middlename,$extname,
                                  $address,$contact_no,$course,$year,$sem)
    {
        $this->db->trans_begin();

        $this->db->query('UPDATE tbl_students SET
                          lastname="'.$lastname.'",
                          firstname="'.$firstname.'",
                          middlename="'.$middlename.'",
                          extname="'.$extname.'",
                          address="'.$address.'",
                          contact_no="'.$contact_no.'",
                          course="'.$course.'",
                          year="'.$year.'",
                          sem="'.$sem.'"
                          WHERE
                          student_id = "'.$id.'"
                          ');

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            return FALSE;
        }
        else
        {
            $this->db->trans_commit();
            return TRUE;
        }
        $this->db->close();
    }

    public function deletestudent($id = 0)
    {
        $this->db->trans_begin();

        $this->db->query('UPDATE tbl_students SET
                          DELETED="1"
                          WHERE
                          student_id = "'.$id.'"
                          ');

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            return FALSE;
        }
        else
        {
            $this->db->trans_commit();
            return TRUE;
        }
        $this->db->close();
    }

    public function getStudentSubjects($id = 0)
    {
        $query = $this->db->get_where('tbl_student_subjects',array('student_id'=>$id,'DELETED' => 0));
        if ($query->num_rows() > 0){
            return $query->result();
        } else {
            return FALSE;
        }
        $this->db->close();
    }

    public function getOneStudentSubjects($id = 0)
    {
        $query = $this->db->get_where('tbl_student_subjects',array('student_subject_id'=>$id,'DELETED' => 0));
        $result = $query->row();
        return array(
            'student_subject_id' => $result->student_subject_id,
            'student_id'=> $result->student_id,
            'subject_id'=> $result->subject_id,
            'grade'=> $result->grade,
            'remarks'=> $result->remarks
        );
    }

    public function getStudentName($id = 0)
    {
        $query = $this->db->get_where('tbl_students',array('student_id'=>$id,'DELETED'=>0));
        if ($query->num_rows() > 0){
            $rowDetails = $query->row();
            return $rowDetails->lastname . ', ' . $rowDetails->firstname . ' ' . $rowDetails->middlename . ' ' . $rowDetails->extname;
        } else {
            return FALSE;
        }
        $this->db->close();
    }

    public function getSubjectName($id = 0)
    {
        $query = $this->db->get_where('lib_subjects',array('subject_id'=>$id,'DELETED'=>0));
        if ($query->num_rows() > 0){
            $rowDetails = $query->row();
            return $rowDetails->subject_name;
        } else {
            return FALSE;
        }
        $this->db->close();
    }

    public function Lib_getAllSubjects($course = NULL, $year = 0, $sem = 0)
    {
        $query = $this->db->get_where('lib_subjects',array(
            'DELETED'   =>  0,
            'course'    =>  $course,
            'year'      =>  $year,
            'sem'       =>  $sem
        ));
        if ($query->num_rows() > 0){
            return $query->result();
        } else {
            return FALSE;
        }
        $this->db->close();
    }

    public function addStudSubjects($student_id = NULL, $subject_id = 0)
    {
        $this->db->trans_begin();

        $this->db->query('INSERT INTO tbl_student_subjects(student_id,subject_id)
                           VALUES
                           ("'.$student_id.'","'.$subject_id.'")
                           ');

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            return FALSE;
        }
        else
        {
            $this->db->trans_commit();
            return TRUE;
        }
        $this->db->close();
    }

    public function editStudSubjects($student_subject_id = 0,$grade,$remarks)
    {
        $this->db->trans_begin();

        $this->db->query('UPDATE tbl_student_subjects SET
                          grade='.$grade.',
                          remarks="'.$remarks.'"
                          WHERE
                          student_subject_id='.$student_subject_id.'
                          ');

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            return FALSE;
        }
        else
        {
            $this->db->trans_commit();
            return TRUE;
        }
        $this->db->close();
    }

    public function deleteStudentSubject($id)
    {
        $this->db->trans_begin();

        $this->db->query('UPDATE tbl_student_subjects SET
                          DELETED=1
                          WHERE
                          student_subject_id='.$id.'
                          ');

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            return FALSE;
        }
        else
        {
            $this->db->trans_commit();
            return TRUE;
        }
        $this->db->close();
    }
}