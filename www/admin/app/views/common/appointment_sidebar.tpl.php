<div class="sidebar sidebar-right appointmet-sidebar">
    <div class="sidebar-hdr">
        <div class="sidebar-close"><i class="ti-close"></i></div>
        <h3 class="title">Appointment</h3>
    </div>
    <form class="sidebar-bdy" action="<?php echo $action_new_appointment; ?>" method="post">
        <input type="hidden" name="_token" value="<?php echo $token; ?>">
        <div id="apnt-info">
            <input type="hidden" class="apnt-id" name="appointment[id]">
            <div class="form-group mb-2">
                <label>Name <span class="form-required">*</span></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ti-user"></i></span>
                    </div>
                    <input type="text" name="appointment[name]" value="<?php echo(isset($patient)?$patient['firstname']:'')?>" class="form-control patient-name" placeholder="Enter Name . . ." required>
                    <input type="hidden" name="appointment[patient_id]" value="<?php echo(isset($patient)?$patient['id']:'')?>" class="form-control patient-id">
                    <?php if(isset($_GET['followupid'])) { ?>
                    <input type="hidden" name="appointment[followupid]" value="<?php echo $_GET['followupid']?>" class="form-control">
                    <?php } if(isset($_GET['referralid'])) { ?>
                    <input type="hidden" name="appointment[referralid]" value="<?php echo $_GET['referralid']?>" class="form-control">
                    <?php } ?>
                </div>
            </div>
            <div class="form-group mb-2">
                <label>Email Address <span class="form-required">*</span></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ti-email"></i></span>
                    </div>
                    <input type="text" name="appointment[mail]" value="<?php echo(isset($patient)?$patient['email']:'')?>" class="form-control patient-mail" placeholder="Enter Email Address . . ." required>
                </div>
            </div>
            <div class="form-group mb-2">
                <label>Phone/Mobile number<span class="form-required">*</span></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ti-mobile"></i></span>
                    </div>
                    <input type="text" name="appointment[mobile]" value="<?php echo(isset($patient)?$patient['mobile']:'')?>" class="form-control patient-mobile" placeholder="Enter Mobile Number . . ." required>
                </div>
            </div>
            <div class="form-group mb-2">
                <label>Doctor <span class="form-required">*</span></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ti-user"></i></span>
                    </div>
                    <select name="appointment[doctor]" class="custom-select apnt-doctor" required>
                        <option value="">Select Doctor</option>
                        <?php foreach ($doctors as $value) { ?>
                            <option value="<?php echo $value['id']; ?>" data-department="<?php echo $value['department_id']; ?>" data-weekly="<?php echo htmlspecialchars($value['weekly'], ENT_QUOTES, 'UTF-8'); ?>" data-national="<?php echo htmlspecialchars($value['national'], ENT_QUOTES, 'UTF-8'); ?>" <?php echo(count($doctors) < 1)?'selected':''?>><?php echo $value['name'].' (' . $value['department'] . ')'; ?></option>
                        <?php } ?>
                    </select>
                    <input type="hidden" class="apnt-department" name="appointment[department]" value="">
                </div>
            </div>
            <div class="form-group mb-2">
                <label>Date <span class="form-required">*</span></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ti-calendar"></i></span>
                    </div>
                    <input type="text" name="appointment[date]" class="form-control apnt-date" value="" placeholder="Select Date . . ." required autocomplete="off">
                </div>
            </div>
            <div class="form-group mb-2">
                <label>Time <span class="form-required">*</span></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ti-timer"></i></span>
                    </div>
                    <input type="text" name="appointment[time]" class="form-control apnt-time" value="" required readonly>
                    <input type="hidden" name="appointment[slot]" class="apnt-slot-time" value="" required>
                </div>
                <div class="apnt-slot"></div>
            </div>
            <div class="form-group">
                <label>Status <span class="form-required">*</span></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ti-check-box"></i></span>
                    </div>
                    <select name="appointment[status]" class="custom-select apnt-status" required>
                        <option value="">Select appointment status</option>
                        <?php if (!empty(APPOINTMENT_STATUS)) { foreach (APPOINTMENT_STATUS as $status_id => $status) { ?>
                            <option value="<?php echo $status_id ?>" <?php echo ($status_id == 3) ?'selected':'' ?>><?php echo $status; ?></option>
                        <?php } } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="sidebar-ftr text-right">
            <a href="#" class="btn btn-default">View</a>
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>