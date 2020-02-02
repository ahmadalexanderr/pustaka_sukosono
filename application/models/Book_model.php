<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Book_model extends CI_Model{
    public function create_id($table,$data){
        $query = $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function insert_category($category){
        $query = $this->db->query("INSERT INTO book_category(category) VALUES ('$category')");
        return $query;
    }

    public function count_category(){
        $query = $this->db->query("SELECT COUNT(b.category_id) as total, c.id, c.category FROM book as b LEFT JOIN book_category as c ON c.id = b.category_id GROUP BY c.id, c.category")->result_array();
        return $query;
    }

    public function book_data(){
        $query = $this->db->query("SELECT b.*, c.category, s.status FROM book as b LEFT JOIN book_category as c ON b.category_id = c.id LEFT JOIN book_status as s ON b.status_id = s.status_id ORDER BY b.title DESC")->result_array();
        return $query;
    }

    public function insert_book($title, $author, $year, $category_id, $status_id){
        $query = $this->db->query("INSERT INTO book(title, author, year, category_id, status_id) VALUES ('$title', '$author', $year, $category_id, $status_id)");
        return $query;
    }

    public function get_status(){
        $query = $this->db->query("SELECT * FROM book_status")->result_array();
        return $query;
    }

    public function get_category(){
        $query = $this->db->query("SELECT * FROM book_category")->result_array();
        return $query;
    }    

    public function get_category_id($id){
        $query = $this->db->get_where('book_category', ['id' => $id])->row_array();
        return $query;
    }

     public function get_book($id){
        $query = $this->db->get_where('book', ['id' => $id])->row_array();
        return $query;
    }

    public function get_borrowed(){
        $email = $this->session->userdata('email');
        $query = $this->db->query("SELECT w.id, b.title, w.taken, w.due, w.return, b.status_id, w.penalty, u.organization_id, w.confirm_id, c.confirm FROM user as u LEFT JOIN borrow as w ON u.email = w.email LEFT JOIN book as b ON b.id = w.book_id LEFT JOIN confirmation as c ON w.confirm_id = c.confirm_id WHERE w.email = '$email' ORDER BY w.id DESC")->result_array();
        return $query;
    }

    public function return_book(){
        $query = $this->db->query("SELECT b.title, w.taken, w.due, u.name, w.return ")->result_array();
        return $query;
    }

    public function delete_book($id){
        $query = $this->db->delete('book', ['id'=>$id]);  
        return $query;  
    }
}
