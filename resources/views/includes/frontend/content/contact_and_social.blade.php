<div class="row mb-3">
    <div class="col-12">
        <h5 class="mb-3">Contact</h5>
        <?php if($listing_details['website'] != ""){ ?>
        <a href="<?php echo $listing_details['website']; ?>" target="blank" class="btn_1 full-width outline wishlist social-button" id = "btn-wishlist-social"><i class="icon-globe-6 mr-2"></i>Website</a>
        <?php } ?>

        <?php if($listing_details['email'] != ""){ ?>
        <a href="mailto:<?php echo $listing_details['email']; ?>" target="" class="btn_1 full-width outline wishlist social-button" id = "btn-wishlist-social"><i class="icon-email mr-2"></i>Email us</a>
        <?php } ?>

        <?php if($listing_details['phone'] != ""){ ?>
        <a href="tel:<?php echo $listing_details['phone']; ?>" target="" class="btn_1 full-width outline wishlist social-button" id = "btn-wishlist-social"><i class="icon-phone mr-2"></i>Call now</a>
        <?php } ?>




        <?php if($listing_details['facebook'] != ""){ ?>
        <a href="<?php echo $listing_details['facebook']; ?>" target="blank" class="btn_1 full-width outline wishlist social-button" id = "btn-wishlist-social"><i class="icon-facebook-6 mr-2"></i>Facebook</a>
        <?php } ?>

        <?php if($listing_details['twitter'] != ""){ ?>
        <a href="<?php echo $listing_details['twitter']; ?>" target="blank" class="btn_1 full-width outline wishlist social-button" id = "btn-wishlist-social"><i class="icon-twitter mr-2"></i>Twitter</a>
        <?php } ?>

        <?php if($listing_details['linkedin'] != ""){ ?>
        <a href="<?php echo $listing_details['linkedin']; ?>" target="blank" class="btn_1 full-width outline wishlist social-button" id = "btn-wishlist-social"><i class="icon-linkedin mr-2"></i>Linkedin</a>
        <?php } ?>
    </div>
</div>
