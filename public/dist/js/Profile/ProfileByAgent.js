
var tblProfile = $("#tbl-profile").DataTable({
   "data": dataProfile,
   "columns": [
     {
      // "title" : "No",
      "defaultContent": ""
     },
     {
      // "title" : "Client ID",
      "data":"ID"
     },
     {
      // "title" : "Reference Profile ID",
      "data":"RefID"
     },
     {
      // "title" : "Name",
      "data":"Name"
     },
     {
      // "title" : "Email",
      "data":"Email"
     },
     {
      // "title" : "Mobile",
      "data":"Mobile"
     },
     {
      // "title" : "ID Number",
      "data":"ID_No"
     },
     {
      // "title" : "Birth Date",
      "data":"BirthDate"
     },
     {
       "defaultContent": "",
       render: function(data, type, row, meta) {
         var fn = "viewDetail('"+ row['ID'] +"')"
         var fn_history = "viewHistory('"+ row['ID'] +"')"
         var fn_delete = "showModalDel('"+ row['ID'] +"')"
         return '<img src="'+ edit +'" width="25" height="25" type="button" title="Detail Profile" onclick="' + fn + '">' + 
         '<img src="'+ file +'" width="25" height="25" onclick="'+ fn_history +'" type="button" id="btn-history" class="history-profile">' + 
         '<img src="'+ trash +'" width="25" height="25" onclick="'+ fn_delete +'" type="button" class="btn-del-row-profile">';
       } 
     }
   ],
   "order": [[ 1, 'asc' ]],
   "responsive": true,
   "autoWidth": false,
   "searching": false,
});
tblProfile.on('order.dt search.dt', function () {
   tblProfile.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
      cell.innerHTML = i+1;
   });
}).draw();

$("#btn-search-profile").click(async function(event){
   event.preventDefault();
   try{
      var ID = '';
      var name = $('#SearchName').val();
      var email = $('#SearchEmail').val();
      var id_no = $('#SearchID_No').val();
      var mobile = $('#SearchMobileNo').val();
      var OwnerID = $('#MO').val();
      if (OwnerID == '' || OwnerID == undefined) {
         OwnerID = userID;
      }
      var url = urlSearchProfile + "?ID=" + ID + "&name=" + name + "&email=" + email + "&id_no=" + id_no + "&mobile=" + mobile + '&OwnerID=' + OwnerID;  

      try {
         var response = await getDataNew(url, false, debugF);  
      } catch (error) {
      }
      // console.log(response);
      if (response.code == '200'){
         drawDataTable(tblProfile,response.Data);
      }
      toastMessage(response.code,response.message);
   }catch(err){
      toastMessage('400','Whoops, Something Went Wrong, please contact your Administrator.');
   }
});

async function viewDetail(ID){
   try{
      $('#loadMe').modal('show');
      window.location.href = urlCreateProfile + '?ID=' + ID;
   } catch (error) {
      toastMessage('400', debugF ? error : 'Something wrong, please contact your Administrator.'); 
   }finally{
   }
}

async function viewHistory(ID){  
   var response = await getModalView(urlModalHistory + '?ID=' + ID);
   openModalView('modal-xl','History Profile',response);
}

function showModalDel(ID){
   // url = "{{ route('profile.drop', ['id' => ':id']) }}"
   // url = url.replace(':id',ID);
   var url = "";

   var footer = '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>';
   footer += '<a href="' + url + '" class="btn btn-danger btn-ok" id="btnDel">Delete</a>';

   openModalView('','Delete Client','<p>Do you want to proceed?</p>',footer, true);
}
