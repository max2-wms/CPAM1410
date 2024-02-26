<table style="width: 770px; font-size: 10px;">
	<tr>
    	<td><?php echo address; ?></td>
        <td>
        	<?php echo "<span>{$lang['label1']}</span><br />"; ?>
			<?php echo phone1; ?>
		</td>
        <td>
        	<?php echo "<span>{$lang['label2']}</span><br />"; ?>
			<?php echo phone2; ?>
		</td>
        <td>
        	<?php echo "<span>{$lang['label3']}</span><br />"; ?>
			<?php echo phone3; ?>
		</td>
        <td>
        	<?php echo $lang['label4']; ?>
        	<a href="mailto:<?php echo email; ?>"><?php echo email; ?></a>
		</td>
    </tr>
    <tr>
    	<td style="padding-top: 5px;" colspan="4">
        	<?php include('navigation2.php'); ?>
        </td>
        <?php $year = date('Y'); ?>
        <td style="padding-top: 5px;"><?php echo "&copy; {$year } CPAM RADIO UNION.COM, TOUS DROITS RÉSERVÉS."; ?></td>
    </tr>
</table>