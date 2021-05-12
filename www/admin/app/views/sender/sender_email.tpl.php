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
        <div class="col-sm-6 text-right"></div>
    </div>
</div>
<form action="<?php echo $action; ?>" class="row" method="post">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <input type="hidden" name="_token" value="<?php echo $token; ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name <span class="form-required">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>
                                <input type="text" name="receiver[name]" class="form-control" placeholder="Enter Name . . ." required>
                                <?php 
                                    if(isset($email_type)){
                                        echo '<input type="hidden" name="receiver[email_type]" value="'.$email_type.'" >';
                                    }
                                    if(isset($video_consultation_link)){
                                        echo '<input type="hidden" name="receiver[video_consultation_link]" value="'.$video_consultation_link.'">';
                                    }
                                ?>
                                <?php if(isset($tokBoxSession['tokbox_session_id'])){
										echo "<input type='hidden' name='mail[tokbox_session_id]' value='".$tokBoxSession['tokbox_session_id']."'>";
									} ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mobile</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-email"></i></span></div>
                                <input type="text" name="receiver[mobile]" class="form-control" placeholder="Enter Mobile Number . . ." required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email Address <span class="form-required">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-email"></i></span></div>
                                <input type="text" name="receiver[email]" class="form-control" placeholder="Enter Email Address . . ." required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>CC </label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-email"></i></span></div>
                                <input type="text" name="receiver[cc]" class="form-control" value="<?php echo $cc; ?>" placeholder="Enter Email Address . . ." required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Subject <span class="form-required">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="ti-comment"></i></span></div>
                        <input type="text" name="receiver[subject]" class="form-control" value="<?php echo $email_subject; ?>" placeholder="Enter Subject . . ." required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea name="receiver[message]" class="summernote"><?php echo $email_body; ?></textarea>
                </div>
            </div>
            <div class="panel-footer text-center">
                <button type="submit" name="submit" class="btn btn-primary"><i class="ti-save-alt pr-2"></i> Submit</button>
            </div>
        </div>
    </div>
</form>

<!-- include summernote css/js-->
<link href="public/css/summernote-bs4.css" rel="stylesheet">
<script type="text/javascript" src="public/js/summernote-bs4.min.js"></script>
<script type="text/javascript" src="public/js/klinikal.summernote.js"></script>

<?php include (DIR_ADMIN.'app/views/common/footer.tpl.php'); ?>