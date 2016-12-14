<?php include('include/doctype.php') ?>
    
<?php include('include/header.php') ?>    


        <section id="main">
            <?php include('include/nav.php') ?>

            <section id="content">
                <div class="container">
                	<div class="card">

                        <div class="action-header palette-Teal-400 bg clearfix">
                            <div class="ah-label hidden-xs palette-White text">Parcels</div>

                            <div class="ah-search">
                                <input type="text" placeholder="Start typing..." class="ahs-input search_text">

                                <i class="ah-search-close zmdi zmdi-long-arrow-left" data-ma-action="ah-search-close"></i>
                            </div>

                            <ul class="ah-actions actions a-alt">
                                <li>
                                    <a href="" class="ah-search-trigger" data-ma-action="ah-search-open">
                                        <i class="zmdi zmdi-search"></i>
                                    </a>
                                </li>

                                
                                <!-- <li class="dropdown">
                                    <a href="" data-toggle="dropdown" aria-expanded="true">
                                        <i class="zmdi zmdi-sort"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="">Last Modified</a>
                                        </li>
                                        <li>
                                            <a href="">Last Edited</a>
                                        </li>
                                        <li>
                                            <a href="">Name</a>
                                        </li>
                                        <li>
                                            <a href="">Date</a>
                                        </li>
                                    </ul>
                                </li> -->
                                <!-- <li>
                                    <a href="">
                                        <i class="zmdi zmdi-info"></i>
                                    </a>
                                </li> -->
                                 <li class="dropdown">
                                    <a href="" data-toggle="dropdown" aria-expanded="true">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                    	<li>
                                            <a href="">Bulk Delete</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Refresh</a>
                                        </li>
                                        
                                    </ul>
                                </li> 
                            </ul>
                        </div>

                        <div class="list-group lg-alt lg-even-black">
                            

                            <?php foreach($parcel_d as $parcel){ ?>

                            <div class="list-group-item media">
                                <div class="checkbox pull-left lgi-checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        <i class="input-helper"></i>
                                    </label>
                                </div>

                                <div class="pull-right">
                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="" data-toggle="dropdown" aria-expanded="false">
                                                <i class="zmdi zmdi-more-vert"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a href="">Refresh</a>
                                                </li>
                                                <li>
                                                    <a href="">Listview Settings</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                                <div class="pull-left">
                                    <div class="avatar-char palette-Green-400 bg"><?php echo substr($parcel->parcelid,0,1) ?></div>
                                </div>

                                <div class="media-body">
                                    <div class="lgi-heading"><?php echo $parcel->parcelid; ?></div>
                                    <ul class="lgi-attrs">
                                        <li><?php echo $parcel->customer; ?></li>
                                        <li><?php echo $parcel->shopmanager; ?></li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <?php } 


                            ?>
                            

                            

                            

                            

                            

                            
                        </div>

                        <div class="text-center"><?php echo $parcel_d->links(); ?></div>
                    </div>
                </div>
            </section>

<?php include('include/footer.php'); ?>