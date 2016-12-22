<div class="panel-group" data-collapse-color="amber" id="accordionAmber" role="tablist" aria-multiselectable="true">
    <?php foreach($parcel_data as $parcel){?>
    <div class="panel panel-collapse">
        <div class="panel-heading" role="tab">
            <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordionAmber" href="#accordionAmber-<?php echo $parcel->id ?>" aria-expanded="false">
                    Parcel Number: <?php echo $parcel->parceltoken; ?>
                </a>
            </h4>
        </div>
        <div id="accordionAmber-<?php echo $parcel->id ?>" class="collapse" role="tabpanel" aria-expanded="false" style="height: 0px;">
            <div class="panel-body">
            	<table class="table table-striped">
            		<tr>
            		 <td>Customer Name:</td> <td><?php echo $parcel->customer->name; ?></td>	
            		 <td>Customer Email:</td> <td><?php echo $parcel->customer->email; ?></td>		
            		</tr>
            		<tr>
            		 <td>Shopmanager Name:</td> <td><?php echo $parcel->shopmanager->name; ?></td>	
            		 <td>Shopmanager Email:</td> <td><?php echo $parcel->shopmanager->email; ?></td>		
            		</tr>
            		<tr>
            		 <td>Product Type:</td> <td><?php echo isset($parcel->parceldata->producttype)?$parcel->parceldata->producttype:'N/A'; ?></td>	
            		 <td>Destination:</td> <td><?php echo isset($parcel->parceldata->destination)?$parcel->parceldata->destination:'N/A'; ?></td>		
            		</tr>
            		<tr>
            		 <td>Recipient Name:</td> <td><?php echo isset($parcel->parceldata->recipient_name)?$parcel->parceldata->recipient_name:'N/A'; ?></td>	
            		 <td>Zipcode:</td> <td><?php echo isset($parcel->parceldata->zipcode)?$parcel->parceldata->zipcode:'N/A'; ?></td>		
            		</tr>
            		<tr>
            		 <td>Address:</td> <td><?php echo isset($parcel->parceldata->address)?$parcel->parceldata->address:'N/A'; ?></td>	
            		 <td>Phone Number:</td> <td><?php echo isset($parcel->parceldata->phone)?$parcel->parceldata->phone:'N/A'; ?></td>		
            		</tr>
            		<tr>
            		 <td>Price:</td> <td><?php echo isset($parcel->parceldata->price)?$parcel->parceldata->price:'N/A'; ?></td>	
            		 <td>Parcel Date:</td> <td><?php echo isset($parcel->parceldata->created_at)?$parcel->parceldata->created_at:'N/A'; ?></td>		
            		</tr>
            	</table>
               
            </div>
        </div>
    </div>
    <?php } ?>
</div>
 