<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Claimed listing
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered datatable">
                    <thead>
                    <tr>
                        <th width="80"><div>#</div></th>
                        <th><div>Listing</div></th>
                        <th><div>Name</div></th>
                        <th><div>Phone</div></th>
                        <th><div>Additional information</div></th>
                        <th><div>Status</div></th>
                        <th><div>Option</div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $counter = 0;
                    foreach ($claimed_listings as $claimed_listing): ?>
                    <tr>
                        <td><?php echo ++$counter; ?></td>
                        <td>
                            <a href="<?php echo route('listings.show',$claimed_listing->listing['id']) ?>" target="blank">
                                {{$claimed_listing->listing['name']}}
                            </a>
                        </td>
                        <td>{{$claimed_listing->user['name']}}</td>
                        <td><?php echo $claimed_listing['phone']; ?></td>
                        <td>
                            Full name : <?php echo $claimed_listing['full_name']; ?> <br>
                            <?php echo $claimed_listing['additional_information']; ?>
                        </td>
                        <td>
                            <?php if($claimed_listing['status'] == 1): ?>
                            <span class="label label-success">Approved</span>
                            <?php endif; ?>

                            <?php if($claimed_listing['status'] == 0): ?>
                            <span class="label label-warning">Pending</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <div class="bs-example">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-blue" role="menu">
                                        <li>
                                            <a href="<?php echo url('admin/claimed_listings/approved/'.$claimed_listing['id'].'/'.$claimed_listing['listing_id']); ?>" class="">
                                                <i class="entypo-check"></i>
                                                Approve
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo url('admin/listing_form/edit/'.$claimed_listing['listing_id']); ?>" class="">
                                                <i class="entypo-eye"></i>
                                                Listing editing page
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#" class="" onclick="confirm_modal('<?php echo url('admin/claimed_listings/delete/'.$claimed_listing['id']); ?>');">
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
    </div><!-- end col-->
</div>
