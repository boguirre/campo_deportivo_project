@extends('layouts.panel')

@section('content')
    <section class="form-control-repeater">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Editar Centro Deportivo</h4>
                    </div>
                    <div class="card-body">


                        <br>



                        @if ($complejo_deportivo->estado == '1')
                            <div class="alert alert-success" role="alert">
                                <div class="alert-body"><strong>Este Complejo Deportivo!</strong> Se encuentra habilitado.
                                </div>
                            </div>
                        @else
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-body"><strong>Este Complejo Deportivo!</strong> Se encuentra inhabilitado.
                                </div>
                            </div>
                        @endif


                        {{-- {!! Form::open(['route' => 'campo.store', 'autocomplete' => 'off']) !!} --}}
                        {!! Form::model($complejo_deportivo, [
                            'route' => ['centro.update', $complejo_deportivo],
                            'method' => 'put',
                            'files' => true,
                        ]) !!}

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
                                            <label class="form-label" for="phone_number">Direccion</label>
                                            {{-- <input type="number" class="form-control phoneinput" id="phone_number"
                                                name="capacidad" aria-describedby="phone_number"
                                                placeholder="Ingrese la capacidad" required /> --}}
                                            {!! Form::text('direccion', null, [
                                                'class' => 'form-control phoneinput',
                                                'placeholder' => 'Ingrese la direccion',
                                                'required',
                                            ]) !!}
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
                                            <label class="form-label" for="phone_number">Telefono</label>
                                            {{-- <input type="number" step="any" class="form-control phoneinput"
                                                id="phone_number" name="precio" aria-describedby="phone_number"
                                                placeholder="Ingrese el precio" required /> --}}
                                            {!! Form::text('telefono', null, [
                                                'class' => 'form-control phoneinput',
                                                'placeholder' => 'Ingrese el telefono',
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
                                    <span>Actualizar Centro</span>
                                </button>
                            </div>
                        </div>

                        {!! Form::close() !!}

                        <div class="col-md-12 col-12 mt-2">
                            <h4 class="card-title">Seleccionar Campos</h4>
                            <form action="{{ route('complejo.addcampo') }}" method="post">
                                @csrf
                                <select class="select2" name="mi_select[]">
                                    @foreach ($campos as $campo)
                                        <option value="{{ $campo->id }}">{{ $campo->nombre }} -
                                            {{ $campo->tipo_campo->nombre }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="complejo_id" value="{{ $complejo_deportivo->id }}">
                                <button class="btn btn-icon btn-primary mt-1" type="submit">
                                    <i data-feather="plus" class="me-25"></i>
                                    <span>Agregar Campos</span>
                                </button>
                            </form>

                            <div class="d-flex flex-wrap mt-3">
                                <label class="form-label" style="font-weight: 700;" for="phone_number">Campos Deportivos
                                    Agregados:</label>
                                @foreach ($complejo_deportivo->complejo_campos as $item)
                                    <span class="badge bg-warning text-dark mb-1"
                                        style="margin-left: 1rem;">{{ $item->campo->nombre }} <a href="{{route('delete.campos', $item->id)}}">
                                            <i class="fa-solid fa-circle-minus" style="color: #f50025;"></i></a></span>
                                @endforeach
                            </div>
                        </div>

                        <hr />

                        <div class="col-md-12 col-12 mt-2">
                            <div class="mb-1">
                                <h4 class="card-title">Subir Imagenes</h4>
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
                                    <form action="{{ route('upload-images-complejo') }}" method="POST" class="dropzone"
                                        id="dropzoneForm">
                                        @csrf
                                        <input type="hidden" name="complejo_id" value="{{ $complejo_deportivo->id }}">
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
                                    @foreach ($complejo_deportivo->imagenes_complejos as $imagen)
                                        <div class="ml-4" style="margin-left: 1rem;">
                                            <img src="{{ Storage::url($imagen->url) }}" width="100px" height="100px"
                                                alt="">
                                            <form action="{{ route('image-complejo.destroy') }}" method="post"
                                                class="mt-0.5">
                                                @csrf
                                                <input type="hidden" name="complejo_id"
                                                    value="{{ $complejo_deportivo->id }}">
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
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Selecciona opciones',
                multiple: true, // Permite la selección múltiple
            });
        });
    </script>
@endsection
