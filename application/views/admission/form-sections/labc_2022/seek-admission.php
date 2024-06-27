<?php 
	$faculties = array("Science", "Management");
	//$elective_subjects=array("Hotel Management", "Travel & Tourism", "Computer Science", "Business Studies");	
?>
<div class="form-group row">
	<label class="col-3 col-form-label">Stream/Faculty</label>
	<div class="col-9">	
		<div class="row">			
				

			<div class="col-6 form-group-sub">				
				<select class="form-control" name="admission_faculty" >
					<option value="">Select</option>
					<?php  foreach($faculties  as $faculty): ?>
						<option value="<?=$faculty?>"><?=$faculty?></option>
					<?php endforeach; ?>
					
				</select>
				<span class="form-text text-muted">Group/Stream</span>
			</div>			
		</div>
	</div>
</div>
