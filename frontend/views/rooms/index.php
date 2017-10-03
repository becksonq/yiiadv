<?php
/**
 * User: Администратор
 * Date: 03.10.2017
 * Time: 22:25
 */
?>

<div class="row">
	<?php foreach ( $dataProvider->getModels() as $model ) { ?>
		<div class="col-md-3" style="border:1px solid gray; marginright:10px; padding:20px;">
			<h2>Room #<?= $model->id ?></h2>
			Floor: <?= $model->floor ?>
			<br/>
			Number: <?= $model->room_number; ?>
		</div>
	<?php } ?>

	<a href=" <?= Yii::$app->urlManagerBackend->createUrl('site/index') ?>">link</a>
</div>
