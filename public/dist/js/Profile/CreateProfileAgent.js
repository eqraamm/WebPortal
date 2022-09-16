$(document).ready(function(){
   $('.select2bs4').select2({
     theme: 'bootstrap4',
    });
    $('#div-group-birthdate').datetimepicker({
      format: 'L'
    });
    var listboxProvince = document.getElementById("Province");
    addOptionItem(listboxProvince,dataProvince,'PROVINCE','DESCRIPTION',true);
    //check data district for fill dropdown district
    if (dataDistrict.length > 0){
      var listBoxDistrict = document.getElementById('District');
      addOptionItem(listBoxDistrict,dataDistrict,'District','Description',true, false, true, 'Description_1');
    }

    //check data Sub District for fill dropdown Sub District
    if (dataSubDistrict.length > 0){
      var listBoxSubDistrict = document.getElementById('SubDistrict');
      addOptionItem(listBoxSubDistrict,dataSubDistrict,'SubDistrict','Description',true);
    }
    console.log(dataVillage);

    //check data Village for fill dropdown Village
    if (dataVillage.length > 0){
      var listBoxVillage = document.getElementById('Village');
      addOptionItem(listBoxVillage,dataVillage,'Village','Description',true);
    }

    // $('.CORPORATE').css('display','none');
    if (dataProfile.length > 0){
      console.log(dataProfile);
      var WNIF = dataProfile[0]['WNIF'];
      checkWNIF(WNIF);
      parseDataToInput(dataProfile);
    }else{
      checkWNIF(true);
    }
    $('#Corporatef').trigger('change'); 
});

$('#WNIF').on('change',function(){
  var WNIF = this.checked;
  checkWNIF(WNIF);
});

$('#Corporatef').on('change',function(){
  $('.INDIVIDUAL').removeAttr('style');
  $('.CORPORATE').removeAttr('style');
  $('.INDIVIDUAL').css('display',this.checked ? 'none' : 'normal');
  $('.CORPORATE').css('display',this.checked ? 'nomal' : 'none');
  $('.label-name').html(this.checked ? 'Company Name' : 'Full Name');
  $('.label-tax').css('font-weight', this.checked ? 'bold' : 'normal');
  this.checked ? $('.required-corporate').attr('required','required') : $('.required-corporate').removeAttr('required');
  this.checked ? $('.required-individual').removeAttr('required') : $('.required-individual').attr('required','required');
  var wnif = document.getElementById('WNIF');
  if (this.checked){
    wnif.checked = false;
    var selectIDType = document.getElementById('ID_Type')
    selectIDType.options.length = 0;
  }else{
    checkWNIF(wnif.checked);  
  }
});

function checkWNIF(WNIF){
  var listIDType = [];
  if (WNIF){
    listIDType = [
      {
        "IDTYPE" : "KTP",
        "Description": "KTP"
      }
    ];
  }else{
    listIDType = [
      {
        "IDTYPE" : "Passport",
        "Description": "Passport"
      },
      {
        "IDTYPE" : "Driving License",
        "Description": "Driving License"
      },
      {
        "IDTYPE" : "KIMS",
        "Description": "KIMS"
      },
      {
        "IDTYPE" : "KITAS(P)",
        "Description": "KITAS(P)"
      },
      {
        "IDTYPE" : "SIM",
        "Description": "SIM"
      },
      {
        "IDTYPE" : "OTHERS",
        "Description": "OTHERS"
      }
    ];
  }
  var selectIDType = document.getElementById('ID_Type')
  selectIDType.options.length = 0;
  addOptionItem(selectIDType, listIDType, 'IDTYPE','Description',false);
}

function Construct_ProfileName() {
  document.getElementById("Name").value = document.getElementById("FirstName").value + ((document.getElementById("MidName").value == "") ? "" : " " + document.getElementById("MidName").value) + ((document.getElementById("LastName").value == "") ? "" : " " + document.getElementById("LastName").value);
}

$('.form-profile').on('submit',async function(){
  event.preventDefault();
  try {
    var formData = $(this).serialize();
    try {
      await PostData(urlSaveProfile,formData, false, debugF).done(function(response){
        if (response['code'] == '200'){
          var id = response['Data'][0]['ID'];
          $('#ID').val(id);
        }
        toastMessage(response['code'],response['message']);
      }); 
    } catch (error) {
      
    }
  } catch (error) {
    console.log(error);
   toastMessage('400',debugF ? error : 'Something wrong, please contact your Administrator.'); 
  }
});

async function getDistrict(province, value = '') {
  try {
    var url =  urlGetDistrict + "?province=" + province
    const res = await getData(url)
    console.log(res);
    var listbox = document.getElementById("District");
    $('#District').empty();
    addOptionItem(listbox,res.Data,'District','Description',true, false, true, 'Description_1');
    if (value != ''){
      $('#District').val(value);
      $('#District').trigger('change');
    }
  } catch(err) {
    console.log(err);
  }
}

$("#Province").on("select2:select", function () {
  getDistrict(this.value);
});

async function getSubDistrict(district,province, value = '') {
  try {
    var url = urlGetSubDistrict + "?district=" + district + "&province=" + province
    const res = await getData(url)
    var listbox = document.getElementById("SubDistrict");
    $('#SubDistrict').empty();
    addOptionItem(listbox,res.Data,'SubDistrict','Description',true);
    if (value != ''){
      $('#SubDistrict').val(value);
      $('#SubDistrict').trigger('change')
    }
  } catch(err) {
    console.log(err);
  }
}

$("#District").on("select2:select", function () {
  getSubDistrict(this.value,$('#Province').val());
});

async function getVillage(subdistrict,district,province, value = '') {
  try {
    var url = urlGetVillage + "?subdistrict=" + subdistrict + "&district=" + district + "&province=" + province
    const res = await getData(url)
    var listbox = document.getElementById("Village");
    $('#Village').empty();
    addOptionItem(listbox,res.Data,'Village','Description',true);
    if (value != ''){
      $('#Village').val(value);
      $('#Village').trigger('change');
    }
  } catch(err) {
    console.log(err);
  }
}

$("#SubDistrict").on("select2:select", function () {
  getVillage(this.value,$('#District').val(),$('#Province').val());
});

function parseDataToInput(filterarray){
  // $('#WNIF').attr('checked','checked');
  for (var key in filterarray[0]){
    if($('#' + key).attr('type') == 'checkbox'){
      var cbx = document.getElementById(key);
      cbx.checked = filterarray[0][key];
    }else{
      $('#' + key).val(filterarray[0][key]);
      // console.log ('Key : ' + key + ' Value : ' + filterarray[0][key]);
    }
  }
  $('.select2bs4').trigger('change');
}