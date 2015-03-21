@extends('layouts.default')

@section('content')
    <section class="style-default-bright">
        <div class="section-header">
            <h2 class="text-primary">Dashboard</h2>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <h4>PATIENT QUEUE &nbsp;
                        <a href="#" role="button" class="btn btn-primary ink-reaction">
                            <i class="md-person-add"></i> ADD ON QUEUE
                        </a>
                    </h4>
                </div><!--end .col -->
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="datatable2" class="table order-column hover" data-source="/assets/users.json" data-swftools="/assets/js/modules/materialadmin/libs/DataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Salary</th>
                            </tr>
                            </thead>
                        </table>
                    </div><!--end .table-responsive -->
                </div><!--end .col -->
            </div><!--end .row -->
        </div>
    </section>
@stop

@section('page-scripts')
    <script src="/assets/js/modules/materialadmin/core/demo/DemoTableDynamic.js"></script>
@stop