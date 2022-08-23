let socket = io.connect(webSockets, {
    transports: ['websocket']
});
let _token = $('meta[name="csrf-token"]').attr('content');
let params = new URLSearchParams(window.location.search);
let width = 720; // We will scale the photo width to this
let height = 620;
let userVideo, peerVideo, stream, userStream, tmpImage, iceServers, devices, context, contexttmp;
var rtcPeerConnection;
userVideo = document.getElementById("user-video");
peerVideo = document.getElementById("peer-video");
let muteButton = document.getElementById("Btn_Mute");
let moduleMute = document.getElementById("Mute");
let moduleSwitch = document.getElementById("Switch");
let leaveButton = document.getElementById("Btn_Finish");
let doneButton = document.getElementById("Btn_Done");
let btn_cancel = document.getElementById("Btn_Cancel");
let hideCameraButton = document.getElementById("Btn_Hide");
let divRecordPlayer = document.getElementById("recording-player");
let divIconRecording = document.getElementById("icn-recording");
let divIconScreenshot = document.getElementById("startbutton");
let TableSurvey = document.getElementById("tblsurvey");
let Listdocument = document.getElementById("lstdocument");
let BtnSwitch = document.getElementById("Btn_Switch");
let videoPreview = document.getElementById("recording-player1");
let todaydate = new Date();
let date = todaydate.getFullYear() + "-" + (todaydate.getMonth() + 1) + "-" + todaydate.getDate();
let todaytime = ("0" + todaydate.getHours()).slice(-2) + ":" + ("0" + todaydate.getMinutes()).slice(-2) + ":" + ("0" + todaydate.getSeconds()).slice(-2);
let wrapper = document.getElementById("body-widget")
let canvas = wrapper.querySelector("canvas");
let canvastemp = document.getElementById("temp");
let signaturePad = new SignaturePad(canvas, {
    minWidth: 1.5,
    maxWidth: 1.5,
    throttle: 0,
    penColor: 'rgb(0, 0, 255)',
    dotSize: 1.5
});
// let signaturePad;
let id = params.get('id');
let user = params.get('userid');
let IsSingleSurvey = (params.get('sos') == '1');
let roomName = (id);
let muteFlag = false;
let hideCameraFlag = false;
let creator = false;
let color = false;
//create table for preview survey
let basedata = [];
let table = $('#tblsurvey').DataTable({
    "columns": [{
        "defaultContent": ""
    }, {
        "defaultContent": "",
        "data": "IMG"

    }, {
        "defaultContent": "",
        "data": "TYPE",
        render: function (data, type, row, meta) {
            let option = "";
            if (row['TYPE'] == "") {
                option = '<option value="" selected></option><option value="Bagian Depan">Bagian Depan</option><option value="Bagian Belakang">Bagian Belakang</option><option value="Bagian Depan Kanan">Bagian Depan Kanan</option><option value="Bagian Depan Kiri">Bagian Depan Kiri</option><option value="Bagian Samping Kanan">Bagian Samping Kanan</option><option value="Bagian Samping Kiri">Bagian Samping Kiri</option><option value="Bagian Belakang Kanan">Bagian Belakang Kanan</option><option value="Bagian Belakang Kiri">Bagian Belakang Kiri</option><option value="Ruang Mesin">Ruang Mesin</option><option value="Bagian Interior">Bagian Interior</option><option value="Nomor Rangka/Nomor Mesin/Peneng">Nomor Rangka/Nomor Mesin/Peneng</option><option value="Aksesoris Tambahan">Aksesoris Tambahan</option><option value="Cacat Semula">Cacat Semula</option><option value="Lain-lain">Lain-lain</option>';
            } else if (row['TYPE'] == "Bagian Depan") {
                option = '<option value=""></option><option value="Bagian Depan" selected>Bagian Depan</option><option value="Bagian Belakang">Bagian Belakang</option><option value="Bagian Depan Kanan">Bagian Depan Kanan</option><option value="Bagian Depan Kiri">Bagian Depan Kiri</option><option value="Bagian Samping Kanan">Bagian Samping Kanan</option><option value="Bagian Samping Kiri">Bagian Samping Kiri</option><option value="Bagian Belakang Kanan">Bagian Belakang Kanan</option><option value="Bagian Belakang Kiri">Bagian Belakang Kiri</option><option value="Ruang Mesin">Ruang Mesin</option><option value="Bagian Interior">Bagian Interior</option><option value="Nomor Rangka/Nomor Mesin/Peneng">Nomor Rangka/Nomor Mesin/Peneng</option><option value="Aksesoris Tambahan">Aksesoris Tambahan</option><option value="Cacat Semula">Cacat Semula</option><option value="Lain-lain">Lain-lain</option>';
            } else if (row['TYPE'] == "Bagian Belakang") {
                option = '<option value=""></option><option value="Bagian Depan">Bagian Depan</option><option value="Bagian Belakang" selected>Bagian Belakang</option><option value="Bagian Depan Kanan">Bagian Depan Kanan</option><option value="Bagian Depan Kiri">Bagian Depan Kiri</option><option value="Bagian Samping Kanan">Bagian Samping Kanan</option><option value="Bagian Samping Kiri">Bagian Samping Kiri</option><option value="Bagian Belakang Kanan">Bagian Belakang Kanan</option><option value="Bagian Belakang Kiri">Bagian Belakang Kiri</option><option value="Ruang Mesin">Ruang Mesin</option><option value="Bagian Interior">Bagian Interior</option><option value="Nomor Rangka/Nomor Mesin/Peneng">Nomor Rangka/Nomor Mesin/Peneng</option><option value="Aksesoris Tambahan">Aksesoris Tambahan</option><option value="Cacat Semula">Cacat Semula</option><option value="Lain-lain">Lain-lain</option>';
            } else if (row['TYPE'] == "Bagian Depan Kanan") {
                option = '<option value=""></option><option value="Bagian Depan">Bagian Depan</option><option value="Bagian Belakang" >Bagian Belakang</option><option value="Bagian Depan Kanan" selected>Bagian Depan Kanan</option><option value="Bagian Depan Kiri">Bagian Depan Kiri</option><option value="Bagian Samping Kanan">Bagian Samping Kanan</option><option value="Bagian Samping Kiri">Bagian Samping Kiri</option><option value="Bagian Belakang Kanan">Bagian Belakang Kanan</option><option value="Bagian Belakang Kiri">Bagian Belakang Kiri</option><option value="Ruang Mesin">Ruang Mesin</option><option value="Bagian Interior">Bagian Interior</option><option value="Nomor Rangka/Nomor Mesin/Peneng">Nomor Rangka/Nomor Mesin/Peneng</option><option value="Aksesoris Tambahan">Aksesoris Tambahan</option><option value="Cacat Semula">Cacat Semula</option><option value="Lain-lain">Lain-lain</option>';
            } else if (row['TYPE'] == "Bagian Depan Kiri") {
                option = '<option value=""></option><option value="Bagian Depan">Bagian Depan</option><option value="Bagian Belakang" >Bagian Belakang</option><option value="Bagian Depan Kanan">Bagian Depan Kanan</option><option value="Bagian Depan Kiri" selected>Bagian Depan Kiri</option><option value="Bagian Samping Kanan">Bagian Samping Kanan</option><option value="Bagian Samping Kiri">Bagian Samping Kiri</option><option value="Bagian Belakang Kanan">Bagian Belakang Kanan</option><option value="Bagian Belakang Kiri">Bagian Belakang Kiri</option><option value="Ruang Mesin">Ruang Mesin</option><option value="Bagian Interior">Bagian Interior</option><option value="Nomor Rangka/Nomor Mesin/Peneng">Nomor Rangka/Nomor Mesin/Peneng</option><option value="Aksesoris Tambahan">Aksesoris Tambahan</option><option value="Cacat Semula">Cacat Semula</option><option value="Lain-lain">Lain-lain</option>';
            } else if (row['TYPE'] == "Bagian Samping Kanan") {
                option = '<option value=""></option><option value="Bagian Depan">Bagian Depan</option><option value="Bagian Belakang" >Bagian Belakang</option><option value="Bagian Depan Kanan">Bagian Depan Kanan</option><option value="Bagian Depan Kiri">Bagian Depan Kiri</option><option value="Bagian Samping Kanan" selected>Bagian Samping Kanan</option><option value="Bagian Samping Kiri">Bagian Samping Kiri</option><option value="Bagian Belakang Kanan">Bagian Belakang Kanan</option><option value="Bagian Belakang Kiri">Bagian Belakang Kiri</option><option value="Ruang Mesin">Ruang Mesin</option><option value="Bagian Interior">Bagian Interior</option><option value="Nomor Rangka/Nomor Mesin/Peneng">Nomor Rangka/Nomor Mesin/Peneng</option><option value="Aksesoris Tambahan">Aksesoris Tambahan</option><option value="Cacat Semula">Cacat Semula</option><option value="Lain-lain">Lain-lain</option>';
            } else if (row['TYPE'] == "Bagian Samping Kiri") {
                option = '<option value=""></option><option value="Bagian Depan">Bagian Depan</option><option value="Bagian Belakang" >Bagian Belakang</option><option value="Bagian Depan Kanan">Bagian Depan Kanan</option><option value="Bagian Depan Kiri">Bagian Depan Kiri</option><option value="Bagian Samping Kanan">Bagian Samping Kanan</option><option value="Bagian Samping Kiri" selected>Bagian Samping Kiri</option><option value="Bagian Belakang Kanan">Bagian Belakang Kanan</option><option value="Bagian Belakang Kiri">Bagian Belakang Kiri</option><option value="Ruang Mesin">Ruang Mesin</option><option value="Bagian Interior">Bagian Interior</option><option value="Nomor Rangka/Nomor Mesin/Peneng">Nomor Rangka/Nomor Mesin/Peneng</option><option value="Aksesoris Tambahan">Aksesoris Tambahan</option><option value="Cacat Semula">Cacat Semula</option><option value="Lain-lain">Lain-lain</option>';
            } else if (row['TYPE'] == "Bagian Belakang Kanan") {
                option = '<option value=""></option><option value="Bagian Depan">Bagian Depan</option><option value="Bagian Belakang" >Bagian Belakang</option><option value="Bagian Depan Kanan">Bagian Depan Kanan</option><option value="Bagian Depan Kiri">Bagian Depan Kiri</option><option value="Bagian Samping Kanan">Bagian Samping Kanan</option><option value="Bagian Samping Kiri">Bagian Samping Kiri</option><option value="Bagian Belakang Kanan" selected>Bagian Belakang Kanan</option><option value="Bagian Belakang Kiri">Bagian Belakang Kiri</option><option value="Ruang Mesin">Ruang Mesin</option><option value="Bagian Interior">Bagian Interior</option><option value="Nomor Rangka/Nomor Mesin/Peneng">Nomor Rangka/Nomor Mesin/Peneng</option><option value="Aksesoris Tambahan">Aksesoris Tambahan</option><option value="Cacat Semula">Cacat Semula</option><option value="Lain-lain">Lain-lain</option>';
            } else if (row['TYPE'] == "Bagian Belakang Kiri") {
                option = '<option value=""></option><option value="Bagian Depan">Bagian Depan</option><option value="Bagian Belakang" >Bagian Belakang</option><option value="Bagian Depan Kanan">Bagian Depan Kanan</option><option value="Bagian Depan Kiri">Bagian Depan Kiri</option><option value="Bagian Samping Kanan">Bagian Samping Kanan</option><option value="Bagian Samping Kiri">Bagian Samping Kiri</option><option value="Bagian Belakang Kanan">Bagian Belakang Kanan</option><option value="Bagian Belakang Kiri" selected>Bagian Belakang Kiri</option><option value="Ruang Mesin">Ruang Mesin</option><option value="Bagian Interior">Bagian Interior</option><option value="Nomor Rangka/Nomor Mesin/Peneng">Nomor Rangka/Nomor Mesin/Peneng</option><option value="Aksesoris Tambahan">Aksesoris Tambahan</option><option value="Cacat Semula">Cacat Semula</option><option value="Lain-lain">Lain-lain</option>';
            } else if (row['TYPE'] == "Ruang Mesin") {
                option = '<option value=""></option><option value="Bagian Depan">Bagian Depan</option><option value="Bagian Belakang" >Bagian Belakang</option><option value="Bagian Depan Kanan">Bagian Depan Kanan</option><option value="Bagian Depan Kiri">Bagian Depan Kiri</option><option value="Bagian Samping Kanan">Bagian Samping Kanan</option><option value="Bagian Samping Kiri">Bagian Samping Kiri</option><option value="Bagian Belakang Kanan">Bagian Belakang Kanan</option><option value="Bagian Belakang Kiri">Bagian Belakang Kiri</option><option value="Ruang Mesin" selected>Ruang Mesin</option><option value="Bagian Interior">Bagian Interior</option><option value="Nomor Rangka/Nomor Mesin/Peneng">Nomor Rangka/Nomor Mesin/Peneng</option><option value="Aksesoris Tambahan">Aksesoris Tambahan</option><option value="Lain-lain">Lain-lain</option>';
            } else if (row['TYPE'] == "Bagian Interior") {
                option = '<option value=""></option><option value="Bagian Depan">Bagian Depan</option><option value="Bagian Belakang" >Bagian Belakang</option><option value="Bagian Depan Kanan">Bagian Depan Kanan</option><option value="Bagian Depan Kiri">Bagian Depan Kiri</option><option value="Bagian Samping Kanan">Bagian Samping Kanan</option><option value="Bagian Samping Kiri">Bagian Samping Kiri</option><option value="Bagian Belakang Kanan">Bagian Belakang Kanan</option><option value="Bagian Belakang Kiri">Bagian Belakang Kiri</option><option value="Ruang Mesin">Ruang Mesin</option><option value="Bagian Interior" selected>Bagian Interior</option><option value="Nomor Rangka/Nomor Mesin/Peneng">Nomor Rangka/Nomor Mesin/Peneng</option><option value="Aksesoris Tambahan">Aksesoris Tambahan</option><option value="Cacat Semula">Cacat Semula</option><option value="Lain-lain">Lain-lain</option>';
            } else if (row['TYPE'] == "Nomor Rangka/Nomor Mesin/Peneng") {
                option = '<option value=""></option><option value="Bagian Depan">Bagian Depan</option><option value="Bagian Belakang" >Bagian Belakang</option><option value="Bagian Depan Kanan">Bagian Depan Kanan</option><option value="Bagian Depan Kiri">Bagian Depan Kiri</option><option value="Bagian Samping Kanan">Bagian Samping Kanan</option><option value="Bagian Samping Kiri">Bagian Samping Kiri</option><option value="Bagian Belakang Kanan">Bagian Belakang Kanan</option><option value="Bagian Belakang Kiri">Bagian Belakang Kiri</option><option value="Ruang Mesin">Ruang Mesin</option><option value="Bagian Interior">Bagian Interior</option><option value="Nomor Rangka/Nomor Mesin/Peneng" selected>Nomor Rangka/Nomor Mesin/Peneng</option><option value="Aksesoris Tambahan">Aksesoris Tambahan</option><option value="Cacat Semula">Cacat Semula</option><option value="Lain-lain">Lain-lain</option>';
            } else if (row['TYPE'] == "Aksesoris Tambahan") {
                option = '<option value=""></option><option value="Bagian Depan">Bagian Depan</option><option value="Bagian Belakang" >Bagian Belakang</option><option value="Bagian Depan Kanan">Bagian Depan Kanan</option><option value="Bagian Depan Kiri">Bagian Depan Kiri</option><option value="Bagian Samping Kanan">Bagian Samping Kanan</option><option value="Bagian Samping Kiri">Bagian Samping Kiri</option><option value="Bagian Belakang Kanan">Bagian Belakang Kanan</option><option value="Bagian Belakang Kiri">Bagian Belakang Kiri</option><option value="Ruang Mesin">Ruang Mesin</option><option value="Bagian Interior">Bagian Interior</option><option value="Nomor Rangka/Nomor Mesin/Peneng">Nomor Rangka/Nomor Mesin/Peneng</option><option value="Aksesoris Tambahan" selected>Aksesoris Tambahan</option><option value="Cacat Semula">Cacat Semula</option><option value="Lain-lain">Lain-lain</option>';
            } else if (row['TYPE'] == "Cacat Semula") {
                option = '<option value=""></option><option value="Bagian Depan">Bagian Depan</option><option value="Bagian Belakang" >Bagian Belakang</option><option value="Bagian Depan Kanan">Bagian Depan Kanan</option><option value="Bagian Depan Kiri">Bagian Depan Kiri</option><option value="Bagian Samping Kanan">Bagian Samping Kanan</option><option value="Bagian Samping Kiri">Bagian Samping Kiri</option><option value="Bagian Belakang Kanan">Bagian Belakang Kanan</option><option value="Bagian Belakang Kiri">Bagian Belakang Kiri</option><option value="Ruang Mesin">Ruang Mesin</option><option value="Bagian Interior">Bagian Interior</option><option value="Nomor Rangka/Nomor Mesin/Peneng">Nomor Rangka/Nomor Mesin/Peneng</option><option value="Aksesoris Tambahan">Aksesoris Tambahan</option><option value="Cacat Semula" selected>Cacat Semula</option><option value="Lain-lain">Lain-lain</option>';
            } else if (row['TYPE'] == "Lain-lain") {
                option = '<option value=""></option><option value="Bagian Depan">Bagian Depan</option><option value="Bagian Belakang" >Bagian Belakang</option><option value="Bagian Depan Kanan">Bagian Depan Kanan</option><option value="Bagian Depan Kiri">Bagian Depan Kiri</option><option value="Bagian Samping Kanan">Bagian Samping Kanan</option><option value="Bagian Samping Kiri">Bagian Samping Kiri</option><option value="Bagian Belakang Kanan">Bagian Belakang Kanan</option><option value="Bagian Belakang Kiri">Bagian Belakang Kiri</option><option value="Ruang Mesin">Ruang Mesin</option><option value="Bagian Interior">Bagian Interior</option><option value="Nomor Rangka/Nomor Mesin/Peneng">Nomor Rangka/Nomor Mesin/Peneng</option><option value="Aksesoris Tambahan">Aksesoris Tambahan</option><option value="Cacat Semula">Cacat Semula</option><option value="Lain-lain" selected>Lain-lain</option>';
            }
            return '<select id="type-capture" name="type-capture[]" class="form-control" onfocus="this.size=5;" onblur="this.size=1;" onchange="this.size=1; this.blur(); updatedatatype(' + meta.row + ',this.value)">' + option + '</select>';
        }
    }, {
        "defaultContent": "",
        "data": "REMARK",
        render: function (data, type, row, meta) {
            return '<input id="remarks-capture" name="remarks-capture[]" type="text" class="form-control" onChange="updatedataremark(' + meta.row + ',this.value)" value="' + row['REMARK'] + '">'
        }

    }, {
        "defaultContent": "",
        render: function (data, type, row, meta) {
            var fn = "dropSurvey('" + meta.row + "')"
            return '<i class="fas fa-trash fa-lg btnDelete" type="button" style="color: red" onClick ="' + fn + '"></i>';
        }
    }],
    "responsive": true,
    "autoWidth": false,
    "scrollX": false,
    "pageLength": 5,
    "lengthMenu": [
        [5, 10, 20, -1],
        [5, 10, 20, "All"]
    ],
});

