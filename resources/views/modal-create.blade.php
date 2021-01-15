 <!-- Modal -->
  <div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-dark text-white">
        <div class="modal-header border border-0">
          <h5 class="modal-title" id="createLabel">
            <i class="bi bi-plus-circle" style="color: #ffc107;"></i> Guardar Jumper<br>
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete="off">
            @csrf
            <div class="form-group mb-3">
                <input type="text" name="panel" id="panel" maxlength="50" class="form-control border border-dark text-white" style="background: #181818;" placeholder="nombre del Panel" aria-label="Panel">
            </div>
            <div class="form-group">
              <input type="text" name="link" id="link" maxlength="50" class="form-control border border-dark text-white" style="background: #181818;" placeholder="Ingrese el Apik" aria-label="Link">
            </div>
        </div>
          <div class="modal-footer border border-0">
            <button type="button" class="btn btn-danger" style="font-weight: 500;width: 45%;" data-bs-dismiss="modal"><strong><i class="bi bi-x-circle"></i> Cerrar</strong></button>
            <button type="button" class="btn btn-success" id="add" style="font-weight: 500;width: 45%;"><strong><i class="bi bi-cloud-plus"></i> Guardar</strong></button>
          </div>
        </form>
      </div>
    </div>
  </div>

  