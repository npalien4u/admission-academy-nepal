<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Applicant extends Web_Controller {
		
		function __construct(){
			parent::__construct();
			$this->load->model("UsersModel");
		}

		function index(){
			//print_r($this->session->userdata());
			$data["child_view"] = "applicant/login" ;
			$this->load->view('applicant/login', $data);
		}

		public function login(){	
				
			$data["username"]=$this->input->post("username");
			$data["password"]=$this->input->post("password");
			$data["institution_id"] = $this->session->userdata("tenant")->id;
	
			$result = $this->UsersModel->Authenticate($data);

			if($result){
				$session_data["user"] = $result[0];			
				$this->session->set_userdata($session_data);
				$this->session->set_userdata("logged_in", true);
				$this->session->set_userdata("usertype","applicant");
				redirect(base_url("applicant/dashboard"));
				exit;
			}
			redirect(base_url("applicant"));
		}

		public function dashboard(){
				$this->load->model("ApplicantsModel");
				$this->load->model("Relatives");
				$this->load->model("AcademicRecords");
				$this->load->model("ContactDetail");

				$data= new stdClass();
				$query = $this->ApplicantsModel->get_where(array("user_id"=>$this->session->userdata("user")->id, "institution_id"=>$this->session->userdata("tenant")->id));
				if(sizeof($query)==0){
					$child_view ="errors/html/error_general";	
					$view_data["heading"]="Access denied";
					$view_data["message"] = "The record you are looking for eithe doesn't exist or you do not have permission to access the record.";				
				}else{
					$applicant=$query[0];
					$data->applicant_info= $applicant;
					$data->parent_info = $this->Relatives->get_where(array("application_id"=>$applicant->id));
					$data->academic_record = $this->AcademicRecords->get_where(array("application_id"=>$applicant->id));
					$data->contact_detail = $this->ContactDetail->get_where(array("application_id" => $applicant->id));

					$open_grades_list = $this->db->get_where("admission_open_grades", array("institution_id" => ($this->session->userdata("tenant"))->id))->row();
                    $this->db->where_in("id", explode(",", $open_grades_list->open_grades_id));
                    $open_grades = $this->db->get("grades_list")->result();
					$data->open_grades = $open_grades;
					
					$data->enable_edit = false;
				
				}
				$view_data["application"] = $data;	
				
				$form_sections_list = $this->db->get_where("form_sections", array("institution_id"=>($this->session->userdata("tenant"))->id))->row();	
				$form_sections = array_map("trim", explode(",",$form_sections_list->sections));

				$consent_text= $this->db->get_where("consent_text", array("institution_id"=>$this->session->userdata("tenant")->id))->row();



				$view_data["sections"] = $form_sections;
				
				$view_data["child_view"] = "applicant/readonly_form" ;
				$view_data["view_title"] = "Application form";
				$view_data["application"] = $data;
				$view_data["consent_text"] = $consent_text;
				$this->load->view('template/layout', $view_data);	
		}

		public function change_pwd(){
		
				//$this->check_login();		
				$section ="login";
				$show_success=false;
		
				if($this->input->post()){
					$section = $this->input->post("section");								
		
					$password = $this->input->post("password");
					$confirm_pasword =  $this->input->post("confirm_password");
					if($password){
						if($confirm_pasword==$password){
							$password = md5($password);
							$data["password"] = $password;

							$this->UsersModel->ChangePassword($data);
							$show_success=true;
						}						
					} 					
				}

				$data= $this->UsersModel->get_where(array("id"=>$this->session->userdata("user")->id, "institution_id"=>$this->session->userdata("tenant")->id));
				$view_data["section"] = $section;
				$view_data["child_view"] = "applicant/chpwd";
				$view_data["view_title"] = "Change Password";
				$view_data["user"] = reset($data);
				$view_data["show_success"] =$show_success;
				$this->load->view('template/layout', $view_data);
			}

		public function logout(){
			$this->session->sess_destroy();
			redirect(base_url("applicant"));
		}

	}
