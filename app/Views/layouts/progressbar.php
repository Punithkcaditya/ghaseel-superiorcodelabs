
<html lang="en">
    <head>
        <meta charset="utf-8">
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>/assetstwo/css/boostrap.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>/assetstwo/css/fileinput.css" />
        <title><?= isset($page_title) ? $page_title.' | ' : "" ?><?= env('system_name') ?></title>
        <!-- cust -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- cust end -->



        <script type="text/javascript" src="<?php echo base_url(); ?>/assetstwo/js/notify.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>/assetstwo/js/fileinput.js"></script>

        <style type="text/css">

            ::selection { background-color: #E13300; color: white; }
            ::-moz-selection { background-color: #E13300; color: white; }

            body {
                background-color: #fff;
                margin: 40px;
                font: 13px/20px normal Helvetica, Arial, sans-serif;
                color: #4F5155;
            }

            a {
                color: #003399;
                background-color: transparent;
                font-weight: normal;
            }

            h1 {
                color: #444;
                background-color: transparent;
                border-bottom: 1px solid #D0D0D0;
                font-size: 19px;
                font-weight: normal;
                margin: 0 0 14px 0;
                padding: 14px 15px 10px 15px;
            }

            code {
                font-family: Consolas, Monaco, Courier New, Courier, monospace;
                font-size: 12px;
                background-color: #f9f9f9;
                border: 1px solid #D0D0D0;
                color: #002166;
                display: block;
                margin: 14px 0 14px 0;
                padding: 12px 10px 12px 10px;
            }

            #body {
                margin: 0 15px 0 15px;
            }

            p.footer {
                text-align: right;
                font-size: 11px;
                border-top: 1px solid #D0D0D0;
                line-height: 32px;
                padding: 0 10px 0 10px;
                margin: 20px 0 0 0;
            }

            #container {
                margin: 10px;
                border: 1px solid #D0D0D0;
                box-shadow: 0 0 8px #D0D0D0;
            }
        </style>
    </head>
    <body>
    <div id="container">
    <nav class="navbar navbar-expand-md navbar-dark bg-primary bg-gradient">
    <div class="container">
        <a class="navbar-brand" href="https://sourcecodester.com"><?= env('short_name') ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link <?= isset($page_title) && $page_title == 'Home' ? 'active' : '' ?>" aria-current="page" href="<?= base_url() ?>">Home</a>
            </li>
            <li><a class="nav-link <?= isset($page_title) && $page_title == 'Departments' ? 'active' : '' ?>" href="<?= base_url('Main/departments') ?>">Departments</a></li>
            <li><a class="nav-link <?= isset($page_title) && $page_title == 'Designations' ? 'active' : '' ?>" href="<?= base_url('Main/designations') ?>">Designations</a></li>
            <li><a class="nav-link <?= isset($page_title) && $page_title == 'Employees' ? 'active' : '' ?>" href="<?= base_url('Main/employees') ?>">Employees</a></li>
            <li><a class="nav-link <?= isset($page_title) && $page_title == 'Payrolls' ? 'active' : '' ?>" href="<?= base_url('Main/payrolls') ?>">Payrolls</a></li>
            <li><a class="nav-link <?= isset($page_title) && $page_title == 'Payslips' ? 'active' : '' ?>" href="<?= base_url('Main/payslips') ?>">Payslips</a></li>
            <li><a class="nav-link <?= isset($page_title) && $page_title == 'Users' ? 'active' : '' ?>" href="<?= base_url('Main/users') ?>">Users</a></li>
            <li><a class="nav-link <?= isset($page_title) && $page_title == 'upload' ? 'active' : '' ?>" href="<?= base_url('Upload') ?>">Upload</a></li>
        </ul>
        <div class="dropdown">
            <button type='button' class="" id="user-topnav-menu" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user rounded-circle border"></i> <i class="fa fa-angle-down text-muted"></i></button>
            <ul class="dropdown-menu" aria-labelledby="user-topnav-menu-items">
                <li><a class="dropdown-item" href="<?= base_url('update_user') ?>"><i class="fa fa-cog text-muted"></i> Update User</a></li>
                <li><a class="dropdown-item" href="<?= base_url('logout') ?>"><i class="fa fa-sign-out text-muted"></i> Logout</a></li>
            </ul>
        </div>
    </div>
    </nav>
    <?= $this->renderSection('content') ?>
    </div>

<script>

    $("#file-3").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-primary btn-lg"

    });

    $(function () {
        var inputFile = $('input[name=userfile]');
        var uploadURI = $('#form-upload').attr('action');
        var progressBar = $('#progress-bar');

        $("form#form-upload").submit(function () {
            event.preventDefault();
            var fileToUpload = inputFile[0].files[0];
            // make sure there is file to upload
            if (fileToUpload != 'undefined') {
                // provide the form data
                // that would be sent to sever through ajax
                var formData = new FormData($(this)[0]);
                // now upload the file using $.ajax
                $.ajax({
                    url: uploadURI,
                    type: 'post',
                    headers: {'X-Requested-With': 'XMLHttpRequest'},
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data.result == '1') {

                            $.notify({
                                title: "<strong>Upload Completed</strong> ",
                                message: "Uploading Cover Image for Listing Completed..!"
                            }, {
                                type: 'success'
                            });

                        } else {
                            $.notify({
                                title: "<strong>Upload Completed</strong> ",
                                message: "Uploading Default Cover Image for Listing Completed..!"
                            }, {
                                type: 'warning'
                            });
                        }
                    },
                    error: function(data)
		           {
		            alert("error");
					console.log(data);
		           },
                    xhr: function () {
                        var xhr = new XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function (event) {
                            if (event.lengthComputable) {
                                var percentComplete = Math.round((event.loaded / event.total) * 100);
                                // console.log(percentComplete);

                                $('.progress').show();
                                progressBar.css({width: percentComplete + "%"});
                                progressBar.text(percentComplete + '%');
                            }
                            ;
                        }, false);
                        return xhr;
                    }
                });
            }
        });
        $('body').on('change.bs.fileinput', function (e) {
            $('.progress').hide();
            progressBar.text("0%");
            progressBar.css({width: "0%"});
        });
    });

</script>
</body>
</html>