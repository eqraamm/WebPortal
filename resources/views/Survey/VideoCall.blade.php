<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- font icon goggle API -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- overlayScrollbars -->
    <!-- <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.cs')}}"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.css"> -->
    <!-- SweetAlert2 -->
    <!-- <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"> -->
    <!-- <script src="sweetalert2.min.js"></script> -->
    <!-- <link rel="stylesheet" href="sweetalert2.min.css"> -->
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
    <!-- BStepper -->
    <link rel="stylesheet" href="{{asset('plugins/bs-stepper/css/bs-stepper.min.css')}}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{asset('plugins/dropzone/min/dropzone.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

    <!-- Animate Css -->
    <!-- <link rel="stylesheet" href="{{asset('plugins/animate-css/animate.css')}}"> -->
    <!-- Icon Font css -->
    <!-- <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/all.css')}}"> -->
    <!-- <link rel="stylesheet" href="{{asset('plugins/fonts/Pe-icon-7-stroke.css')}}"> -->
    <!-- Themify icon Css -->
    <!-- <link rel="stylesheet" href="{{asset('plugins/themify/css/themify-icons.css')}}"> -->
    <!-- Slick Carousel CSS -->
    <!-- <link rel="stylesheet" href="{{asset('plugins/slick-carousel/slick/slick.css')}}"> -->
    <!-- <link rel="stylesheet" href="{{asset('plugins/slick-carousel/slick/slick-theme.css')}}"> -->

    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.2.0/socket.io.js"></script>
    <!-- <script src="/capture.js"></script> -->

    <!-- web streams API polyfill to support Firefox -->
    <script src="https://unpkg.com/@mattiasbuelens/web-streams-polyfill/dist/polyfill.min.js"></script>

    <!-- ../libs/DBML.js to fix video seeking issues -->
    <script src="https://www.webrtc-experiment.com/EBML.js"></script>

    <!-- for Edge/FF/Chrome/Opera/etc. getUserMedia support -->
    <script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
    <script src="https://www.webrtc-experiment.com/DetectRTC.js"></script>
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

    <!-- video element -->
    <link href=" https://www.webrtc-experiment.com/getHTMLMediaElement.css" rel="stylesheet" />
    <script src="https://www.webrtc-experiment.com/getHTMLMediaElement.js"></script>
    <!-- <link href="styles.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css"> -->
    <!-- style modal footer -->
    <!-- <style>
        html,
        body {
            /* margin: 0;
            min-height: 100%;
            min-width: 100%; */
            /* position:fixed;
            top:0;
            bottom:0;
            left:0;
            right:0; */
            margin: 0;
            background-color: #211f1f;
        }

        @media screen and (min-width : 0px) and (max-width : 800px) {
            .mobile-space {
                margin-top: 10px;
            }
        }

        /* .header {
            display: block;
            width: 100%;
            flex: none;
        } */

        .container {
            /* min-height: 100%;
            position: relative;
            overflow-y: auto; */
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .footer {
            position: relative;
            width: 100%;
            left: 0;
            bottom: 0;
        }

        #user-video {
            transition: opacity 1s;
            transform: scale(1, 1);
            border-radius: 15px;
            object-fit: cover;
            height: 100%;
            width: 100%;
        }

        #peer-video {
            transition: opacity 1s;
            transform: scale(1, 1);
            border-radius: 15px;
            object-fit: cover;
            height: 100%;
            width: 100%;
        }

        nav {
            position: fixed;
            top: 0px;
            z-index: 1;
            transform-origin: 0 0;
        }

        .navbar-text {
            min-height: 20px;
            height: 20px;
        }

        .icorrect {
            padding: 3px;
            margin-right: 5px;
        }

        .icorrect-mute {
            padding: 3px;
            margin-right: 12px;
        }

        #canvasImage {
            width: 100%;
        }
    </style> -->
    <style>
        html,
        body {
            margin: 0;
            overflow: hidden;
            padding: 0;
            background-color: #211f1f;
        }

        /* #container {
            display: flex;
            flex-direction: column;
            overflow: hidden;
            height: 100vh;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        } */

        header {
            height: 40px;
            width: 100%;
        }

        /* #container-video {
            width: 100%;
            height: 90%;
            position: relative;
            padding-top: 1%;
            padding-bottom: 1%;
            align-items: center;
        } */

        .wrapper {
            height: 100%;
        }

        @media screen and (min-width : 0px) and (max-width : 767px) {
            #user-video {
                transition: opacity 1s;
                border-radius: 10px;
                height: 310px;
                width: 767px;
                object-fit: cover; 
            }

            #peer-video {
                transition: opacity 1s;
                border-radius: 10px;
                height: 310px;
                width: 767px;
                object-fit: cover;
            }

            body {
                background-color: #211f1f;
            }

            .container-fluid {
                overflow: hidden;
                height: 100%;
                padding: 0;
            }
        }

        .container-fluid {
            overflow: hidden;
            height: 100%;
            padding: 0;
        }

        .row {
            /* height: 100%; */
            --bs-gutter-x: 0;
        }

        #user-video {
            transition: opacity 1s;
            transform: scale(-1, 1);
            border-radius: 10px;
            position: relative;
            object-fit: cover;
        }

        #peer-video {
            transition: opacity 1s;
            transform: scale(1, 1);
            border-radius: 10px;
            position: relative;
            object-fit: cover;
        }

        footer {
            /* height: 40px; */
            width: 100%;
            position: absolute;
            bottom: 0;
        }

        /* .footer {
            position: relative;
            height: 5%;
            bottom: 0px;
            width: 100%;
            background-color: #211f1f;
        } */

        .vertical-center {
            /* margin-top: 5px; */
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            /* background-color: royalblue; */
            width: 100%;
        }

        .rectangle {
            height: 100%;
            width: 100%;
            /* background-color: rgb(255, 0, 0); */
            /* border-radius:7px; */
            display: flex;
            justify-content: center;
            /* align-items: center; */
            border: 1px;
        }

        nav {
            position: fixed;
            top: 0px;
            z-index: 1;
            transform-origin: 0 0;
        }

        .navbar-text {
            min-height: 20px;
            height: 20px;
        }

        .icorrect {
            padding: 3px;
            margin-right: 5px;
        }

        .icorrect-mute {
            padding: 3px;
            margin-right: 12px;
        }

        #canvasImage {
            width: 100%;
        }
    </style>
