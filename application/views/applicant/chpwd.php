<!--Begin::App-->


<div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app" id="kt_app">

	<?php echo $this->load->view("applicant/includes/sidebar","",true)?>	

	<div class="kt-grid__item kt-grid__item--fluid kt-app__content">

		<!--begin::Portlet-->
		<div class="kt-portlet kt-portlet--tabs">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title"> <?=@$view_title?> </h3>

													
				</div>
				
			</div>
			<div class="kt-portlet__body">
					<?php if($show_success){ ?>
					<div class="alert alert-solid-success alert-bold" role="alert">
						<div class="alert-text">Password changed successfully.</div>
					</div>
					<?php } ?>

				
					
				
						<form class="kt-form" id="kt_form_password" method="post" action="<?=base_url("applicant/change_pwd")?>" enctype="multipart/form-data" >
							<input type="hidden" name="section" value="login"/>		
								<div class="col-6">						
									<div class="row">
										<div class="col-12">
											<div class="kt-section kt-section--first">
												<div class="kt-section__body">

													
													<div class="form-group row">
														<label class="col-3 col-form-label">Username:</label>
														<div class="col-9">
															<div class="input-group">
																<label class="col-form-label" name="username" ><?=$user->username?></label>									
															</div>
															
														</div>										
													</div>

													<div class="form-group row">
														<label class="col-3 col-form-label">Password</label>
														<div class="col-6">
															<div class="input-group">
																<input id="password" name="password" type="text" class="form-control" placeholder="Change password. Leave blank to keep current password" >									
															</div>											
														</div>										
													</div>

													<div class="form-group row">
														<label class="col-3 col-form-label">Confirm password</label>
														<div class="col-6">
															<div class="input-group">
																<input id="confirm_password" name="confirm_password" type="text" class="form-control" placeholder="Confirm pasword">									
															</div>											
														</div>										
													</div>
													
												</div>
											</div>
										</div>		
									</div>
									<div class="kt-form__actions kt-form__actions--center">
										<button type="submit" class="btn btn-brand">Change Password</button>	
									</div>
								</div>
								
						</form>	
					
					
				
			</div>
		</div>

		<!--end::Portlet-->

	
		
	</div>
</div>

<!--End::App-->
<script type="text/javascript">
	$(document).ready(function(){
		$(".nav-link").click(function(){
			$(".alert-solid-success").hide();
		});
	});
</script>
