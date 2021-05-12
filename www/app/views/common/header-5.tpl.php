<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $meta_tag; ?></title>
    <meta name="Description" content="<?php echo $meta_description; ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo $favicon; ?>" />
    <?php if (empty($siteinfo['ga'])) { ?>
        <!-- Google Analytics -->
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', '<?php echo $siteinfo['ga']; ?>', 'auto');
            ga('send', 'pageview');
        </script>
        <!-- End Google Analytics -->
    <?php } ?>
    <link rel="stylesheet" href="<?php echo $stylesheet; ?>">
    <?php if (isset($custom_css)) { echo '<style>'.$custom_css.'</style>'; } ?>
    
<link rel="stylesheet" href="public/css/custom.css">
</head>
<body>
    <!-- Header Start -->
    <header>
        <div id="hdr-wrapper" class="fixed-on-scroll">
            <div class="hdr row">
                <div class="col-md-12">
                    <div class="tbl patient_left">
                        <div class="tbl-row">
                            <div class="tbl-cell hdr-logo p-3">
                                <a href="<?php echo URL; ?>">
                                    <img src="<?php echo $logo; ?>" alt="<?php echo $siteinfo['name']; ?>">
                                </a>
                            </div>
                        </div>
                    </div>
               
                
                <?php if(!empty($user['name'])) {   ?>
                    
                        <div class="user-name patient_right text-right" style="border-bottom:0px;">
                            <div class="menu-dropdown-wrapper">
                                <a>
                                    <div class="d-inline-block"><i class="far fa-user-circle" style="color: white;"></i></div>
                                    <div class="d-inline-block">
                                        <span class="text-left" style="color: white;"><?php echo $lang['text_hello']; ?></span>
                                        <h2 style="color: white;"><?php echo $user['name']; ?></h2>
                                    </div>
                                </a>
                                
                                <ul class="menu-dropdown menu-dropdown-right">
                                    <li>
                                        <a href="<?php echo URL.DIR_ROUTE; ?>user/appointments"><?php echo $lang['text_my_appointments']; ?></a>
                                    </li>
                                    <!--li>
                                        <a href="<?php echo URL.DIR_ROUTE; ?>user/request"><?php echo $lang['text_my_requests']; ?></a>
                                    </li-->
                                    <li>
                                        <a href="<?php echo URL.DIR_ROUTE; ?>user/profile"><?php echo $lang['text_my_profile']; ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo URL.DIR_ROUTE; ?>logout"><?php echo $lang['text_logout']; ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } else if(isset($doctor_details)){     ?>
                    <div class="user-name patient_right text-right" style="border-bottom:0px;">
                        <div class="d-inline-block" style="vertical-align: middle"><i class="far fa-user-circle" style="color: white;"></i></div>
                        <div class="d-inline-block" style="vertical-align: middle">
                            <span class="text-left" style="color: white; font-size:16px;"><?php echo $doctor_details['name']; ?></span>
                        </div>
                    </div>
                <?php } ?>                
            </div>
        </div>
    </header>
    <!-- Header End -->