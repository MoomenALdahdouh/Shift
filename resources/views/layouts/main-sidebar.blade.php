<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('main-sidebar-trans.Dashboard')}}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="index.html">Dashboard 01</a> </li>
                            <li> <a href="index-02.html">Dashboard 02</a> </li>
                            <li> <a href="index-03.html">Dashboard 03</a> </li>
                            <li> <a href="index-04.html">Dashboard 04</a> </li>
                            <li> <a href="index-05.html">Dashboard 05</a> </li>
                        </ul>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components </li>
                    <!-- menu item Elements-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">Header Management</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ url('Halls-menu')}}">Halls menu </a></li>
                        </ul>
                    </li>
                    <!-- menu item todo-->
                    <!--TODO::MOOEMN ROUTE-->
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/' . $page='events') }}"><i class="ti-menu-alt"></i>Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("halls")}}"><i class="ti-menu-alt"></i>Halls</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("agents")}}"><i class="ti-menu-alt"></i>Agents</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("partners")}}"><i class="ti-menu-alt"></i>Partners</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("managers")}}"><i class="ti-menu-alt"></i>Managers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("providers")}}"><i class="ti-menu-alt"></i>Providers</a>
                    </li>
                    <!--TODO::END MOOMEN ROUT-->
                    <li>
                        <a href="{{ url('/' . $page='slider') }}"><i class="ti-menu-alt"></i><span class="right-nav-text">Slider</span> </a>
                    </li>
                    <!-- menu item chat-->
                    <li>
                        <a href="{{ url('/' . $page='pages') }}"><i class="ti-comments"></i><span class="right-nav-text">Pages
                            </span></a>
                    </li>
                    <!-- menu item mailbox-->
                    <li>
                        <a href="{{ url('/' . $page='SEO-Page') }}"><i class="ti-email"></i><span class="right-nav-text">SEO
                                box</span> <span class="badge badge-pill badge-warning float-right mt-1">HOT</span> </a>
                    </li>

                    <!-- menu item Top Management-->
                    <li>
                        <a href="{{ url('/' . $page='Top-Management') }}"><i class="ti-comments"></i><span class="right-nav-text">Top Management
                            </span></a>
                    </li>

                    <!-- menu item social media-->
                    <li>
                        <a href="{{ url('/' . $page='getNotification') }}"><i class="ti-comments"></i><span class="right-nav-text">Get Notification
                            </span></a>
                    </li>

                    <!-- menu item Elements-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#users">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">users</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="users" class="collapse" data-parent="#sidebarnav">
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'users')) }}">User List</a></li>
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'roles')) }}">User Permissions</a></li>

                        </ul>
                    </li>

                    <!-- menu item social media-->
                    <li>
                        <a href="{{ url('/' . $page='socialmedia') }}"><i class="ti-comments"></i><span class="right-nav-text">social media
                            </span></a>
                    </li>




                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Widgets, Forms & Tables </li>
                    <!-- menu item Widgets-->
                    <li>
                        <a href="widgets"><i class="ti-blackboard"></i><span class="right-nav-text">Widgets</span>
                            <span class="badge badge-pill badge-danger float-right mt-1">59</span> </a>
                    </li>
                    <!-- menu item Form-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
                            <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">Form &
                                    Editor</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Form" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="editor.html">Editor</a> </li>
                            <li> <a href="editor-markdown.html">Editor Markdown</a> </li>
                            <li> <a href="form-input.html">Form input</a> </li>
                            <li> <a href="form-validation-jquery.html">form validation jquery</a> </li>
                            <li> <a href="form-wizard.html">form wizard</a> </li>
                            <li> <a href="form-repeater.html">form repeater</a> </li>
                            <li> <a href="input-group.html">input group</a> </li>
                            <li> <a href="toastr.html">toastr</a> </li>
                        </ul>
                    </li>
                    <!-- menu item table -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#table">
                            <div class="pull-left"><i class="ti-layout-tab-window"></i><span class="right-nav-text">data
                                    table</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="table" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="data-html-table.html">Data html table</a> </li>
                            <li> <a href="data-local.html">Data local</a> </li>
                            <li> <a href="data-table.html">Data table</a> </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
