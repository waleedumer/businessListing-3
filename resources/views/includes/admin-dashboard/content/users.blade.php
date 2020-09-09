<div class="row ">
    <div class="col-lg-12">
        <a href="{{route('users.create')}}" class="btn btn-primary alignToTitle"><i class="entypo-plus"></i>Add New User</a>
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    General user list
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered datatable">
                    <thead>
                    <tr>
                        <th width="80"><div>#</div></th>
                        <th><div>Photo</div></th>
                        <th><div>Name</div></th>
                        <th><div>Email</div></th>
                        <th><div>Phone</div></th>
                        <th><div>Social links</div></th>
                        <th><div>Option</div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $counter = 0;
                    foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo ++$counter; ?></td>

                        <td class="text-center">
                            <img class="rounded-circle" src="{{asset('uploads/user_image/'.$user['photo'])}} ?>" alt="" style="height: 50px; width: 50px; border-radius: 50%">
                        </td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['phone']; ?></td>
                        <td class="text-center">
                            <a href="<?php echo $user['facebook']; ?>" style="padding: 5px;" target="_blank"><i class = 'entypo-facebook'></i></a>
                            <a href="<?php echo $user['twitter']; ?>" style="padding: 5px;" target="_blank"><i class = 'entypo-twitter'></i></a>
                            <a href="<?php echo $user['linkedin']; ?>" style="padding: 5px;" target="_blank"><i class = 'entypo-linkedin'></i></a>
                        </td>
                        <td>
                            <div class="bs-example">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                       Action<span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-blue" role="menu">
                                        <li>
                                            <a href="<?php echo route('users.edit',$user['id']); ?>" class="">
                                                <i class="entypo-pencil"></i>
                                                Edit
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#" class="" onclick="confirm_modal('<?php echo route('users.destroy',$user['id']); ?>');">
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
