<?php							
	$applicant_info =$application->applicant_info;								
?>
<div class="form-group form-group row">
	<label class="col-3 col-form-label">Previous School</label>
	<div class="col-9">
		<div class="input-group">
			<input name="previous_school_name" type="text"  value="<?=$applicant_info->previous_school_name?>" class="form-control" placeholder="Previous School Name" >									
		</div>
	</div>
</div>

<div class="form-group form-group row">						
	<div class="col-9 offset-3">
		<div class="row">
			<div class="col-6">
				<div class="input-group">
					<input name="previous_school_address" type="text" value="<?=$applicant_info->previous_school_address?>" class="form-control" placeholder="Previous School Address" >
														
				</div>
				<span class="form-text text-muted">Previous School Address</span>
			</div>

			<div class="col-6">
				<div class="input-group">
					<input name="previous_school_phone" type="text" value="<?=$applicant_info->previous_school_phone?>" class="form-control" placeholder="Previous School Phone" >		
											
				</div>
				<span class="form-text text-muted">Previous School Phone</span>	
			</div>

			<div class="col-6">
				<div class="input-group">
					<input name="symbol_number" type="text"  value="<?=$applicant_info->symbol_number?>" class="form-control" placeholder="Symbol number" >		
											
				</div>
				<span class="form-text text-muted">Symbol number</span>	
			</div>
			<div class="col-3">
				<div class="input-group">
					<input name="score" type="text"  value="<?=$applicant_info->score?>" class="form-control" placeholder="Score (%)/GPA" >		
											
				</div>
				<span class="form-text text-muted">Score (%)/GPA</span>	
			</div>
		</div>
	</div>	
</div>

