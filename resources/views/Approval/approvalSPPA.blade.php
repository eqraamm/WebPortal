@extends('layout/main')

@section('title')
{{config('app.COMPANYNAME')}} INSURANCE | List Of Approval
@endsection

@section('head-linkrel')
<style>
    .dataTables_wrapper .dt-buttons {
        float: right;
    }
</style>
@endsection

@section('maincontent')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <p class="col-sm-2 col-form-label">Search SPPA / Policy No</p>
                                        <div class="col-sm-4">
                                            <input class="form-control" id="SearchSPPA" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <p class="col-sm-2 col-form-label">Status SPPA</p>
                                        <div class="col-sm-4">
                                            <select class="form-control select2bs4" id="Status" name="Status">
                                                <option value="" selected>All</option>
                                                <option value="Approved">Approved</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Reject">Reject</option>
                                                <option value="Need Approval">Need Approval</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8">
                                            <button type="button" id="btn-search-sppa"
                                                class="btn btn-outline-primary">Search</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <table id="tblApproval"
                                            class="table table-hover table-bordered dt-responsive nowrapc" width="100%">
                                        </table>
                                    </div>
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
<script src="{{asset('dist/js/Approval/approvalSPPA.js?')}}"></script>
<script src="{{asset('dist/js/pages/webportal.js?')}}"></script>
<script src=""></script>
@endsection