<div class="col-lg-9">
    <div class="row">
        <?php foreach($blogs as $blog): ?>
        <?php if($blog['status'] != 0): ?>
        <div class="col-md-6">
            <article class="blog">
                <figure>
                    <a href="<?php echo url('home/post/'.$blog['id'].'/'.Illuminate\Support\Str::of($blog['title'])->slug('-')); ?>">
                        <?php if(file_exists('uploads/blog_thumbnails/'.$blog['blog_thumbnail'])): ?>
                        <img src="<?php echo asset('uploads/blog_thumbnails/'.$blog['blog_thumbnail']); ?>" alt="...">
                        <?php else: ?>
                        <img src="<?php echo asset('uploads/blog_thumbnails/thumbnail.png'); ?>" alt="...">
                        <?php endif; ?>
                        <div class="preview"><span>Read more</span></div>
                    </a>
                </figure>
                <div class="post_info">
                    <small>{{$blog->category->name}} - <?php echo date('d M Y', $blog['added_date']); ?></small>
                    <h2><a href="<?php echo url('home/post/'.$blog['id'].'/'.Illuminate\Support\Str::of($blog['title'])->slug('-')); ?>"><?php echo $blog['title']; ?></a></h2>
                    <p>
                        <?php
                        $string = strip_tags($blog['blog_text']);
                        if (strlen($string) > 268) {

                            // truncate string
                            $stringCut = substr($string, 0, 268);
                            $endPoint = strrpos($stringCut, ' ');

                            //if the string doesn't contain any space then it will cut without word basis.
                            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                            $string .= '... <a class="" href="'.url('home/post/'.$blog['id'].'/'.Illuminate\Support\Str::of($blog['title'])->slug('-')).'">'.'Read more'.'</a>';
                        }
                        echo $string;
                        ?>
                    </p>
                    <ul>
                        <li>
                            <div class="thumb">
                                <img src="{{asset('uploads/user_image/'.$blog->user['photo'])}}" alt="">
                            </div>
                            {{$blog->user['name']}}
                        </li>
                        <li>
                            <i class="ti-comment"></i>
                            <?php echo count($blog->comments); ?>
                        </li>
                    </ul>
                </div>
            </article>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <!-- /row -->

    <!-- /pagination -->
    <nav class="text-center">
    <?php echo $blogs->links(); ?>
    </nav>
    <!-- /pagination -->

</div>
