<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> Sub Categories
                    <a href="<?php echo route('categories.create'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i>Add New Category'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">Sub Categories</h4>
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>thumbnail'); ?></th>
                        <th>Title</th>
                        <th>Sub Category Of</th>
                        <th>Icon</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $counter = 0;
                    foreach ($sub_categories as $sub_category):
                    if($sub_category['parent'] == 0)
                        continue;
                    ?>
                    <tr>
                        <td><?php echo ++$counter; ?></td>
                        <td class="text-center"><img class="rounded-circle img-thumbnail" src="<?php echo asset('uploads/category_thumbnails/'.$sub_category['thumbnail']); ?>" alt="" height="auto" width="50px;"></td>
                        <td><?php echo $sub_category['name']; ?></td>
                        <td>
                            <?php
                            if ($sub_category['parent'] > 0) {
                                $parent_category = $sub_category['parent']->name;
                                echo $parent_category['name'];
                            }else {
                                echo '-';
                            }
                            ?>
                        </td>
                        <td class="text-center">
                            <i class="<?php echo $sub_category['icon_class']; ?>"></i>
                        </td>

                        <td style="text-align: center;">
                            <a href = "<?php echo route('categories.edit',$sub_category['id']); ?>" class="btn btn-icon btn-outline-info btn-rounded btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                <i class="mdi mdi-wrench"></i>
                            </a>
                            <button type="button" class="btn btn-icon btn-outline-danger btn-rounded btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" onclick="confirm_modal('<?php echo route('categories.destroy',$sub_category['id']); ?>');">
                                <i class="dripicons-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
