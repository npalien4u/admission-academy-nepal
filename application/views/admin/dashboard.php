<!--Begin::App-->
<style>
	.round_image{
		width: 3.2rem;
    	border-radius: 50%;
	}
</style>
<div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app" id="kt_app">

	<?php echo $this->load->view("admin/includes/sidebar","",true)?>	

	<div class="kt-grid__item kt-grid__item--fluid kt-app__content">

		<!--begin:: Widgets/Order Statistics-->
		<div class="kt-portlet" >
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title"> 
						<?=@$view_title?>
					</h3>
					
				</div>
				<div class="kt-portlet__head-toolbar">
					<div class="row">
						<label class="col-8">Academic Session</label>
						<div class="col-4">
							<select data-url="<?=base_url("admin/applicants/")?>" class="form-control" id="opt_admission_year">1
							<option>2023</option>
								<option>2022</option>
								<option>2021</option>
								<option>2020</option>
							</select>
						</div>
					</div>
					
				</div>
				
			</div>
			<div class="kt-portlet__body ">				
				<!--begin: Datatable -->
				<table class="table table-striped- table-bordered table-hover table-checkable"  id="table_applications"
					data-source="<?=base_url("admin/applicants_list")?>">
					<thead>
						<tr>						
							<th>SN</th>
							<th></th>
							<th>First name</th>
							<th>Last name</th>
							<th>Grade</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Date</th>
							<th>Actions</th>
						</tr>
						<?php foreach($applicants as $sn=>$applicant) {?>
							<tr>						
								<td><?=($sn+$offset+1)?></td>
								<td>								 	
									<img  class="round_image"  src="<?=base_url("uploads/$applicant->pp_photo")?>" alt="">																		
								</td>
								<td><?=$applicant->first_name?></td>
								<td><?=$applicant->last_name?></td>
								<td>
									<?php 
										$grade = $applicant->admission_grade;
											if($applicant->faculty){
												$grade .= " - $applicant->faculty";
											}
										echo $grade;
									?> 
								</td>
								<td><?=@$applicant->parent_info->phone?></td>
								<td><?=@$applicant->parent_info->email?></td>
								<td><?=@$applicant->date_submitted==""?"":date("Y-m-d", strtotime($applicant->date_submitted))?></td>
								<td>
									<span class="dropdown">
										<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
										<i class="la la-ellipsis-h"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right">
											<?php if($applicant->status!=3){	?>
												<a class="dropdown-item" href="<?=base_url("admin/applicant/edit/$applicant->id")?>"><i class="la la-edit"></i> Update Details</a>											
												<!-- <a class="dropdown-item" href="#"><i class="la la-print"></i> Download Pdf</a> -->
												<div class="dropdown-divider"></div>
											<?php } ?>

											<?php if($applicant->status==1){												
												echo "<a class='dropdown-item kt-font-info ajax-action' data-confirm-message='Are you sure you want to archive this application?' href='".base_url("admin/applicant/archive/$applicant->id")."'><i class='la la-archive'></i> Archive</a>";
												echo "<a class='dropdown-item kt-font-danger ajax-action' data-confirm-message='Are you sure you want to trash this application?' href='".base_url("admin/applicant/trash/$applicant->id")."'><i class='la la-trash'></i> Trash</a>";
											}else{
												echo "<a class='dropdown-item kt-font-success ajax-action' data-confirm-message='Are you sure you want to activate this application?' href='".base_url("admin/applicant/activate/$applicant->id")."'><i class='la la-check'></i> Activate</a>";
												if($applicant->status==3){												
													echo "<a class='dropdown-item kt-font-danger ajax-action' data-confirm-message='Are you sure you want to delete this application?' href='".base_url("admin/applicant/purge/$applicant->id")."'><i class='la la-trash'></i> Delete</a>";
												}else{
													echo "<a class='dropdown-item kt-font-danger ajax-action' data-confirm-message='Are you sure you want to trash this application?' href='".base_url("admin/applicant/trash/$applicant->id")."'><i class='la la-trash'></i> Trash</a>";
												}
											}
											?>											
										</div>
									</span>

									<a href="<?=base_url("admin/applicant/view/$applicant->id")?>" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
									<i class="la la-eye"></i>
									</a
								></td>
							</tr>
						 <?php } ?> <!--//end foreach -->
					</thead>
				</table>

				
				<?=$links?>
				

				<!--end: Datatable -->
			</div>
		</div>
		<!--end:: Widgets/Order Statistics-->			
		
	</div>
</div>

<!--End::App-->
