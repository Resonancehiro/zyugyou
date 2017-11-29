<!DOCTYPE html>
<html>

<body>
    <form method="POST"  action="/buy">
    <?=csrf_field()?>

        <input type="text" name="name" value="<?=old('name') ?>">name</br>
        <input type="text" name="email"value="<?=old('email') ?>">email</br>
        <input type="text" name="number"value="<?=old('number') ?>">postal code</br>
        <input type="text" name="address"value="<?=old('address') ?>">address</br>
        <input type="text" name="tel" tvalue="<?=old('tel') ?>">tel</br>

        <input type="submit" value="確認する">
    </form>
</body>
</html>

<?php if($errors->first('name')):?>
    名前を入力してください。
<?php endif;?>

<?php if($errors->first('email')):?>
    Emailを入力してください。
<?php endif;?>

<?php if($errors->first('number')):?></br>
    郵便番号を入力してください。
<?php endif;?>

<?php if($errors->first('number')):?>
    住所を入力してください。
<?php endif;?>

<?php if($errors->first('tel')):?>
    電話番号を入力してください。
<?php endif;?>





