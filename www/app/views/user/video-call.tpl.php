<?php echo $header; ?>

<link href="<?php echo URL; ?>public/css/tokBox.css" rel="stylesheet" type="text/css">
<script src="https://static.opentok.com/v2/js/opentok.min.js"></script>

<div id="videos">
    <div id="loader"  style="width: 100%; height: 100%;"  align="center">
	    
        <div class="loader" style="margin:0 auto;">
            <img src="<?php echo URL; ?>public/images/loader.gif" style="width:100%">
        </div>
        <div class="loader-message" style="margin:0 auto; width=100%">
            <h4>The video call will start once the doctor joins the consultation.</h4>
        </div>
	</div>

    <div id="subscriber"></div>

    <div id="publisher"></div>

    
    <?php if(!empty($appointment)){ ?>
        <div id="patient-inf-on-video" style="display:none;">
            <div class="apnt-user">
                <div class="user-container">
                    <div class="row">
                        <div class="col-auto">
                            <div class="img">
                                <?php if (!empty($appointment['doctor_picture'])) { ?>
                                    <div class="picture tbl-cell">
                                        <img src="<?php echo URL.'public/uploads/'.$appointment['doctor_picture']; ?>" alt="Doctor">
                                    </div>
                                <?php } else { ?>
                                    <div class="icon tbl-cell">
                                        <i class="far fa-user"></i>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>



                        <div class="col-auto pl-0">
                            <div class="title mt-2">
                                <h4 class="m-0"><a href="#" class="d-block text-primary"><?php echo $appointment['doctor_name'] ?></a></h4>
                                <p class="font-12 mb-0 mt-2"><?php echo $appointment['doctor_email'] ?></p>
                                <p class="font-12 mb-0"><?php echo $appointment['doctor_mobile'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="info">
                    <h5 class="mb-0"><b>Problem</b></h5>
                    <p class="ml-0"><?php echo $appointment['message'] ?></p>
                </div>
            </div>
        </div>
    <?php } ?>
	

    <div id="screenpreview"></div>

    <div id="actionOptions">
        <div class="icon d-inline-block pl-5">
            <i class="fas fa-video" onclick="toggleVideo(this)" title="Turn Off video"></i>
        </div>
        <div class="icon d-inline-block pl-5">
            <i class="fas fa-microphone" onclick="muteMic(this)" title="Mute"></i>
        </div>
        <div class="icon d-inline-block pl-5">
            <i class="fas fa-expand" id="fullScreen" onclick="fullScreen(this)" title="Full Screen"></i>
        </div>
        <div class="icon d-inline-block pl-5">
            <i class="fas fa-desktop" data-toggle="modal"  onclick="shareScreen(this)" title="Share Screen"></i>
        </div>
        <div class="icon d-inline-block pl-5">
            <i class="fas fa-times" data-toggle="modal" data-target="#dissconnectModel" title="Dissconnect call"></i>
        </div>
	</div>

    <div style="display:none;margin-top:30px;" id="sessionEnd" align="center" justify="center">
          Session has Ended!
    </div>
</div>

<!-- Close Model -->
<div class="modal fade" id="dissconnectModel" tabindex="-1" role="dialog" aria-labelledby="dissconnectModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dissconnectModelLabel">Disconnect call?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Do you wish to disconnect?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" onclick="disconnect()" data-dismiss="modal">Yes</button>
            </div>
        </div>
    </div>
</div>

<script>
	var apiKey = "<?php echo TOKBOX_APIKEY ?>";
	var sessionId = "<?php echo $tokbox_details['sessionId'] ?>";
    var token = "<?php echo $tokbox_details['token'] ?>";
    var redirect_to = "<?php echo URL . "index.php?route=user/appointment&id=".$appointment['id'] ?>";
    var publisherName = "<?php echo isset($appointment['name']) ? $appointment['name'] : '' ?>";
</script>

<script type="text/javascript" src="<?php echo URL; ?>public/js/tokBox.js"></script>

<?php echo $footer; ?>