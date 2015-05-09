<!DOCTYPE html>
<html lang="en">
<head>
    <title>OBClinic - {{ $pageTitle or 'Dashboard'}}</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
    {{ HTML::style('/assets/css/modules/materialadmin/css/theme-5/bootstrap02dc.css') }}
    {{ HTML::style('/assets/css/modules/materialadmin/css/theme-5/materialadmin0768.css') }}
    {{ HTML::style('/assets/css/modules/materialadmin/css/theme-5/font-awesome.min445a.css') }}
    {{ HTML::style('/assets/css/modules/materialadmin/css/theme-5/material-design-iconic-font.min3cd8.css') }}
    {{ HTML::style('/assets/css/modules/materialadmin/css/theme-5/libs/rickshaw/rickshawd56b.css') }}
    {{ HTML::style('/assets/css/modules/materialadmin/css/theme-5/libs/morris/morris.core5e0a.css') }}
    <link type="text/css" rel="stylesheet" href="/assets/css/modules/materialadmin/css/theme-default/libs/DataTables/jquery.dataTablesdee9.css" />
    <link type="text/css" rel="stylesheet" href="/assets/css/modules/materialadmin/css/theme-default/libs/DataTables/extensions/dataTables.colVis941e.css" />
    <link type="text/css" rel="stylesheet" href="/assets/css/modules/materialadmin/css/theme-default/libs/DataTables/extensions/dataTables.tableTools4029.css" />
    <link type="text/css" rel="stylesheet" href="/assets/css/modules/materialadmin/css/theme-default/libs/select2/select201ef.css" />
    {{ HTML::style('/assets/css/modules/materialadmin/css/theme-5/libs/toastr/toastrf6d7.css') }}
    {{ HTML::style('/assets/css/modules/materialadmin/css/theme-default/libs/dropzone/dropzone-theme23ba.css') }}
    {{ HTML::style('/assets/css/custom.css') }}
    <style>
        .hide {
            display: none;
        }
    </style>
    @yield('page-styles')
    <!-- END STYLESHEETS -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="http://www.codecovers.eu/assets/js/modules/materialadmin/libs/utils/html5shiv.js?1422823601"></script>
    <script type="text/javascript" src="http://www.codecovers.eu/assets/js/modules/materialadmin/libs/utils/respond.min.js?1422823601"></script>
    <![endif]-->

    <style>
        #loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: rgba(255, 255, 255, 0.90);
        }

        #loader img {
            align-content: center;
            position: fixed;
            left: 45%;
            top: 40%;
        }
    </style>
</head>

<body class="menubar-hoverable header-fixed ">
<div id="loader">
    <img src="data:image/gif;base64,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" alt=""/>
</div>

<!-- BEGIN HEADER-->
<header id="header" >
    <div class="headerbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        @include('elements.header_nav')

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="headerbar-right">
            @include('elements.header_widget')
            @include('elements.header_profile')

            <ul class="header-nav header-nav-toggle">
                <li>
                    <a class="btn btn-icon-toggle btn-default" href="#offcanvas-search" data-toggle="offcanvas" data-backdrop="false">
                        <i class="fa fa-ellipsis-v"></i>
                    </a>
                </li>
            </ul><!--end .header-nav-toggle -->
        </div><!--end #header-navbar-collapse -->
    </div>
</header>
<!-- END HEADER-->

<!-- BEGIN BASE-->
<div id="base">
    <!-- BEGIN OFFCANVAS LEFT -->
    <div class="offcanvas">
    </div><!--end .offcanvas-->
    <!-- END OFFCANVAS LEFT -->

    <!-- BEGIN CONTENT-->
    <div id="content">

        @yield('content')

    </div><!--end #content-->
    <!-- END CONTENT -->

    <!-- BEGIN MENUBAR-->
    @include('elements.menubar')
    <!-- END MENUBAR -->

    <!-- BEGIN OFFCANVAS RIGHT -->
    <div class="offcanvas">
        @include('elements.canvas_search')
        @include('elements.canvas_chat')
    </div><!--end .offcanvas-->
    <!-- END OFFCANVAS RIGHT -->

</div><!--end #base-->
<!-- END BASE -->



<!-- BEGIN JAVASCRIPT -->
<script src="/assets/js/modules/materialadmin/libs/jquery/jquery-1.11.2.min.js"></script>
<script src="/packages/handlebars-v3.0.0.js"></script>
<script src="/assets/js/modules/materialadmin/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="/assets/js/modules/materialadmin/libs/bootstrap/bootstrap.min.js"></script>
<script src="/assets/js/modules/materialadmin/libs/spin.js/spin.min.js"></script>
<script src="/assets/js/modules/materialadmin/libs/autosize/jquery.autosize.min.js"></script>
<script src="/assets/js/modules/materialadmin/core/cache/9782537cea5b6dc42cb13bd7821cceca.js"></script>
<script src="/assets/js/modules/materialadmin/libs/moment/moment.min.js"></script>
<script src="/assets/js/modules/materialadmin/core/cache/ec2c8835c9f9fbb7b8cd36464b491e73.js"></script>
<script src="/assets/js/modules/materialadmin/libs/jquery-knob/jquery.knob.min.js"></script>
<script src="/assets/js/modules/materialadmin/libs/sparkline/jquery.sparkline.min.js"></script>
<script src="/assets/js/modules/materialadmin/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
<script src="/assets/js/modules/materialadmin/libs/toastr/toastr.js"></script>
<script src="/assets/js/modules/materialadmin/libs/dropzone/dropzone.min.js"></script>
<script src="/assets/js/modules/materialadmin/core/cache/43ef607ee92d94826432d1d6f09372e1.js"></script>
{{--<script src="/assets/js/modules/materialadmin/libs/rickshaw/rickshaw.min.js"></script>--}}
<script src="/assets/js/modules/materialadmin/core/cache/63d0445130d69b2868a8d28c93309746.js"></script>
<script src="/assets/js/modules/materialadmin/libs/select2/select2.min.js"></script>
<script src="/assets/js/modules/materialadmin/core/demo/Demo.js"></script>

<script src="/packages/underscore/underscore.js"></script>
<script src="/packages/backbone/backbone.js"></script>
<script src="/packages/marionette/backbone.marionette.js"></script>
<script src="/assets/js/app.js"></script>
<!-- END JAVASCRIPT -->

@yield('page-scripts')

</body>
</html>