table.on('order.dt search.dt', function () {
    table.column(0, {
        search: 'applied',
        order: 'applied'
    }).nodes().each(function (cell, i) {
        cell.innerHTML = i + 1;
    });
}).draw();

// table.on('click', 'tbody tr td i.btnDelete', function (e) {
//     table.row($(this).parents('tr')).remove().draw(false);
// });

$("#change-color").on("click", function () {
    color = !color;
    if (color) {
        signaturePad.penColor = "rgb(255, 0, 0)";
        document.getElementById("change-color").className = "btn btn-outline-danger";
    } else {
        signaturePad.penColor = "rgb(0, 0, 255)";
        document.getElementById("change-color").className = "btn btn-outline-primary";
    }
});

$(window).bind('resize', function () {
    resizeCanvas();
});

function dropSurvey(index) {
    basedata.splice(index, 1);
    table.clear().draw();
    table.rows.add(basedata).draw();
}

function updatedataremark(index, value) {
    basedata[index]['REMARK'] = value;
}

function updatedatatype(index, value) {
    basedata[index]['TYPE'] = value;
}

function resizeCanvas() {
    canvas.width = wrapper.offsetWidth - 35;
    canvas.height = canvas.width * (3.5 / 5) + 195;
    context = canvas.getContext('2d');
    context.drawImage(canvastemp, 0, 0, canvas.width, canvas.height);

    // var ratio = canvastemp.width/canvastemp.height;
    // var w = canvastemp.width-100;
    // var h = parseInt(w/ratio,10);

    // canvas.width = canvastemp.width;
    // canvas.height = canvastemp.height;
    // context = canvas.getContext('2d');
    // context.drawImage(canvastemp, 0, 0, w, h);
}