</head>

<body onload="genLink()">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="nav navbar-text" style="width:100%;">
                <a style="color: rgb(255 255 255);position: absolute;top: 7px;" id="timer">00:00</a>
            </div>
        </nav>
    </header>
    <div class="container-fluid">
        <div class="vertical-center">
            <div class="row" id="default">
                <div class="col-md-6">
                    <div class="rectangle">
                        <video id="user-video" muted></video>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="rectangle">
                        <video id="peer-video"></video>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <canvas id="temp" style="display:none;"></canvas>
                </div>
            </div>
        </div>
        <!-- <canvas id="temp" style="display:nonne" width="720" height="620"></canvas> -->
    </div>
    <footer>
        <ul class="nav justify-content-center">
            <!-- camera on/off -->
            <li class="nav-item">
                <a class="nav-link">
                    <i class="fas fa-video fa-2x" type="button" style="color: grey" id="Btn_Hide"
                        title="Hide Camera"></i>
                </a>
            </li>
            <!-- screenshot survey -->
            <li class="nav-item">
                <a class="nav-link" id="startbutton" onclick="takeScreenshot()">
                    <i class="fas fa-camera fa-2x" type="button" style="color: grey" title="Take ScreenShot"></i>
                </a>
            </li>
            <!-- finish survey -->
            <li class="nav-item">
                <a class="nav-link">
                    <i class="fas fa-check fa-2x" type="button" style="color: green" id="Btn_Done" onclick="Preview()"
                        title="Finish Survey"></i>
                </a>
            </li>
            <!-- cancel survey hidden-->
            <li class="nav-item" id="cancel-survey-class" style="display:none;">
                <a class="nav-link">
                    <i class="fas fa-phone-slash fa-2x" type="button" style="color: red;" title="Cancel Survey"
                        onclick="cancelSurvey()"></i>
                </a>
            </li>
            <!-- tree menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" type="button">
                    <span class="iconify fa-2x" data-icon="carbon:overflow-menu-vertical" style="color: grey;"></span>
                </a>
                <div class="dropdown-menu">
                    <!-- <a class="nav-link dropdown-item" id="Switch"><i class="fas fa-toggle-off icorrect" type="button" style="color: grey" id="Btn_Switch" ></i>Switch Camera</a> -->
                    <a class="nav-link dropdown-item" id="Mute" title="Mute"><i class="fas fa-microphone icorrect-mute"
                            type="button" style="color: grey" id="Btn_Mute"></i>Mute</a>
                    <!-- <a class="nav-link dropdown-item" id="startbutton" onclick="takeScreenshot()"><i class="fas fa-camera icorrect" type="button" style="color: grey"></i>Screenshot</a> -->
                    <a class="nav-link dropdown-item" onclick="cancelSurvey()" id="Btn_Cancel_OnTree"><i
                            class="fas fa-phone-slash icorrect" type="button" style="color: red"
                            title="Cancel Survey"></i>Cancel</a>
                    </a>
                </div>
            </li>
            <!-- swtiching camera -->

            <!-- record button ( video record) -->
            <!-- <li class="nav-item" id="icn-recording" style="display: flex;">
        <a class="nav-link">
          <i class="fas fa-record-vinyl fa-2x" type="button" style="color :red;display: flex;"
            id="btn-start-recording"></i>
        </a>
        <a class="nav-link"><i class="fas fa-pause fa-2x" type="button" style="color: red; display: none;"
            id="btn-pause-recording"></i></a>
      </li> -->
        </ul>
    </footer>

    </div>
    <!-- The Modal Datatable -->
    <div class="modal fade" id="modal-Datatable">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title">List Screenshot</label>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="body-datatable">
                    <table id="tblsurvey" class="table table-striped dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Preview</th>
                                <th>Type</th>
                                <th>Remark</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="Btn_Finish">Save & Finish</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal preview photo -->
    <div class="modal fade" id="modal-validation">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title">Preview Photo</label>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="body-widget">
                    <center>
                        <div id="canvas"><canvas id="canvasImage" style="border:1px solid #c4caac"></canvas></div>
                        <!-- <img id="validation" style="width: 60%; height: 100%;"> -->
                        <!-- <input id="base64" type="text"></input> -->
                    </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" id="change-color">Change Color</button>
                    <button type="button" class="btn btn-outline-success" data-dismiss="modal"
                        onclick="finalScreenshot()">Save</button>
                    <button type="button" class="btn btn-outline-warning" onclick="clearDrawScreenshot()">Clear</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal preview video -->
    <div class="modal fade" id="modal-video">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title">Preview Video</label>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="body-widget">
                    <center>
                        <div class="" id="recording-player1" style="align-content: center;">
                            <canvas id="canvas" style="display: none; "></canvas>
                        </div>
                    </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save-to-disk">Save To Disk</button>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top: 10px; display: none;" id="recording-player">
        <section class="experiment recordrtc">
            <h2 class="header" style="margin: 0">
                <select class="recording-media">
                    <option value="record-audio-plus-video">Microphone+Camera</option>
                    <option value="record-audio">Microphone</option>
                    <option value="record-screen">Full Screen</option>
                    <option value="record-audio-plus-screen" selected>Microphone+Screen</option>
                </select>

                <span style="font-size: 15px; color: #000000">into</span>

                <select class="media-container-format">
                    <option>default</option>
                    <option>vp8</option>
                    <option>vp9</option>
                    <option>h264</option>
                    <option>mkv</option>
                    <option>opus</option>
                    <option>ogg</option>
                    <option>pcm</option>
                    <option>gif</option>
                    <option>whammy</option>
                    <option>WebAssembly</option>
                </select>

                <!-- <button id="btn-start-recording">Start Recording</button>
      <button id="btn-pause-recording" style="display: none; font-size: 15px">
        Pause
      </button> -->
                <input type="checkbox" id="chk-timeSlice" style="margin:0;width:auto;"
                    title="Use intervals based recording">
                <label for="chk-timeSlice"
                    style="font-size: 15px;margin:0;width: auto;cursor: pointer;-webkit-user-select:none;user-select:none;"
                    title="Use intervals based recording">Use timeSlice?</label>

                <div style="display: inline-block">
                    <input type="checkbox" id="chk-fixSeeking" style="margin: 0; width: auto"
                        title="Fix video seeking issues?" />
                    <label for="chk-fixSeeking" style="
              font-size: 15px;
              margin: 0;
              width: auto;
              cursor: pointer;
              -webkit-user-select: none;
              user-select: none;
              color: #000000;
            " title="Fix video seeking issues?">Fix Seeking Issues?</label>
                </div>
        </section>
        <select class="media-resolutions">
            <option value="default">Default resolutions</option>
            <option value="1920x1080">1080p</option>
            <option value="1280x720">720p</option>
            <option value="640x480">480p</option>
            <option value="3840x2160">4K Ultra HD (3840x2160)</option>
        </select>

        <select class="media-framerates">
            <option value="default">Default framerates</option>
            <option value="5">5 fps</option>
            <option value="15">15 fps</option>
            <option value="24">24 fps</option>
            <option value="30">30 fps</option>
            <option value="60">60 fps</option>
        </select>

        <select class="media-bitrates">
            <option value="default">Default bitrates</option>
            <option value="8000000000">1 GB bps</option>
            <option value="800000000">100 MB bps</option>
            <option value="8000000">1 MB bps</option>
            <option value="800000">100 KB bps</option>
            <option value="8000">1 KB bps</option>
            <option value="800">100 Bytes bps</option>
        </select>
        </h2>
        </section>
    </div>
