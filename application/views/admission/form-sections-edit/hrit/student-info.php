<?php							
	$applicant_info =$application->applicant_info;							
	$nep_dob = explode("-",$applicant_info->dob_bs);  
	$eng_dob = explode("-",$applicant_info->dob_ad);  								

	
?>
<div class="kt-section kt-section--first">
	<div class="kt-section__body">
<?php if($enable_edit==true): ?>
	<h3 class="kt-section__title kt-section__title-lg">Student Info:</h3>
	<div class="form-group row">
		<label class="col-3 col-form-label">Name</label>
		<div class="col-3">
			<input name="first_name" class="form-control" type="text" value="<?=$applicant_info->first_name?>" placeholder="First Name">
			<span class="form-text text-muted"> * First Name</span>
		</div>
		<div class="col-3">
			<input name="middle_name" class="form-control" type="text" value="<?=$applicant_info->middle_name?>" placeholder="Middle Name">
			<span class="form-text text-muted">Middle Name</span>
		</div>
		<div class="col-3">
			<input name="last_name" class="form-control" type="text" value="<?=$applicant_info->last_name?>" placeholder="Last Name">
			<span class="form-text text-muted"> *Last Name</span>
		</div>										
	</div>
	<div class="form-group row">										
		<label class="col-3 col-form-label">Date of Birth</label>
		<div class="col-8">								
			<div class="row">
			<div class="col-xl-1">
			<label class="form-control-label">* वि.सं:</label>
			</div>
				<div class="col-xl-8">
					<div class="form-group-last row">
						<div class="col-lg-4 form-group-sub">
							<label class="form-control-label">* साल:</label>
								
							<select class="form-control" name="dob_year_bs">
								<option value="">Select</option>
								<?php 
									$nep_years = array("२०४५", "२०४६", "२०४७", "२०४८", "२०४९", "२०५०", "२०५१", "२०५२", "२०५३", "२०५४", "२०५५", "२०५६", "२०५७", "२०५८", "२०५९", "२०६०", "२०६१", "२०६२", "२०६३", "२०६४", "२०६५", "२०६६", "२०६७", "२०६८", "२०६९", "२०७०", "२०७१", "२०७२", "२०७३", "२०७४", "२०७५", "२०७६", "२०७७");																	
									foreach($nep_years as $nep_year):
								?>	
									<option value="<?=$nep_year?>" <?=@$nep_dob[0]==$nep_year?"selected":""?>><?=$nep_year?></option>	
								<?php endforeach;?>													
							</select>
						</div>
						<div class="col-lg-4 form-group-sub">
							<label class="form-control-label">* महिना: </label>
							<select class="form-control" name="dob_month_bs" >
								<option value="">Select</option>
								<?php 
									$nep_months = array(
									"१" =>	"बैशाख",
									"२" =>	"जेठ",
									"३" =>	"असार",
									"४" =>	"सावन",
									"५" =>	"भदाै",
									"६" =>	"आसाेज",
									"७" =>	"कार्तिक",
									"८" =>	"मंसिर",
									"९" =>	"पुष",
									"१०" =>	"माघ",
									"११" =>	"फागुन",
									"१२" =>	"चैत"
									);
									foreach($nep_months as $key=>$month):
								?>
									<option value="<?=$key?>" <?=@$nep_dob[1]==$key?"selected":""?>><?=$month?></option>
								<?php endforeach; ?>
								
							</select>
						</div>
						<div class="col-lg-4 form-group-sub">
							<label class="form-control-label">* गते:</label>
							<select class="form-control" name="dob_date_bs" >
								<option value="">Select</option>
								<?php 
									$nep_dates=array("१", "२", "३", "४", "५", "६", "७", "८", "९", "१०", "११", "१२", "१३", "१४", "१५", "१६", "१७", "१८", "१९", "२०", "२१", "२२", "२३", "२४", "२५", "२६", "२७", "२८", "२९", "३०", "३१", "३२") ; 
									foreach($nep_dates as $nep_date): ?>
										<option value="<?=$nep_date?>" <?=@$nep_dob[2]==$nep_date?"selected":""?>><?=$nep_date?></option>	
								<?php 																
									endforeach; 
								?>														
							</select>
						</div>
					</div>
				</div>																			
			</div>
			
		</div>
	</div>
	<div class="form-group row">
		<label class="col-3 col-form-label">Gender *</label>
		<div class="col-8">
			<div class="kt-radio-inline">
				<label class="kt-radio">
					<input type="radio" name="gender" value="male" <?=$applicant_info->gender=="male"?"checked":""?>> Male
					<span></span>
				</label>
				<label class="kt-radio">
					<input type="radio"  name="gender" value="female" <?=$applicant_info->gender=="female"?"checked":""?>> Female
					<span></span>
				</label>
				<label class="kt-radio">
					<input type="radio" name="gender" value="other" <?=$applicant_info->gender=="other"?"checked":""?>> Other
					<span></span>
				</label>
			</div>
		</div>
	</div>
<?php endif; ?>


<?php if($enable_edit==false): ?>
	<h3 class="kt-section__title kt-section__title-lg">Student Info:</h3>
	<div class="form-group row">
		<label class="col-3 col-form-label">Name</label>									
		<label class="col-9 col-data-label"><?=$applicant_info->first_name?> <?=$applicant_info->middle_name?> <?=$applicant_info->last_name?></label>																						
	</div>
	<div class="form-group row">										
		<label class="col-3 col-form-label">Date of Birth</label>
		<div class="col-9">								
			<div class="row">
				<label class="col-xl-12 col-data-label"><?=$applicant_info->dob_bs?> (वि.सं.)</label>
																																																	
			</div>										
		</div>
	</div>
	<div class="form-group row">
		<label class="col-3 col-form-label">Gender</label>
		<label class="col-9 col-data-label"><?=$applicant_info->gender?></label>																																																									
	</div>
<?php endif; ?>
</div>
</div>
