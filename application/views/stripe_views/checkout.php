<html>
  <head>
    <title>Buy cool new product</title>
  </head>
  <body>
    <!-- Use action="/create-checkout-session.php" if your server is PHP based. -->
    <form action="<?php echo base_url() ?>Stripe/create_checkout_session" method="POST">
      <button type="submit">Checkout</button>
    </form>
  </body>
</html>