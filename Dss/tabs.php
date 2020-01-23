<?php 
include 'header.php';
include 'config.php';
?>
<div class="block-content collapse in">
                                <div class="span12">
								<form action="delete_player.php" method="post">
<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-placement="right" title="Click to Delete check item"  data-toggle="modal" href="#student_delete" id="delete"  class="btn btn-danger" name="delete_student"><i class="icon-trash icon-large"> Delete</i></a>
									<script type="text/javascript">
									 $(document).ready(function(){
									 $('#delete').tooltip('show');
									 $('#delete').tooltip('hide');
									 });
									</script>
									<?php include('modal_delete.php'); ?>
										<thead>
										  <tr>
												<th></th>
                                                
												<th>Name</th>
												<th>RegNo</th>
										
												<th></th>
										   </tr>
										</thead>
										<tbody>
													<?php
													$user_query = mysql_query("select * from player")or die(mysql_error());
													while($row = mysql_fetch_array($user_query)){
													$id = $row['id'];
													?>
									
												<tr>
												<td width="30">
												<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>
												<td><?php echo $row['fname']; ?> <?php echo $row['sname']; ?></td>
	
												<td><?php echo $row['id']; ?></td>
												
											    <?php include('toolttip_edit_delete.php'); ?>															
											
		
									
												</tr>
												<?php } ?>
										</tbody>
									</table>