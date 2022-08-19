@extends('layout/main')

@section('title')
{{config('app.COMPANYNAME')}} INSURANCE | Learning Object
@endsection

@section('head-linkrel')
<style>
    #carouselExampleControls .carousel-item img {
        object-fit: cover;
        object-position: center;
        height: 30vh;
    }

    .carousel-control-prev,
    .carousel-control-next {
        background-color: black;
        width: 5vh;
        height: 5vh;
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
    }
</style>
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
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <input class="form-control" id="SearchName" type="text"
                                                placeholder="Search">
                                        </div>
                                    </div>
                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="row">
                                                    <div class="col-sm">
                                                        <div class="card">
                                                            <img class="card-img-top"
                                                                src="https://via.placeholder.com/286x180?text=Benefit+Mitraca+2020"
                                                                alt="Card image cap">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Benefit Mitraca 2022</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm">
                                                        <div class="card">
                                                            <img class="card-img-top"
                                                                src="https://via.placeholder.com/286x180?text=Benefit+Mitraca+2021"
                                                                alt="Card image cap">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Benefit Mitraca 2021</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm">
                                                        <div class="card">
                                                            <img class="card-img-top"
                                                                src="https://via.placeholder.com/286x180?text=Benefit+Mitraca+2022"
                                                                alt="Card image cap">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Benefit Mitraca 2020</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="row">
                                                    <div class="col-sm">
                                                        <div class="card">
                                                            <img class="card-img-top"
                                                                src="https://via.placeholder.com/286x180?text=Metode+Pembarayan+Mitraca"
                                                                alt="Card image cap">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Metode Pembarayan Mitraca
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm">
                                                        <div class="card">
                                                            <img class="card-img-top"
                                                                src="https://via.placeholder.com/286x180?text=Otomate"
                                                                alt="Card image cap">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Otomate</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm">
                                                        <div class="card">
                                                            <img class="card-img-top"
                                                                src="https://via.placeholder.com/286x180?text=Klaim+Asuransi+Kendaraan+Bermotor"
                                                                alt="Card image cap">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Klaim Asuransi Kendaraan
                                                                    Bermotor</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="form-group row">
                                                    <div class="col-sm">
                                                        <div class="card">
                                                            <img class="card-img-top"
                                                                src="https://img.youtube.com/vi/YxIQoPGUcog/hqdefault.jpg"
                                                                alt="Card image cap">
                                                            <div class="card-body">
                                                                <h5 class="card-title">ASRI</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm">
                                                        <div class="card">
                                                            <img class="card-img-top"
                                                                src="https://img.youtube.com/vi/C3GeTz96dm4/hqdefault.jpg"
                                                                alt="Card image cap">
                                                            <div class="card-body">
                                                                <h5 class="card-title">ACA NEW TRAVEL SAFE ANDROID</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm">
                                                        <div class="card">
                                                            <img class="card-img-top"
                                                                src="https://img.youtube.com/vi/1mkOupOYwE8/hqdefault.jpg"
                                                                alt="Card image cap">
                                                            <div class="card-body">
                                                                <h5 class="card-title">MitraACA Knowledge</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-target="#carouselExampleControls" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-target="#carouselExampleControls" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </button>
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
@endsection