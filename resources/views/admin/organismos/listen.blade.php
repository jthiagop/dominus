@extends('admin.layout.app')

@section('title', 'Matriz')

@section('header')
    @include('admin.layout.header')
@endsection

@section('lateral')
    @include('admin.layout.lateral')
@endsection


@section('content')

    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-fluid px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="user"></i></div>
                                Lista de Organismo
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="user-management-groups-list.html">
                                <i class="me-1" data-feather="users"></i>
                                Gerenciar Grupos
                            </a>
                            <a class="btn btn-sm btn-light text-primary" href="{{ route('organismo.create') }}">
                                <i class="me-1" data-feather="user-plus"></i>
                                Add Organismo
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-fluid px-4 ">
            <div class="card mb-4">
                <div class="card-header">Extended DataTables</div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('msg'))
                    <div class="alert alert-success" role="alert">
                        <ul>
                            {{session('msg')}}
                        </ul>
                    </div>
                @endif
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Razão Social</th>
                                <th>CNPJ</th>
                                <th>Cidade</th>
                                <th>Bairro</th>
                                <th>UF</th>
                                <th>Natureza</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Razão Social</th>
                                <th>CNPJ</th>
                                <th>Cidade</th>
                                <th>Bairro</th>
                                <th>UF</th>
                                <th>Natureza</th>
                                <th>Ações</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($organismos as $organismo)
                                <tr>
                                    <td>{{ $organismo->id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar me-2"><img class="avatar-img img-fluid"
                                                    src="/assets/img/illustrations/profiles/profile-2.png" /></div>
                                            {{ $organismo->razaosocial }}
                                        </div>
                                    </td>

                                    <td>{{ $organismo->cnpj }}</td>
                                    <td>{{ $organismo->cidade }}</td>
                                    <td>{{ $organismo->bairro }}</td>
                                    <td>{{ $organismo->uf }}</td>
                                    <td>
                                        <span class="badge bg-green-soft text-green">{{ $organismo->natureza }}</span>
                                    </td>
                                    <td>
                                        <a class="btn btn-datatable btn-icon btn-transparent-dark me-2"
                                            href="{{ route('organismo.show', $organismo->id) }}"><i
                                                data-feather="eye"></i></a>
                                        <a class="btn btn-datatable btn-icon btn-transparent-dark me-2"
                                            href="{{ route('organismo.edit', $organismo->id) }}"><i
                                                data-feather="edit"></i></a>
                                        <a class="btn btn-datatable btn-icon btn-transparent-dark" href="#!"><i
                                                data-feather="trash-2"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>


@section('footer')
    @include('admin.layout.footer')
@endsection
@endsection
