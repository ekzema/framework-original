<div class="container">
<?php foreach($posts as $post) : ?>
    <div class="panel panel-default">
        <div class="panel-heading"><?= $post->title ?></div>
        <div class="panel-body">
            <?= $post->full_text ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Panel title</h3>
        </div>
        <div class="panel-body">
            Panel content
        </div>
    </div>

    <?endforeach ?>
</div>