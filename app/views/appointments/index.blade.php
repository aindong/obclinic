@extends('layouts.default')

@section('content')
    <section class="style-default-bright">
        <div class="section-header">
            <h2 class="text-primary">Appointments</h2>
        </div>
        <div class="section-body">

        </div>
    </section>


    <!-- BEGIN FORM MODAL MARKUP -->
    <div class="modal fade" id="addAppointmentModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="formModalLabel">Add New Appointment</h4>
                </div>
                <form class="form-horizontal" role="form" id="appointmentForm">
                    <div class="modal-body">

                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="patient_no" class="control-label">Patient</label>
                            </div>
                            <div class="col-sm-9">
                                <select name="patient_no" id="patient_no">
                                    @foreach($patients as $patient)
                                        <option value="{{ $patient->patient_no }}">
                                            {{ $patient->firstname }} {{ $patient->middlename }} {{ $patient->lastname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3">
                                <label class="control-label" for="appointment_date">Date</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="date" name="appointment_date" id="appointment_date" class="form-control" placeholder="Appointment Date"/>
                            </div>
                        </div>

                        <input type="hidden" name="status" value="pending"/>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-loading-state" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Submitting...">Submit</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- END FORM MODAL MARKUP -->

    <!-- Table Template -->
    <script type="text/template" id="appointment-table">
        <div class="row">
            <div class="col-md-12">
                <h4>Appointments &nbsp;
                    <a href="#" role="button" data-toggle="modal" data-target="#addAppointmentModal" class="btn btn-primary ink-reaction">
                        <i class="md-person-add"></i> ADD NEW APPOINTMENT
                    </a>
                </h4>
            </div><!--end .col -->
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="datatable2" class="table order-column hover" data-source="/api/v1/appointments" data-swftools="/assets/js/modules/materialadmin/libs/DataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Id</th>
                            <th>Patient No</th>
                            <th>Name</th>
                            <th>Appointment Date</th>
                            <th>Status</th>
                            <th>Created By</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                    </table>
                </div><!--end .table-responsive -->
            </div><!--end .col -->
        </div><!--end .row -->
    </script>
@stop

@section('page-scripts')
    {{--<script src="/assets/js/modules/materialadmin/core/demo/DemoTableDynamic.js"></script>--}}
    <script>
        $(function() {
            $('select').select2();
        })
    </script>
@stop