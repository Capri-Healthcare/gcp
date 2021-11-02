<?php include (DIR_ADMIN.'app/views/common/header.tpl.php'); ?>
<link rel="stylesheet" href="public/css/jquery.fancybox.min.css">
<script src="public/js/jquery.fancybox.min.js"></script>
<div class="page-title">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h2 class="page-title-text d-inline-block"><?php echo $page_title; ?></h2>
            <div class="breadcrumbs d-inline-block">
                <ul>
                    <li><a href="<?php echo URL_ADMIN; ?>">Dashboard</a></li>
                    <li><a href="<?php echo URL_ADMIN . DIR_ROUTE . 'optician-referral'; ?>">Optician Referral</a>
                    <li><?php echo $page_title; ?></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 text-right"></div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class=row>
                    <div class="col-12">
                        <div class="user-avtar">
                            <span><?php echo $user['firstname'][0]; ?></span>
                        </div>
                    </div>
                </div>
                <div class=row>
                    <div class="col-12">
                        <h3><?php echo $user['firstname']." ".$user['lastname']; ?></h3>
                        <h6><?php echo $user['optician_shop_name']; ?> | <?php echo $user['optician_registration_number']; ?></h6>
                        <p class="mb-0 font-12"><i class="ti-email"></i> <?php echo $user['email']; ?> <br/> <i class="ti-mobile"></i> <?php echo $user['mobile']; ?></p>
                    </div>
                </div>
                <div class="user-details text-center pt-3">
                    
                    <ul class="v-menu text-left pt-0 nav d-block">
                        <li><a href="#appointment-info" class="active" data-toggle="tab"><i class="ti-info-alt"></i> <span>Referral Details</span></a></li>
                       <?php  if ($page_documents) { ?>
                            <li><a href="#appointment-documents" data-toggle="tab"><i class="ti-calendar"></i> <span>Scan & Reports</span></a></li>
                      <?php } ?>
                        <?php if ($page_edit) { ?>
                            <?php if ($result['status'] == 'NEW') { ?>
                            <li><a href="<?php echo URL_ADMIN.DIR_ROUTE.'optician-referral/edit&id='.$result['id']; ?>"><i class="ti-pencil-alt"></i> <span>Edit Referral Details</span></a></li>
                        <?php }  ?>
                        <?php }  ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="tab-content">
            <div class="tab-pane fade <?php echo !isset($doc_type) ? 'show active' : ''; ?>" id="appointment-info">
                <div class="panel panel-default">
                    <div class="panel-head">
                        <div class="panel-title">Referral Details</div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped patient-table">
                                <tbody>

                                    <tr>
                                        <td>First Name</td>
                                        <td class="text-dark"><?php echo $result['first_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Last Name</td>
                                        <td class="text-dark"><?php echo $result['last_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td class="text-dark"><?php echo $result['gender']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile/Landline number</td>
                                        <td class="text-dark"><?php echo $result['mobile']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Office number</td>
                                        <td class="text-dark"><?php echo $result['office_phone']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td class="text-dark"><?php echo $result['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Date of Birth</td>
                                        <td class="text-dark"><?php echo date_format(date_create($result['dob']), $common['info']['date_format']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Address 1</td>
                                        <td class="text-dark"><?php echo $result['address1']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Address 2</td>
                                        <td class="text-dark"><?php echo $result['address2']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>City</td>
                                        <td class="text-dark"><?php echo $result['city'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Post Code</td>
                                        <td><?php echo $result['zip_code']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td><?php echo constant('STATUS')[$result['status']]; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <?php if ($page_documents) { ?>
                <div class="tab-pane fade" id="appointment-documents">
                    <div class="panel panel-default">
                        <div class="panel-head">
                            <div class="panel-title">Scan & Reports</div>
                        </div>
                        <div class="panel-body">
                            <div class="report-container">
                                <?php if (!empty($reports)) { foreach ($reports as $key => $value) { $file_ext = pathinfo($value['filename'], PATHINFO_EXTENSION); if ($file_ext == "pdf") { ?>
                                    <div class="report-image report-pdf">
                                        <a href="../public/uploads/optician-referral/document/<?php echo $value['referral_list_id'] . '/'.$value['filename']; ?>" class="open-pdf font-12" style="display: block;">
                                            <img class="img-thumbnail" src="../public/images/pdf.png" alt="">
                                            <span><?php echo $value['name']; ?></span>
                                        </a>
                                    </div>
                                <?php } else {?>
                                    <div class="report-image">
                                        <a data-fancybox="gallery" href="../public/uploads/optician-referral/document/<?php echo $value['referral_list_id'] . '/'. $value['filename']; ?>">
                                            <img class="img-thumbnail" src="../public/uploads/optician-referral/document/<?php echo $value['referral_list_id'] . '/'.$value['filename']; ?>" alt="">
                                            <span><?php echo $value['name']; ?></span>
                                        </a>

                                    </div>
                                <?php } } } else { ?>
                                    <p class="text-danger text-center">No documents found !!!</p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>

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
<?php include (DIR_ADMIN.'app/views/common/footer.tpl.php'); ?>