<?php include(DIR_ADMIN . 'app/views/common/header.tpl.php'); ?>
    <div class="page-title">
        <div class="row align-items-center">
            <div class="col-sm-12">
                <h2 class="page-title-text d-inline-block"><?php echo $page_title; ?></h2>
                <div class="breadcrumbs d-inline-block">
                    <ul>
                        <li><a href="<?php echo URL_ADMIN; ?>">Dashboard</a></li>
                        <li><a href="<?php echo URL_ADMIN . DIR_ROUTE . 'optician-referral'; ?>">Optician Referral</a>
                        </li>
                        <li><?php echo $page_title; ?></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 text-right"></div>
        </div>
    </div>
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo $token; ?>">
        <input type="hidden" name="referral[id]" value="<?php echo $result['id']; ?>">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="<?php echo $token; ?>" id="token">
                            <input type="hidden" class="optician-refrrel-id" name="referral[id]"
                                   value="<?php echo $result['id']; ?>">

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name <span class="form-required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="ti-user"></i></span></div>
                                                    <input type="text" name="referral[first_name]" class="form-control"
                                                           value="<?php echo $result['first_name']; ?>"
                                                           placeholder="First Name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name <span class="form-required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="ti-user"></i></span></div>
                                                    <input type="text" name="referral[last_name]" class="form-control"
                                                           value="<?php echo $result['last_name']; ?>"
                                                           placeholder="Last Name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email <span class="form-required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="ti-email"></i></span></div>
                                                    <input type="email" name="referral[email]" class="form-control"
                                                           value="<?php echo $result['email']; ?>" placeholder="Email"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mobile <span class="form-required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="ti-mobile"></i></span></div>
                                                    <input type="text" name="referral[mobile]" class="form-control"
                                                           maxlength="11"
                                                           onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"
                                                           value="<?php echo $result['mobile']; ?>" placeholder="Mobile"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                    class="ti-check-box"></i></span>
                                                    </div>
                                                    <select name="referral[gender]" class="custom-select" required>
                                                        <option value="Male" selected>Male
                                                        </option>
                                                        <option value="Female">Female
                                                        </option>
                                                        <option value="Other">Other
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>DOB <span class="form-required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="ti-calendar"></i></span></div>
                                                    <input type="date" name="referral[dob]" class="form-control"
                                                           value="<?php echo $result['dob']; ?>"
                                                           max="<?php echo date('Y-m-d') ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address 1<span class="form-required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                    class="ti-check-box"></i></span>
                                                    </div>
                                                    <textarea name="referral[address_1]" class="form-control"
                                                              placeholder="Enter Address"
                                                              row=3><?php echo $result['address1']; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address 2</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="ti-check-box"></i></span></div>
                                                    <textarea name="referral[address_2]" class="form-control"
                                                              placeholder="Enter Address"
                                                              row=3><?php echo $result['address2']; ?></textarea>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="ti-tag"></i></span></div>
                                                    <input type="text" name="referral[city]" class="form-control"
                                                           value="<?php echo $result['city']; ?>"
                                                           placeholder="Enter City"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Post Code</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="ti-tag"></i></span></div>
                                                    <input type="text" name="referral[zip_code]" maxlength="6"
                                                           class="form-control"
                                                           value="<?php echo $result['zip_code']; ?>"
                                                           placeholder="Enter Post Code" onkeypress="return alphaNumericValidation(event)"
                                                           equired>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="panel-footer text-center">
                                        <button type="submit" name="submit" class="btn btn-primary"><i
                                                    class="ti-save-alt pr-2"></i> Next
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </form>
    <!-- include summernote css/js-->
    <link href="public/css/summernote-bs4.css" rel="stylesheet">
    <script type="text/javascript" src="public/js/summernote-bs4.min.js"></script>
    <script type="text/javascript" src="public/js/klinikal.summernote.js"></script>
    <script type="text/javascript" src="public/js/optician.js"></script>
    <script>
        $("a.open-pdf").fancybox({
            'frameWidth': 800,
            'frameHeight': 800,
            'overlayShow': true,
            'hideOnContentClick': false,
            'type': 'iframe'
        });

    </script>
    <!-- Footer -->
<?php include(DIR_ADMIN . 'app/views/common/footer.tpl.php'); ?>