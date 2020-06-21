@if (session('message'))
  <div class="modal fade" id="modalMessage" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3>{{ session('message')['title'] ?? '' }}</h3>
          <h5>{{ session('message')['desc'] ?? '' }}</h5>
        </div>
      </div>
    </div>
  </div>

  <script>
    window.onload = function() {
      $("#modalMessage").modal("show");
    }
  </script>
@endif
