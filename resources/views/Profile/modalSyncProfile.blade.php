<table id="tblModalSync" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Profile ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Mobile</th>
      <th>ID Number</th>
      <th>Birth Date</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody> 
    @if ($datasync['code'] == '200') @foreach($datasync['Data'] as $datas) 
    <tr>
      <td>{{ $datas['ID'] }}</td>
      <td>{{ $datas['Name'] }}</td>
      <td>{{ $datas['Email'] }}</td>
      <td>{{ $datas['Mobile'] }}</td>
      <td>{{ $datas['ID_No'] }}</td>
      <td>{{ $datas['BirthDate'] }}</td>
      <td>
        <!-- <a href="#" type="button" class="btn btn-outline-primary btn-sm" onclick="viewDetailSync('{{$datas['ID']}}')" data-dismiss="modal">Detail</a> -->
        <a href="#" type="button" class="btn btn-outline-primary btn-sm" onclick="viewDetailSync('{{$datas['ID']}}')">Detail</a>
      </td>
    </tr> 
    @endforeach 
    @endif 
  </tbody>
</table>
<script>
  $(function () {
      console.log(@json($datasync['Data']));
    $("#tblModalSync").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
  });
</script>
<script>
  async function viewDetailSync(ID){
    var URL = "{{ route('profile.GetRefProfile') }}" + "?ID=" + ID;
    $('#div-overlay').empty();
    $('#div-overlay').append('<div class="overlay"><i class="fas fa-2x fa-sync fa-spin"></i></div>');
    var response = await getData(URL);
    console.log(response);
    if (response.code == '200'){
      var basedata = response.Data;
      console.log(basedata);
      // for (var key in basedata[0]){
      //   formdata += $('#' + key).attr('name') + '=' + basedata[0][key] + '&';
      // }
      basedata[0]['RefID'] = basedata[0]['ID'];
      basedata[0]['RefName'] = basedata[0]['Name'];
      $( "#clearbtn" ).trigger( "click" );
      parseDataToInput(basedata);
      $('#TaxID').trigger('input');
      $('.select2bs4').trigger('change');
      corporateF_chekcked();
      $('#SCGroup').val(basedata[0]['SCGroup']);
      $('#SCGroup').trigger('change');
      $('#div-overlay').empty();
      $("#modal-sync").modal("hide");
      if (basedata[0]['IntermediaryF']){
        formData = $(".form-save").serialize()
        console.log(formData);
        disableAll();
      }
      // const form = document.getElementById("needs-validation");
      // for (const element of form.elements) {
      //   if (element.tagName == 'INPUT' || element.tagName == 'SELECT'){
      //     if (formdata == ''){
      //       formdata = element.name + '=' + element.value;
      //     }else{
      //       formdata += '&' + element.name + '=' + element.value;
      //     }
      //   }    
      // }
    }else{
      $('#div-overlay').empty();
      toastMessage(response.code,response.message);
    }
  }
</script>
