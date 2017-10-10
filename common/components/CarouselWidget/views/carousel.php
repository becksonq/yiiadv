<?php
/**
 * User: Администратор
 * Date: 09.10.2017
 * Time: 22:40
 */
?>

<?php $styleOption = isset( $this->context->options['style'] ) ? $this->context->options['style'] : ''; ?>

<div id="<?php echo $this->context->id ?>" style="<?php echo $styleOption ?>">
	<?php
	echo \yii\bootstrap\Carousel::widget( [
			'id'    => $this->context->carouselId,
			'items' => $carouselItemsContent
	] );
	?>
</div>
