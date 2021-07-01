<form action="<?php echo $action; ?>" method="post" class="pt-2">
    <input type="hidden" name="_token" value="<?php echo $token ?>">
    <div class="row">
        <div class="col-md-4">
            <div class="input-box">
                <label for="old"><?php echo $lang['text_old_password']; ?></label>
                <input type="password" id="old" name="old" required>                
            </div>
            <div class="input-box">
                <label for="new"><?php echo $lang['text_new_password']; ?></label>
                <input type="password" id="new" name="new" required>
            </div>
            <div class="input-box">
                <label for="confirm"><?php echo $lang['text_confirm_password']; ?></label>
                <input type="password" id="confirm" name="confirm" required>
            </div>
            <input type="hidden" name="email" value="<?php echo $user['email']; ?>">
            <div class="text-center pb-3">
                <button type="submit" name="submit" class="btn btn-primary btn-shadow btn-pill"><?php echo $lang['text_change_password']; ?></button>
            </div>
        </div>
        
    </div>
</form>
