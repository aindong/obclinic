@extends('layouts.default')

@section('content')
    <section>
        <div class="section-header">
            <ol class="breadcrumb">
                <li class="active">Patients</li>
            </ol>
        </div>

        <div class="section-body">
            <script type="text/x-handlebars-template" id="patient-place">
                <div class="card">

                    <!-- BEGIN SEARCH HEADER -->
                    <div class="card-head style-primary">
                        <div class="tools pull-left">
                            <form class="navbar-search" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="contactSearch" placeholder="Enter your keyword">
                                </div>
                                <button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="tools">
                            <a class="btn btn-floating-action btn-default-light" href="add.html"><i class="fa fa-plus"></i></a>
                        </div>
                    </div><!--end .card-head -->
                    <!-- END SEARCH HEADER -->

                    <!-- BEGIN SEARCH RESULTS -->
                    <div class="card-body">
                        <div class="row">

                            <!-- BEGIN SEARCH NAV -->
                            <div class="col-sm-4 col-md-3 col-lg-2">
                                <ul class="nav nav-pills nav-stacked">
                                    <li class="hidden-xs"><small>LAST VIEWED</small></li>
                                    <li class="hidden-xs">
                                        <a href="details.html">
                                            <img class="img-circle img-responsive pull-left width-1" src="../../../assets/img/modules/materialadmin/avatar7463a.jpg?1422538626" alt="" />
                                            <span class="text-medium" >Philip Ericsson</span><br/>
										<span class="opacity-50">
											<span class="glyphicon glyphicon-phone text-sm"></span> &nbsp;123-123-3210
										</span>
                                        </a>
                                    </li>
                                    {{--<li class="hidden-xs">--}}
                                        {{--<a href="details.html">--}}
                                            {{--<img class="img-circle img-responsive pull-left width-1" src="../../../assets/img/modules/materialadmin/avatar9463a.jpg?1422538626" alt="" />--}}
                                            {{--<span class="text-medium" >Ann Laurens</span><br/>--}}
										{{--<span class="opacity-50">--}}
											{{--<span class="glyphicon glyphicon-phone text-sm"></span> &nbsp;567-890-1234--}}
										{{--</span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="hidden-xs">--}}
                                        {{--<a href="details.html">--}}
                                            {{--<img class="img-circle img-responsive pull-left width-1" src="../../../assets/img/modules/materialadmin/avatar124335.jpg?1422538623" alt="" />--}}
                                            {{--<span class="text-medium" >Buck Rogers</span><br/>--}}
										{{--<span class="opacity-50">--}}
											{{--<span class="glyphicon glyphicon-phone text-sm"></span> &nbsp;787-878-8787--}}
										{{--</span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="hidden-xs">--}}
                                        {{--<a href="details.html">--}}
                                            {{--<img class="img-circle img-responsive pull-left width-1" src="../../../assets/img/modules/materialadmin/avatar14666b.jpg?1422538624" alt="" />--}}
                                            {{--<span class="text-medium" >Kimberly Aston</span><br/>--}}
										{{--<span class="opacity-50">--}}
											{{--<span class="glyphicon glyphicon-phone text-sm"></span> &nbsp;555-444-3333--}}
										{{--</span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="hidden-xs">--}}
                                        {{--<a href="details.html">--}}
                                            {{--<img class="img-circle img-responsive pull-left width-1" src="../../../assets/img/modules/materialadmin/avatar52dba.jpg?1422538625" alt="" />--}}
                                            {{--<span class="text-medium" >Mabel Logan</span><br/>--}}
										{{--<span class="opacity-50">--}}
											{{--<span class="glyphicon glyphicon-phone text-sm"></span> &nbsp;234-567-8901--}}
										{{--</span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                </ul>
                            </div><!--end .col -->
                            <!-- END SEARCH NAV -->

                            <div class="col-sm-8 col-md-9 col-lg-10">

                                <!-- BEGIN SEARCH RESULTS LIST -->
                                <div class="margin-bottom-xxl">
                                    <span class="text-light text-lg">Filtered results <strong>34</strong></span>
                                    <div class="btn-group btn-group-sm pull-right">
                                        <button type="button" class="btn btn-default-light dropdown-toggle" data-toggle="dropdown">
                                            <span class="glyphicon glyphicon-arrow-down"></span> Sort
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right animation-dock" role="menu">
                                            <li><a href="#">First name</a></li>
                                            <li><a href="#">Last name</a></li>
                                            <li><a href="#">Email address</a></li>
                                        </ul>
                                    </div>
                                </div><!--end .margin-bottom-xxl -->
                                <div class="list-results">
                                    @{{#each patients}}
                                    <div class="col-xs-12 col-lg-6 hbox-xs">
                                        <div class="hbox-column width-2">
                                            <img class="img-circle img-responsive pull-left" src="@{{picture}}" alt="" />
                                        </div><!--end .hbox-column -->
                                        <div class="hbox-column v-top">
                                            <div class="clearfix">
                                                <div class="col-lg-12 margin-bottom-lg">
                                                    <a class="text-lg text-medium" href="details.html">@{{firstname}} @{{lastname}}</a>
                                                </div>
                                            </div>
                                            <div class="clearfix opacity-75">
                                                <div class="col-md-5">
                                                    <span class="glyphicon glyphicon-phone text-sm"></span> &nbsp;@{{contactno}}
                                                </div>
                                                <div class="col-md-7">
                                                    <span class="glyphicon glyphicon-envelope text-sm"></span> &nbsp;@{{email}}
                                                </div>
                                            </div>
                                            <div class="clearfix">
                                                <div class="col-lg-12">
                                                    <span class="opacity-75"><span class="glyphicon glyphicon-map-marker text-sm"></span> &nbsp;@{{address}}</span>
                                                </div>
                                            </div>
                                            <div class="stick-top-right small-padding">
                                                <i class="fa fa-dot-circle-o fa-fw text-success" data-toggle="tooltip" data-placement="left" data-original-title="User online"></i>
                                            </div>
                                        </div><!--end .hbox-column -->
                                    </div><!--end .hbox-xs -->
                                    @{{/each}}
                                    {{--<div class="col-xs-12 col-lg-6 hbox-xs">--}}
                                        {{--<div class="hbox-column width-2">--}}
                                            {{--<img class="img-circle img-responsive pull-left" src="../../../assets/img/modules/materialadmin/avatar3666b.jpg?1422538624" alt="" />--}}
                                        {{--</div><!--end .hbox-column -->--}}
                                        {{--<div class="hbox-column v-top">--}}
                                            {{--<div class="clearfix">--}}
                                                {{--<div class="col-lg-12 margin-bottom-lg">--}}
                                                    {{--<a class="text-lg text-medium" href="details.html">Mike Alba</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="clearfix opacity-75">--}}
                                                {{--<div class="col-md-5">--}}
                                                    {{--<span class="glyphicon glyphicon-phone text-sm"></span> &nbsp;098-765-4321--}}
                                                {{--</div>--}}
                                                {{--<div class="col-md-7">--}}
                                                    {{--<span class="glyphicon glyphicon-envelope text-sm"></span> &nbsp;norman@erik.com--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="clearfix">--}}
                                                {{--<div class="col-lg-12">--}}
                                                    {{--<span class="opacity-75"><span class="glyphicon glyphicon-map-marker text-sm"></span> &nbsp;795 Folsom Ave, San Francisco, CA 94107</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div><!--end .hbox-column -->--}}
                                    {{--</div><!--end .hbox-xs -->--}}
                                    {{--<div class="col-xs-12 col-lg-6 hbox-xs" id="test">--}}
                                        {{--<div class="hbox-column width-2">--}}
                                            {{--<img class="img-circle img-responsive pull-left" src="../../../assets/img/modules/materialadmin/avatar2666b.jpg?1422538624" alt="" />--}}
                                        {{--</div><!--end .hbox-column -->--}}
                                        {{--<div class="hbox-column v-top">--}}
                                            {{--<div class="clearfix">--}}
                                                {{--<div class="col-lg-12 margin-bottom-lg">--}}
                                                    {{--<a class="text-lg text-medium" href="details.html">Jessica Cruise</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="clearfix opacity-75">--}}
                                                {{--<div class="col-md-5">--}}
                                                    {{--<span class="glyphicon glyphicon-phone text-sm"></span> &nbsp;123-456-7890--}}
                                                {{--</div>--}}
                                                {{--<div class="col-md-7">--}}
                                                    {{--<span class="glyphicon glyphicon-envelope text-sm"></span> &nbsp;norman@erik.com--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="clearfix">--}}
                                                {{--<div class="col-lg-12">--}}
                                                    {{--<span class="opacity-75"><span class="glyphicon glyphicon-map-marker text-sm"></span> &nbsp;795 Folsom Ave, San Francisco, CA 94107</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div><!--end .hbox-column -->--}}
                                    {{--</div><!--end .hbox-xs -->--}}
                                    {{--<div class="col-xs-12 col-lg-6 hbox-xs">--}}
                                        {{--<div class="hbox-column width-2">--}}
                                            {{--<img class="img-circle img-responsive pull-left" src="../../../assets/img/modules/materialadmin/avatar52dba.jpg?1422538625" alt="" />--}}
                                        {{--</div><!--end .hbox-column -->--}}
                                        {{--<div class="hbox-column v-top">--}}
                                            {{--<div class="clearfix">--}}
                                                {{--<div class="col-lg-12 margin-bottom-lg">--}}
                                                    {{--<a class="text-lg text-medium" href="details.html">Mabel	 Logan</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="clearfix opacity-75">--}}
                                                {{--<div class="col-md-5">--}}
                                                    {{--<span class="glyphicon glyphicon-phone-alt text-sm"></span> &nbsp;999-878-5323--}}
                                                {{--</div>--}}
                                                {{--<div class="col-md-7">--}}
                                                    {{--<span class="glyphicon glyphicon-envelope text-sm"></span> &nbsp;mabel@logan-intern.com--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="clearfix">--}}
                                                {{--<div class="col-lg-12">--}}
                                                    {{--<span class="opacity-75"><span class="glyphicon glyphicon-map-marker text-sm"></span> &nbsp;795 Folsom Ave, San Francisco, CA 94107</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div><!--end .hbox-column -->--}}
                                    {{--</div><!--end .hbox-xs -->--}}
                                    {{--<div class="col-xs-12 col-lg-6 hbox-xs">--}}
                                        {{--<div class="hbox-column width-2">--}}
                                            {{--<img class="img-circle img-responsive pull-left" src="../../../assets/img/modules/materialadmin/avatar6463a.jpg?1422538626" alt="" />--}}
                                        {{--</div><!--end .hbox-column -->--}}
                                        {{--<div class="hbox-column v-top">--}}
                                            {{--<div class="clearfix">--}}
                                                {{--<div class="col-lg-12 margin-bottom-lg">--}}
                                                    {{--<a class="text-lg text-medium" href="details.html">Nathan Peterson</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="clearfix opacity-75">--}}
                                                {{--<div class="col-md-5">--}}
                                                    {{--<span class="glyphicon glyphicon-phone-alt text-sm"></span> &nbsp;765-341-1231--}}
                                                {{--</div>--}}
                                                {{--<div class="col-md-7">--}}
                                                    {{--<span class="glyphicon glyphicon-envelope text-sm"></span> &nbsp;nathan@peterson.com--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="clearfix">--}}
                                                {{--<div class="col-lg-12">--}}
                                                    {{--<span class="opacity-75"><span class="glyphicon glyphicon-map-marker text-sm"></span> &nbsp;795 Folsom Ave, San Francisco, CA 94107</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="stick-top-right small-padding">--}}
                                                {{--<i class="fa fa-dot-circle-o fa-fw text-success" data-toggle="tooltip" data-placement="left" data-original-title="User online"></i>--}}
                                            {{--</div>--}}
                                        {{--</div><!--end .hbox-column -->--}}
                                    {{--</div><!--end .hbox-xs -->--}}
                                    {{--<div class="col-xs-12 col-lg-6 hbox-xs">--}}
                                        {{--<div class="hbox-column width-2">--}}
                                            {{--<img class="img-circle img-responsive pull-left" src="../../../assets/img/modules/materialadmin/avatar114335.jpg?1422538623" alt="" />--}}
                                        {{--</div><!--end .hbox-column -->--}}
                                        {{--<div class="hbox-column v-top">--}}
                                            {{--<div class="clearfix">--}}
                                                {{--<div class="col-lg-12 margin-bottom-lg">--}}
                                                    {{--<a class="text-lg text-medium" href="details.html">Beverly Pierce</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="clearfix opacity-75">--}}
                                                {{--<div class="col-md-5">--}}
                                                    {{--<span class="glyphicon glyphicon-phone text-sm"></span> &nbsp;234-567-8901--}}
                                                {{--</div>--}}
                                                {{--<div class="col-md-7">--}}
                                                    {{--<span class="glyphicon glyphicon-envelope text-sm"></span> &nbsp;beverly@intern-pierce-inc.com--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="clearfix">--}}
                                                {{--<div class="col-lg-12">--}}
                                                    {{--<span class="opacity-75"><span class="glyphicon glyphicon-map-marker text-sm"></span> &nbsp;795 Folsom Ave, San Francisco, CA 94107</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div><!--end .hbox-column -->--}}
                                    {{--</div><!--end .hbox-xs -->--}}
                                    {{--<div class="col-xs-12 col-lg-6 hbox-xs">--}}
                                        {{--<div class="hbox-column width-2">--}}
                                            {{--<img class="img-circle img-responsive pull-left" src="../../../assets/img/modules/materialadmin/avatar104335.jpg?1422538623" alt="" />--}}
                                        {{--</div><!--end .hbox-column -->--}}
                                        {{--<div class="hbox-column v-top">--}}
                                            {{--<div class="clearfix">--}}
                                                {{--<div class="col-lg-12 margin-bottom-lg">--}}
                                                    {{--<a class="text-lg text-medium" href="details.html">Samuel Parsons</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="clearfix opacity-75">--}}
                                                {{--<div class="col-md-5">--}}
                                                    {{--<span class="glyphicon glyphicon-phone text-sm"></span> &nbsp;876-543-2109--}}
                                                {{--</div>--}}
                                                {{--<div class="col-md-7">--}}
                                                    {{--<span class="glyphicon glyphicon-envelope text-sm"></span> &nbsp;Samuel@parsons-company.com--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="clearfix">--}}
                                                {{--<div class="col-lg-12">--}}
                                                    {{--<span class="opacity-75"><span class="glyphicon glyphicon-map-marker text-sm"></span> &nbsp;795 Folsom Ave, San Francisco, CA 94107</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div><!--end .hbox-column -->--}}
                                    {{--</div><!--end .hbox-xs -->--}}
                                    {{--<div class="col-xs-12 col-lg-6 hbox-xs">--}}
                                        {{--<div class="hbox-column width-2">--}}
                                            {{--<img class="img-circle img-responsive pull-left" src="../../../assets/img/modules/materialadmin/avatar8463a.jpg?1422538626" alt="" />--}}
                                        {{--</div><!--end .hbox-column -->--}}
                                        {{--<div class="hbox-column v-top">--}}
                                            {{--<div class="clearfix">--}}
                                                {{--<div class="col-lg-12 margin-bottom-lg">--}}
                                                    {{--<a class="text-lg text-medium" href="details.html">Jim Peters</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="clearfix opacity-75">--}}
                                                {{--<div class="col-md-5">--}}
                                                    {{--<span class="glyphicon glyphicon-phone-alt text-sm"></span> &nbsp;345-345-3454--}}
                                                {{--</div>--}}
                                                {{--<div class="col-md-7">--}}
                                                    {{--<span class="glyphicon glyphicon-envelope text-sm"></span> &nbsp;jim@peters.com--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="clearfix">--}}
                                                {{--<div class="col-lg-12">--}}
                                                    {{--<span class="opacity-75"><span class="glyphicon glyphicon-map-marker text-sm"></span> &nbsp;795 Folsom Ave, San Francisco, CA 94107</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="stick-top-right small-padding">--}}
                                                {{--<i class="fa fa-dot-circle-o fa-fw text-success" data-toggle="tooltip" data-placement="left" data-original-title="User online"></i>--}}
                                            {{--</div>--}}
                                        {{--</div><!--end .hbox-column -->--}}
                                    {{--</div><!--end .hbox-xs -->--}}
                                {{--</div><!--end .list-results -->--}}
                                {{--<!-- BEGIN SEARCH RESULTS LIST -->--}}

                                {{--<!-- BEGIN SEARCH RESULTS PAGING -->--}}
                                {{--<div class="text-center">--}}
                                    {{--<ul class="pagination">--}}
                                        {{--<li class="disabled"><a href="#">«</a></li>--}}
                                        {{--<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>--}}
                                        {{--<li><a href="#">2</a></li>--}}
                                        {{--<li><a href="#">3</a></li>--}}
                                        {{--<li><a href="#">4</a></li>--}}
                                        {{--<li><a href="#">5</a></li>--}}
                                        {{--<li><a href="#">»</a></li>--}}
                                    {{--</ul>--}}
                                {{--</div><!--end .text-center -->--}}
                                {{--<!-- BEGIN SEARCH RESULTS PAGING -->--}}

                            </div><!--end .col -->
                        </div><!--end .row -->
                    </div><!--end .card-body -->
                    <!-- END SEARCH RESULTS -->
                </div>
            </script>
        </div>
    </section>
@stop