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
            <p class="col-sm-2 col-form-label">Agent ID</p>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="txtAID" name="AID"></input>
            </div>
            <div class="col-sm-5"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="row justify-content-center">
            <p class="col-sm-2 col-form-label">Agent Name</p>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="txtName" name="Name" readonly></input>
            </div>
            <div class="col-sm-5"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="row justify-content-center">
            <p class="col-sm-2 col-form-label">Branch</p>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="txtBranch" name="Branch" readonly></input>
            </div>
            <div class="col-sm-5"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="row justify-content-center">
            <div class="col-sm-3">
                <button class='btn btn-sm btn-primary btn-block btn-save'>Add Agent</button>
            </div>
        </div>
    </div>
</body>

</html>