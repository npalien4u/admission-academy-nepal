<?php defined('BASEPATH') OR exit('No direct script access allowed');


$config["num_links"] = 5;
$config["use_page_numbers"] = TRUE;
$config['per_page'] = 10;


$config['full_tag_open'] = "<div class='kt-pagination  kt-pagination--brand'><ul class='kt-pagination__links'>";
$config['full_tag_close'] ="</ul></div>";
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
$config['cur_tag_open'] = "<li class='disabled'><li class='kt-pagination__link--active'><a >";
$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
$config['next_tag_open'] = "<li class='kt-pagination__link--next'>";
$config['next_tagl_close'] = "</li>";
$config['prev_tag_open'] = "<li class='kt-pagination__link--prev'>";
$config['prev_tagl_close'] = "</li>";
$config['first_tag_open'] = "<li class='kt-pagination__link--first'>";
$config['first_tagl_close'] = "</li>";
$config['last_tag_open'] = "<li class='kt-pagination__link--last'>";
$config['last_tagl_close'] = "</li>";
