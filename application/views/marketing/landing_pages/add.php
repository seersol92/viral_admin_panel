<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-envelope"></i> Add New Landing Page
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-info" href="<?php echo base_url(); ?>landing-pages">
                        <i class="fa fa-arrow-left"></i>
                        Manage Landing Pages</a>
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
                        <h3 class="box-title">Enter Landing Page Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addTemp" action="<?php echo base_url() ?>add-landing-page"
                          method="post" role="form" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="page_title">Page Title</label>
                                        <input type="text" class="form-control required"
                                               value="<?php echo set_value('page_title'); ?>"
                                               id="page_title" name="page_title" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="min_level">Minimum Level</label>
                                        <select name="min_level" id="min_level" class="form-control" required>
                                            <option value="" selected hidden>
                                               Select Minimum Level For This Landing Page</option>
                                            <option value="0">Zero Level</option>
                                            <option value="1">Bronze</option>
                                            <option value="2">Silver</option>
                                            <option value="3">Ruby</option>
                                            <option value="4">Pearl</option>
                                            <option value="5">Gold</option>
                                            <option value="6">Platinum</option>
                                            <option value="7">Titanium</option>
                                            <option value="8">Diamond</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12" >
                                    <div class="form-group">
                                        <label for="youtube_link">YouTube Video Link</label>
                                        <input type="text" class="form-control"
                                               value="<?php echo set_value('youtube_link'); ?>"
                                               id="youtube_link" name="youtube_link" >
                                    </div>
                                </div>
                                <div class="col-md-12" >
                                    <div class="form-group">
                                        <label for="page_directory">Page Directory (On server)</label>
                                        <input type="text" class="form-control"
                                               value="<?php echo set_value('page_directory'); ?>"
                                               id="page_directory" name="page_directory" >
                                    </div>
                                </div>
                                <div class="col-md-12" >
                                    <div class="form-group">
                                        <label for="page_design">Page Design Image</label>
                                        <input type="file" class="form-control"
                                               id="page_design" name="page_design" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="box-footer pull-right">
                                        <input type="submit" class="btn btn-primary" value="Submit" />
                                    </div>
                                </div>
                    </form>
            </div>
        </div>
    </section>
</div>