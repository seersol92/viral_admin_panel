<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-envelope"></i> Compose Email
      </h1>
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
                        <h3 class="box-title">You can modify email template to send <b><?php echo $memberInfo[0]->first_name; ?>.</b></h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="sent" action="<?php echo base_url() ?>send-email" method="post" role="form">
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
                                    <label for="temp_name">Email Subject (You can modfiy it)</label>
                                    <input type="text" name="temp_name" class="form-control required" 
                                        value="<?php echo $tempList[0]->template_name; ?>" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="temp_content">Your Message</label>
                                        <textarea name="temp_content" id="email_content" style="width: 100%; height:150px">
                                            <?php echo $show_content;?>
                                        </textarea>
                                    </div>
                                </div>
                        </div><!-- /.box-body -->    
                        <div class="box-footer pull-right">
                            <input type="submit" class="btn btn-primary" value="Send Now!" />
                        </div>
                    </form>
                </div>
            </div>
            
        </div>    
    </section>    
</div>
<script src="<?php echo base_url(); ?>assets/js/nicEdit.js" type="text/javascript"></script> 
<script type="text/javascript">
//<![CDATA[
bkLib.onDomLoaded(function() {
        new nicEditor({fullPanel : true}).panelInstance('email_content');     
});
//]]>
</script>