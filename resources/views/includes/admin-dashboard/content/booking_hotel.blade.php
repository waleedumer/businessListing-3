<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Booking Request For Hotel
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered datatable">
                    <thead>
                    <tr>
                        <th width="80"><div>#</div></th>
                        <th><div>Listing</div></th>
                        <th><div>Date</div></th>
                        <th><div>Additional Information</div></th>
                        <th><div>Status</div></th>
                        <th width="200"><div>Options</div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $count = 1;
                    foreach($bookings as $booking):
                    $listing_type = $booking->listing->listing_type;?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $booking->listing->name; ?></td>
                        <td>
                            <?php
                            if($listing_type == 'hotel'){
                                $booking_date = explode(' - ', $booking['booking_date']);
                                echo 'Booking Date'.' : <b>'.date('d M Y', $booking_date[0]).' - '.date('d M Y', $booking_date[1]).'</b>';
                            }else{
                                echo 'Booking Date'.' : <b>'.date('d M Y', $booking['booking_date']).'</b>';
                            }
                            echo '<br>'.'Requesting Date'.' : '.date('d M Y', $booking['requested_at']);
                            ?>
                        </td>
                        <td>
                            <h5 class="mt-0 mb-1"><?php echo $this->db->get_where('user', array('id' => $booking['requester_id']))->row('name'); ?></h5>
{{--                            <?php--}}
{{--                            $informations = json_decode($booking['additional_information']);--}}
{{--                            foreach($informations as $key => $value){--}}
{{--                            ?>--}}
{{--                            <span><?php echo $key; ?> : <?php echo $value; ?></span><br>--}}
{{--                            <?php--}}
{{--                            }--}}
{{--                            ?>--}}
                        </td>
                        <td>
                            <?php
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
                        <td>
                            <?php
                            if($listing_type == 'hotel'){
                                $booking_date = explode(' - ', $booking['booking_date']);
                                $expired_date = $booking_date[1];
                            }else{
                                $expired_date = $booking['booking_date'];
                            } ?>



                            <div class="bs-example">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-blue" role="menu">
                                        <li>
                                            <?php if($expired_date >= strtotime(date('dMY'))){ ?>
                                            <?php if($booking['status'] == 0){ ?>
                                                <form action="{{route('booking_beauty.status',$booking['id'])}}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <input type="text" value="1" hidden>
                                                    <a href="#" onclick="this.form.submit()" class="">
                                                        <i class="entypo-check"></i>
                                                        Approve
                                                    </a>
                                                </form>
                                            <?php }else{ ?>
                                                <form action="{{route('booking_beauty.status',$booking['id'])}}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <input type="text" value="0" hidden>
                                                    <a href="#" onclick="this.form.submit()" class="">
                                                        <i class="entypo-check"></i>
                                                        Pending
                                                    </a>
                                                </form>
                                            <?php } ?>
                                            <?php } ?>
                                        </li>

                                        <li>
                                            <a href="#" class="" onclick="confirm_modal('<?php echo route('booking_hotel.delete',$booking['id']); ?>');">
                                                <i class="entypo-trash"></i>
                                                Delete
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
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
