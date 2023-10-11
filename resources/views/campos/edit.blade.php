@extends('layouts.panel')

@section('content')
    <section class="form-control-repeater">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Enviar Mensaje</h4>
                    </div>
                    <div class="card-body">

                        {!! Form::open([
                            'route' => 'mensajeria.store',
                            'autocomplete' => 'off',
                            'files' => true,
                            'class' => 'invoice-repeater add-new-record modal-content pt-0',
                        ]) !!}



                        <br>



                        <div class="alert alert-success" role="alert">
                            <div class="alert-body"><strong>Bienvenido!</strong> Envia tu primer mensaje.</div>
                        </div>




                        <div data-repeater-list="invoice">
                            <div data-repeater-item>
                                <div class="row d-flex align-items-end">
                                    @error('phone_number')
                                        <strong class="text-sm text-red-600" style="color: red">{{ $message }}</strong>
                                    @enderror

                                    {{-- <div class="col-md-2">
                                    <div class="mb-1">
                                        <label class="form-label" for="pais">Pais</label>

                                        <select id="pais" class="form-control select2 form-select">
                                            <option value="">SELECCIONE UN PAIS</option>
                                            <option value="+51">Perú</option>
                                            <option value="+56">CHILE</option>
                                            <option value="+52">MEXICO</option>
                                        </select>
                                    </div>
                                </div> --}}
                                    <div class="col-md-2 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="phone_number">NÚMERO</label>
                                            <input type="text" class="form-control phoneinput" id="phone_number"
                                                name="phone_number[]" aria-describedby="phone_number"
                                                placeholder="Ingrese El Número" required />
                                        </div>



                                    </div>

                                    <div class="col-md-6 col-12">
                                        {{-- <div class="mb-1">
                                        <label class="form-label" for="message">Mensaje</label>
                                        
                                        
                                        
                                        
                                        <input type="text" class="form-control" id="message" name="message[]"
                                            aria-describedby="message" placeholder="Ingrese El mensaje" required />
                                    </div> --}}

                                        <div class="form-floating mb-1">
                                            <textarea data-length="900" name="message[]" class="form-control char-textarea active" id="message" rows="3"
                                                placeholder="Ingrese Mensaje" style="height: 20px; color: rgb(78, 81, 84);" required></textarea>
                                            <label for="textarea-counter">Mensaje</label>
                                        </div>
                                        @error('message')
                                            <strong class="text-sm text-red-600" style="color: red">{{ $message }}</strong>
                                        @enderror
                                    </div>

                                    <div class="col-md-2 col-12 mb-50">
                                        <div class="mb-1">
                                            <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete
                                                type="button">
                                                <i data-feather="x" class="me-25"></i>
                                                <span>Delete</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <hr />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-icon btn-primary" type="button" id="add-item-btn"
                                    data-repeater-create>
                                    <i data-feather="plus" class="me-25"></i>
                                    <span>Añadir un contacto</span>
                                </button>

                                <button class="btn btn-icon btn-primary" type="submit" id="add-item-btn"
                                    data-repeater-create>
                                    {{-- <i data-feather="plus" class="me-25"></i> --}}

                                    <i data-feather='send' class="me-25"></i>
                                    <span>Enviar Mensajes</span>
                                </button>
                            </div>


                        </div>


                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
@endsection
