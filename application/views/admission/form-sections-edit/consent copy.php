<div class="form-group  form-group-last row">
	<?php 
		$statement ="I agree the following terms & conditions. ";
		$title = "INCASE THE PUPIL IS ADMITTED IN ".strtoupper($this->session->userdata["tenant"]->name);
		$body = "<p>I do understand that the programming and philosophy of Education of ".$this->session->userdata["tenant"]->name." is to lay great deal
		of stress on sports and games and excursions, and other co-curricular activities which involve some amount of
		risk. I as a parent will fully co-operate with the school in this direction.</p><p>
		I certify that l am a bona fide guardian of the pupil and the information furnished above is correct to the best
		of my knowledge. In the event of my ward being admitted to the school. I will abide by the school’s rules and
		procedures in all respects. I do understand that the decision of the principal shall be final and binding on me.</p>";

		if($consent_text!=null){
			$title = $consent_text->title;
			$body = $consent_text->body;
			$statement = $consent_text->statement;
		}
	?>
	
	<div class="col-9 offset-3">
		<div class="kt-checkbox-single">
			<label class="kt-checkbox">
				<input type="checkbox" name="consent_signed"> <?=$statement?>
				<span></span>
			</label>
		</div>
		<div class="kt-portlet kt-portlet--skin-solid kt-portlet-- kt-bg-brand">
				<?php if($title){ ?>
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<span class="kt-portlet__head-icon">
							<i class="flaticon-notes"></i>
						</span>
						
						<h3 class="kt-portlet__head-title"><?=$title?></h3>
					</div>
					
				</div>
				<?php }?>
				<div class="kt-portlet__body">
					<?=$body?>
				</div>
			</div>
		</div>
	</div>			

</div>
