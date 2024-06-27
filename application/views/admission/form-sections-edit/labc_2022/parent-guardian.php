<?php							
	$parents =$application->parent_info;								
?>
<?php if($enable_edit==true): ?>

<div class="kt-section">
	<div class="kt-section__body">
		<h3 class="kt-section__title kt-section__title-lg">Parent/Guardian Details:</h3>

		<?php 
			$relations = array("Father", "Mother", "Local Guardian");
			foreach($parents as $parent):  
		?>
		
		<div class="form-group  row">					
				
				<input type="hidden" name="relation_id[]" value="<?=$parent->id?>"/><input type="hidden" name="relation[]" value="<?=$parent->relation?>"/>
				<div class="col-12 col-md-3 "><div class="input-group">	<strong><?=$parent->relation?></strong></div></div>
				<div class="col-12 col-md-3"><div class="input-group">	<input name="relative_name[]" type="text" class="form-control" value="<?=$parent->relative_name?>" placeholder="<?=$parent->relation?> name" ></div></div>
				<div class="col-12 col-md-3"><div class="input-group">	<input name="phone[]" class="form-control" placeholder="Mobile number"  value="<?=$parent->phone?>"/></div></div>
				<div class="col-12 col-md-3"><div class="input-group">	<input name="email[]" class="form-control" placeholder="Occupation" value="<?=$parent->email?>"/></div></div>

			</div>
	
		<?php endforeach; ?>
			
	</div>
</div>




<?php endif; ?>


<?php if($enable_edit==false): ?>
	<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
	<h3 class="kt-section__title kt-section__title-lg">Parent/Guardian Details:</h3>
	<div class="row">
		<div class="col-12">
			<table class="table table-bordered" >
				<thead>
					<tr>
						<th>Relation</th>
						<th>Name</th>					
																	
						<th>Phone (Mobile)</th>
						<th>Email </th>	
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
										
						
						<td><?=$parent->phone?></td>
							<td><?=$parent->email?></td>								
					</tr>
						<?php endforeach; ?>
				</tbody>
			</table>																					
		</div>
	</div>
	
<?php endif; ?>

