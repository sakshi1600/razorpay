<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Razor extends CI_Controller {
  
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url','html','form'));
             
    }
  
    public function index()
    {
        $this->load->view('product_list');
    }   
    public function razor_payment_success()
    { 
     $data = [
               'user_id' => '1',
               'product_id' => $this->input->post('product_id'),
               'payment_id' => $this->input->post('razorpay_payment_id'),
               'amount' => $this->input->post('totalAmount')
            ];
     $insert = $this->db->insert('payments', $data);
     $arr = array('msg' => 'Payment successfully credited', 'status' => true);  
    }
    public function razor_payment_thankyou()
    {
	$this->load->view('razor_thankyou');
    }
}