$('#modal-validation').on('shown.bs.modal', function () {
    resizeCanvas();
    // var ratio = canvastemp.width/canvastemp.height;
    // var w = canvastemp.width-100;
    // var h = parseInt(w/ratio,10);
    // console.log('ratio : ' + ratio);
    // console.log('width : ' + w);
    // console.log('height : ' + h);
    // context = canvas.getContext('2d');
    // canvas.width = w;
    // canvas.height = h;
    // var signaturePad = new SignaturePad(canvas, {
    //     minWidth: 1.5,
    //     maxWidth: 1.5,
    //     throttle: 0,
    //     penColor: 'rgb(0, 0, 255)',
    //     dotSize: 1.5
    // });
    // context.drawImage(canvastemp, 0, 0, w, h);
    
});

function takeScreenshot() {
    
    // console.log('ratio : ' + ratio);
    // console.log('width : ' + w);
    // console.log('height : ' + h);

    context = canvas.getContext('2d');
    contexttmp = canvastemp.getContext('2d');
    context.clearRect(0, 0, canvas.width, canvas.height);
    let tzoffset = (new Date()).getTimezoneOffset() * 60000;
    let text = (new Date(Date.now() - tzoffset)).toISOString().slice(0, 19).replace('T', ' ');
    if (IsSingleSurvey == true) {
        // var ratio = userVideo.videoWidth/userVideo.videoHeight;
        // var w = userVideo.videoWidth-100;
        // var h = parseInt(w/ratio,10);
        var w = userVideo.videoWidth;
        var h = userVideo.videoHeight;
        console.log(w);
        console.log(h);
        canvastemp.width = w;
        canvastemp.height = h;
        contexttmp.drawImage(userVideo, 0, 0, w, h);
    } else {
        // var ratio = userVideo.videoWidth/userVideo.videoHeight;
        // var w = userVideo.videoWidth-100;
        // var h = parseInt(w/ratio,10);
        var w = peerVideo.videoWidth;
        var h = peerVideo.videoHeight;
        console.log(w);
        console.log(h);
        canvastemp.width = w;
        canvastemp.height = h;
        contexttmp.drawImage(peerVideo, 0, 0, w, h);
    }
    var wth = contexttmp.measureText(text).width;
    console.log('wth : ' + wth);
    contexttmp.fillStyle = '#ffffff';
    contexttmp.fillRect(0, canvastemp.height - 20, wth + 90, 20);
    contexttmp.fillStyle = "#000000";
    contexttmp.font = "20px bold";
    contexttmp.fillText(text, 0, canvastemp.height);
    $("#modal-validation").modal('show');
}

