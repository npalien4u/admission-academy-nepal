
<!--begin::Portlet-->
<div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
	<form class="kt-form" id="kt_form_1" method="post" action="<?=base_url("AdmissionForm/sumbit")?>" enctype="multipart/form-data" data-validate-user="<?=base_url("AdmissionForm/CheckUsername")?>">	
		<div class="kt-portlet__head kt-portlet__head--lg">
			<div class="kt-portlet__head-label">
				<h3 class="kt-portlet__head-title">
				<?=@$consent_text->form_title?$consent_text->form_title:"Online Inquiry Form"; ?>
				 </h3>
			</div>		
		</div>
		
		<div class="kt-portlet__body">											
			
			<div class="row">
				
				<div class="col-12 col-md-6 col-xl-6 offset-md-1 offset-xl-1">
					

							<?php 
								foreach($sections as $section){
									if($section!=null){
										$viewfile = realpath(VIEWPATH."admission/form-sections/{$section}.php");								

										if(file_exists( $viewfile) ){
										   echo $this->load->view("admission/form-sections/$section",null, true);
									   }else{										   
										   echo "undefined section: $section";
									   }
									}else{
										echo "undefined section";
									}							
									
								}
							?>


<div class="kt-portlet__foot">
			<div class="kt-form__actions kt-form__actions--center">			
				<button type="submit" class="btn btn-brand">Submit</button>
				<!-- <button type="reset" class="btn btn-secondary">Cancel</button> -->
			</div>
		</div>	
				</div>
				<?php if($this->session->userdata("tenant")->banner!=""){ ?>
					<div class="col-12 col-md-5 col-xl-5 hidden-sm">
						<a target="_blank" href="<?=$this->session->userdata("tenant")->website?>"><img src="uploads/tenants/<?=$this->session->userdata("tenant")->banner?>" style="width:100%"></a>
					</div>
				<?php } ?>
			</div>
		</div>

		
	</form>
</div>
<!--end::Portlet-->
