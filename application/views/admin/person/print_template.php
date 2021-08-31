<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css"> 
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Person'); ?></h3>
Date: <?php echo date("Y-m-d");?>
<hr>
<!--*************************************************
*********mpdf header footer page no******************
****************************************************-->
<htmlpageheader name="firstpage" class="hide">
</htmlpageheader>

<htmlpageheader name="otherpages" class="hide">
    <span class="float_left"></span>
    <span  class="padding_5"> &nbsp; &nbsp; &nbsp;
     &nbsp; &nbsp; &nbsp;</span>
    <span class="float_right"></span>         
</htmlpageheader>      
<sethtmlpageheader name="firstpage" value="on" show-this-page="1" />
<sethtmlpageheader name="otherpages" value="on" /> 
   
<htmlpagefooter name="myfooter"  class="hide">                          
     <div align="center">
               <br><span class="padding_10">Page {PAGENO} of {nbpg}</span> 
     </div>
</htmlpagefooter>    

<sethtmlpagefooter name="myfooter" value="on" />
<!--*************************************************
*********#////mpdf header footer page no******************
****************************************************-->
<!--Data display of person-->    
<table   cellspacing="3" cellpadding="3" class="table" align="center">
    <tr>
		<th>Uni</th>
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

    </tr>
	<?php } ?>
</table>
<!--End of Data display of person//--> 