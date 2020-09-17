<meta name="csrf-token" content="{{ csrf_token() }}">
<?php
if (!isset($status)) {
    $status = 'all';
}
if (!isset($user_id)) {
    $user_id = 'all';
}
?>
<div class="row ">
    <div class="col-lg-12">
        <a href="<?php echo route('listings.create'); ?>" class="btn btn-primary alignToTitle"><i class="entypo-plus"></i>Add New Directory</a>
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    All Directories
                </div>
            </div>
            <div class="panel panel-primary" data-collapsed="0" style="margin-top: 20px; margin-right: 15px; margin-left: 15px; margin-bottom: 0px;">
                <div class="panel-body">
                    <form action="<?php echo route('listings.filter_listing_table') ?>" method="get">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <select name="status" id = "status_filter" class="select2 form-control" data-allow-clear="true" data-placeholder="Status Filter">
                                        <option value="<?php echo 'all'; ?>" <?php if($status == 'all'): ?>selected<?php endif; ?>>All Status</option>
                                        <option value="<?php echo 'pending'; ?>" <?php if($status == 'pending'): ?>selected<?php endif; ?>>Pending</option>
                                        <option value="<?php echo 'active'; ?>" <?php if($status == 'active'): ?>selected<?php endif; ?>>Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <select name="user_id" id = "user_filter" class="select2 form-control" data-allow-clear="true" data-placeholder="User Filter">
                                        <option value="<?php echo 'all'; ?>" <?php if($user_id == 'all'): ?>selected<?php endif; ?>>All Users</option>
                                        <?php