// $('#modal-validation').on('shown.bs.modal', function () {
//     // resizeCanvas();
//     // context = canvas.getContext('2d');
//     // context.drawImage(canvastemp, 0, 0, canvas.width, canvas.height);
// });

// function takeScreenshot() {
//     var ratio = userVideo.videoWidth/userVideo.videoHeight;
//     var w = userVideo.videoWidth-100;
//     var h = parseInt(w/ratio,10);
//     console.log('ratio : ' + ratio);
//     console.log('width : ' + w);
//     console.log('height : ' + h);
//     var context = canvastemp.getContext('2d');
//     canvastemp.width = w;
//     canvastemp.height = h;
//     context.drawImage(userVideo, 0, 0, w, h);
//     var data = canvastemp.toDataURL('image/jpeg');
//     console.log(data);
//     $('#base64').val(data);
//     $("#validation").attr('src', data);
//     $("#modal-validation").modal('show');
// }

function clearDrawScreenshot() {
    signaturePad.clear();
    context = canvas.getContext('2d');
    context.drawImage(canvastemp, 0, 0, canvas.width, canvas.height);
}

function finalScreenshot() {
    var data = canvas.toDataURL('image/jpeg');
    var arr = {
        IMG: '<div><img style="width:80px; height:80px;" src="' + data + '" id="img-capture" name="img-capture[]" alt="The screen capture will appear in this box."></div>',
        TYPE: '',
        REMARK: ''
    }
    basedata.push(arr);
    table.clear().draw();
    table.rows.add(basedata).draw();
}

