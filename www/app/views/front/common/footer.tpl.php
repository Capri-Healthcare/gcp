<footer class="footer">
    <div class="container">
        <!--div class="footer_logo">
            <a href="<?php echo URL; ?>">
                <img src="public/images/footer_logo.png" alt="Glaucoma Care Plan" title="Glaucoma Care Plan" />
            </a>
        </div>
        <ul>
            <li>
                <a href="<?php echo URL; ?>">
                    <img src="public/images/facebook.png" alt="Facebook" title="Facebook" />
                </a>
            </li>
            <li>
                <a href="<?php echo URL; ?>">
                    <img src="public/images/twitter.png" alt="Twitter" title="Twitter" />
                </a>
            </li>
            <li>
                <a href="<?php echo URL; ?>">
                    <img src="public/images/linked-in.png" alt="linked-in" title="linked-in" />
                </a>
            </li>
        </ul-->
    </div>
</footer>

<!-- Set Confirmation Message on create, update and delete -->
<!-- Included Scripts -->
<script src="<?php echo URL.'public/js/vendor.min.js'; ?>"></script>
<script src="<?php echo URL.'public/js/custom.js'; ?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<?php if (isset($message) && !empty($message)) { ?>
    <!-- Set Confirmation Message on create, update and delete -->
    <script>
        /*Set toastr Option*/
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "10000",
            "hideDuration": "10000",
            "timeOut": "5000",
            "extendedTimeOut": "800",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        /*toastr.<?php echo $this->session->data['message']['alert']; ?>('<?php echo  $this->session->data['message']['value']; ?>', '<?php echo ucfirst($this->session->data['message']['alert']); ?>');*/
		
toastr.<?php echo $message['alert']; ?>("<?php echo $message['value']; ?>");

    </script>


<?php } ?>

