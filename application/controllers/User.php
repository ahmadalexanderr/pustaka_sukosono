<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller{
    public function __construct(){
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model');
        $this->load->model('Menu_model');
        $this->load->model('Book_model');
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
        $this->form_validation->set_rules('company', 'Instansi', 'required|trim');
        $this->form_validation->set_rules('address', 'Alamat Instansi', 'required|trim');
        $this->form_validation->set_rules('contact', 'Kontak', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $company = $this->input->post('company');
            $address = $this->input->post('address');
            $contact = $this->input->post('contact');
            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')){
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

            $q = $this->db->get_where('user_detail', ['email' => $email]);
            if ($q->row_array() > 0){
                $this->db->set('name', $name);
                $this->db->where('email', $email);
                $this->db->update('user');
                $this->db->set('company', $company);
                $this->db->set('address', $address);
                $this->db->set('contact', $contact);
                $this->db->where('email', $email);
                $this->db->update('user_detail');
            } else {
                $data = [
                    'email' => $email,
                    'company' => $company,
                    'address' => $address,
                    'contact' => $contact
                ];
                $this->db->set('name', $name);
                $this->db->where('email', $email);
                $this->db->update('user');
                $this->db->insert('user_detail', $data);
            }
            // $this->db->set('name', $name);
            // $this->db->where('email', $email);
            // $this->db->update('user');
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
        $data['fee'] = $this->User_model->logged_penalty();
        $email = $this->session->userdata('email');
        $this->db->select("sum(w.penalty) as 'penalty'");
        $this->db->from('borrow w');
        $this->db->join('confirmation c', 'c.confirm_id=w.confirm_id', 'inner');
        $array = ['c.confirm_id' => 2, 'w.email' => $email];
        $this->db->where($array);
        $query = $this->db->get();
        $result = $query->row()->penalty;
        if ($result > 0){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('auth/penalty', $data);
            $this->load->view('templates/footer'); 
        } else {
            $this->_book();
        }
    }

    private function _book(){
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
            $title = $this->input->post('title');
            $author = $this->input->post('author');
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
        $data['record'] = $this->Book_model->get_book($id);
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('book_id', 'ID Buku', 'required');
        $this->form_validation->set_rules('title', 'Judul Buku', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/borrow', $data);
            $this->load->view('templates/footer');
        } else {
           $data = [
                 'email' => $this->input->post('email'),
                 'book_id' => $this->input->post('book_id'),
                 'taken' => time(),
                 'due'=> time() + (3 * 24 * 60 * 60),
                 'return' => 0,
                 'penalty' => 0
           ];
           $this->db->insert('borrow', $data);
           $this->db->set('status_id', 1);
           $this->db->where('id', $id);
           $this->db->update('book');
           $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Peminjaman berhasil!</div>');
           redirect('user/book'); 
        }
    }

    public function history(){
        $data['title'] = 'Peminjaman';
        $data['user'] = $this->User_model->logged_user();
        $id = $this->uri->segment(3);
        $data['record'] = $this->Book_model->get_borrowed();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/history', $data);
        $this->load->view('templates/footer');
    }

    public function return_book(){
        $time = time();
        $id = $this->uri->segment(3);
        $this->db->query("UPDATE book INNER JOIN borrow ON borrow.book_id = book.id SET book.status_id = 2, borrow.return = $time, borrow.confirm_id = 4 WHERE borrow.id = $id");
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menunggu Konfirmasi Pengembalian Buku</div>');
        redirect('user/history');
    }
}
