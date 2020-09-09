<div class="row">
    <div class="col-lg-10">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Add New City
                </div>
            </div>
            <div class="panel-body">

                <form action="<?php echo route('cities.store'); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
                @csrf
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">City name</label>

                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="name" id="name" placeholder="City Name">
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="country_id" class="col-sm-3 control-label">Country</label>

                        <div class="col-sm-7">


                            <select name="country_id" id = "country_id" class="select2" data-allow-clear="true" data-placeholder="Select Country">
                                <option value="0">None</option>
                                @foreach($countries as $key=>$country)
                                    <option value="{{$key}}">{{$country}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
                        <button type="submit" class="btn btn-info">Add City</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end col-->
</div>
