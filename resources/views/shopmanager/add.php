<?php include(base_path().'/resources/views/include/doctype.php') ?>
    
<?php include(base_path().'/resources/views/include/header.php') ?>    


        <section id="main">
            <?php include(base_path().'/resources/views/include/nav.php') ?>

            <section id="content">
                <div class="container">
                 
                <!-- cards containers -->
                <div class="card">
                  <div class="card-header">  
                    <h2>Create Shopmanager</h2>
                    <small class="text-danger">Fields marked in * are required</small>
                  </div>
                  <form class="form-horizontal" role="form" method="POST" action="<?php echo url('/shopmanager/store') ?>">
                        <?php echo csrf_field() ?>
                  <div class="card-body card-padding">
                        <div class="form-group fg-float">
                            <div class="fg-line">
                                <input type="text" name="name" value="<?php echo old('name') ?>" class="input-sm form-control fg-input" required>
                                <label class="fg-label">Name*</label>
                            </div>
                        </div>

                        <div class="form-group fg-float m-t-30">
                            <div class="fg-line">
                                <input type="email" name="email" value="<?php echo old('email') ?>" class="input-sm form-control fg-input" required>
                                <label class="fg-label">Email*</label>
                            </div>
                        </div>

                        <div class="form-group fg-float m-t-30">
                            <div class="fg-line">
                                <input type="password" name="password" class="input-sm form-control fg-input" minlength="5" required>
                                <label class="fg-label">Password*</label>
                            </div>
                        </div>


                        <div class="form-group fg-float m-t-30">
                            <div class="fg-line">
                                <input type="text" name="phone" value="<?php echo old('phone') ?>" class="input-sm form-control fg-input" minlength="9">
                                <label class="fg-label">Phone</label>
                            </div>
                        </div>

                        <div class="form-group fg-float m-t-30">
                            <div class="fg-line">
                                <input type="text" name="address" value="<?php echo old('address') ?>" class="input-sm form-control fg-input">
                                <label class="fg-label">Address</label>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary btn-sm m-t-10 waves-effect">Submit</button>

                        <a href="<?php echo url('shopmanager') ?>" class="btn btn-info btn-sm m-t-10 m-l-20 waves-effect">Cancel</a>

                  </div>
                  </form>
                </div>
                <!-- card containers -->

                </div>
            </section>


            <script type="text/javascript">
              
              jQuery(document).ready(function($) {
                <?php if (count($errors) > 0){
                        foreach ($errors->all() as $error){
                 ?>
                        notify22('<?php echo $error; ?>','danger')
                                  
                            <?php } ?>
                        
                <?php } ?>




                function notify22(message, type){
                        $.growl({
                            message: message
                        },{
                            type: type,
                            allow_dismiss: false,
                            label: 'Cancel',
                            className: 'btn-xs btn-inverse',
                            placement: {
                                from: 'top',
                                align: 'right'
                            },
                            delay: 4500,
                            animate: {
                                    enter: 'animated fadeInDown',
                                    exit: 'animated fadeOutUp'
                            },
                            offset: {
                                x: 20,
                                y: 25
                            }
                        });
                };



              });   


          </script>


<?php include(base_path().'/resources/views/include/footer.php') ?>

