var _token   = $('meta[name="csrf-token"]').attr('content');

$('.btn-reset').on('click',async function(event){
   event.preventDefault();
   try {
      var data = {
         '_token' : _token,
         'ID' : ID,
         'New_Password' : $('#New_Password').val(),
         'ReType_Password' : $('#ReType_Password').val()
      }
      
      try {
         var response = await PostData(urlReset,data, true, debugF);  
      } catch (error) {
      }
      toastMessage(response['code'],response['message']);
      if (response['code'] == '200'){
         $('#modal-general').modal('hide');
      }
   } catch (error) {
      toastMessage(error)
   }finally{
   }
   

});

$('.show-password').on('click',function(event){
   event.preventDefault();
   var id = $(this).attr('for');
   var input = document.getElementById(id);
   var icon = document.getElementById('icon_' + id);
   
   if (input.type == 'password'){
      icon.className = 'fas fa-eye'
      input.type = 'text'
   }else{
      icon.className = 'fas fa-eye-slash'
      input.type = 'password'
   }
});