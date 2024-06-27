<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
<div class="kt-section">
	<div class="kt-section__body">
		<h3 class="kt-section__title kt-section__title-lg">Parent/Guardian Details:</h3>
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
			<thead>
				<tr>
					<th>Relation</th>
					<th>Name</th>					
					<th>Occupation </th>												
					<th>Phone (Mobile)</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$relations = array("Father", "Mother", "Local Guardian");
					foreach($relations as $relation):  
				?>
				<tr>
					<td><?=$relation?><input type="hidden" name="relation[]" value="<?=$relation?>"/></td>
					<td><input name="relative_name[]" type="text" class="form-control" value="" placeholder="Name" ></td>					
					<td><input name="occupation[]" class="form-control"/></td>
					<td><input name="academic_qualification[]" class="form-control"  /></td>									
				</tr>
					<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
