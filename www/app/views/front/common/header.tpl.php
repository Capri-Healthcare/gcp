<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="Description" content="Glaucoma Care Plan">
    <title>Glaucoma Care Plan</title>
	<link rel="icon" type="image/x-icon" href="public/images/favicon.png" />
    <!-- Included Stylesheets -->
    <link rel="stylesheet" href="public/css/style-blue.min.css">
    <link rel="stylesheet" href="public/css/front.css">
    <link rel="stylesheet" href="public/css/responsive.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="logo">
                        <a href="">
                            <img src="public/images/gcp-logo.png" alt="Glaucoma Care Plan" title="Glaucoma Care Plan" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 logo_right">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo URL; ?>">Home</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="<?php echo URL.DIR_ROUTE.'login'; ?>">Login</a>
                                </li>
                                <li class="nav-item">
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