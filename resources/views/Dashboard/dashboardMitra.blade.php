@extends('layout/main')
@section('title')
   {{config('app.COMPANYNAME')}} INSURANCE | Dashboard
@endsection

@section('head-linkrel')
<style>
   #carouselExampleControls .carousel-item img {  
      object-fit: cover;
      object-position: center;
      overflow: hidden;
      height:30vh;
      }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
@endsection


@section('maincontent')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         
      </div>
   </section>

   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="overlay-wrapper">
            <!-- Carousel -->
            <div class="row">
               <div class="col-sm-12">
                  <div class="card">
                     <!-- <div class="card-body"> -->
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                           <div class="carousel-inner">
                              <div class="carousel-item active">
                                 <img src="https://via.placeholder.com/468x60?text=Iklan+1" class="d-block w-100" alt="...">
                              </div>
                              <div class="carousel-item">
                                 <img src="https://via.placeholder.com/468x60?text=Iklan+2" class="d-block w-100" alt="...">
                              </div>
                              <div class="carousel-item">
                                 <img src="https://via.placeholder.com/468x60?text=Iklan+3" class="d-block w-100" alt="...">
                              </div>
                           </div>
                           <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                           </button>
                           <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                           </button>
                        </div>
                     <!-- </div> -->
                  </div>
               </div>
            </div>
            <!-- End Carousel -->
            <!-- Indicative Offer List -->
            <div class="row">
               <div class="col-sm-12">
                  <div class="card">
                     <div class="card-header">
                        <div class="row align-middle">
                           <div class="col-sm-6">
                              Indicative Offer
                           </div>
                           <div class="col-sm-6">
                              <button type="button" class="btn btn-primary float-right">Create Indicative Offer</button>
                           </div>
                        </div>
                     </div>
                     <div class="card-body">
                        <table id="tblIndctvOffer" class="table table-hover table-bordered dt-responsive nowrap" width="100%">
                        </table>
                     </div> 
                  </div>
               </div>
            </div>
            <!-- End Indicative Offer List -->

            <!-- SPPA List -->
            <div class="row">
               <div class="col-sm-12">
                  <div class="card">
                     <div class="card-header">
                        SPPA
                        <button type="button" class="btn btn-primary float-right">Create SPPA</button>
                     </div>
                     <div class="card-body">
                        <table id="tblSPPA" class="table table-hover table-bordered dt-responsive nowrap" width="100%">
                        </table>
                     </div> 
                  </div>
               </div>
            </div>
            <!-- End SPPA List -->

            <!-- Expiry List -->
            <div class="row">
               <div class="col-sm-12">
                  <div class="card">
                     <div class="card-header">
                        Expiry Policy Next Month
                     </div>
                     <div class="card-body">
                        <table id="tblExpiry" class="table table-hover table-bordered dt-responsive nowrap" width="100%">
                        </table>
                     </div> 
                  </div>
               </div>
            </div>
            <!-- End Expiry List -->

            <!-- Birthday List -->
            <div class="row">
               <div class="col-sm-12">
                  <div class="card">
                     <div class="card-header">
                        Birthdays This Month
                     </div>
                     <div class="card-body">
                        <table id="tblBirthdays" class="table table-hover table-bordered dt-responsive nowrap" width="100%">
                        </table>
                     </div> 
                  </div>
               </div>
            </div>
            <!-- End Birthday List -->
         </div>
      </div>
   </section>
</div>
@endsection

@section('scriptpage')
<script src="{{asset('dist/js/Dashboard/dashboardAgent.js')}}"></script>
@endsection