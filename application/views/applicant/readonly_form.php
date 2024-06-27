<!--Begin::App-->

<?php							
	$applicant_info =$application->applicant_info;							
	$documents = json_decode($applicant_info->documents);							
?>

<div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app" id="kt_app">

	<?php echo $this->load->view("applicant/includes/sidebar","",true)?>	

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
		</div>		
	</div>
</div>

<!--End::App-->
