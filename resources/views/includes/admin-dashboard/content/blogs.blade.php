<div class="row ">
    <div class="col-lg-12">
        <a href="<?php echo route('blogs.create'); ?>" class="btn btn-primary alignToTitle"><i class="entypo-plus"></i>Add New Post</a>
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Post list
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered datatable">
                    <thead>
                    <tr>
                        <th width="80"><div>#</div></th>
                        <th><div>Title</div></th>
                    <!-- <th><div>Blog Text</div></th> -->
                        <th><div>Categories</div></th>
                        <th><div>Status</div></th>
                        <th><div>Options</div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 0; ?>
                    <?php foreach($blogs as $blog): ?>
                    <?php $count++; ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><a href="<?echo php echo route('blogs.show',$blog['id']); ?>" target="_blank"><?php echo $blog['title']; ?></a></td>
                    <!-- <td class="text-center" style="max-width: 200px;">
                    <?php
                    $string = strip_tags($blog['blog_text']);
                    if (strlen($string) > 100) {

                        // truncate string
                        $stringCut = substr($string, 0, 100);
                        $endPoint = strrpos($stringCut, ' ');

                        //if the string doesn't contain any space then it will cut without word basis.
                        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                        $string .= '... <br><a class="text-success" href="javascript: void(0)" data-toggle="tooltip" title="'.$blog['blog_text'].'" data-placement="right">'.get_phrase('read_more').'</a>';
                    }
                    echo $string;
                    ?>
                        </td> -->

                        <td><?php echo ($blog->category->name); ?></td>
                        <td class="text-center">
                            <?php if($blog['status'] == 1): ?>
                            <span class="label label-success">Active</span>
                            <?php else: ?>
                            <span class="label label-default">Inactive</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="bs-example">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-blue" role="menu">
                                        <li>
                                            <?php if($blog['status'] == 1): ?>
                                                <form method="post" action="{{route('blogs.status',$blog['id'])}}">
                                                    <a onclick="this.parentNode.submit();" href="#" class="">
                                                        <i class="entypo-check"></i>
                                                        <span>Mark As Inactive</span>
                                                    </a>
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="0" />
                                                </form>

                                            <?php else: ?>

                                                 <form method="post" action="{{route('blogs.status',$blog['id'])}}">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="1" />
                                                     <a onclick="this.parentNode.submit();" class="" href="#">
                                                        <i class="entypo-check"></i>
                                                        <span>Mark As Active</span>
                                                    </a>
                                                </form>

                                            <?php endif; ?>
                                        </li>
                                        <li>
                                            <a href="<?php echo route('blogs.edit',$blog['id']); ?>">
                                                <i class="entypo-pencil"></i>
                                                Edit
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#" onclick="confirm_modal('<?php echo route('blogs.destroy',$blog['id']); ?>');">
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

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
