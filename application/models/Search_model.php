<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Search_model extends CI_Model{
    
    public function search($search, $found){
        $this->db->select('b.*, c.category, s.status');
        $this->db->from('book b');
        $this->db->join('book_category c', 'b.category_id = c.id', 'left');
        $this->db->join('book_status s', 'b.status_id = s.status_id', 'left');
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
        $this->db->select('w.id, b.title, w.taken, w.due, w.return, b.status_id, w.penalty, u.organization_id, w.confirm_id, c.confirm');
        $this->db->from('user u');
        $this->db->join('borrow w', 'u.email = w.email', 'left');
        $this->db->join('book b', 'b.id = w.book_id', 'left');
        $this->db->join('confirmation c', 'c.confirm_id = w.confirm_id', 'left');
        switch($search){
            case "":
                $this->db->like('b.title');
                $this->db->or_like('b.author');
                $this->db->or_like('w.taken');
                $this->db->or_like('w.due');
                $this->db->or_like('c.confirm');
            break;

            case "w.taken":
                date('d F Y', $this->db->where($search, $found));
            break;

            case "w.due":
                date('d F Y', $this->db->where($search, $found));
            break;
            
            default: 
                $this->db->like($search, $found);
        }
        return $this->db->get();
    }

     public function searchmember($search, $found){
        $email = $this->session->userdata('email');
        $this->db->select('u.id, u.name, u.email, u.image, u.date_created, a.activation, m.menu, u.is_active');
        $this->db->from('user u');
        $this->db->join('user_activation as a', 'u.is_active = a.is_active', 'left');
        $this->db->join('user_menu m', 'u.role_id = m.id', 'left');
        $this->db->where('u.role_id !=', 1);
        switch($search){
            case "":
                $this->db->not_like('role_id', 1);
                $this->db->not_like('u.email', $email);
            break;

            case "u.date_created":
                date('d F Y', $this->db->where($search, $found));
            break;

            default: 
                $this->db->like($search, $found);
        }
        return $this->db->get();
    }

    public function searchreturn($search, $found){
        $this->db->select('w.id, b.title, w.taken, w.due, u.name, w.return, w.confirm_id, c.confirm, w.penalty, b.status_id');
        $this->db->from('borrow w');
        $this->db->join('user u', 'u.email = w.email', 'left');
        $this->db->join('book b', 'b.id = w.book_id', 'left');
        $this->db->join('confirmation c', 'c.confirm_id = w.confirm_id', 'left');
        $this->db->where('b.status_id', 2);
        $this->db->where('w.confirm_id', 4);
        switch($search){
            case "":
                $this->db->like('b.title');
                $this->db->or_like('w.taken');
                $this->db->or_like('w.due');
                $this->db->or_like('u.name');
                $this->db->or_like('w.return');
                $this->db->or_like('c.confirm');
                $this->db->or_like('w.penalty');  
            break;

            case "w.taken":
                date('d F Y', $this->db->where($search, $found));
            break;

            case "w.due":
                date('d F Y', $this->db->where($search, $found));
            break;

            case "w.return":
                date('d F Y', $this->db->where($search, $found));
            break;

            default: 
                $this->db->like($search, $found);
        }
        return $this->db->get();
    }

    public function searchpenalty($search, $found){
        $this->db->select_sum('w.penalty', 'fee');
        $this->db->select('u.id, u.name, b.title, u.email, w.confirm_id, c.confirm, w.return');
        $this->db->from('user u');
        $this->db->join('borrow w', 'u.email = w.email', 'inner');
        $this->db->join('confirmation c', 'c.confirm_id = w.confirm_id', 'inner');
        $this->db->join('book b', 'b.id = w.book_id', 'inner');
        $this->db->where('w.confirm_id', 2);
        $this->db->or_where('w.confirm_id', 3);
        $this->db->group_by('u.id, u.name, u.email, c.confirm, w.confirm_id, w.return, b.title');
        $this->db->order_by('w.return', 'desc');
        switch($search){
            case "":
                $this->db->like('u.name');
                $this->db->or_like('b.title');
                $this->db->or_like('u.email');
                $this->db->or_like('c.confirm');
                $this->db->or_like('w.return');  
            break;
            
            case "w.return":
                date('d F Y', $this->db->where($search, $found));
            break;

            default: 
                $this->db->like($search, $found);
        }
        return $this->db->get();
    }
}