</body>

<!-- <script src="{{asset('plugins/RTC/RecordRTC.js')}}"></script> -->
<script src="https://cdn.socket.io/4.3.2/socket.io.min.js"
    integrity="sha384-KAZ4DtjNhLChOB/hxXuKqhMLYvx3b5MlT55xPEiNmREKRzeEm+RVPlTnAn0ajQNs" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- <script src="https://www.webrtc-experiment.com/commits.js" async></script> -->
<!-- <script src="https://apis.google.com/js/client:plusone.js"></script> -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- SweetAlert2 -->
<!-- <script src="plugins/sweetalert2/sweetalert2.min.js"></script> -->
<!-- <script src="sweetalert2.all.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://requirejs.org/docs/release/2.3.5/minified/require.js"></script>
<script>
    var channel = "{{config('app.CHANNELS')}}";
    var secret = "{{config('app.CREDENTIALTURN')}}";
    var ident = "{{config('app.USERNAMETURN')}}";
    var urlAPI = "{{config('app.URLAPIMIDDLEWARE')}}";
    var webSockets = "{{config('app.URLWEBSOCKETS')}}";
    var Survey = "{{ route('survey') }}";
    var urlDocument = "{{ route('SaveSurveyDocument') }}";
    var urlSurvey = "{{ route('FinishSurvey') }}";
    (function () {
        var params = {},
            r = /([^&=]+)=?([^&]*)/g;

        function d(s) {
            return decodeURIComponent(s.replace(/\+/g, ' '));
        }

        var match, search = window.location.search;
        while (match = r.exec(search.substring(1))) {
            params[d(match[1])] = d(match[2]);

            if (d(match[2]) === 'true' || d(match[2]) === 'false') {
                params[d(match[1])] = d(match[2]) === 'true' ? true : false;
            }
        }

        window.params = params;
    })();

    function addStreamStopListener(stream, callback) {
        stream.addEventListener('ended', function () {
            callback();
            callback = function () {};
        }, false);
        stream.addEventListener('inactive', function () {
            callback();
            callback = function () {};
        }, false);
        stream.getTracks().forEach(function (track) {
            track.addEventListener('ended', function () {
                callback();
                callback = function () {};
            }, false);
            track.addEventListener('inactive', function () {
                callback();
                callback = function () {};
            }, false);
        });
    }
</script>
<script src="{{asset('dist/js/Survey/ConferenceCall.js')}}"></script>
<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

</html>