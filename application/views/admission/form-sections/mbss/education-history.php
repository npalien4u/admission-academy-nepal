<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
<div class="kt-section">
	<div class="kt-section__body">
		<h3 class="kt-section__title kt-section__title-lg">Academic record expected in SEE:</h3>
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
						$subjects = array("English", "Nepali", "Mathematics", "Science","Social Study", "EPH", "Opt. I", "Opt II");
						//$subjects = array("English", "Nepali");
						foreach($subjects as $subject):  
				?>
				<tr>
					<td><?php echo $subject?><input type="hidden" name="subject[]" value="<?php $subject?>"/></td>
					<td><input type="text" name="score_prev_school[]" class="form-control" value="" placeholder="Score in <?php $subject?>" ></td>
					
					<td><input type="text" name="outstanding_eca[]" class="form-control" value=""  ></td>
					
				</tr>
					<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