window.addEventListener("load", function () {
    //Condition Marketing Officer
    if (user === "mo") {
        if (IsSingleSurvey == true) {
            $('#default').empty();
            $('#default').html('<div class="col-md-12"><div id="rectangle-user" class="rectangle"><video id="user-video" muted><video style="display:none;" id="peer-video" muted></video></video></div></div>');
            document.getElementsByClassName("nav-item dropdown")[0].style.display = 'none';
            document.getElementById("cancel-survey-class").style.display = 'flex';
        } else {
            $('#default').empty();
            $('#default').html('<div class="col-md-6"><div class="rectangle"><video id="peer-video"></video></div></div><div class="col-md-6"><div class="rectangle"><video id="user-video" muted></video></div></div>');
        }
    }
    userVideo = document.getElementById("user-video");
    peerVideo = document.getElementById("peer-video");
    //Got Devices
    navigator.mediaDevices.enumerateDevices().then(gotDevices).catch(handleError);

    function gotDevices(deviceInfos) {
        devices = deviceInfos.filter(dashboard => dashboard.kind == 'videoinput');
    }

    const clock = document.getElementById("timer");
    let time = -1,
        intervalId;

    function incrementTime() {
        time++;
        clock.textContent =
            ("0" + Math.trunc(time / 60)).slice(-2) +
            ":" + ("0" + (time % 60)).slice(-2);
    }
    incrementTime();
    intervalId = setInterval(incrementTime, 1000);

    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function ($evt) {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let res = JSON.parse(xhr.responseText);
            iceServers = {
                iceServers: [res.v.iceServers]
            }
            console.log("response: ", res.v.iceServers);
        }
    }
    xhr.open("PUT", "https://global.xirsys.net/_turn/" + channel, true);
    xhr.setRequestHeader("Authorization", "Basic " + btoa(ident + ":" + secret));
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(JSON.stringify({
        "format": "urls",
        "expire": "600"
    }));
});

