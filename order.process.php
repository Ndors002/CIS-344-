
<?php
  // create short variable names
  $redwineqty = isset($_POST['redwineqty']) ? (int) $_POST['redwineqty'] : 0;
  $whitewineqty = isset($_POST['whitewineqty']) ? (int) $_POST['whitewineqty'] : 0;
  $rosewineqty = isset($_POST['specialtywineqty']) ? (int) $_POST['specialtywineqty'] : 0;
  $address = isset($_POST['address']) ? preg_replace('/\t|\R/', ' ', $_POST['address']) : '';
  $document_root = $_SERVER['DOCUMENT_ROOT'];
  $date = date('H:i, jS F Y');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Delicioso Wine - Order Results</title>
  </head>
  <body>
    <h1>Delicioso Wine</h1>
    <h2>Order Results</h2> 
    <?php
      echo "<p>Order processed at " . htmlspecialchars($date) . "</p>";
      echo "<p>Your order is as follows: </p>";

      $totalqty = 0;
      $totalamount = 0.00;

      // Define wine prices
      define('REDWINEPRICE', 25);
      define('WHITEWINEPRICE', 20);
      define('SPECIALTYWINEPRICE', 22);

      $totalqty = $redwineqty + $whitewineqty + $specialtywineqty;
      echo "<p>Items ordered: " . htmlspecialchars($totalqty) . "<br />";

      if ($totalqty == 0) {
        echo "You did not order anything on the previous page!<br />";
      } else {
        if ($redwineqty > 0) {
          echo htmlspecialchars($redwineqty) . ' bottles of red wine<br />';
        }
        if ($whitewineqty > 0) {
          echo htmlspecialchars($whitewineqty) . ' bottles of white wine<br />';
        }
        if ($specialtywineqty > 0) {
          echo htmlspecialchars($specialtywineqty) . ' bottles of specialty wine<br />';
        }
      }

      // Calculate total amount
      $totalamount = $redwineqty * REDWINEPRICE
                   + $whitewineqty * WHITEWINEPRICE
                   + $specialtywineqty * ROSEWINEPRICE;

      echo "Subtotal: $" . number_format($totalamount, 2) . "<br />";

      $taxrate = 0.15;  // local sales tax is 15%
      $totalamount = $totalamount * (1 + $taxrate);
      echo "Total including tax: $" . number_format($totalamount, 2) . "</p>";

      echo "<p>Address to ship to is " . htmlspecialchars($address) . "</p>";

      // Create the order output string
      $outputstring = $date . "\t" . $redwineqty . " red wine\t" . $whitewineqty . " white wine\t"
                      . $specialtywineqty . " rosé wine\t\$" . number_format($totalamount, 2)
                      . "\t" . $address . "\n";

       // Open file for appending
       @$fp = fopen("$document_root/../orders/orders.txt", 'ab');

       if (!$fp) {
         echo "<p><strong> Your order could not be processed at this time.
               Please try again later.</strong></p>";
         exit;
       }

       // Write to the file
       flock($fp, LOCK_EX);
       fwrite($fp, $outputstring, strlen($outputstring));
       flock($fp, LOCK_UN);
       fclose($fp);

       echo "<p>Order written.</p>";
    ?>
  </body>
</html>
