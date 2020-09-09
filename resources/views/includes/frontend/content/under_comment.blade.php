<?php $under_comments = $comment->under_comments; ?>
<?php foreach($under_comments as $under_comment): ?>
<ul class="replied-to">
    <li>
        <div class="avatar">
            <a href="javascript: void(0)">
                <img src="<?php echo $under_comment->user->name; ?>" alt="">
            </a>
        </div>
        <div class="comment_right clearfix">
            <div class="comment_info">
                By <a href="javascript: void(0)"><?php echo $under_comment->user->name; ?></a>
                <span>|</span><?php echo date('d/m/Y', $under_comment['added_date']); ?><span>

					<!--Delete button-->
					<?php if(auth()->user()->is_admin || auth()->user()->id == $under_comment['user_id']): ?>
						<a href="javascript: void(0)" onclick="confirm_modal('<?php echo url('home/delete_blog_comment/'.$under_comment['id'].'/'.$blog['id']); ?>');" class="float-right mb-0 mr-1 text-danger"><i class="icon-trash"></i></a>
                <?php endif; ?>
            </div>
            <p>
                <?php echo $under_comment['comment']; ?>
            </p>
        </div>
    </li>
</ul>
<?php endforeach; ?>
