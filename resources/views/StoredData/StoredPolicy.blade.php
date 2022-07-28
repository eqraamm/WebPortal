@extends('layout/main')
@section('title')
{{config('app.COMPANYNAME')}} INSURANCE | Stored Policy
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
                        <h5>Stored Policy</h5>
                     </div>
                     <div class="card-body">
                        <div class="form-group row">
                           <p class="col-sm-2 col-form-label">Insured</p>
                           <div class="col-sm-4">
                              <input class="form-control" id="Insured" type="text">
                           </div>
                        </div>
                        <div class="form-group row">
                           <p class="col-sm-2 col-form-label">Policy No</p>
                           <div class="col-sm-4">
                              <input class="form-control" id="PolicyNo" type="text">
                           </div>
                        </div>
                        <div class="form-group row">
                           <p class="col-sm-2 col-form-label">Effective Date</p>
                           <div class="input-group date col-sm-3" id="sdate" data-target-input="nearest">
                              <input type="text" id="EffectiveDate" name="TxtSDate" class="form-control datetimepicker-input" data-target="#sdate" placeholder="mm/dd/yyyy" required/>
                              <div class="input-group-append" data-target="#sdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                           </div>
                           <div class="col-sm-1">
                              <input class="form-control" id="EffectiveTime" type="text">
                              <!-- <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask> -->
                           </div>
                        </div>
                        <div class="form-group row">
                           <p class="col-sm-2 col-form-label">Product</p>
                           <div class="col-sm-4">
                              <input class="form-control" id="Product" type="text">
                           </div>
                        </div>
                        <div class="form-group row">
                           <p class="col-sm-2 col-form-label">Info</p>
                           <div class="col-sm-4">
                              <input class="form-control" id="Info" type="text">
                           </div>
                        </div>
                        <div class="form-group row">
                           <p class="col-sm-2 col-form-label">Reference Number</p>
                           <div class="col-sm-4">
                              <input class="form-control" id="RefNo" type="text">
                           </div>
                        </div>
                        <div class="form-group row">
                           <p class="col-sm-2 col-form-label"></p>
                           <div class="col-sm-4">
                           <button type="button" id="btn-searchstoredpolicy" class="btn btn-outline-primary">Search</button>
                           </div>
                        </div>
                        <div class="form-group">
                           <table id="tbl-stored-policy" class="table table-striped dt-responsive nowrap" width="100%">
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
   var URLStoredPolicy = "{{ route('storeddata.searchstoredpolicy') }}";
   var URLStoredDocument = "{{ route('storeddata.showdocument') }}";
   var URLEditIcon = '{{asset("dist/img/edit.svg")}}';
   var URLPDFICON = '{{asset("dist/img/document-pdf.svg")}}';
</script>
<script src="{{asset('dist/js/StoredData/StoredPolicy.js')}}"></script>
@endsection