<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
/**
 * Description of Import Model
 *
 * @author Coders Mag Team
 *
 * @email  info@techarise.com
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Site extends CI_Model {
    private $_batchImport;
 
    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }
 
    // save data
    public function importData() {
        $data = $this->_batchImport;
        $this->db->insert_batch('book', $data);
    }
    // get book list
    public function bookList() {
        $this->db->select(array('b.title', 'b.author', 'b.year', 'b.category_id', 'b.status_id'));
        $this->db->from('book as b');
        $query = $this->db->get();
        return $query->result_array();
    }
}
 
?>