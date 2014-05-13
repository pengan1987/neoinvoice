<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of invoice
 *
 * @author PengAn
 */
class invoice_model extends CI_Model {

    //put your code here
    var $name = '';
    var $phone = '';
    var $itemnumb = '';
    var $description = '';
    var $price = '';
    var $id;
    var $cid;
    var $payment = '';
    var $qty = '';
    var $address = '';
    var $date = '';

    function __construct() {
        parent::__construct();
    }

    function get_last_cid() {
        $query = $this->db->query("SELECT cid FROM invoice ORDER BY id DESC limit 1;");
        $row = $query->row_array();
        $id = $row['cid'];
        return (is_null($id) ? 1 : $id + 1);
    }

    function get_all_entries() {
        $query = $this->db->get('entries');
        return $query->result();
    }

    function get_by_cid($cid) {
        $queryCommand = "SELECT * FROM invoice WHERE cid = ?";
        $query = $this->db->query($queryCommand, array($cid));
        return $query->result_array();
    }

    function insert() {
        $this->name = $this->input->post('name');
        $this->phone = $this->input->post('phone');
        $this->payment = $this->input->post('payment');
        $this->address = $this->input->post('address');
        $this->date = $this->input->post('date');
        $this->cid = $this->get_last_cid();

        $array_itemnumb = $this->input->post('itemnumb');
        $array_description = $this->input->post('description');
        $array_price = $this->input->post('price');
        $array_cid = $this->input->post('cid');
        $array_qty = $this->input->post('qty');


        $item_count = count($array_itemnumb);
        if ($item_count > 0) {
            for ($i = 0; $i < $item_count; $i++) {

                $this->itemnumb = $array_itemnumb[$i];
                $this->description = $array_description[$i];
                $this->price = $array_price[$i];

                $this->qty = $array_qty[$i];
                $this->db->insert('invoice', $this);
            }
        }
    }

}
