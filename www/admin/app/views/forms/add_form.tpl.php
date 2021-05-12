<?php include (DIR_ADMIN.'app/views/common/header.tpl.php'); ?>
<link rel="stylesheet" href="public/css/form_builder.css"/>
<div class="page-title">
	<div class="row align-items-center">
		<div class="col-sm-6">
			<h2 class="page-title-text d-inline-block"><?php echo $page_title; ?></h2>
			<div class="breadcrumbs d-inline-block">
				<ul>
					<li><a href="<?php echo URL_ADMIN; ?>">Dashboard</a></li>
					<li><a href="<?php echo URL_ADMIN.DIR_ROUTE.'forms'; ?>">Forms</a></li>
					<li><?php echo $page_title; ?></li>
				</ul>
			</div>
		</div>
		<div class="col-sm-6 text-right"></div>
	</div>
</div>

<form action="<?php echo $action ?>" method="post" id="frm_form">
	<div class="panel panel-default">
		<input type="hidden" name="_token" value="<?php echo $common['token']; ?>">
		<input type="hidden" name="form[id]" value="<?php echo $result['form']['id']; ?>">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="col-form-label">Form Name <span class="form-required">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend"><span class="input-group-text"><i class="ti-check-box"></i></span></div>
									<input type="text" name="form[name]" class="form-control form-name" value="<?php echo $result['form']['name']; ?>" placeholder="Enter form Name . . ." required>
								</div>
							</div>	
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="col-form-label">Form Description</label>
								<div class="input-group">
									<div class="input-group-prepend"><span class="input-group-text"><i class="ti-quote-left"></i></span></div>
									<textarea class="form-control" name="form[description]" rows="3" placeholder="Enter form description . . ."><?php echo $result['form']['description'];  ?></textarea>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="col-form-label">Applicable To<span class="form-required">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend"><span class="input-group-text"><i class="ti-check-box"></i></span></div>
									<select name="form[applicable_to]" class="custom-select" required>								
										<option value="DOCTOR" <?php if ($result['form']['applicable_to'] == "DOCTOR") { echo "selected";} ?>>Doctor</option>
										<option value="PATIENT" <?php if ($result['form']['applicable_to'] == "PATIENT") { echo "selected";} ?>>Patient</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="col-form-label">Form Status <span class="form-required">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend"><span class="input-group-text"><i class="ti-check-box"></i></span></div>
									<select name="form[status]" class="custom-select" required>								
										<option value="Y" <?php if ($result['form']['status'] == "Y") { echo "selected";} ?>>Active</option>
										<option value="N" <?php if ($result['form']['status'] == "N") { echo "selected";} ?>>In Active</option>
									</select>
								</div>
							</div>
						</div>						
					</div>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12">
							<label class="col-form-label">Departments <span class="form-required">*</span></label>

							<ul class="department-list list-style-none">
								<?php 
									//$selected_departments = explode(",", $result['form']['departments']);
									foreach($departments as $key => $department) {	?>
									<li>
										<div class="custom-control custom-checkbox mb-3">
											<input type="checkbox" name="form[departments][]" class="custom-control-input" <?php echo "value='".$department['id']."' " . ((in_array($department['id'], $selected_departments)) ? 'checked' : '') . " id='department-".($key + 1)."'" ; ?>>
											<label class="custom-control-label" for="department-<?php echo ($key + 1); ?>"><p><?php echo $department['name'] ?></p></label>
										</div>
									</li>
								<?php }	?>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="form_builder">
				<div class="row">
					<div class="col-sm-2">
						<h4 class="form_builder_heading">Input List</h4>
						<nav class="nav-sidebar">
							<ul class="nav">
								<li class="form_bal_heading">
									<a href="javascript:;">Heading <i class="fa fa-plus-circle pull-right"></i></a>
								</li>
								<li class="form_bal_note">
									<a href="javascript:;">Note <i class="fa fa-plus-circle pull-right"></i></a>
								</li>
								<li class="form_bal_textfield">
									<a href="javascript:;">Text Field <i class="fa fa-plus-circle pull-right"></i></a>
								</li>
								<li class="form_bal_textarea">
									<a href="javascript:;">Text Area <i class="fa fa-plus-circle pull-right"></i></a>
								</li>
								<li class="form_bal_select">
									<a href="javascript:;">Select <i class="fa fa-plus-circle pull-right"></i></a>
								</li>
								<li class="form_bal_radio">
									<a href="javascript:;">Radio Button <i class="fa fa-plus-circle pull-right"></i></a>
								</li>
								<li class="form_bal_checkbox">
									<a href="javascript:;">Checkbox <i class="fa fa-plus-circle pull-right"></i></a>
								</li>
								<li class="form_bal_email">
									<a href="javascript:;">Email <i class="fa fa-plus-circle pull-right"></i></a>
								</li>
								<li class="form_bal_number">
									<a href="javascript:;">Number <i class="fa fa-plus-circle pull-right"></i></a>
								</li>
								<!--li class="form_bal_password">
									<a href="javascript:;">Password <i class="fa fa-plus-circle pull-right"></i></a>
								</li-->
								<li class="form_bal_date">
									<a href="javascript:;">Date <i class="fa fa-plus-circle pull-right"></i></a>
								</li>
								<li class="form_bal_file_upload">
									<a href="javascript:;">File Upload <i class="fa fa-plus-circle pull-right"></i></a>
								</li>
								<!--li class="form_bal_button">
									<a href="javascript:;">Button <i class="fa fa-plus-circle pull-right"></i></a>
								</li-->
							</ul>
						</nav>
					</div>
					<div class="col-md-5 bal_builder">
						<h4 class="form_builder_heading">Drop Input here</h4>
						<div class="form_builder_area" style="background:#eee">
						<?php 
							if(!empty($result['form_field'])){
								
								foreach($result['form_field'] as $form_field){
									if(in_array($form_field['input_type'], array('text', 'email', 'number'))){		?>
										<div class="li_<?php echo $form_field['random_number']; ?> form_builder_field">
											<div class="all_div">
												<div class="row li_row">
													<div class="col-md-12">
														<label class="pull-left"><b><?php echo ucfirst($form_field['input_type']) ?></b></label>
														<button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="<?php echo $form_field['random_number']; ?>"><i class="fa fa-times"></i></button>
													</div>
												</div>
											</div>
											<hr>
											<div class="row li_row form_output" data-type="<?php echo $form_field['input_type']; ?>" data-field="<?php echo $form_field['random_number']; ?>">
												<div class="col-md-12">
													<div class="form-group">
														<input type="text" name="label_<?php echo $form_field['random_number']; ?>" class="form-control form_input_label" value="<?php echo $form_field['label']; ?>" data-field="<?php echo $form_field['random_number']; ?>">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<input type="text" name="placeholder_<?php echo $form_field['random_number']; ?>" data-field="<?php echo $form_field['random_number']; ?>" class="form-control form_input_placeholder" placeholder="Placeholder" value="<?php echo $form_field['placeholder']; ?>">
														<input type="hidden" name="<?php echo $form_field['input_type'].'_'.$form_field['random_number']; ?>" value="<?php echo $form_field['input_type'].'_'.$form_field['random_number']; ?>" class="form-control form_input_name" placeholder="Name">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-check">
														<label class="form-check-label">
															<input data-field="<?php echo $form_field['random_number']; ?>" type="checkbox" class="form-check-input form_input_req" <?php echo $form_field['required'] == "requir" ? "Checked" : ''; ?>>Required
														</label>
													</div>
												</div>
											</div>
										</div>
						<?php		} else if(in_array($form_field['input_type'], array('select', 'radio', 'checkbox'))){	
										$options = explode(",", $form_field['options']);
										$values = explode(",", $form_field['values']);
										$option_random_number = [];
										foreach($options as $option){
											$option_random_number[] = rand(0,99999);
										}											
							?>
										<div class="li_<?php echo $form_field['random_number']; ?> form_builder_field">
											<div class="all_div">
												<div class="row li_row">
													<div class="col-md-12">
														<label class="pull-left"><b><?php echo ucfirst($form_field['input_type']) ?></b></label>
														<button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="<?php echo $form_field['random_number']; ?>"><i class="fa fa-times"></i></button>
													</div>
												</div>
												<hr>
												<div class="row li_row form_output" data-type="<?php echo $form_field['input_type']; ?>" data-field="<?php echo $form_field['random_number']; ?>">
													<div class="col-md-12">
														<div class="form-group">
															<input type="text" name="label_<?php echo $form_field['random_number']; ?>" class="form-control form_input_label" value="<?php echo $form_field['label']; ?>" data-field="<?php echo $form_field['random_number']; ?>">
															<input type="hidden" name="text_<?php echo $form_field['random_number']; ?>" value="<?php echo $form_field['input_type'].'_'.$form_field['random_number']; ?>" class="form-control form_input_name" placeholder="Name">
														</div>
													</div>
											<?php	if(in_array($form_field['input_type'], array('select'))) {		?>
														<div class="col-md-12">
															<div class="form-group">
																<select name="<?php echo $form_field['input_type'].'_'.$form_field['random_number']; ?>" class="form-control">
														<?php	foreach($options as $key => $option) {		?>
																	<option data-opt="<?php echo $option_random_number[$key] ?>" value="<?php echo $values[$key]; ?>"><?php echo $option; ?> </option>
														<?php 	} 	?>
																</select>
															</div>
														</div>
											<?php	} else if(in_array($form_field['input_type'], array('checkbox', 'radio'))) {	?>
														<div class="col-md-12">
															<div class="form-group">
																<div class="mt-<?php echo $form_field['input_type']; ?>-list <?php echo $form_field['input_type'].'_list_'.$form_field['random_number']; ?>">
														<?php	foreach($options as $key => $option) {		?>
																	<label class="mt-<?php echo $form_field['input_type']; ?> mt-<?php echo $form_field['input_type']; ?>-outline">
																		<input data-opt="<?php echo $option_random_number[$key] ?>" type="<?php echo $form_field['input_type']; ?>" name="<?php echo $form_field['input_type'].'_'.$form_field['random_number']; ?>" value="<?php echo $values[$key] ?>"> 
																		<p class="c_opt_name_<?php echo $option_random_number[$key] ?>"><?php echo $option ?></p><span></span>
																	</label>
														<?php 	} 	?>
																</div>
															</div>
														</div>
											<?php }		?>
														
														<div class="col-md-12">
															<div class="form-check">
																<label class="form-check-label">
																	<input data-field="<?php echo $form_field['random_number']; ?>" type="checkbox" class="form-check-input form_input_req" <?php echo $form_field['required'] == "requir" ? "Checked" : ''; ?>>Required
																</label>
															</div>
														</div>
												</div>
												<div class="row li_row">
													<div class="col-md-12">
														<div class="field_extra_info_<?php echo $form_field['random_number']; ?>">
													<?php	foreach($options as $key => $option){		?>
															<div data-field="<?php echo $form_field['random_number']; ?>" class="row <?php echo $form_field['input_type'].'_row_'.$form_field['random_number']; ?>" data-opt="<?php echo $option_random_number[$key] ; ?>">
																<div class="col-md-4">
																	<div class="form-group">
																		<input type="text" value="<?php echo $option; ?>" class="<?php echo $form_field['input_type'][0] ?>_opt form-control">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<input type="text" value="<?php echo $values[$key]; ?>" class="<?php echo $form_field['input_type'][0] ?>_val form-control">
																	</div>
																</div>
																<div class="col-md-4">
																	<i class="margin-top-5 fa fa-plus-circle fa-2x default_blue add_more_<?php echo $form_field['input_type']; ?>" data-field="<?php echo $form_field['random_number']; ?>"></i>
														<?php		if($key > 0){	?>
																		<i class="margin-top-5 margin-left-5 fa fa-times-circle default_red fa-2x remove_more_<?php echo $form_field['input_type']; ?>" data-field="<?php echo $form_field['random_number']; ?>"></i>
														<?php		}	?>																	
																</div>
															</div>
													<?php }		?>
														</div>
													</div>
												</div>
											</div>
										</div>
						<?php		} else if(in_array($form_field['input_type'], array('textarea'))){	?>
										<div class="li_<?php echo $form_field['random_number']; ?> form_builder_field">
											<div class="all_div">
												<div class="row li_row">
													<div class="col-md-12">
														<label class="pull-left"><b><?php echo ucfirst($form_field['input_type']) ?></b></label>
														<button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="<?php echo $form_field['random_number']; ?>">
															<i class="fa fa-times"></i></button>
													</div>
												</div>
											</div>
											<hr>
											<div class="row li_row form_output" data-type="<?php echo $form_field['input_type']; ?>" data-field="<?php echo $form_field['random_number']; ?>">
												<div class="col-md-12">
													<div class="form-group">
														<input type="text" name="label_<?php echo $form_field['random_number']; ?>" class="form-control form_input_label" value="<?php echo $form_field['label']; ?>" data-field="<?php echo $form_field['random_number']; ?>">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<input type="text" name="placeholder_<?php echo $form_field['random_number']; ?>" data-field="<?php echo $form_field['random_number']; ?>" class="form-control form_input_placeholder" placeholder="Placeholder" value="<?php echo $form_field['placeholder']; ?>">
														<input type="hidden" name="text_<?php echo $form_field['random_number']; ?>" value="<?php echo $form_field['input_type'] .'_'.$form_field['random_number']; ?>" class="form-control form_input_name" placeholder="Name">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-check">
														<label class="form-check-label">
														<input data-field="<?php echo $form_field['random_number']; ?>" type="checkbox" class="form-check-input form_input_req" <?php echo $form_field['required'] == "requir" ? "Checked" : ''; ?>>Required</label>
													</div>
												</div>
											</div>
										</div>
						<?php		} else if(in_array($form_field['input_type'], array('date'))){	?>
										<div class="li_<?php echo $form_field['random_number']; ?> form_builder_field">
											<div class="all_div">
												<div class="row li_row">
													<div class="col-md-12">
														<label class="pull-left"><b><?php echo ucfirst($form_field['input_type']) ?></b></label>
														<button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="<?php echo $form_field['random_number']; ?>"><i class="fa fa-times"></i></button>
													</div>
												</div>
											</div>
											<hr>
											<div class="row li_row form_output" data-type="<?php echo $form_field['input_type']; ?>" data-field="<?php echo $form_field['random_number']; ?>">
												<div class="col-md-12">
													<div class="form-group">
														<input type="text" name="label_<?php echo $form_field['random_number']; ?>" class="form-control form_input_label" value="<?php echo $form_field['label']; ?>" data-field="<?php echo $form_field['random_number']; ?>">
														<input type="hidden" name="text_<?php echo $form_field['random_number']; ?>" value="<?php echo $form_field['input_type'] .'_'.$form_field['random_number']; ?>" class="form-control form_input_name" placeholder="Name">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-check">
														<label class="form-check-label">
														<input data-field="<?php echo $form_field['random_number']; ?>" type="checkbox" class="form-check-input form_input_req" <?php echo $form_field['required'] == "requir" ? "Checked" : ''; ?>>Required</label>
													</div>
												</div>
											</div>
										</div>
						<?php		} else if(in_array($form_field['input_type'], array('heading'))){	?>
										<div class="li_<?php echo $form_field['random_number']; ?> form_builder_field">
											<div class="all_div">
												<div class="row li_row">
													<div class="col-md-12">
														<label class="pull-left"><b><?php echo ucfirst($form_field['input_type']) ?></b></label>
														<button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="<?php echo $form_field['random_number']; ?>"><i class="fa fa-times"></i></button>
													</div>
												</div>
											</div>
											<hr>
											<div class="row li_row form_output" data-type="<?php echo $form_field['input_type']; ?>" data-field="<?php echo $form_field['random_number']; ?>">
												<div class="col-md-12">
													<div class="form-group">
														<input type="text" name="label_<?php echo $form_field['random_number']; ?>" class="form-control form_input_label" value="<?php echo $form_field['label']; ?>" data-field="<?php echo $form_field['random_number']; ?>">
														<input type="hidden" name="heading_<?php echo $form_field['random_number']; ?>" value="<?php echo $form_field['input_type'] .'_'.$form_field['random_number']; ?>" class="form-control form_input_name" placeholder="Name">
													</div>
												</div>
											</div>
										</div>
						<?php		} else if(in_array($form_field['input_type'], array('note'))){	?>
										<div class="li_<?php echo $form_field['random_number']; ?> form_builder_field">
											<div class="all_div">
												<div class="row li_row">
													<div class="col-md-12">
														<label class="pull-left"><b><?php echo ucfirst($form_field['input_type']) ?></b></label>
														<button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="<?php echo $form_field['random_number']; ?>"><i class="fa fa-times"></i></button>
													</div>
												</div>
											</div>
											<hr>
											<div class="row li_row form_output" data-type="<?php echo $form_field['input_type']; ?>" data-field="<?php echo $form_field['random_number']; ?>">
												<div class="col-md-12">
													<div class="form-group">
														<textarea rows="5" name="note_<?php echo $form_field['random_number']; ?>" class="form-control form_input_label" placeholder="Enter contetn" data-field="<?php echo $form_field['random_number']; ?>"><?php echo $form_field['note']; ?></textarea>
														<input type="hidden" name="note_<?php echo $form_field['random_number']; ?>" value="<?php echo $form_field['input_type'] .'_'.$form_field['random_number']; ?>" class="form-control form_input_name" placeholder="Name">
													</div>
												</div>
											</div>
										</div>
						<?php		} else if(in_array($form_field['input_type'], array('file'))){	?>
										<div class="li_<?php echo $form_field['random_number']; ?> form_builder_field">
											<div class="all_div">
												<div class="row li_row">
													<div class="col-md-12">
														<label class="pull-left"><b><?php echo ucfirst($form_field['input_type']) ?></b></label>
														<button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="<?php echo $form_field['random_number']; ?>"><i class="fa fa-times"></i></button>
													</div>
												</div>
											</div>
											<hr>
											<div class="row li_row form_output" data-type="<?php echo $form_field['input_type']; ?>" data-field="<?php echo $form_field['random_number']; ?>">
												<div class="col-md-12">
													<div class="form-group">
														<input type="text" name="label_<?php echo $form_field['random_number']; ?>" class="form-control form_input_label" value="<?php echo $form_field['label']; ?>" data-field="<?php echo $form_field['random_number']; ?>">
														<input type="hidden" name="note_<?php echo $form_field['random_number']; ?>" value="<?php echo $form_field['input_type'] .'_'.$form_field['random_number']; ?>" class="form-control form_input_name" placeholder="Name">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-check">
														<label class="form-check-label">
														<input data-field="<?php echo $form_field['random_number']; ?>" type="checkbox" class="form-check-input form_input_req" <?php echo $form_field['required'] == "requir" ? "Checked" : ''; ?>>Required</label>
													</div>
												</div>
											</div>
										</div>
						<?php		}
								}
							
							}
						?>
							

						</div>
					</div>
					<div class="col-md-5">
						<h4 class="form_builder_heading">Preview</h4>
						<div class="row">
							<div class="col-md-12">
								<div class="preview" style="background:#dedede; padding:0px 10px;"></div>
								<div style="display: none" class="form-group plain_html"><textarea rows="50" class="form-control"></textarea></div>
								<input type="hidden" name="form[input_list]" id="form_inputs" value="">
							</div>
						</div>
					</div>
				</div>			 
			</div>
		</div>

		<div class="panel-footer text-center">
			<!--button style="cursor: pointer;display: none" class="btn btn-info export_html mt-2 pull-right">Export HTML</button-->
			<button type="submit" name="submit" class="btn btn-primary" id="btn_form_submit" ><i class="ti-save-alt pr-2"></i> Save</button>
			<!--button type="button" name="submit" id="btn_form_submit" class="btn btn-primary"><i class="ti-save-alt pr-2"></i> Save</button-->
		</div>
	</div>
</form>

<script type='text/javascript' src='public/js/form_builder.js'></script>
<script src="public/js/jquery-ui.min.js"></script>
<?php include (DIR_ADMIN.'app/views/common/footer.tpl.php'); ?>
