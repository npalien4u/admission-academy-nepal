
<?php							
	$applicant_info =$application->applicant_info;	
	// print_r($applicant_info);							
?>
<?php if($enable_edit==true): ?>
<div class="form-group  row">
	
	<label class="col-3 col-form-label">Need Transportation?</label>
	<div class="col-9">		
					
		<div class="kt-radio-inline">
			<label class="kt-radio">
				<input name="need_transportation" type="radio" value="1" <?=$applicant_info->need_transporation==1?"checked":""?> > Yes
				<span></span>
			</label>
			<label class="kt-radio">
				<input type="radio" name="need_transportation" value="0" <?=$applicant_info->need_transporation==0?"checked":""?>> No
				<span></span>
			</label>
		
		</div>
		

		<?php //if($applicant_info->need_transporation==1) { ?>
			<div class="form-group input-group row">
				<label class="col-2 col-form-label">Pickup Location</label>
				<div class="col-6">
					<input  name="bus_stop_pick" type="text" class="form-control" value="<?=$applicant_info->bus_stop_pick?>" placeholder="Pickup station for transportation" >									
				</div>
			</div>
		
		
			<div class="form-group-last input-group row">
				<label class="col-2 col-form-label">Drop Location</label>
				<div class="col-6">
					<input  name="bus_stop_drop" type="text" class="form-control"  value="<?=$applicant_info->bus_stop_drop?>" placeholder="Drop station for transportation" >									
				</div>
			</div>
		<?php //} ?>
					
		
	</div>



</div>





<?php endif; ?>
<?php if($enable_edit==false): ?>
	<div class="form-group  row">
	
		<label class="col-3 col-form-label">Need Transportation?</label>
		<label class="col-9 col-data-label"><?=$applicant_info->need_transporation==1?"Yes":"No"?></label>

		<?php if($applicant_info->need_transporation==1) { ?>
			<label class="col-9 offset-3 col-data-label"><strong>Pickup location: </strong><?=$applicant_info->bus_stop_pick?></label>
			<label class="col-9 offset-3 col-data-label"><strong>Drop location: </strong><?=$applicant_info->bus_stop_drop?></label>
		<?php } ?>

	</div>
<?php endif; ?>
