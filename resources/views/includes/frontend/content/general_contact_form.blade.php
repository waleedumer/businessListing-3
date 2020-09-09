<div class="price">
    <h5 class="d-inline">Contact us</h5>
    <?php if($listing_details->reviews()->count()>0):?>
    {{$total_review_rating=$listing_details->reviews->keyBy('review_rating')->keys()}}
    {{$avg =$listing_details->reviews->first()->review_rating}}
    @if(count($total_review_rating)>1)
    {{$avg =array_sum($total_review_rating)/count($total_review_rating)}}
    @endif
    <?php endif ?>
    <div class="score"><span><?php echo !empty($avg ?? '') ? $avg ?? '' : 'Unreviewed'; ?><em><?php echo $listing_details->reviews()->count().' '.'Reviews'; ?></em></span><strong><?php echo $avg ?? ''; ?></strong></div>
</div>
<div id="message-contact-detail"></div>
<div class="form-group">
    <input class="form-control" type="text" placeholder="Name" name="name" id="name" required>
    <i class="ti-user"></i>
</div>
<div class="form-group">
    <textarea placeholder="Your message" class="form-control" name="message" id="message" required></textarea>
    <i class="ti-pencil"></i>
</div>
