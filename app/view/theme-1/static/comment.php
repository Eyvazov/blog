<div class="media comment-box">
    <div class="media-left">
        <a href="#">
            <img class="img-responsive user-photo"
                 src="<?= get_gravatar($comment['comment_email'])?>">
        </a>
    </div>
    <div class="media-body">
        <h6 class="media-heading">
            <?= $comment['comment_name']?>
            <span style="float: right; font-size: 12px; color: #999"><?= timeConvert($comment['comment_date'])?></span>
        </h6>
        <p><?= $comment['comment_content']?></p>

    </div>
</div>