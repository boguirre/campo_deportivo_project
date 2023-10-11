@extends('layouts.panel')

@section('content')
    <section class="form-control-repeater">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Añadir Campo Deportivo</h4>
                    </div>
                    <div class="card-body">


                        <br>



                        <div class="alert alert-success" role="alert">
                            <div class="alert-body"><strong>Bienvenido!</strong> Crea los primeros campos.</div>
                        </div>


                        {!! Form::open(['route' => 'campo.store', 'autocomplete' => 'off']) !!}

                        <div data-repeater-list="invoice">
                            <div data-repeater-item>

                                <div class="row d-flex align-items-end">

                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="phone_number">Nombre</label>
                                            <input type="text" class="form-control phoneinput" id="phone_number"
                                                name="nombre" aria-describedby="phone_number"
                                                placeholder="Ingrese el nombre del campo" required />
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">

                                        <div class="form-floating mb-1">
                                            <textarea data-length="900" name="descripcion" class="form-control char-textarea active" id="message" rows="3"
                                                placeholder="Ingrese Mensaje" style="height: 20px; color: rgb(78, 81, 84);" required></textarea>
                                            <label for="textarea-counter">Descripcion</label>
                                        </div>
                                        {{-- @error('message')
                                        <strong class="text-sm text-red-600" style="color: red">{{ $message }}</strong>
                                    @enderror --}}
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="phone_number">Capacidad</label>
                                            <input type="number" class="form-control phoneinput" id="phone_number"
                                                name="capacidad" aria-describedby="phone_number"
                                                placeholder="Ingrese la capacidad" required />
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="phone_number">Tipo de Campo</label>
                                            {{-- <select id="pais" class="form-control select2 form-select" name="tiposelect">
                                                <option value="">Seleccione una opcion</option>
                                                <option value="+51">Perú</option>
                                                <option value="+56">CHILE</option>
                                                <option value="+52">MEXICO</option>
                                            </select> --}}
                                            {!! Form::select('tipo_campo_id', $tipo_campos, null, ['class' => 'form-control select2 form-select']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="phone_number">Horario</label>
                                            <input type="text" class="form-control phoneinput" id="phone_number"
                                                name="horario" aria-describedby="phone_number"
                                                placeholder="Ingrese el horario" required />
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="phone_number">Precio</label>
                                            <input type="number" step="any" class="form-control phoneinput"
                                                id="phone_number" name="precio" aria-describedby="phone_number"
                                                placeholder="Ingrese el precio" required />
                                        </div>
                                    </div>
                                </div>
                                <hr />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-icon btn-primary" type="submit" id="add-item-btn"
                                    data-repeater-create>
                                    <i data-feather="plus" class="me-25"></i>
                                    <span>Añadir campo</span>
                                </button>
                            </div>
                        </div>

                        {!! Form::close() !!}

                        {{-- <div class="col-md-12 col-12 mt-2">
                            <div class="mb-1">
                                <label class="form-label" for="phone_number">Subir Imagenes</label>
                                <div class="container" style="position: relative;">
                                    <form action="{{ route('upload-images') }}" method="POST" class="dropzone"
                                        id="dropzoneForm">
                                        @csrf
                                        <button type="submit" class="btn btn-icon btn-primary"
                                            style="position: absolute; top: 0.5rem; right: 2.5rem;"><i
                                                class="fas fa-upload"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div> --}}


                        {{-- {!! Form::close() !!} --}}

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        Dropzone.options.dropzoneForm = {
            paramName: "file", // El nombre del campo del archivo en tu formulario
            maxFilesize: 5, // Tamaño máximo del archivo en MB
            acceptedFiles: ".jpg, .jpeg, .png", // Tipos de archivo permitidos
            dictDefaultMessage: "Arrastra archivos aquí o haz clic para seleccionar archivos"
        };
    </script>
@endsection
