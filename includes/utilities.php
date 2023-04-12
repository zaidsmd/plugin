<?php
add_action('wp_head', 'include_jquery');
add_action('wp_footer', 'create_ajax_post_for_form');
add_action('wp_enqueue_scripts','enqueue_custom_scripts');

function include_jquery(): void
{
    ?>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
            integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <?php
}


function create_ajax_post_for_form(): void
{
    $success = "Your message has been submitted successfully!" ;
    $error ="Your message has not been submitted Please try again!" ;
    ?>
    <script>
        jQuery(document).ready(function ($) {
            $(".contact-form__form form").submit(function (event) {
                var formData = {
                    first_name: $("#fname").val(),
                    last_name: $("#lname").val(),
                    email: $("#email").val(),
                    subject: $("#subject").val(),
                    message: $("#message").val(),
                };
                $.ajax({
                    type: "POST",
                    url: '<?= MY_PLUGIN_URL . "includes/request_process.php" ?>',
                    data: formData,
                    dataType: "json",
                    encode: true,
                }).done(function (data) {
                    $('.form_response').removeClass('success').removeClass('error').empty();
                   if (data === "success"){
                       $('.form_response').addClass('success').text('<?=$success?>').css({"border":"1px solid green","color":"green"});
                   }else {
                       $('.form_response').addClass('error').text('<?=$error?>').css({"border":"1px solid red","color":"red"})
                   }
                    $(".contact-form__form form")[0].reset();
                    $(".contact-form__form").get(0).scrollIntoView({behavior: 'smooth'});
                });
                event.preventDefault();
            });
        })
        ;
    </script>
    <?php
}

function enqueue_custom_scripts()
{
    wp_enqueue_style('contact-form-plugin', MY_PLUGIN_URL . 'assets/contact-form-style.css');
}
