<a  href="<?php echo site_url('admin/person/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Person'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/person/save/'.$person['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
   <div class="card-body">    
        <div class="form-group"> 
          <label for="Uni" class="col-md-4 control-label">Uniqid</label> 
          <div class="col-md-8"> 
           <input type="text" name="uniqid" value="<?php echo ($this->input->post('uniqid') ? $this->input->post('uniqid') : $person['uniqid']); ?>" class="form-control" id="uniqid" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="First Name" class="col-md-4 control-label">First Name</label> 
          <div class="col-md-8"> 
           <input type="text" name="first_name" value="<?php echo ($this->input->post('first_name') ? $this->input->post('first_name') : $person['first_name']); ?>" class="form-control" id="first_name" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Last Name" class="col-md-4 control-label">Last Name</label> 
          <div class="col-md-8"> 
           <input type="text" name="last_name" value="<?php echo ($this->input->post('last_name') ? $this->input->post('last_name') : $person['last_name']); ?>" class="form-control" id="last_name" /> 
          </div> 
           </div>
<div class="form-group"> 
                                        <label for="Gender" class="col-md-4 control-label">Gender</label> 
          <div class="col-md-8"> 
           <?php 
             $enumArr = $this->customlib->getEnumFieldValues('person','gender'); 
           ?> 
           <select name="gender"  id="gender"  class="form-control"/> 
             <option value="">--Select--</option> 
             <?php 
              for($i=0;$i<count($enumArr);$i++) 
              { 
             ?> 
             <option value="<?=$enumArr[$i]?>" <?php if($person['gender']==$enumArr[$i]){ echo "selected";} ?>><?=ucwords($enumArr[$i])?></option> 
             <?php 
              } 
             ?> 
           </select> 
          </div> 
            </div>
<div class="form-group"> 
                                        <label for="Occupation" class="col-md-4 control-label">Occupation</label> 
          <div class="col-md-8"> 
           <?php 
             $enumArr = $this->customlib->getEnumFieldValues('person','occupation'); 
           ?> 
           <select name="occupation"  id="occupation"  class="form-control"/> 
             <option value="">--Select--</option> 
             <?php 
              for($i=0;$i<count($enumArr);$i++) 
              { 
             ?> 
             <option value="<?=$enumArr[$i]?>" <?php if($person['occupation']==$enumArr[$i]){ echo "selected";} ?>><?=ucwords($enumArr[$i])?></option> 
             <?php 
              } 
             ?> 
           </select> 
          </div> 
            </div>
<div class="form-group"> 
          <label for="Designation" class="col-md-4 control-label">Designation</label> 
          <div class="col-md-8"> 
           <input type="text" name="designation" value="<?php echo ($this->input->post('designation') ? $this->input->post('designation') : $person['designation']); ?>" class="form-control" id="designation" /> 
          </div> 
           </div>
<div class="form-group"> 
                                        <label for="Education" class="col-md-4 control-label">Education</label> 
          <div class="col-md-8"> 
           <?php 
             $enumArr = $this->customlib->getEnumFieldValues('person','education'); 
           ?> 
           <select name="education"  id="education"  class="form-control"/> 
             <option value="">--Select--</option> 
             <?php 
              for($i=0;$i<count($enumArr);$i++) 
              { 
             ?> 
             <option value="<?=$enumArr[$i]?>" <?php if($person['education']==$enumArr[$i]){ echo "selected";} ?>><?=ucwords($enumArr[$i])?></option> 
             <?php 
              } 
             ?> 
           </select> 
          </div> 
            </div>
<div class="form-group"> 
                                        <label for="Address" class="col-md-4 control-label">Address</label> 
          <div class="col-md-8"> 
           <textarea  name="address"  id="address"  class="form-control" rows="4"/><?php echo ($this->input->post('address') ? $this->input->post('address') : $person['address']); ?></textarea> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Father Name" class="col-md-4 control-label">Father Name</label> 
          <div class="col-md-8"> 
           <input type="text" name="father_name" value="<?php echo ($this->input->post('father_name') ? $this->input->post('father_name') : $person['father_name']); ?>" class="form-control" id="father_name" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Mather Name" class="col-md-4 control-label">Mather Name</label> 
          <div class="col-md-8"> 
           <input type="text" name="mather_name" value="<?php echo ($this->input->post('mather_name') ? $this->input->post('mather_name') : $person['mather_name']); ?>" class="form-control" id="mather_name" /> 
          </div> 
           </div>
<div class="form-group"> 
                                       <label for="Dob" class="col-md-4 control-label">Dob</label> 
            <div class="col-md-8"> 
           <input type="text" name="dob"  id="dob"  value="<?php echo ($this->input->post('dob') ? $this->input->post('dob') : $person['dob']); ?>" class="form-control-static datepicker"/> 
            </div> 
           </div>
<div class="form-group"> 
                                        <label for="File Picture" class="col-md-4 control-label">File Picture</label> 
          <div class="col-md-8"> 
           <input type="file" name="file_picture"  id="file_picture" value="<?php echo ($this->input->post('file_picture') ? $this->input->post('file_picture') : $person['file_picture']); ?>" class="form-control-file"/> 
          </div> 
            </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"><?php if(empty($person['id'])){?>Save<?php }else{?>Update<?php } ?></button>
    </div>
</div>
<?php echo form_close(); ?>
<!--End of Form to save data//-->	
<!--JQuery-->
<script>
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd", 
		changeYear: true,
		changeMonth: true,
		showOn: 'button',
		buttonText: 'Show Date',
		buttonImageOnly: true,
		buttonImage: '<?php echo base_url(); ?>public/datepicker/images/calendar.gif',
	});
</script>  			