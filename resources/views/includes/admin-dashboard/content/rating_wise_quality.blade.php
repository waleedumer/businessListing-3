<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Quality list
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered datatable">
                    <thead>
                    <tr>
                        <th width="80"><div>#</div></th>
                        <th><div>Rating From</div></th>
                        <th><div>Rating To</div></th>
                        <th><div>Quality</div></th>
                        <th><div>Options</div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $counter = 0;
                    foreach ($qualities as $quality): ?>
                    <tr>
                        <td><?php echo ++$counter; ?></td>

                        <td><?php echo $quality['rating_from']; ?></td>
                        <td><?php echo $quality['rating_to']; ?></td>
                        <td><?php echo ucfirst($quality['quality']); ?></td>
                        <td>
                            <a href="<?php echo route('review_wise_quality.edit',$quality['id']); ?>" class="btn btn-info">
                                <i class="entypo-pencil"></i>
                                Edit
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- end col-->
</div>
