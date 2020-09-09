<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Purchased packages
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered datatable">
                    <thead>
                    <tr>
                        <th width="80"><div>#</div></th>
                        <th><div>Package name</div></th>
                        <th><div>Purchase date</div></th>
                        <th><div>Expired date</div></th>
                        <th><div>Amount paid</div></th>
                        <th><div>Payment method</div></th>
                        <th><div>Action</div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($purchase_histories as $key => $purchase_history): ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td>
                            <?php echo $purchase_history['name']; ?>
                            <?php
                            $active_package = auth()->user()->packages->last();
                            if ($active_package['id'] == $purchase_history['id']): ?>
                            <br> <small><span class="badge badge-success ">Currently active</span></small>
                            <?php endif; ?>
                        </td>
                        <td><?php echo date('D, d-M-Y', $purchase_history['purchase_date']); ?></td>
                        <td><?php echo date('D, d-M-Y', $purchase_history['expired_date']); ?></td>
                        <td><?php echo $settings['system_currency']->description." ".($purchase_history['amount_paid']); ?></td>
                        <td><?php echo ucfirst($purchase_history['payment_method']); ?></td>
                        <td class="text-center"> <a href="<?php echo url('user/package_invoice/'.$purchase_history['id']); ?>" class="btn btn-primary"><i class="entypo-print"></i> Print invoice</a> </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- end col-->
</div>
