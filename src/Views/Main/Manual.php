<?php use CwfPhp\CwfPhp\Url; ?>
<div style="width: 25%; float: left; overflow: auto;">
    <h3>Framework manual</h3>
    <ul style="list-style: none; padding-left: 0;">
        <?php foreach ($menu as $section => $subpages): ?>
            <li><b><?= $section ?></b></li>
            <ul>
                <?php foreach ($subpages as $subpage => $link): ?>
                    <?php if (is_null($link)): ?>
                        <?php $curr_sect = $section; ?>
                        <?php $curr_page = $subpage; ?>
                        <li><b><?= $subpage ?></b></li>
                    <?php else: ?>
                        <?php if ($link[0] == "/"): ?>
                            <?php $link = Url::Site($link) ?>
                        <?php else: ?>
                            <?php $link = Url::Site("Manual/{$link}") ?>
                        <?php endif; ?>
                        <li><a href="<?= $link ?>"><?= $subpage ?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        <?php endforeach; ?>
    </ul>
</div>
<div style="width: 75%; float: right; overflow: auto;">
    <?php if (is_null($content)): ?>
        <p>Please select the subpage from the menu on the left side.</p>
    <?php else: ?>
        <h3><?= $curr_sect ?> &gt; <?= $curr_page ?></h3>
        <?= $content ?>
    <?php endif; ?>
</div>
<br style="clear: both" />