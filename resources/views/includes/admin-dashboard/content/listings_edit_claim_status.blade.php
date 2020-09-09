<?php
$claim_listing = $this->db->get_where('claimed_listing', array('listing_id' => $listing_details['id']));
if($claim_listing->num_rows() > 0){
if($claim_listing->row('status') == 0){ ?>
<div class="form-group" style="margin-top: 20px; height: 50px;">
    <label class="col-sm-2 control-label" for="full_name"></label>
    <div class="col-sm-6">
        <div class="alert alert-info" style="text-align:center;">
            <p>Full name : <?php echo $claim_listing->row('full_name'); ?></p>
            <p>Phone : <?php echo $claim_listing->row('phone'); ?></p>
            <hr style="margin-top: 2px;">
            <p>Additional information :</p>
            <p><?php echo $claim_listing->row('additional_information'); ?></p>
            <div class="row" style="margin-top: 20px;">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button class="btn btn-success" onclick="approve_claim('<?php echo $claim_listing->row('id'); ?>')">Approve claim</button>
                    <a href="<?php echo url('admin/discard_claim_request/'.$claim_listing->row('id').'/'.$listing_details['id']); ?>" class="btn btn-danger" id="discard">Discard claim</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }else{ ?>
<div class="form-group" style="margin-top: 20px; height: 50px;" id="claimed_listing">
    <label class="col-sm-2 control-label" for="full_name"></label>
    <div class="col-sm-6">
        <div class="alert alert-info" style="text-align:center;">
            <img class="" data-toggle="tooltip" title="This listing is verified" src="<?php echo asset('assets/frontend/images/verified.png'); ?>" style="width: 50px;">
            <p>Full name : <?php echo $claim_listing->row('full_name'); ?></p>
            <p>Phone : <?php echo $claim_listing->row('phone'); ?></p>
            <hr style="margin-top: 2px;">
            <p>Additional information :</p>
            <p><?php echo $claim_listing->row('additional_information'); ?></p>
            <div class="row" style="margin-top: 20px;">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button class="btn btn-info" onclick="approve_miss_fail()">Remove verification status</button>
                    <a href="<?php echo url('admin/discard_claim_request/'.$claim_listing->row('id').'/wrong_approve/'.$listing_details['id']); ?>" class="btn btn-danger" id="wrong_approvement" style="display: none;">Discard claim</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php  }
}else{ ?>
<div class="form-group" style="margin-top: 20px;">
    <label class="col-sm-2 control-label" for="full_name"></label>
    <div class="col-sm-6">
        <div class="alert" style="background-color: #ffeba385; text-align: center;">
            <p>This directory is not yet verified !</p>
            <br>
            <button class="btn btn-warning" onclick="add_validity_form()">Provide validity</button>
            <div style="display: none; margin-top: 10px;" id="validity_form">
                <div class="form-group" id="claim_listing">
                    <label class="col-sm-3 control-label" for="full_name">Full name</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full name" value="<?php  ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="phone_claim">Phone</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="phone_claim" name="phone_claim" placeholder="Phone" value="<?php  ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="additional_information">Additional information</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" rows="5" id="additional_information" name="additional_information" placeholder="Additional proof to expedite claim approval..."><?php  ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-success" onclick="add_validity()">Add validity</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<script>
    function add_validity_form(){
        $('#validity_form').fadeIn(1000);
    }

    function add_validity(){
        var full_name = $('#full_name').val();
        var phone = $('#phone_claim').val();
        var additional_information = $('#additional_information').val();
        var listing_id = "<?php echo $listing_details['id']; ?>";
        var user_id = "<?php echo $listing_details['user_id']; ?>";
        if(full_name != '' && phone != ''){
            $.ajax({
                type: "post",
                url: "<?php echo site_url('admin/add_listing_validity'); ?>",
                data: {full_name : full_name, phone : phone, additional_information : additional_information, listing_id : listing_id, user_id : user_id},
                success: function(response){
                    if(response != 1){
                        toastr.success("This listing is now verified");
                    }else{
                        toastr.error("This listing is now already verified !");
                    }
                }
            });
        }else{
            toastr.error("Full name and phone number is required !");
        }

    }

    function approve_claim(claim_request_id){
        $.ajax({
            url: "<?php echo site_url('admin/approve_listing_validation/'); ?>" + claim_request_id,
            success: function(response){
                if(response == 1){
                    toastr.success("This listing is now verified");
                    $('#discard').attr('disabled', true);
                }else{
                    toastr.error("This listing is now already verified !");
                }
            }
        });
    }

    function approve_miss_fail(){
        $('#wrong_approvement').toggle(500);
    }
</script>
