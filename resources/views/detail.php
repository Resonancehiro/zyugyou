
<div>
    <?= $item->name ?>
    <?= $item->price ?> 円
    <?= csrf_field() ?>
    <form action="/cart/<?= $item->id ?>" method="POST">
        <?= csrf_field() ?>
        <input type="submit" value="カートへ">
    </form>
</div>
