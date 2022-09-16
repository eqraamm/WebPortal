let _token   = $('meta[name="csrf-token"]').attr('content');

var tblStoredPolicy;

 async function SearchStoredPolicy(){
   var data = new Array();
   data = {
      PolicyNo : $('#PolicyNo').val(),
      Insured: $('#Insured').val(),
      EffectiveDate: $('#EffectiveDate').val(),
      EffectiveTime: $('#EffectiveTime').val(),
      Product: $('#Product').val(),
      Info: $('#Info').val(),
      RefNo: $('#RefNo').val(),
      _token: _token
    };
    var response = await PostData(URLStoredPolicy,data, false, debugF);
    if (response.code == '200'){
      if (tblStoredPolicy === undefined){
        tblStoredPolicy = $("#tbl-stored-policy").DataTable({
          "data": response.Data,
          "columns": [
            {
              "title": "ANO",
              "defaultContent": 0,
              "data": "ANO"
            },
            {
              "title":"Insured Name",
              "defaultContent": "",
              "data":"AName",
            },
            {
              "title":"Policy Number",
              "defaultContent": "",
              "data":"A_PolicyNo"
            },
            {
              "title":"Policy Status",
              "defaultContent": "",
              "data":"AStatus"
            },
            {
              "title":"Description",
              "defaultContent": "",
              "data":"Description"
            },
            {
              "title":"Start Date",
              "defaultContent": "",
              "data":"SDate"
            },
            {
              "title":"End Date",
              "defaultContent": "",
              "data":"EDate"
            },
            {
              "title":"Effective Date",
              "defaultContent": "",
              "data":"PDate"
            },
            {
              "title":"TOC",
              "defaultContent": "",
              "data":"RefTOCDesc"
            },
            // {
            //   "title":"Info",
            //   "defaultContent": "",
            //   "data":"Info"
            // }
            {
              "defaultContent":"",
              render: function(data,type,row){
                var fn_doclog = "viewListDocumentPrintLog('"+ row['ANO'] +"')"
                return '<img src="' + URLEditIcon + '" width="30" height="30" type="button" value="detail" onclick="">' + 
                '<img style="color:blue;" src="' + URLPDFICON + '" width="30" height="30" type="button" value="detail" onclick="'+ fn_doclog +'">'
              }
            },
          ],
          "responsive": true,
          "autoWidth": false,
          "searching": false,
        });
      }else{
        drawDataTable(tblStoredPolicy,response.Data);
      }
    }
    toastMessage(response.code,response.message);
 }

 $('#btn-searchstoredpolicy').on('click',SearchStoredPolicy);

 async function viewListDocumentPrintLog(ANO){
  //  console.log(ANO);
    $('#class-modal-dialog').attr('class','modal-dialog modal-xl');
      
    $('#modaltitle').text('List Document');

    $('#modalbody').empty();

    $('#modalfooter').empty();

    // var url = "{{ route('storeddata.showdocument') }}";
    var response = await getModalView(URLStoredDocument + '?ANO=' + ANO + '&Description=');
    $('#modalbody').html(response);
    $('#modal-general').modal({
      keyboard: false,
      backdrop: 'static',
      show: true
    })
 }