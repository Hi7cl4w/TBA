   <aside class="left-side sidebar-offcanvas animated slideInLeft">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->


        <!-- sidebar vhvjh -->
        <ul class="sidebar-menu">



            <li id="dash" >
                <a href="{{{ URL::to('/profile/'.$user->username) }}}">
                    <span>Home</span><i id="sp" class="fa fa-home pull-right"></i>
                </a>
            </li>
            <li id="tickettree" class="treeview">
                <a href="">
                     <span>Tickets</span><i id="sp" class="fa fa-th pull-right"> </i><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu" >
                    <li id="ticketcreate" ><a href="{{{ URL::to('/profile/'.$user->username.'/ticket/create') }}}"><i class="fa fa-angle-double-right"></i>Create<i class="fa pull-right">C</i></a></li>
                    <li id="view" ><a href="{{{ URL::to('/profile/'.$user->username.'/ticket') }}}"><i class="fa fa-angle-double-right"></i>View<i class="fa pull-right">V</i></a></li>

                </ul>
            </li>
            <li id="producttree" class="treeview">
                <a href="{{{ URL::to('/profile/'.$user->username.'/products') }}}">
                     <span>Products</span><i id="sp" class="fa fa-edit pull-right"></i> </a>
                <ul class="treeview-menu" >
                    <li id="productreg" ><a href="{{{ URL::to('/profile/'.$user->username.'/products/register') }}}"><i class="fa fa-angle-double-right"></i>Create<i class="fa pull-right">C</i></a></li>
                    <li id="productview" ><a href="{{{ URL::to('/profile/'.$user->username.'/products') }}}"><i class="fa fa-angle-double-right"></i>View<i class="fa pull-right">V</i></a></li>

                </ul>
            </li>
            <li id="purchasetree" class="treeview">
                <a href="">
                    <span>Purchases</span><i id="sp" class="fa fa-th pull-right"> </i><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu" >
                    <li id="ticketcreate" ><a href="{{{ URL::to('/profile/'.$user->username.'/purchases') }}}"><i class="fa fa-angle-double-right"></i>View all<i class="fa pull-right">V</i></a></li>
                    <li id="view" ><a href="{{{ URL::to('/profile/'.$user->username.'/purchases/create') }}}"><i class="fa fa-angle-double-right"></i>Register a Purchase<i class="fa pull-right">R</i></a></li>

                </ul>
            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
