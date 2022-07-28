@extends('layout/main')
@section('title')
{{config('app.COMPANYNAME')}} INSURANCE | Stored Document
@endsection

@section('maincontent')
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid"></div>
      </section>
      <section class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="card-header">
                        <h5>Stored Document</h5>
                     </div>
                     <div class="card-body">
                        <div class="form-group row">
                           <p class="col-sm-2 col-form-label">Policy No</p>
                           <div class="col-sm-4">
                              <input class="form-control" id="PolicyNo" type="text">
                           </div>
                        </div>
                        <div class="form-group row">
                           <p class="col-sm-2 col-form-label">Document Description</p>
                           <div class="col-sm-4">
                              <input class="form-control" id="Description" type="text">
                           </div>
                        </div>
                        <div class="form-group row">
                           <p class="col-sm-2 col-form-label"></p>
                           <div class="col-sm-4">
                           <button type="button" id="btn-search-profile" class="btn btn-outline-primary">Search</button>
                           </div>
                        </div>
                        <div class="form-group">
                           <table id="tbl-stored-document" class="table table-striped dt-responsive nowrap" width="100%">
                              <thead>
                                 <tr>
                                    <th>No</th>
                                    <th>Client ID</th>
                                    <th>Reference Profile ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>ID Number</th>
                                    <th>Birth Date</th>
                                    <th>Action</th>
                                 </tr>
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