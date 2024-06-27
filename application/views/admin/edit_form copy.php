<?php							
	$applicant_info =$application->applicant_info;							
	$nep_dob = explode("-",$applicant_info->dob_bs);  
	$eng_dob = explode("-",$applicant_info->dob_ad);  	
	$documents = json_decode($applicant_info->documents);							
?>
<!--Begin::App-->
<div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app" id="kt_app">

	<?php echo $this->load->view("admin/includes/sidebar","",true)?>	

	<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
		<form class="kt-form" id="kt_form_1" method="post" action="<?=base_url("admin/applicant/edit/$applicant_info->id")?>" enctype="multipart/form-data" data-validate-user="<?=base_url("AdmissionForm/CheckUsername")?>">				
			<!--begin:: Widgets/Order Statistics-->
			<input type="hidden" name='id' value="<?=$applicant_info->id?>" />			
			<div class="kt-portlet" >
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
							<?=@$view_title?>
						</h3>
					</div>					
				</div>
				<div class="kt-portlet__body ">
					<div class="row">
						<div class="col-xl-9">							
							<div class="kt-section kt-section--first">
								<div class="kt-section__body">
									<h3 class="kt-section__title kt-section__title-lg">Student Info:</h3>
									<div class="form-group row">
										<label class="col-3 col-form-label">Name</label>
										<div class="col-3">
											<input name="first_name" class="form-control" type="text" value="<?=$applicant_info->first_name?>" placeholder="First Name">
											<span class="form-text text-muted"> * First Name</span>
										</div>
										<div class="col-3">
											<input name="middle_name" class="form-control" type="text" value="<?=$applicant_info->middle_name?>" placeholder="Middle Name">
											<span class="form-text text-muted">Middle Name</span>
										</div>
										<div class="col-3">
											<input name="last_name" class="form-control" type="text" value="<?=$applicant_info->last_name?>" placeholder="Last Name">
											<span class="form-text text-muted"> *Last Name</span>
										</div>										
									</div>
									<div class="form-group row">										
										<label class="col-3 col-form-label">Date of Birth</label>
										<div class="col-8">								
											<div class="row">
											<div class="col-xl-1">
											<label class="form-control-label">* वि.सं:</label>
											</div>
												<div class="col-xl-8">
													<div class="form-group-last row">
														<div class="col-lg-4 form-group-sub">
															<label class="form-control-label">* साल:</label>
																
															<select class="form-control" name="dob_year_bs">
																<option value="">Select</option>
																<?php 
																	$nep_years = array("२०४५", "२०४६", "२०४७", "२०४८", "२०४९", "२०५०", "२०५१", "२०५२", "२०५३", "२०५४", "२०५५", "२०५६", "२०५७", "२०५८", "२०५९", "२०६०", "२०६१", "२०६२", "२०६३", "२०६४", "२०६५", "२०६६", "२०६७", "२०६८", "२०६९", "२०७०", "२०७१", "२०७२", "२०७३", "२०७४", "२०७५", "२०७६", "२०७७");																	
																	foreach($nep_years as $nep_year):
																?>	
																	<option value="<?=$nep_year?>" <?=@$nep_dob[0]==$nep_year?"selected":""?>><?=$nep_year?></option>	
																<?php endforeach;?>													
															</select>
														</div>
														<div class="col-lg-4 form-group-sub">
															<label class="form-control-label">* महिना: </label>
															<select class="form-control" name="dob_month_bs" >
																<option value="">Select</option>
																<?php 
																	$nep_months = array(
																	"१" =>	"बैशाख",
																	"२" =>	"जेठ",
																	"३" =>	"असार",
																	"४" =>	"सावन",
																	"५" =>	"भदाै",
																	"६" =>	"आसाेज",
																	"७" =>	"कार्तिक",
																	"८" =>	"मंसिर",
																	"९" =>	"पुष",
																	"१०" =>	"माघ",
																	"११" =>	"फागुन",
																	"१२" =>	"चैत"
																	);
																	foreach($nep_months as $key=>$month):
																?>
																	<option value="<?=$key?>" <?=@$nep_dob[1]==$key?"selected":""?>><?=$month?></option>
																<?php endforeach; ?>
																
															</select>
														</div>
														<div class="col-lg-4 form-group-sub">
															<label class="form-control-label">* गते:</label>
															<select class="form-control" name="dob_date_bs" >
																<option value="">Select</option>
																<?php 
																	$nep_dates=array("१", "२", "३", "४", "५", "६", "७", "८", "९", "१०", "११", "१२", "१३", "१४", "१५", "१६", "१७", "१८", "१९", "२०", "२१", "२२", "२३", "२४", "२५", "२६", "२७", "२८", "२९", "३०", "३१", "३२") ; 
																	foreach($nep_dates as $nep_date): ?>
																		<option value="<?=$nep_date?>" <?=@$nep_dob[2]==$nep_date?"selected":""?>><?=$nep_date?></option>	
																<?php 																
																	endforeach; 
																?>														
															</select>
														</div>
													</div>
												</div>																			
											</div>
											<div class="row">
											<div class="col-xl-1">
											<label class="form-control-label"> A.D.</label>
											</div>
												<div class="col-xl-8">
													<div class="form-group-last row">
														<div class="col-lg-4 form-group-sub">
															<label class="form-control-label"> Year:</label>
															<select class="form-control" name="dob_year_ad">
																<option value="">Select</option>
																<?php 
																	$min_year=1990; $max_year=2020; $year=$max_year ; 
																	while($year>=$min_year): ?>
																		<option value="<?=$year?>" <?=@$eng_dob[0]==$year?"selected":""?>><?=$year?></option>	
																<?php 
																		$year--;
																	endwhile; 
																?>														
															</select>
														</div>
														<div class="col-lg-4 form-group-sub">
															<label class="form-control-label"> Month:</label>
															<select class="form-control" name="dob_month_ad" >
																<option value="">Select</option>
																<?php 
																	$months = array(
																		'January',																
																		'February',
																		'March',
																		'April',
																		'May',
																		'June',
																		'July ',
																		'August',
																		'September',
																		'October',
																		'November',
																		'December',
																	);
																	foreach($months as $key=>$month):
																?>
																	<option value="<?=$key+1?>" <?=@$eng_dob[1]==$month?"selected":""?>><?=$month?></option>
																<?php endforeach; ?>
																
															</select>
														</div>
														<div class="col-lg-4 form-group-sub">
															<label class="form-control-label"> Date:</label>
															<select class="form-control" name="dob_date_ad">
																<option value="">Select</option>
																<?php 
																	$min_date=1; $max_date=31; $date=$min_date ; 
																	while($date<=$max_date): ?>
																		<option value="<?=$date?>" <?=@$eng_dob[2]==$date?"selected":""?>><?=$date?></option>	
																<?php 
																		$date++;
																	endwhile; 
																?>														
															</select>
																
															</select>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-3 col-form-label">Gender *</label>
										<div class="col-8">
											<div class="kt-radio-inline">
												<label class="kt-radio">
													<input type="radio" name="gender" value="male" <?=$applicant_info->gender=="male"?"checked":""?>> Male
													<span></span>
												</label>
												<label class="kt-radio">
													<input type="radio"  name="gender" value="female" <?=$applicant_info->gender=="female"?"checked":""?>> Female
													<span></span>
												</label>
												<label class="kt-radio">
													<input type="radio" name="gender" value="other" <?=$applicant_info->gender=="other"?"checked":""?>> Other
													<span></span>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-3 col-form-label">Seeking Admission In</label>
										<div class="col-9">								
											
											<div class="row">
											<div class="col-lg-4 form-group-sub">
													<label class="form-control-label">* Grade:</label>
													<select class="form-control" name="admission_grade" >
														<option value="">Select</option>
														<?php 
															$grades = array(
																'Nursery',																
																'LKG',
																'UKG',
																'One',
																'Two',
																'Three',
																'Four ',
																'Five',
																'Six',
																'Seven',
																'Eight',
																'Nine',
																'Ten'
															);
															foreach($grades as $grade):
														?>
															<option value="<?=$grade?>" <?=$applicant_info->admission_grade==$grade?"selected":""?>><?=$grade?></option>
														<?php endforeach; ?>
														
													</select>
												</div>
												<div class="col-lg-4 form-group-sub">
													<label class="form-control-label">* Admission Type:</label>
													<select class="form-control m-select2" name="admission_type" >
														<option value="">Select</option>
														<?php 
															$admission_types = array(
																'Day Scholar',																
																'Day Boarder',
																'Boarder'													
															);
															foreach($admission_types as $admission_type):
																?>
																	<option value="<?=$admission_type?>" <?=$applicant_info->admission_type==$admission_type?"selected":""?>><?=$admission_type?></option>
																<?php endforeach; ?>
														?>														
													</select>
												</div>

												<div class="col-lg-4 form-group-sub">
													<label class="form-control-label">* Session:</label>
													<select class="form-control m-select2" name="admission_session">
														<option value="">Select</option>
														<?php 
															$sessions = array(
																'2020'													
															);
															foreach($sessions as $session):
																?>
																	<option value="<?=$session?>" <?=$applicant_info->admission_session==$session?"selected":""?>><?=$session?></option>
																<?php endforeach; ?>
														?>														
													</select>
												</div>
												
											
											</div>
										</div>									
										
									</div>

									<div class="form-group row">
										<label class="col-3 col-form-label">Previous School Name</label>
										<div class="col-9">
											<div class="input-group">
												<input name="previous_school_name" type="text" class="form-control" placeholder="Previous School Name" value="<?=$applicant_info->previous_school_name?>" >									
											</div>
										</div>
									</div>

									<div class="form-group form-group row">
							
							<div class="col-9 offset-3">
								<div class="row">
									<div class="col-6">
										<div class="input-group">
											<input name="previous_school_address" type="text" class="form-control" placeholder="Previous School Address"  value="<?=$applicant_info->previous_school_address?>">
																				
										</div>
										<span class="form-text text-muted">Previous School Address</span>
									</div>

									<div class="col-6">
										<div class="input-group">
											<input name="previous_school_phone" type="text" class="form-control" placeholder="Previous School Phone"  value="<?=$applicant_info->previous_school_phone?>">		
																	
										</div>
										<span class="form-text text-muted">Previous School Phone</span>	
									</div>
								</div>
							</div>
							
						</div>

									<!-- <div class="form-group row">
										<label class="col-3 col-form-label">Reason for leaving previous school</label>
										<div class="col-9">
											<div class="input-group">
												<input name="reason_for_leaving_previous_school" type="text" class="form-control" placeholder="Reason for leaving previous school" >									
											</div>
										</div>
									</div> -->

									<div class="form-group row">
										<label class="col-3 col-form-label">Hobbies & Intersts</label>
										<div class="col-4">
											<div class="input-group">
												<textarea name="hobbies" type="text" class="form-control" placeholder="Hobbies"><?=$applicant_info->hobbies?></textarea>									
											</div>
											<span class="form-text text-muted">Hobbies</span>
										</div>
										<div class="col-5">
											<div class="input-group">
												<textarea name="interests" type="text" class="form-control" placeholder="Games/Sports/Other interests" ><?=$applicant_info->interests?></textarea>									
											</div>
											<span class="form-text text-muted">Games/Sports/Other interests</span>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-3 col-form-label">Ethnicity</label>
										<div class="col-4">
											<div class="input-group">
												<input name="nationality" type="text" class="form-control" placeholder="Nationality"  value="<?=$applicant_info->nationality?>">									
											</div>
											<span class="form-text text-muted">Nationality</span>
										</div>
										<div class="col-5">
											<div class="input-group">
												<input  name="mother_tongue" type="text" class="form-control" placeholder="Mother tongue"  value="<?=$applicant_info->mother_tongue?>">									
											</div>
											<span class="form-text text-muted">Mother tongue</span>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-3 col-form-label">Bus Stop</label>
										<div class="col-9">
											<div class="input-group">
												<input  name="bus_stop" type="text" class="form-control" placeholder="Bus pickup station for transportation"  value="<?=$applicant_info->bus_stop?>">									
											</div>
										</div>
									</div>

									

									
								</div>
							</div>



							<!-- <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
							<div class="kt-section">
								<div class="kt-section__body">
									<h3 class="kt-section__title kt-section__title-lg">Academic record in previous school:</h3>
									<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
										<thead>
											<tr>
												<th>Subject</th>
												<th>% Marks in last School</th>
												<th>% Marks in Lab Entrance Exam</th>
												<th>Outstanding in Games & Sports/Co-Curricular activities<br/>(If any in previous school)</th>												
											</tr>
										</thead>
										<tbody>
											<?php 
												// $subjects = array("English", "Nepali", "Mathematics", "Science","Social Study");
												// foreach($subjects as $subject):  
											?>
											<tr>
												<td><?php //echo $subject?><input type="hidden" name="subject[]" value="<?php //$subject?>"/></td>
												<td><input type="text" name="score_prev_school[]" class="form-control" value="" placeholder="Score in <?php //$subject?>" ></td>
												<td><input type="text" name="score_lab_entrance[]" class="form-control" value="" placeholder="Score in <?php //$subject?>" ></td>
												<td><input type="text" name="outstanding_eca[]" class="form-control" value=""  ></td>
												
											</tr>
												<?php //endforeach; ?>
										</tbody>
									</table>
								</div>
							</div> -->

							<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
							<div class="kt-section">
								<div class="kt-section__body">
									<h3 class="kt-section__title kt-section__title-lg">Medical/Health Records:</h3>
									
									<div class="form-group row">
										<label class="col-3 col-form-label">Chronic/hereditary disease (if any)</label>
										<div class="col-9">
											<textarea name="disease" class="form-control" type="text" ><?=$applicant_info->disease?></textarea>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-3 col-form-label">Present health problem (if any)</label>
										<div class="col-9">
											<inptextareaut name="health_problem" class="form-control" type="text" ><?=$applicant_info->health_problem?></textarea>
										</div>
									</div>
									
								</div>
							</div>


							<!-- <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
							<div class="kt-section">
								<div class="kt-section__body">
									<h3 class="kt-section__title kt-section__title-lg">Particulars of all real brothers/sisters of the pupil:</h3>
									<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
										<thead>
											<tr>
												<th>SN</th>
												<th>Brother/Sister's Name</th>
												<th>Age</th>
												<th>Name of the Institution he/she is studying in</th>												
											</tr>
										</thead>
										<tbody>
											<?php 
												// $max_sibling=5;
												// for($i=0; $i<$max_sibling; $i++):  
											?>
											<tr>
												<td><?php //echo ($i+1)?> </td>
												<td><input type="text" name="sibling_name[]" class="form-control" value="" placeholder="Name" ></td>
												<td><input type="text" name="sibling_age[]" class="form-control" value="" placeholder="Age" ></td>
												<td><input type="text" name="education_institution[]" class="form-control" value="" placeholder="Instituition name" ></td>
											</tr>
												<?php //endfor; ?>
										</tbody>
									</table>
								</div>
							</div> -->


							<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
							<div class="kt-section">
								<div class="kt-section__body">
									<h3 class="kt-section__title kt-section__title-lg">Parent/Guardian Details:</h3>
									<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
										<thead>
											<tr>
												<th>Relation</th>
												<th>Name</th>
												<th>Academic Qualificaton <br/>(inclusive of schooling & name of the school)</th>
												<th>Occupation <br/> (with Official Address and Tel No.#)</th>												
											</tr>
										</thead>
										<tbody>
											<?php 
												foreach($application->parent_info as $guardian):  
											?>
											<tr>
												<td><input type="hidden" name="relation_id[]" value="<?=$guardian->id?>"/><?=$guardian->relation?><input type="hidden" name="relation[]" value="<?=$guardian->relation?>"/></td>
												<td><input name="relative_name[]" type="text" class="form-control" value="<?=$guardian->relative_name?>" placeholder="Name" ></td>
												<td><textarea name="academic_qualification[]" class="form-control" rows="4" ><?=$guardian->academic_qualification?></textarea></td>
												<td><textarea name="occupation[]" class="form-control" rows="4"><?=$guardian->occupation?></textarea></td>									
											</tr>
												<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
							<div class="kt-section  kt-section--last">
								<div class="kt-section__body">
									<h3 class="kt-section__title kt-section__title-lg">Contact Details:</h3>
									<div class="form-group row">
										<label class="col-3 col-form-label">Phone Number</label>
										<div class="col-9">
											<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
												<input name="phone_number" type="text" class="form-control" value="<?=$applicant_info->phone_number?>" placeholder="Phone number" aria-describedby="basic-addon1">
											</div>
											<span class="form-text text-muted">Separate with a comma ( , ) if multiple numbers are listed</span>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-3 col-form-label">Mobile Number</label>
										<div class="col-9">
											<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
												<input name="mobile_number" type="text" class="form-control"  value="<?=$applicant_info->mobile_number?>" placeholder="Mobile number *" aria-describedby="basic-addon1">
											</div>
											<span class="form-text text-muted">Separate with a comma ( , ) if multiple numbers are listed</span>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-3 col-form-label">Email Address</label>
										<div class="col-9">
											<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
												<input name="email_address" type="text" class="form-control"  value="<?=$applicant_info->email_address?>" placeholder="Email address" aria-describedby="basic-addon1">
											</div>
											<span class="form-text text-muted">Separate with a comma ( , ) if multiple email addresses are listed</span>
										</div>
									</div>

									<div class="form-group  form-group-last row">
										<label class="col-3 col-form-label">Consent</label>
										<div class="col-9">
											<div class="kt-checkbox-single">
												<label class="kt-checkbox">
													<input type="checkbox" <?=$applicant_info->consent_signed==1?"checked":""?> name="consent_signed"> I agree the following terms & conditions.
													<span></span>
												</label>
											</div>										
										</div>
									</div>
									
								</div>
							</div>
							
						</div>
						
						<div class="col-xl-3">
									<div class="row">
										<label class="col-xl-12 col-form-label">Photo/Documents</label>

										<div class="col-xl-12 form-group">
											<img height="100" src="<?=base_url("uploads/$applicant_info->pp_photo")?>">
											<span class="form-text">PP size Photo</span>
											<div class="input-group">
												<input type="file" class="form-control"  name="pp_photo" >
												<input type="hidden" name="pp_photo_old" value="<?=$applicant_info->pp_photo?>" />									
											</div>
											
										</div>

										<div class="col-xl-12 form-group">
											<?php 
												$birt_cert = "uploads/$documents->birth_certificate";
												if(is_file($birt_cert)){ ?>
													<embed width="100%" src="<?=base_url($birt_cert)?>" />
											<?php } ?>
											<span class="form-text">Birth Certificate</span>
											<div class="input-group">
												<input type="file"  name="birth_certificate" class="form-control" >	
												<input type="hidden" name="birth_certificate_old" value="<?=$documents->birth_certificate?>" />								
											</div>
											
										</div>
										<div class="col-xl-12 form-group">
											<?php 
												$transfer_cert = "uploads/$documents->transfer_certificate";
												if(is_file($transfer_cert)){ ?>
													<embed  width="100%" src="<?=base_url($transfer_cert)?>"/>
											<?php } ?>
											<span class="form-text">Transfer Certificate</span>
											<div class="input-group">
												<input type="file" class="form-control"  name="transfer_certificate"  >	
												<input type="hidden" name="transfer_certificate_old" value="<?=$documents->transfer_certificate?>" />								
											</div>
											
										</div>
										<div class="col-xl-12 form-group">
											<?php 
												$last_marksheet = "uploads/$documents->last_marksheet";
												if(is_file($last_marksheet)){ ?>
													<embed  width="100%" src="<?=base_url($last_marksheet)?>"/>
											<?php } ?>
											<span class="form-text">Copy of the marksheet of last exam</span>
											<div class="input-group">
												<input type="file" class="form-control"  name="last_marksheet"  >
												<input type="hidden" name="last_marksheet_old" value="<?=$documents->last_marksheet?>" />									
											</div>
											
										</div>
										
										
									</div>
						</div>
					</div>					
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions kt-form__actions--center">
						<button type="submit" class="btn btn-brand">Update</button>
						<a type="reset" class="btn btn-secondary" href="<?=base_url("admin/applicants")?>">Cancel</a>
					</div>
				</div>	
			</div>
			<!--end:: Widgets/Order Statistics-->
		</form>	
	</div>
</div>

<!--End::App-->

