<header class="header">
        <a href="/admin/dashboard" class="logo">
            <img src="/img/uploaded/logo/{{ $corp_name->basic_photo }}" style="height:20px;width:40px;float:right;margin-top:17px;margin-left:3px;"></div>
            <p style="color:white;float:right;">{{$corp_name->org_spec}} {{$corp_name->org_name}}</p>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <div class="navbar-coll">
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <div class="responsive_nav"></div>
                </a>
            </div>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    
                    
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="riot">
                                <div class="pro-align">
                                    Admin
                                    <span>
                                        <i class="caret"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header bg-light-blue">
                                <img data-src="holder.js/90x90/#fff:#000" class="img-responsive img-circle" alt="User Image">
                                <p class="topprofiletext">مدير النظام</p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div>
                                    <a href="/admin/logout">
                                        <i class="livicon" data-name="sign-out" data-s="18"></i>
                                        خروج
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>