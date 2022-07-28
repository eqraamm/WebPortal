@extends('layout/main')
@section('title')
@if (session('Role') != 'ADMIN')
   {{config('app.COMPANYNAME')}} INSURANCE | Business Source
@else
   {{config('app.COMPANYNAME')}} INSURANCE | User Maintenance
@endif
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
                            <div class="modal fade" id="modal-sync" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form class="form-horizontal form-sync" action="{{ route('profile.sync') }}"
                                            method="post">
                                            <div id="div-overlay"></div>
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="titleModalSync">Profile Inquiry</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @csrf
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Profile ID</label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" id="TxtProfileIDModal" type="text"
                                                            name="ProfileID">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Name</label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" id="TxtProfileNameModal" name="Name"
                                                            type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <p class="col-sm-3 col-form-label">Email</p>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" id="TxtProfileEmailModal"
                                                            name="Email" type="email">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <p class="col-sm-3 col-form-label">Address</p>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" id="TxtPAddress_1Modal"
                                                            name="Address1" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <p class="col-sm-3 col-form-label">City</p>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" id="ModalTxtCity" name="CityModal"
                                                            style="text-transform:uppercase;" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <p class="col-sm-3 col-form-label">ZipCode</p>
                                                    <div class="col-sm-3">
                                                        <input class="form-control" id="TxtProfileZipCodeModal"
                                                            name="ZipCode" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <p class="col-sm-3 col-form-label">ID Number</p>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" id="ID_NumberModal" name="ID_Number"
                                                            type="text" maxlength="16">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <p class="col-sm-3 col-form-label">Mobile Phone</p>
                                                    <div class="col-sm-3">
                                                        <input class="form-control" id="TxtProfileMobileModal"
                                                            name="MobilePhone" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <p class="col-sm-3 col-form-label">Tax ID</p>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" id="TxtTaxIDModal" type="text"
                                                            oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                                                            name="TaxModal">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <p class="col-sm-3 col-form-label">Birth Date</p>
                                                    <div class="input-group date col-sm-3" id="div-group-modalbirthdate"
                                                        data-target-input="nearest">
                                                        <input type="text" id="ModalTxtBirthDate" name="ModalBirthDate"
                                                            class="form-control datetimepicker-input"
                                                            data-target="#div-group-modalbirthdate" />
                                                        <div class="input-group-append"
                                                            data-target="#div-group-modalbirthdate"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="reset" class="btn btn-secondary">Clear All</button>
                                                <Button type="submit" class="btn btn-primary sync-profile" id="search"
                                                    name="search">Search</button>
                                            </div>
                                            <div class="card-body" id="cardbodyModalSync">
                                                <table id="tblSync" class="table table-bordered table-striped"
                                                    style="width:100%"></table>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <form class="form-horizontal form-save" id="needs-validation"
                                action="{{ route('profile.save') }}" method="post">
                                @csrf
                                <div class="form-group row" style="display:none;">
                                    <div class="col-md-2 ml-auto">
                                        <button type="delete" id="Btn-Upload"
                                            class="btn btn-block btn-outline-info btn-upload">Upload Document</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2 ml-auto">
                                        <button type="button" id="btn-sync" class="btn btn-block btn-outline-info"
                                            disabled>Refresh Data</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <a class="col-sm-3 col-form-label" type="button" data-toggle="modal"
                                        data-target="#modal-sync">Reference Profile ID</a>
                                    <!-- <p for="TxtRefNo" class="col-sm-3 col-form-label">Reference Profile ID</p> -->
                                    <div class="col-sm-6">
                                        <input class="form-control" id="RefID" name="RefID" type="text"
                                            readonly="readonly">
                                    </div>
                                    <div class="col-sm-4" style="display:none;">
                                        <input class="form-control" id="RefName" name="RefName" type="text">
                                    </div>
                                    <!-- <div class="col-sm-2">
                           <button type="button" id="BtnSync" class="btn btn-block btn-outline-primary" data-toggle="modal" data-target="#modal-sync">Inquiry From Core</button>
                        </div> -->
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Profile ID</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="ID" type="text" name="ProfileID" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">First Name</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="FirstName" type="text" name='FirstName'
                                            minlength="3" style="text-transform:uppercase"
                                            onchange="Construct_ProfileName();" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Middle Name</p>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="MidName" name="MiddleName" type="text"
                                            style="text-transform:uppercase" onchange="Construct_ProfileName();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Last Name</p>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="LastName" name="LastName" type="text"
                                            style="text-transform:uppercase" onchange="Construct_ProfileName();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Full Name</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="Name" name="Name" type="text" minlength="3"
                                            style="text-transform:uppercase" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Corporate</p>
                                    <div class="col-form-label col-sm-2">
                                        <input type="checkbox" class="form-check-inputs" id="Corporatef"
                                            name="Corporate" value="true" onclick="corporateF_chekcked()">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Salutation</p>
                                    <div class="col-sm-3">
                                        <select class="form-control select2bs4" id="Salutation" name="Salutation">
                                            <option value="" selected></option>
                                            <option value="APOTIK">APOTIK</option>
                                            <option value="BALKESMAS">BALKESMAS</option>
                                            <option value="BIDAN">BIDAN</option>
                                            <option value="BP">BP</option>
                                            <option value="CV">CV</option>
                                            <option value="KLINIK">KLINIK</option>
                                            <option value="Miss">Miss</option>
                                            <option value="Mr">Mr</option>
                                            <option value="Mrs">Mrs</option>
                                            <option value="N/A">N/A</option>
                                            <option value="Nn">Nn</option>
                                            <option value="Ny">Ny</option>
                                            <option value="OPTIK">OPTIK</option>
                                            <option value="PD">PD</option>
                                            <option value="PT">PT</option>
                                            <option value="PUSKESMAS">PUSKESMAS</option>
                                            <option value="RB">RB</option>
                                            <option value="RS">RS</option>
                                            <option value="RSIA">RSIA</option>
                                            <option value="RSUD">RSUD</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Initial</p>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="Initial" name="Initial" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Title</p>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="Title" name="Title" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email Address</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="Email" name="Email" type="email" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Mobile Phone</label>
                                    <div class="col-sm-3">
                                        <input class="form-control" id="Mobile" name="MobilePhone" type="text"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Phone</p>
                                    <div class="col-sm-3">
                                        <input class="form-control" id="Phone" name="Phone" type="text"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">User Owner</p>
                                    <div class="col-sm-3">
                                        <input class="form-control" id="OwnerID" type="text" name="UserOwner"
                                            value="{{ Session::get('ID')}}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Address 1</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="Address_1" name="Address1" type="text" required>
                                    </div>
                                </div>
                                @if (config('app.DETAILADDRESSF'))
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-2">
                                        <label for="RT">RT</label>
                                        <input class="form-control" id="SOI" name="SOI" type="text"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="RW">RW</label>
                                        <input class="form-control" id="MOO" name="MOO" type="text"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="Province">Province</label>
                                        <select class="form-control select2bs4" id="Province" name="Province" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-2">
                                        <label for="District">District</label>
                                        <select class="form-control select2bs4" id="District" name="District" required>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="SubDistrict">Sub District</label>
                                        <select class="form-control select2bs4" id="SubDistrict" name="SubDistrict"
                                            required>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="Village">Village</label>
                                        <select class="form-control select2bs4" id="Village" name="Village" required>
                                        </select>
                                    </div>
                                </div>
                                @endif
                                <!-- <div class="form-group row">
                     <label class="col-sm-3 col-form-label"></label>
                        
                     </div> -->
                                <div class="form-group row" style=>
                                    <p class="col-sm-3 col-form-label">Address 2</p>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="Address_2" name="Address2" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Address 3</p>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="Address_3" name="Address3" type="text">
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                        <p class="col-sm-3 col-form-label">Country / City</p>
                        <div class="col-sm-3">
                           <select class="form-control select2bs4" id="Country" name="Country"> 
                           </select>
                        </div>
                        <div class="col-sm-3">
                           <input class="form-control" id="City" name="City" style="text-transform:uppercase" type="text">
                        </div>
                     </div> -->
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Country</label>
                                    <div class="col-sm-3">
                                        <select class="form-control select2bs4" id="Country" name="Country" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Profile Type</label>
                                    <div class="col-sm-3">
                                        <select class="form-control select2bs4" id="PType" name="PType" required>
                                            <option value="" selected></option>
                                            <option value="C">Captive</option>
                                            <option value="D">Direct Business</option>
                                            <option value="I">Inward Business</option>
                                            <!-- <option value="M">Intermediaries</option> -->
                                            <option value="O">Outward Business</option>
                                            <option value="T">Others</option>
                                        </select>
                                    </div>
                                </div>
                                @if (!config('app.DETAILADDRESSF'))
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Province</label>
                                    <div class="col-sm-3">
                                        <select class="form-control select2bs4" id="Province" name="Province" required>
                                        </select>
                                    </div>
                                </div>
                                @endif
                                <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">ZipCode</p>
                                    <div class="col-sm-3">
                                        <input class="form-control" id="ZipCode" name="ZipCode" type="text"
                                            maxlength="10">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Line of Business</label>
                                    <div class="col-sm-3">
                                        <select class="form-control select2bs4" id="Occupation" name="Occupation"
                                            required>
                                        </select>
                                    </div>
                                </div>
                                @if (config('app.SHOWPALIAS'))
                                <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Correspondence Name</p>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="Correspondence_Attention" name="CoName"
                                            type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Correspondence Address</p>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="Correspondence_Address" name="CoAddress"
                                            type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Correspondence Phone</p>
                                    <div class="col-sm-3">
                                        <input class="form-control" id="Correspondence_Phone" name="CoPhone" type="text"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Correspondence Email</p>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="Correspondence_Email" name="CoEmail"
                                            type="email">
                                    </div>
                                </div>
                                @endif
                                <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Syncronize Profile</p>
                                    <div class="col-form-label col-sm-2">
                                        <input type="checkbox" class="form-check-inputs" id="ForceSyncF" name="Sync"
                                            value="true">
                                    </div>
                                </div>
                                <div class="form-group row" style="display:none;">
                                    <p class="col-sm-3 col-form-label">Dump</p>
                                    <div class="col-form-label col-sm-2">
                                        <input type="checkbox" class="form-check-inputs" id="DumpF" name="Dump"
                                            value="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Restricted</p>
                                    <div class="col-form-label col-sm-2">
                                        <input type="checkbox" class="form-check-inputs" id="Restrictedf"
                                            name="Restricted" value="true" disabled>
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                        <span class="col-sm-3 col-form-label">Created By</span>
                        <div class="col-form-label col-sm-4">
                           <p id="Created" name="owner"></p>
                        </div>
                     </div>
                     <div class="form-group row">
                        <p class="col-sm-3 col-form-label">Last Updated</p>
                        <div class="col-form-label col-sm-4">
                           <p id="LastUpdate" name="owner"></p>
                        </div>
                     </div> -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card card-primary card-outline card-tabs">
                                            <div class="card-header p-0 pt-1 border-bottom-0">
                                                <ul class="nav nav-tabs" id="profile-detail-tab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="profile-tabs-company-tab"
                                                            data-toggle="pill" href="#profile-tabs-company" role="tab"
                                                            aria-controls="profile-tabs-company"
                                                            aria-selected="false">Company Info</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="profile-tabs-personal-tab"
                                                            data-toggle="pill" href="#profile-tabs-personal" role="tab"
                                                            aria-controls="profile-tabs-personal"
                                                            aria-selected="false">Personal Info</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="profile-tabs-tax-tab" data-toggle="pill"
                                                            href="#profile-tabs-tax" role="tab"
                                                            aria-controls="profile-tabs-tax"
                                                            aria-selected="false">Taxation</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="tab-content" id="profile-detail-tab-Content">
                                                    <div class="tab-pane fade active show" id="profile-tabs-company"
                                                        role="tabpanel" aria-labelledby="profile-tabs-company-tab">
                                                        <div class="form-group row">
                                                            <p class="col-sm-3 col-form-label" id="LblPicName">PIC Name
                                                            </p>
                                                            <div class="col-sm-6">
                                                                <input class="form-control" id="Contact" minlength="3"
                                                                    name="Contact" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <p class="col-sm-3 col-form-label">PIC Address</p>
                                                            <div class="col-sm-6">
                                                                <input class="form-control" id="ContactAddress"
                                                                    name="ConAddress" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <p class="col-sm-3 col-form-label">PIC Phone</p>
                                                            <div class="col-sm-3">
                                                                <input class="form-control" id="ContactPhone"
                                                                    name="ConPhone" type="text"
                                                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <p class="col-sm-3 col-form-label" id="LblCType">Company
                                                                Type</p>
                                                            <div class="col-sm-3">
                                                                <select class="form-control select2bs4" id="CompanyType"
                                                                    name="CompanyType">
                                                                    <option value="" selected></option>
                                                                    <option value="BUMN">BUMN</option>
                                                                    <option value="BUMD">BUMD</option>
                                                                    <option value="CAPTIVE">CAPTIVE</option>
                                                                    <option value="Direct Business (Ex.">Direct Business
                                                                        (Ex.</option>
                                                                    <option value="GOVERNMENT">GOVERNMENT</option>
                                                                    <option value="J.VENTURE">J.VENTURE</option>
                                                                    <option value="JOINT VENTURE">JOINT VENTURE</option>
                                                                    <option value="OVERSEAS">OVERSEAS</option>
                                                                    <option value="SWASTA">SWASTA</option>
                                                                    <option value="PRIVATE">PRIVATE</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <p class="col-sm-3 col-form-label" id="LblCGroup">Company
                                                                Group</p>
                                                            <div class="col-sm-3">
                                                                <select class="form-control select2bs4" id="CGroup"
                                                                    name="CGroup"
                                                                    onchange="CGroup_OnChange(this.value)">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <p class="col-sm-3 col-form-label" id="LblSCGroup">Sub
                                                                Company Group</p>
                                                            <div class="col-sm-3">
                                                                <select class="form-control select2bs4" id="SCGroup"
                                                                    name="SubCompanyGroup">
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="profile-tabs-personal"
                                                        role="tabpanel" aria-labelledby="profile-tabs-personal-tab">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <dl class="row">
                                                                    <div class="col-sm-3">
                                                                        <p class="col-form-label" id="LblGender">
                                                                            Gender
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <select class="form-control select2bs4"
                                                                            id="Gender" name="Gender" required>
                                                                            <option value="" selected></option>
                                                                            <option value="FEMALE">Female</option>
                                                                            <option value="MALE">Male</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <label
                                                                            class="col-form-label">Citizenship</label>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <input type="checkbox" class="form-check-inputs"
                                                                            name="Citizen" id="WNIF" value="true"
                                                                            checked>
                                                                        <label class="form-check-label"
                                                                            for="WNIF">Local</label>
                                                                    </div>
                                                                </dl>
                                                                <dl class="row">
                                                                    <div class="col-sm-3">
                                                                        <p class="col-form-label" id="LblIDType">ID Type
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <select class="form-control select2bs4"
                                                                            id="ID_Type" name="IDType"
                                                                            onchange="LstIDType_Change()" required>
                                                                            <option value="" selected></option>
                                                                            <option value="Driving License">Driving
                                                                                License</option>
                                                                            <option value="ID Card">ID Card</option>
                                                                            <option value="KIMS">KIMS</option>
                                                                            <option value="KITAS(P)">KITAS(P)</option>
                                                                            <option value="KTP">KTP</option>
                                                                            <option value="OTHERS">OTHERS</option>
                                                                            <option value="Passport">Passport</option>
                                                                            <option value="SIM">SIM</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <p class="col-form-label" id="LblBirthPlace">
                                                                            Birth Place</p>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <input class="form-control" id="BirthPlace"
                                                                            name="BirthPlace"
                                                                            style="text-transform:uppercase"
                                                                            type="text">
                                                                        </dd>
                                                                </dl>
                                                                <dl class="row">
                                                                    <div class="col-sm-3">
                                                                        <p class="col-form-label" id="LblID_Number">ID
                                                                            Number</p>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <input class="form-control" id="ID_No"
                                                                            name="ID_Number" type="text" required>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <p class="col-form-label" id="LblBirthDate">
                                                                            Birth Date</p>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="input-group date"
                                                                            id="div-group-birthdate"
                                                                            data-target-input="nearest">
                                                                            <input type="text" id="BirthDate"
                                                                                name="BirthDate"
                                                                                class="form-control datetimepicker-input"
                                                                                data-target="#div-group-birthdate"
                                                                                placeholder="mm/dd/yyyy" />
                                                                            <div class="input-group-append"
                                                                                data-target="#div-group-birthdate"
                                                                                data-toggle="datetimepicker">
                                                                                <div class="input-group-text">
                                                                                    <i class="fa fa-calendar"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </dl>
                                                                <dl class="row">
                                                                    <div class="col-sm-3">
                                                                        <p class="col-form-label" id="LblID_Name">ID
                                                                            Name</p>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <input class="form-control" id="ID_Name"
                                                                            name="ID_Name" type="text"
                                                                            style="text-transform:uppercase" required>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <p class="col-form-label">Marital Status</p>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <select class="form-control select2bs4"
                                                                            id="Marital" name="Marital">
                                                                            <option value="" selected></option>
                                                                            <option value="SINGLE">Single</option>
                                                                            <option value="MARRIED">Married</option>
                                                                            <option value="DIVORCE(D)">Divorce To Death
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </dl>
                                                                <dl class="row">
                                                                    <div class="col-sm-3">
                                                                        <p class="col-form-label">ID Date</p>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="input-group date"
                                                                            id="div-group-iddate"
                                                                            data-target-input="nearest">
                                                                            <input type="text" id="ID_Date"
                                                                                name="IDDate"
                                                                                class="form-control datetimepicker-input"
                                                                                data-target="#div-group-iddate"
                                                                                placeholder="mm/dd/yyyy" />
                                                                            <div class="input-group-append"
                                                                                data-target="#div-group-iddate"
                                                                                data-toggle="datetimepicker">
                                                                                <div class="input-group-text">
                                                                                    <i class="fa fa-calendar"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <p class="col-form-label">Religion</p>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <select class="form-control select2bs4"
                                                                            id="Religion" name="Religion">
                                                                            <option value="" selected></option>
                                                                            <option value="BUDDHA">BUDDHA</option>
                                                                            <option value="CATHOLIC">CATHOLIC</option>
                                                                            <option value="CHRISTIAN">CHRISTIAN</option>
                                                                            <option value="HINDU">HINDU</option>
                                                                            <option value="KONGHUCU">KONGHUCU</option>
                                                                            <option value="MOSLEM">MOSLEM</option>
                                                                            <option value="OTHERS">OTHERS</option>
                                                                        </select>
                                                                    </div>
                                                                </dl>
                                                                <dl class="row">
                                                                    <div class="col-sm-3">
                                                                        <p class="col-form-label">Employment</p>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <select class="form-control select2bs4"
                                                                            id="Employment" name="Employment">
                                                                            <option value="" selected></option>
                                                                            <option value="Ibu Rumah Tangga">Ibu Rumah
                                                                                Tangga</option>
                                                                            <option value="Karyawan Swasta">Karyawan
                                                                                Swasta</option>
                                                                            <option value="Lainnya">Lainnya</option>
                                                                            <option value="Pelajar/Mahasiswa">
                                                                                Pelajar/Mahasiswa</option>
                                                                            <option value="PNS">PNS</option>
                                                                            <option value="TNI/POLRI">TNI/POLRI</option>
                                                                            <option value="Wiraswasta">Wiraswasta
                                                                            </option>
                                                                            <option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <p class="col-form-label">Income</p>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <select class="form-control select2bs4"
                                                                            id="Income" name="Income">
                                                                            <option value="" selected></option>
                                                                            <option value="1-10 juta">1-10 juta</option>
                                                                            <option value="> 10-25 juta">> 10-25 juta
                                                                            </option>
                                                                            <option value="> 25-50 juta">> 25-50 juta
                                                                            </option>
                                                                            <option value="> 50-100 juta">> 50-100 juta
                                                                            </option>
                                                                            <option value="> 100 juta">> 100 juta
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </dl>
                                                            </div>
                                                        </div>

                                                        <!-- <div class="form-group row">
                                    <p class="col-sm-3 col-form-label" id="LblGender">Gender</p>
                                    <div class="col-sm-3">
                                       <select class="form-control select2bs4" id="Gender" name="Gender" required> 
                                       <option value="" selected></option>
                                       <option value="FEMALE">Female</option>
                                       <option value="MALE">Male</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <p class="col-sm-3 col-form-label" id="LblBirthDate">Birth Place</p>
                                    <div class="col-sm-3">
                                       <input class="form-control" id="BirthPlace" name="BirthPlace" style="text-transform:uppercase" type="text" >
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <p class="col-sm-3 col-form-label" id="LblBirthDate">Birth Date</p>
                                    <div class="input-group date col-sm-3" id="div-group-birthdate" data-target-input="nearest">
                                       <input type="text" id="BirthDate" name="BirthDate" class="form-control datetimepicker-input" data-target="#div-group-birthdate" placeholder="mm/dd/yyyy" />
                                       <div class="input-group-append" data-target="#div-group-birthdate" data-toggle="datetimepicker">
                                       <div class="input-group-text">
                                          <i class="fa fa-calendar"></i>
                                       </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Marital Status</p>
                                    <div class="col-sm-3">
                                       <select class="form-control select2bs4" id="Marital" name="Marital"> 
                                       <option value="" selected></option>
                                       <option value="SINGLE">Single</option>
                                       <option value="MARRIED">Married</option>
                                       <option value="DIVORCE(D)">Divorce To Death</option>  
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Religion</p>
                                    <div class="col-sm-3">
                                       <select class="form-control select2bs4" id="Religion" name="Religion"> 
                                       <option value="" selected></option>
                                       <option value="BUDDHA">BUDDHA</option>
                                       <option value="CATHOLIC">CATHOLIC</option>
                                       <option value="CHRISTIAN">CHRISTIAN</option>
                                       <option value="HINDU">HINDU</option>
                                       <option value="KONGHUCU">KONGHUCU</option>
                                       <option value="MOSLEM">MOSLEM</option>
                                       <option value="OTHERS">OTHERS</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <p class="col-sm-3 col-form-label" id="LblIDType">ID Type</p>
                                    <div class="col-sm-3">
                                       <select class="form-control select2bs4" id="ID_Type" name="IDType" onchange="LstIDType_Change()">
                                       <option value="" selected></option> 
                                       <option value="Driving License">Driving License</option>
                                       <option value="ID Card">ID Card</option>
                                       <option value="KIMS">KIMS</option>
                                       <option value="KITAS(P)">KITAS(P)</option>                          
                                       <option value="KTP">KTP</option>
                                       <option value="OTHERS">OTHERS</option>
                                       <option value="Passport">Passport</option>
                                       <option value="SIM">SIM</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <p class="col-sm-3 col-form-label" id="LblID_Number">ID Number</p>
                                    <div class="col-sm-3">
                                       <input class="form-control" id="ID_No" name="ID_Number" type="text" required>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <p class="col-sm-3 col-form-label" id="LblID_Name">ID Name</p>
                                    <div class="col-sm-3">
                                       <input class="form-control" id="ID_Name" name="ID_Name" type="text" style="text-transform:uppercase" required>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">ID Date</p>
                                    <div class="input-group date col-sm-3" id="div-group-iddate" data-target-input="nearest">
                                       <input type="text" id="ID_Date" name="IDDate" class="form-control datetimepicker-input" data-target="#div-group-iddate" placeholder="mm/dd/yyyy" />
                                       <div class="input-group-append" data-target="#div-group-iddate" data-toggle="datetimepicker">
                                       <div class="input-group-text">
                                          <i class="fa fa-calendar"></i>
                                       </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Citizenship</label>
                                    <div class="col-form-label col-sm-2">
                                       <input type="checkbox" class="form-check-inputs" name="Citizen" id="WNIF" value="true" checked>
                                       <label class="form-check-label" for="exampleCheck2">Local</label>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Employment</p>
                                    <div class="col-sm-3">
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
                                 <div class="form-group row">
                                    <p class="col-sm-3 col-form-label">Income</p>
                                    <div class="col-sm-3">
                                       <select class="form-control select2bs4" id="Income" name="Income">
                                       <option value="" selected></option>
                                       <option value="1-10 juta">1-10 juta</option>
                                       <option value="> 10-25 juta">> 10-25 juta</option>
                                       <option value="> 25-50 juta">> 25-50 juta</option>
                                       <option value="> 50-100 juta">> 50-100 juta</option>
                                       <option value="> 100 juta">> 100 juta</option>
                                       </select>
                                    </div>
                                 </div> -->
                                                    </div>
                                                    <div class="tab-pane fade" id="profile-tabs-tax" role="tabpanel"
                                                        aria-labelledby="profile-tabs-tax-tab">
                                                        <div class="form-group row">
                                                            <p class="col-sm-3 col-form-label" id="LblTaxID">Tax ID</p>
                                                            <div class="col-sm-3">
                                                                <input class="form-control" id="TaxID" type="text"
                                                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                                                                    name="Tax">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <p class="col-sm-3 col-form-label" id="LblTaxName">Tax Name
                                                            </p>
                                                            <div class="col-sm-6">
                                                                <input class="form-control" id="TaxName" type="text"
                                                                    name="TaxName">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <p class="col-sm-3 col-form-label" id="LblTaxAddress">Tax
                                                                Address</p>
                                                            <div class="col-sm-6">
                                                                <input class="form-control" id="TaxAddress" type="text"
                                                                    name="TaxAddress">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <div class="col-sm-4">
                                        <button type="submit" id="clickbtn"
                                            class="btn btn-block bg-gradient-primary col-5">Save</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="button" id="clearbtn"
                                            class="btn btn-block bg-gradient-danger col-5">Clear</button>
                                    </div>
                                </div>
                            </form>
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
   $('#OwnerID').val("{{ session('ID') }}");
   let arrSCGroup = [];
   let formData = '';
</script>
<script src="{{asset('dist/js/Master/SysUser/SysUser.js?1')}}"></script>
@endsection
