<?php
	$faculties =array("Law",  
		"Management (Computer Science)",
		"Management (Hotel Management)",
		"Management (Travel & Tourism)",
		"Management (Business Studies)",
		"Humanities (English)",
		"Humanities (Pshychology)",
		"Humanities (Sociology)",
		"Humanities (Rural Development)",
		"Humanities (Journalism)"
	);
?>
<div class="kt-section kt-section--first">
	<div class="kt-section__body">

		<div class="form-group row">
			<label class="col-3 col-form-label">Seeking Admission In</label>
			<div class="col-9">								
				
				<div class="row">
				<div class="col-lg-4 form-group-sub">
						<label class="form-control-label">* Grade/Level:</label>
						<select class="form-control" name="admission_grade" >
							<option value="">Select</option>
							<?php 
								
								foreach($open_grades  as $grade):
							?>
								<option value="<?=$grade->grade_name?>"><?=$grade->grade_name?></option>
							<?php endforeach; ?>
							
						</select>
					</div>
					<div class="col-lg-5 form-group-sub">
						<label class="form-control-label">* Admission Sought for:</label>
						<select class="form-control" name="admission_faculty" >
							<option value="">Select</option>
							<?php 
								
								foreach($faculties  as $faculty):
							?>
								<option value="<?=$faculty?>"><?=$faculty?></option>
							<?php endforeach; ?>
							
						</select>
					</div>

				</div>
			</div>									
			
		</div>

	</div>
</div>
