{{$settings=\App\Setting::all()->keyBy('type')}}
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Paypal | <?php echo $settings['website_title']->description;?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo asset('payment/css/stripe.css');?>"
          rel="stylesheet">
    <link name="favicon" type="image/x-icon" href="<?php echo asset('assets/global/favicon.png') ?>" rel="shortcut icon" />
</head>
<body>
<?php
$paypal_keys = $settings['paypal']->description;
$paypal = json_decode($paypal_keys);
?>
<!--required for getting the stripe token-->

<img src="<?php echo asset('global/logo-sm.png'); ?>" width="15%;"
     style="opacity: 0.05;">

<div class="package-details">
    <strong>User name | <?php echo $user_details['name'];?></strong> <br>
    <strong>Amount to pay | <?php echo $settings['system_currency']->description($package_details['price']);?></strong> <br>
    <div id="paypal-button" style="margin-top: 20px;"></div><br>
</div>

<img src="https://www.paypalobjects.com/webstatic/i/logo/rebrand/ppcom-white.svg" width="25%;"
     style="opacity: 0.05;">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<script>
    paypal.Button.render({
        env: '<?php echo $paypal[0]->mode;?>', // 'sandbox' or 'production'
        style: {
            label: 'paypal',
            size:  'medium',    // small | medium | large | responsive
            shape: 'rect',     // pill | rect
            color: 'blue',     // gold | blue | silver | black
            tagline: false
        },
        client: {
            sandbox:    '<?php echo $paypal[0]->sandbox_client_id;?>',
            production: '<?php echo $paypal[0]->production_client_id;?>'
        },

        commit: true, // Show a 'Pay Now' button

        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: '<?php echo $package_details['price'];?>', currency: '<?php echo $settings['paypal_currency']->description; ?>' }
                        }
                    ]
                }
            });
        },

        onAuthorize: function(data, actions) {
            // executes the payment
            return actions.payment.execute().then(function() {
                // make an ajax call for saving the payment info
                $.ajax({
                    url: '<?php echo url('user/payment_success/paypal/'.$user_details['id'].'/'.$package_details['id'].'/'.$package_details['price']);?>'
                }).done(function () {
                    window.location = '<?php echo url('user/packages');?>';
                });
            });
        }

    }, '#paypal-button');
</script>

</body>
</html>
