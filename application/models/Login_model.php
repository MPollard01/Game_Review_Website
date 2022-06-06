<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function is_registered($name, $password)
    {
        $this->db->where('UserName', $name);
        $query = $this->db->get('users');
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                $is_password = $this->encryption->decrypt($row->UserPassword);
                if($password == $is_password)
                {
                    $this->session->set_userdata('id', $row->UID);
                    $this->session->set_userdata('userName', $row->UserName);

                }
                else
                {
                    return 'Password is not correct';
                }
            }
        }
        else
        {
            return 'Incorrect username';
        }
    }
}