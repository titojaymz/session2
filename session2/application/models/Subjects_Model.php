<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JOSEF FRIEDRICH S. BALDO
 * Date Time: 10/18/15 5:33 PM
 */
class Subjects_Model extends CI_Model {

    public function listAllSubjects()
    {
        $query = $this->db->get_where('lib_subjects',array('DELETED'=>0));
        if ($query->num_rows() > 0){
            return $query->result();
        } else {
            return FALSE;
        }
        $this->db->close();
    }

    public function getSubjDetails($id)
    {
        $query = $this->db->get_where('lib_subjects',array('subject_id'=>$id,'DELETED'=>0));
        $result = $query->row();
        return array(
            'subject_id'=>$result->subject_id,
            'subject_name'=>$result->subject_name,
            'course'=>$result->course,
            'year'=>$result->year,
            'sem'=>$result->sem
        );
    }

    public function addSubject($subject_name,$course,$year,$sem)
    {
        $this->db->trans_begin();

        $this->db->query('INSERT INTO lib_subjects(subject_name,course,year,sem)
                          VALUES
                          (
                          "'.$subject_name.'",
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

    public function editSubject($id,$subject_name,$course,$year,$sem)
    {
        $this->db->trans_begin();

        $this->db->query('UPDATE lib_subjects SET
                            subject_name="'.$subject_name.'",
                            course="'.$course.'",
                            year="'.$year.'",
                            sem="'.$sem.'"
                            WHERE
                            subject_id="'.$id.'"
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

    public function deletesubject($id = 0)
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

}