if (user == null || user == "") {
    // divRecordPlayer.style.display = "none";
    // divIconRecording.style.display = "none";
    document.getElementById("startbutton").style.display = "none";
    TableSurvey.style.display = "none";
    document.getElementById("Btn_Cancel_OnTree").style.display = "none";
    leaveButton.innerHTML = "Leave";
    doneButton.className = "fas fa-phone-slash fa-2x"
    doneButton.style.color = "red";
    // Listdocument.style.display = "none";
    videoPreview.style.display = "none";
}

function Preview() {
    if (user == null || user == "") {
        alert('Thanks for your participant');
        socket.emit("leave", roomName);
        if (rtcPeerConnection) {
            rtcPeerConnection.ontrack = null;
            rtcPeerConnection.onicecandidate = null;
            rtcPeerConnection.close();
            rtcPeerConnection = null;
        }

        if (userVideo.srcObject) {
            userVideo.srcObject.getTracks()[0].stop();
            userVideo.srcObject.getTracks()[1].stop();
        }

        if (peerVideo.srcObject) {
            peerVideo.srcObject.getTracks()[0].stop();
            peerVideo.srcObject.getTracks()[1].stop();
        }
        window.location.href = "https://www.aca.co.id/home";
    } else {
        $("#modal-Datatable").modal('show');
        // console.log(data);
    }
}

$('#modal-Datatable').on('shown.bs.modal', function () {
    table.columns.adjust().draw();
});

function PreviewVideo() {
    $("#modal-video").modal('show');
}

moduleMute.addEventListener("click", function () {
    muteFlag = !muteFlag;
    if (muteFlag) {
        userStream.getTracks()[0].enabled = false;
        muteButton.className = "fas fa-microphone-slash icorrect";
        moduleMute.title = "Unmute";
    } else {
        userStream.getTracks()[0].enabled = true;
        muteButton.className = "fas fa-microphone icorrect-mute";
        moduleMute.title = "Mute";
    }
});

hideCameraButton.addEventListener("click", function () {
    hideCameraFlag = !hideCameraFlag;
    if (hideCameraFlag) {
        userStream.getTracks()[1].enabled = false;
        hideCameraButton.className = "fas fa-video-slash fa-2x";
        hideCameraButton.title = "Show Camera";
    } else {
        userStream.getTracks()[1].enabled = true;
        hideCameraButton.className = "fas fa-video fa-2x";
        hideCameraButton.title = "Hide Camera";
    }
});

function handleError(error) {
    console.log('navigator.MediaDevices.getUserMedia error: ', error.message, error.name);
}

