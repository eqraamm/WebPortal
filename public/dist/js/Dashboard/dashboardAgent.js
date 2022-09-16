var dataIndctvOffer = [
   {
      "IndicativeOffer":"00001",
      "Product" : "ASRI",
      "Nama":"Ekram",
      "TSI" : "150.000.000",
      "Premi" : "2.500.000",
      "Status" : "Approved"
   },
   {
      "IndicativeOffer":"00002",
      "Product" : "Otomate",
      "Nama":"Fitri",
      "TSI" : "250.000.000",
      "Premi" : "3.500.000",
      "Status" : "Waiting"
   },
   {
      "IndicativeOffer":"00001",
      "Product" : "Cargo",
      "Nama":"Alesha",
      "TSI" : "500.000.000",
      "Premi" : "5.500.000",
      "Status" : "Approved"
   },
];

var dataSPPA = [
   {
      "SppaNo":"00001",
      "Product" : "ASRI",
      "Nama":"Ekram",
      "Periode" : "01/01/2022 - 01/01/2023",
      "TSI" : "150.000.000",
      "Premi" : "2.500.000",
   },
   {
      "SppaNo":"00002",
      "Product" : "Otomate",
      "Nama":"Fitri",
      "Periode" : "01/01/2022 - 01/01/2023",
      "TSI" : "250.000.000",
      "Premi" : "3.500.000",
   },
   {
      "SppaNo":"00001",
      "Product" : "Cargo",
      "Nama":"Alesha",
      "Periode" : "01/01/2022 - 01/01/2023",
      "TSI" : "500.000.000",
      "Premi" : "5.500.000",
   },
];

var dataExpiry = [
   {
      "SppaNo":"00001",
      "Product" : "ASRI",
      "Nama":"Ekram",
      "Periode" : "01/01/2022 - 01/01/2023",
   },
   {
      "SppaNo":"00002",
      "Product" : "Otomate",
      "Nama":"Fitri",
      "Periode" : "01/01/2022 - 01/01/2023",
   },
   {
      "SppaNo":"00001",
      "Product" : "Cargo",
      "Nama":"Alesha",
      "Periode" : "01/01/2022 - 01/01/2023",
   },
];

var dataBirthdays = [
   {
      "Nama" : "Adit",
      "Status" : "Agent (Partner)",
      "BirthDate" : "10 Oktober 1999" 
   },
   {
      "Nama" : "Calvin",
      "Status" : "Nasabah",
      "BirthDate" : "11 Oktober 1991" 
   },
   {
      "Nama" : "Abdi",
      "Status" : "Nasabah",
      "BirthDate" : "11 Oktober 1992" 
   }
]

var tblIndctvOffer = $("#tblIndctvOffer").DataTable({
   "data": dataIndctvOffer,
   "columns": [
      {
         "title": "Indicative Offer",
         "data": "IndicativeOffer"
      },
      {
         "title": "Product",
         "data": "Product"
      },
      {
         "title": "Nama",
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
         "title": "Status Indicative Offer",
         "data": "Status"
      },
   ],
   // "columnDefs": [{
   //    "searchable": false,
   //    "orderable": false,
   //    "targets": 0
   // }],
   "select": {
      "style": "multi"
   },
   "order": [
      [0, 'asc']
   ],
   "autoWidth": false,
   "responsive": true,
   "lengthChange": false,
   "searching": false,
});

var tblSPPA = $("#tblSPPA").DataTable({
   "data": dataSPPA,
   "columns": [
      {
         "title": "SPPA NO",
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
         "title": "Periode Polis",
         "data": "Periode"
      },
      {
         "title": "TSI",
         "data": "TSI"
      },
      {
         "title": "Premi",
         "data": "Premi"
      },
   ],
   // "columnDefs": [{
   //    "searchable": false,
   //    "orderable": false,
   //    "targets": 0
   // }],
   "select": {
      "style": "multi"
   },
   "order": [
      [0, 'asc']
   ],
   "autoWidth": false,
   "responsive": true,
   "lengthChange": false,
   "searching": false,
});

var tblExpiry = $("#tblExpiry").DataTable({
   "data": dataExpiry,
   "columns": [
      {
         "title": "SPPA NO",
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
         "title": "Periode Polis",
         "data": "Periode"
      },
      { 
         "defaultContent": "",
         "title":"Action",
         render: function(data, type, row, meta) {
           return '<button type="button" class="btn btn-primary">Renewal</button>';
         } 
       }
   ],
   "select": {
      "style": "multi"
   },
   "order": [
      [0, 'asc']
   ],
   "autoWidth": false,
   "responsive": true,
   "lengthChange": false,
   "searching": false,
});

var tblBirthdays = $("#tblBirthdays").DataTable({
   "data": dataBirthdays,
   "columns": [
      {
         "title": "Nama",
         "data": "Nama"
      },
      {
         "title": "Status",
         "data": "Status"
      },
      {
         "title": "BirthDate",
         "data": "BirthDate"
      },
   ],
   "select": {
      "style": "multi"
   },
   "order": [
      [0, 'asc']
   ],
   "autoWidth": false,
   "responsive": true,
   "lengthChange": false,
   "searching": false,
});

var tblApprovalList = $("#tblApprovalList").DataTable({
   "data": dataSPPA,
   "columns": [
      {
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
   ],
   "select": {
      "style": "multi"
   },
   "order": [
      [0, 'asc']
   ],
   "autoWidth": false,
   "responsive": true,
   "lengthChange": false,
   "searching": false,
});