@extends('layouts.default')

@section('content')
    <section class="style-default-bright">
        <div class="section-header">
            <h2 class="text-primary">Maintenance</h2>
        </div>
        <div class="section-body">

        </div>
    </section>


    <!-- BEGIN FORM MODAL MARKUP -->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="formModalLabel">Add User</h4>
                </div>
                <form class="form-horizontal" role="form" id="usersForm">
                    <div class="modal-body">

                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="username" class="control-label">Username</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="password" class="control-label">Password</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
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
                                <label for="middlename" class="control-label">Middle Name</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="middlename" id="middlename" class="form-control" placeholder="Middle Name" required>
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
                                <label for="role_id" class="control-label">Role</label>
                            </div>
                            <div class="col-sm-9">
                                <select name="role_id" id="form-control">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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
    <script type="text/template" id="user-table">
        <div class="row">
            <div class="col-md-12">
                <h4>Users &nbsp;
                    <a href="#" role="button" data-toggle="modal" data-target="#addUserModal" class="btn btn-primary ink-reaction">
                        <i class="md-person-add"></i> ADD A User
                    </a>
                </h4>
            </div><!--end .col -->
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="datatable2" class="table order-column hover" data-source="/api/v1/maintenance/users" data-swftools="/assets/js/modules/materialadmin/libs/DataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Created</th>
                            <th>Updated</th>
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