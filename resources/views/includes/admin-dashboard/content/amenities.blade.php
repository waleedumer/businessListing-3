<!-- start page title -->
<div class="row ">
    <div class="col-lg-12">
        <a href="<?php echo route('amenities.create'); ?>" class="btn btn-primary alignToTitle"><i class="entypo-plus"></i>Add New Amenity</a>
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Amenities
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered datatable">
                    <thead>
                    <tr>
                        <th width="80"><div>#</div></th>
                        <th><div>Icon</div></th>
                        <th><div>Amenity Name</div></th>
                        <th><div>Options</div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $counter = 0;
                    foreach ($amenities as $amenity): ?>
                    <tr>
                        <td><?php echo ++$counter; ?></td>
                        <td><i class="<?php echo $amenity['icon'] ?>"></i></td>
                        <td><?php echo $amenity['name']; ?></td>
                        <td>
                            <div class="bs-example">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-blue" role="menu">
                                        <li>
                                            <a href="<?php echo route('amenities.edit',$amenity['id']); ?>" class="">
                                                <i class="entypo-pencil"></i>
                                                Edit
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#" class="" onclick="confirm_modal('<?php echo route('amenities.destroy',$amenity['id']); ?>');">
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
