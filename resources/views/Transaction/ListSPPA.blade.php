@extends('layout/main')
@section('title')
{{config('app.COMPANYNAME')}} INSURANCE | List SPPA
@endsection

@section('maincontent')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>SPPA List</h1>
            </div>
         </div>
      </div>
   </div>

   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-body">
                     <div class="form-group row">
                        <div class="col-sm-12">
                           <a type="button" class="btn btn-outline-primary float-right" href="{{route('policy.transaction')}}">
                              <i class="fas fa-plus"></i>
                              Add New
                           </a>
                        </div>
                     </div>
                     <div class="form-group row">
                        <p class="col-sm-2 col-form-label">SPPA Numbber</p>
                        <div class="col-sm-3">
                           <input class="form-control" id="RefNo" type="text">
                        </div>
                     </div>
                     <div class="form-group row">
                        <p class="col-sm-2 col-form-label">SPPA Status</p>
                        <div class="col-sm-3">
                           <select class="form-control select2bs4" id="PStatus" name="Role"> 
                              <option value="" selected></option>
                              <option value="R">Request</option>
                              <option value="S">Waiting Confirmation</option>
                              <option value="P">Process</option>
                              <option value="C">Closed</option>
                              <option value="T">Temporary Submit</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row">
                        <p class="col-sm-2 col-form-label">Insured Name</p>
                        <div class="col-sm-3">
                           <input class="form-control" id="InsuredName" type="text">
                        </div>
                     </div>
                     <div class="form-group row">
                        <p class="col-sm-2 col-form-label"></p>
                        <div class="col-sm-4">
                           <button type="button" id="btn-search" class="btn btn-outline-primary">Search</button>
                        </div>
                    </div>
                     <div class="form-group">
                        <table id="tbl-sppa" class="table table-hover table-bordered dt-responsive nowrap" width="100%">
                           <thead class="bg-primary">
                              <th>No</th>
                              <th>PID</th>
                              <th>Reference Number</th>
                              <th>Policy Number</th>
                              <th>Type</th>
                              <th>SPPA Status</th>
                              <th>Name</th>
                              <th>Coverage</th>
                              <th>Product</th>
                              <th>Period</th>
                              <th>Total Sum Insured</th>
                              <th>Premium</th>
                              <th>Action</th>
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
   var dataProfile = @json($listmo);
   var edit = '{{asset("dist/img/edit.svg")}}';
   var file = '{{asset("dist/img/file.svg")}}';
   var trash = '{{asset("dist/img/trash.svg")}}';
   var urlSearchPolicy = '{{ route("policy.listPolicy") }}';
</script>
<script src="{{asset('dist/js/Transaction/ListSPPA.js')}}"></script>
@endsection