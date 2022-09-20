<?= $this->extend('layouts/progressbar') ?>

<?= $this->section('content') ?>



<h1>Welcome to CodeIgniter -Ajax Upload!!</h1>
<div class="row">
    <div class="container" style="padding:20px;">
        <div class="col-xs-12 col-sm-12 col-md-12">


            <form method="post" id="form-upload" enctype="multipart/form-data"
                action='<?php echo base_url(); ?>/load'>


                <div class="row">
                    <div class="form-group col-xs-12 col-sm-6 col-md-6">

                        <p>Title <input type="text" name="title" class="form-control" placeholder="Title" /></p>

                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-6">

                        <p>Description <input type="text" name="description" class="form-control"
                                placeholder="Description" /></p>

                    </div>
                </div>


                <div class="form-group" style="padding:20px;">

                    <input id="file-3" name="userfile" type="file">
                </div>


                <div class="progress" style="display:none;">
                    <div id="progress-bar" class="progress-bar progress-bar-success progress-bar-striped "
                        role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                        20%
                    </div>
                </div>


                <div class="form-group" style="padding:20px;">
                    <input id="upload-btn" type="submit" class="btn btn-success" name="submit" value="Upload Image">
                </div>

            </form>



        </div>

    </div>
</div>
<?= $this->endSection() ?>