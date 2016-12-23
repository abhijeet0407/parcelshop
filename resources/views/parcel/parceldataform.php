<?php include(base_path().'/resources/views/include/doctype.php') ?>
    
<?php include(base_path().'/resources/views/include/header.php') ?>    


        <section id="main">
            <?php include(base_path().'/resources/views/include/nav.php') ?>

            <section id="content">
                <div class="container">
                 
                <!-- cards containers -->
                <div class="card">
                  <div class="card-header">  
                    <h2>Add Parcel Data</h2>
                    <small class="text-danger">Fields marked in * are required</small>
                  </div>
                  <form class="form-horizontal" role="form" method="POST" action="<?php echo url('/parcel/parceldatastore') ?>">
                        <?php echo csrf_field() ?>
                  <div class="card-body card-padding">
                    <?php   foreach($parcel_data as $parcel){ ?>  
                    <!-- each data container start -->
                      <div class="each_container parceldata_container">
                        <div class="form-group col-md-12 col-xs-12 col-sm-12 fg-float m-t-30">
                            <div class="fg-line">
                                 <input type="text" disabled="disabled" value="<?php echo $parcel->parceltoken; ?>" name="parceltoken" value="<?php echo old('parceltoken') ?>" class="input-sm form-control fg-input" required>
                                <input type="hidden" name="parcel_id[]" value="<?php echo $parcel->id ?>">
                                <label class="fg-label">Parcel Number</label>
                            </div>
                        </div>

                        <div class="form-group col-md-12 col-xs-12 col-sm-12 fg-float m-t-30">
                            <div class="fg-line">
                                <input type="text" name="producttype[]" value="<?php echo old('producttype') ?>" class="input-sm form-control fg-input" >
                                
                                <label class="fg-label">Product Type</label>

                            </div>
                        </div>

                        <div class="form-group col-md-12 col-xs-12 col-sm-12 fg-float m-t-30">
                            <div class="fg-line">
                                <input type="text" name="destination[]" value="<?php echo old('destination') ?>" class="input-sm form-control fg-input" >
                                
                                <label class="fg-label">Destination</label>

                            </div>
                        </div>


                        <div class="form-group col-md-12 col-xs-12 col-sm-12 fg-float m-t-30">
                            <div class="fg-line">
                                <input type="text" name="price[]" value="<?php echo old('price') ?>" class="input-sm form-control fg-input" >
                                
                                <label class="fg-label">Price</label>

                            </div>
                        </div>

                      </div>  
                      <!-- each data container end -->

                      <!-- each recipient container start-->
                      <div style="display: none;" class="each_container recipient_container">
                        <div class="form-group  fg-float m-t-30">
                            <div class="fg-line">
                                 <input type="text" disabled="disabled" value="<?php echo $parcel->parceltoken; ?>" name="parceltoken222" value="<?php echo old('parceltoken') ?>" class="input-sm form-control fg-input" required>
                                <input type="hidden" name="parcel_id22[]" value="<?php echo $parcel->id ?>">
                                <label class="fg-label">Parcel Number</label>
                            </div>
                        </div>

                        <div class="form-group  fg-float m-t-30">
                            <div class="fg-line">
                                <input type="text" name="recipient_name[]" value="<?php echo old('recipient_name') ?>" class="input-sm form-control fg-input" >
                                
                                <label class="fg-label">Recipient Name</label>

                            </div>
                        </div>

                        <div class="form-group  fg-float m-t-30">
                            <div class="fg-line">
                                <input type="text" name="zipcode[]" value="<?php echo old('zipcode') ?>" class="input-sm form-control fg-input" >
                                
                                <label class="fg-label">Zipcode</label>

                            </div>
                        </div>


                        <div class="form-group  fg-float m-t-30">
                            <div class="fg-line">
                                <input type="text" name="address[]" value="<?php echo old('address') ?>" class="input-sm form-control fg-input" >
                                
                                <label class="fg-label">Address</label>

                            </div>
                        </div>

                        <div class="form-group  fg-float m-t-30">
                            <div class="fg-line">
                                <input type="text" name="phone[]" value="<?php echo old('phone') ?>" class="input-sm form-control fg-input" >
                                
                                <label class="fg-label">Phone Number</label>

                            </div>
                        </div>

                      </div> 
                      <!-- each recipient container end -->

                      <?php } ?>
                        

                       

                        <div class="clearfix"></div>

                        <button type="submit" class="btn btn-primary btn-sm m-t-10 waves-effect">Submit</button>

                        <button type="button" class="btn recipient_toggle btn-warning btn-sm m-t-10 m-l-20 waves-effect">Add Recipient Data</button>

                        <a href="<?php echo url('parcel') ?>" class="btn btn-info btn-sm m-t-10 m-l-20 waves-effect">Cancel</a>

                  </div>
                  </form>
                </div>




                <!-- card containers -->

                </div>
            </section>

           <script type="text/javascript">
      $(document).ready(function() {
       
        
          $('.recipient_toggle').click(function(){

            $('.parceldata_container,.recipient_container').fadeToggle('fast', function() {
              
            });

          })

            //customer        
            $('[name="customer_name"]').autocomplete({
              source: APP_URL+"/parcel/searchcustomer",
              minLength: 2,
              select: function( event, ui ) {
                
                //alert('test')
               // $(this).parent().find('.autos_val').val(ui.item.id);
                   $('[name="customer_name"]').val(ui.item.label);
              $('[name="customer_id"]').val(ui.item.id);
                
                
                
              }
            });
            //customer 

            //shopmanager        
            $('[name="shopmanager_name"]').autocomplete({
              source: APP_URL+"/parcel/searchshopmanager",
              minLength: 2,
              select: function( event, ui ) {
                
                //alert('test')
               // $(this).parent().find('.autos_val').val(ui.item.id);
                   $('[name="shopmanager_name"]').val(ui.item.label);
              $('[name="shopmanager_id"]').val(ui.item.id);
                
                
                
              }
            });
            //shopmanager 

            $('.new_parcel_add_btn').click(function(){


                $.ajax({
                    url: APP_URL+"/parcel/addnewparcelid",
                    type: 'GET',
                    data:'new=1'
                    
                })
                .done(function(data) {
                 // alert('test')
                    //console.log("success");
                    $('.new_parcel_container').append(data)
                })
                .fail(function() {
                    //console.log("error");
                })
                .always(function() {
                    //console.log("complete");
                });
                


            })  

            $('body').on('click','.delete_parcel',function(){

              $(this).parent().parent().remove();


            })

      });
    </script>


<?php include(base_path().'/resources/views/include/footer.php') ?>

