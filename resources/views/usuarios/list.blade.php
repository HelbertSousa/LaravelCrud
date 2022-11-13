@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <a href="{{ url('usuarios/new') }}">Novo Usuario</a>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            <h1>User Lists Crud</h1>

            <table class="table-striped table-bordered table">

              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>

              <tbody>

                @foreach ($usuarios as $user)
                  <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                      <a class="btn btn-info" href="usuarios/{{ $user->id }}/edit"> Edit </button>
                    </td>
                    <td>
                      <form action="usuarios/delete/{{ $user->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger"> Delete </button>
                      </form>
                    </td>
                  </tr>
                @endforeach

              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
