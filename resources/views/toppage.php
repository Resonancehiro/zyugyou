<?php foreach($items as $item): ?>

    <div>
        <?= $item->name ?>
        <?= $item->price ?> 円
        <a href="/detail/<?= $item->id ?>"> 詳細</a></br>
    </div>

<?php endforeach; ?>
<a href="/cart"><input type="submit" value="カートへ"></a>
