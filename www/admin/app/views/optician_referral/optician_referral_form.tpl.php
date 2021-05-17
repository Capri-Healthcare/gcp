<?php include (DIR_ADMIN.'app/views/common/header.tpl.php'); ?>
<div class="page-title">
	<div class="row align-items-center">
		<div class="col-sm-12">
			<h2 class="page-title-text d-inline-block"><?php echo $page_title; ?></h2>
			<div class="breadcrumbs d-inline-block">
				<ul>
					<li><a href="<?php echo URL_ADMIN; ?>">Dashboard</a></li>
					<li><a href="<?php echo URL_ADMIN.DIR_ROUTE.'optician-referral'; ?>">Optician Referral</a></li>
					<li><?php echo $page_title; ?></li>
				</ul>
			</div>
		</div>
		<div class="col-sm-6 text-right"></div>
	</div>
</div>
<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="<?php echo $token; ?>">
	<input type="hidden" name="referral[id]" value="<?php echo $result['id'];?>">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="form-group">
						<label>First Name <span class="form-required">*</span></label>
						<div class="input-group">
							<div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>
							<input type="text" name="referral[first_name]" class="form-control" value="<?php echo $result['first_name'];?>" placeholder="First Name" required>
						</div>
					</div>
                    <div class="form-group">
                        <label>Last Name <span class="form-required">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>
                            <input type="text" name="referral[last_name]" class="form-control" value="<?php echo $result['last_name'];?>" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>DOB <span class="form-required">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="ti-calendar"></i></span></div>
                            <input type="text" name="referral[dob]" class="form-control date" value="<?php echo $result['dob'];?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address 1<span class="form-required">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ti-check-box"></i></span>
                            </div>
                            <textarea name="referral[address_1]" class="form-control" placeholder="Enter Address" row=3><?php echo $result['address1'];?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address 2</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="ti-check-box"></i></span></div>
                            <textarea name="referral[address_2]" class="form-control" placeholder="Enter Address" row=3><?php echo $result['address2'];?></textarea>

                        </div>
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="ti-tag"></i></span></div>
                            <input type="text" name="referral[city]" class="form-control" value="<?php echo $result['city'];?>" placeholder="Enter City" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Zip Code</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="ti-tag"></i></span></div>
                            <input type="text" name="referral[zip_code]" maxlength="6" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" class="form-control" value="<?php echo $result['zip_code'];?>" placeholder="Enter Zip Code" required>
                        </div>
                    </div>
				</div>
                <div class="panel-footer text-center">
                    <button type="submit" name="submit" class="btn btn-primary"><i class="ti-save-alt pr-2"></i> Save</button>
                </div>
			</div>
		</div>
	</div>

</form>
<!-- include summernote css/js-->
<link href="public/css/summernote-bs4.css" rel="stylesheet">
<script type="text/javascript" src="public/js/summernote-bs4.min.js"></script>
<script type="text/javascript" src="public/js/klinikal.summernote.js"></script>

<!-- Footer -->
<?php include (DIR_ADMIN.'app/views/common/footer.tpl.php'); ?>