<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model');
        $this->load->model('Menu_model');
        $this->load->model('Book_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

      public function profile(){
         $data['title'] = 'My Profile';
         $data['user'] = $this->User_model->logged_user();
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar',$data);
         $this->load->view('templates/topbar',$data);
         $this->load->view('user/profile', $data);
         $this->load->view('templates/footer');    
    }

    public function edit(){
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->User_model->logged_user();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile berhasil diperbarui!</div>');
            redirect('user/profile');
        }
    }


    public function changePassword(){
        $data['title'] = 'Change Password';
        $data['user'] = $this->User_model->logged_user();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = md5($this->input->post('current_password'));
            $new_password = $this->input->post('new_password1');
            if ($current_password != $data['user']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama salah</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak bisa sama dengan password lama</div>');
                    redirect('user/changepassword');
                } else {
                    // password sudah ok
                    $password_hash = md5($new_password);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diperbarui</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    public function book(){
       $data['title'] = 'Data Buku';
       $data['user'] = $this->User_model->logged_user();
       $data['books'] = $this->Book_model->book_data();
       $data['category'] = $this->Book_model->get_category();
       $data['status'] = $this->Book_model->get_status();
       $this->form_validation->set_rules('title', 'Title', 'required|trim');
       $this->form_validation->set_rules('author', 'Author', 'required|trim');
       $this->form_validation->set_rules('year', 'Year', 'required|trim');
       $this->form_validation->set_rules('category_id', 'Category', 'required|trim');
       $this->form_validation->set_rules('status_id', 'Status', 'required|trim');
       if ($this->form_validation->run()==false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/books', $data);
            $this->load->view('user/addBook', $data);
            $this->load->view('templates/footer'); 
        } else {
            $title = $this->input->userdata('title');
            $author = $this->input->userdata('author');
            $year = $this->input->post('year');
            $category = $this->input->post('category_id');
            $status = $this->input->post('status_id');
            $this->Book_model->insert_book($title, $author, $year, $category, $status);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Buku berhasil ditambahkan</div>');
            redirect('user/book');
        }
    }

    public function category(){
        $data['title'] = 'Kategori';
        $data['user'] = $this->User_model->logged_user();
        $data['count_category'] = $this->Book_model->count_category();
        $this->form_validation->set_rules('category', 'Category', 'required|is_unique[book_category.category]');
        if ($this->form_validation->run()==false){
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/category', $data);
        $this->load->view('templates/footer'); 
        } else {
            $data = [
                'category' => $this->input->post('category')
            ];
            $this->db->insert('book_category', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori berhasil ditambahkan</div>');
            redirect('user/category');
        }
    }

    public function borrow(){
        $data['title'] = 'Data Buku';
        $data['user'] = $this->User_model->logged_user();
        $id = $this->uri->segment(3);
        $data['record'] = $this->Book_model->get_borrow($id);
        $this->form_validation->set_rules('company', 'Instansi', 'required|trim');
        $this->form_validation->set_rules('address', 'Alamat Instansi', 'required|trim');
        $this->form_validation->set_rules('contact', 'Kontak', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/borrow', $data);
            $this->load->view('templates/footer');
        } else {
           $data = [
                'email' => $this->input->post('email'),
                'company' => $this->input->post('company'),
                'address' => $this->input->post('address'),
                'contact' => $this->input->post('contact')
           ];
           $this->db->insert('user_detail', $data);
           
           $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Peminjaman berhasil!</div>');
           redirect('user/book'); 
        }
    }

}
