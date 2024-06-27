<?php							
	$applicant_info =$application->applicant_info;	
	// print_r($applicant_info);							
?>
<?php if($enable_edit==true): ?>
<div class="form-group form-group row">
	<label class="col-3 col-form-label">Class Shift</label>
	<div class="col-9">
		
			<?php $source_of_information=array(
				array("id"=>1, "code"=>"morning", "name"=>"Morning"),
				array("id"=>2, "code"=>"day", "name"=>"Day")
			)
			?>

			<div class="kt-radio-inline">
				<?php foreach($source_of_information as $sc){ ?>
					<label class="kt-radio">
						<input type="radio" name="class_shift" value="<?=$sc["code"]?>" <?=$applicant_info->class_shift==$sc["code"]?"checked":""?> > <?=$sc["name"]?>
						<span></span>
					</label>
				<?php } ?>	
			</div>
		
	</div>		
</div>



<?php endif; ?>
<?php if($enable_edit==false): ?>
	<div class="form-group  row">
	
	<label class="col-3 col-form-label">Class Shift</label>
	<label class="col-9 col-data-label"><?=$applicant_info->class_shift?></label>


	

</div>
<?php endif; ?>
