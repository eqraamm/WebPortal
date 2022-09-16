@extends('layout/main')
@section('title')
   {{config('app.COMPANYNAME')}} INSURANCE | Business Source
@endsection

@section('maincontent')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
            <h1>{{ session('Role') != 'ADMIN' ? 'Business Source' : 'User Maintenance' }}</h1>
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
                        <p class="col-sm-2 col-form-label">User ID / Name</p>
                        <div class="col-sm-3">
                           <input class="form-control" id="SearchKey" type="text">
                        </div>
                     </div>
                     <div class="form-group row">
                        <p class="col-sm-2 col-form-label">Role</p>
                        <div class="col-sm-3">
                           <select class="form-control select2bs4" id="Role" name="Role"> 
                              <option value="" selected></option>
                              <option value="ADMIN">ADMIN</option>
                              <option value="AGENT">AGENT</option>
                              <option value="CLIENT">CLIENT</option>
                              <option value="USER">USER</option>
                              <option value="MARKETING OFFICER">MARKETING OFFICER</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row">
                        <p class="col-sm-2 col-form-label"></p>
                        <div class="col-sm-4">
                           <button type="button" id="btn-search" class="btn btn-outline-primary">Search</button>
                        </div>
                    </div>
                     <!-- <div class="form-group">
                        <a class="btn btn-block btn-outline-primary float-right btn-addNew" href="{{route('master.ShowAddSysUser')}}">
                           <i class="fas fa-plus"></i>
                           Add New
                        </a>
                     </div> -->
                     <div class="form-group">
                        <a type="button" class="btn btn-outline-primary float-right" href="{{route('master.ShowAddSysUser')}}">
                           <i class="fas fa-plus"></i>
                           Add New
                        </a>
                        <table id="tbl-list-sysuser" class="table table-bordered table-hover dt-responsive nowrap" width="100%">
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
   var Role = "{{ session('Role') }}";
   var url = "{{route('getlistuser')}}";
   var URLEditIcon = '{{asset("dist/img/edit.svg")}}';
   var urlModal = '{{route("user.resetpassword")}}';
</script>
<script src="{{asset('dist/js/Master/SysUser/SysUser.js?3')}}"></script>
@endsection