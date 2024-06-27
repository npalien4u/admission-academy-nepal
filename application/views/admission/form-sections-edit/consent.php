<?php							
	$applicant_info =$application->applicant_info;	
	

	$statement ="I agree to abide by the rules and regulations of ".strtoupper($this->session->userdata["tenant"]->name);
	$title = "IN CASE THE PUPIL IS ADMITTED IN ".strtoupper($this->session->userdata["tenant"]->name);
	$body = "<p>I do understand that the programming and philosophy of Education of ".$this->session->userdata["tenant"]->name." is to lay great deal
	of stress on sports and games and excursions, and other co-curricular activities which involve some amount of
	risk. I as a parent will fully co-operate with the school in this direction.</p><p>
	I certify that l am a bona fide guardian of the pupil and the information furnished above is correct to the best
	of my knowledge. In the event of my ward being admitted to the school. I will abide by the school’s rules and
	procedures in all respects. I do understand that the decision of the principal shall be final and binding on me.</p>";

	if($consent_text!=null){
		$title = $consent_text->title!=""?$consent_text->title:$title;
		$body = $consent_text->body!=""?$consent_text->body:$body;
		$statement = $consent_text->statement!=""?$consent_text->statement:$statement;
	}
?>
<?php if($enable_edit==true): ?>
<div class="form-group  form-group-last row">

	
	<div class="col-9 offset-3">
		
	





		
		<div class="kt-section  kt-section--last">
		<div class="kt-section__body">
		<h3 class="kt-section__title kt-section__title-lg"><?=$title?></h3>
			<div class="form-group row">			
				<div class="col-12">				
					<div class="kt-portlet- kt-portlet--skin-solid kt-portlet-- kt-bg-brand-">				
						<div class="kt-portlet__body-">
							<?=$body?>
						</div>
					</div>
					<div class="kt-checkbox-single">
						<label class="kt-checkbox">
							<input type="checkbox" name="consent_signed" <?=$applicant_info->consent_signed=="1"?"checked":""?>> <?=$statement?>
							<span></span>
						</label>
					</div>				
				</div>				
			</div>
		</div>
	</div>
	</div>	



	

</div>



<?php endif; ?>
<?php if($enable_edit==false): ?>
	<div class="form-group form-group row">
	<label class="col-3 col-form-label">Consent Signed</label>
	<label class="col-9 col-data-label"><?=$applicant_info->consent_signed=="1"?"Yes":"No"?></label>	
	
</div>
<?php endif; ?>
