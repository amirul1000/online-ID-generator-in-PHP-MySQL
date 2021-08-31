
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
		<td align="center"><?php echo $person['uniqid']; ?></td>
    </tr>    
 <tr><td align="center"><?php echo $person['first_name']; ?> <?php echo $person['last_name']; ?></td></tr>

<tr><td align="center"><?php
											if(is_file(APPPATH.'../public/'.$person['file_picture'])&&file_exists(APPPATH.'../public/'.$person['file_picture']))
											{
										 ?>
										  <img src="<?php echo base_url().'public/'.$person['file_picture']?>" class="picture_50x50">
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
	<tr><td align="center">Designation:<?php echo $person['designation']; ?></td></tr>
    <tr><td align="center">Dob:<?php echo $person['dob']; ?></td></tr>
</table>
<!--End of Data display of person//--> 