<?php include (DIR_ADMIN.'app/views/common/header.tpl.php'); ?>
<div class="page-title">
	<div class="row align-items-center">
		<div class="col-sm-6">
			<h2 class="page-title-text d-inline-block"><?php echo $page_title; ?></h2>
			<div class="breadcrumbs d-inline-block">
				<ul>
					<li><a href="<?php echo URL_ADMIN; ?>">Dashboard</a></li>
					<li><?php echo $page_title; ?></li>
				</ul>
			</div>
		</div>
		<div class="col-sm-6 text-right">
			<div class="dropdown d-inline-block mr-2">
				<a class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown"><i class="ti-download text-primary pr-2"></i> Export</a>
				<ul class="dropdown-menu dropdown-menu-right export-button">
					<li><a href="#" class="pdf"><i class="far fa-file-pdf pr-2"></i>PDF</a></li>
					<li><a href="#" class="excel"><i class="far fa-file-excel pr-2"></i>Excel</a></li>
					<li><a href="#" class="csv"><i class="ti-clipboard pr-2"></i>CSV</a></li>
					<li><a href="#" class="print"><i class="ti-printer pr-2"></i>Print</a></li>
					<li><a href="#" class="copy"><i class="ti-layers pr-2"></i>Copy</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-8">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-middle table-bordered table-striped datatable-table">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Parent Category</th>
								<?php if ($page_delete || $page_edit) { ?>
									<th></th>
								<?php } ?>
							</tr>
						</thead>
						<tbody>
							<?php if (!empty($result)) { foreach ($result as $key => $value) { ?>
								<tr>
									<td><?php echo $key+1; ?></td>
									<td class="text-primary"><?php echo $value['name'];?></td>
									<td><?php echo $value['parent']; ?></td>
									<?php if ($page_delete || $page_edit) { ?>
										<td class="table-action">
											<?php if ($page_edit) { ?>
												<a href="<?php echo URL_ADMIN.DIR_ROUTE.'category/edit&id='.$value['id']; ?>" class="text-primary edit" data-toggle="tooltip" title="Edit"><i class="ti-pencil-alt"></i></a>
											<?php } if ($page_delete) { ?>
												<a class="table-delete text-danger delete" data-toggle="tooltip" title="Delete">
													<i class="ti-trash"></i><input type="hidden" value="<?php echo $value['id'];?>">
												</a>
											<?php } ?>
										</td>
									<?php } ?>
								</tr>
							<?php } } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php if ($page_add) { ?>
		<div class="col-lg-4">
			<div class="panel panel-default">
				<div class="panel-head">
					<div class="panel-title">
						<span class="panel-title-text">Add Category</span>
					</div>
				</div>
				<form action="<?php echo $action; ?>" method="post">
					<div class="panel-body">
						<input type="hidden" name="_token" value="<?php echo $token; ?>">
						<div class="form-group">
							<label>Name <span class="form-required">*</span></label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ti-tag"></i></span>
								</div>
								<input type="text" class="form-control" name="category[name]" placeholder="Enter Category Name . . ." required>
							</div>
						</div>
						<div class="form-group">
							<label>Slug <span class="form-required">*</span></label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ti-tag"></i></span>
								</div>
								<input type="text" class="form-control" name="category[slug]" placeholder="Enter Slug Name . . ." required>
							</div>
						</div>
						<div class="form-group">
							<label>Icon</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ti-marker"></i></span>
								</div>
								<input type="text" class="form-control" name="category[icon]" placeholder="Enter Icon Name . . .">
							</div>
						</div>
						<div class="form-group mb-0">
							<label>Parent Category</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="ti-check-box"></i></span>
								</div>
								<select name="category[parent]" class="custom-select">
									<option value="" disabled selected>Select Parent Category</option>
									<?php if (!empty($result)) { foreach ($result as $key => $value) { ?>
										<option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
									<?php } } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="panel-footer text-center">
						<button type="submit" name="submit" class="btn btn-primary"><i class="ti-save-alt pr-2"></i>Save</button>
					</div>
				</form>
			</div>
		</div>
	<?php } ?>
</div>

<?php 
if ($page_delete) { include DIR_VIEW.'common/delete_modal.tpl.php'; }
include (DIR_ADMIN.'app/views/common/footer.tpl.php');
?>