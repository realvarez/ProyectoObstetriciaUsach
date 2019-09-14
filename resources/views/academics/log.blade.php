@extends('layouts.master')

@section('content')
<div  >

        <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                            <a href="/academics" >  <button type="button" class="btn btn-secondary" style="float:left" > Volver</button> </a>

                        <div class="col-md-10" style="text-align:center">

                            <h1>Hoja de vida de {{ucfirst($academic->name)}}</h1>

                        </div>


                    </div>
                </div>
                <div style="padding: 1em"></div>

                <div class="card-body" >


                                <div style="margin-left: 10em" >
                                   <div class="row" >

                                        <div style="padding: 1em"></div>

                                        <div class="column" style="float: left;  width: 35%;"   >
                                            <h3>Agregar eventos</h3>
                                            <div style="padding: 0.5em"></div>


                                            <form action="{{route('events.store',['id'=>$academic->id])}}" method="POST" enctype="multipart/form-data">
                                                    @csrf

                                                <div class="form-group">
                                                            <label for="name">Nombre de evento ocurrido</label>
                                                            <input data-toggle="tooltip" data-placement="right" title="Ingrese su numero telefonico de celular" type="text" name="name" class="form-control " id="name" placeholder="Nombre del evento " >
                                                        </div>
                                                <!-- <div class="form-group">
                                                                <label for="birth_date">Fecha del evento</label>
                                                                <input data-toggle="tooltip" data-placement="right" title="Ingrese su numero telefonico de celular" type="date" name="birth_date" class="form-control " id="category_name" placeholder="Ingrese su fecha"  value="">
                                                    </div>
                                                -->

                                                    <div class="form-group">
                                                            <label for="annotation">Anotacion</label>
                                                            <textarea style= "height: 10em;max-height:10em" data-toggle="tooltip" data-placement="right" title="Ingrese descripcion" type="text" name="annotation" class="form-control " id="annotation" placeholder="Ingrese descripcion" ></textarea>
                                                        </div>
                                                <div >

                                                        <a href="/academics" >  <button type="button" class="btn btn-secondary"  > Borrar</button> </a>
                                                        <button type="submit" class="btn btn-primary " style="float:right"> <i class="fas fa-long-arrow-alt-up"></i> Agregar</button>

                                                </div>

                                            </form>
                                            <div style="padding: 2em"></div>

                                            @if($evento != null)
                                            <h3>    Evento seleccionado</h3>
                                            <div style="padding: 1em"></div>

                                                               <div  >

                                                                  <div class="card mb-3">
                                                                          <form   action="{{route('events.store',['id'=>$academic->id, 'event_id'=>$evento->id ])}}" method="POST" enctype="multipart/form-data">
                                                                                  @csrf
                                                                                  <div class="card-header">

                                                                                          <div class="row">
                                                                                                  <div class="col-md-10" style="text-align:center">

                                                                                                      <div class="form-group" >
                                                                                                              <label style="text-align:center" for="name">Nombre</label>

                                                                                                              @if($evento->name !== null)

                                                                                                                  <input  data-toggle="tooltip" value="{{$evento->name }}" data-placement="right" title="Ingrese su numero telefonico de celular" type="text" name="name_edit" class="form-control " id="name_edit" placeholder="Nombre del evento " >


                                                                                                              @else

                                                                                                              <input data-toggle="tooltip" data-placement="right" title="Ingrese su numero telefonico de celular" type="text" name="name_edit" class="form-control " id="name_edit" placeholder="Nombre del evento " >


                                                                                                              @endif
                                                                                                      </div>
                                                                                                  </div>

                                                                                          </div>
                                                                                      </div>

                                                                                  <div class="card-body">


                                                                                          <div class="form-group">
                                                                                                  <label for="annotation">Anotacion</label>

                                                                                                  @if($evento->annotation !== null)

                                                                                                              <textarea style= "height:15em" data-toggle="tooltip" data-placement="right" title="Ingrese su numero telefonico de celular" type="text" name="annotation_edit" class="form-control " id="annotation_edit" placeholder="Descripcion del acontecimiento" >{{$evento->annotation}}</textarea>


                                                                                                  @else
                                                                                                              <textarea style= "height:15em" data-toggle="tooltip" data-placement="right" title="Ingrese su numero telefonico de celular" type="text" name="annotation_edit" class="form-control " id="annotation_edit" placeholder="Descripcion del acontecimiento" ></textarea>


                                                                                                  @endif
                                                                                          </div>
                                                                                              <div >

                                                                                                      <a href="/academics" >  <button type="button" class="btn btn-secondary"  > Borrar</button> </a>
                                                                                                  <button type="submit" class="btn btn-primary " style="float:right"> Guardar cambios</button>

                                                                                              </div>
                                                                                  </div>
                                                                          </form>

                                                                  </div>

                                                              </div>

                                                @endif



                                        </div>
                                        <div style="padding: 5em"></div>

                                        <div class= "column" style=" float: left;  width: 40%;">
                                                <div>


                                                    <form action="{{route('events.store',['id'=>$academic->id ])}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <h3>Lista de Eventos</h3>
                                                        <div style="padding: 0.5em"></div>
                                                            <div class="form-group">
                                                                    <label for="events">Nombre del evento ocurrido</label>

                                                                    @if($events !== null)

                                                                          <select  id="event_id" data-toggle="tooltip" data-placement="right" title="Ingrese el nombre del evento"  name="event_id" class="form-control form-control-sm "  onchange="this.form.submit()">
                                                                                  <option name="" id=""  value="">Seleccione algun evento especifico para verlo </option>

                                                                                  @foreach ($events as $event)
                                                                                      <option name="event_id" id="event_id"  value="{{$event->id}}">{{ucfirst($event->name)}} </option>
                                                                                  @endforeach
                                                                          </select>

                                                                    @else
                                                                            <select data-toggle="tooltip" data-placement="right" title="Ingrese el nombre del evento" name="name" class="form-control form-control-sm "  >

                                                                            </select>

                                                                    @endif


                                                              </div>
                                                          <!--     <div class="form-group">
                                                                    <label for="birth_date">Fecha del evento</label>
                                                                    <input data-toggle="tooltip" data-placement="right" title="Ingrese su numero telefonico de celular" type="date" name="birth_date" class="form-control " id="category_name" placeholder="Ingrese su fecha"  value="">
                                                              </div>
                                                            -->

                                                      </form>

                                                      <div style="padding: 1em"></div>

                                                      <div style="overflow-y: scroll; height: 60em; background:lightgrey">


                                                            @foreach ($events as $event)
                                                                          <div  style="max-width: 30em; margin-left: 12%"  >
                                                                              <div style="padding: 1em"></div>

                                                                              <div class="card mb-3">
                                                                                      <form   action="{{route('events.store',['id'=>$academic->id, 'event_id'=>$event->id ])}}" method="POST" enctype="multipart/form-data">
                                                                                              @csrf
                                                                                              <div class="card-header">

                                                                                                      <div class="row">
                                                                                                              <div class="col-md-10" style="text-align:center">

                                                                                                                  <div class="form-group" >
                                                                                                                          <label style="text-align:center" for="name">Nombre</label>

                                                                                                                          @if($event->name !== null)

                                                                                                                              <input  data-toggle="tooltip" value="{{$event->name }}" data-placement="right" title="Ingrese su numero telefonico de celular" type="text" name="name_edit" class="form-control " id="name_edit" placeholder="Nombre del evento " >


                                                                                                                          @else

                                                                                                                          <input data-toggle="tooltip" data-placement="right" title="Ingrese su numero telefonico de celular" type="text" name="name_edit" class="form-control " id="name_edit" placeholder="Nombre del evento " >


                                                                                                                          @endif

                                                                                                                  </div>
                                                                                                              </div>

                                                                                                      </div>
                                                                                                  </div>

                                                                                              <div class="card-body">


                                                                                                      <div class="form-group">
                                                                                                              <label for="annotation">Anotacion</label>

                                                                                                              @if($event->annotation !== null)

                                                                                                                          <textarea style= "height:15em" data-toggle="tooltip" data-placement="right" title="Ingrese su numero telefonico de celular" type="text" name="annotation_edit" class="form-control " id="annotation_edit" placeholder="Descripcion del acontecimiento" >{{$event->annotation}}</textarea>


                                                                                                              @else
                                                                                                                          <textarea style= "height:15em" data-toggle="tooltip" data-placement="right" title="Ingrese su numero telefonico de celular" type="text" name="annotation_edit" class="form-control " id="annotation_edit" placeholder="Descripcion del acontecimiento" ></textarea>


                                                                                                              @endif
                                                                                                      </div>
                                                                                                          <div >

                                                                                                                  <a href="/academics" >  <button type="button" class="btn btn-secondary"  > Borrar</button> </a>
                                                                                                              <button type="submit" class="btn btn-primary " style="float:right"> Guardar cambios</button>

                                                                                                          </div>
                                                                                              </div>
                                                                                      </form>

                                                                              </div>

                                                                          </div>
                                                                      @endforeach







                                                      </div>

                                              </div>




                                        </div>

                                      <br>



                            </div>


                </div>

        </div>




    </div>

@endsection