socket.on("created", function () {
    var media;
    creator = true;
    if (devices == undefined) {
        window.location.reload();
    }
    // Jika lebih dari 1 device
    if (devices.length > 1) {
        // Jika user kosong atau user = mo dan single survey
        if ((user == null || user == "") || (user == "mo" && IsSingleSurvey == true)) {
            userVideo.style.transform = "scale(1, 1)";
            peerVideo.style.transform = "scale(-1, 1)";
            media = {
                audio: true,
                video: {
                    facingMode: {
                        exact: "environment"
                    }
                }
            }
            // Jika user = mo
        } else if (user == "mo") {
            media = {
                audio: true,
                video: {
                    facingMode: {
                        exact: "user"
                    }
                }
            }
        }
        // Jika hanya 1 device
    } else {
        media = {
            audio: true,
            video: true
        }
    }
    navigator.mediaDevices.getUserMedia(media)
        .then(function (stream) {
            /* use the stream */
            userStream = stream;
            userVideo.srcObject = stream;
            userVideo.onloadedmetadata = function (e) {
                userVideo.play();
            };
        })
        .catch(function (err) {
            console.log(err);
            /* handle the error */
            alert("Could't Access User Media");
        });
});

socket.on("joined", function () {
    var media;
    creator = false;
    if (devices == undefined) {
        window.location.reload();
    }
    // Jika lebih dari 1 device
    if (devices.length > 1) {
        // Jika user kosong
        if (user == null || user == "") {
            userVideo.style.transform = "scale(1, 1)";
            peerVideo.style.transform = "scale(-1, 1)";
            media = {
                audio: true,
                video: {
                    facingMode: {
                        exact: "environment"
                    }
                }
            }
            // Jika user = mo
        } else if (user == "mo") {
            media = {
                audio: true,
                video: {
                    facingMode: {
                        exact: "user"
                    }
                }
            }
        }
        // Jika hanya 1 device
    } else {
        media = {
            audio: true,
            video: true
        }
    }
    navigator.mediaDevices.getUserMedia(media)
        .then(function (stream) {
            /* use the stream */
            userStream = stream;
            userVideo.srcObject = stream;
            userVideo.onloadedmetadata = function (e) {
                userVideo.play();
            };
            socket.emit("ready", roomName);
        })
        .catch(function (err) {
            /* handle the error */
            alert("Could't Access User Media");
        });
});

socket.on("full", function () {
    alert("Room is full, Can't Join This Room");
    window.close();
});

socket.on("ready", function () {
    if (creator) {
        rtcPeerConnection = new RTCPeerConnection(iceServers);
        rtcPeerConnection.onicecandidate = OnIceCandidateFunction;
        rtcPeerConnection.ontrack = OnTrackFunction;
        //console.log(userStream.getTracks());
        rtcPeerConnection.addTrack(userStream.getTracks()[0], userStream);
        rtcPeerConnection.addTrack(userStream.getTracks()[1], userStream);
        // rtcPeerConnection.createOffer(function(offer){},function(){});
        rtcPeerConnection
            .createOffer()
            .then((offer) => {
                rtcPeerConnection.setLocalDescription(offer);
                socket.emit("offer", offer, roomName);
            })
            .catch((error) => {
                console.log(error);
            });
    }
});

socket.on("candidate", function (candidate) {
    var icecandidate = new RTCIceCandidate(candidate);
    rtcPeerConnection.addIceCandidate(icecandidate);
});

socket.on("offer", function (offer) {
    if (!creator) {
        rtcPeerConnection = new RTCPeerConnection(iceServers);
        rtcPeerConnection.onicecandidate = OnIceCandidateFunction;
        rtcPeerConnection.ontrack = OnTrackFunction;
        rtcPeerConnection.addTrack(userStream.getTracks()[0], userStream);
        rtcPeerConnection.addTrack(userStream.getTracks()[1], userStream);
        rtcPeerConnection.setRemoteDescription(offer);
        rtcPeerConnection
            .createAnswer()
            .then((answer) => {
                rtcPeerConnection.setLocalDescription(answer);
                socket.emit("answer", answer, roomName);
            })
            .catch((error) => {
                console.log(error);
            });
    }
});

socket.on("answer", function (answer) {
    rtcPeerConnection.setRemoteDescription(answer);
});

function FinishSurvey() {
    let ActualDate = date
    let StartTimeSurvey = todaytime
    let time = new Date();
    let FinishTimeSurvey = ("0" + time.getHours()).slice(-2) + ":" + ("0" + time.getMinutes()).slice(-2) + ":" + ("0" + time.getSeconds()).slice(-2);
    $.ajax({
        type: "POST",
        url: urlSurvey,
        data: {
            PID: id,
            ActualDate: ActualDate,
            StartTimeSurvey: StartTimeSurvey,
            EndTimeSurvey: FinishTimeSurvey,
            _token: _token
        },
        //crossDomain: true,
    }).done(function (response) {
        // resolve();
        if (response.code == '200') {
            alert('Thanks for your participant');
            socket.emit("leave", roomName);
            if (rtcPeerConnection) {
                rtcPeerConnection.ontrack = null;
                rtcPeerConnection.onicecandidate = null;
                rtcPeerConnection.close();
                rtcPeerConnection = null;
            }
            if (userVideo.srcObject) {
                userVideo.srcObject.getTracks()[0].stop();
                userVideo.srcObject.getTracks()[1].stop();
            }
            if (peerVideo.srcObject) {
                peerVideo.srcObject.getTracks()[0].stop();
                peerVideo.srcObject.getTracks()[1].stop();
            }
            window.location.href = Survey;
        } else {
            alert('Failed : ' + response.message);
        }
    }).fail(function (xhr, status, error) {
        var message = xhr.responseJSON['message'];
        alert('Failed : ' + message);
    });
}

