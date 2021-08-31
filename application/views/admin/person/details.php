<a  href="<?php echo site_url('admin/person/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Person'); ?></h5>
<!--Data display of person with id--> 
<?php
	$c = $person;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Uniqid</td><td><?php echo $c['uniqid']; ?></td></tr>

<tr><td>First Name</td><td><?php echo $c['first_name']; ?></td></tr>

<tr><td>Last Name</td><td><?php echo $c['last_name']; ?></td></tr>

<tr><td>Gender</td><td><?php echo $c['gender']; ?></td></tr>

<tr><td>Occupation</td><td><?php echo $c['occupation']; ?></td></tr>

<tr><td>Designation</td><td><?php echo $c['designation']; ?></td></tr>

<tr><td>Education</td><td><?php echo $c['education']; ?></td></tr>

<tr><td>Address</td><td><?php echo $c['address']; ?></td></tr>

<tr><td>Father Name</td><td><?php echo $c['father_name']; ?></td></tr>

<tr><td>Mather Name</td><td><?php echo $c['mather_name']; ?></td></tr>

<tr><td>Dob</td><td><?php echo $c['dob']; ?></td></tr>

<tr><td>File Picture</td><td><?php
											if(is_file(APPPATH.'../public/'.$c['file_picture'])&&file_exists(APPPATH.'../public/'.$c['file_picture']))
											{
										 ?>
										  <img src="<?php echo base_url().'public/'.$c['file_picture']?>" class="picture_50x50">
										  <?php
											}
											else
											{
										?>
										<img src="<?php echo base_url()?>public/uploads/no_image.jpg" class="picture_50x50">
										<?php		
											}
										  ?>	
										</td></tr>

<tr><td>Created At</td><td><?php echo $c['created_at']; ?></td></tr>

<tr><td>Updated At</td><td><?php echo $c['updated_at']; ?></td></tr>


</table>
<!--End of Data display of person with id//--> 