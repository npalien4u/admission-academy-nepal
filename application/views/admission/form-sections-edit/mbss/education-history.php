<?php							
	$academic_record =$application->academic_record;	
	$subjects = array("English", "Nepali", "Mathematics", "Science","Social Study", "EPH", "Opt. I", "Opt II");
	//$subjects = array("English", "Nepali");
				
?>
<?php if($enable_edit==true): ?>
<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
<div class="kt-section">
	<div class="kt-section__body">
		<h3 class="kt-section__title kt-section__title-lg">Academic record in SEE:</h3>
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
			<thead>
				<tr>
					<th>Subject</th>
					<th>Score</th>
				
					<th>Remarks<br/>(Opt. Subject Name)</th>												
				</tr>
			</thead>
			<tbody>
				<?php 
						
						foreach($subjects as $key=>$subject):  
				?>
				<tr>
					<td><input type="hidden" name="subject_id[]" value="<?=@$academic_record[$key]->id?>"/><input type="hidden" name="subject[]" value="<?php $subject?>"/><?php echo $subject?></td>
					<td><input type="text" name="score_prev_school[]" class="form-control" value="<?=@$academic_record[$key]->score_prev_school?>" placeholder="Score in <?=$subject?>" ></td>					
					<td><input type="text" name="outstanding_eca[]" class="form-control" value="<?=@$academic_record[$key]->outstanding_eca?>" placeholder="Remark/Opt subject name" ></td>
					
				</tr>
					<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>



<?php endif; ?>
<?php if($enable_edit==false): ?>
	<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
<div class="kt-section">
	<div class="kt-section__body">
		<h3 class="kt-section__title kt-section__title-lg">Academic record:</h3>
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
			<thead>
				<tr>
					<th>Subject</th>
					<th>Score</th>
				
					<th>Remarks<br/>(Opt. Subject Name)</th>												
				</tr>
			</thead>
			<tbody>
				<?php 
						
						foreach($subjects as $key=>$subject):  
				?>
				<tr>
					<td><?php echo $subject?></td>
					<td><?=@$academic_record[$key]->score_prev_school?></td>					
					<td><?=@$academic_record[$key]->outstanding_eca?></td>
					
				</tr>
					<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<?php endif; ?>
