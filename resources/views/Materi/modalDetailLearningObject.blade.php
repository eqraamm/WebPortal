<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="form-group">
        <div class="row justify-content-center">
            <p id="desc"></p>
        </div>
    </div>
</body>
<script>
    var data = @json([$data]);
    console.log(data);
</script>
<!-- General For Web Portal MW -->
<script src="{{asset('dist/js/pages/webportal.js?')}}"></script>
<script src=" {{asset('dist/js/Materi/modalLearning.js?')}}"></script>

</html>