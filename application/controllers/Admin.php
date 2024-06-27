<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Admin_Controller
{

    public $status = array("Active", "Archived", "Trashed");

    public function __construct()
    {
        parent::__construct();
        $this->load->library("pagination");
        //$this->session->userdata("tenant")->id=1;
        $this->load->model("AdminModel");
        $this->load->model("ApplicantsModel");
        $this->load->model("AcademicRecords");
        $this->load->model("Relatives");
        $this->load->model("ContactDetail");
    }

    private function init_pagination($base_url, $total_rows, $page_size = 10)
    {
        $config["base_url"] = $base_url;
        $config["total_rows"] = $total_rows;
        $config["per_page"] = $page_size;
        $this->pagination->initialize($config);
    }

    public function index()
    {
        $data["child_view"] = "admin/login";
        $this->load->view('admin/login', $data);
    }

    public function login()
    {
        $data["login_name"] = @$this->input->post("email");
        $data["password"] = @$this->input->post("password");
        $data["id"] = $this->session->userdata("tenant")->id;
         $admission_session =  date("Y");

        $result = $this->AdminModel->Authenticate($data);
        if ($result) {
            $session_data["user"] = (array) $result[0];
            $this->session->set_userdata($session_data);
            $this->session->set_userdata("logged_in", true);
            $this->session->set_userdata("usertype", "admin");
            redirect(base_url("admin/applicants/$admission_session/1"));
            exit;
        }
        redirect("/admin/");
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url("/admin/"));
    }

    public function dashboard()
    {
        $this->check_login();
        
        $this->applicants( date("Y"),1);
    }

    public function settings()
    {
        $this->check_login();
        $section = "profile";
        $show_success = false;

        if (@$this->input->post()) {
            $section = @$this->input->post("section");

            switch ($section) {
                case "profile":
                    $upload_config['upload_path'] = './uploads/tenants/';
                    $upload_config['allowed_types'] = 'gif|jpg|jpeg|jpe|jpg2|png|pdf|doc|docx';
                    $upload_config['file_ext_tolower'] = true;
                    $upload_config['encrypt_name'] = true;
                    $upload_config['detect_mime'] = false;
                    $this->upload->initialize($upload_config);
                    $data["logo"] = $this->upload->do_upload("logo") ? $this->upload->data("file_name") : @$this->input->post("logo_old");
					$data["banner"] = $this->upload->do_upload("banner") ? $this->upload->data("file_name") : @$this->input->post("banner_old");

                    $data["name"] = @$this->input->post("name");
                    $data["address"] = @$this->input->post("address");
                    $data["phone"] = @$this->input->post("phone");
                    $data["email"] = @$this->input->post("email");
                    $data["website"] = @$this->input->post("website");

                    $this->AdminModel->UpdateProfile($data);
                    $show_success = true;
                    break;

                case "login":
                    $password = @$this->input->post("password");
                    $confirm_pasword = @$this->input->post("confirm_password");
                    if ($password) {
                        if ($confirm_pasword == $password) {
                            $password = md5($password);
                            $data["password"] = $password;

                            $this->AdminModel->UpdateProfile($data);
                            $show_success = true;
                        }
                    }
                    break;
            }

        }

        $data = $this->AdminModel->InstitutionProfile($this->session->userdata("tenant")->id);
        $admission_session =  date("Y");
        $min_year = $this->db->select_min("admission_session")->from("applications")->where("institution_id", $this->session->userdata("tenant")->id)->get()->row()->admission_session;
   

        $view_data["section"] = $section;
        $view_data["child_view"] = "admin/settings";
        $view_data["view_title"] = "System Settings";
        $view_data["tenant"] = $data;
        $view_data["show_success"] = $show_success;
        $view_data["admission_session"] = $admission_session;
        $view_data["min_year"]= $min_year;
        $this->load->view('template/layout', $view_data);
    }

    public function applicant($action, $id)
    {

        $this->check_login();

        $admission_session =  date("Y");
        $min_year = $this->db->select_min("admission_session")->from("applications")->where("institution_id", $this->session->userdata("tenant")->id)->get()->row()->admission_session;
   
        
        $action = strtolower($action);

        
        $data = new stdClass();
		$child_view = "";		
		
			switch ($action) {
			
				case "edit":
				case "view":

					if (@$this->input->post()) {
						$this->update_applicant();
					}
					$query = $this->ApplicantsModel->get_where(array("id" => $id, "institution_id" => $this->session->userdata("tenant")->id));
					if (sizeof($query) == 0) {
						$child_view = "errors/html/error_general";
						$view_data["heading"] = "Access denied";
						$view_data["message"] = "The record you are looking for eithe doesn't exist or you do not have permission to access the record.";
					} else {
						$applicant = $query[0];
						$data->applicant_info = $applicant;
						$data->parent_info = $this->Relatives->get_where(array("application_id" => $applicant->id));

                      

						$data->academic_record = $this->AcademicRecords->get_where(array("application_id" => $applicant->id));
						$data->contact_detail = $this->ContactDetail->get_where(array("application_id" => $applicant->id));
						$data->enable_edit = $action == "edit";
						$open_grades_list = $this->db->get_where("admission_open_grades", array("institution_id" => ($this->session->userdata("tenant"))->id))->row();
						$this->db->where_in("id", explode(",", $open_grades_list->open_grades_id));
						$open_grades = $this->db->get("grades_list")->result();
						$data->open_grades = $open_grades;

						$form_sections_list = $this->db->get_where("form_sections", array("institution_id" => ($this->session->userdata("tenant"))->id, "is_active" => 1))->row();
						$form_sections = array_map("trim", explode(",", $form_sections_list->sections));
						$consent_text = $this->db->get_where("consent_text", array("institution_id" => $this->session->userdata("tenant")->id))->row();

						$view_data["sections"] = $form_sections;
						$view_data["consent_text"] = $consent_text;
						$child_view = "admin/edit_form";
					}

					break;

				case "activate":
					$action_result = $this->update_status($id, 1);
					echo json_encode($action_result);
					exit;
					break;
				case "archive":
					$action_result = $this->update_status($id, 2);
					echo json_encode($action_result);
					exit;
					break;
				case "trash":
					$action_result = $this->update_status($id, 3);
					echo json_encode($action_result);
					exit;
					break;
				case "purge":
					$action_result = $this->delete_records($id);
					echo json_encode($action_result);
					exit;
					break;
			}
		

        //echo json_encode($data);
        $view_data["child_view"] = $child_view;
        $view_data["view_title"] = "Application form";
        $view_data["application"] = $data;

        $view_data["admission_session"] = $admission_session;
        $view_data["min_year"]= $min_year;

        $this->load->view('template/layout', $view_data);
	}
	
	public function printview($id){


					$query = $this->ApplicantsModel->get_where(array("id" => $id, "institution_id" => $this->session->userdata("tenant")->id));
					$applicant = $query[0];
                    $data->applicant_info = $applicant;
                    $data->parent_info = $this->Relatives->get_where(array("application_id" => $applicant->id));
                    $data->academic_record = $this->AcademicRecords->get_where(array("application_id" => $applicant->id));
                    $data->contact_detail = $this->ContactDetail->get_where(array("application_id" => $applicant->id));
                    $data->enable_edit = $action == "edit";
                    $open_grades_list = $this->db->get_where("admission_open_grades", array("institution_id" => ($this->session->userdata("tenant"))->id))->row();
                    $this->db->where_in("id", explode(",", $open_grades_list->open_grades_id));
                    $open_grades = $this->db->get("grades_list")->result();
                    $data->open_grades = $open_grades;

                    $form_sections_list = $this->db->get_where("form_sections", array("institution_id" => ($this->session->userdata("tenant"))->id))->row();
                    $form_sections = array_map("trim", explode(",", $form_sections_list->sections));
                    $consent_text = $this->db->get_where("consent_text", array("institution_id" => $this->session->userdata("tenant")->id))->row();

                    $view_data["sections"] = $form_sections;
                    $view_data["consent_text"] = $consent_text;
					$child_view = "admin/edit_form";


					$view_data["child_view"] = $child_view;
					$view_data["view_title"] = "Application form";
					$view_data["application"] = $data;
					//$this->load->view('template/layout', $view_data, true);

			$this->load->library("PdfGenerator");
			//$stream = false;   //false => force download, true => display on browser
			$html_content = $this->load->view('template/layout', $view_data, true);;
			$applicant_name="application";
			$this->pdfgenerator->generate($html_content, $applicant_name, false);
			
	}

    public function applicants($session=false, $status = 1,   $page = 1)
    {
        $this->check_login();
        $page_size = $this->config->item("per_page"); //@$this->input->post("length");
        $offset = ($page - 1) * $page_size;
        $admission_session =  !$session?date("Y"):$session;
        
        $filter = array("admission_session"=>$admission_session,"institution_id" => $this->session->userdata("tenant")->id);

       // if($status==2) $filter["admission_session <"]= date("Y");
      

		$this->db->limit($page_size, $offset);
		$this->db->where('first_name is NOT NULL', null, false);
        //$this->db->select("SQL_CALC_FOUND_ROWS *", false)
        $this->db->select("*", false)
            ->from("applications")
            ->where($filter) ;

        if($status==2) $this->db->or_where( array( "status"=> $status, "admission_session <"=>date("Y")));


        $result =$this->db->order_by("id", "desc")

            ->get()->result();


        foreach($result as $applicant){
            $parent=$this->db->from("parent_info")->where("application_id", $applicant->id)->get()->result();
            $applicant->parent_info=@$parent[0];
          
        }
            
       // $num_rows = $this->db->query("SELECT count(*)")->row();
       $sql_rows_query=$this->db->select("count(*) as num_rows", false)
                                ->where($filter)
                                ->from("applications");
        if($status==2) $this->db->or_where( array( "status"=> $status, "admission_session <"=>date("Y")));
        $rows_query_result =  $this->db->get()->row();


        $base_url = base_url("admin/applicants");

      
        $this->init_pagination(base_url("admin/applicants/$session/$status/"), $rows_query_result->num_rows, $page_size);

        

        $min_year = $this->db->select_min("admission_session")->from("applications")->where("institution_id", $this->session->userdata("tenant")->id)->get()->row()->admission_session;
       

        $data["child_view"] = "admin/dashboard";
        $data["view_title"] = $this->status[$status - 1] . " Applicants list ($admission_session)";
        $data["applicants"] = $result;
        $data["offset"] = $offset;
        $data["links"] = $this->pagination->create_links();


        $data["admission_session"] = $admission_session;
        $data["min_year"]= $min_year;
        $this->load->view('template/layout', $data);
    }

    private function update_applicant()
    {
        $application_id = @$this->input->post("id");
        $institution_id = $this->session->userdata("tenant")->id;

        $form_sections_list = $this->db->get_where("form_sections", array("institution_id" => $institution_id))->row();
        $form_sections = array_map("trim", explode(",", $form_sections_list->sections));

        //create application
        //if (in_array("student-info", $form_sections)) {
		if( preg_grep("/student-info/", $form_sections)){
            $applicant["first_name"] = @$this->input->post("first_name");
            $applicant["middle_name"] = @$this->input->post("middle_name");
            $applicant["last_name"] = @$this->input->post("last_name");

            $dob_ad = sprintf("%s-%s-%s", @$this->input->post("dob_year_ad"), @$this->input->post("dob_month_ad"), @$this->input->post("dob_date_ad"));
            $applicant["dob_ad"] = $dob_ad;

            $dob_bs = sprintf("%s-%s-%s", @$this->input->post("dob_year_bs"), @$this->input->post("dob_month_bs"), @$this->input->post("dob_date_bs"));
            $applicant["dob_bs"] = $dob_bs;
            $applicant["gender"] = @$this->input->post("gender");
		}
		
		if( preg_grep("/seek-admission/", $form_sections)){
            $applicant["admission_grade"] = @$this->input->post("admission_grade");
            $applicant["admission_type"] = @$this->input->post("admission_type");
			$applicant["admission_session"] = date("Y");
			$applicant["faculty"] = @$this->input->post("admission_faculty");
			$applicant["elective_subject"] = @$this->input->post("elective_subject");
        }
       
		if( preg_grep("/class-shift/", $form_sections)){        
            $applicant["class_shift"] = @$this->input->post("class_shift");
        }

		if( preg_grep("/previous-school/", $form_sections)){        
            $applicant["previous_school_name"] = @$this->input->post("previous_school_name");
            $applicant["previous_school_address"] = @$this->input->post("previous_school_address");
            $applicant["previous_school_phone"] = @$this->input->post("previous_school_phone");
        }
      
		if( preg_grep("/hobbies-interests/", $form_sections)){        
            $applicant["hobbies"] = @$this->input->post("hobbies");
            $applicant["interests"] = @$this->input->post("interests");
        }

		if( preg_grep("/extra-curricular-activities/", $form_sections)){         
			$applicant["interests"] = @$this->input->post("interests");
			$applicant["interests"] = @$this->input->post("interests");
            $applicant["take_eca_class"] = @$this->input->post("take_eca_class");
        }      

		if( preg_grep("/nationality-ethnicity/", $form_sections)){         
            $applicant["nationality"] = @$this->input->post("nationality");
            $applicant["mother_tongue"] = @$this->input->post("mother_tongue");
        }

		if( preg_grep("/transportation/", $form_sections)){         
            $applicant["need_transporation"] = @$this->input->post("need_transportation");
            $applicant["bus_stop_pick"] = @$this->input->post("bus_stop_pick");
            $applicant["bus_stop_drop"] = @$this->input->post("bus_stop_drop");
        }

		if( preg_grep("/document-uploads/", $form_sections)){
        
            $documents = array();
            if ($this->upload->do_upload("birth_certificate")) {
                $documents["birth_certificate"] = $this->upload->data("file_name");
                @unlink($this->upload->data("file_path") . "/" . @$this->input->post("birth_certificate_old"));
            } else {
                $documents["birth_certificate"] = @$this->input->post("birth_certificate_old");
            }

            if ($this->upload->do_upload("transfer_certificate")) {
                $documents["transfer_certificate"] = $this->upload->data("file_name");
                @unlink($this->upload->data("file_path") . "/" . @$this->input->post("transfer_certificate_old"));
            } else {
                $documents["transfer_certificate"] = @$this->input->post("transfer_certificate_old");
            }

            if ($this->upload->do_upload("last_marksheet")) {
                $documents["last_marksheet"] = $this->upload->data("file_name");
                @unlink($this->upload->data("file_path") . "/" . @$this->input->post("last_marksheet_old"));
            } else {
                $documents["last_marksheet"] = @$this->input->post("last_marksheet_old");
            }

            $enc_documents = json_encode($documents);
            $applicant["documents"] = $enc_documents;

            if ($this->upload->do_upload("pp_photo")) {
                $applicant["pp_photo"] = $this->upload->data("file_name");
                @unlink($this->upload->data("file_path") . "/" . @$this->input->post("pp_photo_old"));
            } else {
                $applicant["pp_photo"] = @$this->input->post("pp_photo_old");
            }
        }

		if( preg_grep("/information-source/", $form_sections)){		
			$information_source = @implode(",",@$this->input->post("information_source"));
			$applicant["information_source"]= $information_source;
			$applicant["information_source_other"]=@$this->input->post("information_source_other");
		}

		if( preg_grep("/prev-academic-level/", $form_sections)){		
			$applicant["prev_academic_level"]=@$this->input->post("prev_academic_level");					
			$applicant["symbol_number"]=@$this->input->post("symbol_number");
			$applicant["score"]=@$this->input->post("symbol_number");
		}

		if( preg_grep("/expection-from-institution/", $form_sections)){		
			$applicant["expectation"]=@$this->input->post("expectation");
		}

		if( preg_grep("/medical-records/", $form_sections)){	
			$applicant["disease"]=@$this->input->post("disease");
			$applicant["health_problem"]=@$this->input->post("health_problem");
		}

		if( preg_grep("/contact-detail/", $form_sections)){		
			$applicant["phone_number"]=@$this->input->post("phone_number");
			$applicant["mobile_number"]=@$this->input->post("mobile_number");
			$applicant["email_address"]=@$this->input->post("email_address");
		}

		if( preg_grep("/consent/", $form_sections)){	
			$applicant["consent_signed"]=@$this->input->post("consent_signed")=="on"?1:0;
		}	
		
        //$applicant["status"]=1;
        $this->ApplicantsModel->update(array("id" => $application_id), $applicant);

		//parent_guardain
		if( preg_grep("/parent-guardian/", $form_sections)){		
			foreach (@$this->input->post("relation_id") as $key => $value) {
				$relative_id = $value;
				if ($relative_id) {
					$relation["relation"] = @$this->input->post("relation")[$key];
					$relation["relative_name"] = @$this->input->post("relative_name")[$key];
					$relation["academic_qualification"] = @$this->input->post("academic_qualification")[$key];
					$relation["phone"] = @$this->input->post("phone")[$key];
					$relation["email"] = @$this->input->post("email")[$key];
					$relation["occupation"] = @$this->input->post("occupation")[$key];
					$this->Relatives->update(array("id" => $relative_id), $relation);
				}
			}
		}

		if( preg_grep("/education-history/", $form_sections)){		
			foreach (@$this->input->post("subject_id") as $key => $value) {
				$subject_id = $value;
				if ($subject_id) {					
					$academic_record["subject"]  = @$this->input->post("subject")[$key];
					$academic_record["score_prev_school"]  =@$this->input->post("score_prev_school")[$key];				
					$academic_record["outstanding_eca"]  =@$this->input->post("outstanding_eca")[$key];
					$this->AcademicRecords->update(array("id" => $subject_id), $academic_record);
				}
			}
		}


		if(preg_grep("/permanent-address/", $form_sections)){										
			$perm_addr["state"] = $this->input->post("p_state");
			$perm_addr["district"] = $this->input->post("p_district");
			$perm_addr["city_vdc"] = $this->input->post("p_city_vdc");
			$perm_addr["address1"] = $this->input->post("p_address1");
			$perm_addr["address2"] = $this->input->post("p_address2");
			$perm_addr["contact_type"] ="permanent";
			$this->ContactDetail->update(array("id" => @$this->input->post("p_contact_id")),$perm_addr);
		}

		if(preg_grep("/current-address/", $form_sections)){						
			$cur_addr["state"] = $this->input->post("c_state");
			$cur_addr["district"] = $this->input->post("c_district");
			$cur_addr["city_vdc"] = $this->input->post("c_city_vdc");
			$cur_addr["address1"] = $this->input->post("c_address1");
			$cur_addr["address2"] = $this->input->post("c_address2");
			$cur_addr["contact_type"] ="current";
			$this->ContactDetail->update(array("id" => @$this->input->post("c_contact_id")),$cur_addr);
		}

        
    }

    private function update_status($id, $status)
    {
        $criteria = array("id" => $id, "institution_id" => $this->session->userdata("tenant")->id);
        $data = array("status" => $status);
        $this->ApplicantsModel->update($criteria, $data);
        $response = array("success" => 1, "title" => $this->status[$status - 1], "message" => "Record " . $this->status[$status - 1] . " successfully.");
        return $response;

    }

    private function delete_records($id)
    {
        $criteria = array("id" => $id, "institution_id" => $this->session->userdata("tenant")->id);
        $this->ApplicantsModel->delete($criteria);
        $this->Relatives->delete($criteria);
        $response = array("success" => 1, "title" => "Deleted", "message" => "Record deleted successfully.");
        return $response;
    }

}
