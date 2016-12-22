<?php include(base_path().'/resources/views/include/doctype.php') ?>
    
<?php include(base_path().'/resources/views/include/header.php') ?>    


        <section id="main">
            <?php include(base_path().'/resources/views/include/nav.php') ?>

            <section id="content">
                <div class="container">
                 
                <!-- cards containers -->
                <div class="card">
                  <div class="card-header">  
                    <h2>Add Parcel</h2>
                    <small class="text-danger">Fields marked in * are required</small>
                  </div>
                  <form class="form-horizontal" role="form" method="POST" action="<?php echo url('/parcel/store') ?>">
                        <?php echo csrf_field() ?>
                  <div class="card-body card-padding">
                        <div class="form-group fg-float">
                            <div class="fg-line">
                                 <input type="text" name="customer_name" value="<?php echo old('customer_name') ?>" class="input-sm form-control fg-input" required>
                                <input type="hidden" required="required" name="customer_id">
                                <label class="fg-label">Customer*</label>
                            </div>
                        </div>

                        <div class="form-group fg-float m-t-30">
                            <div class="fg-line">
                                <input type="text" name="shopmanager_name" value="<?php echo old('shopmanager_name') ?>" class="input-sm form-control fg-input" required>
                                 <input type="hidden" required="required" name="shopmanager_id">
                                <label class="fg-label">Shopmanager*</label>

                            </div>
                        </div>

                        <div class="form-group fg-float m-t-30">
                            <h2>Add Parcel Data <a href="javascript:void(0)" class="btn new_parcel_add_btn palette-Red-500 bg waves-effect pull-right"><i class="zmdi zmdi-plus-circle zmdi-hc-fw"></i></a></h2>
                        </div>

                        

                        <div class="row new_parcel_container">

                                <div class="col-sm-12">
                                  <div class="form-group fg-float m-t-30">
                                      <div class="fg-line">
                                          <input type="text" name="parcel_label[]" value="<?php echo old('parcel_label') ?>" class="input-sm form-control fg-input" required>
                                          <label class="fg-label">Parcel ID*</label>
                                      </div>
                                  </div>
                                    
                                </div>
                                
                            </div>

                      

                        <button type="submit" class="btn btn-primary btn-sm m-t-10 waves-effect">Submit</button>

                        <a href="<?php echo url('parcel') ?>" class="btn btn-info btn-sm m-t-10 m-l-20 waves-effect">Cancel</a>

                  </div>
                  </form>
                </div>




                <!-- card containers -->

                </div>
            </section>

           <script type="text/javascript">
      $(document).ready(function() {
       
        


            //customer        
            $('[name="customer_name"]').autocomplete({
              source: APP_URL+"/parcel/searchcustomer",
              minLength: 2,
              change: function (event, ui) { console.log('test') },
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

