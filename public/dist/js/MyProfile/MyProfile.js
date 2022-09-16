$(function () {
   $(document).on('click', '[data-toggle="lightbox"]', function(event) {
     event.preventDefault();
     $(this).ekkoLightbox({
     });
   });
   parseDataToInput(userData);
   if (role == 'AGENT'){
      disableAll();
   }
});

$('#div-group-birthdate').datetimepicker({
   format: 'L'
});

$("#Province").select2({
   placeholder: "Province",
   theme: 'bootstrap4',
   allowClear: true
});

$("#ProvinceAlt").select2({
   placeholder: "Province",
   theme: 'bootstrap4',
   allowClear: true
});

var dataProduct = [
   {
      "Product" : "ASRI",
      "EffectiveDate" : "20 Jan 2020",
      "ExpiryDate" : "-" 
   },
   {
      "Product" : "ASRI",
      "EffectiveDate" : "2 Sept 2019",
      "ExpiryDate" : "20 Jan 2020" 
   }
];

var tblProduct = $("#tblProduct").DataTable({
   "data": dataProduct,
   "columns": [
      {
         "title": "Product",
         "data": "Product"
      },
      {
         "title": "Effective Date",
         "data": "EffectiveDate"
      },
      {
         "title": "Expiry Date",
         "data": "ExpiryDate"
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

var dataContract = [
   {
      "ContractType" : "Contract",
      "ContractNo" : "123421521421425",
      "StartDate" : "2 Sept 2019",
      "EndDate" : "2 Sept 2023",
      "CancelDate" : "-"
   },
   {
      "ContractType" : "Addendum",
      "ContractNo" : "L53253141342",
      "StartDate" : "2 Sept 2023",
      "EndDate" : "2 Sept 2024",
      "CancelDate" : "20 Jan 2020"
   }
];

var tblContract = $("#tblContract").DataTable({
   "data": dataContract,
   "columns": [
      {
         "title": "Contract Type",
         "data": "ContractType"
      },
      {
         "title": "Contract No",
         "data": "ContractNo"
      },
      {
         "title": "Start Date",
         "data": "StartDate"
      },
      {
         "title": "End Date",
         "data": "EndDate"
      },
      {
         "title": "Cancel Date",
         "data": "CancelDate"
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

var dataLicense = [
   {
      "License" : "AAUI",
      "LicenseNo" : "L123/2019/09/0001",
      "StartDate" : "2 Sept 2019" ,
      "EndDate" : "2 Sept 2023"
   }
];

var tblLicense = $("#tblLicense").DataTable({
   "data": dataLicense,
   "columns": [
      {
         "title": "License Type",
         "data": "License"
      },
      {
         "title": "License No.",
         "data": "LicenseNo"
      },
      {
         "title": "Start Date",
         "data": "StartDate"
      },
      {
         "title": "End Date",
         "data": "EndDate"
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

var dataBank = [
   {
      "Bank" : "BCA",
      "AccountName" : "Budi",
      "AccountNo" : "47382738473827" ,
   }
];

var tblBank = $("#tblBank").DataTable({
   "data": dataBank,
   "columns": [
      {
         "title": "Bank",
         "data": "Bank"
      },
      {
         "title": "Account Name",
         "data": "AccountName"
      },
      {
         "title": "Account No",
         "data": "AccountNo"
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

// Document

var dataTraining = [
   {
      "Subject" : "Training Agen",
      "StartDate" : "2 Sept 2019",
      "Status" : "Lulus" ,
   }
];

var tblTraining = $("#tblTraining").DataTable({
   "data": dataTraining,
   "columns": [
      {
         "title": "Subject",
         "data": "Subject"
      },
      {
         "title": "Start Date",
         "data": "StartDate"
      },
      {
         "title": "Status",
         "data": "Status"
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

var dataLevel = [
   {
      "Level" : "Calon Partner",
      "EffectiveDate" : "2 Sept 2019"
   },
   {
      "Level" : "Partner",
      "EffectiveDate" : "14 Nov 2019"
   },
];

var tblLevel = $("#tblLevel").DataTable({
   "data": dataLevel,
   "columns": [
      {
         "title": "Level",
         "data": "Level"
      },
      {
         "title": "Effective Date",
         "data": "EffectiveDate"
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

var dataKontes = [
   {
      "ID" : "K190001",
      "KontesName" : "MEC",
      "KontesDate" : "2020",
      "Reward": "Rp. 100.000.000"
   }
];

var tblKontes = $("#tblKontes").DataTable({
   "data": dataKontes,
   "columns": [
      {
         "title": "Kontes ID",
         "data": "ID"
      },
      {
         "title": "Nama Kontes",
         "data": "KontesName"
      },
      {
         "title": "Periode Kontes",
         "data": "KontesDate"
      },
      {
         "title": "Reward",
         "data": "Reward"
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

function parseDataToInput(data){
   for (var key in data[0]){
      if($('#' + key).attr('type') == 'checkbox'){
         var cbx = document.getElementById(key);
         cbx.checked = data[0][key];
      }else{
         $('#' + key).val(data[0][key]);
      }
   }
}

function disableAll(){
   $('.form-profile').find('input,select,button,textarea').each(function(){
     if ($(this).attr('name') != '_token')
     {
       $(this).attr('disabled','disabled');
     }
   });
}

$('#btn-karir').on('click',async function(){
   $('#class-modal-dialog').attr('class','modal-dialog modal-xl');

   $('#modaltitle').text('Agent Level Tree');

   $('#modalbody').empty();

   $('#modalfooter').empty();

   var response = await getModalView(url);
   $('#modalbody').html(response);

   $("#modal-general").modal('show');
});