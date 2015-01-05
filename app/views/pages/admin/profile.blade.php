@extends('layout.master')
@section('head')


{{ HTML::style('/css/admin.css') }}
{{ HTML::style('/js/metro/MetroJs.css') }}










@stop
@section('body')

<body id="bodyskin" class="skin-black fixed">
  <div id="overlay2"></div>   <!-- header logo: style can be found in header.less -->
    <header class="header">
           
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">


                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                
                
                <div class="navbar-right">
                    <ul class="nav navbar-nav">

                        
                           <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages {{"wdwe"}}</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="img/avatar3.png" class="img-circle" alt="User Image"/>
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li><!-- end message -->
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="img/avatar2.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    AdminLTE Design Team
                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="img/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Developers
                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="img/avatar2.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Sales Department
                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="img/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Reviewers
                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">




                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>root                              <i class="caret"></i></span>
                            </a>
  
  
                            <ul class="dropdown-menu">


                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    
                                    <p>
                                        root<small>Administrator</small>                                        
                                    </p>
                                </li>
                                
                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    
                                    <div class="pull-right">
                                        <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>


                <div class="navbar-right">
                    <ul id="searchnav" class="nav navbar-nav">
    <li class="search" id="search"><a href="#">Search</a><input type="text" placeholder="Enter search term" /></li>
    </div>


            </nav>
        </header>    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

         
            

   
    

       
        <!-- sidebar vhvjh -->
        <ul class="sidebar-menu">



            <li id="dash" >
                <a href="index.php">
                    <span>Home</span><i id="sp" class="fa fa-home pull-right"></i> 
                </a>
            </li>
            <li id="usertree" class="treeview">
                <a href="">
                     <span>User Manager</span><i id="sp" class="fa fa-th pull-right"> </i><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu" >
                    <li id="usersubtree" ><a href="index.php?page=usermanage"><i class="fa fa-angle-double-right"></i>Manage</a></li>
                    <li id="addstudent" ><a href="#"><i class="fa fa-angle-double-right"></i>Add Student Account<i class="fa pull-right">S</i></a></li>
                    <li id="addstaff" ><a href="index.php?page=addstaff"><i class="fa fa-angle-double-right"></i>Add Staff Account</a></li>
                    <li id="addadmin" ><a href="index.php?page=addadmin"><i class="fa fa-angle-double-right"></i>Add Administrator Account</a></li>
                </ul>
            </li>
            <li id="damtree" class="treeview">
                <a href="">
                     <span>Disciplinary Action</span><i id="sp" class="fa fa-edit pull-right"></i> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu" >
                    <li id="dam_manage" ><a href="index.php?page=dam_manage"><i class="fa fa-angle-double-right"></i>Manage</a></li>
                    <li id="dam_reg" ><a href="index.php?page=dam_reg"><i class="fa fa-angle-double-right"></i>Register</a></li>
                    
                </ul>
            </li>
            

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
 <script> document.getElementById('dash').className = 'active'</script>
