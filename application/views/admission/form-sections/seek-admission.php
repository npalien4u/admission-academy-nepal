<div class="form-group row">
						<label class="col-3 col-form-label">Seeking Admission In</label>
						<div class="col-9">								
							
							<div class="row">
							<div class="col-lg-4 form-group-sub">
									<label class="form-control-label">* Grade/Level:</label>
									<select class="form-control" name="admission_grade" >
										<option value="">Select</option>
										<?php 
											
											foreach($open_grades  as $grade):
										?>
											<option value="<?=$grade->grade_name?>"><?=$grade->grade_name?></option>
										<?php endforeach; ?>
										
									</select>
								</div>
								<div class="col-lg-4 form-group-sub">
									<label class="form-control-label">* Admission Type:</label>
									<select class="form-control m-select2" name="admission_type" >
										<option value="">Select</option>
										<?php 
											$admission_types = array(
												'Day Scholar',																
												'Day Boarder',
												'Boarder'													
											);
											foreach($admission_types as $admission_type):
												?>
													<option value="<?=$admission_type?>"><?=$admission_type?></option>
												<?php endforeach; ?>
										?>														
									</select>
								</div>

								<div class="col-lg-4 form-group-sub">
									<label class="form-control-label">* Session:</label>
									<select class="form-control m-select2" name="admission_session">
										<option value="">Select</option>
										<?php 
											$sessions = array(
												'2020'													
											);
											foreach($sessions as $session):
												?>
													<option value="<?=$session?>"><?=$session?></option>
												<?php endforeach; ?>
										?>														
									</select>
								</div>
								
							
							</div>
						</div>									
						
					</div>
