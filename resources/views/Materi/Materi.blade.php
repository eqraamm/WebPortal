@extends('layout/main')

@section('title')
{{config('app.COMPANYNAME')}} INSURANCE | Learning Object
@endsection

@section('head-linkrel')
<style>

</style>
<link rel="stylesheet" href="{{asset('plugins/owlcarousel/assets/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/owlcarousel/assets/owl.theme.default.min.css')}}">
@endsection

@section('maincontent')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <h1>Learning Object</h1>
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
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <input class="form-control" id="SearchName" type="text"
                                                placeholder="Search">
                                        </div>
                                    </div>
                                    <div class="owl-carousel" id="list-item-materi">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="card-body"> -->
            </div>
        </div>
    </section>
</div>
@endsection
@section('scriptpage')
<script src="{{asset('dist/js/Materi/Materi.js?')}}"></script>
<script src="{{asset('dist/js/pages/webportal.js?')}}"></script>
<script src="{{asset('plugins/owlcarousel/owl.carousel.min.js?')}}"></script>
<script>
    var modalLearning = "{{route('modallearning')}}";
</script>
@endsection