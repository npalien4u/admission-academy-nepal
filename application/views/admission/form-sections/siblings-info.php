


<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
<div class="kt-section">
	<div class="kt-section__body">
		<h3 class="kt-section__title kt-section__title-lg">Particulars of all real brothers/sisters of the pupil:</h3>
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
			<thead>
				<tr>
					<th>SN</th>
					<th>Brother/Sister's Name</th>
					<th>Age</th>
					<th>Name of the Institution he/she is studying in</th>												
				</tr>
			</thead>
			<tbody>
			<?php 
						$max_sibling=5;
						for($i=0; $i<$max_sibling; $i++):  
				?>
				<tr>
					<td><?php echo ($i+1)?> </td>
					<td><input type="text" name="sibling_name[]" class="form-control" value="" placeholder="Name" ></td>
					<td><input type="text" name="sibling_age[]" class="form-control" value="" placeholder="Age" ></td>
					<td><input type="text" name="education_institution[]" class="form-control" value="" placeholder="Instituition name" ></td>
				</tr>
					<?php endfor; ?>
			</tbody>
		</table>
	</div>
</div>
