var data = [];
var tblStoredDocument = $("#tbl-list-sysuser").DataTable({
   "data": data,
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
     }
   //   ,
   //   {
   //     "title":"Description",
   //     "defaultContent": "",
   //     "data":"Description"
   //   },
   //   {
   //     "title":"User ID",
   //     "defaultContent": "",
   //     "data":"UserID"
   //   },
   //   {
   //     "title":"Date",
   //     "defaultContent": "",
   //     "data":"Last_Date"
   //   },
   //   {
   //     "title":"Time",
   //     "defaultContent": "",
   //     "data":"Time"
   //   },
   //   {
   //     "title":"Log ID",
   //     "defaultContent": "",
   //     "data":"LogID"
   //   },
   //   {
   //     "title":"Version",
   //     "defaultContent": "",
   //     "data":"Version"
   //   },
   //   {
   //     "title":"Image ID",
   //     "defaultContent": 0,
   //     "data":"ImageID"
   //   },
   //   {
   //     "title":"File Type",
   //     "defaultContent": "",
   //     "data":"FileType"
   //   },
   //   {
   //     "defaultContent":"",
   //     render: function(data,type,row){
   //       var fn_doclog = "DownloadPrintLogDocument('"+ row['ANO'] +"','"+ row['Description'] +"')"
   //       return '<img src="' + URLDownloadIcon + '" width="30" height="30" type="button" value="detail" onclick="'+ fn_doclog +'">'
   //     }
   //   },
   ],
   "responsive": true,
   "autoWidth": false,
   "searching": false,
});
console.log(Role);
if (Role != 'ADMIN'){
  disableAll();
}

function disableAll(){
  $('.form-save').find('input,select').each(function(){
    if ($(this).attr('name') != '_token'){
      $(this).attr('disabled','disabled');
    }
  });
}
function enableAll(){
  $('.form-save').find('input,select').each(function(){
      $(this).removeAttr('disabled','disabled');
  });
}

$(".form-sync").submit(function(event) {
  event.preventDefault();

  $('#div-overlay').empty();
  $('#div-overlay').append('<div class="overlay"><i class="fas fa-2x fa-sync fa-spin"></i></div>');

  let ProfileID = $("input[name=ProfileID]").val();
  let Name = $("input[name=Name]").val();
  let email = $("input[name=email]").val();
  let Address = $("input[name=Address1]").val();
  let City = $("input[name=CityModal]").val();
  let ZipCode = $("input[name=ZipCode]").val();
  let ID_NO = $("input[name=ID_Number]").val();
  let Mobile = $("input[name=MobilePhone]").val();
  let Tax = $("input[name=TaxModal]").val();
  let BirthDate = $("input[name=ModalBirthDate]").val();
  let _token = $('meta[name="csrf-token"]').attr('content');
  var a_href = $(this).attr('action');
  console.log(_token);

  $.ajax({
    type: "POST",
    url: a_href, // This is what I have updated
    data: {
      ID: ProfileID,
      Name: Name,
      Email: email,
      Address: Address,
      City: City,
      ZipCode: ZipCode,
      ID_NO: ID_NO,
      Mobile: Mobile,
      BirthDate: BirthDate,
      TaxID: Tax,
      _token: _token
    },
  }).done(function(msg) {
    // $("#loadMe").modal("hide");
    $('#cardbodyModalSync').html(msg);
    $('#div-overlay').empty();
  }).fail(function(msg) {
    // $("#loadMe").modal("hide");
    $('#div-overlay').empty();
  });
});

function parseDataToInput(filterarray){
  // $('#WNIF').attr('checked','checked');
  for (var key in filterarray[0]){
    if($('#' + key).attr('type') == 'checkbox'){
      var cbx = document.getElementById(key);
      cbx.checked = filterarray[0][key];
      // if (filterarray[0][key] === true){
      //   $('#' + key).attr('checked','checked');
      // }else{
      //   $('#' + key).removeAttr('checked');
      // }
    }else{
      $('#' + key).val(filterarray[0][key]);
      // console.log ('Key : ' + key + ' Value : ' + filterarray[0][key]);
    }
  }
}

$("#clearbtn").click(function(event) {
  event.preventDefault();

  var form = event.currentTarget.form;
  var inputs = form.querySelectorAll('input');
  var selects = form.querySelectorAll('select');
  var checkboxs = form.querySelectorAll('input[type="checkbox"]');
  // console.log(checkbox);
  inputs.forEach(function(input, index) {
    if (input.type != 'checkbox') {
      if (input.name != 'UserOwner' && input.name != '_token') {
        input.value = null;
      }
    } else {
      input.removeAttribute('checked');
    }
  });

  selects.forEach(function(selects, index) {
    selects.value = null;
  });
  checkboxs.forEach(function(checkbox, index) {
    checkbox.checked = false;
  });
  $('.select2bs4').trigger('change');
  corporateF_chekcked();
  $('#FirstName').focus();
  formData = '';
  enableAll();
  $('#btn-sync').attr('disabled','disabled');
});

