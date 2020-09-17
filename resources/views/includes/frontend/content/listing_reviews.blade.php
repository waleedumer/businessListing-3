<?php
    $reviews = $listing_details->reviews()->count();
    $reviews_exists=$listing_details->reviews()->exists();
    //dd($reviews);
    //dd($listing_details->reviews);
    if($reviews_exists){
        $rating = ($listing_details->reviews->keyBy('review_rating')->keys()->sum())/$reviews;
    }
    $user_id = $listing_details->user['id'];
    $user_type = $listing_details->user->role['id'];
?>

<section id="reviews">
    <h2>Reviews</h2>
    <!-- Ratings starts -->
    <div class="reviews-container add_bottom_30">
        <div class="row">
            <div class="col-lg-3">
                <div id="review_summary">
                    <strong><?php echo $reviews_exists?$listing_details->reviews->first()['review_rating']:'0.0';?></strong>
                    <em>

                    </em>
                    <small>Based on {{$reviews}} Reviews</small>

                </div>
            </div>
            <div class="col-lg-9">
                <!-- Rating Progeress Bar -->

                <?php for($i = 1; $i <= 5; $i++): ?>
                <div class="row">
                    <div class="col-lg-10 col-9">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: <?php echo$reviews_exists? $listing_details->reviews->first()['review_rating']/$listing_details->reviews()->count()*100:0; ?>%" aria-valuenow="{{$reviews_exists?$listing_details->reviews->first()['review_rating']/$listing_details->reviews()->count()*100:0}}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-3"><small><strong><?php echo $i.'Stars'; ?></strong></small></div>
                </div>
                <?php endfor; ?>

            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- Ratings ends -->

    <div class="reviews-container">
        <!-- Single Review Starts -->
{{--        {{dd($listing_details->reviews())}}--}}
        <?php if($reviews_exists):?>
        <?php foreach ($listing_details->reviews as $review): ?>
        <div class="review-box clearfix">
            <?php $reviewer =  $review->user; ?>

            <?php
            $file_name = 'uploads/user_image/'.$reviewer['photo'].'.jpg';

            if (file_exists($file_name)) {
            ?>
            <figure class="rev-thumb"><img src="<?php echo asset('uploads/user_image/'.$reviewer['id'].'.jpg'); ?>" alt=""></figure>
            <?php }else { ?>
            <figure class="rev-thumb"><img src="<?php echo asset('uploads/user_image/user.png'); ?>" alt=""></figure>
            <?php } ?>
            <div class="rev-content">
                <div class="rating">
                    <?php for($i = 1; $i <= $review['review_rating']; $i++): ?>
                    <i class="icon_star voted"></i>
                    <?php endfor; ?>
                    <?php for($i = 1; $i <= (5-$review['review_rating']); $i++): ?>
                    <i class="icon_star"></i>
                    <?php endfor; ?>
                </div>
                <div class="rev-info">
                    <?php echo $reviewer['name']; ?> – <?php echo date('D, d-M-Y', $review['timestamp']); ?>:
                </div>
                <div class="rev-text">
                    <p>
                        <?php echo $review['review_comment']; ?>

                        <?php
                        if($user_type == 1){
                        ?>
                        <span class="p-0 m-0 float-right">
                  <a href="javascript: void(0);" onclick="confirm_modal('<?php echo url('admin/review_modify/delete/'.$review['id']); ?>');" class="text-danger"><i class="icon-trash pb-2"></i></a>
                </span>

                        <?php }elseif($user_type == 2 && $user_id == $reviewer['id']){ ?>
                        <span class="p-0 m-0 mt-1 float-right">
                  <a href="javascript: void(0);" onclick="edit_review('<?php echo $review['review_id'] ?>')"><i class="icon-edit" ></i></a>
                  <a href="javascript: void(0);" onclick="confirm_modal('<?php echo url('user/review_modify/delete/'.$review['review_id'].'/'.$slug ?? ''.'/'.$listing_id); ?>');" class="text-danger"><i class="icon-trash pb-2"></i></a>
                </span>
                        <?php } ?>
                    </p>

                    <?php if($user_type == 2 && $user_id == $reviewer['id']){ ?>
                    <div class="row" id="<?php echo $review['review_id'] ?>" style="display: none;">
                        <div class="col-12">
                            <form method="post" action="<?php echo url('user/review_modify/edit/'.$review['review_id'].'/'.$slug ?? ''.'/'.$listing_id); ?>">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label> Rating </label>
                                        <div class="custom-select-form">
                                            <select name="review_rating" id="review_rating" class="wide">
                                                <option value="1" <?php if(1 == $review['review_rating'])echo 'selected'; ?> >1</option>
                                                <option value="2" <?php if(2 == $review['review_rating'])echo 'selected'; ?> >2</option>
                                                <option value="3" <?php if(3 == $review['review_rating'])echo 'selected'; ?> >3</option>
                                                <option value="4" <?php if(4 == $review['review_rating'])echo 'selected'; ?> >4</option>
                                                <option value="5" <?php if(5 == $review['review_rating'])echo 'selected'; ?> >5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label> Your review </label>
                                        <textarea name="review_comment" id="review_comment" class="form-control" rows="4"><?php echo $review['review_comment']; ?></textarea>
                                    </div>
                                    <div class="form-group col-md-12 add_top_20 add_bottom_30">
                                        <div class="row">
                                            <div class="col-12">
                                                <input type="submit" value=" Submit " class="btn_1 float-right" id="submit-review">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- Single Review Endss -->
        <?php endif?>
    </div>
    <!-- /review-container -->
</section>

<?php if($user_type == 2){ ?>
<hr>
<!-- Leave a review starts -->
<div class="add-review">
    <h5>Leave a review</h5>
    <form action="<?php echo url('home/listing_review'); ?>" method="post">
        <input type="hidden" name="reviewer_id" value="<?php echo $user_id; ?>">
        <input type="hidden" name="slug" value="{{$slug ?? ''??''}}">
        <input type="hidden" name="listing_id" value="<?php echo $listing_details['id']; ?>">
        <div class="row">
            <div class="form-group col-md-12">
                <label> Rating </label>
                <div class="custom-select-form">
                    <select name="review_rating" id="review_rating" class="wide">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label> Your review </label>
                <textarea name="review_comment" id="review_comment" class="form-control" style="height:130px;"></textarea>
            </div>
            <div class="form-group col-md-12 add_top_20 add_bottom_30">
                <div class="row">
                    <div class="col-6">
                        <input type="submit" value=" Submit " class="btn_1" id="submit-review">
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12">
                                <?php $claiming_status = $listing_details->claimed_listing['status']; ?>
                                <?php if($claiming_status == 0): ?>
                                <a href='javascript::' class="btn btn-warning float-right btn-sm" onclick="showClaimForm();"> Claim this listing
                                </a>
                                <?php endif; ?>
                            </div>
                            <div class="col-12">
                                <small style="float: right;" class="mt-2"><a href='javascript::' <?php if (Auth::check()):?> onclick="showReportForm();" <?php else: ?> onclick="loginAlert()" <?php endif; ?> style="color: #616161;"> Report this listing </a></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="" id = "report_form" style="display: none;">
    <h5>Report this listing</h5>
    <form action="<?php echo url('home/report_this_listing'); ?>" method="post">
        <input type="hidden" name="slug" value="<?php echo $slug ?? ''; ?>">
        <input type="hidden" name="listing_id" value="<?php echo $listing_details['id']; ?>">
        <input type="hidden" name="reporter_id" value="{{auth()->user()->id}}">
        <div class="row">
            <div class="form-group col-md-12">
                <label> Report </label>
                <textarea name="report" id="report" class="form-control" style="height:130px;"></textarea>
            </div>
            <div class="form-group col-md-12 add_top_20 add_bottom_30">
                <div class="row">
                    <div class="col-6">
                        <input type="submit" value="Submit report " class="btn_1" id="submit-report">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php } ?>

<?php if(Auth::check()): ?>
<div class="row">
    <div class="col-12">
        <?php $claiming_status = $listing_details->claimed_listing['status']; ?>
        <?php if($claiming_status == 0 && $user_type != 2): ?>
        <a href='javascript::' class="btn btn-warning float-right btn-sm" onclick="showClaimForm();"> Claim this_listing
        </a>
        <?php endif; ?>
    </div>
</div>
<div class="" id = "claim_form" style="display: none;">
    <h5>Claim this listing</h5>
    <form action="<?php echo url('home/claim_this_listing'); ?>" method="post">
        <input type="hidden" name="listing_id" value="<?php echo $listing_details['id']; ?>">
        <input type="hidden" name="user_id" value="<?php echo auth()->user()->id?>">
        <div class="row">
            <div class="form-group col-md-12">
                <label for="name">Full name </label>
                <input name="full_name" id="name" class="form-control" required>
            </div>
            <div class="form-group col-md-12">
                <label for="phone">Phone </label>
                <input name="phone" id="phone" class="form-control" required>
            </div>
            <div class="form-group col-md-12">
                <textarea name="additional_information" class="form-control" style="height:130px;" placeholder="Additional proof to expedite claim approval..." required></textarea>
            </div>
            <div class="form-group col-md-12 add_top_20 add_bottom_30">
                <div class="row">
                    <div class="col-6">
                        <input type="submit" value=" Submit claim request " class="btn_1" id="submit-report">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php else: ?>
<div class="row">
    <div class="col-12">
        <a href="<?php echo url('login'); ?>" class="btn btn-warning float-right" >Login to review</a>
    </div>
    <div class="col-12 mt-1">
        <a href="<?php echo url('login'); ?>" class="btn btn-sm btn-warning float-right" >Claim this listing</a>
    </div>
</div>
<br/>
<?php endif; ?>
<!-- Leave a review ends -->


<script>
    function edit_review(review_id){
        $("#" + review_id).slideToggle("slow");
    }
    // $(document).ready(function(){
    //   $("#edit_review_button").click(function(){
    //     $("#edit_review_form").slideToggle("slow");
    //   });
    // });
</script>
