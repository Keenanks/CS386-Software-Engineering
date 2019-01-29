<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
        <link rel = "stylesheet" href = "payment_style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

        <title>
            Make Payment
        </title>
    </head>
    <body>

        <script src="https://js.stripe.com/v3/"></script>
    <div class="container">
        <form action="charge.php" method="post" id="payment-form">
            <div class="form-row">
            <label for="card-element">
                Credit or debit card
            </label>
            <div id="card-element" class="form-control">
            <!-- A Stripe Element will be inserted here. -->
            </div>

            <!-- Used to display form errors. -->
            <div id="card-errors" role="alert"></div>
            </div>

            <button>Submit Payment</button>
        </form>
    </div>
        
        <script src = "charge.js"></script>
    </body>
</html>