<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model');
    }

    public function index(){
        $data['title'] = 'Anggota';
        $data['user'] = $this->User_model->logged_user();
        $data['all_user'] = $this->User_model->all_user();
        $id = $this->uri->segment(3);
        //$data['record'] = $this->User_model->user_record($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }


    // public function role(){
    //     $data['title'] = 'Role';
    //     $data['user'] = $this->User_model->logged_user();
    //     $data['role'] = $this->db->get('user_role')->result_array();

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('admin/role', $data);
    //     $this->load->view('templates/footer');
    // }


    // public function roleAccess($role_id){
    //     $data['title'] = 'Role Access';
    //     $data['user'] = $this->User_model->logged_user();
    //     $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

    //     $this->db->where('id !=', 1);
    //     $data['menu'] = $this->db->get('user_menu')->result_array();

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('admin/role-access', $data);
    //     $this->load->view('templates/footer');
    // }

    public function changeAccess(){
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akses berubah!</div>');
    }

    public function edit(){
        $data['title'] = 'Anggota';
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

    public function delete(){
        $id = $this->uri->segment(3);
        $this->User_model->delete_user($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anggota terhapus!</div>');
        redirect('admin');
    }
}
