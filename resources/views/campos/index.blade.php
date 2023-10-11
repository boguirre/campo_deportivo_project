@extends('layouts.panel')

@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom p-1">
                        <div class="head-label">
                            <h6 class="mb-0">Lista de Campos Deportivos</h6>
                        </div>
                        <div class="dt-action-buttons text-end">
                            <div class="dt-buttons d-inline-flex">

                                {{-- <button class="dt-button buttons-collection btn btn-outline-secondary dropdown-toggle me-2"
                                tabindex="0" aria-controls="DataTables_Table_0" type="button"
                                aria-haspopup="true"><span><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-share font-small-4 me-50">
                                        <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                                        <polyline points="16 6 12 2 8 6"></polyline>
                                        <line x1="12" y1="2" x2="12" y2="15">
                                        </line>
                                    </svg>Export</span>
                            </button> --}}


                                {{-- {!! Form::open([
                                    'route' => 'verificar-mensajes',
                                    'autocomplete' => 'off',
                                    'files' => true,
                                    'class' => 'verifica add-new-record modal-content pt-0',
                                ]) !!}
                                <button type="submit" class="btn btn-primary me-2 mt-1">
                                    <span>Actualizacion</span></button>

                                {!! Form::close() !!} --}}



                                <a href="{{route('campo.create')}}" class="dt-button create-new btn btn-primary" 
                                    ><span><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-plus me-50 font-small-4">
                                            <line x1="12" y1="5" x2="12" y2="19">
                                            </line>
                                            <line x1="5" y1="12" x2="19" y2="12">
                                            </line>
                                        </svg>Añadir campo</span></a>
                            </div>


                        </div>
                    </div>
                    <div class="card-body">

                        <form id="search-form" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="search" id="search-input" class="form-control"
                                    placeholder="Buscar por número de celular o mensaje">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                        </form>
                        <table id="result-table" class="table table-responsive  datatables-basic dtr-column collapsed ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Capacidad</th>
                                    <th>Precio</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody id="result-table">

                                {{-- @include('mensajeria.table') --}}
                                @foreach ($campos as $campo)
                                    <tr>
                                        <td>{{$campo->id}}</td>
                                        <td>{{$campo->nombre}}</td>
                                        <td>{{$campo->tipo_campo ? $campo->tipo_campo->nombre : 'Sin tipo de campo' }}</td>
                                        <td>{{$campo->capacidad}}</td>
                                        <td>S/.{{$campo->precio}}</td>
                                        @if ($campo->estado >= 1)
                                            <td><span class="badge bg-success">Activo</span></td>
                                        @else
                                            <td><span class="badge bg-danger">Inactivo</span></td>
                                        @endif
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <div class="row">

                            <div class="col-md-6 mt-1">

                                <div id="result-info" class="dataTables_info">
                                    Mostrando {{ $campos->firstItem() }} a {{ $campos->lastItem() }} de
                                    {{ $campos->total() }} registros
                                </div>



                            </div>


                            <div class="col-md-6 mt-1">
                                <div id="result-pagination" class="dataTables_paginate">
                                    <ul class="pagination justify-content-end">
                                        <li class="page-item {{ $campos->previousPageUrl() ? '' : 'disabled' }}">
                                            <a class="page-link" href="{{ $campos->previousPageUrl() }}">Anterior</a>
                                        </li>
                                        
                                        @if ($campos->currentPage() > 3)
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $campos->url(1) }}">1</a>
                                            </li>
                                            @if ($campos->currentPage() > 4)
                                                <li class="page-item disabled">
                                                    <span class="page-link">...</span>
                                                </li>
                                            @endif
                                        @endif

                                        @foreach ($campos->getUrlRange(max($campos->currentPage() - 2, 1), min($campos->currentPage() + 2, $campos->lastPage())) as $page => $url)
                                            <li
                                                class="page-item {{ $page == $campos->currentPage() ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endforeach

                                        @if ($campos->currentPage() < $campos->lastPage() - 2)
                                            @if ($campos->currentPage() < $campos->lastPage() - 3)
                                                <li class="page-item disabled">
                                                    <span class="page-link">...</span>
                                                </li>
                                            @endif
                                            <li class="page-item">
                                                <a class="page-link"
                                                    href="{{ $campos->url($campos->lastPage()) }}">{{ $campos->lastPage() }}</a>
                                            </li>
                                        @endif

                                        <li class="page-item {{ $campos->nextPageUrl() ? '' : 'disabled' }}">
                                            <a class="page-link" href="{{ $campos->nextPageUrl() }}">Siguiente</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>


                        </div>







                    </div>



                </div>
            </div>
        </div>
        <!-- Modal to add new record -->
        <div class="modal modal-slide-in fade" id="modals-slide-in">
            <div class="modal-dialog sidebar-sm">



                {{-- {!! Form::open([
                    'route' => '',
                    'autocomplete' => 'off',
                    'files' => true,
                    'class' => 'formulario add-new-record modal-content pt-0',
                ]) !!} --}}
                {{-- <form action="" method="POST"  class="formulario add-new-record modal-content pt-0" > --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">Envio de mensajes</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="mb-1">
                        <label class="form-label" for="basic-icon-default-fullname">
                            Url De La Imagen</label>
                        <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname"
                            name="imagen_url" placeholder="Ingrese la Url de la imagen" aria-label="John Doe" required />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="basic-icon-default-post">Seleccione Un archivo</label>
                        <input type="file" class="form-control dt-post" name="excel_file" required />
                    </div>

                    <button type="submit" class="btn btn-primary data-submit me-1">Enviar</button>
                </div>
                {{-- </form> --}}

                {{-- {!! Form::close() !!} --}}




            </div>
        </div>

        {{-- {!! Form::open([
        'route' => 'mensajeria.sendSms',
        'autocomplete' => 'off',
        'files' => true,
        'class' => 'form-control',
    ]) !!}

    <label for="phone_number">Phone Number:</label>
    <input type="text" name="phone_number" class="form-control" id="phone_number" required>

    <label for="message">Message:</label>
    <textarea name="message" id="message" class="form-control" required></textarea>

    <button type="submit" class="btn btn-success mt-1">Send SMS</button>

    {!! Form::close() !!} --}}

    </section>
@endsection


@section('scripts')
@endsection
