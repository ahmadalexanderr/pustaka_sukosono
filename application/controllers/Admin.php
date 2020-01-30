<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model');
        $this->load->model('Menu_model');
        $this->load->model('Book_model');
    }

    public function index(){
        $data['title'] = 'Dashboard';
        $data['user'] = $this->User_model->logged_user();
        $data['all_user'] = $this->User_model->all_user();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/member', $data);
        $this->load->view('templates/footer');
    }

    public function member(){
        $data['title'] = 'Dashboard';
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
        $data['record'] = $this->Book_model->get_book_id($id);
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
}
