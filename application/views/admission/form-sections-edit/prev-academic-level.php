<?php							
	$applicant_info =$application->applicant_info;								
?>
<?php if($enable_edit==true): ?>

<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
<div class="kt-section">
	<div class="kt-section__body">
		

<div class="form-group form-group row">
	<label class="col-3 col-form-label">+2/12 Passed in</label>
	<div class="col-9">
		
	<?php $source_of_information=array(
				array("id"=>1, "code"=>"science", "name"=>"Science"),
				array("id"=>2, "code"=>"humanaities", "name"=>"Humanaities"),
				array("id"=>3, "code"=>"other", "name"=>"Other"),
			)
			?>

			<div class="kt-radio-inline">
				<?php foreach($source_of_information as $sc){ ?>
					<label class="kt-radio">
						<input type="radio" name="prev_academic_level" value="<?=$sc["code"]?>" <?=$applicant_info->prev_academic_level==$sc["code"]?"checked":""?>> <?=$sc["name"]?>
						<span></span>
					</label>
				<?php } ?>	
			</div>
	</div>		
</div>
	</div>
</div>


<?php endif; ?>
<?php if($enable_edit==false): ?>
	<div class="row">
		<label class="col-3 col-form-label">+2/12 Passed in</label>							
		<label class="col-9 col-data-label"><?=$applicant_info->first_name?> <?=$applicant_info->middle_name?> <?=$applicant_info->last_name?></label>																						
	</div>
<?php endif; ?>

