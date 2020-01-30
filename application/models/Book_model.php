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
        $query = $this->db->query("SELECT b.*, c.category, s.status FROM book as b LEFT JOIN book_category as c ON b.category_id = c.id LEFT JOIN book_status as s ON b.status_id = s.status_id")->result_array();
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

     public function get_book_id($id){
        $query = $this->db->get_where('book', ['id' => $id])->row_array();
        return $query;
    }

    public function get_borrow($id){
        $query = $this->db->query("SELECT b.id, b.title, d.company, d.address, d.contact, w.taken, w.due, w.return FROM book as b LEFT JOIN borrow as w ON b.id = w.book_id LEFT JOIN user as u ON w.email = u.email LEFT JOIN user_detail as d ON u.email = d.email WHERE b.id = $id")->row_array();
        return $query;
    }

    public function delete_book($id){
        $query = $this->db->delete('book', ['id'=>$id]);  
        return $query;  
    }
}
