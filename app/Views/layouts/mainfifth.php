<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>Azures BootStrap</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/styles/bootstrap.css'); ?>">


    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/styles/style.css'); ?>">

    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap"
        rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fonts/css/fontawesome-all.min.css'); ?>">


    <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/app/icons/icon-192x192.png'); ?>">

    <script>
        // Ignore this in your implementation
        window.isMbscDemo = true;
    </script>

    <title>Display modes</title>

    <!-- Mobiscroll JS and CSS Includes -->
    <link rel="stylesheet"  href="<?php echo base_url('assets/cascading_style/mobiscroll.javascript.min.css'); ?>">
 
    <script type="text/javascript" src="<?php echo base_url('assets/javascript/mobiscroll.javascript.min.js'); ?>"></script>
   

    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
        }

        body,
        html {
            height: 100%;
        }
    </style>
</head>

<body class="theme-light">
<?= $this->renderSection('content') ?>

    <script>

        mobiscroll.settings = {
            lang: 'en',                  // Specify language like: lang: 'pl' or omit setting to use default
            theme: 'ios',                // Specify theme like: theme: 'ios' or omit setting to use default
            themeVariant: 'light'        // More info about themeVariant: https://docs.mobiscroll.com/4-10-10/javascript/popup#opt-themeVariant
        };

        var bottomDemo = mobiscroll.popup('#demo-bottom', {
            display: 'bottom',       // Specify display mode like: display: 'bottom' or omit setting to use default
            buttons: [{              // More info about buttons: https://docs.mobiscroll.com/4-10-10/javascript/popup#opt-buttons
                text: 'Ok',
                handler: 'set'
            },
                'cancel'
            ]
        }),

            topDemo = mobiscroll.popup('#demo-top', {
                display: 'top',          // Specify display mode like: display: 'bottom' or omit setting to use default
                buttons: [{              // More info about buttons: https://docs.mobiscroll.com/4-10-10/javascript/popup#opt-buttons
                    text: 'Ok',
                    handler: 'set'
                },
                    'cancel'
                ]
            }),

            centerDemo = mobiscroll.popup('#demo-center', {
                display: 'center',       // Specify display mode like: display: 'bottom' or omit setting to use default
                buttons: [{              // More info about buttons: https://docs.mobiscroll.com/4-10-10/javascript/popup#opt-buttons
                    text: 'Ok',
                    handler: 'set'
                },
                    'cancel'
                ]
            }),

            bubbleDemo = mobiscroll.popup('#demo-bubble', {
                display: 'bubble',       // Specify display mode like: display: 'bottom' or omit setting to use default
                anchor: '#show-bubble',  // More info about anchor: https://docs.mobiscroll.com/4-10-10/javascript/popup#opt-anchor
                buttons: [{              // More info about buttons: https://docs.mobiscroll.com/4-10-10/javascript/popup#opt-buttons
                    text: 'Ok',
                    handler: 'set'
                },
                    'cancel'
                ]
            });

        document
            .getElementById('show-bottom')
            .addEventListener('click', function () {
                bottomDemo.show();
            });

        document
            .getElementById('show-top')
            .addEventListener('click', function () {
                topDemo.show();
            });

        document
            .getElementById('show-center')
            .addEventListener('click', function () {
                centerDemo.show();
            });

        document
            .getElementById('show-bubble')
            .addEventListener('click', function () {
                bubbleDemo.show();
            });
    </script>

    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->

    <!-- <script type="text/javascript" src="javascript/mobiscroll.javascript.min.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url('assets/scripts/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/scripts/custom.js'); ?>"></script>

</body>
</html>