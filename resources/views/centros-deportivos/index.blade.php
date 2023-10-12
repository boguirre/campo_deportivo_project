@extends('layouts.panel')

@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom p-1">
                        <div class="head-label">
                            <h6 class="mb-0">Lista de Complejos Deportivos</h6>
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



                            <a href="{{route('centro.create')}}" class="dt-button create-new btn btn-primary" 
                            ><span><svg xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-plus me-50 font-small-4">
                                    <line x1="12" y1="5" x2="12" y2="19">
                                    </line>
                                    <line x1="5" y1="12" x2="19" y2="12">
                                    </line>
                                </svg>Añadir centro</span></a>
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
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>Horario</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody id="result-table">

                                {{-- @include('mensajeria.table') --}}
                                @foreach ($complejoDeportivos as $complejo)
                                    <tr>
                                        <td>{{$complejo->id}}
                                            <a href="{{route('centro.edit', $complejo)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                        </td>
                                        <td>{{$complejo->nombre}}</td>
                                        <td>{{$complejo->direccion}}</td>
                                        <td>{{$complejo->telefono}}</td>
                                        <td>{{$complejo->horario}}</td>
                                        @if ($complejo->estado >= 1)
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
                                    Mostrando {{ $complejoDeportivos->firstItem() }} a {{ $complejoDeportivos->lastItem() }} de
                                {{ $complejoDeportivos->total() }} registros
                                </div>



                            </div>


                            <div class="col-md-6 mt-1">
                                <div id="result-pagination" class="dataTables_paginate">
                                    <ul class="pagination justify-content-end">
                                        <li class="page-item {{ $complejoDeportivos->previousPageUrl() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $complejoDeportivos->previousPageUrl() }}">Anterior</a>
                                    </li>

                                    @if ($complejoDeportivos->currentPage() > 3)
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $complejoDeportivos->url(1) }}">1</a>
                                        </li>
                                        @if ($complejoDeportivos->currentPage() > 4)
                                            <li class="page-item disabled">
                                                <span class="page-link">...</span>
                                            </li>
                                        @endif
                                    @endif

                                    @foreach ($complejoDeportivos->getUrlRange(max($complejoDeportivos->currentPage() - 2, 1), min($complejoDeportivos->currentPage() + 2, $complejoDeportivos->lastPage())) as $page => $url)
                                        <li
                                            class="page-item {{ $page == $complejoDeportivos->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach

                                    @if ($complejoDeportivos->currentPage() < $complejoDeportivos->lastPage() - 2)
                                        @if ($complejoDeportivos->currentPage() < $complejoDeportivos->lastPage() - 3)
                                            <li class="page-item disabled">
                                                <span class="page-link">...</span>
                                            </li>
                                        @endif
                                        <li class="page-item">
                                            <a class="page-link"
                                                href="{{ $complejoDeportivos->url($complejoDeportivos->lastPage()) }}">{{ $complejoDeportivos->lastPage() }}</a>
                                        </li>
                                    @endif

                                    <li class="page-item {{ $complejoDeportivos->nextPageUrl() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $complejoDeportivos->nextPageUrl() }}">Siguiente</a>
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
