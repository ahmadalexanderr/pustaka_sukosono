<?php
/**
 * @package Phpspreadsheet :  Phpspreadsheet
 * @author TechArise Team
 *
 * @email  info@techarise.com
 *   
 * Description of Phpspreadsheet Controller
 */
 
defined('BASEPATH') OR exit('No direct script access allowed');
//PhpSpreadsheet
require(APPPATH . 'vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
 
class Phpspreadsheet extends CI_Controller {
 
    public function __construct(){
        parent::__construct();
        // load model
        $this->load->model('Site', 'site');
        $this->load->model('User_model');
    }
    // index
    public function import(){
        $data = array();
        $data['title'] = 'Impor Buku';
        $data['user'] = $this->User_model->logged_user();
        $data['breadcrumbs'] = array('Home' => '#');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('spreadsheet/index', $data);
        $this->load->view('templates/footer');
    }
 
    // file upload functionality
    public function upload() {
        $data = array();
        $data['title'] = 'Impor Buku';
        $data['breadcrumbs'] = array('Home' => '#');
        $data['user'] = $this->User_model->logged_user();
         // Load form validation library
         $this->load->library('form_validation');
         $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
         if($this->form_validation->run() == false) {
            
            redirect('Phpspreadsheet/import');
         } else {
            // If file uploaded
            if(!empty($_FILES['fileURL']['name'])) { 
                // get file extension
                $extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);
 
                if($extension == 'csv'){
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                } elseif($extension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } else {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                }
                // file path
                $spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
                $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
            
                // array Count
                $arrayCount = count($allDataInSheet);
                $flag = 0;
                $createArray = array('title', 'author', 'year', 'category_id', 'status_id');
                $makeArray = array('title' => 'title', 'author' => 'author', 'year' => 'year', 'category_id' => 'category_id', 'status_id' => 'status_id');
                $SheetDataKey = array();
                foreach ($allDataInSheet as $dataInSheet) {
                    foreach ($dataInSheet as $key => $value) {
                        if (in_array(trim($value), $createArray)) {
                            $value = preg_replace('/\s+/', '', $value);
                            $SheetDataKey[trim($value)] = $key;
                        } 
                    }
                }
                $dataDiff = array_diff_key($makeArray, $SheetDataKey);
                if (empty($dataDiff)) {
                    $flag = 1;
                }
                // match excel sheet column
                if ($flag == 1) {
                    for ($i = 2; $i <= $arrayCount; $i++) {
                        $addresses = array();
                        $title = $SheetDataKey['title'];
                        $author = $SheetDataKey['author'];
                        $year = $SheetDataKey['year'];
                        $category_id = $SheetDataKey['category_id'];
                        $status_id = $SheetDataKey['status_id'];
 
                        $title = filter_var(trim($allDataInSheet[$i][$title]), FILTER_SANITIZE_STRING);
                        $author = filter_var(trim($allDataInSheet[$i][$author]), FILTER_SANITIZE_STRING);
                        $year = filter_var(trim($allDataInSheet[$i][$year]), FILTER_SANITIZE_NUMBER_FLOAT);
                        $category_id = filter_var(trim($allDataInSheet[$i][$category_id]), FILTER_SANITIZE_NUMBER_INT);
                        $status_id = filter_var(trim($allDataInSheet[$i][$status_id]), FILTER_SANITIZE_NUMBER_INT);
                        $fetchData[] = array('title' => $title, 'author' => $author, 'year' => $year, 'category_id' => $category_id, 'status_id' => $status_id);
                    }   
                    $data['dataInfo'] = $fetchData;
                    $this->site->setBatchImport($fetchData);
                    $this->site->importData();
                } else {
                    echo "Please import correct file, did not match excel sheet column";
                }
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('spreadsheet/display', $data);
                $this->load->view('templates/footer');
            }              
        }
    }
 
    // checkFileValidation
    public function checkFileValidation($string) {
      $file_mimes = array('text/x-comma-separated-values', 
        'text/comma-separated-values', 
        'application/octet-stream', 
        'application/vnd.ms-excel', 
        'application/x-csv', 
        'text/x-csv', 
        'text/csv', 
        'application/csv', 
        'application/excel', 
        'application/vnd.msexcel', 
        'text/plain', 
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
      );
      if(isset($_FILES['fileURL']['name'])) {
            $arr_file = explode('.', $_FILES['fileURL']['name']);
            $extension = end($arr_file);
            if(($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') && in_array($_FILES['fileURL']['type'], $file_mimes)){
                return true;
            }else{
                $this->form_validation->set_message('checkFileValidation', 'Please choose correct file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('checkFileValidation', 'Please choose a file.');
            return false;
        }
    }
 
}
 
?>