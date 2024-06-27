<!--Begin::App-->

<div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app" id="kt_app">

	<?php echo $this->load->view("admin/includes/sidebar","",true)?>	

	<div class="kt-grid__item kt-grid__item--fluid kt-app__content">

		<form class="kt-form" id="kt_form_settings" method="post" action="<?=base_url("admin/settings")?>" enctype="multipart/form-data" >
			<input type="hidden" name="section" value="profile"/>		
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

								<div class="form-group row">
										<label class="col-3 col-form-label">Domain name</label>
										<div class="col-9">
											<div class="input-group">
												<label  class="col-form-label" ><?=@$tenant->domain?></label>									
											</div>
											<!-- <span class="form-text text-muted">Click <a href="#">here</a> to change the preferred domain</span> -->
										</div>										
									</div>
									
									<div class="form-group row">
										<label class="col-3 col-form-label">Institution Name</label>
										<div class="col-9">
											<input name="name" class="form-control" type="text" value="<?=@$tenant->name?>" placeholder="Institution name">											
										</div>
																		
									</div>
									<div class="form-group row">
										<label class="col-3 col-form-label">Address</label>
										<div class="col-9">
											<div class="input-group">
												<textarea name="address" type="text" class="form-control" placeholder="Address"><?=@$tenant->address?></textarea>									
											</div>											
										</div>										
									</div>

									<div class="form-group row">
										<label class="col-3 col-form-label">Phone</label>
										<div class="col-9">
											<div class="input-group">
												<input name="phone" type="text" class="form-control" placeholder="(977) 00 xxx xxxx "  value="<?=@$tenant->phone?>">									
											</div>
											<span class="form-text text-muted">Separate multiple number by comma</span>
										</div>										
									</div>
									
									<div class="form-group row">
										<label class="col-3 col-form-label">Email</label>
										<div class="col-9">
											<div class="input-group">
												<input name="email" type="text" class="form-control" placeholder="email@yourdomain.com"  value="<?=@$tenant->email?>">									
											</div>
											<span class="form-text text-muted">Separate multiple emails by comma</span>
										</div>										
									</div>

									<div class="form-group row">
										<label class="col-3 col-form-label">Website</label>
										<div class="col-9">
											<div class="input-group">
												<input name="website" type="text" class="form-control" placeholder="https://www.yourwebsite.com"  value="<?=@$tenant->website?>">									
											</div>											
										</div>										
									</div>









									<hr/>
									<h3 class="kt-section__title kt-section__title-lg">Login Details:</h3>
									<div class="form-group row">
										<label class="col-3 col-form-label">Login email:</label>
										<div class="col-9">
											<div class="input-group">
												<label class="col-form-label" name="login_name" ><?=@$tenant->login_name?></label>									
											</div>
											
										</div>										
									</div>

									<div class="form-group row">
										<label class="col-3 col-form-label">Password</label>
										<div class="col-6">
											<div class="input-group">
												<input name="password" type="text" class="form-control" placeholder="Change password. Leave blank to keep current password" >									
											</div>											
										</div>										
									</div>

									<div class="form-group row">
										<label class="col-3 col-form-label">Confirm password</label>
										<div class="col-6">
											<div class="input-group">
												<input name="confirm_password" type="text" class="form-control" placeholder="Confirm pasword">									
											</div>											
										</div>										
									</div>




									
								</div>
							</div>
						</div>
						<div class="col-3">
							<div class="row">
								<label class="col-12 col-form-label">Logo</label>
								<div class="col-12">
									<img height="100" src="<?=base_url("uploads/tenants/$tenant->logo")?>">
								</div>
								<div class="col-12 form-group">
									
									<span class="form-text">Upload new logo</span>
									<div class="input-group">
										<input type="file" class="form-control"  name="logo" >
										<input type="hidden" name="logo_old" value="<?=@$tenant->logo?>" />									
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
		</form>	
		
	</div>
</div>

<!--End::App-->
