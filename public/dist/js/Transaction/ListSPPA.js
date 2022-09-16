$(document).ready(function(){
   $('.select2bs4').select2({
     theme: 'bootstrap4',
    });
});

var tblListSPPA = $("#tbl-sppa").DataTable({
   processing: true,
   serverSide: true,
   ajax: {
      'url' : urlSearchPolicy,
      'data' : function(data){
         data.RefNo = $('#RefNo').val();
         data.PStatus = $('#PStatus').val();
         data.InsuredName = $('#InsuredName').val();
      }
   },
   "language": {
      processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},
   //  "data": [],
    "columns": [
      { "defaultContent": "" },
      { "data": "PID"},
      { "data": "RefNo" },
      { "defaultContent": "",
        render: function(data, type, row) {
            // console.log(row);
            if (row['PStatus'] == 'P'){
               // return row['PolicyJob']['PolicyNo'];
               return row['Job_PolicyNo'];
            }else{
               return row['PolicyNo'];
            }
         } 
      },
      { "defaultContent": "",
         render: function(data, type, row) {
            if (row['AType'] == 'N'){
               return 'New';
            }else if (row['AType'] == 'E'){
               return 'Endorse';
            }else if (row['AType'] == 'C'){
               return 'Cancel';
            }else{
               return row['AType'];
            }
         } 
      },
      { 
         "defaultContent": "",
         render: function(data, type, row) {
            if (row['PStatus'] == 'R'){
               return 'Request';
            }else if (row['PStatus'] == 'P'){
               return 'Process';
            }else if (row['PStatus'] == 'C'){
               return 'Closed';
            }else if (row['PStatus'] == 'E'){
               return 'Esign';
            }else if (row['PStatus'] == 'S'){
               return 'Submit Confirmation';
            }else if (row['PStatus'] == 'T'){
               return 'Temporary Process';
            }else{
               return row['PStatus'];
            }
        }
      },
      { "data": "InsuredName" },
      { "data": "ProductDesc" },
      { "data": "CoverageDesc" },
      { "defaultContent": "",
        render: function(data, type, row) {
          return row['InceptionDate'] + ' - ' + row['ExpiryDate'];
        } 
      },
      { "defaultContent": "",
        render: function(data, type, row) {
          if (row['ProductID'] == '0114M'){
            return row['Currency'] + ' ' + 
            // number_format(row['SI_1'] + row['SI_2'] + row['SI_3'] + row['SI_4'] + row['SI_5'],2,',','.');
            number_format(row['SI_1'] + row['SI_2'],2,',','.');
          }else{
            return row['Currency'] + ' ' + 
            // number_format(row['SI_1'] + row['SI_2'] + row['SI_3'] + row['SI_4'] + row['SI_5'],2,',','.');
            number_format(row['SI_1'],2,',','.');
          }
        }
      },
      { "defaultContent": "",
        render: function(data, type, row) {
          return row['Currency'] + ' ' + 
          number_format(row['Premium'],2,',','.');
        }
      },
      { 
        "defaultContent": "",
        render: function(data, type, row, meta) {
          return '<img src="'+ edit +'" class="btn-view" width="30" height="30" type="button" value="View Detail SPPA" onclick="viewPolicy(' + row['PID'] + ')""><img src="'+ trash +'" class="btn-drop" width="30" height="30" type="button" onclick="dropPolicy(' + row['PID'] + ')"></a>';
        } 
      }
   ],
   "columnDefs": [
   {
      "targets": [ 1 ],
      "visible": false,
      "searchable": false
   }
   ],
   "fnDrawCallback": function( oSettings ) {
      $('#btn-search').removeAttr('disabled');
   },
   "order": [[ 1, 'desc' ]],
   "responsive": true,
   "autoWidth": false,
   "searching": false,
   "ordering": false,
 });
 tblListSPPA.on( 'order.dt search.dt', function () {
   tblListSPPA.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
      cell.innerHTML = i+1;
   });
 }).draw();

function viewPolicy(pid){
   console.log(pid);
}

function dropPolicy(pid){
   console.log(pid);
}

$('#btn-search').on('click', function(event){
   event.preventDefault();
   $(this).attr('disabled','disabled');

   tblListSPPA.draw();
});