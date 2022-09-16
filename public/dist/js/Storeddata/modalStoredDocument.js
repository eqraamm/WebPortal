$('document').ready(async function(){
   console.log(response);
   var tblStoredDocument = $("#tbl-stored-document").DataTable({
      "data": response.Data,
      "columns": [
        {
          "title": "ANO",
          "defaultContent": 0,
          "data": "ANO"
        },
        {
          "title":"Doc No",
          "defaultContent": "",
          "data":"DocNo",
        },
        {
          "title":"Description",
          "defaultContent": "",
          "data":"Description"
        },
        {
          "title":"User ID",
          "defaultContent": "",
          "data":"UserID"
        },
        {
          "title":"Date",
          "defaultContent": "",
          "data":"Last_Date"
        },
        {
          "title":"Time",
          "defaultContent": "",
          "data":"Time"
        },
        {
          "title":"Log ID",
          "defaultContent": "",
          "data":"LogID"
        },
        {
          "title":"Version",
          "defaultContent": "",
          "data":"Version"
        },
        {
          "title":"Image ID",
          "defaultContent": 0,
          "data":"ImageID"
        },
        {
          "title":"File Type",
          "defaultContent": "",
          "data":"FileType"
        },
        {
          "defaultContent":"",
          render: function(data,type,row){
            var fn_doclog = "DownloadPrintLogDocument('"+ row['ANO'] +"','"+ row['Description'] +"')"
            return '<img src="' + URLDownloadIcon + '" width="30" height="30" type="button" value="detail" onclick="'+ fn_doclog +'">'
          }
        },
      ],
      "responsive": true,
      "autoWidth": false,
      "searching": false,
    });
});

async function DownloadPrintLogDocument(ANO, Description){
   var URL = BaseURL + '?ANO=' + ANO + '&Description=' + Description;
   var response = await getDataNew(URL,true, debugF);
   if (response.code == '200'){
      downloadPDF(response.Data[0]['Base64_Image'],Description);
   }
   toastMessage(response.code,response.message);
}

function downloadPDF(pdf,FileName) {
   const linkSource = `data:application/pdf;base64,${pdf}`;
   const downloadLink = document.createElement("a");
   const fileName = FileName;
   downloadLink.href = linkSource;
   downloadLink.download = fileName;
   downloadLink.click();
}