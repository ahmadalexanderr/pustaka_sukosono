<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model');
        $this->load->model('Menu_model');
        $this->load->model('Book_model');
        $this->load->model('Search_model');
    }

    public function index(){
        $data['title'] = 'Member';
        $data['user'] = $this->User_model->logged_user();
        $data['all_user'] = $this->User_model->all_user();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/member', $data);
        $this->load->view('templates/footer');
    }

    public function searchmember(){
        $data['title'] = 'Member';
        $data['user'] = $this->User_model->logged_user();
        $data['search'] = $this->input->post('search');
        $data['found'] = $this->input->post('found');
        $data['all_user'] = $this->Search_model->searchmember($data['search'], $data['found'])->result_array();
        $data['total'] = count($data['all_user']); 
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/member', $data);
        $this->load->view('templates/footer');
    }

    public function member(){
        $data['title'] = 'Member';
        $data['user'] = $this->User_model->logged_user();
        $id = $this->uri->segment(3);
        $data['record'] = $this->User_model->get_user_id($id);
        $data['menuname'] = $this->Menu_model->get_menu();

        $this->form_validation->set_rules('role_id', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/profile', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'role_id' => $this->input->post('role_id'),
            );
            $this->db->where('id', $id);
            $this->db->update('user', $data);
            $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert"> Hak akses user berhasil diperbarui </div>');
            redirect('admin');
        }
    }

    public function delete(){
        $id = $this->uri->segment(3);
        $this->User_model->delete_user($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anggota terhapus!</div>');
        redirect('admin');
    }

    public function book_edit(){
        $data['title'] = 'Data Buku';
        $data['user'] = $this->User_model->logged_user();
        $id = $this->uri->segment(3);
        $data['record'] = $this->Book_model->get_book($id);
        $data['category'] = $this->Book_model->get_category();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('author', 'Author', 'required');
        $this->form_validation->set_rules('year', 'Year', 'required');
        $this->form_validation->set_rules('category_id', 'Category', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/book_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'author' => $this->input->post('author'),
                'year' => $this->input->post('year'),
                'category_id' => $this->input->post('category_id')
            ];
            $this->db->where('id', $id);
            $this->db->update('book', $data);
            $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert"> Data buku berhasil diperbarui </div>');
            redirect('user/book');
        }
    }

    public function book_delete(){
        $id = $this->uri->segment(3);
        $this->Book_model->delete_book($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Buku terhapus!</div>');
        redirect('user/book'); 
    }

    public function category_edit(){
        $data['title'] = 'Kategori';
        $data['user'] = $this->User_model->logged_user();
        $id = $this->uri->segment(3);
        $data['record'] = $this->Book_model->get_category_id($id);
        $this->form_validation->set_rules('category', 'Category', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/category_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'category' => $this->input->post('category')
            ];
            $this->db->where('id', $id);
            $this->db->update('book_category', $data);
            $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert"> Kategori berhasil diperbarui </div>');
            redirect('user/category');
        }
    }

    public function return(){
        $data['title'] = 'Pengembalian Buku';
        $data['user'] = $this->User_model->logged_user();
        $data['record'] = $this->Book_model->return_book();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/history', $data);
        $this->load->view('templates/footer');
    }

    public function searchreturn(){
        $data['title'] = 'Pengembalian Buku';
        $data['user'] = $this->User_model->logged_user();
        $data['search'] = $this->input->post('search');
        $data['found'] = $this->input->post('found');
        $data['record'] = $this->Search_model->searchreturn($data['search'], $data['found'])->result_array();
        $data['total'] = count($data['record']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/history', $data);
        $this->load->view('templates/footer');
    }

    public function unconfirm(){
        $id = $this->uri->segment(3);
        $this->db->query("UPDATE book INNER JOIN borrow ON borrow.book_id = book.id SET book.status_id = 1, borrow.penalty = 0, borrow.confirm_id = 0, borrow.return = 0 WHERE borrow.id = $id");
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengembalian Ditolak!</div>');
        redirect('admin/return'); 
    }

    public function confirm(){
        $id = $this->uri->segment(3);
        $time = time();
        //$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($data['return'] > $data['due']){
            if($user['organization_id'] == 2){
                $this->db->query("UPDATE book INNER JOIN borrow ON borrow.book_id = book.id SET book.status_id = 0, borrow.penalty = 1000, confirm_id = 2 WHERE borrow.id = $id");
            } else {
                $this->db->query("UPDATE book INNER JOIN borrow ON borrow.book_id = book.id SET book.status_id = 0, borrow.penalty = 1000, confirm_id = 2 WHERE borrow.id = $id");
            }
        } else {
            $this->db->query("UPDATE book INNER JOIN borrow ON borrow.book_id = book.id SET book.status_id = 0, borrow.penalty = 0, confirm_id = 1 WHERE borrow.id = $id"); 
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Buku Kembali!</div>');
        redirect('admin/return');
    }

    public function confirm_fee(){
        $id = $this->uri->segment(3);
        $this->db->query("UPDATE user INNER JOIN borrow ON user.email = borrow.email SET borrow.confirm_id = 3 WHERE user.id = $id");
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Denda Lunas</div>');
        redirect('admin/penalty');
    }

    public function penalty(){
        $data['title'] = 'Data Denda';
        $data['user'] = $this->User_model->logged_user();
        $data['record'] = $this->User_model->penalty();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/penalty', $data);
        $this->load->view('templates/footer'); 
    }

    public function searchpenalty(){
        $data['title'] = 'Data Denda';
        $data['user'] = $this->User_model->logged_user();
        $data['search'] = $this->input->post('search');
        $data['found'] = $this->input->post('found');
        $data['record'] = $this->Search_model->searchpenalty($data['search'], $data['found'])->result_array();
        $data['total'] = count($data['record']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/penalty', $data);
        $this->load->view('templates/footer');     
    }

    public function activate(){
        $id = $this->uri->segment(3);
        $this->db->query("UPDATE user SET user.is_active = 1 WHERE user.id = $id");
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Aktif</div>');
        redirect('admin'); 
    }
}