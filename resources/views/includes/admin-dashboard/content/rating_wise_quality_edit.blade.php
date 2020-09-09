<div class="row">
    <div class="col-lg-10">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Edit Form
                </div>
            </div>
            <div class="panel-body">

                <form action="<?php echo route('review_wise_quality.update', $edit_data['id']); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="rating_from" class="col-sm-3 control-label">Rating From</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="rating_from" id="rating_from" placeholder="Rating From" value="<?php echo $edit_data['rating_from']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rating_to" class="col-sm-3 control-label">Rating To</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="rating_to" id="rating_to" placeholder="Rating To" value="<?php echo $edit_data['rating_to']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="quality" class="col-sm-3 control-label">Quality</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="quality" id="quality" placeholder="Quality" value="<?php echo $edit_data['quality']; ?>" required>
                        </div>
                    </div>



                    <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end col-->
</div>
