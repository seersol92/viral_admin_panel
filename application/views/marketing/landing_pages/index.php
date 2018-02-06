<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Landing Pages
            <small>Create, Edit, Update And Delete Landing Page</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>add-new-page"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
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
                        <h3 class="box-title"> Landing Pages </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>#</th>
                                <th>Page Name</th>
                                <th>Minimum Level</th>
                                <th>Youtube Link</th>
                                <th>Page directory</th>
                                <th>Images</th>
                                <th>Created At</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            <?php
                            if(!empty($pages))
                            {
                                $count = 0;
                                foreach($pages as $record)
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo ++$count; ?></td>
                                        <td><?php echo $record->page_name; ?></td>
                                        <td><?php echo $record->min_level ?></td>
                                        <td><?php echo $record->youtube_video ?></td>
                                        <td><?php echo $record->page_path ?></td>
                                        <td><?php echo $record->page_path ?></td>
                                        <td><?php echo $record->created_at ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-primary"
                                               href="<?= base_url().'select-template/'.$record->id; ?>" title="Send Email"><i class="fa fa-envelope"></i></a> |
                                            <a class="btn btn-sm btn-info"
                                               href="<?php echo base_url().'editOld/'.$record->id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>

                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <?php //echo $this->pagination->create_links(); ?>
                    </div>
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
