var dataTrainingClass = [{
    "Date": "15 July 2022",
    "StartTime": "09:00",
    "EndTime": "16:00",
    "Status": "Cancel Class",
    "Location": "ACA Cabang Bekasi Jalan Ir H Juanda no 151, Bekasi Timur",
    "Subjects": "Agent - Motorcar",
    "AgentLvL": "Senior Partner,Executive Partner, Managing Partner",
    "Trainer": "Rally Ahmad",
    "Participation": "Yes",
}, {
    "Date": "01 Agustus 2022",
    "StartTime": "10:00",
    "EndTime":"17:00",
    "Status": "Rescheduled",
    "Location": "ACA Cabang Latumenten Jl. Prof. Dr. Latumenten No. 28 A-B-C, Angke, Tambora, RT.2/RW.8, Angke, Kec. Tambora, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11460",
    "Subjects": "Agent - ASRI",
    "AgentLvL": "Executive Partner, Managing Partner",
    "Trainer": "Charles Sutanto",
    "Participation": "No",
},{
    "Date": "15 Agustus 2022",
    "StartTime": "15:00",
    "EndTime": "16:00",
    "Status": "On Scheduled",
    "Location": "MITRACA PUSAT HERMINA OFFICE BUILDING TOWER I Lantai.3, Jl. HBR Motik No.4, RW.10, Gn. Sahari Sel., Kec. Kemayoran, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10610",
    "Subjects": "Agent - Business Presentation Skill",
    "AgentLvL": "Partner, Senior Partner,Executive Partner, Managing Partner",
    "Trainer": "Wahyu Didik",
    "Participation": "Yes",
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
                return '<div class="text-wrap">' + row.AgentLvL + '</div>';
            }
        }, {
            "defaultContent": "",
            "title": "Action",
            render: function (data, type, row, meta) {
                return '<div>Trainer : ' + row.Trainer + '<br>Participation : ' + row.Participation + '</div><div align="center"><button class="btn btn-primary btn-sm">Participation</button></div>';
            }
        }
    ],
    "select": {
        "style": "multi"
    },
    "order": [
        [0, 'asc']
    ],
    "autoWidth": true,
    "responsive": true,
    "searching": false,
});