<?php	
	$applicant_info =$application->applicant_info;	 
	$address = array_filter($application->contact_detail, function($val){
			return $val->contact_type=="permanent";
	}, ARRAY_FILTER_USE_BOTH);
	$address = reset($address);
?>

<?php if($enable_edit==true): ?>

<div class="kt-section">
	<div class="kt-section__body">
		<h3 class="kt-section__title kt-section__title-lg">Permanent Address:</h3>

		<input  type="hidden" name="p_contact_id" type="text" class="form-control" value="<?=$address->id?>">

		<div class="form-group row">		
			<div class="col-4">
				<div class="input-group">					
					<input name="p_state" type="text" class="form-control" value="<?=$address->state?>" placeholder="State">
				</div>
				<span class="form-text text-muted">State/Province</span>
			</div>
			<div class="col-4">
				<div class="input-group">				
					<input name="p_district" type="text" class="form-control" value="<?=$address->district?>" placeholder="District" >
				</div>
				<span class="form-text text-muted">District</span>
			</div>
			<div class="col-4">
				<div class="input-group">					
					<input name="p_city_vdc" type="text" class="form-control" value="<?=$address->city_vdc?>" placeholder="Rural/Municipality/Sub Metropolitan/Metropolitan/" >
				</div>
				<span class="form-text text-muted">Rural/Municipality/Sub Metropolitan/Metropolitan/</span>
			</div>
			
		</div>
		<div class="form-group row">		
			<div class="col-6">
				<div class="input-group">					
					<input name="p_address1" type="text" class="form-control" value="<?=$address->address1?>" placeholder="Address1 (Street, Ward no)`">
				</div>
				<span class="form-text text-muted">Address1 (Street, Ward no)</span>
			</div>
			<div class="col-6">
				<div class="input-group">				
					<input name="p_address2" type="text" class="form-control" value="<?=$address->address2?>" placeholder="Address2 (Additional Details)" >
				</div>
				<span class="form-text text-muted">Address2 (Additional Details)</span>
			</div>			
		</div>
	</div>
</div>



<?php endif; ?>


<?php if($enable_edit==false): ?>			

	<div class="form-group  row">
		<label class="col-3 col-form-label">Permanent Address:</label>									
		<label class="col-9 col-data-label"><?=@$address->state?></label>																						
		<label class="col-9 offset-3 col-data-label"><?=@$address->district?> </label>																						
		<label class="col-9 offset-3 col-data-label"><?=@$address->city_vdc?> </label>																						
		<label class="col-9 offset-3 col-data-label"><?=@$address->address1?> </label>	
		<label class="col-9 offset-3 col-data-label"><?=@$address->address2?> </label>																						
	</div>
	
<?php endif; ?>
