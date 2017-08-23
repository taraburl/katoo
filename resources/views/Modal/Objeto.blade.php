


<div   tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left"  id="create-item" >
    <div role="document" class="modal-dialog"style="margin-top: 100px;">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Crear un Objeto</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <!--<p>Lorem ipsum dolor sit amet consectetur.</p>-->
    <form data-toggle="validator" action="{{route('Objeto.store')}}" method="POST"   >
                        <div class="form-group">
                            <label class="control-label" for="nombre">Nombre:</label>
                            <input type="text" name="nombre" class="form-control" data-error="Please enter nombre." required />
                            <div class="help-block with-errors"></div>
                        </div>

                         <div class="row">
                    <div class="form-group col-md-6">

                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>

                            <input type="text" name="nombre" placeholder="Nombre" data-error="Please enter nombre."  class="form-control" id="nombre">
                        </div>
                    </div> 
                    <div class="form-group col-md-6">
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-chain-broken" aria-hidden="true"></i></span>
                            <input type="text"  name="Url" placeholder="Direccion Url" class="form-control" id="Url">
                        </div>
                    </div> 
                            <div class="form-group col-md-12">
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-id-card" aria-hidden="true"></i></span>
                            <input type="text" name="modulo" placeholder="Modulo" class="form-control" id="modulo">
                        </div>
                    </div>
                </div> 
                <div class="form-group">
                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-align-justify" aria-hidden="true"></i></span>
                         
                        <select class="form-control" id="Tipo">
                        <option value="0">Selecione un tipo</option>
                        <option value="Titulo">Titulo</option>
                        <option value="Formulario">Formulario</option>
                        <option value="Resporte">Resporte</option>
                    
                        </select>
                    </div>
                </div> 
                <div class="form-group">
                    <div class="input-group">
                    <span class="input-group-addon">
                    <i class="fa fa-check-square-o" aria-hidden="true">
                    </i>
                    </span>
                      <span class="centered" style="padding-top: 2%;"> &nbspHabilitado :  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                        <div class="btn-group1" data-toggle="buttons">
                        </br>
                        <label class="btn btn-success">
                          <input type="radio" name="options1" id="0" autocomplete="off"> SI
                        </label>
        
                 <label class="btn btn-danger">

                 <input type="radio" name="options1" id="1" autocomplete="off"> NO
                 </label>
                 </div>
                    </div>
                </div> 
   <div class="form-group">
                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-check-square-o" aria-hidden="true"></i></span>
                      <span class="centered" style="padding-top: 2%;"> &nbspVisible en el Menu :&nbsp </span>
                        <div class="btn-group2" data-toggle="buttons">
                        </br>
                        <label class="btn btn-success">
                          <input type="radio" name="options2" id="0" autocomplete="off"> SI
                        </label>
                 <label class="btn btn-danger">
                 <input type="radio" name="options2" id="1" autocomplete="off"> NO
                 </label>
                 </div>


                    </div>
                </div> 


                <div class="row">
                    <div class="form-group col-md-12" id='fontoculto' style="display: none;">
                        <div class="input-group"><span class="input-group-addon"><i class="fa fa-font-awesome" aria-hidden="true"></i></span>
                            <input type="text"  name="font" placeholder="font" class="form-control" id="font">

                        </div>
                    </div>
                </div>
        
          </form>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
 <button type="submit" class="btn crud-submit btn-success">Guardar</button>
            </div>
        </div>
    </div>
</div>

 

 <div   tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left"  id="edit-item" >
    <div role="document" class="modal-dialog"style="margin-top: 100px;">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Editar Objeto</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <!--<p>Lorem ipsum dolor sit amet consectetur.</p>-->
 <form data-toggle="validator" action="" method="put">
                        <div class="form-group">

                            <label class="control-label" for="nombre">Nombre:</label>
                            <input type="text" name="nombre" class="form-control" data-error="Please enter nombre." required />

                            <div class="help-block with-errors"></div>
                        </div>
        
          </form>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
    <button type="submit" class="btn btn-success crud-submit-edit">Actualizar</button>
            </div>
        </div>
    </div>
</div>
 
