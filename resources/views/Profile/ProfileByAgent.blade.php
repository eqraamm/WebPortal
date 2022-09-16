@extends('layout/main')

@section('title')
{{config('app.COMPANYNAME')}} INSURANCE | Client
@endsection

@section('maincontent')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Client List</h1>
         </div>
         <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Calendar</li>
            </ol>
         </div> -->
        </div>
    </div><!-- /.container-fluid -->
  </div>

  <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <!-- <div class="card-header container-fluid">
                     <button class="btn btn-block btn-outline-primary col-md-2 float-right btn-addNew">
                        <i class="fas fa-plus"></i>
                        Add New
                     </button>
                  </div> -->
                  <div class="card-body">
                    <div class="form-group row">
                      <p class="col-sm-2 col-form-label">Name</p>
                      <div class="col-sm-4">
                        <input class="form-control" id="SearchName" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <p class="col-sm-2 col-form-label">Email</p>
                      <div class="col-sm-4">
                        <input class="form-control" id="SearchEmail" type="email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <p class="col-sm-2 col-form-label">ID Number</p>
                      <div class="col-sm-4">
                        <input class="form-control" id="SearchID_No" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <p class="col-sm-2 col-form-label">Mobile Number</p>
                      <div class="col-sm-4">
                        <input class="form-control" id="SearchMobileNo" type="text">
                      </div>
                    </div>
                    @if (session('Role') == 'MARKETING OFFICER' and $privileges_branch_head)
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
                      <a type="button" class="btn btn-outline-primary float-right" href="{{route('createprofile')}}">
                        <i class="fas fa-plus"></i>
                        Add New
                      </a>
                      <table id="tbl-profile" class="table table-hover table-bordered dt-responsive nowrap" width="100%">
                        <thead class="bg-primary">
                          <th>No</th>
                          <th>Client ID</th>
                          <th>Reference Profile ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>ID Number</th>
                          <th>Birth Date</th>
                          <th></th>
                        </thead>
                      </table>
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
<script>
  var userID = '{{ session("ID") }}';
   var Role = '{{ session("Role") }}';
   var dataProfile = @json($data);
   var edit = '{{asset("dist/img/edit.svg")}}';
   var file = '{{asset("dist/img/file.svg")}}';
   var trash = '{{asset("dist/img/trash.svg")}}';
   var urlSearchProfile = '{{ route("profile.search") }}';
   var urlModalHistory = '{{ route("profile.history") }}';
   var urlGetProfileByID = '{{ route("profile.getprofile") }}';
   var urlCreateProfile = '{{route("createprofile")}}';
</script>
<script src="{{asset('dist/js/Profile/ProfileByAgent.js')}}"></script>
@endsection