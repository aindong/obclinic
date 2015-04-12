@extends('layouts.default')

@section('content')
    <section class="style-default-bright">
        <div class="section-header">
            <h2 class="text-primary">Maintenance</h2>
        </div>
        <div class="section-body">
            <script type="text/template" id="medicine-table">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Medicines &nbsp;
                            <a href="#" role="button" data-toggle="modal" data-target="#addMedicineModal" class="btn btn-primary ink-reaction">
                                <i class="md-person-add"></i> ADD A MEDICINE
                            </a>
                        </h4>
                    </div><!--end .col -->
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="datatable2" class="table order-column hover" data-source="/api/v1/maintenance/medicines" data-swftools="/assets/js/modules/materialadmin/libs/DataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                </tr>
                                </thead>
                            </table>
                        </div><!--end .table-responsive -->
                    </div><!--end .col -->
                </div><!--end .row -->
            </script>
        </div>
    </section>


    <!-- BEGIN FORM MODAL MARKUP -->
    <div class="modal fade" id="addMedicineModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="formModalLabel">Add Patient on Queue</h4>
                </div>
                <form class="form-horizontal" role="form">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="email1" class="control-label">Patient No</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="email" name="email1" id="email1" class="form-control" placeholder="Patient No">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="email1" class="control-label">Reservation Type</label>
                            </div>
                            <div class="col-sm-9">
                                <select name="" id="email" class="form-control" placeholder="Reservation Type" >
                                    <option value="option1">option1</option>
                                    <option value="option2">option2</option>
                                    <option value="option3">option3</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="password1" class="control-label">Get Vital Signs</label>
                            </div>
                            <div class="col-sm-9">
                                <label class="radio-inline radio-styled">
                                    <input type="radio" name="radio1"/>
                                    <span>Yes</span>
                                </label>

                                <label class="radio-inline radio-styled">
                                    <input type="radio" name="radio1"/>
                                    <span>No</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- END FORM MODAL MARKUP -->
@stop

@section('page-scripts')
    {{--<script src="/assets/js/modules/materialadmin/core/demo/DemoTableDynamic.js"></script>--}}
    <script>
        $(function() {
            $('select').select2();
        })
    </script>
@stop