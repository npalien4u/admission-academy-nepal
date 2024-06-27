<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdmissionForm extends Web_Controller {

	public function __construct(){
		parent::__construct();		
		$this->session->userdata("tenant")->id= ($this->session->userdata("tenant"))->id;
		$this->load->model("Users");
		$this->load->model("ApplicantsModel");
		$this->load->model("AcademicRecords");
		$this->load->model("Siblings");
		$this->load->model("Relatives");
		$this->load->model("ContactDetail");
	}

	public function index()
	{
		//$this->load->view('welcome_message');
		$data["child_view"] = "admission/form" ;
	//	$data["application_id"] =random_string("alnum", 6);
		
	
		$form_sections_list = $this->db->get_where("form_sections", array("institution_id"=>($this->session->userdata("tenant"))->id, "is_active"=>1))->row();	
		$form_sections = array_map("trim", explode(",",$form_sections_list->sections));
		//print_r($open_grades_list->open_grades_id);
		$open_grades_list = $this->db->get_where("admission_open_grades",array("institution_id"=>($this->session->userdata("tenant"))->id))->row();	
		$this->db->where_in("id",explode(",",$open_grades_list->open_grades_id));
		$open_grades = $this->db->get("grades_list")->result();

		$consent_text= $this->db->get_where("consent_text", array("institution_id"=>$this->session->userdata("tenant")->id))->row();
		
		$data["open_grades"] = $open_grades;
		$data["sections"] = $form_sections;
		$data["consent_text"] = $consent_text;

		
		$this->load->view('template/layout', $data);
	}

	public function edit($id){
		//authorize
		//todo: check validate
		//

		$applicant_info = array();
		$this->Applicants->get_where();
		$medical_record = array();
		$parent_info = array();
		$contact_details = array();
		$login_details = array();



	}


	public function sumbit(){	
		
		$sec_code=@$this->input->post("sec_code");
		$client_ip = $_SERVER["REMOTE_ADDR"];	

		if($sec_code!=""){
			redirect("AdmissionForm/thankyou");
			exit;
		}
	
		$institution_id = $this->session->userdata("tenant")->id;		
		
	
		$form_sections_list = $this->db->get_where("form_sections", array("institution_id"=>($this->session->userdata("tenant"))->id))->row();	
		$form_sections = array_map("trim", explode(",",$form_sections_list->sections));

		$user_id =0;
		//create user
		//this secton must always be presetn
		if( in_array("login-account", $form_sections)){
			$user["institution_id"] = $institution_id;
			// $user["username"] = $this->input->post("username");
			// $user["password"] = md5($this->input->post("password"));
			$user["status"] = 1;
			$user["last_login_ip"] = $client_ip;
			$user_id = $this->Users->insert($user);
		}
	
		//create application
		if( preg_grep("/student-info/", $form_sections)){
			$applicant["remote_ip"] = $client_ip;
			$applicant["institution_id"] = $institution_id;
			$applicant["user_id"] = $user_id;
			$applicant["application_id"] =random_string("alnum", 6);//$this->input->post("application_id");
			$applicant["first_name"] = $this->input->post("first_name");
			$applicant["middle_name"] = @$this->input->post("middle_name");
			$applicant["last_name"] = $this->input->post("last_name");

			$dob_ad = sprintf("%s-%s-%s",@$this->input->post("dob_year_ad"),@$this->input->post("dob_month_ad"),@$this->input->post("dob_date_ad") );
			$applicant["dob_ad"] = $dob_ad;
			
			$dob_bs="";
			if(@$this->input->post("dob_month_bs")!="" && @$this->input->post("dob_date_bs")!=="")
				$dob_bs= sprintf("%s-%s-%s",@$this->input->post("dob_year_bs"),@$this->input->post("dob_month_bs"),@$this->input->post("dob_date_bs") );
			else
				$dob_bs= @$this->input->post("dob_year_bs");

			$applicant["dob_bs"] = $dob_bs;

			$applicant["gender"] = @$this->input->post("gender");
		}


		if(preg_grep("/seek-admission/", $form_sections)){
			$applicant["admission_session"] =date("Y");
			$applicant["faculty"] = @$this->input->post("admission_faculty");				
			$applicant["admission_type"] = @$this->input->post("admission_type");
			$applicant["admission_grade"] = @$this->input->post("admission_grade");			
			$applicant["elective_subject"] = @$this->input->post("elective_subject");	
		}

		if(preg_grep("/class-shift/", $form_sections)){
			$applicant["class_shift"] = @$this->input->post("class_shift");
		}

		if(preg_grep("/previous-school/", $form_sections)){
			$applicant["previous_school_name"] = @$this->input->post("previous_school_name");
			$applicant["previous_school_address"] = @$this->input->post("previous_school_address");
			$applicant["previous_school_phone"] = @$this->input->post("previous_school_phone");			
		}


		if(preg_grep("/hobbies-interests/", $form_sections)){
			$applicant["hobbies"] = @$this->input->post("hobbies");
			$applicant["interests"] = @$this->input->post("interests");
		}

		if(preg_grep("/extra-curricular-activities/", $form_sections)){		
			$applicant["interests"] = @$this->input->post("interests");
			$applicant["take_eca_class"] = @$this->input->post("take_eca_class");
		}

		if(preg_grep("/nationality-ethnicity/", $form_sections)){	
			$applicant["nationality"] = @$this->input->post("nationality");
			$applicant["mother_tongue"] = @$this->input->post("mother_tongue");
		}

		if(preg_grep("/transportation/", $form_sections)){
			$applicant["need_transporation"] = @$this->input->post("need_transportation");
			$applicant["bus_stop_pick"] = @$this->input->post("bus_stop_pick");
			$applicant["bus_stop_drop"] = @$this->input->post("bus_stop_drop");
		}

		if(preg_grep("/document-uploads/", $form_sections)){
			$documents = array();
			$documents["birth_certificate"] = $this->upload->do_upload("birth_certificate")?$this->upload->data("file_name"):"";
			$documents["transfer_certificate"] = $this->upload->do_upload("transfer_certificate")?$this->upload->data("file_name"):"";
			$documents["last_marksheet"] = $this->upload->do_upload("last_marksheet")?$this->upload->data("file_name"):"";
			$enc_documents = json_encode ($documents);

			$applicant["documents"] = $enc_documents;
			$applicant["pp_photo"] = $this->upload->do_upload("pp_photo")?$this->upload->data("file_name"):"";
		}

		if(preg_grep("/information-source/", $form_sections)){
			$information_source = @implode(",",@$this->input->post("information_source"));
			$applicant["information_source"] = $information_source;
			$applicant["information_source_other"] = @$this->input->post("information_source_other");
		}

		if(preg_grep("/prev-academic-level/", $form_sections)){
			$applicant["prev_academic_level"] = @$this->input->post("prev_academic_level");
			$applicant["symbol_number"] = @$this->input->post("symbol_number");
			$applicant["score"] = @$this->input->post("symbol_number");
		}
		
		if(preg_grep("/expection-from-institution/", $form_sections)){
			$applicant["expectation"] = @$this->input->post("expectation");
		}

		if(preg_grep("/medical-records/", $form_sections)){
			$applicant["disease"] = @$this->input->post("disease");
			$applicant["health_problem"] = @$this->input->post("health_problem");
		}
		
		if(preg_grep("/contact-detail/", $form_sections)){
			$applicant["phone_number"] = @$this->input->post("phone_number");
			$applicant["mobile_number"] = @$this->input->post("mobile_number");
			$applicant["email_address"] = @$this->input->post("email_address");
		}

		if(preg_grep("/consent/", $form_sections)){
			$applicant["consent_signed"] = @$this->input->post("consent_signed")=="on"?1:0;
		}	
		
		$applicant["status"] =1;

		$application_id = $this->ApplicantsModel->insert($applicant);

		//academic records	
		if(preg_grep("/education-history/", $form_sections)){
			foreach($this->input->post("subject") as $key=>$value){
				$academic_record["application_id"] = $application_id;
				$academic_record["institution_id"] = $institution_id;
				$academic_record["subject"] = $value;
				$academic_record["score_prev_school"] = @$this->input->post("score_prev_school")[$key];
				$academic_record["score_lab_entrance"] = @$this->input->post("score_lab_entrance")[$key];
				$academic_record["outstanding_eca"] = @$this->input->post("outstanding_eca")[$key];
				$this->AcademicRecords->insert($academic_record);			
			}
		}

		//parent_guardain	
		if(preg_grep("/parent-guardian/", $form_sections)){			
			foreach($this->input->post("relation") as $key=>$value){
				$relation["application_id"] = $application_id;
				$relation["relation"] = $value;
				$relation["relative_name"] = $this->input->post("relative_name")[$key];
				$relation["academic_qualification"] = @$this->input->post("academic_qualification")[$key];	
				$relation["occupation"] = @$this->input->post("occupation")[$key];
				$relation["phone"] = @$this->input->post("phone")[$key];
				$relation["email"] = @$this->input->post("email")[$key];
				$relation["institution_id"] = $this->session->userdata("tenant")->id;				
				$this->Relatives->insert($relation);			
			}
		}	

		if(preg_grep("/permanent-address/", $form_sections)){				
			$perm_addr["application_id"] = $application_id;
			$perm_addr["institution_id"] = $institution_id;
			$perm_addr["country"] ="Nepal";
			$perm_addr["state"] = $this->input->post("p_state");
			$perm_addr["district"] = $this->input->post("p_district");
			$perm_addr["city_vdc"] = $this->input->post("p_city_vdc");
			$perm_addr["address1"] = $this->input->post("p_address1");
			$perm_addr["address2"] = $this->input->post("p_address2");
			$perm_addr["contact_type"] ="permanent";
			$this->ContactDetail->insert($perm_addr);
		}

		if(preg_grep("/current-address/", $form_sections)){			
			$cur_addr["application_id"] = $application_id;
			$cur_addr["institution_id"] = $institution_id;
			$cur_addr["country"] ="Nepal";
			$cur_addr["state"] = $this->input->post("c_state");
			$cur_addr["district"] = $this->input->post("c_district");
			$cur_addr["city_vdc"] = $this->input->post("c_city_vdc");
			$cur_addr["address1"] = $this->input->post("c_address1");
			$cur_addr["address2"] = $this->input->post("c_address2");
			$cur_addr["contact_type"] ="current";
			$this->ContactDetail->insert($cur_addr);
		}
		

		//Todo: Send confirmation email
		$to_email = @$this->input->post("email_address");
		if($to_email!=""){

			$this->load->library('email');

			$from_email = $this->session->userdata("tenant")->email;
			$from_name = $this->session->userdata("tenant")->name;
			$subject = "Application form submitted";

			$message = "<p>Dear ".$applicant["first_name"]." ".$applicant["last_name"]. ", </p>";
			$message .= "<p>We are happy to acknowlege the receipt of your online registration with followin details:</p>
						 <p>
							Name: " . $applicant["first_name"]." ". $applicant["last_name"]. "</p><p>	
							Grade: " . $applicant["admission_grade"]. "</p><p>	
							Faculty: " . $applicant["faculty"]. "</p>

							<p>Thank you.</p><p>
							".$this->session->userdata("tenant")->name."</p><p>
							".$this->session->userdata("tenant")->address."</p><p>
							".$this->session->userdata("tenant")->phone."</p><p>
							".$this->session->userdata("tenant")->email."</p>";

			$this->email->from($from_email, $from_name);
			$this->email->to($to_email);

			$this->email->subject($subject);
			$this->email->message($message);

			$success=@$this->email->send(false);
			if(!$success){
				// $this->email->print_debugger();
				// exit;
			}


		}

		


		redirect("AdmissionForm/thankyou");
	}

	public function CheckUsername(){
		$result = $this->Users->get_by_field("username", $this->input->post("username"));		
		echo $result?'false':'true';
	}

	public function thankyou(){
		$data["child_view"] = "admission/complete" ;
		$this->load->view('template/layout', $data);
	}


	private function __sendmail($id){
		$this->load->library('email');

		$this->email->from('your@example.com', 'Your Name');
		$this->email->to('someone@example.com');		

		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');

		$this->email->send();
	}
	
}
