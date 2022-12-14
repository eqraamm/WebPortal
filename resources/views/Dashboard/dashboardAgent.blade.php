@extends('layout/main')
@section('title','ACA INSURANCE | Dashboard Agent')

@section('head-linkrel')
@endsection


@section('maincontent')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1>
            Dashboard Agent
          </h1>
        </div>
        <div class="col-sm-2 ml-auto">
          <button type="button" id="btn-refresh" class="btn btn-block btn-primary">
            <i class="fas fa-sync-alt"></i>
            Refresh
          </button></br>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="overlay-wrapper">
        <div class="overlay" id="div-overlay" style="display: none;">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          <div class="text-bold pt-2">Loading...</div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Gross Written Premium</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span id="span-totalgwp" class="text-bold text-lg"></span>
                    <span>Sales Over Time</span>
                  </p>
                  <!-- <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> <span>33.1%</span>
                    </span>
                    <span class="text-muted">Since last month</span>
                  </p> -->
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="GWP-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <!-- <i class="fas fa-square text-primary"></i> This year -->
                  </span>

                  <span>
                    <!-- <i class="fas fa-square text-gray"></i> Last year -->
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Loss Ratio</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <!-- <p class="d-flex flex-column">
                    <span id="span-totallossratio" class="text-bold text-lg"></span>
                    <span>Sales Over Time</span>
                  </p> -->
                  <!-- <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 33.1%
                    </span>
                    <span class="text-muted">Since last month</span>
                  </p> -->
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="chart-lossratio" height="270"></canvas>
                </div>

                <!-- <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This year
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last year
                  </span>
                </div> -->
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
  var data_gwp = @json($data_gwp['Data']);
  var data_lossratio = @json($data_lossratio['Data']);
  var urlGWP = '{{ route("Dashboard.getGWP") }}';
  var urlLossRatio = '{{ route("Dashboard.getLossRatio") }}';
  var urlStoredData = '{{ route("Dashboard.getStoredData") }}';
</script>
<!-- Dashboard Agent -->
<script src="{{asset('dist/js/pages/dashboardAgent.js')}}"></script>
@endsection
