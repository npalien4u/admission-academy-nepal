<!--Begin::App-->

<?php							
	$applicant_info =$application->applicant_info;							
	$documents = json_decode($applicant_info->documents);							
?>

<div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app" id="kt_app">

	<?php echo $this->load->view("admin/includes/sidebar","",true)?>	

	<div class="kt-grid__item kt-grid__item--fluid kt-app__content">

		
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
					<div class="col-9">							
						<div class="kt-section kt-section--first">
							<div class="kt-section__body">
								<h3 class="kt-section__title kt-section__title-lg">Student Info:</h3>
								<div class="row">
									<label class="col-3 col-form-label">Name</label>									
									<label class="col-9 col-data-label"><?=$applicant_info->first_name?> <?=$applicant_info->middle_name?> <?=$applicant_info->last_name?></label>																						
								</div>
								<div class="row">										
									<label class="col-3 col-form-label">Date of Birth</label>
									<div class="col-9">								
										<div class="row">
											<label class="col-xl-12 col-data-label"><?=$applicant_info->dob_bs?> (वि.सं.)</label>
											<label class="col-xl-12 col-data-label"><?=$applicant_info->dob_ad?> (A.D.)</label>																																																	
										</div>										
									</div>
								</div>
								<div class="row">
									<label class="col-3 col-form-label">Gender</label>
									<label class="col-9 col-data-label"><?=$applicant_info->gender?></label>																																																									
								</div>

								<div class="row">
									<label class="col-3 col-form-label">Seeking Admission In</label>
									<label class="col-9 col-data-label"><?=$applicant_info->admission_grade?></label>	
								</div>

								<div class="row">
									<label class="col-3 col-form-label">Previous School</label>
									<label class="col-9 col-data-label"><?=$applicant_info->previous_school_name?></label>										
								</div>

								<div class="row">																
									<label class="col-9 offset-3 col-data-label"><?=implode(", ",array($applicant_info->previous_school_address, $applicant_info->previous_school_phone))?></label>																					
								</div>

								<div class="row">
									<label class="col-3 col-form-label">Hobbies & Intersts</label>									
									<div class="col-9">
										<div class="row">
											<div class="col-xl-6">
												<div class="kt-widget24">
													<div class="kt-widget24__details">
														<div class="kt-widget24__info">
															<h4 class="kt-widget24__title">
																Hobbies
															</h4>
															<span class="kt-widget24__desc">
																<?=$applicant_info->hobbies?>
															</span>
														</div>													
													</div>												
												</div>
											
											</div>
											<div class="col-xl-6">
											<div class="kt-widget24">
													<div class="kt-widget24__details">
														<div class="kt-widget24__info">
															<h4 class="kt-widget24__title">
																Interests
															</h4>
															<span class="kt-widget24__desc">
																<?=$applicant_info->interests?>
															</span>
														</div>													
													</div>												
												</div>
											</div>
										</div>
										
									</div>
									
								</div>

								<div class="row">
									<label class="col-3 col-form-label">Nationality</label>
									<label class="col-9 col-data-label"><?=$applicant_info->nationality?></label>	
								</div>

								<div class="row">
									<label class="col-3 col-form-label">Mother Tongue</label>
									<label class="col-9 col-data-label"><?=$applicant_info->mother_tongue?></label>	
								</div>

								<div class="row">
									<label class="col-3 col-form-label">Bus Stop</label>
									<label class="col-9 col-data-label"><?=$applicant_info->bus_stop?></label>
								</div>
							</div>
						</div>

						<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
						<div class="kt-section">
							<div class="kt-section__body">
								<h3 class="kt-section__title kt-section__title-lg">Medical/Health Records:</h3>
								
								<div class="row">
									<label class="col-5 col-form-label">Chronic/hereditary disease (if any)</label>
									<label class="col-7 col-data-label"><?=$applicant_info->disease?></label>
									
								</div>
								<div class="row">
									<label class="col-5 col-form-label">Present health problem (if any)</label>
									<label class="col-7 col-data-label"><?=$applicant_info->health_problem?></label>									
								</div>
								
							</div>
						</div>

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
											//$relations = array("Father", "Mother", "Local Guardian");												
											foreach($application->parent_info as $guardian):  
										?>
											<tr>
												<td><?=$guardian->relation?></td>
												<td><?=$guardian->relative_name?></td>
												<td><?=$guardian->academic_qualification?></td>
												<td><?=$guardian->occupation?></td>									
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
								<div class="row">
									<label class="col-3 col-form-label">Phone Number</label>
									<label class="col-8 col-data-label"><?=$applicant_info->phone_number?></label>	
									
								</div>

								<div class="row">
									<label class="col-3 col-form-label">Mobile Number</label>
									<label class="col-8 col-data-label"><?=$applicant_info->mobile_number?></label>	
									
								</div>
								<div class="row">
									<label class="col-3 col-form-label">Email Address</label>
									<label class="col-8 col-data-label"><?=$applicant_info->email_address?></label>	
									
								</div>

								<div class=" form-group-last row">
									<label class="col-3 col-form-label">Consent Signed</label>
									<i class="<?=$applicant_info->consent_signed==1?"flaticon2-accept":"flaticon2-delete"?>"></i>									
								</div>
								
							</div>
						</div>
						
					</div>
					
					<div class="col-3">
						<div class="row">
							<label class="col-xl-12 col-form-label">Photo/Documents</label>

							<div class="col-xl-12 form-group">
								<img height="100" src="<?=base_url("uploads/$applicant_info->pp_photo")?>">
								<span class="form-text">PP size Photo</span>
								<div class="input-group">
									<label class="col-xl-12 col-form-label  name="pp_photo" >
									
								</div>
								
							</div>

							<div class="col-xl-12 form-group">
								<?php 
									$birt_cert = "uploads/$documents->birth_certificate";
									if(is_file($birt_cert)){ ?>
										<embed width="100%" src="<?=base_url($birt_cert)?>" />
								<?php } ?>
								<span class="form-text">Birth Certificate</span>
								
								
							</div>
							<div class="col-xl-12 form-group">
								<?php 
									$transfer_cert = "uploads/$documents->transfer_certificate";
									if(is_file($transfer_cert)){ ?>
										<embed  width="100%" src="<?=base_url($transfer_cert)?>"/>
								<?php } ?>
								<span class="form-text">Transfer Certificate</span>
								
								
							</div>
							<div class="col-xl-12 form-group">
								<?php 
									$last_marksheet = "uploads/$documents->last_marksheet";
									if(is_file($last_marksheet)){ ?>
										<embed  width="100%" src="<?=base_url($last_marksheet)?>"/>
								<?php } ?>
								<span class="form-text">Copy of the marksheet of last exam</span>
																
							</div>								
							
						</div>					
					</div>
				</div>	
			</div>
		</div>


		
	</div>
</div>

<!--End::App-->
