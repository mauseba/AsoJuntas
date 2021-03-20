<div class="modal fade" id="evento_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Agregar o Modificar Evento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="formulario_evento">
                @csrf
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">ID</label>
                            <input type="text" class="form-control" id="txtid" name="txtid" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Fecha</label>
                            <input type="date" class="form-control" id="txtFecha" name="txtFecha">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Hora inicial</label>
                            <input type="time" class="form-control" id="txtHoraInicial" name="txtHoraInicial" min="09:00" max="18:00">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Hora Final</label>
                            <input type="time" class="form-control" id="txtHoraFinal" name="txtHoraFinal" min="09:00" max="18:00">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Juntas</label> <br>
                            <select id="ddlJuntas" class="form-control selectpicker" data-live-search="true" multiple>
                                @foreach ($juntas as $junta)
                                    <option value="{{$junta->id}}">{{$junta->Vereda}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Asunto</label>
                            <input type="text" class="form-control" id="txtAsunto" name="txtAsunto">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <p>¿Desea enviar un correo a los participante?</p>
                        <input type="radio" id="1" name="opcion" value="1">
                        <label for="si">Si</label><br>
                        <input type="radio" id="2" name="opcion" value="0">
                        <label for="no">No</label><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="">Descripcion</label>
                        <textarea id="txtDescripcion" class="form-control" name="txtDescripcion" cols="40" rows="10" ></textarea>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btnGuardar" >Guardar</button>
            <button type="button" class="btn btn-warning" id="btnEditar" >Editar</button>
            <button type="button" class="btn btn-danger" id="btnEliminar" >Eliminar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
        </div>
    </div>
    </div>
</div>