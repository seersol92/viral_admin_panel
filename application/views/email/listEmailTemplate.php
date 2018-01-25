<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Email Template
        <small>Add, Edit, Delete Email Templates</small>
      </h1>
    </section>
    <section class="content">
        <br>
        <div class="row">
            <div class="col-xs-12 text-right">
            <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>add-new-template"><i class="fa fa-plus"></i>
                     Add New Template</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Templates List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>email-management" method="POST" id="searchList">
                              <div class="input-group">
                              <div class="input-group">
                              <select name="temp_type" id="temp_type" class="form-control" onchange="this.form.submit();">
                                    <option value="" selected hidden>Filter By Email Type</option>
                                    <option value="1">Automated Emails</option>                                            
                                    <option value="2">Follow up Emails</option>
                                    <option value="3">Broadcast Emails</option>
                                </select>
                            </div>
                              <input type="text" name="searchText" value="<?php //echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
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
                      <th>#</th>
                      <th>Template Subject</th> 
                      <th>Template Type</th>                       
                      <th>Template Content</th>                                                                                                           
                      <th>Added On</th>
                      <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($tempList))
                    {
                        $template_types = array(
                                            1=> 'Automated Emails',
                                            2=> 'Follow up Email',
                                            3=> 'Broadcast Email'
                                        );
                        $count = 0;
                        foreach($tempList as $list)
                        {
                            $count++;
                    ?>
                    <tr>
                      <td><?php echo $count; ?></td>
                      <td><?php echo $list->template_name; ?></td> 
                      <td><?php echo $template_types[$list->template_type]; ?></td>                                                                 
                      <td><?php echo $list->template_content ?></td>                      
                      <td><?php echo $list->created_at ?></td>
                      <td class="text-center">
                          <a class="btn btn-sm btn-info" href="<?php echo base_url().'editOld/'.$list->id; ?>" title="Edit"><i class="fa fa-pencil"></i></a> |
                          <a class="btn btn-sm btn-danger" href="<?= base_url().'send-email/'.$list->id; ?>" title="Delete Template"><i class="fa fa-trash-o"></i></a>                            
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
            jQuery("#searchList").attr("action", baseURL + "email-management/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
