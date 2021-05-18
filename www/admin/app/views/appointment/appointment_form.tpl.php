<?php include (DIR_ADMIN.'app/views/common/header.tpl.php'); ?>
<link rel="stylesheet" href="public/css/jquery.fancybox.min.css">
<link rel="stylesheet" href="public/css/custom.css">
<script src="public/js/jquery.fancybox.min.js"></script>
<script src="public/js/appointment.js"></script>
<div class="page-title">
	<div class="row align-items-center">
		<div class="col-sm-6">
			<h2 class="page-title-text d-inline-block"><?php echo $page_title; ?></h2>
			<div class="breadcrumbs">
				<ul>
					<li><a href="<?php echo URL_ADMIN; ?>">Dashboard</a></li>
					<li><a href="<?php echo URL_ADMIN.DIR_ROUTE.'appointments'; ?>">Appointments</a></li>
					<li><?php echo $page_title; ?></li>
				</ul>
			</div>
		</div>
		<div class="col-sm-6 text-right">
			<a href="<?php echo URL_ADMIN.DIR_ROUTE.'appointment/view&id='.$result['id']; ?>" class="btn btn-white btn-sm"><i class="ti-calendar text-primary mr-2"></i> View Appointment</a>
		</div>
	</div>
</div>


	<div class="panel panel-default">
		<div class="panel-body">
			<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-primary">
				<li class="nav-item">
					<a class="nav-link active" href="#appointment-info" data-toggle="tab">Appointment Info</a>
				</li>
				<?php if ($page_notes) { ?>
					<li class="nav-item">
						<a class="nav-link" href="#appointment-records" data-toggle="tab">Examination Notes</a>
					</li>
				<?php } if ($page_prescriptions) { ?>
					<li class="nav-item">
						<a class="nav-link" href="#appointment-prescription" data-toggle="tab">Prescription</a>
					</li>
				<?php } if ($page_document_upload || $page_documents) { ?>
					<li class="nav-item">
						<a class="nav-link" href="#appointment-documents" data-toggle="tab">Documents</a>
					</li>
				<?php } if ($invoice_view || $invoice_add) { ?>
					<li class="nav-item">
						<a class="nav-link" href="#appointment-invoice" data-toggle="tab">Invoice</a>
					</li>
				<?php } ?>
					<li class="nav-item">
						<a class="nav-link" href="#appointment-suporting-images" data-toggle="tab">Images</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#appointment-pre-consultation-requirement" data-toggle="tab">Pre-consultation requirement</a>
					</li>
			</ul>
			<div class="tab-content pt-4">
				<div class="tab-pane active" id="appointment-info">
					<form action="<?php echo $action ?>" method="post">
					<input type="hidden" name="_token" class="token" value="<?php echo $token; ?>">
					<input type="hidden" name="form_type" value="appointment_info">
					<input type="hidden" class="appointment-id" name="appointment[id]" value="<?php echo $result['id'];?>">
					<div id="apnt-info" class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Doctor <span class="form-required">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-user"></i></span>
									</div>
									<select name="appointment[doctor]" class="custom-select apnt-doctor" required>
										<option value="">Select Doctor</option>
										<?php foreach ($doctors as $value) { ?>
											<option value="<?php echo $value['id']; ?>" data-department="<?php echo $value['department_id']; ?>" data-weekly="<?php echo htmlspecialchars($value['weekly'], ENT_QUOTES, 'UTF-8'); ?>" data-national="<?php echo htmlspecialchars($value['national'], ENT_QUOTES, 'UTF-8'); ?>" <?php if ($result['doctor_id'] == $value['id']) { echo "selected"; } ?> ><?php echo $value['name'].' (' . $value['department'] . ')'; ?></option>
										<?php } ?>
									</select>
									<input type="hidden" class="apnt-department" name="appointment[department]" value="<?php echo $result['department_id']; ?>">
								</div>
							</div>
							<div class="form-group">
								<label>Date <span class="form-required">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-calendar"></i></span>
									</div>
									<input type="text" class="form-control apnt-date" name="appointment[date]" placeholder="Select Date . . ." value="<?php echo date_format(date_create($result['date']), $common['info']['date_format']); ?>" required autocomplete="off">
								</div>
							</div>
							<div class="form-group">
								<label>Time <span class="form-required">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-timer"></i></span>
									</div>
									<input type="text" name="appointment[time]" class="form-control apnt-time" value="<?php echo $result['time']; ?>" readonly>
									<input type="hidden" name="appointment[slot]" class="apnt-slot-time" value="<?php echo $result['slot']; ?>" required>
								</div>
								<div class="apnt-slot"></div>
							</div>
							<div class="form-group">
								<label>Consultation Method <span class="form-required">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-user"></i></span>
									</div>
									<select name="appointment[consultation_type]" class="custom-select" required>
										<option value="">Select consultation Method</option>
										<?php if (!empty(CONSULTATION_TYPE)) { foreach (CONSULTATION_TYPE as $consultation_type_key => $consultation_type_value) { ?>
											<option value="<?php echo $consultation_type_key ?>" <?php echo ($result['consultation_type'] == $consultation_type_key) ? "Selected" : "" ?>><?php echo $consultation_type_value; ?></option>
										<?php } } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label>Status <span class="form-required">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-check-box"></i></span>
									</div>
									<select name="appointment[status]" class="custom-select" required>
										<option value="">Select appointment status</option>
										<?php if (!empty(APPOINTMENT_STATUS)) { foreach (APPOINTMENT_STATUS as $status_id => $status) { ?>
											<option value="<?php echo $status_id ?>" <?php echo ($result['status'] == $status_id) ? "Selected" : "" ?>><?php echo $status; ?></option>
										<?php } } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="apnt-user">
								<div class="edit"><i class="ti-pencil-alt"></i></div>
								<div class="user-container">
									<div class="row">
										<div class="col-auto">
											<div class="img">
												<!-- <img src="../public/uploads/author-1.jpg" alt=""> -->
												<span><?php echo $result['name'][0]; ?></span>
											</div>
										</div>
										<div class="col-auto pl-0">
											<div class="title mt-2">
												<h4 class="m-0"><a href="#" class="d-block text-primary"><?php echo $result['name']; ?></a></h4>
												<p class="font-12 mb-0 mt-2"><?php echo $result['email']; ?></p>
												<p class="font-12 mb-0"><?php echo $result['mobile']; ?></p>
											</div>
										</div>
									</div>
								</div>
								<div class="info">
									<p><i class="ti-heart-broken"></i> <span><?php echo $result['bloodgroup']; ?></span></p>
									<p><i class="ti-user"></i> <span><?php echo $result['gender']; ?></span></p>
									<p><i class="ti-calendar"></i> <span><?php echo $result['age_year'].' Years '.$result['age_month'].' Month'; ?></span></p>
									<p class="d-block mt-3">
										<i class="ti-wheelchair"></i> <?php if (!empty($result['history'])) { echo implode(', ', json_decode($result['history'], true)); } ?>
									</p>
								</div>
							</div>
							
							<div class="form-group">
								<label>Reason/Problem</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-comment-alt"></i></span>
									</div>
									<textarea class="form-control" name="appointment[message]"><?php echo $result['message']; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label>Doctor Note</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ti-comment-alt"></i></span>
									</div>
									<textarea class="form-control" name="appointment[doctor_note]"><?php echo $result['doctor_note']; ?></textarea>
								</div>
							</div>
							<div class="apnt-user-input">
								<div class="form-group">
									<label>Patient Name <span class="form-required">*</span></label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ti-user"></i></span>
										</div>
										<input type="text" class="form-control apnt-name" name="appointment[name]" value="<?php echo $result['name'] ?>" placeholder="Enter Patient Name . . ." required>
										<input type="hidden" class="patient-id" name="appointment[patient_id]" value="<?php echo $result['patient_id'] ?>">

									</div>
								</div>
								<div class="form-group">
									<label>Patient Email Address <span class="form-required">*</span></label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ti-email"></i></span>
										</div>
										<input type="text" class="form-control apnt-email" name="appointment[mail]" value="<?php echo $result['email'] ?>" placeholder="Enter Patient Email Address . . ." required>
									</div>
								</div>
								<div class="form-group">
									<label>Patient Mobile Number <span class="form-required">*</span></label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ti-mobile"></i></span>
										</div>
										<input type="text" class="form-control apnt-mobile" name="appointment[mobile]" value="<?php echo $result['mobile'] ?>" placeholder="Enter Patient Mobile Number . . ." required>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel-footer text-center">
						<button type="submit" name="submit" class="btn btn-primary"><i class="ti-save-alt pr-2"></i> Save</button>
					</div>
					</form>
				</div>
				<?php if ($page_prescriptions) { ?>
					<div class="tab-pane" id="appointment-prescription">
						<form action="<?php echo $action ?>" method="post">
						<input type="hidden" name="_token" value="<?php echo $token; ?>">
						<input type="hidden" name="form_type" value="appointment_prescription">
						<input type="hidden" name="appointment[name]" value="<?php echo $result['name'];?>">
						<input type="hidden" name="appointment[mail]" value="<?php echo $result['email'];?>">
						<input type="hidden" name="appointment[doctor]" value="<?php echo $result['doctor_id'];?>">
						<input type="hidden" name="appointment[patient_id]" value="<?php echo $result['name'];?>">
						<input type="hidden" class="appointment-id" name="appointment[id]" value="<?php echo $result['id'];?>">
						<input type="hidden" name="prescription[id]" value="<?php echo $result['prescription_id']; ?>">
						<div class="table-responsive">
							<table class="table table-bordered medicine-table">
								<thead>
									<tr class="medicine-row">
										<th style="width: 20%;">Drug Name</th>
										<th>Generic</th>
										<th style="width: 11%;">Frequency</th>
										<th style="width: 13%;">Duration</th>
										<th style="width: 20%;">Instruction</th>
										<th style="width: 5%;"></th>
									</tr>
								</thead>
								<tbody>
									<?php if (!empty($prescription['prescription'])) { foreach ($prescription['prescription'] as $key => $value) { ?>
										<tr class="medicine-row">
											<td>
												<input class="form-control prescription-name" name="prescription[medicine][<?php echo $key; ?>][name]" value="<?php echo $value['name'] ?>" placeholder="Medicine Name">
											</td>
											<td>
												<textarea class="form-control prescription-generic" name="prescription[medicine][<?php echo $key; ?>][generic]" rows="3" placeholder="Generic"><?php echo $value['generic'] ?></textarea>
											</td>
											<td>
												<select name="prescription[medicine][<?php echo $key; ?>][dose]" class="form-control">
													<option value="1-0-0" <?php if ($value['dose'] == '1-0-0') { echo "selected";} ?> >1-0-0</option>
													<option value="1-0-1" <?php if ($value['dose'] == '1-0-1') { echo "selected";} ?> >1-0-1</option>
													<option value="1-1-1" <?php if ($value['dose'] == '1-1-1') { echo "selected";} ?> >1-1-1</option>
													<option value="0-0-1" <?php if ($value['dose'] == '0-0-1') { echo "selected";} ?> >0-0-1</option>
													<option value="0-1-0" <?php if ($value['dose'] == '0-1-0') { echo "selected";} ?> >0-1-0</option>
												</select>
											</td>
											<td>
												<select name="prescription[medicine][<?php echo $key; ?>][duration]" class="form-control">
													<option value="1" <?php if ($value['duration'] == '1') { echo "selected";} ?> >1 Days</option>
													<option value="2" <?php if ($value['duration'] == '2') { echo "selected";} ?> >2 Days</option>
													<option value="3" <?php if ($value['duration'] == '3') { echo "selected";} ?> >3 Days</option>
													<option value="4" <?php if ($value['duration'] == '4') { echo "selected";} ?> >4 Days</option>
													<option value="5" <?php if ($value['duration'] == '5') { echo "selected";} ?> >5 Days</option>
													<option value="6" <?php if ($value['duration'] == '6') { echo "selected";} ?> >6 Days</option>
													<option value="8" <?php if ($value['duration'] == '8') { echo "selected";} ?> >8 Days</option>
													<option value="10" <?php if ($value['duration'] == '10') { echo "selected";} ?> >10 Days</option>
													<option value="15" <?php if ($value['duration'] == '15') { echo "selected";} ?> >15 Days</option>
													<option value="20" <?php if ($value['duration'] == '20') { echo "selected";} ?> >20 Days</option>
													<option value="30" <?php if ($value['duration'] == '30') { echo "selected";} ?> >30 Days</option>
													<option value="60" <?php if ($value['duration'] == '60') { echo "selected";} ?> >60 Days</option>
												</select>
											</td>
											<td>
												<textarea name="prescription[medicine][<?php echo $key; ?>][instruction]" class="form-control" rows="3" placeholder="Instruction"><?php echo $value['instruction']; ?></textarea>
											</td>
											<td>
												<a class="table-action-button medicine-delete"><i class="ti-trash text-danger"></i></a>
											</td>
										</tr>
									<?php } } else { ?>
										<tr class="medicine-row">
											<td>
												<input class="form-control prescription-name" name="prescription[medicine][0][name]" placeholder="Medicine Name">
											</td>
											<td>
												<textarea name="prescription[medicine][0][generic]" class="form-control prescription-generic" rows="3" placeholder="Generic"></textarea>
											</td>
											<td>
												<select name="prescription[medicine][0][dose]" class="form-control">
													<option value="1-0-0">1-0-0</option>
													<option value="1-0-1">1-0-1</option>
													<option value="1-1-1">1-1-1</option>
													<option value="0-0-1">0-0-1</option>
													<option value="0-1-0">0-1-0</option>
												</select>
											</td>
											<td>
												<select name="prescription[medicine][0][duration]" class="form-control">
													<option value="1">1 Days</option>
													<option value="2">2 Days</option>
													<option value="3">3 Days</option>
													<option value="4">4 Days</option>
													<option value="5">5 Days</option>
													<option value="6">6 Days</option>
													<option value="8">8 Days</option>
													<option value="10">10 Days</option>
													<option value="15">15 Days</option>
													<option value="20">20 Days</option>
													<option value="30">30 Days</option>
													<option value="60">60 Days</option>
												</select>
											</td>
											<td>
												<textarea name="prescription[medicine][0][instruction]" class="form-control" rows="3" placeholder="Instruction"></textarea>
											</td>
											<td><a class="table-action-button medicine-delete"><i class="ti-trash text-danger"></i></a></td>
										</tr>
									<?php } ?>
									<tr>
										<td colspan="6">
											<a id="add-medicine" class="font-12 text-primary cursor-pointer">Add Medicine</a>
											<?php if (!empty($result['prescription_id'])) { ?>
												<a href="<?php echo URL_ADMIN.DIR_ROUTE.'prescription/pdf&id='.$result['prescription_id']; ?>" class="color-green cursor-pointer pull-right" target="_blank">Print Prescription</a>
											<?php } ?>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="panel-footer text-center">
							<button type="submit" name="submit" class="btn btn-primary"><i class="ti-save-alt pr-2"></i> Save</button>
						</div>
						</form>
						<script>
							function medicine_autocomplete() {
								$(".prescription-name").autocomplete({
									minLength: 0,
									source: '<?php echo URL_ADMIN.DIR_ROUTE.'getmedicine'; ?>',
									focus: function( event, ui ) {
										$(this).parents('tr').find('.prescription-name').val( ui.item.label );
										return false;
									},
									select: function( event, ui ) {
										$(this).parents('tr').find('.prescription-name').val( ui.item.label );
										$(this).parents('tr').find('.prescription-generic').val( ui.item.generic );
										return false;
									}
								}).autocomplete( "instance" )._renderItem = function( ul, item ) {
									return $( "<li>" )
									.append( "<div>" + item.label + "<br>" + item.generic + "</div>" )
									.appendTo( ul );
								};
							}

							$('body').on('keydown.autocomplete', '.prescription-name', function() {
								medicine_autocomplete();
							});
							if ($(".medicine-delete").length < 2) { $(".medicine-delete").hide(); }
							else { $(".medicine-delete").show(); }

							$('body').on('click', '.medicine-delete', function() {
								$(this).parents('tr').remove();
								if ($(".medicine-delete").length < 2) $(".medicine-delete").hide();
							});

							$('#add-medicine').click(function () {
								if ($(".medicine-delete").length < 1) { $(".medicine-delete").hide(); }
								else { $(".medicine-delete").show(); }
								var count = $('.medicine-table .medicine-row:last .prescription-name').attr('name').split('[')[2];
								count = parseInt(count.split(']')[0]) + 1;
								$(".medicine-row:last").after('<tr class="medicine-row">'+
									'<td><input class="form-control prescription-name" name="prescription[medicine]['+count+'][name]" value="" placeholder="Medicine Name"></td>'+
									'<td><textarea class="form-control prescription-generic" name="prescription[medicine]['+count+'][generic]" rows="3" placeholder="Generic"></textarea></td>'+
									'<td><select name="prescription[medicine]['+count+'][dose]" class="form-control"><option value="1-0-0">1-0-0</option><option value="1-0-1">1-0-1</option><option value="1-1-1">1-1-1</option><option value="0-0-1">0-0-1</option><option value="0-1-0">0-1-0</option></select></td>'+
									'<td><select name="prescription[medicine]['+count+'][duration]" class="form-control"><option value="1">1 Days</option><option value="2">2 Days</option><option value="3">3 Days</option><option value="4">4 Days</option><option value="5">5 Days</option><option value="6">6 Days</option><option value="8">8 Days</option><option value="10">10 Days</option><option value="15">15 Days</option><option value="20">20 Days</option><option value="30">30 Days</option><option value="60">60 Days</option></select></td>'+
									'<td><textarea name="prescription[medicine]['+count+'][instruction]" class="form-control" rows="3" placeholder="Instruction"></textarea></td>'+
									'<td><a class="table-action-button medicine-delete"><i class="ti-trash text-danger"></i></a></td>'+
									'</tr>');
							});
						</script>
					</div>
				<?php } if ($page_notes) { ?>				
					<!--div class="tab-pane" id="appointment-records">
						<form action="<?php echo $action ?>" method="post">
						<input type="hidden" name="_token" value="<?php echo $token; ?>">
						<input type="hidden" name="form_type" value="appointment_clinical_note">
						<input type="hidden" class="appointment-id" name="appointment[id]" value="<?php echo $result['id'];?>">
						<div class="row clinical-notes">
							<div class="col-lg-4">
								<div class="notes-form">
									<div class="form-group">
										<label>Problem</label>
										<div class="input-group">
											<input type="text" class="form-control" data-name="problem" placeholder="Add Patient Problem . . .">
											<div class="input-group-append">
												<span class="input-group-text">Add</span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label>Observation</label>
										<div class="input-group">
											<input type="text" class="form-control" data-name="observation" placeholder="Add Observation. . .">
											<div class="input-group-append">
												<span class="input-group-text">Add</span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label>Diagnosis</label>
										<div class="input-group">
											<input type="text" class="form-control" data-name="diagnosis" placeholder="Add Diagnosis . . .">
											<div class="input-group-append">
												<span class="input-group-text">Add</span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label>Test Request/Investigation</label>
										<div class="input-group">
											<input type="text" class="form-control" data-name="investigation" placeholder="Add Test Request/Investigation . . .">
											<div class="input-group-append">
												<span class="input-group-text">Add</span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label>Notes/Advice</label>
										<div class="input-group">
											<input type="text" class="form-control" data-name="notes" placeholder="Add Notes . . .">
											<div class="input-group-append">
												<span class="input-group-text">Add</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-8">
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
															<li><?php echo $value; ?><input type="hidden" name="notes[notes][problem][]" value="<?php echo $value; ?>"><span class="ti-close delete"></span></li>
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
															<li><?php echo $value; ?><input type="hidden" name="notes[notes][observation][]" value="<?php echo $value; ?>"><span class="ti-close delete"></span></li>
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
															<li><?php echo $value; ?><input type="hidden" name="notes[notes][diagnosis][]" value="<?php echo $value; ?>"><span class="ti-close delete"></span></li>
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
															<li><?php echo $value; ?><input type="hidden" name="notes[notes][investigation][]" value="<?php echo $value; ?>"><span class="ti-close delete"></span></li>
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
															<li><?php echo $value; ?><input type="hidden" name="notes[notes][notes][]" value="<?php echo $value; ?>"><span class="ti-close delete"></span></li>
														<?php } } ?>
													</ul>
												</div> 
											</div>
										</div>
									</div>
								</div>
								<input type="hidden" name="notes[id]" value="<?php echo $notes['id']; ?>">
							</div>
						</div>
						<div class="panel-footer text-center">
							<button type="submit" name="submit" class="btn btn-primary"><i class="ti-save-alt pr-2"></i> Save</button>
						</div>
						</form>
					</div-->
					<div class="tab-pane" id="appointment-records">
						<div class="form-group mb-2">
							<div class="row">
								<div class="col-md-12">
									<!--  Hrading tabs -->
									<div class="row">
										<div class="col-md-12">
											<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-primary">
												<li class="nav-item">
													<a class="nav-link active" href="#clinical-note-form" data-toggle="tab">Clinical Notes</a>
												</li>
												<?php 
													foreach($finding_forms as $form){				?>
														<li class="nav-item">
															<a class="nav-link" href="#pre-consultation-form-id-<?php echo $form['id'] ?>" data-toggle="tab"><?php echo $form['name'] ?></a>
														</li>
												<?php }			?>	
											</ul>
										</div>
									</div>


									<!--  Foms -->
									<div class="row" style="padding-top:10px">									
										<div class="col-md-12 pre-consultation-form">
											<!-- Clinical Note static form -->
											<div class="tab-pane active" id="clinical-note-form">
												<form action="<?php echo $action ?>" method="post">
													<input type="hidden" name="_token" value="<?php echo $token; ?>">
													<input type="hidden" name="form_type" value="appointment_clinical_note">
													<input type="hidden" class="appointment-id" name="appointment[id]" value="<?php echo $result['id'];?>">
													<div class="row clinical-notes">
														<div class="col-lg-4">
															<div class="notes-form">
																<div class="form-group">
																	<label>Problem</label>
																	<div class="input-group">
																		<input type="text" class="form-control" data-name="problem" placeholder="Add Patient Problem . . .">
																		<div class="input-group-append">
																			<span class="input-group-text">Add</span>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label>Observation</label>
																	<div class="input-group">
																		<input type="text" class="form-control" data-name="observation" placeholder="Add Observation. . .">
																		<div class="input-group-append">
																			<span class="input-group-text">Add</span>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label>Diagnosis</label>
																	<div class="input-group">
																		<input type="text" class="form-control" data-name="diagnosis" placeholder="Add Diagnosis . . .">
																		<div class="input-group-append">
																			<span class="input-group-text">Add</span>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label>Test Request/Investigation</label>
																	<div class="input-group">
																		<input type="text" class="form-control" data-name="investigation" placeholder="Add Test Request/Investigation . . .">
																		<div class="input-group-append">
																			<span class="input-group-text">Add</span>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label>Notes/Advice</label>
																	<div class="input-group">
																		<input type="text" class="form-control" data-name="notes" placeholder="Add Notes . . .">
																		<div class="input-group-append">
																			<span class="input-group-text">Add</span>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-lg-8">
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
																						<li><?php echo $value; ?><input type="hidden" name="notes[notes][problem][]" value="<?php echo $value; ?>"><span class="ti-close delete"></span></li>
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
																						<li><?php echo $value; ?><input type="hidden" name="notes[notes][observation][]" value="<?php echo $value; ?>"><span class="ti-close delete"></span></li>
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
																						<li><?php echo $value; ?><input type="hidden" name="notes[notes][diagnosis][]" value="<?php echo $value; ?>"><span class="ti-close delete"></span></li>
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
																						<li><?php echo $value; ?><input type="hidden" name="notes[notes][investigation][]" value="<?php echo $value; ?>"><span class="ti-close delete"></span></li>
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
																						<li><?php echo $value; ?><input type="hidden" name="notes[notes][notes][]" value="<?php echo $value; ?>"><span class="ti-close delete"></span></li>
																					<?php } } ?>
																				</ul>
																			</div> 
																		</div>
																	</div>
																</div>
															</div>
															<input type="hidden" name="notes[id]" value="<?php echo $notes['id']; ?>">
														</div>
													</div>
													<div class="panel-footer text-center">
														<button type="submit" name="submit" class="btn btn-primary"><i class="ti-save-alt pr-2"></i> Save</button>
													</div>
												</form>
											</div>
											<?php 
												foreach($finding_forms as $form){				 ?>
												
												<div class="tab-pane" id="pre-consultation-form-id-<?php echo $form['id'] ?>">
													<form action="<?php echo $action ?>" method="post" enctype="multipart/form-data">
													<input type="hidden" name="_token" value="<?php echo $token; ?>">
													<input type="hidden" name="form_type" value="appointment_finding">
													<input type="hidden" class="appointment-id" name="appointment[id]" value="<?php echo $result['id'];?>">
													<input type="hidden" name="finding_form_id" value="<?php echo $form['id'];?>">
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
																$value = isset($form_answer[$fields['id']]) ? $form_answer[$fields['id']] : '';
																$input_name = 'form['.$fields['input_type'].'_'.$fields['id'].']';
																$label = $fields['label'];
																$placeholder = $fields['placeholder'];

																$required = (($fields['required'] == "requir") ? "required" : "");

																switch($fields['input_type']){
																	case 'heading':
																			echo '<div class="col-md-12">';
																				echo '<h3 class="user-ttl">'. $fields['label'] . '</h3>';
																			echo '</div>';
																		break;

																	case 'note':
																			echo '<div class="col-md-12">';
																				echo '<p class="font-12 mb-10 form-note">'. $fields['note'] . '</p>';
																			echo '</div>';
																		break;

																	case 'text':
																	case 'number':
																	case 'date':
																		echo '<div class="col-md-6"><div class="form-group">' . 
																			'<label>'.$label. (!empty($required) ? ' <span class="form-required">*</span>' : '') . '</label>' . 
																			'<div class="input-group">' .
																				'<input type="'.$fields['input_type'].'" class="form-control" name="'.$input_name.'" placeholder="'.$placeholder.'"  value="' . $value . '" ' . $required . ' autocomplete="off">' . 
																			'</div>' . 
																		'</div></div>';
																			break;

																	case 'email':
																			echo '<div class="col-md-6"><div class="form-group">' . 
																				'<label>'.$label. (!empty($required) ? ' <span class="form-required">*</span>' : '') . '</label>' . 
																				'<div class="input-group">' .
																					'<input type="'.$fields['input_type'].'" class="form-control" name="'.$input_name.'" placeholder="'.$placeholder.'"  value="' . $value . '" ' . $required . ' autocomplete="off" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">' . 
																				'</div>' . 
																			'</div></div>';
																		break;
	
																	case 'textarea':
																		echo '<div class="col-md-6"><div class="form-group">' . 
																			'<label>'.$label. (!empty($required) ? ' <span class="form-required">*</span>' : '') . '</label>' . 
																			'<div class="input-group">' .
																				'<textarea type="'.$fields['input_type'].'" class="form-control" name="'.$input_name.'" placeholder="'.$placeholder.'" ' . $required . ' autocomplete="off">' . $value . '</textarea>'.
																			'</div>' . 
																		'</div></div>';
																		break;

																	case 'select':
																			$options = explode(",", $fields['options']);
																			$values = explode(",", $fields['values']);
																			echo '<div class="col-md-6"><div class="form-group">' . 
																				'<label>'.$label. (!empty($required) ? ' <span class="form-required">*</span>' : '') . '</label>' . 
																				'<div class="input-group">' .
																					'<select name="'.$input_name.'" ' . $required . '>' .
																					'<option value="">'.$placeholder.'</option>';
																						foreach($options as $key => $option){
																							$selected = ($value == $values[$key]) ? "Selected" : '';
																							echo '<option value="'.$values[$key].'" '.$selected.'>'.$option.'</option>';
																						}
																				echo '</select>';
																				'</div>' . 
																			'</div></div>';
																		break;

																	case 'checkbox':
																			$options = explode(",", $fields['options']);
																			$values = explode(",", $fields['values']);
																			$selected_values = explode(",", $value);

																		echo '<div class="col-md-6"><div class="form-group">' . 
																			'<label>'.$label. (!empty($required) ? ' <span class="form-required">*</span>' : '') . '</label>' . 
																			'<div class="input-group">';
																				foreach($options as $key => $option){
																					$checked = (in_array($values[$key], $selected_values)) ? "Checked" : '';
																					echo '<div class="col-md-12"><div class="custom-control custom-checkbox font-14 mb-2">';
																						echo '<input type="'.$fields['input_type'].'" class="custom-control-input" 
																						name="'.$input_name.'[]" value="'.$values[$key].'" 
																						id="'.$fields['random_number'].'_checkbox_'.$key.'" '.$checked.' ' . $required .'>';
																						echo '<label class="custom-control-label" for="'.$fields['random_number'].'_'.$values[$key].'">'.$option.'</label>';
																					echo '</div></div>';
																				}
																			'</div></div></div>';
																		break;

																	case 'radio':
																		$options = explode(",", $fields['options']);
																		$values = explode(",", $fields['values']);

																		echo '<div class="col-md-6"><div class="form-group">' . 
																			'<label>'.$label. (!empty($required) ? ' <span class="form-required">*</span>' : '') . '</label>' . 
																			'<div class="input-group">';
																				foreach($options as $key => $option){
																					$checked = ($value == $values[$key]) ? "Checked" : '';
																					echo '<div class="col-md-12"><div class="custom-control custom-radio font-14 mb-2">';
																							echo '<input type="'.$fields['input_type'].'" class="custom-control-input" 
																							name="'.$input_name.'" value="'.$values[$key].'" 
																							id="'.$fields['random_number'].'_radio_'.$key.'" '.$checked.' ' . $required .'>';
																							echo '<label class="custom-control-label" for="'.$fields['random_number'].'_'.$values[$key].'">'.$option.'</label>';
																					echo '</div></div>';
																				}
																		echo '</div></div></div>';
																		break;
																		
																	case 'file':
																		
																		echo '<div class="col-md-5"><div class="form-group">' . 
																			'<label>'.$label. (!empty($required) ? ' <span class="form-required">*</span>' : '') . '</label>' . 
																			'<div class="input-group">' .
																				 '<input type="'.$fields['input_type'].'"  
																				 		name="'.$fields['input_type'].'_'.$fields['id'].'" ' . $required . '>' .
																			'</div>' . 
																		'</div></div>';
																		echo '<div class="col-md-1">';
																			if(!empty($value)){
																				$image_path = URL . 'public/uploads/appointment/forms/' . $result['id'] . '/' . $form['id'] . '/' . $value;
																					echo '<a data-fancybox="gallery" href="' .$image_path . '">';
																						echo '<img class="form_thumb_img" src="' .$image_path . '">';
																					echo '</a>';
																			}																		
																		echo '</div>';
																		
																		break;
																}
															}		?>
															
														</div>
														<div class="panel-footer text-center">
															<button type="submit" name="submit" class="btn btn-primary"><i class="ti-save-alt pr-2"></i> Save</button>
														</div>
													</form>	
												</div>
														
											<?php }			?>
										</div>										
									</div>
								</div>
							</div>
						</div>
					</div>
				
				<?php } if ($page_document_upload || $page_documents) { ?>
					<div class="tab-pane" id="appointment-documents">
						<?php if ($page_document_upload) { ?>
							<div class="row">
								<div class="form-group col-sm-6 ">
									<a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#reports-modal"><i class="ti-cloud-up mr-2"></i> Upload Document/Report</a>
								</div>
								<div class="form-group col-sm-6 text-right">
									<a class="btn btn-secondary btn-sm" href="<?php echo URL_ADMIN.DIR_ROUTE.'appointment/reportsExport&id='.$result['id']; ?>"><i class="ti-cloud-down mr-2"></i> Download Document/Report</a>
								</div>
							</div>
						<?php } if($page_documents) { ?>
							<div class="report-container">
								<?php if (!empty($reports)) { foreach ($reports as $key => $value) { $file_ext = pathinfo($value['report'], PATHINFO_EXTENSION); if ($file_ext == "pdf") { ?>
									<div class="report-image report-pdf" id="report-delete-div-<?php echo $value['id'] ?>">
										<a href="../public/uploads/appointment/reports/<?php echo $value['appointment_id']  . "/". $value['report']; ?>" class="open-pdf">
											<img src="../public/images/pdf.png" alt="">
											<span><?php echo $value['name']; ?></span>
										</a>
										<?php if ($page_document_remove) { ?>

											<div class="report-delete" data-toggle="tooltip" title="Delete"><a class="ti-close report-delete-action" data-toggle="modal" data-target="#reportDeleteModel" data-appointment_id="<?php echo $value['appointment_id'] ?>" data-report_name="<?php echo $value['report'] ?>" data-report_id="<?php echo $value['id'] ?>"></a></div>

											<input type="hidden" name="report_name" value="<?php echo $value['report']; ?>">

										<?php } ?>
									</div>
								<?php } else { ?>
									<div class="report-image" id="report-delete-div-<?php echo $value['id'] ?>">
										<a data-fancybox="gallery" href="../public/uploads/appointment/reports/<?php echo $value['appointment_id']  . "/". $value['report']; ?>">
											<img src="../public/uploads/appointment/reports/<?php echo $value['appointment_id']  . "/". $value['report']; ?>" alt="">
											<span><?php echo $value['name']; ?></span>
										</a>
										<?php if ($page_document_remove) { ?>

											<div class="report-delete" data-toggle="tooltip" title="Delete"><a class="ti-close report-delete-action" data-toggle="modal" data-target="#reportDeleteModel" data-appointment_id="<?php echo $value['appointment_id'] ?>" data-report_name="<?php echo $value['report'] ?>" data-report_id="<?php echo $value['id'] ?>"></a></div>

											<input type="hidden" name="report_name" value="<?php echo $value['report']; ?>">

										<?php } ?>
									</div>
								<?php } } } ?>
							</div>
						<?php } ?>
					</div>
				<?php } if ($invoice_view || $invoice_add) { ?>
					<div class="tab-pane" id="appointment-invoice">
						<div class="text-center">
							<?php if ($result['invoice_id'] && $invoice_view) { ?>
								<p>Invoice is Generated</p>
								<a href="<?php echo URL_ADMIN.DIR_ROUTE.'invoice/view&id='.$result['invoice_id']; ?>" class="btn btn-danger btn-sm" target="_blank"><i class="far fa-file-pdf mr-2"></i>View</a>
								<a href="<?php echo URL_ADMIN.DIR_ROUTE.'invoice/pdf&id='.$result['invoice_id']; ?>" class="btn btn-danger btn-sm" target="_blank"><i class="far fa-file-pdf mr-2"></i>PDF</a>
								<a href="<?php echo URL_ADMIN.DIR_ROUTE.'invoice/print&id='.$result['invoice_id']; ?>" class="btn btn-success btn-sm" target="_blank"><i class="ti-printer mr-2"></i>Print</a>
								<a href="<?php echo URL_ADMIN.DIR_ROUTE.'invoice/edit&id='.$result['invoice_id']; ?>" class="btn btn-info btn-sm" target="_blank"><i class="ti-pencil-alt mr-2"></i>Edit</a>
							<?php } elseif ($invoice_add) { ?>
								<p>Invoice is not Generated</p>
								<a href="<?php echo URL_ADMIN.DIR_ROUTE.'invoice/add&appointment='.$result['id']; ?>" class="btn btn-primary btn-sm" target="_blank"><i class="ti-plus pr-2"></i>Generate Invoice Now</a>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
					<div class="tab-pane" id="appointment-suporting-images">
							<div class="row">
								<div class="form-group col-sm-12 text-right">
									<a class="btn btn-secondary btn-sm" href="<?php echo URL_ADMIN.DIR_ROUTE.'appointment/imagesExport&id='.$result['id']; ?>"><i class="ti-cloud-down mr-2"></i> Download Images</a>
								</div>
							</div>

							<div class="report-container">
                            <?php 
                                if(!empty($appointment_images)) {
                                    foreach($appointment_images AS $image) { ?>
                                    <div class="report-image">
                                        <a data-fancybox="gallery" href="../public/uploads/appointment/images/<?php echo $image['appointment_id'] ?>/<?php echo $image['filename']; ?>">
                                            <img src="../public/uploads/appointment/images/<?php echo $image['appointment_id'] ?>/<?php echo $image['filename']; ?>" alt="<?php echo $image['name']; ?>" class="blur_img">
                                            <span><?php echo $image['name']; ?></span>
                                        </a>
										<?php if($image['move_to_report'] == 'N'){	?>
											<div class="move-image-to-report" data-toggle="tooltip" title="Move to report" id="move-image-to-report-div-<?php echo $image['id'] ?>" >
												<a href="javascript:;" class="fas fa-expand-arrows-alt move-image-to-report-action" style="display: flex; align-items: center;justify-content: center;" data-toggle="modal" data-target="#moveImageToReportModel" data-image_id="<?php echo $image['id'] ?>"></a>
											</div>
											<input type="hidden" name="image_name" value="<?php echo $image['filename']; ?>">
										<?php } ?>
										
                                    </div>
                            <?php 	} 
                                } else { ?>
                                    <p class="text-center">Image is not available</p>
                            <?php } ?>
                            </div>
					</div>

					<div class="tab-pane" id="appointment-pre-consultation-requirement">
						<form action="<?php echo $action ?>" method="post">
						<input type="hidden" name="_token" value="<?php echo $token; ?>">
						<input type="hidden" name="form_type" value="appointment_pre_consultation">
						<input type="hidden" class="appointment-id" name="appointment[id]" value="<?php echo $result['id'];?>">
						<div class="form-group mb-2">
							<label class="d-block mb-2"><strong><h4>Select pre consultation form for appointment</h4></strong></label>
							<div class="row">
							<?php //print_r($pre_consultation_forms);exit; 
								if(empty($pre_consultation_forms)){		?>
									<div class="col-md-12 ">
										<div class="custom-control custom-checkbox mb-2">
											<lable>Pre consultation forms not available</lable>
										</div>
									</div>

						<?php	} else {
									foreach($pre_consultation_forms as $form){	?>
										<div class="col-md-6 col-lg-4">
											<div class="custom-control custom-checkbox mb-2">
												<input type="checkbox" name="pre_consultation_forms[]" class="custom-control-input" value="<?php echo $form['id'] ?>" id="<?php echo "pre_consultation_form".$form['id'] ?>" <?php echo (in_array($form['id'], $selected_forms)) ? "Checked" : "" ?> >
												<label class="custom-control-label" for="<?php echo "pre_consultation_form".$form['id'] ?>"><?php echo $form['name'] ?></label>
											</div>
										</div>
						<?php		}
								} 		?>					
							</div>
							<div class="row" style="padding:15px;">
								<div class="col-md-12">
								</div>
							</div>
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
						<div class="panel-footer text-center">
							<button type="submit" name="submit" class="btn btn-primary"><i class="ti-save-alt pr-2"></i> Save</button>
						</div>
						</form>
					</div>
			</div>
		</div>
	</div>
</form>

<!-- Reports upload modal -->
<div id="reports-modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Upload Reports/Documents</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Report/Document Name</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="ti-tag"></i></span>
						</div>
						<input type="text" name="report_name" class="form-control" placeholder="Enter Report/Document Name">
					</div>
				</div>
				<div class="media-upload-container" style="max-width: 100%;">
					<form action="<?php echo URL_ADMIN.DIR_ROUTE ?>report/reportUpload" class="dropzone" id="report-upload" method="post" enctype="multipart/form-data">
						<div class="fallback"><input name="file" type="file" /></div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary upload-report">Done</button>
			</div>
		</div>

	</div>
</div>

<!-- Move Image to report modal -->
<div id="moveImageToReportModel" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Move Image to Reports/Documents</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				Do you wish to move image to document/report ?
				<input type="hidden" name="image_id" id="source_image_id">
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" id="move-image-to-report" data-dismiss="modal">Yes</button>
            </div>
		</div>

	</div>
</div>

<!-- Delete Document/Report modal -->
<div id="reportDeleteModel" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Delete Reports/Documents</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				Are you sure you want to delete this document/report ?
				<input type="hidden" name="appointment_id" id="appointment_id">
				<input type="hidden" name="report_id" id="report_id">
				<input type="hidden" name="report_name" id="report_name">
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" id="delete-report" data-dismiss="modal">Yes</button>
            </div>
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