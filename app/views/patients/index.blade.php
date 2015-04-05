@extends('layouts.default')

@section('content')
    <section>
        <div class="section-header">
            <ol class="breadcrumb">
                <li class="active">Patients</li>
            </ol>
        </div>

        <div class="section-body">

        </div>
    </section>


    <!-- START FORM MODAL -->
    <div class="modal fade" id="formCreateModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="formModalLabel">Create New Patient Record</h4>
                </div>
                <form class="form-horizontal" role="form" id="createForm" action="post">
                    <div class="modal-body">

                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="patient_no" class="control-label">Patient No</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="patient_no" id="patient_no" class="form-control" placeholder="Patient No" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="firstname" class="control-label">First Name</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="lastname" class="control-label">Last Name</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="middlename" class="control-label">Middle Name</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="middlename" id="middlename" class="form-control" placeholder="Middle Name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="address" class="control-label">Address</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="address" id="address" class="form-control" placeholder="Address" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="birthdate" class="control-label">Birthdate</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="date" name="birthdate" id="birthdate" class="form-control" placeholder="Birthdate" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="contactno" class="control-label">Contact Number</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="contactno" id="contactno" class="form-control" placeholder="Contact Number" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="email" class="control-label">Email</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>


            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- END FORM MODAL -->


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
                    <a class="btn btn-floating-action btn-default-light" data-toggle="modal" data-target="#formCreateModal" href="#"><i class="fa fa-plus"></i></a>
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
                                    <img class="img-circle img-responsive pull-left" src="../../../assets/img/modules/materialadmin/@{{picture}}" alt="" />
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
                        </div>

                        <!-- BEGIN SEARCH RESULTS PAGING -->
                        <div class="text-center">
                            <ul class="pagination">
                                <li class="disabled"><a href="#">«</a></li>
                                <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">»</a></li>
                            </ul>
                        </div><!--end .text-center -->
                        <!-- BEGIN SEARCH RESULTS PAGING -->
                    </div><!--end .col -->
                </div><!--end .row -->
            </div><!--end .card-body -->
            <!-- END SEARCH RESULTS -->
        </div>
    </script>
@stop