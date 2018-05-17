<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JOSEF FRIEDRICH S. BALDO
 * Date Time: 10/17/15 10:27 PM
 */

class User_Model extends CI_Model {

    private $username;
    private $password;

    protected function getUsername()
    {
        return $this->username;
    }

    protected function getPassword()
    {
        return $this->password;
    }

    public function __construct($username = NULL,$password = NULL)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function registerUser()
    {
        $this->db->trans_begin();

        $this->db->query('INSERT INTO login(username,password) VALUES("'.$this->getUsername().'","'.$this->getPassword().'")');

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $queryResult = 0;
        }
        else
        {
            $this->db->trans_commit();
            $queryResult = 1;
        }
        return $queryResult;
    }

    public function ifUserExist()
    {
        $query = $this->db->get_where('login', array('username' => $this->getUsername(), 'password' => $this->getPassword()));
        return $query->num_rows();
    }

    public function retrieveUserData()
    {
        $query = $this->db->get_where('login', array('username' => $this->getUsername(), 'password' => $this->getPassword()));
        return $query->row();
    }
}