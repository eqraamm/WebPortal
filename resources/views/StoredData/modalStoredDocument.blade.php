<div class="form-group">
   <table id="tbl-stored-document" class="table table-striped table-bordered dt-responsive nowrap" width="100%">
   </table>
</div>
<script>
   var BaseURL = "{{ route('storeddata.getpolicyprintlogdocument') }}";
   var URLDownloadIcon = '{{asset("dist/img/fa-file-arrow-down.svg")}}';
   var response = @json($response);
</script>
<script src="{{asset('dist/js/StoredData/modalStoredDocument.js?1')}}"></script>