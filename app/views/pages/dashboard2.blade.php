@extends('layout.master')
@section('page')


    <div class="row">

        <div class="col-md-6 col-vlg-4 col-sm-12">
            <div class="row ">



                
            </div>
            <div class="row">
                <!-- BEGIN ANIMATED TILE -->
                <div class="col-md-6 col-sm-6 m-b-20" data-aspect-ratio="true">
                    <div class="live-tile slide ha" data-speed="750" data-delay="4500" data-mode="carousel">
                        <div class="slide-front ha tiles green p-t-20 p-l-20 p-r-20 p-b-20">
                            <h1 class="semi-bold text-white">15% <i class="icon-custom-up icon-custom-2x"></i></h1>
                            <div class="overlayer bottom-left fullwidth">
                                <div class="overlayer-wrapper">
                                    <div class="p-t-20 p-l-20 p-r-20 p-b-20">
                                        <p class="bold">Webarch Dashboard</p>
                                        <p>2,567 USD <span class="m-l-10"><i class="fa fa-sort-desc"></i> 2%</span>
                                        </p>
                                        <p class="bold p-t-15">Front-end Design</p>
                                        <p>1,420 USD <span class="m-l-10"><i class="fa fa-sort-desc"></i> 1%</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="slide-back ha tiles green">
                            <div class="p-t-20 p-l-20 p-r-20 p-b-20">
                                <h5 class="text-white semi-bold no-margin p-b-5">Today Sale's</h5>
                                <h3 class="text-white no-margin">450 <span class="semi-bold">USD</span></h3> Last Sale 23.45 USD </div>
                            <div class="overlayer bottom-left fullwidth">
                                <div class="overlayer-wrapper">
                                    <div id="sales-sparkline"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END ANIMATED TILE -->
                <!-- BEGIN ANIMATED TILE -->
                <div class="col-md-6 col-sm-6 m-b-20" data-aspect-ratio="true">
                    <div class="live-tile slide ha " data-speed="750" data-delay="6000" data-mode="carousel">
                        <div class="slide-front ha tiles green ">
                            <div class="overlayer bottom-left fullwidth">
                                <div class="overlayer-wrapper">
                                    <div class="tiles gradient-black p-l-20 p-r-20 p-b-20 p-t-20">
                                        <h4 class="text-white semi-bold no-margin">RUN AWAY GO </h4>
                                        <h5 class="text-white semi-bold ">Queen's favourite</h5>
                                        <p class="text-white semi-bold no-margin"><i class="icon-custom-up "></i> Read More</p>
                                    </div>
                                </div>
                            </div>
                            <img src="assets/img/others/11.png" alt="" class="image-responsive-width xs-image-responsive-width"> </div>
                        <div class="slide-back ha tiles green">
                            <div class="overlayer bottom-left fullwidth">
                                <div class="overlayer-wrapper">
                                    <div class="tiles gradient-black p-l-20 p-r-20 p-b-20 p-t-20">
                                        <h5 class="text-white semi-bold ">King's favourite</h5>
                                        <p class="text-white semi-bold no-margin"><i class="icon-custom-up "></i> Read More</p>
                                    </div>
                                </div>
                            </div>
                            <img src="assets/img/others/cover.jpg" alt="" class="image-responsive-width xs-image-responsive-width">
                        </div>
                    </div>
                </div>
                <!-- END ANIMATED TILE -->


            </div>


        </div>

        <div class="col-md-6 col-vlg-4 col-sm-12">
            <div class="row ">

                <!-- BEGIN ANIMATED TILE -->
                <div class="col-md-12 col-sm-6 m-b-20" data-aspect-ratio="true">
                    <div class="live-tile slide ha " data-speed="750" data-delay="6000" data-mode="carousel">
                        <div class="slide-front ha tiles green ">
                            <div class="overlayer bottom-left fullwidth">
                                <div class="overlayer-wrapper">
                                    <div class="tiles gradient-black p-l-20 p-r-20 p-b-20 p-t-20">
                                        <h4 class="text-white semi-bold no-margin">RUN AWAY GO </h4>
                                        <h5 class="text-white semi-bold ">Queen's favourite</h5>
                                        <p class="text-white semi-bold no-margin"><i class="icon-custom-up "></i> Read More</p>
                                    </div>
                                </div>
                            </div>
                            <img src="assets/img/others/11.png" alt="" class="image-responsive-width xs-image-responsive-width"> </div>
                        <div class="slide-back ha tiles green">
                            <div class="overlayer bottom-left fullwidth">
                                <div class="overlayer-wrapper">
                                    <div class="tiles gradient-black p-l-20 p-r-20 p-b-20 p-t-20">
                                        <h5 class="text-white semi-bold ">King's favourite</h5>
                                        <p class="text-white semi-bold no-margin"><i class="icon-custom-up "></i> Read More</p>
                                    </div>
                                </div>
                            </div>
                            <img src="assets/img/others/cover.jpg" alt="" class="image-responsive-width xs-image-responsive-width">
                        </div>
                    </div>
                </div>
                <!-- END ANIMATED TILE -->


            </div>


        </div>

        <div class="row">
            <div class="col-md-7 col-xs-7 no-padding">
                <div class="tiles white text-center">
                    <h2 class="semi-bold text-primary weather-widget-big-text no-margin p-t-35 p-b-10">16°</h2>
                    <div class="tiles-title blend p-b-25">CURRENTLY</div>
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>


    </div>   <!-- END ROW -->



@stop

