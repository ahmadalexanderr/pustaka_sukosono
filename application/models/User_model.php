<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model{
    public function get_user($email){
        $query = $this->db->get_where('user', ['email' => $email])->row_array();
        return $query;
    }

    public function name_login($name){
        $query = $this->db->get_where('user', ['name' => $name])->row_array();
        return $query;
    }

    public function all_user(){
        $email = $this->session->userdata('email');
        $query = $this->db->query("SELECT u.id, name, email, image, date_created, activation, menu, u.is_active FROM user as u LEFT JOIN user_activation as a ON u.is_active = a.is_active LEFT JOIN user_menu as m ON u.role_id = m.id WHERE u.email !='pemdessukosono@gmail.com' AND u.email != '$email' ")->result_array();
        return $query;
    }

    public function logged_user(){
        $email = $this->session->userdata('email');
        $query = $this->db->query("SELECT u.name, u.email, u.image, u.password, u.date_created, o.organization, ud.company, ud.address, ud.contact FROM user as u LEFT JOIN user_organization as o ON u.organization_id = o.organization_id LEFT JOIN user_detail as ud ON u.email = ud.email WHERE u.email = '$email'")->row_array();
        return $query;
    }

    public function user_profile(){
        $email = $this->session->userdata('email');
        $query = $this->db->query("SELECT u.name, u.email, u.image, u.password, u.date_created, o.organization, ud.company, ud.address, ud.contact FROM user as u LEFT JOIN user_organization as o ON u.organization_id = o.organization_id LEFT JOIN user_detail as ud ON u.email = ud.email WHERE u.email = '$email'");
        return $query;
    }

    public function get_user_id($id){
        //$query = $this->db->select('u.id, u.name, u.email, u.image, u.role_id, m.menu')->from('user as u')->where('u.id', $id)->join('user_menu as m', 'u.role_id = m.id', 'LEFT')->get()->row_array();
        $query = $this->db->get_where('user', ['id' => $id])->row_array();
        return $query;
    }

    public function delete_user(){
        $id = $this->uri->segment(3);
        $query = $this->db->delete('user', ['id'=>$id]); 
        return $query;  
    }

    public function organization(){
        $query = $this->db->query("SELECT * FROM user_organization")->result_array();
        return $query;
    }

    public function logged_penalty(){
        $email = $this->session->userdata('email'); 
        $array = ['c.confirm_id' => 2, 'w.email' => $email];
        $this->db->select("sum(w.penalty) as 'penalty'");
        $this->db->from('borrow w');
        $this->db->join('confirmation c', 'c.confirm_id=w.confirm_id', 'inner');
        $this->db->where($array);
        $query = $this->db->get();
        $result = $query->row()->penalty;
        return $result;
    }

    public function penalty(){
        $query = $this->db->query("SELECT u.id, u.name, b.title, u.email, SUM(w.penalty) as fee, w.confirm_id, c.confirm, w.return FROM user as u INNER JOIN borrow as w ON w.email = u.email INNER JOIN confirmation as c ON c.confirm_id = w.confirm_id INNER JOIN book as b ON b.id = w.book_id WHERE w.confirm_id = 2 OR w.confirm_id = 3 GROUP BY u.id, u.name, u.email, c.confirm, w.confirm_id, w.return, b.title ORDER BY w.return DESC")->result_array();
        return $query;
    }
}
