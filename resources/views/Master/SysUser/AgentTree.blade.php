<style>
   .card-tree{
      border-radius: 2em;
   }
   .elementFadeIn {
      animation: fadeIn .4s linear forwards;
   }
   .elementFadeOut {
      animation: fadeOut .4s linear forwards;
   }
   @keyframes fadeIn {
      0% { opacity:0; }
      100% { opacity:1; } 
   }
   @keyframes fadeOut {
      0% { opacity:1; }
      100% { opacity:0; } 
   }

   /* Important part */
   /* .modal-dialog{
      overflow-y: initial !important
   }
   .modal-body{
      overflow-y: auto;
   } */
</style>

<div class="container">
<!-- <div class="dropdown-menu dropdown-menu-sm" id="context-menu">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
   </div> -->
   <!-- <div class="row">
      <div class="col-sm-1">
         Name
      </div>
      <div class="col-sm-auto">
         :
      </div>
      <div class="col-sm-3">
         Meliodas
      </div>
   </div>
   <div class="row mb-3">
      <div class="col-sm-1">
         Level
      </div>
      <div class="col-sm-auto">
         :
      </div>
      <div class="col-sm-3">
         Managing Partner
      </div>
   </div>

   <div class="row">
      <div class="col-sm-3">
         <h3>My Partner</h3>
      </div>
   </div> -->
   
   <div id="first-layer">
   </div>
   <div id="agent-tree" class="overflow-auto">
      <!-- <div class="row ml-1 mt-1 flex-nowrap" id="row-tree-ekram">
         <div class="col-sm-3 parent-dropdown">
            <div class="card card-tree tree-ekram bg-success" data-toggle="dropdown">
               <div class="card-body">
                  <div class="row align-items-center">
                     <div class="col-md-12 d-flex justify-content-center">
                        <label class="card-title text-center text-truncate">Meliodas</label>
                     </div>
                     <div class="col-md-12 d-flex justify-content-center">
                        <p class="card-text">(Managing Partner)</p>
                     </div>
                  </div>
                  <div class="row align-items-center">
                     <div class="col-sm-12 d-flex justify-content-center">
                        <a href="#">
                           <i class="fas fa-angle-down"></i>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="dropdown-menu dropdown-menu-sm">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
               </div>
            </div>
         </div>
      </div> -->
   </div>
</div>


<script src="{{asset('dist/js/Master/SysUser/AgentTree.js?3')}}"></script>
<script>
   var userid = "{{session('ID')}}";
</script>
