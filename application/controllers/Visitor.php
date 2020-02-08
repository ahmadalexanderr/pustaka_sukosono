<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Visitor extends CI_Controller{
   
    public function __construct(){
        parent::__construct();
        $this->load->model('Book_model');
        $this->load->model('Search_model');
    }

    public function index(){
        $data['title'] = 'Visitor';
        $data['books'] = $this->Book_model->book_data();
        $this->load->view('templates/visitor_header', $data);
        $this->load->view('templates/visitor_topbar', $data); 
        $this->load->view('visitor/index', $data);
        $this->load->view('templates/visitor_footer');
    }

    public function searchbook(){
        $data['title'] = 'Data Buku';
        $data['search'] = $this->input->post('search');
        $data['found'] = $this->input->post('found');
        $data['books'] = $this->Search_model->search($data['search'], $data['found'])->result_array();
        $data['total'] = count($data['books']);
        //$this->load->view('templates/visitor_header', $data);
        $this->load->view('templates/visitor_topbar', $data); 
        $this->load->view('visitor/index', $data);
        $this->load->view('templates/visitor_footer');       
    }
}
?>