@extends('layouts.master')

@section('content')
<div  style="max-width: 35em; margin-left: 35%"  >
        <div class="card mb-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h3><i class="fa fa-table"></i> Currículum de {{ucfirst($academic->name)}}</h3>
                    </div>


                </div>
            </div>
            <div class="card-body">


                    <form action="{{route('resumes.store',['id'=>$academic->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                             <div >

                                    @if ($exists)


                                            <div style="padding: 0.5em"></div>
                                            <div class="form-group">
                                                    <label for="address">Direccion</label>
                                                    <input data-toggle="tooltip" data-placement="right" title="Ingrese su email de contacto" type="text" name="address" class="form-control " id="category_name" placeholder="Ingrese su direccion actual"  value="{{$resume->address}}">
                                            </div>
                                            <div class="form-group">
                                                    <label for="mail">Email</label>
                                                    <input data-toggle="tooltip" data-placement="right" title="Ingrese su email de contacto" type="text" name="email" class="form-control " id="category_name" placeholder="Ingrese su email de contacto"  value="{{$resume->email}}">
                                            </div>
                                            <div class="form-group">
                                                    <label for="phone">Telefono</label>
                                                    <input data-toggle="tooltip" data-placement="right" title="Ingrese su numero telefonico de celular" type="text" name="phone" class="form-control " id="category_name" placeholder="Ingrese su numero telefonico"  value="{{$resume->phone}}">
                                                </div>
                                            <div class="form-group">
                                                <label for="hours">Horas de trabajo</label>
                                                <input data-toggle="tooltip" data-placement="right" title="Ingrese su numero telefonico de celular" type="number" name="hours" class="form-control " id="category_name" placeholder="Cuantas horas de trabajo tiene a la semana asignadas"  value="{{$resume->hours}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="teacher_category">Categoria de profesor</label>

                                                <select data-toggle="tooltip" data-placement="right" title="Ingrese la categoría a la que pertenece el documento" name="teacher_category_id" class="form-control form-control-sm ">
                                                        @foreach ($all_teacher_category as $teacher_category)
                                                                  <option id="id"   {{($resume->teacher_category_id == $teacher_category->id)?'selected':'' }}    value="{{$teacher_category->id}}">{{ucfirst($teacher_category->name)}} </option>
                                                        @endforeach
                                                </select>

                                          </div>
                                          <div class="form-group">
                                                <label for="hierarchy">Jerarquia</label>

                                                <select data-toggle="tooltip" data-placement="right" title="Ingrese la categoría a la que pertenece el documento" name="hierarchy_id" class="form-control form-control-sm ">
                                                        @foreach ($all_hierarchy as $hierarchy )
                                                            <option id="id"   {{($resume->hierarchy_id == $hierarchy->id)?'selected':'' }}  value="{{$hierarchy->id}}">{{ucfirst($hierarchy->name)}} </option>
                                                        @endforeach
                                                <select>

                                           </div>
                                          <div class="form-group">
                                                <label for="academic_type">Tipo de academico</label>

                                                <select data-toggle="tooltip" data-placement="right" title="Ingrese la categoría a la que pertenece el documento" name="academic_type_id" class="form-control form-control-sm ">
                                                            @foreach ($all_academic_type as $academic_type)
                                                                <option id="id"  {{($resume->academic_type_id == $academic_type->id)?'selected':'' }}  value="{{$academic_type->id}}">{{ucfirst($academic_type->name)}} </option>
                                                            @endforeach
                                                </select>
                                          </div>



                                            <div class="form-group">
                                                    <label for="birth_date">Fecha de nacimiento</label>
                                                    <input data-toggle="tooltip" data-placement="right" title="Ingrese su numero telefonico de celular" type="date" name="birth_date" class="form-control " id="category_name" placeholder="Ingrese su fecha de nacimiento"  value="{{$resume->birth_date}}">
                                                </div>

                                            <div class="form-group">
                                                    <label for="area_competence">Area de competencia</label>
                                                    <textarea data-toggle="tooltip" data-placement="right" title="Ingrese su numero telefonico de celular" type="text" name="area_competence" class="form-control " id="category_name" placeholder="Ingrese su area de competencia" >{{$resume->area_competence}} </textarea>
                                                </div>
                                                <div >

                                                        <a href="/academics" >  <button type="button" class="btn btn-secondary"  > Atras</button> </a>
                                                       <button type="submit" class="btn btn-primary " style="float:right"> <i class="fas fa-long-arrow-alt-up"></i> Guardar Cambios</button>

                                                   </div>
                                @else


                                        <div class="form-group">
                                                <label for="address">Direccion</label>
                                                <input data-toggle="tooltip" data-placement="right" title="Ingrese su email de contacto" type="text" name="address" class="form-control " id="category_name" placeholder="Ingrese su direccion actual"  >
                                        </div>
                                        <div class="form-group">
                                                <label for="mail">Email</label>
                                                <input data-toggle="tooltip" data-placement="right" title="Ingrese su email de contacto" type="text" name="email" class="form-control " id="category_name" placeholder="Ingrese su email de contacto" >
                                        </div>
                                        <div class="form-group">
                                                <label for="phone">Telefono</label>
                                                <input data-toggle="tooltip" data-placement="right" title="Ingrese su numero telefonico de celular" type="text" name="phone" class="form-control " id="category_name" placeholder="Ingrese su numero telefonico"  >
                                            </div>
                                        <div class="form-group">
                                            <label for="hours">Horas de trabajo</label>
                                            <input data-toggle="tooltip" data-placement="right" title="Ingrese su numero telefonico de celular" type="number" name="hours" class="form-control " id="category_name" placeholder="Cuantas horas de trabajo tiene a la semana asignadas"  >
                                        </div>


                                        <div class="form-group">
                                                <label for="teacher_category">Categoria de profesor</label>

                                                <select data-toggle="tooltip" data-placement="right" title="Ingrese la categoría a la que pertenece el documento" name="teacher_category_id" class="form-control form-control-sm ">
                                                        @foreach ($all_teacher_category as $teacher_category)
                                                            <option id="id" value="{{$teacher_category->id}}">{{ucfirst($teacher_category->name)}} </option>
                                                        @endforeach
                                                </select>

                                          </div>
                                          <div class="form-group">
                                                <label for="hierarchy">Jerarquia</label>

                                                <select data-toggle="tooltip" data-placement="right" title="Ingrese la categoría a la que pertenece el documento" name="hierarchy_id" class="form-control form-control-sm ">
                                                        @foreach ($all_hierarchy as $hierarchy )
                                                            <option id="id"  value="{{$hierarchy->id}}">{{ucfirst($hierarchy->name)}} </option>
                                                        @endforeach
                                                </select>

                                           </div>
                                          <div class="form-group">
                                                <label for="academic_type">Tipo de academico</label>

                                                <select data-toggle="tooltip" data-placement="right" title="Ingrese la categoría a la que pertenece el documento" name="academic_type_id" class="form-control form-control-sm ">
                                                            @foreach ($all_academic_type as $academic_type)
                                                                <option id="id" value="{{$academic_type->id}}">{{ucfirst($academic_type->name)}} </option>
                                                            @endforeach
                                                </select>
                                          </div>


                                        <div class="form-group">
                                                <label for="birth_date">Fecha de nacimiento</label>
                                                <input data-toggle="tooltip" data-placement="right" title="Ingrese su numero telefonico de celular" type="date" name="birth_date" class="form-control " id="category_name" placeholder="Ingrese su fecha de nacimiento"  >
                                            </div>

                                        <div class="form-group">
                                                <label for="area_competence">Area de competencia</label>
                                                <textarea data-toggle="tooltip" data-placement="right" title="Ingrese su numero telefonico de celular" type="text" name="area_competence" class="form-control " id="category_name" placeholder="Ingrese su area de competencia" ></textarea>
                                            </div>



                                            <div >

                                                    <a href="/academics" >  <button type="button" class="btn btn-secondary"  > Atras</button> </a>
                                                   <button type="submit" class="btn btn-primary " style="float:right"> <i class="fas fa-long-arrow-alt-up"></i> Guardar Cambios</button>

                                               </div>
                                @endif

                                @if (count($errors) > 0)
                                <div class="alert alert-danger" lang="es">
                                    <strong>Ups!</strong> Ha ocurrido un error al crear el currículum
                                </div>
                                @endif


                            </div>
                      </form>




            </div>

        </div>
</div>

@endsection
