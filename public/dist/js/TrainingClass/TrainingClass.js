$('#datetraining').datetimepicker({
    format: 'L'
});

$('#SDateTraining').datetimepicker({
    format: 'L'
});

$('#EDateTraining').datetimepicker({
    format: 'L'
});

var dataTrainingClass = [{
    "TrainingID": "TD001",
    "Date": "15 Jul 2022",
    "StartTime": "09:00",
    "EndTime": "16:00",
    "Status": "Cancel Class",
    "Location": "ACA Cabang Bekasi Jalan Ir H Juanda no 151, Bekasi Timur",
    "Subjects": "Motorcar",
    "AgentLVL_1F": true, // Partner
    "AgentLVL_2F": true, // Senior Partner
    "AgentLVL_3F": false, // Executive Partner
    "AgentLVL_4F": false, // Managing Partner
    "Trainer": "Rally Ahmad",
    "Participation": "Yes",
    "UjianF": true,
    "Description": "Training Agent for detail motorcar",
}, {
    "TrainingID": "TD002",
    "Date": "01 Aug 2022",
    "StartTime": "10:00",
    "EndTime": "17:00",
    "Status": "Rescheduled",
    "Location": "ACA Cabang Latumenten Jl. Prof. Dr. Latumenten No. 28 A-B-C, Angke, Tambora, RT.2/RW.8, Angke, Kec. Tambora, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11460",
    "Subjects": "ASRI",
    "AgentLVL_1F": false, // Partner
    "AgentLVL_2F": false, // Senior Partner
    "AgentLVL_3F": true, // Executive Partner
    "AgentLVL_4F": true, // Managing Partner
    "Trainer": "Charles Sutanto",
    "Participation": "No",
    "UjianF": false,
    "Description": "Training Agent for detail ASRI",
}, {
    "TrainingID": "TD003",
    "Date": "15 Aug 2022",
    "StartTime": "15:00",
    "EndTime": "16:00",
    "Status": "On Scheduled",
    "Location": "MITRACA PUSAT HERMINA OFFICE BUILDING TOWER I Lantai.3, Jl. HBR Motik No.4, RW.10, Gn. Sahari Sel., Kec. Kemayoran, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10610",
    "Subjects": "Business Presentation Skill",
    "AgentLVL_1F": true, // Partner
    "AgentLVL_2F": true, // Senior Partner
    "AgentLVL_3F": true, // Executive Partner
    "AgentLVL_4F": true, // Managing Partner
    "Trainer": "Wahyu Didik",
    "Participation": "Yes",
    "UjianF": false,
    "Description": "Training Agent for detail Business Presentation Skill",
}];

var tblTrainingClass = $('#tblTrainingClass').DataTable({
    "data": dataTrainingClass,
    "columns": [{
        "defaultContent": "",
        "title": "Date & Time",
        render: function (data, type, row, meta) {
            return '<div> Date : ' + row.Date + '<br>Time : ' + row.StartTime + ' - ' + row.EndTime + ' <br>Status : ' + row.Status + '</div>';
        }
    }, {
        "defaultContent": "",
        "title": "Location",
        render: function (data, type, row, meta) {
            return '<div class="text-wrap">' + row.Location + '</div>';
        }
    }, {
        "defaultContent": "",
        "title": "Subjects",
        render: function (data, type, row, meta) {
            return '<div class="text-wrap">' + row.Subjects + '</div>';
        }
    }, {
        "defaultContent": "",
        "title": "Agent Level",
        render: function (data, type, row, meta) {
            if (row.AgentLVL_1F === true) {
                if (row.AgentLVL_2F === true) {
                    if (row.AgentLVL_3F === true) {
                        if (row.AgentLVL_4F === true) {
                            return '<i class="fas fa-check"></i>Partner<br><i class="fas fa-check"></i>Senior Partner<br><i class="fas fa-check"></i>Executive Partner<br><i class="fas fa-check"></i>Managing Partner</div>';
                        } else {
                            return '<i class="fas fa-check"></i>Partner<br><i class="fas fa-check"></i>Senior Partner<br><i class="fas fa-check"></i>Executive Partner';
                        }
                    } else {
                        return '<i class="fas fa-check"></i>Partner<br><i class="fas fa-check"></i>Senior Partner';
                    }
                } else {
                    return '<i class="fas fa-check"></i>Partner';
                }
            } else if (row.AgentLVL_2F === true) {
                if (row.AgentLVL_1F === true) {
                    if (row.AgentLVL_3F === true) {
                        if (row.AgentLVL_4F === true) {
                            return '<i class="fas fa-check"></i>Partner<br><i class="fas fa-check"></i>Senior Partner<br><i class="fas fa-check"></i>Executive Partner<br><i class="fas fa-check"></i>Managing Partner</div>';
                        } else {
                            return '<i class="fas fa-check"></i>Partner<br><i class="fas fa-check"></i>Senior Partner<br><i class="fas fa-check"></i>Executive Partner';
                        }
                    } else {
                        return '<i class="fas fa-check"></i>Partner<br><i class="fas fa-check"></i>Senior Partner';
                    }
                } else {
                    return '<i class="fas fa-check"></i>Senior Partner';
                }
            } else if (row.AgentLVL_3F === true) {
                if (row.AgentLVL_1F === true) {
                    if (row.AgentLVL_2F === true) {
                        if (row.AgentLVL_4F === true) {
                            return '<i class="fas fa-check"></i>Partner<br><i class="fas fa-check"></i>Senior Partner<br><i class="fas fa-check"></i>Executive Partner<br><i class="fas fa-check"></i>Managing Partner</div>';
                        } else {
                            return '<i class="fas fa-check"></i>Partner<br><i class="fas fa-check"></i>Senior Partner<br><i class="fas fa-check"></i>Executive Partner';
                        }
                    } else {
                        return '<i class="fas fa-check"></i>Partner<br><i class="fas fa-check"></i>Executive Partner';
                    }
                } else {
                    return '<i class="fas fa-check"></i>Executive Partner';
                }
            } else if (row.AgentLVL_4F === true) {
                if (row.AgentLVL_1F === true) {
                    if (row.AgentLVL_2F === true) {
                        if (row.AgentLVL_3F === true) {
                            return '<i class="fas fa-check"></i>Partner<br><i class="fas fa-check"></i>Senior Partner<br><i class="fas fa-check"></i>Executive Partner<br><i class="fas fa-check"></i>Managing Partner</div>';
                        } else {
                            return '<i class="fas fa-check"></i>Partner<br><i class="fas fa-check"></i>Senior Partner<br><i class="fas fa-check"></i>Managing Partner</div>';
                        }
                    } else {
                        return '<i class="fas fa-check"></i>Partner<br></i>Managing Partner</div>';
                    }
                } else {
                    return '<i class="fas fa-check"></i>Managing Partner';
                }
            }
        }
    }, {
        "defaultContent": "",
        "title": "Action",
        render: function (data, type, row, meta) {
            var fn;
            if (session == 'AGENT'){
                fn = "viewParticipant('" + row.TrainingID + "')"
                return '<div>Trainer : ' + row.Trainer + '<br>Participation : ' + row.Participation + '</div><div align="center"><button class="btn btn-primary btn-sm" id="participationClass" name="participationClass" onclick="' + fn + '">Participation</button></div>';
            } else {
                fn = "viewOpenClass('" + row.TrainingID + "')"
                return '<div>Trainer : ' + row.Trainer + '<br></div><div align="center"><button class="btn btn-primary btn-sm" id="participationClass" name="participationClass" onclick="' + fn + '">Open Class</button></div>'
            }
        }
    }],
    "autoWidth": true,
    "responsive": true,
    "searching": false,
});

