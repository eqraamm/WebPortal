@extends('layout/main')
@section('title','ACA INSURANCE | Survey')

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
                        <div class="card-header">
                            <h2 class="card-title">Survey</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        @if (session('Role') == 'MARKETING OFFICER' && $privileges_branch_head)
                        <div class="form-group row">
                        <p class="col-sm-2 col-form-label">Marketing Officer</p>
                        <div class="col-sm-2">
                            <select class="form-control select2bs4" id="listMo" name="listMo" required>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <button type="button" id="btn-filter" class="btn btn-outline-primary">Search</button>
                        </div>
                        </div>
                        <!-- <div class="form-group row">
                        <p class="col-sm-2 col-form-label"></p>
                        <div class="col-sm-4">
                        <button type="button" id="btn-filter" class="btn btn-outline-primary">Search</button>
                        </div>
                        </div> -->
                        @endif
                            <div class="tab-content">
                                <div class="card-body">
                                    <table id="ListSurvey" class="table table-striped dt-responsive nowrap" cellspacing="0" style="width:100%" >
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modal-survey" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-md">
      <div class="modal-content">
         <div id="div-overlay"></div>
         <div class="modal-header">
            <label class="modal-title">Entry Form Survey</label>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body" id="survey">
            <div class="form-group row">
               <input type="hidden" id="PID"/>
               <label for="TxtName" class="col-sm-4 col-form-label">Survey Schedule</label>
               <div class="input-group date col-sm-8" id="TxtSurveyDate" data-target-input="nearest">
                  <input type="text" id="SurveyDate" data-format="yyyy-MM-dd hh:mm:ss" name="TxtSurveyDate" class="form-control datetimepicker-input" data-target="#TxtSurveyDate" required />
                  <div class="input-group-append" data-target="#TxtSurveyDate" data-toggle="datetimepicker">
                     <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
               </div>
            </div>
            <div class="form-group row">
               <div class="input-group date col-sm-12">
                     <input type="text" id="Clipboard" class="form-control" readonly/>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <button type="button" class="btn btn-block btn-outline-primary" onclick="SubmitSurvey()" title="Send Survey">Send Survey</button>
               </div>
               <div class="col-md-6">
                  <button type="button" id="btn_copy" class="btn btn-block btn-outline-success" onclick="CopyLink()" title="Copy Link">Copy Link</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection

