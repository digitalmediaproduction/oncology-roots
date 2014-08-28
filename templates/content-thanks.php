<?php

if ( isset( $_REQUEST['_nonce'] ) ) { // check to see if _nonce exists

  // nonce does exist, so we continue.

  $nonce = $_REQUEST['_nonce']; // Assign Nonce to variable

  if ( wp_verify_nonce( $nonce, 'email-nonce' ) ) { // check if nonce is valid

    // Nonce is valid, so we continue.

    if ( isset($_POST['jamaemail'] ) ) { // check if jama email is here

      // jamaemail does exist.  Since it was sent by form page, we assume it's a valid email
      $email = $_POST['jamaemail'];

      // We have both a valid nonce and email, time to add the email to mailing list.

      // Echoing values for test / debug.  Real addition would just be 'pixel' image request

      ?>

      <h2>Stats</h2>
      <p>Nonce: <?php echo $nonce; ?></p>
      <p>Email: <?php echo $email; ?></p>

      <!-- <img src="http://server1.emailcampaigns.net/autoadd/?c=1vdSFe&lid=233&email=<?php //echo $email ?>"/> -->
      <?php

    } else {

      echo "jamaemail doesn't exist! Thank you";

    } // endif jamaemail check

  } else {

    echo "nonce is not valid! Thank you";

  } // endif nonce validation

} else {

  echo "nonce doesn't exist! Thank you";

} // endif Nonce check

// Closing PHP Tag back to template ?>