function cancelSurvey() {
    if (confirm('Are you sure you want to cancel this Survey?')) {
        alert('Thanks for your participant');
        socket.emit("leave", roomName);
        if (rtcPeerConnection) {
            rtcPeerConnection.ontrack = null;
            rtcPeerConnection.onicecandidate = null;
            rtcPeerConnection.close();
            rtcPeerConnection = null;
        }
        if (userVideo.srcObject) {
            userVideo.srcObject.getTracks()[0].stop();
            userVideo.srcObject.getTracks()[1].stop();
        }
        if (peerVideo.srcObject) {
            peerVideo.srcObject.getTracks()[0].stop();
            peerVideo.srcObject.getTracks()[1].stop();
        }
        window.location.href = Survey;
    }
}

leaveButton.addEventListener("click", function () {
    if (confirm('Are you sure you want to finish this Survey?')) {
        if (user !== null && user !== '') {
            let img = document.getElementsByName('img-capture[]');
            let typ = document.getElementsByName('type-capture[]');
            let rmk = document.getElementsByName('remarks-capture[]');
            let PolPic = [];
            for (i = 0; i < img.length; i++) {
                try {
                    if (typ[i].value === "") throw "Error on No" + ' ' + [i + 1] + ' ' + "Type Cannot be Null !";
                    if (rmk[i].value === "") throw "Error on No" + ' ' + [i + 1] + ' ' + "Remark Cannot be Null !";
                } catch (err) {
                    alert(err);
                    typ[i].focus();
                    rmk[i].focus();
                    return false;
                }
                let a = img[i];
                let t = typ[i];
                let r = rmk[i];
                let tf = a.src.replace('data:image/jpeg;base64,', '');
                PolPic[i] = {
                    ImageID: '0',
                    TmpFile: tf,
                    Title: t.value,
                    Remark: r.value,
                    FileType: 'JPEG'
                }
            }
            $.ajax({
                type: "POST",
                url: urlDocument,
                data: {
                    PID: id,
                    PolicyPIC: PolPic,
                    _token: _token
                },
            }).done(function (response) {
                console.log(response);
                if (response.code == '200') {
                    FinishSurvey();
                } else {
                    alert('Failed : ' + response.message);
                }
            }).fail(function (xhr, status, error) {
                var message = xhr.responseJSON['message'];
                alert('Failed : ' + message);
            });
        }
    } else {
        // Do nothing!
    }
});

socket.on("leave", function () {
    creator = true;
    if (rtcPeerConnection) {
        rtcPeerConnection.ontrack = null;
        rtcPeerConnection.onicecandidate = null;
        rtcPeerConnection.close();
        rtcPeerConnection = null;
    }
    if (peerVideo.srcObject) {
        peerVideo.srcObject.getTracks()[0].stop();
        peerVideo.srcObject.getTracks()[1].stop();
    }
});

function OnIceCandidateFunction(event) {
    if (event.candidate) {
        socket.emit("candidate", event.candidate, roomName);
    }
}

function OnTrackFunction(event) {
    peerVideo.srcObject = event.streams[0];
    peerVideo.onloadedmetadata = function (e) {
        peerVideo.play();
    };
}

function genLink() {
    if (roomName != null) {
        socket.emit("join", roomName);
    } else {
        alert("room not valid");
    }
}

(() => {
    const videoElm = document.querySelector('#user-video');

    const supports = navigator.mediaDevices.getSupportedConstraints();
    if (!supports['facingMode']) {
        alert('Browser Not supported!');
        return;
    }

    let stream;

    const capture = async facingMode => {
        const options = {
            audio: false,
            video: {
                facingMode,
            },
        };

        try {
            if (stream) {
                const tracks = stream.getTracks();
                tracks.forEach(track => track.stop());
            }
            stream = await navigator.mediaDevices.getUserMedia(options);
        } catch (e) {
            alert(e);
            return;
        }
        videoElm.srcObject = null;
        videoElm.srcObject = stream;
        videoElm.play();
    }

    // moduleSwitch.addEventListener('click', () => {
    //     if (BtnSwitch.className === "fas fa-toggle-off icorrect") {
    //         BtnSwitch.className = "fas fa-toggle-on icorrect";
    //         userStream.getTracks()[1].enabled = false;
    //         capture('user');
    //         userStream.getTracks()[1].enabled = true;
    //     } else if (BtnSwitch.className === "fas fa-toggle-on icorrect") {
    //         BtnSwitch.className = "fas fa-toggle-off icorrect";
    //         userStream.getTracks()[1].enabled = false;
    //         capture('environment');
    //         userStream.getTracks()[1].enabled = true;
    //     }
    // });
})();