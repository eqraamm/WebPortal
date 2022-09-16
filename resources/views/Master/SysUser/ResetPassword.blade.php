<div class="form-group">
   <div class="row justify-content-center">
      <div class="col-sm-12">
         <label for="New_Password">New Password</label>
         <div class="input-group mb-3">
            <input type="password" class="form-control" id="New_Password" name="New_Password"></input> 
            <div class="input-group-append">
               <a class="btn show-password" for="New_Password">
                  <i id="icon_New_Password" class="fas fa-eye-slash"></i>
               </a>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="form-group">
   <div class="row justify-content-center">
      <div class="col-sm-12">
         <label for="ReType_Password">Confirm Password</label>
         <div class="input-group mb-3">
            <input type="password" class="form-control" id="ReType_Password" name="ReType_Password"></input> 
            <div class="input-group-append">
               <a class="btn show-password" for="ReType_Password">
                  <i id="icon_ReType_Password" class="fas fa-eye-slash"></i>
               </a>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="form-group">
   <button class='btn btn-primary btn-block btn-reset'>Reset Password</button>
</div>

<script>
   var ID = "{{ $ID }}";
   var urlReset = "{{ route('user.resetpassword') }}";
</script>
<script src="{{asset('dist/js/Master/SysUser/resetPassword.js?1')}}"></script>