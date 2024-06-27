<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$config['upload_path'] = './uploads/';
$config['allowed_types'] = 'gif|jpg|jpeg|jpe|jpg2|png|pdf|doc|docx';
$config['max_size']     = '20480';
// $config['max_width'] = '5';
// $config['max_height'] = '768'; 
$config['file_ext_tolower'] = true;
$config['encrypt_name'] = true;
$config['detect_mime'] = false;
