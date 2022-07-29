@extends('layout/main')
@section('title')
   {{config('app.COMPANYNAME')}} INSURANCE | Frequently Asked Question
@endsection

@section('maincontent')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <h1>FAQ List</h1>
      </div>
   </section>

   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="overlay-wrapper">
            <div class="row">
               <div class="col-12" id="accordion">
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
@endsection

@section('scriptpage')
<script>
   var dataCategory = @json($dataCategory);
   var dataFAQ = @json($dataFAQ);
</script>
<script src="{{asset('dist/js/faq/faq.js')}}"></script>
@endsection