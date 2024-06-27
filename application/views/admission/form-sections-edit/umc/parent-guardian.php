<?php							
	$parents =$application->parent_info;								
?>
<?php if($enable_edit==true): ?>
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
					foreach($parents as $parent):  
				?>
				<tr>
					<td><?=$parent->relation?><input type="hidden" name="relation[]" value="<?=$parent->relation?>"/></td>
					<td><input name="relative_name[]" type="text" class="form-control" value="<?=$parent->relation?>" placeholder="Name" ></td>					
					<td><input name="occupation[]" class="form-control" value="<?=$parent->occupation?>" /></td>
					<td><input name="phone[]" class="form-control" value="<?=$parent->academic_qualification?>" /></td>									
				</tr>
					<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>




<?php endif; ?>


<?php if($enable_edit==false): ?>
	<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
	<h3 class="kt-section__title kt-section__title-lg">Parent/Guardian Details:</h3>
	<div class="kt-section">
		<div class="kt-section__body">
			

			<div class="row">
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
					foreach($parents as $parent):  
				?>
				<tr>
					<td><?=$parent->relation?></td>	
					<td><?=$parent->relative_name?></td>										
					<td><?=$parent->occupation?></td>
					<td><?=$parent->phone?></td>									
				</tr>
					<?php endforeach; ?>
			</tbody>
		</table>																					
			</div>
		</div>
	</div>
<?php endif; ?>

