<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Generar Certificado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.juntas.generar') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <p>¿Como desea el informe?</p>
                        <input type="radio" id="excel" name="opcion" value="0">
                        <label for="excel">Excel</label><br>
                        <input type="radio" id="pdf" name="opcion" value="1">
                        <label for="pdf">PDF</label><br>
                    </div>

                    <div class="row" id="fecha" style="display:none">
                        <div class="col">
                            <label for="">Fecha inicial: </label>
                            <input type="date" class="form-control" id="txtFechaInicial" name="txtFechaInicial">
                        </div>
                        <div class="col">
                            <label for="">Fecha Final: </label>
                            <input type="date" class="form-control" id="txtFechaFinal" name="txtFechaFinal">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Generar Informe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>