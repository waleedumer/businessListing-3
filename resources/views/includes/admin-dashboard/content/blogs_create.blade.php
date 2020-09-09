<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Blog Add Form
                </div>
            </div>
            <div class="panel-body">

                <form action="{{route('blogs.store')}}" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Blog Title</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="title" id="name" placeholder="Provide Blog Title" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="parent" class="col-sm-2 control-label">Category</label>

                                <div class="col-sm-9">
                                    <select name="category_id" id = "category_id" class="select2" data-allow-clear="true" required>
                                        <option value="">Select a Category</option>
                                        <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Blog Text</label>

                                <div class="col-sm-9">
                                    <textarea name="blog_text" id="description" rows="6" class="form-control ckeditor" placeholder="Text" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">


                            <div class="form-group" id = "thumbnail-picker-area">
                                <!--thumbnail photo-->
                                <label class="col-sm-2 control-label" for="image">Blog Thumbnail<br>
                                    <small>(800 X 533)</small>
                                </label>
                                <div class="col-sm-10">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput">
                                            <img src="<?php echo asset('uploads/blog_thumbnails/thumbnail.png'); ?>" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                        <div>
											<span class="btn btn-white btn-file">
												<span class="fileinput-new">Select Image</span>
												<span class="fileinput-exists">Change</span>
												<input type="file" id="image" name="blog_thumbnail" accept="image/*">
											</span>
                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>


                                <!--cover photo-->
                                <label class="col-sm-2 control-label" for="image2">Blog Cover<br>
                                    <small>(900 X 450)</small>
                                </label>
                                <div class="col-sm-10">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput">
                                            <img src="<?php echo asset('uploads/blog_thumbnails/thumbnail.png'); ?>" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                        <div>
											<span class="btn btn-white btn-file">
												<span class="fileinput-new">Select Image</span>
												<span class="fileinput-exists">Change</span>
												<input type="file" id="image2" name="blog_cover" accept="image/*">
											</span>
                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>
                                <input type="text" name="user_id" id="user_id" value="{{auth()->user()->id}}" hidden>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10" style="padding-top: 10px;">
                                    <button type="submit" class="btn btn-info ml--15" style="min-width: 200px;">Add Blog</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end col-->
</div>
