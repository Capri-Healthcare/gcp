<?php include 'app/views/common/header.tpl.php'; ?>
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
		<div class="col-sm-6 text-right"></div>
	</div>
</div>


<div class="content">
	<div class="row">
		<form class="col-sm-6" action="<?php echo URL_ADMIN.DIR_ROUTE.'profile'; ?>" method="post">
			<div class="panel panel-default">
				<div class="panel-head">
					<div class="panel-title">Basic Info</div>
				</div>
				<div class="panel-body">
					<input type="hidden" name="_token" value="<?php echo $token; ?>">
					<input type="hidden" value="<?php echo $result['user_id']; ?>" name="id" >
					<div class="form-group">
						<label>User Name <span class="form-required">*</span></label>
						<input type="text" class="form-control" name="username" value="<?php echo $result['user_name'];?>" placeholder="User Name" required readonly>
					</div>
					<div class="row content-input">
						<div class="col-sm-6">
							<div class="form-group">
								<label>First Name <span class="form-required">*</span></label>
								<input type="text" class="form-control" name="firstname" value="<?php echo $result['firstname'];?>" placeholder="First Name">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Last Name <span class="form-required">*</span></label>
								<input type="text" class="form-control" name="lastname" value="<?php echo $result['lastname'];?>" placeholder="Last Name">
							</div>
						</div>
					</div>
					<div class="row content-input">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Email <span class="form-required">*</span></label>
								<input type="text" name="email" class="form-control" value="<?php echo $result['email'];?>" placeholder="Email" readonly >
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Mobile <span class="form-required">*</span></label>
								<input type="number" class="form-control" name="mobile" value="<?php echo $result['mobile'];?>"  pattern=".{6,}" placeholder="Mobile">
							</div>
						</div>
					</div>
					<div class="row content-input">
						<div class="col-md-6">
							<div class="form-group">
								<label>Address1 <span class="form-required">*</span></label>
								<input type="text" name="address[address1]" class="form-control" value="<?php echo $result['address']['address1']; ?>" placeholder="Enter Address Line 1 . . .">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Address2 <span class="form-required">*</span></label>
								<input type="text" name="address[address2]" class="form-control" value="<?php echo $result['address']['address2']; ?>" placeholder="Enter Address Line 2 . . .">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>City <span class="form-required">*</span></label>
								<input type="text" name="address[city]" class="form-control" value="<?php echo $result['address']['city']; ?>" placeholder="Enter City . . .">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Country <span class="form-required">*</span></label>
								<input type="text" name="address[country]" class="form-control" value="<?php echo $result['address']['country']; ?>" placeholder="Enter Country . . .">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Postal Code <span class="form-required">*</span></label>
								<input type="text" name="address[postal]" class="form-control" value="<?php echo $result['address']['postal']; ?>" placeholder="Enter Postal code . . .">
							</div>
						</div>
					</div>
					
				</div>
				<div class="panel-footer text-center">
					<button type="submit" name="submit" class="btn btn-primary"><i class="ti-save-alt pr-2"></i> Save</button>
				</div>
			</div>
		</form>
		<form class="col-sm-6" action="<?php echo URL_ADMIN.DIR_ROUTE.'profile/password'; ?>" method="post">
			<input type="hidden" name="_token" value="<?php echo $token; ?>">
			<input type="hidden" value="<?php echo $result['user_id']; ?>" name="id" >
			<div class="panel panel-default">
				<div class="panel-head">
					<div class="panel-title">Change Password</div>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label>Current Password <span class="form-required">*</span></label>
						<input type="password" class="form-control" name="old" pattern=".{6,}" title="Minimum 6 word required!" placeholder="**********" required>
					</div>
					<div class="form-group">
						<label>Password <span class="form-required">*</span></label>
						<input type="password" class="form-control" name="new" pattern=".{8,}" title="Minimum 8 word required!" placeholder="**********" required>
					</div>
					<div class="form-group">
						<label>Confirm Password <span class="form-required">*</span></label>
						<input type="password" class="form-control" name="confirm" title="Minimum 8 word required!" pattern=".{8,}" placeholder="**********" required>
					</div>
				</div>
				<div class="panel-footer text-center">
					<button type="submit" name="submit" class="btn btn-primary"><i class="ti-save-alt pr-2"></i> Save</button>
				</div>
			</div>
		</form>
	</div>
</div>

<!-- Footer -->
<?php include (DIR_ADMIN.'app/views/common/footer.tpl.php'); ?>