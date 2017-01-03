<?php $i=1; foreach($parcel_data as $parcel){
	if(($parcel->parceldata['recipient_name']!='') && ($parcel->parceldata['zipcode']!='') && ($parcel->parceldata['address']!='')  && ($parcel->parceldata['phone']!='') && ($parcel->parceldata['producttype']!='') && ($parcel->parceldata['destination']!='') && ($parcel->parceldata['price']!='') ){
 ?>

	
	<tr> 
    <td align="center" valign="top"><?php echo $i; ?></td>
    <td align="left" valign="top" class="parcel-code"><?php echo $parcel->parceltoken ?></td>
    <td align="left" valign="top"><?php echo $parcel->parceldata['recipient_name'] ?><?php echo $parcel->parceldata['address'] ?></td>
    <td align="center" valign="top"><div class="squaredTwo">
      <input type="checkbox" value="<?php echo $parcel->id ?>"  name="handover[]" >
      <label for="squaredTwo"></label>
    </div></td>
	</tr>


<?php  $i++;
}

 } ?>