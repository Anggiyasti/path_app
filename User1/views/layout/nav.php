<!-- START Template Header -->
        <header id="header" class="navbar navbar-fixed-top">
            <!-- START navbar header -->
            <div class="navbar-header">
                <!-- Brand -->
                <a class="navbar-brand" href="javascript:void(0);">
                    <span class="logo-figure"></span>
                    <span class="logo-text"></span>
                </a>
                <!--/ Brand -->
            </div>
            <!--/ END navbar header -->

                <!-- START Toolbar -->
            <div class="navbar-toolbar clearfix">
                <!-- START Left nav -->
                <ul class="nav navbar-nav navbar-left">
                    <!-- Sidebar shrink -->
                    <li class="hidden-xs hidden-sm">
                        <a href="javascript:void(0);" class="sidebar-minimize" data-toggle="minimize" title="Minimize sidebar">
                            <span class="meta">
                                <span class="icon"></span>
                            </span>
                        </a>
                    </li>
                    <!--/ Sidebar shrink -->

                    <!-- Offcanvas left: This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior -->
                    <li class="navbar-main hidden-lg hidden-md hidden-sm">
                        <a href="javascript:void(0);" data-toggle="sidebar" data-direction="ltr" rel="tooltip" title="Menu sidebar">
                            <span class="meta">
                                <span class="icon"><i class="ico-paragraph-justify3"></i></span>
                            </span>
                        </a>
                    </li>
                    <!--/ Offcanvas left -->

                    <!-- Message dropdown -->
                    <li class="dropdown custom" id="header-dd-message">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="meta">
                                <span class="icon"><i class="ico-bubbles3"></i></span>
                            </span>
                        </a>

                        <!-- mustache template: used for update the `.media-list` requested from server-side -->
                        <script class="mustache-template" type="x-tmpl-mustache">
                        
                            {{#data}}
                            <a href="<?php echo base_url('assets/adminre/page-message-rich.html"')?> class="media border-dotted new">
                                <span class="pull-left">
                                    <img src="<?php echo base_url('assets/adminre/image/avatar/{{picture}}')?>" class="media-object img-circle" alt="">
                                </span>
                                <span class="media-body">
                                    <span class="media-heading">{{name}}</span>
                                    <span class="media-text ellipsis nm">{{text}}</span>

                                    {{#meta.star}}<span class="media-meta"><i class="ico-star3"></i></span>{{/meta.star}}
                                    {{#meta.reply}}<span class="media-meta"><i class="ico-reply"></i></span>{{/meta.reply}}
                                    {{#meta.attachment}}<span class="media-meta"><i class="ico-attachment"></i></span>{{/meta.attachment}}
                                    <span class="media-meta pull-right">{{meta.time}}</span>
                                </span>
                            </a>
                            {{/data}}
                        
                        </script>
                        <!--/ mustache template -->

                        <!-- Dropdown menu -->
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-header">
                                <span class="title">Messages <span class="count"></span></span>
                                <span class="option text-right"><a href="javascript:void(0);">New message</a></span>
                            </div>
                            <div class="dropdown-body slimscroll">
                                <!-- Search form -->
                                <form class="form-horizontal" action="">
                                    <div class="has-icon">
                                        <input type="text" class="form-control" placeholder="Search message...">
                                        <i class="ico-search form-control-icon"></i>
                                    </div>
                                </form>
                                <!--/ Search form -->

                                <!-- indicator -->
                                <div class="indicator inline"><span class="spinner"></span></div>
                                <!--/ indicator -->

                                <!-- Message list -->
                                <div class="media-list">
                                    <a href="<?php echo base_url('assets/adminre/gh_backend/page-message-rich.html')?>" class="media border-dotted read">
                                        <span class="pull-left">
                                            <img src="<?php echo base_url('assets/adminre/image/avatar/avatar1.jpg')?>" class="media-object img-circle" alt="">
                                        </span>
                                        <span class="media-body">
                                            <span class="media-heading">Martina Poole</span>
                                            <span class="media-text ellipsis nm">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta"><i class="ico-reply"></i></span>
                                            <span class="media-meta"><i class="ico-attachment"></i></span>
                                            <span class="media-meta pull-right">20m</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="<?php echo base_url('assets/adminre/gh_backend/page-message-rich.html')?>" class="media border-dotted read">
                                        <span class="pull-left">
                                            <img src="<?php echo base_url('assets/adminre/image/avatar/avatar3.jpg')?>" class="media-object img-circle" alt="">
                                        </span>
                                        <span class="media-body">
                                            <span class="media-heading">Walter Foster</span>
                                            <span class="media-text ellipsis nm">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta"><i class="ico-attachment"></i></span>
                                            <span class="media-meta pull-right">21h</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="<?php echo base_url('assets/adminre/gh_backend/page-message-rich.html')?>" class="media border-dotted read">
                                        <span class="pull-left">
                                            <img src="<?php echo base_url('assets/adminre/image/avatar/avatar4.jpg')?>" class="media-object img-circle" alt="">
                                        </span>
                                        <span class="media-body">
                                            <span class="media-heading">Callum Santosr</span>
                                            <span class="media-text ellipsis nm">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta pull-right">1d</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="<?php echo base_url('assets/adminre/gh_backend/page-message-rich.html')?>" class="media border-dotted read">
                                        <span class="pull-left">
                                            <img src="<?php echo base_url('assets/adminre/image/avatar/avatar5.jpg')?>" class="media-object img-circle" alt="">
                                        </span>
                                        <span class="media-body">
                                            <span class="media-heading">Noelani Blevins</span>
                                            <span class="media-text ellipsis nm">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta pull-right">2d</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="<?php echo base_url('assets/adminre/gh_backend/page-message-rich.html')?>" class="media border-dotted read">
                                        <span class="pull-left">
                                            <img src="<?php echo base_url('assets/adminre/image/avatar/avatar8.jpg')?>" class="media-object img-circle" alt="">
                                        </span>
                                        <span class="media-body">
                                            <span class="media-heading">Carl Johnson</span>
                                            <span class="media-text ellipsis nm">Curabitur consequat, lectus sit amet luctus vulputate, nisi sem</span>
                                            <!-- meta icon -->
                                            <span class="media-meta"><i class="ico-attachment"></i></span>
                                            <span class="media-meta pull-right">2w</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="page-message-rich.html" class="media border-dotted read">
                                        <span class="pull-left">
                                            <img src="<?php echo base_url('assets/adminre/image/avatar/avatar9.jpg')?>" class="media-object img-circle" alt="">
                                        </span>
                                        <span class="media-body">
                                            <span class="media-heading">Tamara Moon</span>
                                            <span class="media-text ellipsis nm">Aliquam ultrices iaculis odio. Nam interdum enim non nisi. Aenean eget metus.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta"><i class="ico-attachment"></i></span>
                                            <span class="media-meta pull-right">2w</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>
                                </div>
                                <!--/ Message list -->
                            </div>
                        </div>
                        <!--/ Dropdown menu -->
                    </li>
                    <!--/ Message dropdown -->

                    <!-- Notification dropdown -->
                    <li class="dropdown custom" id="header-dd-notification">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="meta">
                                <span class="icon"><i class="ico-bell"></i></span>
                                <span class="hasnotification hasnotification-danger"></span>
                            </span>
                        </a>

                        <!-- mustache template: used for update the `.media-list` requested from server-side -->
                        <script class="mustache-template" type="x-tmpl-mustache">
                        
                            {{#data}}
                            <a href="javascript:void(0);" class="media border-dotted new">
                                <span class="media-object pull-left">
                                    <i class="{{icon}}"></i></span>
                                <span class="media-body">
                                    <span class="media-text">{{{text}}}</span>
                                    <span class="media-meta pull-right">{{meta.time}}</span>
                                </span>
                            </a>
                            {{/data}}
                        
                        </script>
                        <!--/ mustache template -->

                        <!-- Dropdown menu -->
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-header">
                                <span class="title">Notification <span class="count"></span></span>
                                <span class="option text-right"><a href="javascript:void(0);">Clear all</a></span>
                            </div>
                            <div class="dropdown-body slimscroll">
                                <!-- indicator -->
                                <div class="indicator inline"><span class="spinner"></span></div>
                                <!--/ indicator -->

                                <!-- Message list -->
                                <div class="media-list">
                                    <a href="javascript:void(0);" class="media read border-dotted">
                                        <span class="media-object pull-left">
                                            <i class="ico-basket2 bgcolor-info"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="media-text">Duis aute irure dolor in <span class="text-primary semibold">reprehenderit</span> in voluptate.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta pull-right">2d</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="javascript:void(0);" class="media read border-dotted">
                                        <span class="media-object pull-left">
                                            <i class="ico-call-incoming"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="media-text">Aliquip ex ea commodo consequat.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta pull-right">1w</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="javascript:void(0);" class="media read border-dotted">
                                        <span class="media-object pull-left">
                                            <i class="ico-alarm2"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="media-text">Excepteur sint <span class="text-primary semibold">occaecat</span> cupidatat non.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta pull-right">12w</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="javascript:void(0);" class="media read border-dotted">
                                        <span class="media-object pull-left">
                                            <i class="ico-checkmark3 bgcolor-success"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="media-text">Lorem ipsum dolor sit amet, <span class="text-primary semibold">consectetur</span> adipisicing elit.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta pull-right">14w</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>
                                </div>
                                <!--/ Message list -->
                            </div>
                        </div>
                        <!--/ Dropdown menu -->
                    </li>
                    <!--/ Notification dropdown -->

                    <!-- Search form toggler  -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="dropdown" data-target="#dropdown-form">
                            <span class="meta">
                                <span class="icon"><i class="ico-search"></i></span>
                            </span>
                        </a>
                    </li>
                    <!--/ Search form toggler -->
                </ul>
                <!--/ END Left nav -->

                <!-- START navbar form -->
                <div class="navbar-form navbar-left dropdown" id="dropdown-form">
                    <form action="" role="search">
                        <div class="has-icon">
                            <input type="text" class="form-control" placeholder="Search application...">
                            <i class="ico-search form-control-icon"></i>
                        </div>
                    </form>
                </div>
                <!-- START navbar form -->

                <!-- START Right nav -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Profile dropdown -->
                    <li class="dropdown profile">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="meta">
                                <span class="avatar"><img src="<?php echo base_url('assets/adminre/image/avatar/avatar7.jpg')?>" class="img-circle" alt="" /></span>
                                <span class="text hidden-xs hidden-sm pl5">Erich Reyes</span>
                                <span class="caret"></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="pa15">
                                <h5 class="semibold hidden-xs hidden-sm">
                                    <p class="nm">60%</p>
                                    <small class="text-muted">Profile complete</small>
                                </h5>
                                <h5 class="semibold hidden-md hidden-lg">
                                    <p class="nm">Erich Reyes</p>
                                    <small class="text-muted">60% Profile complete</small>
                                </h5>
                                <div class="progress progress-xs nm mt10">
                                    <div class="progress-bar progress-bar-warning" style="width: 60%">
                                        <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li><a href="javascript:void(0);"><span class="icon"><i class="ico-user-plus2"></i></span> My Accounts</a></li>
                            <li><a href="javascript:void(0);"><span class="icon"><i class="ico-cog4"></i></span> Profile Setting</a></li>
                            <li><a href="javascript:void(0);"><span class="icon"><i class="ico-question"></i></span> Help</a></li>
                            <li class="divider"></li>
                            <li><a href="javascript:void(0);"><span class="icon"><i class="ico-exit"></i></span> Sign Out</a></li>
                        </ul>
                    </li>
                    <!-- Profile dropdown -->

                    <!-- Offcanvas right This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior -->
                    <li class="navbar-main">
                        <a href="javascript:void(0);" data-toggle="sidebar" data-direction="rtl" rel="tooltip" title="Feed / contact sidebar">
                            <span class="meta">
                                <span class="icon"><i class="ico-users3"></i></span>
                            </span>
                        </a>
                    </li>
                    <!--/ Offcanvas right -->
                </ul>
                <!--/ END Right nav -->
            </div>
            <!--/ END Toolbar -->
        </header>
        <!--/ END Template Header -->
        <!-- START Template Sidebar (Left) -->
        <aside class="sidebar sidebar-left sidebar-menu">
            <!-- START Sidebar Content -->
            <section class="content slimscroll">
                <h5 class="heading">Main Menu</h5>
                <!-- START Template Navigation/Menu -->
                <ul class="topmenu topmenu-responsive" data-toggle="menu">
                    <li >
                        <a href="<?php echo base_url('assets/adminre/gh_frontend')?>">
                            <span class="figure"><i class="ico-trophy"></i></span>
                            <span class="text">Bank Soal</span>
                        </a>
                    </li>
                    <li class="active open">
                        <a href="javascript:void(0);" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-home2"></i></span>
                            <span class="text">Dashboard</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="dashboard" class="submenu collapse in">
                            <li class="submenu-header ellipsis">Dashboard</li>
                            <li class="active">
                                <a href="<?php echo base_url('assets/adminre/gh_backend/index.html')?>">
                                    <span class="text">Version 1</span>
                                    <span class="number"><span class="label label-danger">10</span></span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url('assets/adminre/gh_backend/dashboard-v2.html')?>">
                                    <span class="text">Version 2</span>
                                </a>
                            </li>
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>
                    <li >
                        <a href="javascript:void(0);" data-target="#components" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-screwdriver"></i></span>
                            <span class="text">Bank Soal</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="components" class="submenu collapse ">
                            <li class="submenu-header ellipsis">Bank Soal</li>
                            <li >
                                <a href="<?php echo base_url('index.php/banksoal/daftarsoal')?>">
                                    <span class="text">Tampil Soal</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url('assets/adminre/gh_backend/component-typography.html')?>">
                                    <span class="text">Typography</span>
                                </a>
                            </li>
                            
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>
                    <li >
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#form" data-parent=".topmenu">
                            <span class="figure"><i class="ico-quill2"></i></span>
                            <span class="text">Forms</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="form" class="submenu collapse ">
                            <li class="submenu-header ellipsis">Forms</li>
                            <li >
                                <a href="<?php echo base_url('assets/adminre/gh_backend/form-element.html')?>">
                                    <span class="text">Element</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url('assets/adminre/gh_backend/form-layout.html')?>">
                                    <span class="text">Layout</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url('assets/adminre/gh_backend/form-validation.html')?>">
                                    <span class="text">Validation</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url('assets/adminre/gh_backend/form-wizard.html')?>">
                                    <span class="text">Wizard</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url('assets/adminre/gh_backend/form-wysiwyg.html')?>">
                                    <span class="text">WYSIWYG Editor</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url('assets/adminre/gh_backend/form-ajax.html')?>">
                                    <span class="text">Ajax</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url('assets/adminre/gh_backend/form-xeditable.html')?>">
                                    <span class="text">X-editable</span>
                                </a>
                            </li>
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>
                    <li >
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#table" data-parent=".topmenu">
                            <span class="figure"><i class="ico-table22"></i></span>
                            <span class="text">Tables</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="table" class="submenu collapse ">
                            <li class="submenu-header ellipsis">Tables</li>
                            <li >
                                <a href="table-default.html">
                                    <span class="text">Default</span>
                                </a>
                            </li>
                            <li>
                                <a href="table-datatable.html">
                                    <span class="text">Datatable</span>
                                </a>
                            </li>
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>
                    <li >
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#page" data-parent=".topmenu">
                            <span class="figure"><i class="ico-file6"></i></span>
                            <span class="text">Pages</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="page" class="submenu collapse ">
                            <li class="submenu-header ellipsis">Pages</li>
                            <li >
                                <a href="<?php echo base_url('assets/adminre/gh_backend/page-starter.html')?>">
                                    <span class="text">Blank / starter</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url('assets/adminre/gh_backend/page-calendar.html')?>">
                                    <span class="text">Calendar</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url('assets/adminre/gh_backend/page-profile.html')?>">
                                    <span class="text">Profile</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url('assets/adminre/gh_backend/page-login.html')?>">
                                    <span class="text">Login</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url('assets/adminre/gh_backend/page-login-returned.html')?>">
                                    <span class="text">Returned login</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url('assets/adminre/gh_backend/page-register.html')?>">
                                    <span class="text">Register</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url('assets/adminre/gh_backend/age-people-directory.html')?>">
                                    <span class="text">People directory</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url('assets/adminre/gh_backend/page-invoice.html')?>">
                                    <span class="text">Invoice</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url('assets/adminre/gh_backend/page-faq.html')?>">
                                    <span class="text">FAQ</span>
                                </a>
                            </li>
                            <li >
                                <a href="javascript:void(0);" data-toggle="submenu" data-target="#timeline" data-parent="#page">
                                    <span class="text">Timeline</span>
                                    <span class="arrow"></span>
                                </a>
                                <!-- START 2nd Level Menu -->
                                <ul id="timeline" class="submenu collapse ">
                                    <li >
                                        <a href="<?php echo base_url('assets/adminre/gh_backend/page-timeline-v1.html')?>"><span class="text">Version 1</span></a>
                                    </li>
                                    <li >
                                        <a href="<?php echo base_url('assets/adminre/gh_backend/page-timeline-v2.html')?>"><span class="text">Version 2</span></a>
                                    </li>
                                </ul>
                                <!--/ END 2nd Level Menu -->
                            </li>
                            <li >
                                <a href="javascript:void(0);" data-toggle="submenu" data-target="#error" data-parent="#page">
                                    <span class="text">Error</span>
                                    <span class="arrow"></span>
                                </a>
                                <!-- START 2nd Level Menu -->
                                <ul id="error" class="submenu collapse ">
                                    <li >
                                        <a href="<?php echo base_url('assets/adminre/gh_backend/page-error-404.html')?>"><span class="text">Not Found (404)</span></a>
                                    </li>
                                    <li >
                                        <a href="<?php echo base_url('assets/adminre/gh_backend/page-error-403.html')?>"><span class="text">Forbidden (403)</span></a>
                                    </li>
                                    <li >
                                        <a href="<?php echo base_url('assets/adminre/gh_backend/page-error-500.html')?>"><span class="text">Server Error (500)</span></a>
                                    </li>
                                </ul>
                                <!--/ END 2nd Level Menu -->
                            </li>
                            <li >
                                <a href="javascript:void(0);" data-toggle="submenu" data-target="#media" data-parent="#page">
                                    <span class="text">Media</span>
                                    <span class="arrow"></span>
                                </a>
                                <!-- START 2nd Level Menu -->
                                <ul id="media" class="submenu collapse ">
                                    <li >
                                        <a href="<?php echo base_url('assets/adminre/gh_backend/page-media-album.html')?>"><span class="text">Media album</span></a>
                                    </li>
                                    <li >
                                        <a href="<?php echo base_url('assets/adminre/gh_backend/page-media-gallery.html')?>"><span class="text">Media gallery</span></a>
                                    </li>
                                </ul>
                                <!--/ END 2nd Level Menu -->
                            </li>
                            <li >
                                <a href="javascript:void(0);" data-toggle="submenu" data-target="#message" data-parent="#page">
                                    <span class="text">Message</span>
                                    <span class="arrow"></span>
                                </a>
                                <!-- START 2nd Level Menu -->
                                <ul id="message" class="submenu collapse ">
                                    <li >
                                        <a href="<?php echo base_url('assets/adminre/gh_backend/page-message-bubble.html')?>"><span class="text">Bubble message</span></a>
                                    </li>
                                    <li >
                                        <a href="<?php echo base_url('assets/adminre/gh_backend/page-message-rich.html')?>"><span class="text">Rich message</span></a>
                                    </li>
                                </ul>
                                <!--/ END 2nd Level Menu -->
                            </li>
                            <li >
                                <a href="javascript:void(0);" data-toggle="submenu" data-target="#email" data-parent="#page">
                                    <span class="text">Email</span>
                                    <span class="arrow"></span>
                                </a>
                                <!-- START 2nd Level Menu -->
                                <ul id="email" class="submenu collapse ">
                                    <li >
                                        <a href="<?php echo base_url('assets/adminre/gh_backend/page-email-inbox.html')?>"><span class="text">Inbox</span></a>
                                    </li>
                                    <li >
                                        <a href="<?php echo base_url('assets/adminre/gh_backend/page-email-view.html')?>"><span class="text">View</span></a>
                                    </li>
                                </ul>
                                <!--/ END 2nd Level Menu -->
                            </li>
                            <li >
                                <a href="javascript:void(0);" data-toggle="submenu" data-target="#blog" data-parent="#page">
                                    <span class="text">Blog page</span>
                                    <span class="arrow"></span>
                                </a>
                                <!-- START 2nd Level Menu -->
                                <ul id="blog" class="submenu collapse ">
                                    <li >
                                        <a href="<?php echo base_url('assets/adminre/gh_backend/page-blog-default.html')?>"><span class="text">Blog default</span></a>
                                    </li>
                                    <li >
                                        <a href="<?php echo base_url('assets/adminre/gh_backend/page-blog-grid.html')?>"><span class="text">Blog grid</span></a>
                                    </li>
                                    <li >
                                        <a href="<?php echo base_url('assets/adminre/gh_backend/page-blog-single.html')?>"><span class="text">Single post</span></a>
                                    </li>
                                </ul>
                                <!--/ END 2nd Level Menu -->
                            </li>
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>
                    <li >
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#chart" data-parent=".topmenu">
                            <span class="figure"><i class="ico-stats-up"></i></span>
                            <span class="text">Charts</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="chart" class="submenu collapse ">
                            <li class="submenu-header ellipsis">Charts</li>
                            <li >
                                <a href="<?php echo base_url('assets/adminre/gh_backend/chart-flot.html')?>">
                                    <span class="text">Flot</span>
                                </a>
                            </li>
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>
                    <li >
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#maps" data-parent=".topmenu">
                            <span class="figure">
                                <i class="ico-map3"></i>
                            </span>
                            <span class="text">Maps</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="maps" class="submenu collapse ">
                            <li class="submenu-header ellipsis">Maps</li>
                            <li >
                                <a href="<?php echo base_url('assets/adminre/gh_backend/maps-vector.html')?>">
                                    <span class="text">Vector</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url('assets/adminre/gh_backend/maps-google.html')?>">
                                    <span class="text">Google</span>
                                </a>
                            </li>
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>
                    <li >
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#layout" data-parent=".topmenu">
                            <span class="figure"><i class="ico-grid"></i></span>
                            <span class="text">Page Layout</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="layout" class="submenu collapse ">
                            <li class="submenu-header ellipsis">Page Layout</li>
                            <li >
                                <a href="<?php echo base_url('assets/adminre/gh_backend/layout-default-header.html')?>">
                                    <span class="text">Fixed header </span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url('assets/adminre/gh_backend/layout-static-header.html')?>">
                                    <span class="text">Static header</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url('assets/adminre/gh_backend/layout-navbar-collapse.html')?>">
                                    <span class="text">Navbar Collapse</span>
                                </a>
                            </li>
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>
                </ul>
                <!--/ END Template Navigation/Menu -->

                <!-- START Sidebar summary -->
                <!-- Summary -->
                <h5 class="heading">Summary</h5>
                <div class="wrapper">
                    <div class="table-layout">
                        <div class="col-xs-5 valign-middle">
                            <span class="sidebar-sparklines" sparkType="bar" sparkBarColor="#00B1E1">1,5,3,2,4,5,3,3,2,4,5,3</span>
                        </div>
                        <div class="col-xs-7 valign-middle">
                            <h5 class="semibold nm">Server uptime</h5>
                            <small class="semibold">1876 days</small>
                        </div>
                    </div>

                    <div class="table-layout">
                        <div class="col-xs-5 valign-middle">
                            <span class="sidebar-sparklines" sparkType="bar" sparkBarColor="#91C854">2,5,3,6,4,2,4,7,8,9,7,6</span>
                        </div>
                        <div class="col-xs-7 valign-middle">
                            <h5 class="semibold nm">Disk usage</h5>
                            <small class="semibold">83.1%</small>
                        </div>
                    </div>

                    <div class="table-layout">
                        <div class="col-xs-5 valign-middle">
                            <span class="sidebar-sparklines" sparkType="bar" sparkBarColor="#ED5466">5,1,3,7,4,3,7,8,6,5,3,2</span>
                        </div>
                        <div class="col-xs-7 valign-middle">
                            <h5 class="semibold nm">Daily visitors</h5>
                            <small class="semibold">56.5%</small>
                        </div>
                    </div>
                </div>
                <!--/ Summary -->
                <!--/ END Sidebar summary -->
            </section>
            <!--/ END Sidebar Container -->
        </aside>
        <!--/ END Template Sidebar (Left) -->
