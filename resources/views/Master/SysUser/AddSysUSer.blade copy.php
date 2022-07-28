@extends('layout/main')
@section('title')
   {{config('app.COMPANYNAME')}} INSURANCE | Agent Profile
@endsection

@section('maincontent')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Add User Maintenance</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('master.ShowSysUser')}}">Inquiry</a></li>
               <li class="breadcrumb-item active">Add User</li>
            </ol>
         </div>
        </div>
    </div><!-- /.container-fluid -->
  </div>

  <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-body">
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label for="RefID">Reference Profile ID</label>
                           <input type="text" class="form-control" id="RefID" name="RefID" placeholder="Reference Profile ID" readonly></input>
                        </div>
                        <div class="col-md-6">
                           <label for="ID">Profile ID</label>
                           <input type="text" class="form-control" id="ID" name="ID" placeholder="Profile ID" readonly></input>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-4">
                           <label for="FirstName">First Name</label>
                           <input type="text" class="form-control" id="FirstName" name="FirstName" placeholder="First Name"></input>
                        </div>
                        <div class="col-md-4">
                           <label for="FirstName">Middle Name</label>
                           <input type="text" class="form-control" id="MidName" name="MidName" placeholder="Middle Name"></input>
                        </div>
                        <div class="col-md-4">
                           <label for="LastName">Last Name</label>
                           <input type="text" class="form-control" id="LastName" name="LastName" placeholder="Last Name"></input>
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
<script src="{{asset('dist/js/Master/SysUser/SysUser.js?1')}}"></script>
@endsection