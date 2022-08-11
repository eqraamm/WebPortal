@extends('layout/main')

@section('title')
{{config('app.COMPANYNAME')}} INSURANCE | List Of Training Class
@endsection

@section('maincontent')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid"></div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <p class="col-sm-2 col-form-label">Subject</p>
                                        <div class="col-sm-4">
                                            <input class="form-control" id="SearchName" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <p class="col-sm-2 col-form-label">Date</p>
                                        <div class="input-group date col-sm-4" id="datetraining"
                                            data-target-input="nearest">
                                            <input type="text" id="DateTraining" name="TxtDateTraining"
                                                class="form-control datetimepicker-input" data-target="#datetraining"
                                                placeholder="mm/dd/yyyy" required />
                                            <div class="input-group-append" data-target="#datetraining"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <p class="col-sm-2 col-form-label">Training Status</p>
                                        <div class="col-sm-4">
                                        <select class="form-control select2bs4" id="Status" name="Status">
                                          <option value="" selected></option>
                                          <option value="On Schedule">On Schedule</option>
                                          <option value="Cancel">Cancel</option>
                                          <option value="Finished">Finished</option>
                                          <option value="Open">Open</option>
                                        </select>
                                        </div>
                                    </div>
                                    @if (session('Role') == 'MARKETING OFFICER')
                                    <div class="form-group row">
                                        <p class="col-sm-2 col-form-label">Marketing Officer</p>
                                        <div class="col-sm-2">
                                            <select class="form-control select2bs4" id="MO" name="MO" required>
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="form-group row">
                                        <p class="col-sm-2 col-form-label"></p>
                                        <div class="col-sm-4">
                                            <button type="button" id="btn-search-profile"
                                                class="btn btn-outline-primary">Search</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <table id="tblTrainingClass" class="table table-striped dt-responsive nowrap"
                                            width="100%">
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scriptpage')
<script src="{{asset('dist/js/TrainingClass/TrainingClass.js?')}}"></script>
<script src="{{asset('dist/js/pages/webportal.js?')}}"></script>
<script>
    var modalParticipantClass = "{{route('modalparticipantclass')}}";
</script>
@endsection