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
            <h1>Create New Client</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('profile')}}">Inquiry</a></li>
               <li class="breadcrumb-item active">Create Profile</li>
            </ol>
         </div>
        </div>
    </div><!-- /.container-fluid -->
  </div>

   <section class="content">
      <div class="overlay-wrapper">
         <form class="form-horizontal form-profile" action="#">
         @csrf 
            <div class="row">
               <div class="col-sm-6">
                  <div class="card">
                     <div class="card-header">
                        <div class="card-title">Client Information</div>
                     </div>
                     <div class="card-body">
                        <div class="form-group row">
                           <p class="col-sm-3 col-form-label"></p>
                           <div class="col-form-label col-sm-2">
                              <input type="checkbox" class="form-check-inputs" id="Corporatef" name="Corporate" value="true">
                              <label class="form-check-label" for="Corporatef">Corporate</label>
                           </div>
                           <p class="col-sm-3 col-form-label"></p>
                           <div class="col-form-label col-sm-2 INDIVIDUAL">
                              <input type="checkbox" class="form-check-inputs" name="Citizen" id="WNIF" value="true" checked>
                              <label class="form-check-label" for="WNIF">WNI</label>
                           </div>
                        </div>
                        <!-- <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Client Type</label>
                           <div class="col-sm-6">
                              <select class="form-control select2bs4" id="Corporatef" name="Corporate"> 
                                 <option value="INDIVIDUAL" selected>INDIVIDUAL</option>
                                 <option value="CORPORATE">CORPORATE</option>
                              </select>
                           </div>
                        </div> -->
                        <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Client ID</label>
                           <div class="col-sm-6">
                              <input class="form-control" id="ID" type="text" name="ProfileID" readonly>
                           </div>
                        </div>
                        <!-- <div class="form-group row">
                           <p class="col-sm-3 col-form-label">Citizenship</p>
                           <div class="col-form-label col-sm-2">
                              <input type="checkbox" class="form-check-inputs" name="Citizen" id="WNIF" value="true" checked>
                              <label class="form-check-label" for="WNIF">Local</label>
                           </div>
                        </div> -->
                        <!-- <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Citizenship</label>
                           <div class="col-sm-6">
                              <select class="form-control select2bs4" id="WNIF" name="WNIF"> 
                                 <option value="WNI" selected>WNI</option>
                                 <option value="WNA">WNA</option>
                              </select>
                           </div>
                        </div> -->
                        <div class="form-group row INDIVIDUAL">
                           <label class="col-sm-3 col-form-label">ID Type</label>
                           <div class="col-sm-6">
                              <select class="form-control select2bs4 required-individual" id="ID_Type" name="IDType" required>
                              </select>
                           </div>
                        </div>
                        <div class="form-group row INDIVIDUAL">
                           <label class="col-sm-3 col-form-label">ID Number</label>
                           <div class="col-sm-6">
                              <input class="form-control required-individual" id="ID_No" type="text" name='ID_Number' minlength="16" maxlength="16" style="text-transform:uppercase" required>
                           </div>
                        </div>
                        <div class="form-group row INDIVIDUAL">
                           <label class="col-sm-3 col-form-label">ID Name</label>
                           <div class="col-sm-6">
                              <input class="form-control required-individual" id="ID_Name" name="ID_Name" type="text" style="text-transform:uppercase" required>
                           </div>
                        </div>
                        <div class="form-group row CORPORATE">
                           <label class="col-sm-3 col-form-label">Legal Entity / Business</label>
                           <div class="col-sm-6">
                              <select class="form-control select2bs4" id="BadanHukum" name="BadanHukum">
                              </select>
                           </div>
                        </div>
                        <div class="form-group row CORPORATE">
                           <label class="col-sm-3 col-form-label">Business Field</label>
                           <div class="col-sm-6">
                              <select class="form-control select2bs4" id="BidangUsaha" name="BidangUsaha">
                              </select>
                           </div>
                        </div>
                        <div class="form-group row CORPORATE">
                           <label class="col-sm-3 col-form-label">Business License Number</label>
                           <div class="col-sm-6">
                              <input class="form-control" id="IzinUsaha" type="text" name='IzinUsaha' style="text-transform:uppercase">
                           </div>
                        </div>
                        <div class="form-group row">
                           <p class="col-sm-3 col-form-label label-tax">Tax ID (NPWP) </p>
                           <div class="col-sm-6">
                              <input class="form-control required-corporate" id="TaxID" type="text" name='Tax' minlength="15" maxlength="15" style="text-transform:uppercase" >
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-sm-3 col-form-label">First Name</label>
                           <div class="col-sm-6">
                              <input class="form-control" id="FirstName" type="text" name='FirstName' minlength="3" style="text-transform:uppercase" onchange="Construct_ProfileName();" required>
                           </div>
                        </div>
                        <div class="form-group row">
                           <p class="col-sm-3 col-form-label">Middle Name</p>
                           <div class="col-sm-6">
                              <input class="form-control" id="MidName" name="MiddleName" type="text" style="text-transform:uppercase" onchange="Construct_ProfileName();">
                           </div>
                        </div>
                        <div class="form-group row">
                           <p class="col-sm-3 col-form-label">Last Name</p>
                           <div class="col-sm-6">
                              <input class="form-control" id="LastName" name="LastName" type="text" style="text-transform:uppercase" onchange="Construct_ProfileName();">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-sm-3 col-form-label label-name">Full Name</label>
                           <div class="col-sm-6">
                              <input class="form-control" id="Name" name="Name" type="text" minlength="3" style="text-transform:uppercase" required>
                           </div>
                        </div>
                        <div class="form-group row INDIVIDUAL">
                           <label class="col-sm-3 col-form-label">Gender</label>
                           <div class="col-sm-6">
                              <select class="form-control select2bs4 required-individual" id="Gender" name="Gender" required> 
                                 <option value="" selected></option>
                                 <option value="FEMALE">Female</option>
                                 <option value="MALE">Male</option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Birth Place / Date</label>
                           <div class="col-sm-4">
                              <input class="form-control" id="BirthPlace" name="BirthPlace" type="text" minlength="3" style="text-transform:uppercase" required>
                           </div>
                           <div class="input-group date col-sm-4" id="div-group-birthdate" data-target-input="nearest">
                              <input type="text" id="BirthDate" name="BirthDate" class="form-control datetimepicker-input" data-target="#div-group-birthdate" />
                              <div class="input-group-append" data-target="#div-group-birthdate" data-toggle="datetimepicker">
                                 <div class="input-group-text">
                                 <i class="fa fa-calendar"></i>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group row INDIVIDUAL">
                           <p class="col-sm-3 col-form-label">Status</p>
                           <div class="col-sm-6">
                              <select class="form-control select2bs4" id="Marital" name="Marital"> 
                                 <option value="" selected></option>
                                 <option value="SINGLE">Single</option>
                                 <option value="MARRIED">Married</option>
                                 <option value="DIVORCE(D)">Divorce To Death</option>  
                              </select>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Phone Number</label>
                           <div class="col-sm-6">
                              <input class="form-control" id="Mobile" name="MobilePhone" type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Email</label>
                           <div class="col-sm-6">
                              <input class="form-control" id="Email" name="Email" type="email" required>
                           </div>
                        </div>
                        <div class="form-group row INDIVIDUAL">
                           <p class="col-sm-3 col-form-label">Employment</p>
                           <div class="col-sm-6">
                              <select class="form-control select2bs4" id="Employment" name="Employment">
                                 <option value="" selected></option>
                                 <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                 <option value="Karyawan Swasta">Karyawan Swasta</option>
                                 <option value="Lainnya">Lainnya</option>
                                 <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                 <option value="PNS">PNS</option>
                                 <option value="TNI/POLRI">TNI/POLRI</option>
                                 <option value="Wiraswasta">Wiraswasta</option>
                                 <option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group row INDIVIDUAL">
                           <p class="col-sm-3 col-form-label">Income</p>
                           <div class="col-sm-6">
                              <select class="form-control select2bs4" id="Income" name="Income">
                                 <option value="" selected></option>
                                 <option value="1-10 juta">1-10 juta</option>
                                 <option value="> 10-25 juta">> 10-25 juta</option>
                                 <option value="> 25-50 juta">> 25-50 juta</option>
                                 <option value="> 50-100 juta">> 50-100 juta</option>
                                 <option value="> 100 juta">> 100 juta</option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group row CORPORATE">
                           <label class="col-sm-3 col-form-label">PIC Name</label>
                           <div class="col-sm-6">
                              <input class="form-control required-corporate" id="Contact" name="Contact" type="text" required>
                           </div>
                        </div>
                        <div class="form-group row CORPORATE">
                           <label class="col-sm-3 col-form-label">PIC Phone</label>
                           <div class="col-sm-6">
                              <input class="form-control required-corporate" id="ContactPhone" name="ConPhone" type="text" required>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="card">
                     <div class="card-header">
                        <div class="card-title">Income Information</div>
                     </div>
                     <div class="card-body">
                        <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Source Income</label>
                           <div class="col-sm-6">
                              <select class="form-control select2bs4" id="OtherIncome" name="OtherIncome">
                                 <option value="" selected></option>
                                 <option value="Hasil Usaha">Hasil Usaha</option>
                                 <option value="Gaji Bulanan">Gaji Bulanan</option>
                                 <option value="Wirausaha">Wirausaha</option>
                                 <option value="Lain-lain">Lain-lain</option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Objective of Business Relationship</label>
                           <div class="col-sm-6">
                              <select class="form-control select2bs4" id="RelationShip" name="RelationShip">
                                 <option value="" selected></option>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card">
                     <div class="card-header">
                        <div class="card-title">Address Information</div>
                     </div>
                     <div class="card-body">
                        <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Address</label>
                           <div class="col-sm-9">
                              <textarea class="form-control" id="Address_1" type="textarea" name='Address1' style="text-transform:uppercase" rows="3" required></textarea>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-sm-3 col-form-label"></label>
                           <div class="col-sm-9">
                              <div class="row">
                                 <label class="no-gutter">RT</label>
                                 <div class="col-sm-3 ml-2">
                                    <input class="form-control" id="SOI" name="SOI" type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                                 </div>
                                 <label class="no-gutter ml-1">RW</label>
                                 <div class="col-sm-3 ml-2">
                                    <input class="form-control" id="MOO" name="MOO" type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Province</label>
                           <div class="col-sm-6">
                              <select class="form-control select2bs4" id="Province" name="Province" required> 
                              </select>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-sm-3 col-form-label">District</label>
                           <div class="col-sm-6">
                              <select class="form-control select2bs4" id="District" name="District" required> 
                              </select>
                           </div>
                        </div>
                        <div class="form-group row">
                           <p class="col-sm-3 col-form-label">Sub District</p>
                           <div class="col-sm-6">
                              <select class="form-control select2bs4" id="SubDistrict" name="SubDistrict"> 
                              </select>
                           </div>
                        </div>
                        <div class="form-group row">
                           <p class="col-sm-3 col-form-label">Village</p>
                           <div class="col-sm-6">
                              <select class="form-control select2bs4" id="Village" name="Village"> 
                              </select>
                           </div>
                        </div>
                        <div class="form-group row">
                           <p class="col-sm-3 col-form-label">Zip Code</p>
                           <div class="col-sm-6">
                              <input class="form-control" id="ZipCode" name="ZipCode" type="text">
                           </div>
                        </div>
                        <div class="form-group row">
                           <p class="col-sm-3 col-form-label">Latitude</p>
                           <div class="col-sm-6">
                              <input class="form-control" id="Latitude" name="Latitude" type="text">
                           </div>
                        </div>
                        <div class="form-group row">
                           <p class="col-sm-3 col-form-label">Longitude</p>
                           <div class="col-sm-6">
                              <input class="form-control" id="Longitude" name="Longitude" type="text">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="row justify-content-center">
                  <div class="col-sm-2 mb-3 no-gutter">
                     <button type="submit" id="clickbtn" class="btn btn-block bg-gradient-primary">Save</button>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </section>
</div>
@endsection
@section('scriptpage')
<script>
   var userID = '{{ session("ID") }}';
   var Role = '{{ session("Role") }}';
   var dataProvince = @json($dataProvince);
   var urlGetDistrict = '{{ route("listDistrict") }}'
   var urlGetSubDistrict = '{{ route("listSubDistrict") }}';
   var urlGetVillage = '{{ route("listVillage") }}';
   var urlSaveProfile = '{{ route("profile.saveagent") }}';
   var dataProfile = @json($dataProfile);
   var dataDistrict = @json($dataDistrict);
   var dataSubDistrict = @json($dataSubDistrict);
   var dataVillage = @json($dataVillage);
</script>
<script src="{{asset('dist/js/Profile/CreateProfileAgent.js?1')}}"></script>
@endsection