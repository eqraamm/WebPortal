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
                      <div class="col-sm-4">
                        <input class="form-control" id="SearchEmail" type="email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <p class="col-sm-2 col-form-label">Training Status</p>
                      <div class="col-sm-4">
                        <input class="form-control" id="SearchID_No" type="text">
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
                      <button type="button" id="btn-search-profile" class="btn btn-outline-primary">Search</button>
                      </div>
                    </div>
                    <div class="form-group">
                      <table id="tblTrainingClass" class="table table-striped dt-responsive nowrap" width="100%">
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
@endsection