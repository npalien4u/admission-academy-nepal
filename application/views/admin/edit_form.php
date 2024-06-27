<?php	  $applicant_info =$application->applicant_info;	 ?>
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
						<div class="col-md-9">							
							
										<?php 
											foreach($sections as $section)
											{
												//echo $section.", ";
												if($section!=null )
												{
													if($section!="document-uploads" && $section!="login-account" ){
														$viewfile = realpath(VIEWPATH."admission/form-sections-edit/{$section}.php");
														if(file_exists( $viewfile) )
														{
															echo $this->load->view("admission/form-sections-edit/$section",array("application"=>$application, "enable_edit"=>$application->enable_edit), true);
														}												
													}
												}else{
													echo "Undefined section";
												}
											}
										?>
							
						</div>
						<div class="col-md-3">
							<?php 
								if(in_array("document-uploads", $sections)){
									echo $this->load->view("admission/form-sections-edit/document-uploads",array("application"=>$application, "enable_edit"=>$application->enable_edit), true);
								}
							?>
						</div>
					</div>
				</div>
				
				<?php if($application->enable_edit==true): ?> 
				<div class="kt-portlet__foot">
					<div class="kt-form__actions kt-form__actions--center">
						<button type="submit" class="btn btn-brand">Update</button>
						<a type="reset" class="btn btn-secondary" href="<?=base_url("admin/applicants")?>">Cancel</a>
					</div>
				</div>	
				<?php endif; ?>
			</div>
			<!--end:: Widgets/Order Statistics-->
		</form>	
	</div>
</div>

<!--End::App-->

