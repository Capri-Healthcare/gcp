<?php include (DIR_ADMIN.'app/views/common/header.tpl.php'); ?>

<div class="page-title">
	<div class="row align-items-center">
		<div class="col-sm-6">
			<h2 class="page-title-text d-inline-block"><?php echo $page_title; ?></h2>
			<div class="breadcrumbs d-inline-block">
				<ul>
					<li><a href="<?php echo URL_ADMIN; ?>">Dashboard</a></li>
					<li><a href="<?php echo URL_ADMIN.DIR_ROUTE.'prescriptions'; ?>">Prescriptions</a></li>
					<li><?php echo $page_title; ?></li>
				</ul>
			</div>
		</div>
		<div class="col-sm-6 text-right">
			<a href="<?php echo URL_ADMIN.DIR_ROUTE.'prescription/pdf&id='.$result['id']; ?>" class="btn btn-danger btn-sm" target="_blank"><i class="far fa-file-pdf mr-2"></i>PDF/Print</a>
			<a href="<?php echo URL_ADMIN.DIR_ROUTE.'prescription/edit&id='.$result['id']; ?>" class="btn btn-primary btn-sm"><i class="ti-pencil-alt mr-2"></i>Edit</a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="user-avtar">
					<span><?php echo $result['name'][0]; ?></span>
				</div>
				<div class="user-details text-center pt-3">
					<h3><?php echo $result['name']; ?></h3>
					<p><?php echo $result['email']; ?></p>
					<table class="table table-striped">
						<tbody>
							<tr>
								<td>Doctor</td>
								<td><?php echo 'Dr. '.$result['doctor']; ?></td>
							</tr>
							<tr>
								<td>Created Date</td>
								<td><?php echo date_format(date_create($result['date_of_joining']), $common['info']['date_format']); ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped">
                        <tr>
                            <th style="width: 25%;">Drug Name</th>
                            <!--th>Generic</th-->
                            <th style="width: 15%;">Frequency</th>
                            <!--th style="width: 13%;">Duration</th-->
                            <th style="width: 25%;">Instruction</th>
                            <th style="width: 10%;">Start date</th>
                            <th style="width: 10%;">End date</th>
                            <th style="width: 15%;">Eye</th>
                        </tr>
                        <?php if (!empty($result['prescription'])) { ?>
                            <?php foreach ($result['prescription'] as $key => $value) { ?>

                                <tr>
                                    <td><?php echo $value['name']; ?></td>
                                    <td><?php echo $value['duration']; ?></td>
                                    <td><?php echo $value['instruction']; ?></td>
                                    <td><?php echo date_format(date_create($value['start_date']),'d-m-Y'); ?></td>
                                    <td><?php echo date_format(date_create($value['end_date']),'d-m-Y'); ?></td>
									<td><?php echo constant('PRESCRIPTION_DROP_DOWNS')['PRESCRIPTION_EYE'][$value['eye']]; ?></td>
                                </tr>
                            <?php } } ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Footer -->
<?php include (DIR_ADMIN.'app/views/common/footer.tpl.php'); ?>