<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="Description" content="My Eye Record & Care">
    <title>My Eye Record & Care</title>
	<link rel="icon" type="image/x-icon" href="public/images/favicon.png" />
    <!-- Included Stylesheets -->
    <link rel="stylesheet" href="public/css/style-blue.min.css">
    <link rel="stylesheet" href="public/css/front.css">
    <link rel="stylesheet" href="public/css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        .active_tab {
            background-color: #005eb8;
            color: white;
        }
        .active_tab i{
            color: white;
        }
        .tooltip-inner {
            max-width: 500px !important;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="logo">
                        <!--a href="<?php echo URL; ?>">
                            <img src="public/images/gcp-logo.png" alt="My Eye Record & Care" title="My Eye Record & Care" />
                        </a-->
                    </div>
                </div>
                <div class="col-lg-6 logo_right">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                                <!--li class="nav-item">
                                    <a class="nav-link" href="<?php echo URL; ?>">Home</a>
                                </li-->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle  <?php echo ($selected_page == 'login') ? 'active' : ''; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="<?php echo URL.DIR_ROUTE.'login'; ?>">Login</a>
									
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="<?php echo URL_ADMIN; ?>">As an Optometrist</a>
                                        <a class="dropdown-item" href="<?php echo URL_ADMIN; ?>">As an Ophthalmologist</a>
                                        <a class="dropdown-item" href="<?php echo URL.DIR_ROUTE.'login'; ?>">As a Patient</a>
                                    </div>
                                </li>
                                <li class="nav-item <?php echo ($selected_page == 'register') ? 'active' : ''; ?>">
                                    <a class="nav-link" href="<?php echo URL.DIR_ROUTE.'register'; ?>">Register</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
</body>
</html>