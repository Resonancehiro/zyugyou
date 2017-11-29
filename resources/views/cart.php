<p> cart </p>
<?php foreach($cartItems as $item): ?>

    <?= $item->name ?>
    <?= $item->price ?> 円
    <a href="/cart/d"><input type="submit" value="削除"></a></br>

<?php endforeach; ?>

<a href="/buy"><input type="submit" value="購入"></a>