function corporateF_chekcked() {
  var cbxCorporate = document.getElementById("Corporatef");
  console.log(cbxCorporate.checked);
  if (cbxCorporate.checked == true) {
    // tidak wajib
    $('#LblIDType').css('font-weight','normal');
    $('#ID_Type').removeAttr('required');
    $('#LblID_Number').css('font-weight','normal');
    $('#ID_No').removeAttr('required');
    $('#LblID_Name').css('font-weight','normal');
    $('#ID_Name').removeAttr('required');
    $('#LblBirthPlace').css('font-weight','normal');
    $('#BirthPlace').removeAttr('required');
    $('#LblBirthDate').css('font-weight','normal');
    $('#BirthDate').removeAttr('required');
    $('#LblID_Name').css('font-weight','normal');
    $('#ID_Name').removeAttr('required');
    $('#LblGender').css('font-weight','normal');
    $('#Gender').removeAttr('required');

    // wajib
    $('#LblTaxID').css('font-weight','bold');
    $('#TaxID').attr('required','required');
    $('#LblCType').css('font-weight','bold');
    $('#CType').attr('required','required');
    $('#LblCGroup').css('font-weight','bold');
    $('#CGroup').attr('required','required');
    $('#LblSCGroup').css('font-weight','bold');
    $('#SCGroup').attr('required','required');
    $('#LblTaxName').css('font-weight','bold');
    $('#TxtTaxName').attr('required','required');
    $('#LblTaxAddress').css('font-weight','bold');
    $('#TxtTaxAddress').attr('required','required');
    $('#LblPicName').css('font-weight','bold');
    $('#Contact').attr('required','required');
  } else {
    // wajib
    $('#LblIDType').css('font-weight','bold');
    $('#ID_Type').attr('required','required');
    $('#LblID_Number').css('font-weight','bold');
    $('#ID_No').attr('required','required');
    $('#LblID_Name').css('font-weight','bold');
    $('#ID_Name').attr('required','required');
    $('#LblBirthPlace').css('font-weight','bold');
    $('#BirthPlace').attr('required','required');
    $('#LblBirthDate').css('font-weight','bold');
    $('#BirthDate').attr('required','required');
    $('#LblID_Name').css('font-weight','bold');
    $('#ID_Name').attr('required','required');
    $('#LblGender').css('font-weight','bold');
    $('#Gender').attr('required','required');

    // tidak wajib
    $('#LblTaxID').css('font-weight','normal');
    $('#TaxID').removeAttr('required');
    $('#LblCType').css('font-weight','normal');
    $('#CType').removeAttr('required');
    $('#LblCGroup').css('font-weight','normal');
    $('#CGroup').removeAttr('required');
    $('#LblSCGroup').css('font-weight','normal');
    $('#SCGroup').removeAttr('required');
    $('#LblTaxName').css('font-weight','normal');
    $('#TxtTaxName').removeAttr('required');
    $('#LblTaxAddress').css('font-weight','normal');
    $('#TxtTaxAddress').removeAttr('required');
    $('#LblPicName').css('font-weight','normal');
    $('#Contact').removeAttr('required');
  }
}

function CGroup_OnChange(CGroup) {
  var basedata = arrSCGroup.Data;
  var filterarray;
  if (CGroup == ''){
    filterarray = basedata;
  }else{
    filterarray = basedata.filter(asd => asd.CGROUP == CGroup);
  }
  // console.log(filterarray);

  // console.log(filterarray);

  document.getElementById("SCGroup").options.length = 0;
  var listBox = document.getElementById("SCGroup");
  var option = document.createElement("OPTION");
  option.value = '';
  option.innerHTML = '';
  listBox.appendChild(option);
  for (i = 0; i < filterarray.length; i++) {
    var listBox = document.getElementById("SCGroup");
    var option = document.createElement("OPTION");
    option.value = filterarray[i].SCGROUP;
    option.innerHTML = filterarray[i].DESCRIPTION;
    listBox.appendChild(option);
  }
}

$(".form-save").submit(function(event) {
  event.preventDefault();
  $("#loadMe").modal('show');
  try{
    var a_href = $(this).attr('action');

    if (formData == ''){
      formData = $(".form-save").serialize();
    }

    $.ajax({
      type: "POST",
      url: a_href, // This is what I have updated
      data: formData,
    }).done(function(response) {
      console.log(response);
      if (response.code == '200') {
        tblProfile.clear().rows.add(response.listprofile.Data).draw();
        viewDetail(response.Data[0]['ID'])
      }
      // $("#loadMe").modal("hide");
      toastMessage(response.code, response.message);
      if (response.code == '402') {
        $('#modal-sync').modal('show');
        setTimeout(() => {
          $('#cardbodyModalSync').html(response.html);
        }, 1000);
      }
      $("#loadMe").modal("hide");
    }).fail(function(xhr, status, error){
      console.log(xhr);
      throw error;
    });
  }catch(err){
    toastMessage('400',err);
    $("#loadMe").modal("hide");
    console.log('catch');
  }finally{
    // $("#loadMe").modal("hide");
    // console.log('finally');
  }
});