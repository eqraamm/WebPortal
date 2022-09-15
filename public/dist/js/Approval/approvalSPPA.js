var dataSPPA = [{
        "SppaNo": "00001",
        "Product": "ASRI",
        "Nama": "Ekram",
        "Periode": "01/01/2022 - 01/01/2023",
        "TSI": "150.000.000",
        "Premi": "2.500.000",
        "PStatus": "Approved",
    },
    {
        "SppaNo": "00002",
        "Product": "Otomate",
        "Nama": "Fitri",
        "Periode": "01/01/2022 - 01/01/2023",
        "TSI": "250.000.000",
        "Premi": "3.500.000",
        "PStatus": "Need Approval",
    },
    {
        "SppaNo": "00001",
        "Product": "Cargo",
        "Nama": "Alesha",
        "Periode": "01/01/2022 - 01/01/2023",
        "TSI": "500.000.000",
        "Premi": "5.500.000",
        "PStatus": "Need Approval",
    },
];

var tblApproval = $("#tblApproval").DataTable({
    "data": dataSPPA,
    "columns": [{
            "title": "No SPPA",
            "data": "SppaNo"
        },
        {
            "title": "Product",
            "data": "Product"
        },
        {
            "title": "Nama Pemegang Polis",
            "data": "Nama"
        },
        {
            "title": "TSI",
            "data": "TSI"
        },
        {
            "title": "Premi",
            "data": "Premi"
        },
        {
            "title": "Status SPPA",
            "data": "PStatus"
        },
        {
            "defaultContent": "",
            "title": "Action",
            render: function (data, type, row, meta) {
                if (row.PStatus == "Need Approval")
                    return '<button type="button" class="btn btn-outline-primary">History</button><a style="padding-left:20px;"></a><button type="button" class="btn btn-outline-primary">Approval</button>';
                else {
                    return '<button type="button" class="btn btn-outline-primary">History</button><a style="padding-left:20px;"></a><button type="button" class="btn btn-outline-primary" disabled>Approval</button>';
                }
            }
        }
    ],
    "select": {
        "style": "multi"
    },
    "order": [
        [0, 'asc']
    ],
    "dom": 'Bfrtip',
    "buttons": [
        {
         extend : 'excel',
         text : 'Download To Excel',
         className: 'btn btn-success'
        }
    ],
    "autoWidth": false,
    "responsive": true,
    "lengthChange": false,
    "searching": false,
});