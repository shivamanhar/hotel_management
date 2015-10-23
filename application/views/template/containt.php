<?php
$this->load->view('template/header');
if($other_page !== true)
{
$this->load->view($page);
}
$this->load->view('template/footer');
?>