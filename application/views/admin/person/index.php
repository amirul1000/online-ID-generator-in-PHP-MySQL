<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Person'); ?></h5>
<?php
  	echo $this->session->flashdata('msg');
?>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/person/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type" class="select"
			onChange="window.location='<?php echo site_url('admin/person/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div  class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/person/search/',array("class"=>"form-horizontal")); ?>
                    <input name="key" type="text"
				value="<?php echo isset($key)?$key:'';?>" placeholder="Search..."
				class="form-control">
				<button type="submit" class="mr-0">
					<i class="fa fa-search"></i>
				</button>
                <?php echo form_close(); ?>
            </li>
		</ul>
	</div>
</div>
<!--End of Action//--> 
   
<!--Data display of person-->       
<table class="table table-striped table-bordered">
    <tr>
		<th>Uniqid</th>
<th>First Name</th>
<th>Last Name</th>
<th>Gender</th>
<th>Occupation</th>
<th>Designation</th>
<th>Education</th>
<th>Address</th>
<th>Father Name</th>
<th>Mather Name</th>
<th>Dob</th>
<th>File Picture</th>

		<th>Actions</th>
    </tr>
	<?php foreach($person as $c){ ?>
    <tr>
		<td><?php echo $c['uniqid']; ?></td>
<td><?php echo $c['first_name']; ?></td>
<td><?php echo $c['last_name']; ?></td>
<td><?php echo $c['gender']; ?></td>
<td><?php echo $c['occupation']; ?></td>
<td><?php echo $c['designation']; ?></td>
<td><?php echo $c['education']; ?></td>
<td><?php echo $c['address']; ?></td>
<td><?php echo $c['father_name']; ?></td>
<td><?php echo $c['mather_name']; ?></td>
<td><?php echo $c['dob']; ?></td>
<td><?php
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
										</td>

		<td><a href="<?php echo site_url('admin/person/print_id/'.$c['id']); ?>"  class="action-icon"> <i class="zmdi zmdi-print"></i></a>
            <a href="<?php echo site_url('admin/person/details/'.$c['id']); ?>"  class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
            <a href="<?php echo site_url('admin/person/save/'.$c['id']); ?>" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
            <a href="<?php echo site_url('admin/person/remove/'.$c['id']); ?>" onClick="return confirm('Are you sure to delete this item?');" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
        </td>
    </tr>
	<?php } ?>
</table>
<!--End of Data display of person//--> 

<!--No data-->
<?php
	if(count($person)==0){
?>
 <div align="center"><h3>Data is not exists</h3></div>
<?php
	}
?>
<!--End of No data//-->

<!--Pagination-->
<?php
	echo $link;
?>
<!--End of Pagination//-->
