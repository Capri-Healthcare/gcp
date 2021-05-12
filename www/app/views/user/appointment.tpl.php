<div class="apnt-view">
	<div class="panel panel-default">
		<div class="panel-body">
			<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-primary">
				<li class="nav-item">
					<a class="nav-link active" href="#appointment-info" data-toggle="tab">Appointment Info</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#appointment-suporting-images" data-toggle="tab">Images</a>
				</li>
				<?php if(!empty($selected_forms)){ ?>
					<li class="nav-item">
						<a class="nav-link" href="#appointment-pre-consultation-requirement" data-toggle="tab">Pre-consultation requirement</a>
					</li>
				<?php } ?>
			</ul>


			<div class="tab-content pt-4">
				<!-- appointment-info -->
				<div class="tab-pane active" id="appointment-info">
					<div class="mb-4">
						<div class="card-hdr">
							<div class="row align-items-center">
								<div class="col-md-6">
									<div class="title"><?php echo $siteinfo['appointment_prefix'].str_pad($appointment['id'], 5, '0', STR_PAD_LEFT); ?></div>
									<input type="hidden" class="appointment-id" name="appointment_id" value="<?php echo $appointment['id'] ?>">
								</div>
								<div class="col-md-6 text-right">
									<?php if ($appointment['status'] == 1) {
										echo '<span class="label label-warning">'.$lang['text_in_process'].'</span>';
									} elseif ($appointment['status'] == 2) {
										echo '<span class="label label-warning">'.$lang['text_document_requested'].'</span>';						
									} elseif ($appointment['status'] == 3) {
										echo '<span class="label label-success">'.$lang['text_confirmed'].'</span>';
									} elseif ($appointment['status'] == 4) {						
									} elseif ($appointment['status'] == 5) {
										echo '<span class="label label-primary">'.$lang['text_completed'].'</span>';
									} elseif ($appointment['status'] == 6) {						
										echo '<span class="label label-danger">'.$lang['text_cancelled'].'</span>';
									} else {
										echo '<span class="label label-sm label-info">'.$lang['text_new'].'</span>';
									} ?> 
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-3">
									<?php if (!empty($appointment['picture'])) { ?>
										<div class="picture tbl-cell">
											<img src="<?php echo URL.'public/uploads/'.$appointment['picture']; ?>" alt="Doctor">
										</div>
									<?php } else { ?>
										<div class="icon tbl-cell">
											<i class="far fa-user"></i>
										</div>
									<?php } ?>
									<div class="user-info tbl-cell">
										<span><?php echo $lang['text_doctor_info']; ?></span>
										<h4 class="name"><?php echo $appointment['doctor']; ?></h4>
										<p class="text"><?php echo $appointment['department']; ?></p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="info">
										<span><?php echo $lang['text_patient']; ?></span>
										<p><?php echo $appointment['name']; ?></p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="info">
										<span><?php echo $lang['text_date_time']; ?></span>
										<p><?php echo date_format(date_create($appointment['date']), $siteinfo['date_format']).' at '.date_format(date_create($appointment['time']), 'H:i A'); ?></p>
									</div>
								</div>
								<div class="col-md-3">
									<?php if($appointment['consultation_type'] == "video_consultation" AND $appointment['status'] == 3) {	?>
										<div class="icon tbl-cell">
											<a href="<?php echo URL.DIR_ROUTE.'appointment/videoConsultation&token='.$appointment['video_consultation_token']; ?>" >
												<i class="fas fa-video video_call_icon"></i>
											</a>
										</div>
									<?php }	?>	
									<div class="user-info tbl-cell">									
										<span><?php echo $lang['text_consultation_type']; ?></span>
										<p><?php echo CONSULTATION_TYPE[$appointment['consultation_type']]; ?></p>
									</div>
								</div>
							</div>
							<div class="row mt-3">					
								<div class="col-md-12">
									<div class="info">
										<span><?php echo $lang['text_reason_problem']; ?></span>
										<p><?php echo $appointment['message']; ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mb-4">
						<div class="card-hdr">
							<div class="row align-items-center">
								<div class="col-md-6">
									<div class="title"><?php echo $lang['text_clinical_notes']; ?></div>
								</div>
								<div class="col-md-6 text-right">
									<?php if (!empty($appointment['notes'])) { ?>
										<a href="<?php echo URL.DIR_ROUTE.'user/records/print&id='.$appointment['id']; ?>" class="btn btn-white btn-sm" target="_blank"><?php echo $lang['text_print']; ?></a>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="info">
								<span><?php echo $lang['text_problem']; ?></span>
								<ul>
									<?php if (!empty($appointment['notes']['problem'])) { foreach ($appointment['notes']['problem'] as $key => $value) { echo '<li>'.$value.'</li>'; } } else { echo '<li>'.$lang['text_none'].'</li>'; } ?>
								</ul>
								<span><?php echo $lang['text_observation']; ?></span>
								<ul>
									<?php if (!empty($appointment['notes']['observation'])) { foreach ($appointment['notes']['observation'] as $key => $value) { echo '<li>'.$value.'</li>'; } } else { echo '<li>'.$lang['text_none'].'</li>'; } ?>
								</ul>
								<span><?php echo $lang['text_diagnosis']; ?></span>
								<ul>
									<?php if (!empty($appointment['notes']['diagnosis'])) { foreach ($appointment['notes']['diagnosis'] as $key => $value) { echo '<li>'.$value.'</li>'; } } else { echo '<li>'.$lang['text_none'].'</li>'; } ?>
								</ul>
								<span><?php echo $lang['text_investigation']; ?></span>
								<ul>
									<?php if (!empty($appointment['notes']['investigation'])) { foreach ($appointment['notes']['investigation'] as $key => $value) { echo '<li>'.$value.'</li>'; } } else { echo '<li>'.$lang['text_none'].'</li>'; } ?>
								</ul>
								<span><?php echo $lang['text_doctor_notes']; ?></span>
								<ul>
									<?php if (!empty($appointment['notes']['notes'])) { foreach ($appointment['notes']['notes'] as $key => $value) { echo '<li>'.$value.'</li>'; } } else { echo '<li>'.$lang['text_none'].'</li>'; } ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="mb-4">
						<div class="card-hdr">
							<div class="row align-items-center">
								<div class="col-md-6">
									<div class="title"><?php echo $lang['text_reports_documents']; ?></div>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="row document-container">
								<?php if (!empty($reports)) { foreach ($reports as $key => $value) { 
									$file_ext = pathinfo($value['report'], PATHINFO_EXTENSION); ?>
									<div class="col-12 col-sm-6 col-md-4 col-lg-3">
										<div class="block">
											<div class="title">
												<span><?php echo $value['name']; ?></span>
												<p><?php echo date_format(date_create($value['date_of_joining']), $siteinfo['date_format']); ?></p>
											</div>
											<div class="document">
												<?php if ($file_ext == "pdf") { ?>
													<a href="<?php echo URL.'public/uploads/appointment/reports/'.$appointment['id'] . '/'.$value['report']; ?>" class="record-pdf" title="<?php echo $value['name']; ?>"><i class="far fa-file-pdf"></i></a>
												<?php } else { ?>
													<a data-fancybox="gallery" href="<?php echo URL.'public/uploads/appointment/reports/'.$appointment['id'] . '/'.$value['report']; ?>" class="record-image">
														<img src="<?php echo URL.'public/uploads/appointment/reports/'.$appointment['id'] . '/'. $value['report']; ?>" alt="Documents">
													</a>
												<?php } ?>
											</div>
										</div>
									</div>
								<?php } } ?>
							</div>
						</div>
					</div>
					<div class="mb-4">
						<div class="card-hdr">
							<div class="row align-items-center">
								<div class="col-md-6">
									<div class="title"><?php echo $lang['text_prescription']; ?></div>
								</div>
								<div class="col-md-6 text-right">
									<?php if (!empty($prescription['id'])) { ?>
										<a href="<?php echo URL.DIR_ROUTE.'user/prescription&id='.$prescription['id']; ?>" class="btn btn-sm btn-white" target="_blank"><?php echo $lang['text_print']; ?></a>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="card-block">
							<?php if (!empty($prescription)) {  ?>
								<table class="table table-striped">
									<tr>
										<th><?php echo $lang['text_medicine_name']; ?></th>
										<th><?php echo $lang['text_dose']; ?></th>
										<th><?php echo $lang['text_duration']; ?></th>
										<th><?php echo $lang['text_instruction']; ?></th>
									</tr>
									<?php foreach (json_decode($prescription['prescription'], true) as $key => $value) { ?>
										<tr>
											<td>
												<p class="font-14 text-primary m-0"><?php echo $value['name']; ?></p>
												<p class="font-12 m-0"><?php echo $value['generic']; ?></p>
											</td>
											<td><?php echo $value['dose']; ?></td>
											<td><?php echo $value['duration'].' '.$lang['text_day']; ?></td>
											<td><?php echo $value['instruction']; ?></td>
										</tr>
									<?php } ?>
								</table>
							<?php } else { ?>
								<p><?php echo $lang['text_prescription_does_not_created']; ?></p>
							<?php } ?>
						</div>
					</div>
				</div>


				<!-- appointment-suporting-images -->
				<div class="tab-pane" id="appointment-suporting-images">
					<div class="form-group">
						<a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#appointment-image-upload-modal"><i class="fas fa-cloud-upload-alt mr-2"></i> Upload Photos</a>
					</div>

					<div class="report-container">
					<?php 
						if(!empty($appointment_images)) {
							foreach($appointment_images AS $image) { ?>
							<div class="report-image">
								<a data-fancybox="gallery" href="../public/uploads/appointment/images/<?php echo $image['appointment_id'] ?>/<?php echo $image['filename']; ?>">
									<img class='blur_img' src="../public/uploads/appointment/images/<?php echo $image['appointment_id'] ?>/<?php echo $image['filename']; ?>" alt="<?php echo $image['name']; ?>">
									<span><?php echo $image['name']; ?></span>
								</a>
								<div class="report-delete" data-toggle="tooltip" title=""><a class="fas fa-times"></a></div>
								<input type="hidden" name="image_name" value="<?php echo $image['filename']; ?>">
							</div>
					<?php 	} 
						} else { ?>
							<p class="text-center">Image is not available</p>
					<?php } ?>
					</div>

					
				</div>

				<!-- Pre-consultation requirement -->
				<div class="tab-pane" id="appointment-pre-consultation-requirement">
					<div class="mb-4">
						<div class="card-hdr">
							<div class="row align-items-center">
								<div class="col-md-6">
									<div class="title">Pre consultation forms</div>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="info">
								<div class="row">
									<div class="col-md-12" style="margin-bottom:10px;">
										<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-primary">
											<?php 
												$active = "active";
												if(!empty($selected_forms)){
													foreach($selected_forms as $form){												
													 ?>
														<li class="nav-item">
															<a class="nav-link <?php echo $active ?>" href="#pre-consultation-form-id-<?php echo $form['id'] ?>" data-toggle="tab"><?php echo $form['name'] ?></a>
														</li>
											<?php		$active = "";
													} 
												}			?>
										</ul>
									</div>
								</div>
								<form action="<?php echo URL.DIR_ROUTE ?>form/savePreConsultationForm" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-12 pre-consultation-form">
									<?php 
										$active = "active";
										if(!empty($selected_forms)){
											foreach($selected_forms as $form){	?>
												<div class="tab-pane <?php echo $active ?>" id="pre-consultation-form-id-<?php echo $form['id'] ?>">
													<?php
														$active = "";
														$form_details = $formObj->getForm($form['id']);
														$form_fields = $formObj->getFormField($form['id']);
														$form_answer = $formObj->getFormAnswer($appointment['id'], $form['id']);
														//print_r($form_answer);exit;
													?>
													<!--h1><?php echo $form_details['name'] ?></h1>
													<br>
													<h5><?php echo $form_details['description'] ?></h5-->
													<form action="<?php echo URL.DIR_ROUTE ?>form/savePreConsultationForm" id="frm-pre-consultation-form<?php echo $form['id'] ?>" method="post" enctype="multipart/form-data">
													<div class="row" style="background:#f5f9fc">
														<?php 
															foreach($form_fields as $fields)	{ 
																$value = isset($form_answer[$fields['id']]) ? $form_answer[$fields['id']] : '';
																$input_name = 'form['.$fields['input_type'].'_'.$fields['id'].']';
																$label = $fields['label'];
																$placeholder = $fields['placeholder'];

																$required = (($fields['required'] == "requir") ? "required" : "");

																switch($fields['input_type']){
																	case 'heading':
																			echo '<div class="col-md-12">';
																				echo '<h1 class="user-ttl">'. $fields['label'] . '</h1>';
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
																			echo '<div class="col-md-6"><div class="input-box">';
																				echo '<input type="'.$fields['input_type'].'" name="'.$input_name.'" 
																						placeholder="'.$placeholder.'"  value="' . $value . '" ' . $required .'>';
																			echo '<label>'.$label.'</label></div></div>';
																			break;

																	case 'email':
																			echo '<div class="col-md-6"><div class="input-box">';
																				echo '<input type="'.$fields['input_type'].'" name="'.$input_name.'" 
																						pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" 
																						placeholder="'.$placeholder.'"  value="' . $value . '" ' . $required .'>';
																			echo '<label>'.$label.'</label></div></div>';
																		break;

																	case 'textarea':
																			echo '<div class="col-md-6"><div class="input-box">';
																				echo '<textarea rows="3" name="'.$input_name.'" 
																					placeholder="'.$placeholder.'" ' . $required .'>'. $value .'</textarea>';
																			echo '<label>'.$fields['label'].'</label></div></div>';
																			break;

																	case 'select':
																			$options = explode(",", $fields['options']);
																			$values = explode(",", $fields['values']);
																			echo '<div class="col-md-6"><div class="input-box">';
																				echo '<select name="'.$input_name.'" ' . $required . '>';
																				echo '<option value="">'.$placeholder.'</option>';
																				foreach($options as $key => $option){
																					$selected = ($value == $values[$key]) ? "Selected" : '';
																					echo '<option value="'.$values[$key].'" '.$selected.'>'.$option.'</option>';
																				}
																				echo '</select>';
																			echo '<label>'.$label.'</label></div></div>';
																		break;

																	case 'checkbox':
																			$options = explode(",", $fields['options']);
																			$values = explode(",", $fields['values']);
																			$selected_values = explode(",", $value);

																			echo '<div class="col-md-6"><div class="input-type-box"><span class="checkbox_radio_style">'.$fields['label'].'</span>';
																				echo '<div class="row">';
																					foreach($options as $key => $option){
																						$checked = (in_array($values[$key], $selected_values)) ? "Checked" : '';
																						echo '<div class="col-md-12"><div class="custom-control custom-checkbox font-14 mb-2">';
																							echo '<input type="'.$fields['input_type'].'" class="custom-control-input" 
																							name="'.$input_name.'[]" value="'.$values[$key].'" 
																							id="'.$fields['random_number'].'_checkbox_'.$key.'" '.$checked.' ' . $required .'>';
																							echo '<label class="custom-control-label" for="'.$fields['random_number'].'_checkbox_'.$key.'">'.$option.'</label>';
																					echo '</div></div>';
																				}
																			echo '</div></div></div>';
																		break;

																	case 'radio':
																		$options = explode(",", $fields['options']);
																		$values = explode(",", $fields['values']);

																		echo '<div class="col-md-6"><div class="input-type-box"><span class="checkbox_radio_style">'.$fields['label'].'</span>';
																			echo '<div class="row">';
																				foreach($options as $key => $option){
																					$checked = ($value == $values[$key]) ? "Checked" : '';
																					echo '<div class="col-md-12"><div class="custom-control custom-radio font-14 mb-2">';
																							echo '<input type="'.$fields['input_type'].'" class="custom-control-input" 
																							name="'.$input_name.'" value="'.$values[$key].'" 
																							id="'.$fields['random_number'].'_radio_'.$key.'" '.$checked.' ' . $required .'>';
																							echo '<label class="custom-control-label" for="'.$fields['random_number'].'_radio_'.$key.'">'.$option.'</label>';
																					echo '</div></div>';
																				}
																			echo '</div></div></div>';
																		break;
																		
																	case 'file':
																		echo '<div class="col-md-5"><div class="input-box file_upload_input">';
																		echo '<input type="'.$fields['input_type'].'" 
																					name="'.$fields['input_type'].'_'.$fields['id'].'" ' . $required . '>';
																		echo '<label>'.$fields['label'].'</label></div></div>';
																		if(!empty($value)){
																			$image_path = 'public/uploads/appointment/forms/' . $appointment['id'] . '/' . $form['id'] . '/' . $value;
																			echo '<div class="col-md-1">';
																					echo '<a data-fancybox="gallery" href="' .$image_path . '">';
																						echo '<img class="form_thumb_img" src="' .$image_path . '">';
																					echo '</a>';
																			echo '</div>';
																		}
																		break;
																}
															}
														?>
														<div class="col-12 text-center pb-4">
															<input type="hidden" class="appointment-id" name="appointment_id" value="<?php echo $appointment['id'];?>">
															<input type="hidden" class="appointment-id" name="form_id" value="<?php echo $form['id'];?>">
															<input type="hidden" name="_token" value="<?php echo $token ?>">
															<button type="submit" name="submit" class="btn btn-primary btn-shadow btn-pill">Save</button>
														</div>
													</div>
													</form>

												</div>
									<?php	}
										}			?>
									</div>
								</div>
								</form>								
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		
		

	</div>
</div>


<!-- Images upload modal -->
<div id="appointment-image-upload-modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Upload Images</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Image Name</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-tag"></i></span>
						</div>
						<input type="text" name="appointment_image_name" class="form-control" placeholder="Enter Image Name">
					</div>
				</div>
				<div class="media-upload-container" style="max-width: 100%;">
					<form action="<?php echo URL.DIR_ROUTE ?>images/appointmentImagesUpload" class="dropzone" id="appointment-image-upload" method="post" enctype="multipart/form-data">
						<div class="fallback"><input name="file" type="file" /></div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary upload-appointment-image">Done</button>
			</div>
		</div>

	</div>
</div>