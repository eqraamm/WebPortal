var dataParticipateTraining = [{
        "TrainingID": "TD001",
        "ID": "A0001",
        "Name": "Pieter",
        "Cabang": "Medan",
    },
    {
        "TrainingID": "TD002",
        "ID": "A0002",
        "Name": "Calvin",
        "Cabang": "Jakartaa",
    },
    {
        "TrainingID": "TD002",
        "ID": "A0003",
        "Name": "Adisty",
        "Cabang": "Depok",
    },
    {
        "TrainingID": "TD001",
        "ID": "A0004",
        "Name": "Adit",
        "Cabang": "Bekasi",
    },
    {
        "TrainingID": "TD003",
        "ID": "A0005",
        "Name": "Bima",
        "Cabang": "Tangerang",
    },
    {
        "TrainingID": "TD002",
        "ID": "A0006",
        "Name": "Ikhsan",
        "Cabang": "Bekasi",
    }
];

function parseDataToInput(data) {
    for (var key in data[0]) {
        if ($('#' + key).attr('type') == 'checkbox') {
            if (data[0][key] == true || data[0][key] == $('#' + key).val()) {
                document.getElementById(key).checked = true;
            } else {
                if (typeof $('#' + key).attr('disabled') == undefined || $('#' + key).attr('disabled') == '') {
                    document.getElementById(key).checked = false;
                }
            }
        } else if ($('#' + key).is('select')) {
            if ($('#' + key).val() != data[0][key]) {
                for (i = 0; i < document.querySelectorAll('#' + key).length; i++) {
                    document.querySelectorAll('#' + key)[i].value = data[0][key];
                }
                $('#' + key).trigger('change');
            }
        } else {
            $('#' + key).val(data[0][key]);
        }
    }
}

parseDataToInput(data);
document.getElementById('date').innerHTML = data[0]['date'];
document.getElementById('startime').innerHTML = data[0]['startime'];
document.getElementById('endtime').innerHTML = data[0]['endtime'];
document.getElementById('location').innerHTML = data[0]['location'];
document.getElementById('subjects').innerHTML = data[0]['subjects'];
document.getElementById('trainer').innerHTML = data[0]['trainer'];

var filterarray = dataParticipateTraining.filter(asd => asd.TrainingID == data[0]['trainingid']);

var tblopenclass = $('#tblOpenClass').DataTable({
    "data": filterarray,
    "columns": [{
            "defaultContent": "",
            render: function (data, type, row, meta) {
                return '<input type="checkbox" class="">';
            }
        }, {
            "defaultContent": "",
            "title": "Cabang",
            render: function (data, type, row, meta) {
                return '<div class="text-wrap">' + row.Cabang + '</div>';
            }
        },
        {
            "defaultContent": "",
            "title": "Agent Code",
            render: function (data, type, row, meta) {
                return '<div class="text-wrap">' + row.ID + '</div>';
            }
        },
        {
            "defaultContent": "",
            "title": "Agent Nama",
            render: function (data, type, row, meta) {
                return '<div class="text-wrap">' + row.Name + '</div>';
            }
        },
        {
            "defaultContent": "",
            "title": "Action",
            render: function (data, type, row, meta) {
                return '<div align="center"><button class="btn btn-success btn-sm" id="participationClass" name="participationClass">Hadir</button></div>';
            }
        }
    ],
    "autoWidth": true,
    "responsive": true,
    "searching": false,
});

function AddAgent(){
    $('#class-modal-dialog').attr('class', 'modal-dialog modal-lg');
    $('#modaltitle').text('Add Agent');
    $('#modalbody').empty();
    $('#modalfooter').empty();

    const res = getModalView(modalAddAgent);
    
    $('#modalbody').html(res);

    $('#modal-general').modal({
        keyboard: false,
        backdrop: 'static',
        show: true
    });
}