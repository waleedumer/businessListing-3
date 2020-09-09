{{$settings=App\Setting::all()->keyBy('type')}}
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stripe | <?php echo $settings['website_title']->description;?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo asset('payment/css/stripe.css');?>" rel="stylesheet">
    <link name="favicon" type="image/x-icon" href="<?php echo asset('global/favicon.png') ?>" rel="shortcut icon" />
</head>
<body>
<!--required for getting the stripe token-->
<?php
$stripe_keys = $settings['stripe']->description;
$values = json_decode($stripe_keys);
if ($values[0]->testmode == 'on') {
    $public_key = $values[0]->public_key;
    $private_key = $values[0]->secret_key;
} else {
    $public_key = $values[0]->public_live_key;
    $private_key = $values[0]->secret_live_key;
}
?>

<script>
    var stripe_key = '<?php echo $public_key;?>';
</script>

<!--required for getting the stripe token-->

<img src="<?php echo asset('global/logo-sm.png'); ?>" width="15%;"
     style="opacity: 0.05;">
<form method="post"
      action="<?php echo url('user/payment_success/stripe/' . $user_details['id'].'/'.$package_details['id'].'/'.$package_details['price']);?>">
    <label>
        <div id="card-element" class="field is-empty"></div>
        <span><span>Credit / Debit Card</span></span>
    </label>
    <button type="submit">
        Pay <?php echo $settings['system_currency']->description." ".($package_details['price']).' '.$settings['stripe_currency']->description;?>
    </button>
    <div class="outcome">
        <div class="error" role="alert"></div>
        <div class="success">
            Success! Your Stripe token is <span class="token"></span>
        </div>
    </div>
    <div class="package-details">
        <strong>User name | <?php echo $user_details['name'];?></strong> <br>
    </div>
    <input type="hidden" name="stripeToken" value="">
</form>
<img src="https://stripe.com/img/about/logos/logos/blue.png" width="25%;" style="opacity: 0.05;">
<script src="https://js.stripe.com/v3/"></script>
<script src="<?php echo url('assets/payment/js/stripe.js');?>"></script>

<script type="text/javascript">
    get_stripe_currency('<?php echo $settings['stripe_currency']->description; ?>');
</script>

</body>
</html>
