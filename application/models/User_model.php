<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model{
    public function get_user($email){
        $query = $this->db->get_where('user', ['email' => $email])->row_array();
        return $query;
    }

    public function all_user(){
        $query = $this->db->query("SELECT u.id, name, email, image, date_created, activation FROM user as u LEFT JOIN user_activation as a ON u.is_active = a.is_active WHERE role_id != 1 OR email !='pemdessukosono@gmail.com' ")->result_array();
        return $query;
    }

    public function logged_user(){
        $query = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        return $query;
    }

    // public function user_record($id){
    //     //$id = $this->uri->segment(3);
    //     $query = $this->db->get_where('user', ['id' => $id])->result_array();
    //     return $query;
    // }

    public function delete_user(){
        $id = $this->uri->segment(3);
        $query = $this->db->delete('user', ['id'=>$id]);  
        return $query;  
    }
}
