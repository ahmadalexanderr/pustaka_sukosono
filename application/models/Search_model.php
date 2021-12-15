<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Search_model extends CI_Model{
    
    public function search($search, $found){
        $this->db->select('b.*, c.category, s.status');
        $this->db->from('book b');
        $this->db->join('book_category c', 'b.category_id = c.id', 'left');
        $this->db->join('book_status s', 'b.status_id = s.status_id', 'left');
        $this->db->order_by('b.id', 'desc');
        switch($search){
            case "":
                $this->db->like('b.category_id', $found);
                $this->db->or_like('b.id', $found);
                $this->db->or_like('b.title');
                $this->db->or_like('b.author');
                $this->db->or_like('b.year');
                $this->db->or_like('c.category');
                $this->db->or_like('s.status');
            break;

            case "b.year":
                date('d F Y', $this->db->where($search, $found));
            break;

            case "b.category_id"."-"."b.id":
                $this->db->where($search, $found);
            break;
            
            default: 
                $this->db->like($search, $found);
        }
        return $this->db->get();
    }

    public function searchhistory($search, $found){
        $email = $this->session->userdata('email');
        $this->db->select('w.id, b.title, w.taken, w.due, w.return_, b.status_id, w.penalty, u.organization_id, w.confirm_id, c.confirm');
        $this->db->from('user u');
        $this->db->join('borrow w', 'u.email = w.email', 'left');
        $this->db->join('book b', 'b.id = w.book_id', 'left');
        $this->db->join('confirmation c', 'c.confirm_id = w.confirm_id', 'left');
        $this->db->where('u.email', $email);
        $this->db->order_by('w.id', 'desc');
        switch($search){
            case "":
                $this->db->like('b.title');
                $this->db->or_like('b.author');
                $this->db->or_like('w.taken');
                $this->db->or_like('w.due');
                $this->db->or_like('c.confirm');
            break;

            case "w.taken":
                date_format($this->db->where($search, $found), "j F Y");
            break;

            case "w.due":
                date('d F Y', $this->db->where($search, $found));
            break;
            
            default: 
                $this->db->like($search, $found);
        }
        return $this->db->get();
    }

     public function searchmembers($search, $found){
        $email = $this->session->userdata('email');
        $this->db->select('u.id, u.name, u.email, u.image, u.date_created, a.activation, m.menu, u.is_active');
        $this->db->from('user u');
        $this->db->join('user_activation as a', 'u.is_active = a.is_active', 'left');
        $this->db->join('user_menu m', 'u.role_id = m.id', 'left');
        $this->db->where('u.email !=', $email);
        $this->db->where('u.role_id !=', 1);
        $this->db->order_by('u.id', 'desc');
        switch($search){
            case "":
                $this->db->like('u.name');
                $this->db->like('u.email');
                $this->db->like( date('j F Y', 'u.date_created'));
                $this->db->like('u.activation'); 
                $this->db->not_like('u.email', 'mehmedalexanderr@gmail.com');
                $this->db->not_like('u.email', $email);
            break;

            case strtotime($search):
                $this->db->like($search, $found);
            break;

            default: 
                $this->db->like($search, $found);
        }
        return $this->db->get();
    }

    public function searchadmins($search, $found){
        $email = $this->session->userdata('email');
        $this->db->select('u.id, u.name, u.email, u.image, u.date_created, a.activation, m.menu, u.is_active');
        $this->db->from('user u');
        $this->db->join('user_activation as a', 'u.is_active = a.is_active', 'left');
        $this->db->join('user_menu m', 'u.role_id = m.id', 'left');
        $this->db->where('u.email !=', $email);
        $this->db->order_by('u.id', 'desc');
        switch($search){
            case "":
                $this->db->like('u.name');
                $this->db->or_like('u.email');
                $this->db->or_like('a.activation');
                $this->db->or_like('m.menu');
            break;

            default: 
                $this->db->like($search, $found);
        }
        return $this->db->get();
    }

    public function searchreturn($search, $found){
        $this->db->select('w.id, b.title, w.taken, w.due, u.name, w.return_, w.confirm_id, c.confirm, w.penalty, b.status_id');
        $this->db->from('borrow w');
        $this->db->join('user u', 'u.email = w.email', 'left');
        $this->db->join('book b', 'b.id = w.book_id', 'left');
        $this->db->join('confirmation c', 'c.confirm_id = w.confirm_id', 'left');
        $this->db->order_by('w.id', 'desc');
        // $this->db->where('b.status_id', 2);
        // $this->db->where('w.confirm_id', 4);
        switch($search){
            case "":
                $this->db->like('b.title');
                $this->db->or_like('w.taken');
                $this->db->or_like('w.due');
                $this->db->or_like('u.name');
                $this->db->or_like('w.return_');
                $this->db->or_like('c.confirm');
                $this->db->or_like('w.penalty');  
            break;

            case "w.taken":
                DATE_FORMAT($this->db->where($search, $found), 'd F Y');
            break;

            case "w.due":
                date('d F Y', $this->db->where($search, $found));
            break;

            case "w.return_":
                date('d F Y', $this->db->where($search, $found));
            break;

            default: 
                $this->db->like($search, $found);
        }
        return $this->db->get();
    }

    public function searchpenalty($search, $found){
        $this->db->select_sum('w.penalty', 'fee');
        $this->db->select('u.id, u.name, b.title, u.email, w.confirm_id, c.confirm, w.return_');
        $this->db->from('user u');
        $this->db->join('borrow w', 'u.email = w.email', 'inner');
        $this->db->join('confirmation c', 'c.confirm_id = w.confirm_id', 'inner');
        $this->db->join('book b', 'b.id = w.book_id', 'inner');
        $this->db->where('w.penalty != ', 0); 
        $this->db->group_by('u.id, u.name, u.email, c.confirm, w.confirm_id, w.return_, b.title');
        $this->db->order_by('w.return_', 'desc');
        switch($search){
            case "":
                $this->db->like('u.name');
                $this->db->or_like('b.title');
                $this->db->or_like('u.email');
                $this->db->or_like('c.confirm');
                $this->db->or_like('w.return_');
            break;
            
            case "w.return_":
                date('d F Y', $this->db->where($search, $found));
            break;

            default: 
                // $this->db->like($search, $found);
                //$this->db->query("SELECT u.id, u.name, b.title, u.email, SUM(w.penalty) as fee, w.confirm_id, c.confirm, w.return_ FROM user as u INNER JOIN borrow as w ON w.email = u.email INNER JOIN confirmation as c ON c.confirm_id = w.confirm_id INNER JOIN book as b ON b.id = w.book_id WHERE w.penalty > 0 GROUP BY u.id, u.name, u.email, c.confirm, w.confirm_id, w.return_, b.title ORDER BY w.return_ DESC")->result_array();
                $this->db->like($search, $found);
        }
        return $this->db->get();
    }
}
