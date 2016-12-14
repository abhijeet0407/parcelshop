<?php include('include/doctype.php') ?>
    
<?php include('include/header.php') ?>    


        <section id="main">
            <?php include('include/nav.php') ?>

            <section id="content">
                <div class="container">
                  <div class="c-header">
                      <h2>Manage Parcel</h2>
                  </div>

                  <div class="card">
                    <div class="card-header">
                      <h2>Add Parcel</h2>
                      <small>Fields marked with * are required fields</small>
                    </div> 
                    <div class="card-body card-padding">
                    <form method="post" action="parcels">
                    <input type="hidden" name="_token" id="csrf-token" value="<?php echo Session::token() ?>" />
                      <div class="row">
                    <div class="col-sm-12 ">
                            <div class="input-group fg-float">
                              <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                                  <div class="fg-line">
                                            <input name="customer" type="text" class="form-control">
                                            <label class="fg-label">Customer</label>
                                  </div>
                            </div>
                        </div>

                        <div class="col-sm-12 m-t-30">
                            <div class="input-group fg-float">
                              <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                                  <div class="fg-line">
                                            <input name="shopmanager" type="text" class="form-control">
                                            <label class="fg-label">Shop Manager</label>
                                  </div>
                             </div>
                        </div>


                        <div class="col-sm-12 m-t-30">
                            <div class="input-group fg-float">
                                <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                                  <div class="fg-line">
                                            <input name="parcelid" type="text" class="form-control">
                                            <label class="fg-label">Parcel ID</label>
                                  </div>
                             </div>
                        </div>
                        <div class="col-sm-12 m-t-20">
                          <button type="submit" class="btn btn-info waves-effect">Submit</button>
                        </div>


                  </div>
                  </form>
                    </div>
                  </div>





	                

                	
                </div>
            </section>

<?php include('include/footer.php') ?>