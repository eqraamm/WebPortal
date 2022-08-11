@extends('layout/main')
@section('title')
   {{config('app.COMPANYNAME')}} INSURANCE | My Profile
@endsection

@section('maincontent')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-sm-1">
               My Profile
            </div>
            <div class="col-sm">
               <button id="btn-karir" type="button" class="btn btn-primary">
                  Jenjang Karir
               </button>
            </div>
            <div class="col-sm">
               <button type="button" class="btn btn-dark float-right" onclick="history.back()">
                  <i class="fas fa-arrow-left"></i>
                  Back
               </button>
            </div>
         </div>
      </div>
   </section>

   <!-- Main content -->
   <section class="content">
      <div class="container">
         <div class="overlay-wrapper">
            <form class="form-horizontal form-profile" action="#"> 
               <div class="row">
                  <div class="col-sm-6">
                     <div class="card">
                        <div class="card-header">
                           <div class="card-title">Profile Photo</div>
                        </div>
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-4">
                                 <a href="https://via.placeholder.com/1000/000000.png?text=Agency+Photo" data-toggle="lightbox" data-max-width="450">
                                    <img src="https://via.placeholder.com/500/000000?text=Agency+Photo" style="max-width:150px;" class="img-fluid mb-2" alt="white sample"/>
                                 </a>
                              </div>
                              <div class="col-md-4">
                                 <a href="https://via.placeholder.com/1000/000000.png?text=Agent+Photo" data-toggle="lightbox" data-max-width="450">
                                    <img src="https://via.placeholder.com/500/000000?text=Agent+Photo" style="max-width:150px;" class="img-fluid mb-2" alt="white sample"/>
                                 </a>
                              </div>
                              <div class="col-md-4">
                                 <a href="https://via.placeholder.com/1000/000000.png?text=AGENT" data-toggle="lightbox" data-max-width="450">
                                    <img src="https://via.placeholder.com/500/000000?text=AGENT" style="max-width:150px;" class="img-fluid mb-2" alt="white sample"/>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="card">
                        <!-- General Information -->
                        <div class="card-header">
                           <div class="card-title">General Information</div>
                        </div>
                        <div class="card-body">
                           <div class="form-group row">
                              <p for="Name" class="col-sm-4 col-form-label">Nama</p>
                              <div class="col-sm">
                                 <input type="text" class="form-control" id="Name" name="Name">
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="Email" class="col-sm-4 col-form-label">Email</p>
                              <div class="col-sm">
                                 <input type="email" class="form-control" id="Email" name="Email">
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="MobileNo" class="col-sm-4 col-form-label">No Hp / No Telp</p>
                              <div class="col-sm">
                                 <input type="text" class="form-control" id="MobileNo" name="MobileNo">
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="Province" class="col-sm-4 col-form-label">Primary Address</p>
                              <div class="col-sm-5">
                                 <select class="form-control" id="Province" name="Province"> 
                                    <option selected value=""></option>
                                    <option value="Individual">D.K.I Jakarta</option>
                                    <option value="Corporate">Jawa Barat</option>
                                 </select>
                              </div>
                              <div class="col-sm-3">
                                 <input type="text" class="form-control" id="ZipCode" name="ZipCode" placeholder="Zip Code">
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="Address_1" class="col-sm-4 col-form-label"></p>
                              <div class="col-sm">
                                 <textarea class="form-control" id="Address_1" name="Address_1" rows="5"></textarea>
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="ProvinceAlt" class="col-sm-4 col-form-label">Alternative Address</p>
                              <div class="col-sm-5">
                                 <select class="form-control select2bs4" id="ProvinceAlt" name="ProvinceAlt"> 
                                    <option value="" selected></option>
                                    <option value="Individual">D.K.I Jakarta</option>
                                    <option value="Corporate">Jawa Barat</option>
                                 </select>
                              </div>
                              <div class="col-sm-3">
                                 <input type="text" class="form-control" id="ZipCodeAlt" name="ZipCodeAlt" placeholder="Zip Code">
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="Address_2" class="col-sm-4 col-form-label"></p>
                              <div class="col-sm">
                                 <textarea class="form-control" id="Address_2" name="Address_2" rows="5"></textarea>
                              </div>
                           </div>
                        </div>
                        <!-- End General Information -->
                     </div>
                     <div class="card">
                        <div class="card-header">
                           <div class="card-title">Individual Information</div>
                        </div>
                        <div class="card-body">
                           <div class="form-group row">
                              <p for="Name" class="col-sm-4 col-form-label">Kewarganegaraan</p>
                              <div class="col-sm">
                                 <input type="text" class="form-control" id="Name" name="Name">
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="ID_No" class="col-sm-4 col-form-label">No. e-KTP</p>
                              <div class="col-sm">
                                 <input type="text" class="form-control" id="ID_No" name="ID_No">
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="BirthPlace" class="col-sm-4 col-form-label">Agent Birth Place/Date</p>
                              <div class="col-sm-4">
                                 <input type="text" class="form-control" id="BirthPlace" name="BirthPlace">
                              </div>
                              <div class="col-sm-4">
                                 <div class="input-group date" id="div-group-birthdate" data-target-input="nearest">
                                    <input type="text" id="BirthDate" name="BirthDate" class="form-control datetimepicker-input" data-target="#div-group-birthdate" placeholder="mm/dd/yyyy" />
                                    <div class="input-group-append" data-target="#div-group-birthdate" data-toggle="datetimepicker">
                                       <div class="input-group-text">
                                          <i class="fa fa-calendar"></i>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="Gender" class="col-sm-4 col-form-label">Agent Gender</p>
                              <div class="col-sm">
                                 <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="Pria" name="Gender" class="custom-control-input" value="Pria">
                                    <label class="custom-control-label" for="Pria">Pria</label>
                                    <!-- <input class="custom-control-input custom-control-input-primary custom-control-input-outline" value="CommAmount" type="radio" id="CommByAmount" name="CommBy">
                                    <label for="CommByAmount" class="custom-control-label">Amount</label> -->
                                 </div>
                                 <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="Wanita" name="Gender" class="custom-control-input" value="Wanita">
                                    <label class="custom-control-label" for="Wanita">Wanita</label>
                                    <!-- <input class="custom-control-input custom-control-input-primary custom-control-input-outline" value="CommPercent" type="radio" id="CommByPercent" name="CommBy">
                                        <label for="CommByPercent" class="custom-control-label">Percentage</label> -->
                                 </div>
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="Religion" class="col-sm-4 col-form-label">Agent Religion</p>
                              <div class="col-sm">
                                 <select class="form-control select2bs4" id="Religion" name="Religion"> 
                                    <option value="" selected></option>
                                    <option value="Muslim">Muslim</option>
                                    <option value="Kristen">Kristen</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="Marital" class="col-sm-4 col-form-label">Marital Status</p>
                              <div class="col-sm">
                                 <select class="form-control select2bs4" id="Marital" name="Marital"> 
                                    <option value="" selected></option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="Employment" class="col-sm-4 col-form-label">Employment</p>
                              <div class="col-sm">
                                 <select class="form-control select2bs4" id="Employment" name="Employment"> 
                                    <option value="" selected></option>
                                    <option value="Employment">Employment</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="card">
                        <div class="card-header">
                           <div class="card-title">Work Information</div>
                        </div>
                        <div class="card-body">
                           <div class="form-group row">
                              <p for="Status" class="col-sm-4 col-form-label">Status</p>
                              <div class="col-sm">
                                 <input type="text" class="form-control" id="Status" name="status" placeholder="<Auto By system>" value="Active">
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="ID" class="col-sm-4 col-form-label">Agent ID</p>
                              <div class="col-sm">
                                 <input type="text" class="form-control" id="ID" name="ID" placeholder="<Auto By system>">
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="AgentType" class="col-sm-4 col-form-label">Agent Type</p>
                              <div class="col-sm">
                                 <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" name="customRadioInline" class="custom-control-input">
                                    <p class="custom-control-label" for="customRadioInline1">Mobile</p>
                                 </div>
                                 <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="customRadioInline" class="custom-control-input">
                                    <p class="custom-control-label" for="customRadioInline2">Non-Mobile</p>
                                 </div>
                                 <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline3" name="customRadioInline" class="custom-control-input">
                                    <p class="custom-control-label" for="customRadioInline3">Travel Agent</p>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="AgentSource" class="col-sm-4 col-form-label">Agent Source</p>
                              <div class="col-sm">
                                 <select class="form-control select2bs4" id="AgentSource" name="AgentSource"> 
                                    <option value="" selected></option>
                                    <option value="Individual">Individual Agent</option>
                                    <option value="Corporate">Corporate Agent</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="AgentLevel" class="col-sm-4 col-form-label">Agent Level</p>
                              <div class="col-sm">
                                 <select class="form-control select2bs4" id="AgentLevel" name="AgentLevel" disabled> 
                                    <option value="Partner" selected>Partner</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="UpAgentID" class="col-sm-4 col-form-label">Upline Agent ID</p>
                              <div class="col-sm">
                                 <input type="text" class="form-control" id="UpAgentID" name="UpAgentID" placeholder="<Auto By system>">
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="POL_Branch" class="col-sm-4 col-form-label">Agent Branch</p>
                              <div class="col-sm">
                                 <select class="form-control select2bs4" id="POL_Branch" name="POL_Branch"> 
                                    <option value="" selected></option>
                                    <option value="01">Jakarta</option>
                                    <option value="02">Duta Merlin</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="AgentBranchWakil" class="col-sm-4 col-form-label">Agent Branch Perwakilan</p>
                              <div class="col-sm">
                                 <select class="form-control select2bs4" id="AgentBranchWakil" name="AgentBranchWakil"> 
                                    <option value="" selected></option>
                                    <option value="01">Jakarta</option>
                                    <option value="02">Duta Merlin</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="KodeUlas" class="col-sm-4 col-form-label">Kode Ulas</p>
                              <div class="col-sm">
                                 <select class="form-control select2bs4" id="KodeUlas" name="KodeUlas"> 
                                    <option value="" selected></option>
                                    <option value="01">01</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="RefID" class="col-sm-4 col-form-label">Profile ID</p>
                              <div class="col-sm">
                                 <input type="text" class="form-control" id="RefID" name="RefID" placeholder="<Auto Get From Core System>">
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="IDSyariah" class="col-sm-4 col-form-label">ID Syariah</p>
                              <div class="col-sm">
                                 <input type="text" class="form-control" id="IDSyariah" name="IDSyariah">
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="ReferenceID" class="col-sm-4 col-form-label">Reference ID</p>
                              <div class="col-sm">
                                 <input type="text" class="form-control" id="ReferenceID" name="ReferenceID">
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Company Information -->
                     <div class="card">
                        <div class="card-header">
                           <div class="card-title">Company Information</div>
                        </div>
                        <div class="card-body">
                           <div class="form-group row">
                              <p for="Contact" class="col-sm-4 col-form-label">PIC Name</p>
                              <div class="col-sm">
                                 <input type="text" class="form-control" id="Contact" name="Contact">
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="ContactPhone" class="col-sm-4 col-form-label">PIC Phone</p>
                              <div class="col-sm">
                                 <input type="text" class="form-control" id="ContactPhone" name="ContactPhone">
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="LicenseNo" class="col-sm-4 col-form-label">Business License No.</p>
                              <div class="col-sm">
                                 <input type="text" class="form-control" id="LicenseNo" name="LicenseNo">
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- End Company Information -->
                     <!-- Taxation Information -->
                     <div class="card">
                        <div class="card-header">
                           <div class="card-title">Taxation Information</div>
                        </div>
                        <div class="card-body">
                           <div class="form-group row">
                              <p for="TaxType" class="col-sm-4 col-form-label">Tax Type</p>
                              <div class="col-sm">
                                 <select class="form-control select2bs4" id="TaxType" name="TaxType"> 
                                    <option value="" selected></option>
                                    <option value="PASAL21">PASAL21</option>
                                    <option value="PASAL23">PASAL23</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="TaxName" class="col-sm-4 col-form-label">Taxation Name</p>
                              <div class="col-sm">
                                 <input type="text" class="form-control" id="TaxName" name="TaxName">
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="TaxID" class="col-sm-4 col-form-label">Taxation ID</p>
                              <div class="col-sm">
                                 <input type="text" class="form-control" id="TaxID" name="TaxID">
                              </div>
                           </div>
                           <div class="form-group row">
                              <p for="PTKP" class="col-sm-4 col-form-label">Status PTKP</p>
                              <div class="col-sm">
                                 <select class="form-control select2bs4" id="PTKP" name="PTKP"> 
                                    <option value="" selected></option>
                                    <option value="PTKP">PTKP</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- End Company Information -->
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="card card-primary card-outline card-tabs">
                        <div class="card-header p-0 pt-1 border-bottom-0">
                           <ul class="nav nav-tabs" id="profile-detail-tab" role="tablist">
                              <li class="nav-item">
                                 <a class="nav-link active" id="profile-tabs-product-tab" data-toggle="pill" href="#profile-tabs-product" role="tab" aria-controls="profile-tabs-product" aria-selected="false">Product</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="profile-tabs-contract-tab" data-toggle="pill" href="#profile-tabs-contract" role="tab" aria-controls="profile-tabs-contract" aria-selected="false">Contract</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="profile-tabs-license-tab" data-toggle="pill" href="#profile-tabs-license" role="tab" aria-controls="profile-tabs-license" aria-selected="false">License</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="profile-tabs-Bank-tab" data-toggle="pill" href="#profile-tabs-Bank" role="tab" aria-controls="profile-tabs-Bank" aria-selected="false">Bank</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="profile-tabs-Document-tab" data-toggle="pill" href="#profile-tabs-Document" role="tab" aria-controls="profile-tabs-Document" aria-selected="false">Document</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="profile-tabs-Training-tab" data-toggle="pill" href="#profile-tabs-Training" role="tab" aria-controls="profile-tabs-Training" aria-selected="false">Training</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="profile-tabs-Level-tab" data-toggle="pill" href="#profile-tabs-Level" role="tab" aria-controls="profile-tabs-Level" aria-selected="false">Level</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="profile-tabs-Kontes-tab" data-toggle="pill" href="#profile-tabs-Kontes" role="tab" aria-controls="profile-tabs-Kontes" aria-selected="false">Kontes</a>
                              </li>
                           </ul>
                        </div>
                        <div class="card-body">
                           <div class="tab-content" id="profile-detail-tab-Content">
                              <div class="tab-pane fade active show" id="profile-tabs-product" role="tabpanel" aria-labelledby="profile-tabs-product-tab">
                                 <div class="row">
                                    <div class="col-sm">
                                       <div class="card-body">
                                          <table id="tblProduct" class="table table-hover table-bordered dt-responsive nowrap" width="100%">
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="profile-tabs-contract" role="tabpanel" aria-labelledby="profile-tabs-contract-tab">
                                 <div class="row">
                                    <div class="col-sm">
                                       <div class="card-body">
                                          <table id="tblContract" class="table table-hover table-bordered dt-responsive nowrap" width="100%">
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="profile-tabs-license" role="tabpanel" aria-labelledby="profile-tabs-license-tab">
                                 <div class="row">
                                    <div class="col-sm">
                                       <div class="card-body">
                                          <table id="tblLicense" class="table table-hover table-bordered dt-responsive nowrap" width="100%">
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="profile-tabs-Bank" role="tabpanel" aria-labelledby="profile-tabs-Bank-tab">
                                 <div class="row">
                                    <div class="col-sm">
                                       <div class="card-body">
                                          <table id="tblBank" class="table table-hover table-bordered dt-responsive nowrap" width="100%">
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="profile-tabs-Document" role="tabpanel" aria-labelledby="profile-tabs-Document-tab">
                                 <div class="row">
                                    <div class="col-sm">
                                       <div class="card-body">
                                          <table id="tblDocument" class="table table-hover table-bordered dt-responsive nowrap" width="100%">
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="profile-tabs-Training" role="tabpanel" aria-labelledby="profile-tabs-Training-tab">
                                 <div class="row">
                                    <div class="col-sm">
                                       <div class="card-body">
                                          <table id="tblTraining" class="table table-hover table-bordered dt-responsive nowrap" width="100%">
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="profile-tabs-Level" role="tabpanel" aria-labelledby="profile-tabs-Level-tab">
                                 <div class="row">
                                    <div class="col-sm">
                                       <div class="card-body">
                                          <table id="tblLevel" class="table table-hover table-bordered dt-responsive nowrap" width="100%">
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="profile-tabs-Kontes" role="tabpanel" aria-labelledby="profile-tabs-Kontes-tab">
                                 <div class="row">
                                    <div class="col-sm">
                                       <div class="card-body">
                                          <table id="tblKontes" class="table table-hover table-bordered dt-responsive nowrap" width="100%">
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </section>
</div>
@endsection

@section('scriptpage')
<script>
   var userData = @json($userData);
   var role = "{{session('Role')}}";
   var url = "{{route('agentleveltree')}}"
</script>
<!-- Ekko Lightbox -->
<script src="{{asset('plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
<script src="{{asset('dist/js/MyProfile/MyProfile.js?1')}}"></script>
@endsection