<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Booking request for restaurant
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered datatable">
                    <thead>
                    <tr>
                        <th width="80"><div>#</div></th>
                        <th><div>Listing</div></th>
                        <th><div>Date</div></th>
                        <th><div>Additional information</div></th>
                        <th><div>Status</div></th>
                        <th width="200"><div>Options</div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $bookings = auth()->user()->bookings()->latest();
                    $count = 1;
                    foreach($bookings as $booking): ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $booking->listing['name'] ; ?></td>
                        <td>
                            <?php
                            $listing_type = $booking->listing['listing_type'];
                            if($listing_type == 'hotel'){
                                $booking_date = explode(' - ', $booking['booking_date']);
                                echo 'Booking date'.' : <b>'.date('d M Y', $booking_date[0]).' - '.date('d M Y', $booking_date[1]).'</b>';
                            }else{
                                echo 'Booking date'.' : <b>'.date('d M Y', $booking['booking_date']).'</b>';
                            }
                            echo '<br>'.'Requesting date'.' : '.date('d M Y', $booking['created_at']);
                            ?>
                        </td>
                        <td>
                            <h5 class="mt-0 mb-1"><?php echo $booking->request['name']; ?></h5>
                            <?php
                            $informations = json_decode($booking['additional_information']);
                            foreach($informations as $key => $value){
                            ?>
                            <span><?php echo ucfirst($key); ?> : <?php echo $value; ?></span><br>
                            <?php
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $listing_type = $booking->listing['listing_type'];
                            if($listing_type == 'hotel'){
                                $booking_date = explode(' - ', $booking['booking_date']);
                                $expired_date = $booking_date[1];
                            }else{
                                $expired_date = $booking['booking_date'];
                            }
                            if($expired_date >= strtotime(date('dMY'))){
                            if($booking['status'] == 0){ ?>
                            <span class="label label-warning">Pending</span>
                            <?php }else{ ?>
                            <span class="label label-success">Approved</span>
                            <?php }
                            }else{ ?>
                            <span class="label label-danger">Expired</span>
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <?php
                            if($listing_type == 'hotel'){
                                $booking_date = explode(' - ', $booking['booking_date']);
                                $expired_date = $booking_date[1];
                            }else{
                                $expired_date = $booking['booking_date'];
                            }
                            if($expired_date >= strtotime(date('dMY'))){ ?>
                            <?php if($booking['status'] == 0){ ?>
                            <a href="<?php echo url('user/booking_request_restaurant/approved/'.$booking['id']); ?>" class="btn btn-default btn-sm btn-icon icon-left">
                                <i class="entypo-check"></i>
                                Approve
                            </a>
                            <?php }else{ ?>
                            <a href="<?php echo url('user/booking_request_restaurant/pending/'.$booking['id']); ?>" class="btn btn-default btn-sm btn-icon icon-left">
                                <i class="entypo-check"></i>
                                Pending
                            </a>
                            <?php } ?>
                            <?php } ?>
                            <a href="#" class="btn btn-danger btn-sm btn-icon icon-left" onclick="confirm_modal('<?php echo url('user/booking_request_restaurant/delete/'.$booking['id']); ?>');">
                                <i class="entypo-cancel"></i>
                                Delete
                            </a>
                        </td>
                    </tr>
                    <?php $count++; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
