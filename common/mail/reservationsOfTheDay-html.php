<?php
/**
 * User: Администратор
 * Date: 08.10.2017
 * Time: 0:12
 */
?>
There are <?= count( $models ) ?> reservations for the date <?= $currentDate ?>
<br/><br/>
<?php if ( count( $models ) > 0 ) { ?>
	<b>This is a summary:</b>
	<br/>
	<table>
		<tr>
			<td>Reservation #</td>
			<td>Room</td>
			<td>Customer</td>
			<td>Price per day</td>
			<td>Date from</td>
			<td>Date to</td>
		</tr>
		<?php foreach ( $models as $m ) { ?>
			<tr>
				<td><?= $m->id ?></td>
				<td><?= $m->room->floor . ' ' . $m->room->number ?></td>
				<td><?= $m->customer->surname . ' ' . $m->customer->name
					?></td>
				<td><?= $m->price_per_day ?></td>
				<td><?= $m->date_from ?></td>
				<td><?= $m->date_to ?></td>
			</tr>
		<?php } ?>
	</table>
<?php }
else { ?>
	<i>There is no summary for current date</i>
<?php } ?>