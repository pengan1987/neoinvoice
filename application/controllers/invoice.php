<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Invoice extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('invoice_model');
    }

    public function index() {

        $data['paddedNum'] = sprintf("%04d", $this->invoice_model->get_last_cid());

        $this->load->view('invoice/form', $data);
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->invoice_model->insert();
        $data['paddedNum'] = sprintf("%04d", $this->invoice_model->get_last_cid());
        $data['lastCid'] = $this->invoice_model->get_last_cid();
        $this->load->view('invoice/form', $data);
    }

    public function pdf($cid) {
        $invoiceArray = $this->invoice_model->get_by_cid($cid);
        if (!is_null($invoiceArray)) {
            $row = $invoiceArray[0];

            $data['invoiceArray'] = $invoiceArray;
            $data['id'] = $row['cid'];
            $data['name'] = $row['name'];
            $data['phone'] = $row['phone'];
            $data['payment'] = $row['payment'];
            $data['date'] = $row['date'];
            $data['address'] = $row['address'];
            $data['subtotal'] = 0;
            $data['paddedNum'] = sprintf("%08d", $row['cid']);

            $this->load->library('html2pdf');
            //  $this->load->view('invoice/pdf', $data);

            $this->html2pdf->folder('..');
            $this->html2pdf->html($this->load->view('invoice/pdf', $data, true));
            $this->html2pdf->paper('a4', 'portrait');
            $this->html2pdf->filename('invoice.pdf');

            $this->html2pdf->create('download');
        }
    }

}
