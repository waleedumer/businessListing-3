<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    User Add Form
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo route('users.update',$user_details['id']); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $user_details['name']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $user_details['email']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-7">
                            <textarea name="address" class="form-control" rows="8" cols="80"><?php echo $user_details['address']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-sm-3 control-label">Phone</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $user_details['phone']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="website" class="col-sm-3 control-label">Website</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="website" id="website" placeholder="Website" value="<?php echo $user_details['website']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="about" class="col-sm-3 control-label">About</label>
                        <div class="col-sm-7">
                            <textarea name="about" class="form-control" rows="8" cols="80">About</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="facebook" class="col-sm-3 control-label">Facebook Link</label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <input type="text" name="facebook" id = "facebook" class="form-control" placeholder="Write Down Facebook Url" value="<?php echo $user_details['facebook']; ?>">
                                <span class="input-group-addon"><i class="entypo-facebook"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="twitter" class="col-sm-3 control-label">Twitter Link</label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <input type="text" name="twitter" id = "twitter" class="form-control" placeholder="Write Down Twitter Url') ?>" value="<?php echo $user_details['twitter']; ?>">
                                <span class="input-group-addon"><i class="entypo-twitter"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="linkedin" class="col-sm-3 control-label">Linkedin Link</label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <input type="text" name="linkedin" id = "linkedin" class="form-control" placeholder="Write Down Linkedin Url" value="<?php echo $user_details['linkedin']; ?>">
                                <span class="input-group-addon"><i class="entypo-linkedin"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">User image</label>

                        <div class="col-sm-7">

                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput">
                                    <img src="<?php echo asset('uploads/user_image/'.$user_details['photo']); ?>" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
                   <span class="btn btn-white btn-file">
                     <span class="fileinput-new">Select Image</span>
                     <span class="fileinput-exists">Change</span>
                     <input type="file" name="user_image" accept="image/*">
                   </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
                        <button type="submit" class="btn btn-info">Update User</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end col-->
</div>