function format_date(date_string) {
    var fomatedDate = new Date(date_string);
    var month = fomatedDate.getMonth() + 1;
    if (month < 10) {
        month = '0' + month;
    }
    var day = fomatedDate.getDate();
    if (day < 10) {
        day = '0' + day;
    }
    var year = fomatedDate.getFullYear();

    return month + "/" + day + "/" + year;
}

async function viewOpenClass(ID){
    $('#class-modal-dialog').attr('class', 'modal-dialog modal-lg');
    $('#modaltitle').text('Open Class Training');
    $('#modalbody').empty();
    $('#modalfooter').empty();
    const filterarray = dataTrainingClass.filter(asd => asd.TrainingID == ID);

    var trainingid = filterarray[0].TrainingID;
    var date = filterarray[0].Date;
    var starttime = filterarray[0].StartTime;
    var endtime = filterarray[0].EndTime;
    var location = filterarray[0].Location;
    var subjects = filterarray[0].Subjects;
    let agentlvl1f = filterarray[0].AgentLVL_1F;
    let agentlvl2f = filterarray[0].AgentLVL_2F;
    let agentlvl3f = filterarray[0].AgentLVL_3F;
    let agentlvl4f = filterarray[0].AgentLVL_4F;
    var trainer = filterarray[0].Trainer;

    const res = await getModalView(modalOpenClass + "?trainingid=" + trainingid + "&date=" + date + "&starttime=" + starttime + "&endtime=" + endtime + "&location=" + location + "&subjects=" + subjects + "&agentlvl1f=" + agentlvl1f + "&agentlvl2f=" + agentlvl2f + "&agentlvl3f=" + agentlvl3f + "&agentlvl4f=" + agentlvl4f + "&trainer=" + trainer);

    $('#modalbody').html(res);

    $('#modal-general').modal({
        keyboard: true,
        backdrop: 'static',
        show: true
    });
}

async function viewParticipant(ID) {
    $('#class-modal-dialog').attr('class', 'modal-dialog modal-lg');
    $('#modaltitle').text('Participant Class Training');
    $('#modalbody').empty();
    $('#modalfooter').empty();
    const filterarray = dataTrainingClass.filter(asd => asd.TrainingID == ID);

    var trainingid = filterarray[0].TrainingID;
    var date = filterarray[0].Date;
    var starttime = filterarray[0].StartTime;
    var endtime = filterarray[0].EndTime;
    var status = filterarray[0].Status;
    var location = filterarray[0].Location;
    var subjects = filterarray[0].Subjects;
    let agentlvl1f = filterarray[0].AgentLVL_1F;
    let agentlvl2f = filterarray[0].AgentLVL_2F;
    let agentlvl3f = filterarray[0].AgentLVL_3F;
    let agentlvl4f = filterarray[0].AgentLVL_4F;
    var trainer = filterarray[0].Trainer;
    var participation = filterarray[0].Participation;
    var ujianf = filterarray[0].UjianF;
    var description = filterarray[0].Description;

    const res = await getModalView(modalParticipantClass + "?trainingid=" + trainingid + "&date=" + date + "&starttime=" + starttime + "&endtime=" + endtime + "&status=" + status + "&location=" + location + "&subjects=" + subjects + "&agentlvl1f=" + agentlvl1f + "&agentlvl2f=" + agentlvl2f + "&agentlvl3f=" + agentlvl3f + "&agentlvl4f=" + agentlvl4f + "&trainer=" + trainer + "&participation=" + participation + "&ujianf=" + ujianf + "&description=" + description);

    $('#modalbody').html(res);

    $('#modal-general').modal({
        keyboard: false,
        backdrop: 'static',
        show: true
    });
}