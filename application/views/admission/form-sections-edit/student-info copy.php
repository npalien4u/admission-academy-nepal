<h3 class="kt-section__title kt-section__title-lg">Student Info:</h3>
<<div class="form-group row">
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
											<div class="row">
											<div class="col-xl-1">
											<label class="form-control-label"> A.D.</label>
											</div>
												<div class="col-xl-8">
													<div class="form-group-last row">
														<div class="col-lg-4 form-group-sub">
															<label class="form-control-label"> Year:</label>
															<select class="form-control" name="dob_year_ad">
																<option value="">Select</option>
																<?php 
																	$min_year=1990; $max_year=2020; $year=$max_year ; 
																	while($year>=$min_year): ?>
																		<option value="<?=$year?>" <?=@$eng_dob[0]==$year?"selected":""?>><?=$year?></option>	
																<?php 
																		$year--;
																	endwhile; 
																?>														
															</select>
														</div>
														<div class="col-lg-4 form-group-sub">
															<label class="form-control-label"> Month:</label>
															<select class="form-control" name="dob_month_ad" >
																<option value="">Select</option>
																<?php 
																	$months = array(
																		'January',																
																		'February',
																		'March',
																		'April',
																		'May',
																		'June',
																		'July ',
																		'August',
																		'September',
																		'October',
																		'November',
																		'December',
																	);
																	foreach($months as $key=>$month):
																?>
																	<option value="<?=$key+1?>" <?=@$eng_dob[1]==$month?"selected":""?>><?=$month?></option>
																<?php endforeach; ?>
																
															</select>
														</div>
														<div class="col-lg-4 form-group-sub">
															<label class="form-control-label"> Date:</label>
															<select class="form-control" name="dob_date_ad">
																<option value="">Select</option>
																<?php 
																	$min_date=1; $max_date=31; $date=$min_date ; 
																	while($date<=$max_date): ?>
																		<option value="<?=$date?>" <?=@$eng_dob[2]==$date?"selected":""?>><?=$date?></option>	
																<?php 
																		$date++;
																	endwhile; 
																?>														
															</select>
																
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
