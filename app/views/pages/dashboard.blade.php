@extends('layout.master')
<?php

function getOS()
{

    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    $os_platform = "Unknown OS Platform";

    $os_array = array(
            '/Windows NT 6.3/i' => 'Windows 8.1',
            '/windows nt 6.2/i' => 'Windows 8',
            '/windows nt 6.1/i' => 'Windows 7',
            '/windows nt 6.0/i' => 'Windows Vista',
            '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
            '/windows nt 5.1/i' => 'Windows XP',
            '/windows xp/i' => 'Windows XP',
            '/windows nt 5.0/i' => 'Windows 2000',
            '/windows me/i' => 'Windows ME',
            '/win98/i' => 'Windows 98',
            '/win95/i' => 'Windows 95',
            '/win16/i' => 'Windows 3.11',
            '/macintosh|mac os x/i' => 'Mac OS X',
            '/mac_powerpc/i' => 'Mac OS 9',
            '/linux/i' => 'Linux',
            '/ubuntu/i' => 'Ubuntu',
            '/iphone/i' => 'iPhone',
            '/ipod/i' => 'iPod',
            '/ipad/i' => 'iPad',
            '/android/i' => 'Android',
            '/blackberry/i' => 'BlackBerry',
            '/windows phone/i' => 'Windows Phone',
            '/webos/i' => 'Mobile'
    );

    foreach ($os_array as $regex => $value) {

        if (preg_match($regex, $user_agent)) {
            $os_platform = $value;

        }

    }

    return $os_platform;

}
?>
@section('page')


    <div class="row">

        <div class="col-md-6 col-vlg-4 col-sm-12">
            <div class="row ">
                <!-- BEGIN ANIMATED TILE -->
                <div class="col-md-6 col-sm-6 m-b-20" data-aspect-ratio="true">
                    <div class="live-tile slide ha " data-speed="750" data-delay="6000" data-mode="carousel">
                        <div class="slide-front ha tiles green ">
                            <div class="overlayer bottom-left middle-left fullwidth">
                                <h4 class="text-white semi-bold no-margin">Job Status </h4>
                            </div>
                            <div class="overlayer bottom-left fullwidth">


                                <div class="overlayer-wrapper">

                                    <div class="tiles gradient-black p-l-20 p-r-20 p-b-20 p-t-20">

                                        <h5 class="text-white semi-bold ">Job Allocated</h5>

                                        <p class="text-white semi-bold no-margin"><i class="icon-custom-up "></i> Read
                                            More</p>
                                    </div>
                                </div>
                            </div>
                            <img src="/assets/img/tile.jpg" alt=""
                                 class="image-responsive-width xs-image-responsive-width"></div>
                        <div class="slide-back ha tiles green">
                            <div class="overlayer bottom-left middle-left fullwidth">
                                <h4 class="text-white semi-bold no-margin">Job Status </h4>
                            </div>
                            <div class="overlayer bottom-left fullwidth">
                                <div class="overlayer-wrapper">


                                    <div class="tiles gradient-black p-l-20 p-r-20 p-b-20 p-t-20">

                                        <h5 class="text-white semi-bold ">Current Status </h5>

                                        <p class="text-white semi-bold no-margin"><i class="icon-custom-up "></i> Read
                                            More</p>
                                    </div>
                                </div>
                            </div>
                            <img src="/assets/img/tile2.jpg" alt=""
                                 class="image-responsive-width xs-image-responsive-width">
                        </div>
                    </div>
                </div>
                <!-- END ANIMATED TILE -->

                <!-- BEGIN ANIMATED TILE -->
                <div class="col-md-6 col-sm-6 m-b-20" data-aspect-ratio="true">
                    <div class="live-tile tiles slide ha " data-speed="750" data-delay="3000" data-mode="carousel">
                        <div class="slide-front ha tiles adjust-text red">
                            <div class="p-t-20 p-l-20 p-r-20 p-b-20"><i class="fa fa-map-marker fa-2x"></i>

                                <p class="text-white-opacity p-t-10"> {{ date('l jS \of F Y ');}}</p>

                                <h3 class="text-white">OS: <span class="semi-bold">{{ getOS();}} <br></span></h3>

                                <h3 class="no-margin light-x">Details</h3>

                                <p class="p-t-10"><span class="bold">UA: </span> {{$_SERVER['HTTP_USER_AGENT']}}</p>
                                <?php $app = App::getFacadeApplication();
                                $db = DB::getFacadeApplication();
                                ?>
                                <p class="p-t-20 "><span class="bold">Laravel ver: </span>{{$app::VERSION;}}</p></div>
                        </div>
                        <div class="slide-back ha tiles adjust-text light-blue">
                            <div class="p-t-20 p-l-20 p-r-20 p-b-20"><i class="fa fa-map-marker fa-2x"></i>

                                <p class="text-white-opacity p-t-10"> {{ date('l jS \of F Y ');}}</p>

                                <h3 class="text-white">OS: <span class="semi-bold">{{ getOS();}} <br></span></h3>

                                <h3 class="no-margin light-x">Details</h3>

                                <p class="p-t-10"><span class="bold">PHP-Ver: </span> {{phpversion()}}</p>

                                <p class="p-t-20 "><span class="bold">Laravel ver: </span>{{$app::VERSION;}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END ANIMATED TILE -->
                <!-- BEGIN ANIMATED TILE -->
                <div class="col-md-6 col-sm-6 m-b-20" data-aspect-ratio="true">
                    <div class="live-tile slide ha" data-speed="750" data-delay="4700" data-mode="carousel">
                        <div class="slide-front ha tiles purple p-t-20 p-l-20 p-r-20 p-b-20">
                            <h1 class="semi-bold text-white">USER MANAGER <i class="icon-custom-up icon-custom-2x"></i>
                            </h1>

                            <div class="overlayer bottom-left fullwidth">
                                <div class="overlayer-wrapper">
                                    <div class="p-t-20 p-l-20 p-r-20 p-b-20">
                                        <p class="bold">No of users</p>

                                        <p>2 <span class="m-l-10"><i class="fa fa-sort-desc"></i> </span>
                                        </p>

                                        <p class="bold p-t-15">Customers</p>

                                        <p>0 <span class="m-l-10"><i class="fa fa-sort-desc"></i> 1%</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="slide-back ha tiles light-red">
                            <div class="p-t-20 p-l-20 p-r-20 p-b-20">
                                <h5 class="text-white semi-bold no-margin p-b-5">No of Users Online</h5>

                                <h3 class="text-white no-margin">1 <span class="semi-bold">users</span></h3> online
                            </div>
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
                    <div class="live-tile tiles slide ha " data-speed="750" data-delay="1000" data-mode="carousel">
                        <div class="slide-front ha tiles adjust-text orange">
                            <div class="p-t-20 p-l-20 p-r-20 p-b-20"><i class="fa fa-map-marker fa-2x"></i>

                                <p class="text-white-opacity p-t-10"> {{ date('l jS \of F Y ');}}</p>

                                <h3 class="text-white">SERVER:</h3>

                                <p class="p-t-10">{{ $_SERVER['SERVER_SIGNATURE']}} </p>

                                <h3 class="no-margin light-x">Details</h3>

                                <p class="p-t-20 "><span class="bold">Laravel ver: </span>{{$app::VERSION}}</p></div>
                        </div>
                        <div class="slide-back ha tiles adjust-text g">
                            <div class="p-t-20 p-l-20 p-r-20 p-b-20"><i class="fa fa-map-marker fa-2x"></i>

                                <p class="text-white-opacity p-t-10"> {{ date('l jS \of F Y ');}}</p>

                                <h3 class="text-white">SERVER:</h3>

                                <p class="p-t-10">{{ $_SERVER['SERVER_SIGNATURE']}} </p>

                                <h3 class="no-margin light-x">Details</h3>

                                <p class="p-t-10"><span class="bold">PHP-Ver: </span> {{phpversion()}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END ANIMATED TILE -->
            </div>
        </div>

        <div class="col-md-6 col-vlg-4 col-sm-12">
            <div class="row ">

                <!-- BEGIN ANIMATED TILE -->
                <div class="col-md-12 col-sm-6 m-b-20" data-aspect-ratio2="true">
                    <div class="live-tile slide ha " data-speed="750" data-delay="5000" data-mode="carousel">
                        <div class="slide-front ha tiles green ">
                            <div class="overlayer middle-left fullwidth">
                                <div class="overlayer-wrapper">
                                    <div class="tiles transparents p-l-20 p-r-20 p-b-20 p-t-20">
                                        <h1 class="text-white semi-bold no-margin">TICKET MANAGER </h1>
                                        <h5 class="text-white semi-bold ">Status</h5>

                                        <p class="text-white semi-bold no-margin"><i class="icon-custom-up "></i> Read
                                            More</p>
                                    </div>
                                </div>
                            </div>
                            <img src="/assets/img/photo_customercare.jpg" alt=""
                                 class="image-responsive-width xs-image-responsive-width"></div>
                        <div class="slide-back ha tiles green adjust-text">
                            <img src="/assets/img/office_blur.jpg" alt=""
                                 class="image-responsive-width xs-image-responsive-width">

                            <div class="overlayer middle-left fullwidth">
                                <div class="overlayer-wrapper">
                                    <div class="tiles transparents p-l-20 p-r-20 p-b-20 p-t-20">

                                        <h1 class="text-white semi-bold no-margin">TICKET MANAGER</h1>

                                        <p class="text-white semi-bold no-margin"><i class="icon-custom-up "></i> Read
                                            More</p>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- END ANIMATED TILE -->


            </div>


        </div>


    </div>   <!-- END ROW -->



@stop
