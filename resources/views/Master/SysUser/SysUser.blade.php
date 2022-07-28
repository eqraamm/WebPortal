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
            <h1>Add {{ session('Role') != 'ADMIN' ? 'Business Source' : 'User Maintenance' }}</h1>
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
                     <div class="form-group">
                        <a class="btn btn-block btn-outline-primary float-right btn-addNew" href="{{route('master.ShowAddSysUser')}}">
                           <i class="fas fa-plus"></i>
                           Add New
                        </a>
                     </div>
                     <div class="form-group">
                        <table id="tbl-list-sysuser" class="table table-striped dt-responsive nowrap" width="100%">
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
</script>
<script src="{{asset('dist/js/Master/SysUser/SysUser.js?')}}"></script>
@endsection