
    <p>購入確認画</p>

<?php foreach($cartItems as $item): ?>

    <div>
        <?= $item->name ?>
        <?= $item->price ?> 円
    </div>

<?php endforeach; ?>

    //合計金額

    <?= $item->price ?> 円

<form action="/buy" method="get">
    <tbody>
    <?first('name')?>
    </tbody>

    <a href="/cart/de"><input type="submit" value="送信する"></a>



