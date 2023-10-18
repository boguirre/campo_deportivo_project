@extends('layouts.panel')

@section('content')
    <section class="form-control-repeater">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Editar Campo Deportivo</h4>
                    </div>
                    <div class="card-body">


                        <br>



                        @if ($campo->estado == '1')
                            <div class="alert alert-success" role="alert">
                                <div class="alert-body"><strong>Este Campo!</strong> Se encuentra habilitado.</div>
                            </div>
                        @elseif($campo->estado == '2')
                            <div class="alert alert-warning" role="alert">
                                <div class="alert-body"><strong>Este Campo!</strong> Se encuentra en uso.</div>
                            </div>
                        @else
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-body"><strong>Este Campo!</strong> Se encuentra en inhabilitado.</div>
                            </div>
                        @endif


                        {{-- {!! Form::open(['route' => 'campo.store', 'autocomplete' => 'off']) !!} --}}
                        {!! Form::model($campo, ['route' => ['campo.update', $campo], 'method' => 'put', 'files' => true]) !!}

                        <div data-repeater-list="invoice">
                            <div data-repeater-item>

                                <div class="row d-flex align-items-end">

                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="phone_number">Nombre</label>
                                            {!! Form::text('nombre', null, [
                                                'class' => 'form-control phoneinput',
                                                'placeholder' => 'Ingrese el nombre del campo',
                                                'required',
                                            ]) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">

                                        <div class="form-floating mb-1">

                                            {!! Form::textarea('descripcion', null, [
                                                'class' => 'form-control char-textarea active',
                                                'rows' => '3',
                                                'placeholder' => 'Ingrese Descripcion',
                                                ' style' => 'height: 20px; color: rgb(78, 81, 84);',
                                                'required',
                                            ]) !!}
                                            <label for="textarea-counter">Descripcion</label>
                                        </div>
                                        {{-- @error('message')
                                        <strong class="text-sm text-red-600" style="color: red">{{ $message }}</strong>
                                    @enderror --}}
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="phone_number">Capacidad</label>
                                            {{-- <input type="number" class="form-control phoneinput" id="phone_number"
                                                name="capacidad" aria-describedby="phone_number"
                                                placeholder="Ingrese la capacidad" required /> --}}
                                            {!! Form::number('capacidad', null, [
                                                'class' => 'form-control phoneinput',
                                                'placeholder' => 'Ingrese la capacidad',
                                                'required',
                                            ]) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="phone_number">Tipo de Campo</label>
                                            {!! Form::select('tipo_campo_id', $tipo_campos, null, ['class' => 'form-control select2 form-select']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="phone_number">Horario</label>
                                            {{-- <input type="text" class="form-control phoneinput" id="phone_number"
                                                name="horario" aria-describedby="phone_number"
                                                placeholder="Ingrese el horario" required /> --}}
                                            {!! Form::text('horario', null, [
                                                'class' => 'form-control phoneinput',
                                                'placeholder' => 'Ingrese el horario',
                                                'required',
                                            ]) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="phone_number">Precio</label>
                                            {{-- <input type="number" step="any" class="form-control phoneinput"
                                                id="phone_number" name="precio" aria-describedby="phone_number"
                                                placeholder="Ingrese el precio" required /> --}}
                                            {!! Form::number('precio', null, [
                                                'class' => 'form-control phoneinput',
                                                'placeholder' => 'Ingrese el precio',
                                                'required',
                                                'step' => 'any',
                                            ]) !!}
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
                                    <span>Actualizar Campo</span>
                                </button>
                            </div>
                        </div>

                        {!! Form::close() !!}

                        <hr>

                        <div class="col-md-12 col-12 mt-2">
                            <h4 class="card-title">Registrar Horarios</h4>
                            <form method="POST" action="{{ route('campo.add.horario') }}">
                                @csrf

                                <label for="hora_inicial">Hora Inicial:</label>
                                <input type="time" id="hora_inicial" name="hora_inicial" required>

                                <label for="hora_final">Hora Final:</label>
                                <input type="time" id="hora_final" name="hora_final" required>

                                <input type="hidden" name="campo_id" value="{{ $campo->id }}">

                                <button type="submit">Agregar</button>
                            </form>

                            <div class="mb-1 mt-1">
                                <label class="form-label" for="phone_number">Lista de horas agregadas:</label>
                            </div>

                            <form>
                                <label><input type="checkbox" id="seleccionar-todos">Seleccionar Todos</label>
                                <br>

                                @foreach ($campo->horarios as $horario)
                                    <label style="margin-right: 10px"><input type="checkbox" name="opcion1"
                                            value="{{ $horario->id }}">{{ date('H:i', strtotime($horario->hora_inicial)) }}
                                        - {{ date('H:i', strtotime($horario->hora_final)) }}</label>
                                @endforeach
                            </form>
                        </div>

                        <div class="col-md-12 col-12 mt-2">
                            <div class="mb-1">
                                <label class="form-label" for="phone_number">Subir Imagenes</label>
                                {{-- <div class="container">
                                    <form action="{{ route('upload-images') }}" method="POST" class="dropzone"
                                        id="dropzoneForm">
                                        @csrf
                                        <div class="justify-end">
                                            <button type="submit" class="btn btn-icon btn-primary">Agregar Imagenes</button>
                                        </div>
                                    </form>
                                </div> --}}
                                <div class="container" style="position: relative;">
                                    <form action="{{ route('upload-images') }}" method="POST" class="dropzone"
                                        id="dropzoneForm">
                                        @csrf
                                        <input type="hidden" name="campo_id" value="{{ $campo->id }}">
                                        <button type="submit" class="btn btn-icon btn-primary"
                                            style="position: absolute; top: 0.5rem; right: 2.5rem;"><i
                                                class="fas fa-upload"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="row d-flex align-items-end">
                            <div class="col-md-12 col-12 mt-2">
                                <div class="d-flex flex-wrap">
                                    @foreach ($campo->imagenes_campos as $imagen)
                                        <div class="ml-4">
                                            <img src="{{ Storage::url($imagen->url) }}" width="100px" height="100px"
                                                alt="">
                                            <form action="{{ route('image-campo.destroy') }}" method="post" class="mt-0.5">
                                                @csrf
                                                <input type="hidden" name="campo_id" value="{{ $campo->id }}">
                                                <input type="hidden" name="image_id" value="{{ $imagen->id }}">
                                                <button type="submit" style="background-color: #ff0000; border: none;">
                                                    <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>






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
    <script>
        document.getElementById('seleccionar-todos').addEventListener('change', function() {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = this.checked;
            }
        });
    </script>
@endsection
