<?php
/**
 * User: Администратор
 * Date: 09.10.2017
 * Time: 19:49
 */

?>

This is a carousel widget with some rooms:
<?= frontend\components\CarouselWidget\CarouselWidget::widget( [
		'models'  => $models,
		'options' => [ 'style' => 'border:1px solid black;textalign:center;padding:5px;' ]
] ); ?>
