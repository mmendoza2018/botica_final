<!-- MODAL AGREGAR CLIENTES -->

<!-- The Modal -->
<div class="modal" id="modal_cli">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Registrar Cliente</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="card">
                        <!--esta es un card-->
                        <h5 class="card-header info-color amber lighten-3 text-center py-4">
                          <strong>Registro de cliente</strong>
                        </h5>
                        <div class="card-body px-lg-5 pt-0">
                          <form class="text-center" id="form_agrega_cliente" >

                            <!-- Nombre cliente -->
                            <div class="mt-3">
                              <input type="text" name="nombre_c" id="nom_cli" required class="form-control " placeholder="Nombre cliente">
                              <div class=""> <p class="text-danger text-center" id="alert01"></p></div>

                            </div>

                            <!-- Direccion cliente -->
                            <div class="mt-3">
                              <input type="text" name="direccion_c" id="dir_cli" required class="form-control " placeholder="Direccion cliente">
                              <div class=""> <p class="text-danger text-center" id="alert02"></p></div>
                            </div>
                            <!-- Numero de Telefono -->
                            <div class="mt-3">
                              <input type="number" name="tel_c" id="tel_cli" required class="form-control " placeholder="Numero de Telefono">
                              <div class=""> <p class="text-danger text-center" id="alert03"></p></div>
                            </div>

                            <!-- Tipo de Documento -->
                            <select class="mdb-select form-control  mt-3" id="s_c" name="tipodoc_c">
                              <option value="" selected disabled >tipo documento</option>
                              <option value="DNI" >DNI</option>
                              <option value="RUC">RUC</option>

                            </select>
                            <!-- Numero de documento -->
                            <div class="mt-3">
                              <input type="number" name="numero_c" id="numd_cli" class="form-control"  required placeholder="Numero de documento">
                              <div class=""> <p class="text-danger text-center" id="alert04"></p></div>
                            </div>
                            <!-- Send button -->
                            <hr>
                            <button type="button" class="btn-primary my-3 btn-sm form-control"  onclick="agregar_cliente()">Agregar</button>

                          </form>
                          <!-- Form -->
                        </div>
                      </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="close_cli">Close</button>
      </div>

    </div>
  </div>
</div>
