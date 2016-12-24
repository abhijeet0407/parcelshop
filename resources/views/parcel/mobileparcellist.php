<?php $i=1; foreach($parcel_data as $parcel){ ?>

	
	<tr> 
    <td align="center" valign="top"><?php echo $i; ?></td>
    <td align="left" valign="top" class="parcel-code"><?php echo $parcel->id ?></td>
    <td align="left" valign="top"><?php echo $parcel->parceldata['address'] ?></td>
        
	</tr>


<?php  $i++; } ?>