<?php
/**
 * @var $this yii\web\View
 * @var $user \app\models\User
 */

$this->title = $user->name;
?>

<div class="container" style="background-color: #f5f5f5; border: 1px solid #d2d2d2; border-radius: 5px">
    <div class="row">
        <div class="col-md-3">
            <img src="" alt="" class="img-thumbnail">
            <h4><?= $user->level ?></h4>
            <p>user since: </p>
            <p><?= $user->reg_date ?></p>
        </div>
        <div class="col-md-9">
            <h3><?= $user->name ?></h3>
            <h4>Email:</h4>
            <p><?= $user->email ?></p>
                <h5><a href="#">cart</a></h5>
                <h5><a href="#">wishlist</a></h5>
        </div>
    </div>
</div>