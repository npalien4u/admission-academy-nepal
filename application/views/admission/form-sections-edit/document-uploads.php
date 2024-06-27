<?php							
	$applicant_info =$application->applicant_info;								
	$documents = json_decode($applicant_info->documents);		
	
	
?>
<?php if($enable_edit==true): ?>
<div class="row">
	<label class="col-xl-12 col-form-label">Photo/Documents</label>

	<div class="col-xl-12 form-group">
		<img height="100" src="<?=base_url("uploads/$applicant_info->pp_photo")?>">
		<span class="form-text">PP size Photo (Optional)</span>
		<div class="input-group">
			<input type="file" class="form-control"  name="pp_photo" >
			<input type="hidden" name="pp_photo_old" value="<?=$applicant_info->pp_photo?>" />									
		</div>
		
	</div>

	<div class="col-xl-12 form-group">
		<?php 
			$birt_cert = "uploads/$documents->birth_certificate";
			if(is_file($birt_cert)){ ?>
				<embed width="100%" src="<?=base_url($birt_cert)?>" />
		<?php } ?>
		<span class="form-text">Birth Certificate (Optional)</span>
		<div class="input-group">
			<input type="file"  name="birth_certificate" class="form-control" >	
			<input type="hidden" name="birth_certificate_old" value="<?=$documents->birth_certificate?>" />								
		</div>
		
	</div>
	<div class="col-xl-12 form-group">
		<?php 
			$transfer_cert = "uploads/$documents->transfer_certificate";
			if(is_file($transfer_cert)){ ?>
				<embed  width="100%" src="<?=base_url($transfer_cert)?>"/>
		<?php } ?>
		<span class="form-text">Transfer Certificate (Optional)</span>
		<div class="input-group">
			<input type="file" class="form-control"  name="transfer_certificate"  >	
			<input type="hidden" name="transfer_certificate_old" value="<?=$documents->transfer_certificate?>" />								
		</div>
		
	</div>
	<div class="col-xl-12 form-group">
		<?php 
			$last_marksheet = "uploads/$documents->last_marksheet";
			if(is_file($last_marksheet)){ ?>
				<embed  width="100%" src="<?=base_url($last_marksheet)?>"/>
		<?php } ?>
		<span class="form-text">Copy of the marksheet of last exam (Optional)</span>
		<div class="input-group">
			<input type="file" class="form-control"  name="last_marksheet"  >
			<input type="hidden" name="last_marksheet_old" value="<?=$documents->last_marksheet?>" />									
		</div>
		
	</div>
	
	
</div>



<?php endif; ?>
<?php if($enable_edit==false): ?>
	<div class="row">
	<label class="col-xl-12 col-form-label">Photo/Documents</label>

	<div class="col-xl-12 form-group">
		<img height="100" src="<?=base_url("uploads/$applicant_info->pp_photo")?>">
		
		
	</div>

	<div class="col-xl-12 form-group">
		<?php 
			$birt_cert = "uploads/$documents->birth_certificate";
			if(is_file($birt_cert)){ ?>
				<embed width="100%" src="<?=base_url($birt_cert)?>" />
		<?php } ?>
		
		
	</div>
	<div class="col-xl-12 form-group">
		<?php 
			$transfer_cert = "uploads/$documents->transfer_certificate";
			if(is_file($transfer_cert)){ ?>
				<embed  width="100%" src="<?=base_url($transfer_cert)?>"/>
		<?php } ?>
		
		
	</div>
	<div class="col-xl-12 form-group">
		<?php 
			$last_marksheet = "uploads/$documents->last_marksheet";
			if(is_file($last_marksheet)){ ?>
				<embed  width="100%" src="<?=base_url($last_marksheet)?>"/>
		<?php } ?>
		
	</div>
	
	
</div>
<?php endif; ?>