@section('scriptpage')
<script>
    $(function() {
        $('#TxtSurveyDate').datetimepicker(
        {
            icons: {
                time: "fa fa-clock",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            }
        }
        );
        $('.select2bs4').select2({
            theme: 'bootstrap4',
            // placeholder: "Retrive Data..."
        });
        var privileges_branch_head = "{{$privileges_branch_head}}";
        if (privileges_branch_head){
            var listmo = @json($listmo);
            var selectMO = document.getElementById('listMo');
            addOptionItem(selectMO,listmo,'ID','Name',false, false, false,'',true);
        }
    });

    var arrPolicy = @json($data['Data']);
    var arrPolicySurvey = arrPolicy.filter(survey =>survey.NeedSurveyF == true && survey.PStatus != 'C');
    var t = $("#ListSurvey").DataTable({
        "data": arrPolicySurvey,
        "columns": [
            // {
            //   "title": "",
            //   "className": "select-checkbox",
            //   "defaultContent": "",
            //   render: function(data, type, row) {
            //     return '<input class="form-control" id="cbxsurvey[]" name="ClausulaCode[]" type="checkbox">';
            //     } 
            // },
            {
                "title": "No",
                "data": null
            },
            {
                "data": "PID"
            },
            {
                "title": "Reference Number",
                "data": "RefNo"
            },
            {
                "title": "Long Insured Name",
                "data": "InsuredName"
            },
            {
                "title": "Survey Date",
                "defaultContent": "-",
                render: function(data, type, row) {
                    return row['SurveyDate'] + '<br>' + row['SurveyTime'];
                }
            },
            {
                "title": "Status E-Sign",
                "defaultContent": "-",
                render: function(data, type, row) {
                    if (row['EsignF']){
                    return '<i class="fas fa-check" style="color:green;"> E-Sign</i>';
                    }else{
                    return '<i class="far fa-times-circle" style="color:red"> E-Sign</i>';
                    }
                }
            },
            {
                "title": "Status Survey",
                "defaultContent": "-",
                render: function(data, type, row) {
                    if (row['SurveyF']){
                    return '<i class="fas fa-check" style="color:green"> Survey</i>';
                    }else{
                    return '<i class="far fa-times-circle" style="color:red"> Survey</i>';
                    }
                }
            },
            {
                "title": "Start Survey",
                "defaultContent": "-",
                render: function(data, type, row) {
                    return row['ActualDate'] + '<br>' + row['StartTimeSurvey'];
                }
            },
            {
                "title": "Finish Survey",
                "defaultContent": "-",
                render: function(data, type, row) {
                return row['ActualDate'] + '<br>' + row['EndTimeSurvey'];
                }
            },
            {
                "title": "Action",
                "defaultContent": "",
                render: function(data, type, row) {
                    // return '<button onclick="getEmail(' + row['PID'] + ')" class="send_survey" style="overflow:hidden; color: #5EFA66;" data-toggle="tooltip" data-placement="top" title="Send Survey"><i class="fas fa-share-alt fa-lg"></i></button> <span style="color: #437FFF;"><i class="far fa-clock fa-lg" type="button"></i></span>  <span style="color: red;"><i class="fas fa-times-circle fa-lg" type="button"></i></span>';
                    // return '<button class="btn send_survey" style="overflow:hidden; color: #5EFA66;" data-toggle="tooltip" data-placement="top" title="Send Survey"><i class="fas fa-share-alt fa-lg"></i></button> <span style="color: #437FFF;"><i class="far fa-clock fa-lg" type="button"></i></span>  <span style="color: red;"><i class="fas fa-times-circle fa-lg" type="button"></i></span>';
                    var fn_sendSurvey = "sendSurvey('"+ row['PID'] +"')"
                    var fn_JoinSurvey = "joinSurvey('"+ row['PID'] +"')"
                    var fn_SingleSurvey = "singlesurvey('"+ row['PID'] +"')"
                    var SurveyF = (row['SurveyF'] === true) ? "disabled" : false;
                    return '<button class="btn send_survey" onclick="'+ fn_sendSurvey +'" style="overflow:hidden; color: #5EFA66;"data-toggle="tooltip" data-placement="top" title="Send Survey" '+ SurveyF +'><i class="fas fa-share-alt fa-lg"></i></button><button class="btn send_survey" onclick="'+ fn_JoinSurvey +'"style="overflow:hidden; color: #3d85c6;" data-toggle="tooltip" data-placement="top" title="Join Survey" '+ SurveyF +'><i class="fas fa-sign-in-alt fa-lg"></i></button><button class="btn send_survey" onclick="'+ fn_SingleSurvey +'"style="overflow:hidden; color: #8d9e9e;" data-toggle="tooltip" data-placement="top"title="Onsite Survey" '+ SurveyF +'><i class="fas fa-map-marked-alt fa-lg"></i></button>';
                }
            },
        ],
        // "columnDefs": [
        //   {
        //         "searchable": false,
        //         "orderable": false,
        //         "targets": 1
        //     },
        //     {
        //         "width": "4.5%",
        //         "targets": [0]
        //     }
        // ],
        "select": {
            "style": "multi"
        },
        "columnDefs": [
            {
                "targets": [ 1 ],
                "visible": false,
                "searchable": false
            }
        ],
        "order": [
            [1, 'desc']
        ],
        "autoWidth": false,
        "responsive": true,
    });
    t.on('order.dt search.dt', function() {
        t.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    // $(".send_survey").click(function(event) {
    //     event.preventDefault();
    //     //var a_href = $(this).attr('href');

    //     $('#loadMe').modal('show');
    //     //$("#modal-survey").modal('show');

    //     $.ajax({
    //         // type: "GET",
    //         // url: a_href,
    //         // dataType: 'html'
    //     }).done(function(response) {
    //         //console.log(response);
    //         $('#loadMe').modal('hide');
    //         //$('#bodyHistory').html(response);
    //         $("#modal-survey").modal('show');
    //     });
    // });

    function sendSurvey(PID){
      event.preventDefault();
      // console.log(PID);
      $('#PID').val(PID);
      $('#loadMe').modal('show');
      var urltype = "SURVEY";
      let _token = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
            type: "POST",
            url: "{{ route('survey.copylink') }}",
            data: {
                PID: PID,
                URLType : urltype,
                _token: _token
            },
        }).done(function(response) {
            if (response.code == "200") {
                $('#loadMe').modal('hide');
                $('#Clipboard').val(response.data[0].URL);
                $("#modal-survey").modal('show');
            }
        }).fail(function(xhr, status, error) {
            $('#div-overlay').empty();
            toastMessage('400', error);
        });
    }

    $(".send_survey").click(function(event) {
        event.preventDefault();
        //var a_href = $(this).attr('href');
        $('#loadMe').modal('show');
        $("#modal-survey").modal('show');
    });

    function CopyLink(){
        event.preventDefault();
        navigator.clipboard.writeText(document.getElementById("Clipboard").value);
        toastMessage("200", "Copy Link Successfully");
    }

    function SubmitSurvey() {
        event.preventDefault();

        $('#div-overlay').empty();
	      $('#div-overlay').append('<div class="overlay"><i class="fas fa-2x fa-sync fa-spin"></i></div>');
        var date = new Date($("#TxtSurveyDate").find("input").val());

        var surveydate = getformatedDate(date);
        var surveytime = getFormatedTime(date);
        var PID = $('#PID').val();
        // console.log(PID);

        let _token = $('meta[name="csrf-token"]').attr('content');

        // $("#loadMe").modal('show');

        $.ajax({
            type: "POST",
            url: "{{ route('survey.submitsurvey') }}",
            data: {
                PID: PID,
                SurveyDate : surveydate,
                SurveyTime : surveytime,
                _token: _token
            },
        }).done(function(response) {
            console.log(response);
            if (response.code == "200") {
                $("#modal-survey").modal("hide");
            }
            $('#div-overlay').empty();
            toastMessage(response.code, response.message);
        }).fail(function(xhr, status, error) {
            console.log(xhr);
            $('#div-overlay').empty();
            // $("#loadMe").modal("hide");
            toastMessage('400', error);
        });
    };

    function joinSurvey(PID){
        event.preventDefault();
        // var URL = '{{ route("VideoSurvey") }}'+'?'+(btoa('id='+PID+'&userid=mo'));
        var URL = '{{ route("VideoSurvey") }}' + '?id=' + PID + '&userid=mo';
        // console.log(URL);
        openInNewTab(URL);
    }

    function singlesurvey(PID){
        event.preventDefault();
        // var URL = '{{ route("VideoSurvey") }}'+'?'+(btoa('id='+PID+'&userid=mo'));
        var URL = '{{ route("VideoSurvey") }}' + '?id=' + PID + '&userid=mo&sos=1';
        // console.log(URL);
        openInNewTab(URL);
    }

    function openInNewTab(url) {
        // console.log(url);
        window.open(url, '_blank');

        // var baseurl = "<iframe width='100%' height='100%' src='data:application/pdf;base64,"+ url +"'></iframe>";
        // console.log(baseurl);
        // pdfWindow.document.write(url, '_blank');
        // var win = window.open(url, '_blank');
        // win.focus();
    }

    $("#btn-filter").on("click", async function () {
        var datas = [];
        var mo = $('#listMo').val();
        console.log(mo);
        var url = "{{route('Dashboard.getlistpolicy')}}?ID=" + mo;
        var response = await getDataNew(url, false, debugF);
        console.log(response);
        datas = response['Data'];
        var arrPolicySurvey = datas.filter(data =>data.NeedSurveyF == true && data.PStatus != 'C');
        t.clear().rows.add(arrPolicySurvey).draw();;
        t.columns.adjust().draw();
    });

</script>
@endsection
</body>

</html>