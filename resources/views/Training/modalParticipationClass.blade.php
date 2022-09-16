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
            <p class="col-sm-2 col-form-label">Training ID</p>
            <div class="col-sm-9"><input type="text" class="form-control" id="trainingid" name="txtTrainingID"
                    readonly></input>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row justify-content-center">
            <p class="col-sm-2 col-form-label">Date</p>
            <div class="input-group date col-sm-9" id="datetraining" data-target-input="nearest">
                <input type="text" id="date" name="TxtDateTraining" class="form-control datetimepicker-input"
                    data-target="#datetraining" placeholder="mm/dd/yyyy"/>
                <div class="input-group-append" data-target="#datetraining" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row justify-content-center">
            <p class="col-sm-2 col-form-label">Time</p>
            <div class="col-sm-2"><input type="text" class="form-control" id="startime" name="StartTimeTraining"
                    readonly></input>
            </div>
            -
            <div class="col-sm-2"><input type="text" class="form-control" id="endtime" name="endtime"
                    readonly></input>
            </div>
            <div class="col-sm-5"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="row justify-content-center">
            <p class="col-sm-2 col-form-label">Location</p>
            <div class="col-sm-9">
                <textarea class="form-control" rows="3" readonly id="location" name="location"></textarea>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row justify-content-center">
            <p class="col-sm-2 col-form-label">Agent Level</p>
            <div class="col-sm-4"><input type="checkbox" class="form-check-inputs" id="agentlevel1f"
                    name="AgentLevel1F">Partner
            </div>
            <div class="col-sm-5"><input type="checkbox" class="form-check-inputs" id="agentlevel2f"
                    name="AgentLevel2F">Senior Partner
            </div>
        </div>
        <div class="row justify-content-center">
            <p class="col-sm-2 col-form-label"></p>
            <div class="col-sm-4"><input type="checkbox" class="form-check-inputs" id="agentlevel3f"
                    name="AgentLevel3F">Executive Partner
            </div>
            <div class="col-sm-5"><input type="checkbox" class="form-check-inputs" id="agentlevel4f"
                    name="AgentLevel4F">Managing Partner
            </div>
        </div>
    </div>
    </div>
    <div class="form-group">
        <div class="row justify-content-center">
            <p class="col-sm-2 col-form-label">Trainer</p>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="trainer" name="trainer" readonly></input>
            </div>
            <div class="col-sm-5"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="row justify-content-center">
            <p class="col-sm-2 col-form-label">Ada Ujian</p>
            <div class="col-sm-9">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="ujianf" name="customRadioInline" class="custom-control-input">
                    <p class="custom-control-label" for="customRadioInline1">Ya</p>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="ujianf" name="customRadioInline" class="custom-control-input">
                    <p class="custom-control-label" for="customRadioInline2">Tidak</p>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row justify-content-center">
            <p class="col-sm-2 col-form-label">Subject</p>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="subjects" name="subject" readonly></input>
            </div>
            <div class="col-sm-5"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="row justify-content-center">
            <p class="col-sm-2 col-form-label">Description</p>
            <div class="col-sm-9">
                <textarea class="form-control" rows="3" readonly id="description"></textarea>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row justify-content-center">
            <p class="col-sm-2 col-form-label">Participate</p>
            <div class="col-sm-4">
                <select class="form-control select2bs4 select2bs4-getapi" id="participation" name="LstParticipation">
                    <option></option>
                    <option value="false">Yes</option>
                    <option value="true">No</option>
                </select>
            </div>
            <div class="col-sm-5"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="row justify-content-center">
            <div class="col-sm-3">
                <button class='btn btn-sm btn-primary btn-block btn-save'>Save</button>
            </div>
        </div>
    </div>
</body>
<script>
    var data = @json([$data]);
</script>
<script src=" {{asset('dist/js/TrainingClass/modalParticipantClass.js?')}}"></script>
<!-- General For Web Portal MW -->
<script src="{{asset('dist/js/pages/webportal.js?')}}"></script>

</html>