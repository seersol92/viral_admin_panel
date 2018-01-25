<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-envelope"></i> Select Email Template
      </h1>
      <p>Select Email Template You Want To Send <b><?=$memberInfo[0]->first_name ?></b></p>
    </section> 
    <section class="content">
        
        <div class="row">
        <div class="col-md-12">
        <?php
            $this->load->helper('form');
            $error = $this->session->flashdata('error');
            if($error)
            { ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Please Confirm Member Detail..</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="sent" action="<?php echo base_url() ?>compose-email" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="temp_name">Member Name</label>
                                        <input type="text" name="mem_name" class="form-control required" 
                                        value="<?php echo $memberInfo[0]->first_name; ?>" readOnly >
                                    </div>
                                </div>
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="temp_name">Member Email</label>
                                        <input type="text" name="mem_email" class="form-control required" 
                                        value="<?php echo $memberInfo[0]->email; ?>" readOnly >
                                    </div>
                                </div>
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="temp_name">Member IBM</label>
                                        <input type="text" name="mem_ibm" class="form-control required" 
                                        value="<?php echo $memberInfo[0]->ibm; ?>" readOnly >
                                    </div>
                                </div>
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                       <label for="temp_no">Select Email Template</label>
                                       <select name="temp_no" id="" class="form-control" required>
                                       <?php if(!empty($tempList)) { ?>    
                                        <option hidden selected value="">Select Templates</option>
                                        <?php foreach($tempList AS $temp)
                                        {
                                            echo '<option value="'.$temp->id.'">'.$temp->template_name.'</option>';  
                                        }?>
                                       <?php } else {
                                           echo '<option hidden selected>No, Template Found!</option>';
                                       } ?>
                                       </select>
                                    </div>
                                </div>
                        </div><!-- /.box-body -->    
                        <div class="box-footer pull-right">
                            <input type="submit" class="btn btn-primary" value="Compose Now!" />
                        </div>
                    </form>
                </div>
            </div>
            
        </div>    
    </section>    
</div>

