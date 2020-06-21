@if (session('message'))
  <div class="modal fade" id="modalMessage" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body"><h4>{{ session('message') }}</h4></div>
        <div class="modal-footer"><button class="btn btn-secondary" data-dismiss="modal">Close</button></div>
      </div>
    </div>
  </div>

  <script>
    window.onload = function() {
      $("#modalMessage").modal("show");
    }
  </script>
@endif