//                                        $users = $this->user_model->get_all_users()->result_array();
                                        foreach ($users as $user): ?>
                                        <option value="<?php echo $user['id']; ?>" <?php if($user_id == $user['id']): ?>selected<?php endif; ?>><?php echo $user['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <select name="verify_status" id = "verify_status" class="select2 form-control" data-allow-clear="true" data-placeholder="Verification Status">
                                        <option value="all">Verification Status</option>

                                        <option value="1" <?php if(isset($verify_status)){if( $verify_status == '1') echo 'selected'; } ?>>Verified</option>
                                        <option value="0" <?php if(isset($verify_status)){if( $verify_status == '0') echo 'selected'; } ?>>Non Verified</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-info btn-block" style="height: 40px;"><i class="entypo-search"></i>Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered datatable">
                    <thead>
                    <tr>
                        <th width="80"><div>#</div></th>
                        <th><div>Title</div></th>
                        <th><div>Categories</div></th>
                        <th><div>Location</div></th>
                        <th><div>Status</div></th>
                        <th><div>Option</div></th>
                    </tr>
                    </thead>
                    <tbody id = "listing_table">
                    <?php
                    $counter = 0;
                    foreach ($listings as $listing):
//                    $user_details = $this->user_model->get_all_users($listing['user_id'])->row_array();?>
                    <tr>
                        <td>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="listings_id" value="<?php echo $listing['id']; ?>" class="custom-control-input checkMark" id="<?php echo $counter; ?>">
                                    <label class="custom-control-label" for="<?php echo $counter; ?>">
                                        <?php echo ++$counter; ?>
                                    </label>
                                </div>
                            </div>
                        </td>
                        <td>
                            <strong>
                                <a href="<?php echo route('listings.edit',$listing['id']); ?>">
                                    <?php echo $listing['name']; ?>
                                    <?php if ($listing['is_featured'] == 1):?>
                                    <i class="entypo-star" style="color: #FF5722; font-size: 11px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Featured"></i>
                                    <?php endif; ?>
                                </a>
                            </strong>
                            <br>
                            <small>
                                <?php
                                echo $listing->user['name'].'<br/>'. $listing['created_at'];
                                ?>
                            </small>
                        </td>
                        <td>
                            <?php
//                            $categories = json_decode($listing['categories']);
                            foreach ($listing->categories as $category):
//                            $category_details = $this->crud_model->get_categories($category)->row_array();
                            ?>
                            <span class="badge badge-secondary"><?php echo $category->name; ?></span><br>
                            <?php endforeach; ?>
                        </td>
                        <td>
                            <?php
                            echo $listing->city()->exists()?$listing->city->name:'N.A'.', '.$listing->country->name;
                            ?>
                        </td>
                        <td class="text-center">
                  <span class="mr-2">
                    <?php if ($listing['status'] == 'pending'): ?>
                      <i class="entypo-record" style="color: #FFC107; font-size: 19px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $listing['status']; ?>"></i>
                    <?php elseif ($listing['status'] == 'active'):?>
                      <i class="entypo-record" style="color: #4CAF50; font-size: 19px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $listing['status']; ?>"></i>
                    <?php endif; ?>
                  </span>

                            <?php $claiming_status = $claimed_listings->where('listing_id','=',$listing['id'])->first()->status; ?>
                            <?php if($claiming_status == 1): ?>
                            <span class="claimed_icon" data-toggle="tooltip" title="This Listing Is Verified">
                        <img src="<?php echo asset('frontend/images/verified.png'); ?>" width="25" style="padding-bottom: 8px;" />
                      </span>
                            <?php endif; ?>
                        </td>
                        <td class="">
                            <div class="bs-example">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-blue" role="menu">
                                        <li><a href="<?php echo $listing['website']; ?>">View in Website</a></li>
                                        <li><a href="<?php echo route('listings.edit',$listing['id']); ?>">Edit</a></li>
                                        <?php if ($listing['status'] == 'pending'): ?>
                                        <li><a href="javascript::" onclick="confirm_modal('<?php echo route('listings.make_active',$listing['id']); ?>', 'generic_confirmation');">Mark as Active</a></li>
                                        <?php else: ?>
                                        <li><a href="javascript::" onclick="confirm_modal('<?php echo route('listings.make_pending',$listing['id']); ?>', 'generic_confirmation');">Mark as Pending'); ?></a></li>
                                        <?php endif; ?>

                                        <?php if ($listing['is_featured'] == 1): ?>
                                        <li><a href="javascript::" onclick="confirm_modal('<?php echo route('listings.make_none_featured',$listing['id']); ?>', 'generic_confirmation');">Remove from Featured</a></li>
                                        <?php elseif($listing['is_featured'] == 0): ?>
                                        <li><a href="javascript::" onclick="confirm_modal('<?php echo route('listings.make_featured',$listing['id']); ?>', 'generic_confirmation');">Mark as Featured</a></li>
                                        <?php endif; ?>
{{--                                        <?php if(get_addon_details('fb_messenger') != 0): ?>--}}
{{--                                        <li><a href="<?php echo site_url('addons/facebook_messenger/api_manager/'.$listing['id']); ?>">Facebook Chat Manager</a></li>--}}
{{--                                        <?php endif; ?>--}}
                                        <li class="divider"></li>
                                        <li><a href="javascript::" onclick="confirm_modal('<?php echo route('listings.destroy',$listing['id']); ?>');">Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <button class="btn btn-danger" id="delete_listings" style="display: none;">Delete Selected</button>
            </div>
        </div>
    </div><!-- end col-->
</div>

<script type="text/javascript">
    function filterTable() {
        $('#preloader_gif').show();
        update_date_range();
        var status = $('#status_filter').val();
        var user = $('#user_filter').val();
        var date_range = $('#date_range').val();

        $.ajax({
            type : 'POST',
            url : '<?php echo route('listings.filter_listing_table'); ?>',
            data : {status : status, user : user, date_range : date_range},
            success : function(response){
                $('#listing_table').html(response);
                $('#preloader_gif').hide();
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                })
            }
        })
    }

    function update_date_range()
    {
        var x = $("#selectedValue").html();
        $("#date_range").val(x);
    }
</script>


<script>
    //start multiple delete
    $(document).ready(function() {
        $(".checkMark").click(function(){

            //for button hide and show
            var favorite = [];
            $.each($("input[name='listings_id']:checked"), function(){
                favorite.push($(this).val());
            });
            if(favorite != ''){
                $('#delete_listings').show();
                $('#delete_listings').animate({
                    width: '200px'
                }, 300);

            }else{
                $('#delete_listings').animate({
                    width: '130px'
                }, 300);
                $('#delete_listings').slideUp(80);
            }
            //for delete to database
            $('#delete_listings').click(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var vals = [];
                $(":checkbox").each(function() {
                    if (this.checked)
                        vals.push(this.value);
                });
                var listings_id = vals.toString();
                $.ajax({
                    url: '<?php echo url('admin/listings/destroyMany'); ?>'+'/'+ listings_id,
                    type:'POST',
                    success: function(response){
                        location.reload();
                    },
                    error: function(response) {
                        console.log(response.responseText);
                    }
                });
            });
        });
    });
</script>
