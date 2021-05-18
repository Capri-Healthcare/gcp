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
                    <li><a href="<?php echo URL_ADMIN.DIR_ROUTE.'appointments'; ?>">Appointments</a></li>
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
                            <?php if (!empty($result['doctor_picture'])  && file_exists(DIR.'public/uploads/'.$result['doctor_picture'])) { ?>
                                <img class="img-fluid" src="<?php echo URL.'public/uploads/'.$result['doctor_picture']; ?>" alt="">
                            <?php } else { ?>
                                <span><?php echo $result['doctor_name'][0]; ?></span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class=row>
                    <div class="col-12">
                        <h3>Dr. <?php echo $result['doctor_name']; ?></h3>
                        <p class="mb-0 font-12"><i class="ti-email"></i> <?php echo $result['doctor_email']; ?> <i class="ti-mobile"></i> <?php echo $result['doctor_mobile']; ?></p>
                    </div>
                </div>
                <div class="user-details text-center pt-3">
                    
                    <ul class="v-menu text-left pt-0 nav d-block">
                        <li><a href="#appointment-info" class="<?php echo !isset($doc_type) ? 'active' : ''; ?>" data-toggle="tab"><i class="ti-info-alt"></i> <span>Appointment Info</span></a></li>
                        <?php if ($page_notes) { ?>
                            <li><a href="#appointment-records" data-toggle="tab"><i class="ti-calendar"></i> <span>Examination Notes</span></a></li>
                        <?php } if ($page_documents) { ?>
                            <li><a href="#appointment-documents" data-toggle="tab"><i class="ti-calendar"></i> <span>Documents</span></a></li>
                        <?php } if ($page_prescriptions) { ?>
                            <li><a href="#appointment-prescription" data-toggle="tab"><i class="ti-clipboard"></i> <span>Prescription</span></a></li>
                        <?php } if ($invoice_view || $invoice_add) { ?>
                            <li><a href="#appointment-invoice" data-toggle="tab"><i class="ti-receipt"></i> <span>Invoice</span></a></li>
                        <?php } ?>
                            <li><a href="#appointment-suporting-images" data-toggle="tab"><i class="ti-receipt"></i> <span>Images</span></a></li>
                            <li><a href="#appointment-pre-consultation-requirement" data-toggle="tab"><i class="ti-receipt"></i> <span>Pre-consultation requirement</span></a></li>
                        <?php if ($page_edit) { ?>
                            <li><a href="<?php echo URL_ADMIN.DIR_ROUTE.'appointment/edit&id='.$result['id']; ?>"><i class="ti-pencil-alt"></i> <span>Edit Appointment</span></a></li>
                        <?php } if ($page_sendmail) { ?>
                            <li><a href="#appointment-send-mail" class="<?php echo isset($doc_type) ? 'active' : ''; ?>"" data-toggle="tab"><i class="ti-email"></i> <span>Send Email</span></a></li>
                        <?php } ?>
                            <li><a href="#appointment-letters" data-toggle="tab"><i class="ti-email"></i> <span>Letters</span></a></li>
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
                        <div class="panel-title">Appointment Info</div> 
                        <?php if($result['consultation_type'] == 'video_consultation' AND $result['status'] == 3){ ?>                        
                            <div class="video_call_icon pull-right">
                                <div class="icon tbl-cell">
                                    <a href="<?php echo URL_ADMIN.DIR_ROUTE.'appointment/videoConsultation&token='.$result['video_consultation_token']; ?>" >
                                        <i class="fas fa-video"></i>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped patient-table">
                                <tbody>
                                    <tr>
                                        <td>Date & Time</td>
                                        <td class="text-dark"><?php echo date_format(date_create($result['date']), $common['info']['date_format']). ' at ' .$result['time']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Consultation Method</td>
                                        <td class="text-dark"><?php echo CONSULTATION_TYPE[$result['consultation_type']]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Reason/Problem</td>
                                        <td class="text-dark"><?php echo $result['message']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Patient Name</td>
                                        <td class="text-dark"><?php echo $result['name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email Address</td>
                                        <td class="text-dark"><?php echo $result['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile Number</td>
                                        <td class="text-dark"><?php echo $result['mobile']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Bloodgroup</td>
                                        <td class="text-primary"><?php echo $result['bloodgroup']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td class="text-info"><?php echo $result['gender']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Age</td>
                                        <td class="text-success"><?php echo $result['age_year'].' Years '.$result['age_month'].' Month'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>NHS Patient Number</td>
                                        <td><?php echo $result['nhs_patient_number']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>NHS Hostpital Number</td>
                                        <td><?php echo $result['nhs_hospital_number']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>GP Name</td>
                                        <td><?php echo $result['gp_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>GP Address</td>
                                        <td><?php echo $result['gp_address']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Medical History</td>
                                        <td class="text-danger"><?php if (!empty($result['history'])) { echo implode(', ', json_decode($result['history'], true)); } ?></td>
                                    </tr>
                                    <tr>
                                        <td>Special Requirements</td>
                                        <td><?php echo $result['special_requirements']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>
                                            <?php if ($result['appointment_status'] == 1) {
                                                echo '<span class="badge badge-sm badge-pill badge-info">In process</span>';
                                            } elseif ($result['appointment_status'] == 2) {
                                                echo '<span class="badge badge-sm badge-pill badge-warning">Document Requested</span>';
                                            } elseif ($result['appointment_status'] == 3) {
                                                echo '<span class="badge badge-sm badge-pill badge-success">Confirmed</span>';
                                            } elseif ($result['appointment_status'] == 5) {
                                                echo '<span class="badge badge-sm badge-pill badge-default">Completed</span>';
                                            } elseif ($result['appointment_status'] == 6) {
                                                echo '<span class="badge badge-sm badge-pill badge-danger">Cancelled</span>';
                                            } else {
                                                echo '<span class="badge badge-sm badge-pill badge-primary">New</span>';
                                            } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Doctor Note</td>
                                        <td><?php echo $result['doctor_note']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($page_notes) { ?>
                <div class="tab-pane fade" id="appointment-records">
                    <div class="panel panel-default">
                        <div class="panel-head">
                            <div class="panel-title">Examination Notes</div>
                            <?php /* if (!empty($notes)) { ?>
                                <div class="panel-action">
                                    <a href="<?php echo URL_ADMIN.DIR_ROUTE.'records/pdf&id='.$notes['id']; ?>" class="btn btn-danger btn-sm" target="_blank"><i class="ti-printer mr-2"></i>PDF/Print</a>
                                </div>
                            <?php } */ ?>
                        </div>
                        <div class="panel-body">
                            
                            <div class="row">
								<div class="col-md-12">
									<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-primary">
                                        <li class="nav-item active">
                                            <a class="nav-link active" href="#clinical-note" data-toggle="tab">Clinical Note</a>
                                        </li>
										<?php 
											foreach($finding_forms as $form){		 ?>
													<li class="nav-item">
														<a class="nav-link" href="#pre-consultation-form-id-<?php echo $form['id'] ?>" data-toggle="tab"><?php echo $form['name'] ?></a>
													</li>
										<?php		
												} 	?>	
									</ul>
								</div>
							</div>
                            
                            <div class="row">
								<div class="col-md-12 pre-consultation-form">
                                    <div class="tab-pane active mt-3" id="clinical-note">
                                        <div class="notes-container">
                                            <div class="timeline-1 timeline-2">
                                                <div class="marker"></div>
                                                <div class="item item-left notes-problem">
                                                    <div class="circle"><i class="ti-help-alt"></i></div>
                                                    <div class="arrow"></div>
                                                    <div class="item-content">
                                                        <div class="title">Problems</div>
                                                        <div class="descr">
                                                            <ul>
                                                                <?php if (!empty($notes['notes']['problem'])) { foreach ($notes['notes']['problem'] as $key => $value) { ?>
                                                                    <li><?php echo htmlspecialchars_decode($value); ?></li>
                                                                <?php } } ?>
                                                            </ul>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="item item-left notes-observation">
                                                    <div class="circle"><i class="ti-panel text-info"></i></div>
                                                    <div class="arrow"></div>
                                                    <div class="item-content">
                                                        <div class="title">Observation</div>
                                                        <div class="descr">
                                                            <ul>
                                                                <?php if (!empty($notes['notes']['observation'])) { foreach ($notes['notes']['observation'] as $key => $value) { ?>
                                                                    <li><?php echo htmlspecialchars_decode($value); ?></li>
                                                                <?php } } ?>
                                                            </ul>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="item item-left notes-diagnosis">
                                                    <div class="circle"><i class="ti-heart-broken text-secondary"></i></div>
                                                    <div class="arrow"></div>
                                                    <div class="item-content">
                                                        <div class="title">Diagnosis</div>
                                                        <div class="descr">
                                                            <ul>
                                                                <?php if (!empty($notes['notes']['diagnosis'])) { foreach ($notes['notes']['diagnosis'] as $key => $value) { ?>
                                                                    <li><?php echo htmlspecialchars_decode($value); ?></li>
                                                                <?php } } ?>
                                                            </ul>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="item item-left notes-investigation">
                                                    <div class="circle"><i class="ti-agenda text-success"></i></div>
                                                    <div class="arrow"></div>
                                                    <div class="item-content">
                                                        <div class="title">Test Request/Investigation</div>
                                                        <div class="descr">
                                                            <ul>
                                                                <?php if (!empty($notes['notes']['investigation'])) { foreach ($notes['notes']['investigation'] as $key => $value) { ?>
                                                                    <li><?php echo htmlspecialchars_decode($value); ?></li>
                                                                <?php } } ?>
                                                            </ul>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="item item-left notes-notes">
                                                    <div class="circle"><i class="ti-write text-primary"></i></div>
                                                    <div class="arrow"></div>
                                                    <div class="item-content">
                                                        <div class="title">Notes</div>
                                                        <div class="descr">
                                                            <ul>
                                                                <?php if (!empty($notes['notes']['notes'])) { foreach ($notes['notes']['notes'] as $key => $value) { ?>
                                                                    <li><?php echo $value; ?></li>
                                                                <?php } } ?>
                                                            </ul>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								<?php 
									foreach($finding_forms as $form){		?>
											<div class="tab-pane" id="pre-consultation-form-id-<?php echo $form['id'] ?>">
												<?php
													$form_details = $formObj->getForm($form['id']);
													$form_fields = $formObj->getFormField($form['id']);
													$form_answer = $formObj->getFormAnswer($result['id'], $form['id']);
													//print_r($form_fields);exit;
												?>
												<!--h1><?php echo $form_details['name'] ?></h1>
												<br>
												<h5><?php echo $form_details['description'] ?></h5-->
												<div class="row">
												
												<?php foreach($form_fields as $fields)	{ 	
														$answer = isset($form_answer[$fields['id']]) ? $form_answer[$fields['id']] : '';			?>
													<div class="col-md-<?php echo (in_array($fields['input_type'], ['heading', 'note'])) ? '12' : '6'; ?>">
														<?php	if(($fields['input_type'] == 'note')){	?>
																	<p class="font-15 mb-2"><?php echo $fields['note'] ?></p>
														<?php	} else if(($fields['input_type'] == 'heading')){	?>
																	<h3 class="mt-2 mb-0"><?php echo $fields['label'] ?></h3>
														<?php	} else if(($fields['input_type'] == 'file')){	?>
																	<h5 class="mb-0"><b><?php echo $fields['label'] ?></b></h5>
														<?php 		if(!empty($answer)){
																		$image_path = '../public/uploads/appointment/forms/' . $result['id'] . '/' . $form['id'] . '/' . $answer;
																			echo '<div class="col-md-1">';
																					echo '<a data-fancybox="gallery" href="' .$image_path . '">';
																						echo '<img class="form_thumb_img" src="' .$image_path . '">';
																					echo '</a>';
																			echo '</div>';
																		}
																} else {	?>
																	<h5 class="mb-0"><b><?php echo $fields['label'] ?></b></h5>
																	<p class="font-12"><?php echo $answer ?></p>
														<?php	}	?>														
													</div>
												<?php }		?>
													
												</div>
											</div>
								<?php	
									}			?>
								</div>
							</div>
                            
                        </div>
                    </div>
                </div>
            <?php } if ($page_documents) { ?>
                <div class="tab-pane fade" id="appointment-documents">
                    <div class="panel panel-default">
                        <div class="panel-head">
                            <div class="panel-title">Documents/Reports</div>
                            <div class="panel-title text-right">
                                <a class="btn btn-secondary btn-sm" href="<?php echo URL_ADMIN.DIR_ROUTE.'appointment/reportsExport&id='.$result['id']; ?>"><i class="ti-cloud-down mr-2"></i> Download Documents/Reports</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="report-container">
                                <?php if (!empty($reports)) { foreach ($reports as $key => $value) { $file_ext = pathinfo($value['report'], PATHINFO_EXTENSION); if ($file_ext == "pdf") { ?>
                                    <div class="report-image report-pdf">
                                        <a href="../public/uploads/appointment/reports/<?php echo $value['appointment_id'] . '/'.$value['report']; ?>" class="open-pdf font-12" style="display: block;">
                                            <img class="img-thumbnail" src="../public/images/pdf.png" alt="">
                                        </a>
                                    </div>
                                <?php } else {?>
                                    <div class="report-image">
                                        <a data-fancybox="gallery" href="../public/uploads/appointment/reports/<?php echo $value['appointment_id'] . '/'. $value['report']; ?>"><img class="img-thumbnail" src="../public/uploads/appointment/reports/<?php echo $value['appointment_id'] . '/'.$value['report']; ?>" alt=""></a>
                                    </div>
                                <?php } } } else { ?>
                                    <p class="text-danger text-center">No documents found !!!</p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } if ($invoice_view || $invoice_add) { ?>
                <div class="tab-pane fade" id="appointment-invoice">
                    <div class="panel panel-default">
                        <div class="panel-head">
                            <div class="panel-title">Invoice</div>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <?php if ($result['invoice_id']) { ?>
                                    <p>Invoice is Generated</p>
                                    <a href="<?php echo URL_ADMIN.DIR_ROUTE.'invoice/view&id='.$result['invoice_id']; ?>" class="btn btn-danger btn-sm" target="_blank"><i class="far fa-file-pdf mr-2"></i>View</a>
                                    <a href="<?php echo URL_ADMIN.DIR_ROUTE.'invoice/pdf&id='.$result['invoice_id']; ?>" class="btn btn-danger btn-sm" target="_blank"><i class="far fa-file-pdf mr-2"></i>PDF</a>
                                    <a href="<?php echo URL_ADMIN.DIR_ROUTE.'invoice/print&id='.$result['invoice_id']; ?>" class="btn btn-success btn-sm" target="_blank"><i class="ti-printer mr-2"></i>Print</a>
                                    <a href="<?php echo URL_ADMIN.DIR_ROUTE.'invoice/edit&id='.$result['invoice_id']; ?>" class="btn btn-info btn-sm" target="_blank"><i class="ti-pencil-alt mr-2"></i>Edit</a>
                                <?php } else { ?>
                                    <p>Invoice is not Generated</p>
                                    <a href="<?php echo URL_ADMIN.DIR_ROUTE.'invoice/add&appointment='.$result['id']; ?>" class="btn btn-primary btn-sm" target="_blank"><i class="ti-plus pr-2"></i>Generate Invoice Now</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } if ($page_prescriptions) { ?>
                <div class="tab-pane fade" id="appointment-prescription">
                    <div class="panel panel-default">
                        <div class="panel-head">
                            <div class="panel-title">Prescription</div>
                            <?php if (!empty($prescription['prescription'])) { ?>
                                <div class="panel-action">
                                    <a href="<?php echo URL_ADMIN.DIR_ROUTE.'prescription/pdf&id='.$result['prescription_id']; ?>" class="btn btn-danger btn-sm" target="_blank"><i class="ti-printer mr-2"></i>PDF/Print</a>
                                </div>
                            <?php } ?> 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Medicine Name</th>
                                        <th>Dose</th>
                                        <th>Duration</th>
                                        <th>Instruction</th>
                                    </tr>
                                    <?php if (!empty($prescription['prescription'])) { foreach ($prescription['prescription'] as $key => $value) { ?>
                                        <tr>
                                            <td>
                                                <p class="font-14 text-primary m-0"><?php echo $value['name']; ?></p>
                                                <p class="font-12 m-0"><?php echo htmlspecialchars_decode($value['generic']); ?></p>
                                            </td>
                                            <td class="text-center"><p class="font-12"><?php echo $value['dose']; ?></p></td>
                                            <td class="text-center"><p class="font-12"><?php echo $value['duration'].' Day'; ?></p></td>
                                            <td class="text-center"><p class="font-12"><?php echo $value['instruction']; ?></p></td>
                                        </tr>
                                    <?php } } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } if ($page_sendmail) { ?>
                <div class="tab-pane fade show <?php echo isset($doc_type) ? 'show active' : ''; ?>" id="appointment-send-mail">
                    <div class="panel panel-default">
                        <div class="panel-head">
                            <div class="panel-title">Send Email to Patient</div>  
                        </div>
                        <form action="<?php echo URL_ADMIN.DIR_ROUTE.'appointment/sendmail'; ?>" method="post" enctype="multipart/form-data">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>To</label>
                                    <input type="text" value="<?php echo $result['name']; ?>" class="form-control" readonly>
                                    <input type="hidden" name="mail[id]" value="<?php echo $result['id']; ?>" readonly>
                                    <input type="hidden" name="_token" value="<?php echo $token; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" name="mail[subject]" class="form-control" placeholder="Enter SUbject . . .">
                                </div>
                                <div class="form-group">
                                    <label>CC</label>
                                    <input type="text" name="mail[cc]" class="form-control" value="<?php echo (isset($doc_type) AND !empty($result['gp_email'])) ? $result['gp_email'] : ''; ?>" placeholder="Enter CC . . .">
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea name="mail[message]" class="form-control mail-summernote" placeholder="Enter Message . . ."></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Attachment</label>
                                    <input type="file" multiple="multiple" name="mail[attach_file][]" />
                                </div>
                                
                                <?php if(isset($doc_type) AND !empty($doc_type)){    ?>
                                    <div class="form-group">
                                        <label><strong>Note:</strong></label> This email sent with <?php echo str_replace("-", " ", $doc_type); ?> document
                                        <input type="hidden" name="mail[doc_type]" value="<?php echo $doc_type; ?>" />
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="panel-footer text-center">
                                <button type="submit" name="submit" class="btn btn-primary">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php } ?>
                <div class="tab-pane fade" id="appointment-suporting-images">
                    <div class="panel panel-default">
                        <div class="panel-head">
                            <div class="panel-title">Images</div>
                            <div class="panel-title text-right">
                                <a class="btn btn-secondary btn-sm" href="<?php echo URL_ADMIN.DIR_ROUTE.'appointment/imagesExport&id='.$result['id']; ?>"><i class="ti-cloud-down mr-2"></i> Download Images</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="report-container">
                            <?php 
                                if(!empty($appointment_images)) {
                                    foreach($appointment_images AS $image) { ?>
                                    <div class="report-image">
                                        <a data-fancybox="gallery" href="../public/uploads/appointment/images/<?php echo $image['appointment_id'] ?>/<?php echo $image['filename']; ?>">
                                            <img src="../public/uploads/appointment/images/<?php echo $image['appointment_id'] ?>/<?php echo $image['filename']; ?>" alt="<?php echo $image['name']; ?>" class="blur_img">
                                            <span><?php echo $image['name']; ?></span>
                                        </a>
                                    </div>
                            <?php 	} 
                                } else { ?>
                                    <p class="text-center">Image is not available</p>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>


            <div class="tab-pane fade" id="appointment-pre-consultation-requirement">
                <div class="panel panel-default">
                    <div class="panel-head">
                        <div class="panel-title">Pre Consultation Requirement</div>
                    </div>
                    <div class="panel-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-primary">
                                    <?php 
                                        $active = "active";
                                        foreach($pre_consultation_forms as $form){												
                                            if(in_array($form['id'], $selected_forms)){ ?>
                                                <li class="nav-item">
                                                    <a class="nav-link <?php echo $active ?>" href="#pre-consultation-form-id-<?php echo $form['id'] ?>" data-toggle="tab"><?php echo $form['name'] ?></a>
                                                </li>
                                    <?php		$active = "";
                                            } 
                                        }			?>	
                                </ul>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 pre-consultation-form">
                            <?php 
                                $active = "active";
                                foreach($pre_consultation_forms as $form){										
                                    if(in_array($form['id'], $selected_forms)){ ?>
                                        <div class="tab-pane <?php echo $active ?>" id="pre-consultation-form-id-<?php echo $form['id'] ?>">
                                            <?php
                                                $form_details = $formObj->getForm($form['id']);
                                                $form_fields = $formObj->getFormField($form['id']);
                                                $form_answer = $formObj->getFormAnswer($result['id'], $form['id']);
                                                //print_r($form_fields);exit;
                                            ?>
                                            <!--h1><?php echo $form_details['name'] ?></h1>
                                            <br>
                                            <h5><?php echo $form_details['description'] ?></h5-->
                                            <div class="row">
                                            
                                            <?php foreach($form_fields as $fields)	{ 	
                                                    $answer = isset($form_answer[$fields['id']]) ? $form_answer[$fields['id']] : '';			?>
                                                <div class="col-md-<?php echo (in_array($fields['input_type'], ['heading', 'note'])) ? '12' : '6'; ?>">
                                                    <?php	if(($fields['input_type'] == 'note')){	?>
                                                                <p class="font-15 mb-2"><?php echo $fields['note'] ?></p>
                                                    <?php	} else if(($fields['input_type'] == 'heading')){	?>
                                                                <h3 class="mt-2 mb-0"><?php echo $fields['label'] ?></h3>
                                                    <?php	} else if(($fields['input_type'] == 'file')){	?>
                                                                <h5 class="mb-0"><b><?php echo $fields['label'] ?></b></h5>
                                                    <?php 		if(!empty($answer)){
                                                                    $image_path = '../public/uploads/appointment/forms/' . $result['id'] . '/' . $form['id'] . '/' . $answer;
                                                                        echo '<div class="col-md-1">';
                                                                                echo '<a data-fancybox="gallery" href="' .$image_path . '">';
                                                                                    echo '<img class="form_thumb_img" src="' .$image_path . '">';
                                                                                echo '</a>';
                                                                        echo '</div>';
                                                                    }
                                                            } else {	?>
                                                                <h5 class="mb-0"><b><?php echo $fields['label'] ?></b></h5>
                                                                <p class="font-12"><?php echo $answer ?></p>
                                                    <?php	}	?>														
                                                </div>
                                            <?php }		?>
                                                
                                            </div>
                                        </div>
                            <?php		$active = "";
                                    } 
                                }			?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="appointment-letters">
                <div class="panel panel-default">
                    <div class="panel-head">
                        <div class="panel-title">Download letter</div>
                    </div>
                    <div class="panel-body">
                        
                        <div class="row">
                            <table class='table table-middle table-bordered table-striped pb-5'>
							    <thead>
			    					<tr>
									    <th>Document</th>
									    <th width="15%">Action</th>
		    						</tr>
                                </thead>
                            
                                <tbody>
                                    <tr>
                                        <td>Appointment letter</td>
                                        <td> 
                                            <span style="font-size: 16px; margin-right: 15px;">
                                                <a href="index.php?route=appointment/letters&id=<?php echo $result['id']; ?>&doc_type=appointment&action=download"><i class="ti-download"></i></a>
                                            </span>
                                            <span style="font-size: 16px; margin-right: 15px;">
                                                <a href="index.php?route=appointment/view&id=<?php echo $result['id']; ?>&doc_type=appointment"><i class="ti-email"></i></a>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Examination notes</td>
                                        <td> 
                                            <span style="font-size: 16px; margin-right: 15px;">
                                                <a href="index.php?route=appointment/letters&id=<?php echo $result['id']; ?>&doc_type=examination-note&action=download"><i class="ti-download"></i></a>
                                            </span>
                                            <span style="font-size: 16px; margin-right: 15px;">
                                                <a href="index.php?route=appointment/view&id=<?php echo $result['id']; ?>&doc_type=examination-note"><i class="ti-email"></i></a>
                                            </span>
                                        </td>
                                    </tr>
                                    <!--tr>
                                        <td>Discharge letter</td>
                                        <td> 
                                            <span style="font-size: 16px; margin-right: 15px;">
                                                <a href="index.php?route=appointment/letters&id=<?php echo $result['id']; ?>&doc_type=discharge&action=download"><i class="ti-download"></i></a>
                                            </span>
                                            <span style="font-size: 16px; margin-right: 15px;">
                                                <a href="index.php?route=appointment/letters&id=<?php echo $result['id']; ?>&doc_type=discharge&action=download"><i class="ti-email"></i></a>
                                            </span>
                                        </td>
                                    </tr-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php if ($page_sendmail) { ?>
    <!-- include summernote css/js-->
    <link href="public/css/summernote-bs4.css" rel="stylesheet">
    <script type="text/javascript" src="public/js/summernote-bs4.min.js"></script>
    <script type="text/javascript" src="public/js/klinikal.summernote.js"></script>
<?php } ?>
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