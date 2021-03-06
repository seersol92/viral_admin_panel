<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-envelope"></i> Add New Email Template
      </h1>
    </section> 
    <section class="content">
        <div class="row">
        <div class="col-xs-12 text-right">
        <div class="form-group">
                <a class="btn btn-info" href="<?php echo base_url(); ?>email-management">
                <i class="fa fa-arrow-left"></i>
                 Manage Email Templates</a>
            </div>
        </div>
        </div>
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
                        <h3 class="box-title">Enter Template Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addTemp" action="<?php echo base_url() ?>add-template" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="temp_name">Template Subject</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('temp_name'); ?>" id="temp_name" name="temp_name" >
                                    </div>
                                </div>
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="temp_type">Template Type</label>
                                        <select name="temp_type" id="temp_type" class="form-control" required>
                                            <option value="" selected hidden>Select Template Type</option>
                                            <option value="1">Automated Emails</option>                                            
                                            <option value="2">Follow up Email</option>
                                            <option value="3">Broadcast Email</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12" style="display: none" id="time_delay_div">
                                    <div class="form-group">
                                        <label for="time_delay">Time Delay (In hours)</label>
                                        <input type="text" class="form-control" value="<?php echo set_value('time_delay'); ?>" id="time_delay" name="time_delay" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="temp_type">Select Keywords</label>
                                        <select id="keywords" class="form-control" >
                                            <option value="" selected hidden>Select Keywords</option>
                                            <?php foreach ($keyword AS $key=>$name): ?>
                                            <option value="<?='{#'.$key.'#}'?>">
                                                <?=$name?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <div id="sample">
                                        <label for="temp_content">Template Content</label>
                                        <textarea name="temp_content" id="email_content" style="width: 100%; height:150px"></textarea>
                                    <div>
                                    </div>
                                </div>
                        </div><!-- /.box-body -->    
                        <div class="box-footer pull-right">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
            
        </div>    
    </section>
    
</div>
<script src="<?php echo base_url(); ?>assets/js/nicEdit.js" type="text/javascript"></script> 
<script type="text/javascript">
    jQuery(document).ready(function($){
        $('#temp_type').on('change', function (e) {
            var selected_type = this.value;
            if(selected_type == 2) {
                $('#time_delay_div').show();
            }else {
                $('#time_delay_div').hide();

            }
        })

        $('#keywords').on('change', function (e) {
            var keywords = this.value;
            $('.nicEdit-main').append(keywords);
        })
    });
    //<![CDATA[
    bkLib.onDomLoaded(function() {
            new nicEditor({fullPanel : true}).panelInstance('email_content');
    });
//]]>
</script>