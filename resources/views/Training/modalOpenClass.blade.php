<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="row">
        <p class="col-sm-2 col-form-label">Tanggal</p>
        <p class="col-form-label">:</p>
        <p class="col-sm-9 col-form-label" id="date"></p>
    </div>
    <div class="row">
        <p class="col-sm-2 col-form-label">Waktu</p>
        <p class="col-form-label">:</p>
        <p class="col-sm-1 col-form-label" id="startime"></p>
        <p class="col-form-label">To</p>
        <p class="col-sm-3 col-form-label" id="endtime"></p>
    </div>
    <div class="row">
        <p class="col-sm-2 col-form-label">Lokasi</p>
        <p class="col-form-label">:</p>
        <p class="col-sm-9 col-form-label" id="location"></p>
    </div>
    <div class="row">
        <p class="col-sm-2 col-form-label">Subyek</p>
        <p class="col-form-label">:</p>
        <p class="col-sm-9 col-form-label" id="subjects"></p>
    </div>
    <div class="row">
        <p class="col-sm-2 col-form-label">Tingkatan</p>
        <p class="col-form-label">:</p>
        <p class="col-sm-9 col-form-label" id="AgentLevel"></p>
    </div>
    <div class="row">
        <p class="col-sm-2 col-form-label">Pelatih</p>
        <p class="col-form-label">:</p>
        <p class="col-sm-9 col-form-label" id="trainer"></p>
    </div>
    <div class="row">
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-group">
                <div align="right"><button class="btn btn-success btn-sm" OnClick="AddAgent()">Tambah Agent</button></div>
            </div>
            <div class="form-group">
                <table id="tblOpenClass" class="table table-hover table-bordered dt-responsive nowrapc" width="100%">
                </table>
            </div>
        </div>
    </div>
</body>
<script>
    var data = @json([$data]);
</script>
<!-- General For Web Portal MW -->
<script src="{{asset('dist/js/pages/webportal.js?')}}"></script>
<script src="{{asset('dist/js/TrainingClass/modalOpenClass.js?')}}"></script>

</html>