<?php include (DIR_ADMIN.'app/views/common/header.tpl.php'); ?>
<div class="page-title">
	<div class="row align-items-center">
		<div class="col-sm-6">
			<h2 class="page-title-text d-inline-block">Duplicate Patients</h2>
			<div class="breadcrumbs d-inline-block">
				<ul>
					<li><a href="#">Home</a></li>
					<li>Patients</li>
					<li>Duplicate Patients</li>
				</ul>
			</div>
		</div>
		<div class="col-sm-6 text-right">
            <a href="<?php echo URL_ADMIN.DIR_ROUTE.'patients'; ?>" class="btn btn-primary btn-sm">Back To Patient</a>
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-body">
		<div class="table-responsive">
			<table id="user-table" class="table table-middle table-bordered table-striped">
				<thead>
					<tr class="table-heading">
						<th>Patient name</th>
						<th>Date of Birth</th>
						<th>Record</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
                <?php if (isset($duplicate_patients) && !empty($duplicate_patients)) { foreach ($duplicate_patients as $key => $value) { ?>
                <tr>
                    <td><?php echo $value['firstname']." ".$value['lastname'];?></td>
                    <td><?php echo $value['dob'];?></td>
                    <td><?php echo $value['total_patient'];?></td>
                    <td><a class="btn btn-primary btn-sm" href="<?php echo URL_ADMIN.DIR_ROUTE.'patient/merge&  id='.$value['ids'];?>">Merge</a></td>
                </tr>
                <?php } } ?>
   			</tbody>
			</table>
		</div>
	</div>
</div>