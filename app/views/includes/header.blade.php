  <header class="header  animated fadeInDown">
           
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <span class="dropdown sidebar-toggle"><i class="mdi-navigation-menu" data-toggle="offcanvas"></i></span>

                <!-- Sidebar toggle button-->

                
                <div class="navbar-right">
                    <ul class="nav navbar-nav">

                        

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">




                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>{{$user->username}}
                                                              <i class="caret"></i></span>
                            </a>
  
  
                            <ul class="dropdown-menu">


                                <!-- User image -->
                                <li class="user-header">
                                    
                                    <p>{{$user->fname}} <strong>{{$user->lname}}</strong>
                                        <small>Administrator</small>
                                    </p>
                                </li>
                                
                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    
                                    <div class="pull-right">
                                        <a href="/logout" class="btn btn-danger">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>


                </nav>
        </header> 