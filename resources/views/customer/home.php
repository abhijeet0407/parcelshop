
<?php include(base_path().'/resources/views/include/doctype.php') ?>
    
<?php include(base_path().'/resources/views/include/header.php') ?>    


        <section id="main">
            <?php include(base_path().'/resources/views/include/nav.php') ?>

            <section id="content">
                <div class="container">
                 
                <!-- cards containers -->
                <div class="card">
						<form method="GET">
                        <div class="action-header palette-Teal-400 bg clearfix">
                            <div class="ah-label hidden-xs palette-White text">Customer</div>
                            <?php $search_display=''; $q=''; $bgcolor=''; if(isset($_REQUEST['q'])){ $q=$_REQUEST['q']; $search_display='style="display:block"'; $bgcolor='palette-Teal bg'; }?>
                            
                            <div class="ah-search" <?php echo $search_display; ?>>
                            	
                                <input name="q" type="text" placeholder="Start typing..." class="ahs-input search_text" value="<?php echo $q; ?>">
                                

                                <i class="ah-search-close zmdi zmdi-long-arrow-left" data-ma-action="ah-search-close"></i>
                            </div>


                            <ul class="ah-actions actions a-alt">
                                <li>
                                    <a data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Search" href="javascript:void(0)" class="ah-search-trigger" data-ma-action="ah-search-open">
                                        <i class="zmdi zmdi-search"></i>
                                    </a>
                                </li>

                                <li>
                                    <a class="alt_menu <?php echo $bgcolor; ?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add New" href="<?php echo url('customer/create'); ?>" >
                                        <i class="zmdi zmdi-plus-circle"></i>
                                    </a>
                                </li>
                                
                                <li>
                                      <a class="alt_menu <?php echo $bgcolor; ?>" data-table="customer" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Bulk delete" href="javascript:void(0)"><i class="zmdi zmdi-minus-circle"></i></a>
                                </li>
                                <li>
                                        <a data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh" class="alt_menu <?php echo $bgcolor; ?>" href="javascript:void(0)"><i class="zmdi zmdi-refresh-alt"></i></a>
                                </li>
                                        
                                    </ul>
                                </li> 
                            </ul>
                        </div>
						</form>
                        <div class="list-group lg-alt lg-even-black">
                            <?php if(count($customer_data)==0){ ?>

                            	<div  class="list-group-item media">
                                

                                

                                <div class="media-body">
                                    <div class="lgi-heading">No data to list.</div>
                                    
                                </div>
                            </div>


                            <?php } ?>

                            <?php foreach($customer_data as $customer){ ?>

                            <div rel="<?php echo $customer->id; ?>" class="list-group-item media">
                                <div class="pull-right">
                                    
                                       
                                        	<a data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit" href="javascript:void(0)" class="btn btn-xs palette-Cyan btn-icon bg waves-effect waves-circle waves-float"><i class="zmdi zmdi-edit"></i></a>
                                            <a href="javascript:void(0)" rel="<?php echo $customer->id; ?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Remove" data-table="customer" class="btn singleDelete btn-xs btn-danger m-l-10 btn-icon waves-effect waves-circle waves-float"><i class="zmdi zmdi-delete"></i></a>

                                            
                                       
                                </div>

                                <div class="pull-left">
                                	<div data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Check this box to add this listing to bulk delete" class="avatar-char ac-check">
                                                <input class="acc-check" value="<?php echo $customer->id; ?>" type="checkbox">

                                                <span class="acc-helper palette-Teal bg"><?php echo substr($customer->name,0,1) ?></span>
                                            </div>
                                    
                                </div>

                                <div class="media-body">
                                    <div class="lgi-heading"><?php echo $customer->name; ?></div>
                                    <small class="lgi-text"><?php echo $customer->customer->address ?></small>
                                    <ul class="lgi-attrs">
                                        <li><?php echo $customer->email; ?></li>
                                        <li><?php echo $customer->customer->phone; ?></li> 
                                        <li><?php echo $customer->customer->account_type; ?></li>
                                        <li>COD: <?php echo ($customer->customer->cod==0)?'No':'Yes'; ?></li>
                                    </ul>
                                </div>
                            </div>
                            <?php } 


                            ?>
                            

                            

                            

                            

                            

                            
                        </div>

                        <div class="text-center"><?php echo $customer_data->links(); ?></div>
                    </div>
                <!-- card containers -->

                </div>
            </section>


            <script type="text/javascript">
            	jQuery(document).ready(function($) {
            		//bulk delete
                    


                    $('body').on('click','.bulkDelete',function(){
                        //alert('test')

                        if($('.acc-check:checked').length==0){
                            swal("Info!", "Please select the members in the list to delete!", "info")
                        }else{
                            var check_count=$('.acc-check:checked').length;
                            var checked_ids = $('input:checkbox:checked.acc-check').map(function () {
                              return this.value;
                            }).get(); 
                            //console.log(JSON.stringify({bulkids:checked_ids})); 
                            
                            var bel=$(this).attr('data-table');

                            swal({
                              title: "Are you sure?",
                              text: "You want to bulk delete the data!",
                              type: "warning",
                              showCancelButton: true,
                              confirmButtonColor: "#DD6B55",
                              confirmButtonText: "Yes, delete it!",
                              closeOnConfirm: true
                            },
                            function(){
                              

                                var myJsonString = checked_ids.join(",");

                                $.ajax({
                                    url: APP_URL+'/'+bel+'/bulkdelete',
                                    type: 'GET',
                                    data: 'bulkids='+encodeURIComponent(myJsonString)
                                    
                                })
                                .done(function(data) {
                                	console.log(data);
                                    if(data=='deleted'){
                                    	$.each(checked_ids, function( index, value ) {

											 $('.list-group-item[rel="'+value+'"]').remove();

										});
										window.location.reload();
                                       
                                    }
                                })
                                .fail(function() {
                                    console.log("error");
                                })
                                .always(function() {
                                    console.log("complete");
                                });

                            });  

                        }


                        


                        
                        
                        

                    });


                    //bulk delete
            	});
            </script>
            

<?php include(base_path().'/resources/views/include/footer.php') ?>

