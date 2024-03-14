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
                            Lista de Usúarios
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-light text-primary" href="user-management-groups-list.html">
                            <i class="me-1" data-feather="users"></i>
                            Gerenciar Grupos
                        </a>
                        <a class="btn btn-sm btn-light text-primary" href="{{route('matriz.create')}}">
                            <i class="me-1" data-feather="user-plus"></i>
                            Add Usuários
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-fluid px-4">
        <div class="card">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-Mail</th>
                            <th>Criação</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nome</th>
                            <th>E-Mail</th>
                            <th>Criação</th>
                            <th>Ações</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar me-2"><img class="avatar-img img-fluid" src="/assets/img/illustrations/profiles/profile-2.png" /></div>
                                    {{ $user->name}}
                                </div>
                            </td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
                                <a class="btn btn-datatable btn-icon btn-transparent-dark" href="#!"><i data-feather="eye"></i></a>
                                <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" href="user-management-edit-user.html"><i data-feather="edit"></i></a>
                                <a class="btn btn-datatable btn-icon btn-transparent-dark" href="#!"><i data-feather="trash-2"></i></a>
                            </td>

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
