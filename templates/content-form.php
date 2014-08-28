<?php

  $nonce = wp_create_nonce('email-nonce');  // create a one time use number for php security

?>
<form method="post" class="email-form form-horizontal" action="<?php echo esc_url(home_url( '/' )) . 'thank-you-page?_nonce=' . $nonce; ?>">
  <div class="form-group">
    <label id="status-message"></label>
  </div>
  <div class="form-group">
    <label for="jamaEmail" class="col-sm-2 text-right">E-Mail</label>
    <div class="col-sm-5">
      <input name="jamaemail" type="text" class="form-control" id="jamaEmail">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-2">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
<script type="text/javascript">
  jQuery(document).ready(function($){

    // Inline JavaScript to validate the email before sending to thank you page.

    $('.email-form').submit(function(e){ // Write handler for form Submit Event

      var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

      if ( re.test( $("#jamaEmail").val() ) ) { // check to see if email is valid

        return; // If valid, continue as normal, posting the form to the next page.

      } else {

        // If not, warn the user that the email is not valid, and try again.
        $("#status-message").text( "invalid" );

      }

      e.preventDefault(); // Prevent Default action if email is invalid, staying on the same page.

    });

  });
</script>
