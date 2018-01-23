<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Viral Members
        <small>Update Members Info, Send Email</small>
      </h1>
    </section>
    <section class="content">
        <br>
        <div class="row">
            <div class="col-xs-12">
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
                    { ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Members List </h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>memberListing" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>Id</th>
                      <th>IBM</th>                      
                      <th>Name</th>
                      <th>Email</th>
                      <th>Referred By</th>                      
                      <th>Registered On</th>
                      <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($userRecords))
                    {
                        foreach($userRecords as $record)
                        {
                    ?>
                    <tr>
                      <td><?php echo $record->u_id ?></td>
                      <td><?php echo $record->ibm; ?></td>                      
                      <td><?php echo $record->first_name ?></td>
                      <td><?php echo $record->user_email ?></td>
                      <td><?php echo $record->refer_ibm ?></td>                      
                      <td><?php echo $record->date_register ?></td>
                      <td class="text-center">
                          <a class="btn btn-sm btn-primary" href="<?= base_url().'select-template/'.$record->ibm; ?>" title="Send Email"><i class="fa fa-envelope"></i></a> | 
                          <a class="btn btn-sm btn-info" href="<?php echo base_url().'editOld/'.$record->u_id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                      </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "memberListing/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
