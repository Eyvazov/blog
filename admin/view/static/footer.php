<?php if (session('user_rank') && session('user_rank') != 3):?>
</div>
<?php endif;?>
<script>
    var tags =['<?= implode("','", $tagsArr)?>']
</script>

</body>
</html>