<aside class="right-side">
                <!-- Content Header (Page header) -->
             
               <div id="portlet-config" class="modal hide">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button"></button>
      <h3>Widget Settings</h3>
    </div>
    <div class="modal-body"> Widget settings form goes here </div>
  </div>
  <div class="clearfix"></div>
   <div class="content">
 <div class="row" >
    
      <div class="col-md-6 col-vlg-4 col-sm-12">
        <div class="row " >
          <!-- BEGIN ANIMATED TILE -->
          <div class="col-md-6 col-sm-6 m-b-20"  data-aspect-ratio="true">
            <div class="live-tile tiles slide ha " data-speed="750" data-delay="3000" data-mode="carousel">
              <div class="slide-front ha tiles adjust-text">
                <div class="p-t-20 p-l-20 p-r-20 p-b-20"> <i class="fa fa-map-marker fa-2x"></i>
                  <p class="text-white-opacity p-t-10">21 Jan</p>
                  <h3 class="text-white no-margin">New Year <span class="semi-bold">UI Bundle <br>
                    </span> now on webarch</h3>
                  <p class="p-t-20 "><span class="bold">214</span> Comments <span class="m-l-10 bold">24k</span> Likes</p>
                </div>
              </div>
              <div class="slide-back ha tiles adjust-text">
                <div class="p-t-20 p-l-20 p-r-20 p-b-20"> <i class="fa fa-map-marker fa-2x"></i>
                  <p class="text-white-opacity p-t-10">21 Jan</p>
                  <h3 class="text-white no-margin">New Year <span class="semi-bold">UI Bundle <br>
                    </span> now on webarch</h3>
                  <p class="p-t-20 "><span class="bold">214</span> Comments <span class="m-l-10 bold">24k</span> Likes</p>
                </div>
              </div>
            </div>
          </div>
          <!-- END ANIMATED TILE -->
          <!-- BEGIN ANIMATED TILE -->
          <div class="col-md-6 col-sm-6 m-b-20" data-aspect-ratio="true">
            <div class="live-tile tiles full-height slide ha " data-speed="750" data-delay="4000" data-mode="carousel">
              <div class="slide-front ha tiles blue ">
                <div class="p-t-20 p-l-20 p-r-20 p-b-20">
                  <h4 class="text-white">“Just <span class="semi-bold">Completed</span> the <span class="semi-bold">Heart walk</span> advertiing 
                    campaign”</h4>
                </div>
                <div class="overlayer fullwidth">
                  <div class="overlayer-wrapper">
                    <div class="user-comment-wrapper">
                      <div class="profile-wrapper"> <img src="assets/img/profiles/avatar_small.jpg" alt="" data-src="assets/img/profiles/avatar_small.jpg" data-src-retina="assets/img/profiles/avatar_small2x.jpg" width="35" height="35"> </div>
                      <div class="comment">
                        <div class="user-name text-white "><span class="bold"> David</span> Cooper </div>
                        <p class="text-white-opacity">@ Revox</p>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="slide-back ha blue reltive1">
                <div class="user-comment-wrapper m-t-20">
                  <div class="profile-wrapper"> <img src="assets/img/profiles/d.jpg" alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35"> </div>
                  <div class="comment">
                    <div class="user-name text-white "><span class="bold"> Jane</span> Smith </div>
                    <p class="text-white-opacity">@ Revox</p>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="overlayer bottom-left fullwidth">
                  <div class="overlayer-wrapper">
                    <div class="p-t-20 p-l-20 p-r-20 p-b-20">
                      <h4 class="text-white no-margin custom-line-height">“Just <span class="semi-bold">Completed</span> the <span class="semi-bold">Heart walk</span> adverting 
                        campaign”</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END ANIMATED TILE -->
        </div>
        <div class="row">
          
          <!-- BEGIN ANIMATED TILE -->
          <div class="col-md-6 col-sm-6 m-b-20"  data-aspect-ratio="true">
            <div class="live-tile slide ha " data-speed="750" data-delay="6000" data-mode="carousel"  >
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
          <!-- BEGIN ANIMATED TILE -->
          <div class="col-md-6 col-sm-6 m-b-20" data-aspect-ratio="true">
            <div class="live-tile slide ha" data-speed="750" data-delay="4500" data-mode="carousel">
              <div class="slide-front ha tiles green p-t-20 p-l-20 p-r-20 p-b-20">
                <h1 class="semi-bold text-white">15% <i class="icon-custom-up icon-custom-2x"></i></h1>
                <div class="overlayer bottom-left fullwidth">
                  <div class="overlayer-wrapper">
                    <div class="p-t-20 p-l-20 p-r-20 p-b-20">
                      <p class="bold">Webarch Dashboard</p>
                      <p >2,567 USD <span class="m-l-10"><i class="fa fa-sort-desc"></i> 2%</span></p>
                      <p class="bold p-t-15">Front-end Design</p>
                      <p >1,420 USD <span class="m-l-10"><i class="fa fa-sort-desc"></i> 1%</span></p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="slide-back ha tiles green">
                <div class="p-t-20 p-l-20 p-r-20 p-b-20">
                  <h5 class="text-white semi-bold no-margin p-b-5">Today Sale's</h5>
                  <h3 class="text-white no-margin">450 <span class="semi-bold">USD</span></h3>
                  Last Sale 23.45 USD </div>
                <div class="overlayer bottom-left fullwidth">
                  <div class="overlayer-wrapper">
                    <div id="sales-sparkline"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END ANIMATED TILE -->
        </div>
   
     
    </div>
   </div>


               </div>
			
               
            </aside><!-- /.right-side -->
             <!--script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script-->
    
    </div><!-- ./wrapper -->

    <!-- add new calendar event modal -->



  
   

    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                    </div>
    </div>







{{HTML::script('js/app.js')}}
 {{HTML::script('js/metro/MetroJs.min.js')}} 
 

<script type="text/javascript">
        $(document).ready(function () {
            $(".live-tile,.flip-list").liveTile();
        });     

</script>
  



@stop