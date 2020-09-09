<!-- start page title -->
<div class="row ">
    <div class="col-lg-12">
        <a href="<?php echo route('cities.create'); ?>" class="btn btn-primary alignToTitle"><i class="entypo-plus"></i>Add New City</a>
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Cities
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered datatable">
                    <thead>
                    <tr>
                        <th width="80"><div>#</div></th>
                        <th><div>City Name</div></th>
                        <th><div>Country</div></th>
                        <th><div>Options</div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $counter = 0;
                    foreach ($cities as $city): ?>
                    <tr>
                        <td><?php echo ++$counter; ?></td>

                        <td><?php echo $city['name']; ?></td>
                        <td>
                             {{$city->country->name}}

                        </td>
                        <td>
                            <div class="bs-example">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-blue" role="menu">
                                        <li>
                                            <a href="<?php echo route('cities.edit',$city['id']); ?>" class="">
                                                <i class="entypo-pencil"></i>
                                                Edit
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#" class="" onclick="confirm_modal('<?php echo route('cities.destroy',$city['id']); ?>');">
                                                <i class="entypo-trash"></i>
                                                Delete
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
