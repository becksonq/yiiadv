<?php
/**
 * User: Администратор
 * Date: 08.10.2017
 * Time: 0:14
 */
?>

There are <?= count( $models ) ?> reservations for the date <?= $currentDate ?>
<?php if ( count( $models ) > 0 ) { ?>
	This is a summary
	<?php foreach ( $models as $m ) { ?>
		Reservation #: <?= $m->id ?> - Room: <?= $m->room->floor . ' 
' . $m->room->number ?> - Customer: <?= $m->customer->surname . ' ' . $m->customer->name ?> - Price per day: <?=
		$m->price_per_day ?> - Date from: <?= $m->date_from ?> -
		Date to: <?= $m->date_to ?>
	<?php } ?>
<?php }
else { ?>
	There is no summary for the current date
<?php } ?>
