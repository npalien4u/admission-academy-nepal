<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
<div class="kt-section">
	<div class="kt-section__body">		

		<div class="form-group form-group row">
			<label class="col-3 col-form-label">+2/12 Passed in</label>
			<div class="col-9">
			
				<?php $source_of_information=array(
					array("id"=>1, "code"=>"management", "name"=>"Management"),					
					array("id"=>3, "code"=>"science", "name"=>"Science"),
					array("id"=>4, "code"=>"law", "name"=>"Law"),
					array("id"=>2, "code"=>"humanaities", "name"=>"Humanaities"),
					array("id"=>5, "code"=>"other", "name"=>"Other"),
				)
				?>

				<div class="kt-radio-inline">
					<?php foreach($source_of_information as $sc){ ?>
						<label class="kt-radio">
							<input type="radio" name="prev_academic_level" value="<?=$sc["code"]?>"> <?=$sc["name"]?>
							<span></span>
						</label>
					<?php } ?>	
				</div>
			</div>		
		</div>
		<div class="form-group form-group row">
			<div class="col-6 offset-3">
				<div class="input-group">
					<input name="symbol_number" type="text" class="form-control" placeholder="Symbol number" >		
											
				</div>
				<span class="form-text text-muted">Symbol number</span>	
			</div>
			<div class="col-3">
				<div class="input-group">
					<input name="score" type="text" class="form-control" placeholder="Score (%)/GPA" >		
											
				</div>
				<span class="form-text text-muted">Score (%)/GPA</span>	
			</div>
		</div>

	</div>
</div>

