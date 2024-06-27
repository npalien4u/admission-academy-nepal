<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
<div class="kt-section">
	<div class="kt-section__body">
		<h3 class="kt-section__title kt-section__title-lg">Academic record in previous school:</h3>
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
			<thead>
				<tr>
					<th>Subject</th>
					<th>% Marks in last School</th>
					<th>% Marks in Lab Entrance Exam</th>
					<th>Outstanding in Games & Sports/Co-Curricular activities<br/>(If any in previous school)</th>												
				</tr>
			</thead>
			<tbody>
				<?php 
						$subjects = array("English", "Nepali", "Mathematics", "Science","Social Study");
						foreach($subjects as $subject):  
				?>
				<tr>
					<td><?php echo $subject?><input type="hidden" name="subject[]" value="<?php $subject?>"/></td>
					<td><input type="text" name="score_prev_school[]" class="form-control" value="" placeholder="Score in <?php $subject?>" ></td>
					<td><input type="text" name="score_lab_entrance[]" class="form-control" value="" placeholder="Score in <?php $subject?>" ></td>
					<td><input type="text" name="outstanding_eca[]" class="form-control" value=""  ></td>
					
				</tr>
					<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
