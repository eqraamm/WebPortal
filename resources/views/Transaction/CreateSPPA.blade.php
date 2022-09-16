@extends('layout/main')
@section('title')
{{config('app.COMPANYNAME')}} INSURANCE | Create SPPA
@endsection
@section('head-linkrel')
<!-- <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> -->
<link rel="stylesheet" href="{{asset('dist/css/transaction.css')}}">
<link rel="stylesheet" href="{{asset('dist/css/modal-preview-image.css')}}">
@endsection

@section('maincontent')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Create SPPA</h1>
            </div>
         </div>
      </div>
   </div>

   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <form id="form-policy" class="needs-validation" onSubmit="return false" novalidate>
                      @csrf
                     <div class="icon mt-3 mb-3" style="width: 100%; text-align: center; border:1px;">
                        <button id="img-btn-save" href="#" class="btn" style="overflow:hidden; color: Dodgerblue;" data-toggle="tooltip" data-placement="top" title="Save">
                           <i class="fas fa-save fa-2x"></i>
                           <!-- <caption style="width: auto;">record</caption> -->
                        </button>
                        <button id="img-btn-preview" href="#" class="btn" style="overflow:hidden; color: Dodgerblue;" data-toggle="tooltip" data-placement="top" title="preview" disabled>
                           <i class="fas fa-file-pdf fa-2x"></i>
                        </button>
                        <button id="img-btn-send" href="#" class="btn" style="overflow:hidden; color: Dodgerblue;" data-toggle="tooltip" data-placement="top" title="Send Confirmation">
                           <i class="far fa-paper-plane fa-2x"></i>
                        </button>
                        <button id="img-btn-sign" href="#" class="btn" style="overflow:hidden; color: Dodgerblue;" data-toggle="tooltip" data-placement="top" title="Sign SPPA">
                           <i class="fas fa-file-signature fa-2x"></i>
                        </button>
                        <button id="img-btn-revise" href="#" class="btn" style="overflow:hidden; color: #ffac54;" data-toggle="tooltip" data-placement="top" title="Revise">
                           <i class="fas fa-edit fa-2x"></i>
                        </button>
                        <button id="img-btn-submit" href="#" class="btn" style="overflow:hidden; color: #57a63f;" data-toggle="tooltip" data-placement="top" title="Submit">
                           <i class="fas fa-check fa-2x"></i>
                        </button>
                        <button id="img-btn-clear" href="#" class="btn float-right" style="overflow:hidden; color: #ff1100;" data-toggle="tooltip" data-placement="top" title="Clear All">
                           <i class="fas fa-times-circle fa-2x"></i>
                        </button>
                     </div>
                     <div id="stepper-policy" class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                           <!-- your steps here -->
                           <div class="step" data-target="#policy-part">
                              <button type="button" class="step-trigger" role="tab" aria-controls="policy-part" id="policy-part-trigger">
                                 <span class="bs-stepper-circle">1</span>
                                 <span class="bs-stepper-label">SPPA Information</span>
                              </button>
                           </div>
                           <div class="line"></div>
                           <div class="step" data-target="#information-part">
                              <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                 <span class="bs-stepper-circle">2</span>
                                 <span class="bs-stepper-label">Object Information</span>
                              </button>
                           </div>
                           <div class="line"></div>
                           <div class="step" data-target="#risk-part">
                              <button type="button" class="step-trigger" role="tab" aria-controls="risk-part" id="risk-part-trigger">
                                 <span class="bs-stepper-circle">3</span>
                                 <span class="bs-stepper-label">Risk</span>
                              </button>
                           </div>
                           @if (session('Role') == 'MARKETING OFFICER')
                              <div class="line"></div>
                              <div class="step" data-target="#payor-part">
                              <button type="button" class="step-trigger" role="tab" aria-controls="payor-part" id="payor-part-trigger">
                                 <span class="bs-stepper-circle">4</span>
                                 <span class="bs-stepper-label">Payor</span>
                              </button>
                              </div>
                           @endif
                           <div class="line"></div>
                           <div class="step" data-target="#others-part">
                              <button type="button" class="step-trigger" role="tab" aria-controls="others-part" id="others-part-trigger">
                                 <span class="bs-stepper-circle">{{ session('Role') == 'MARKETING OFFICER' ? 5 : 4 }}</span>
                                 <span class="bs-stepper-label">Others</span>
                              </button>
                           </div>
                        </div>
                        <div class="bs-stepper-content">
                           <!-- your steps content here -->
                           <div id="policy-part" class="bs-stepper-pane fade" role="tabpanel" aria-labelledby="policy-part-trigger">
                              <div class="card">
                                 <div class="card-header">
                                    <div class="card-title">Product & Coverage</div>
                                 </div>
                              </div>
                           </div>
                           <div id="information-part" class="bs-stepper-pane fade" role="tabpanel" aria-labelledby="information-part-trigger">
                           information
                           </div>
                           <div id="risk-part" class="bs-stepper-pane fade" role="tabpanel" aria-labelledby="risk-part-trigger">

                           </div>
                           @if (session('Role') == 'MARKETING OFFICER')
                           <div id="payor-part" class="bs-stepper-pane fade" role="tabpanel" aria-labelledby="payor-part-trigger">
                           
                           </div>
                           @endif
                           <div id="others-part" class="bs-stepper-pane fade" role="tabpanel" aria-labelledby="others-part-trigger">

                           </div>
                        </div>
                     </div>
                  </form>
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
   var urlSearchPolicy = '{{ route("policy.listPolicy") }}';
</script>
<script src="{{asset('dist/js/Transaction/CreateSPPA.js')}}"></script>
@endsection