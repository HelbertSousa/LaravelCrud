@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <a href="{{ url('usuarios') }}">Voltar</a>
          </div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
          </div>

          @if (Request::is('*/edit'))
            <form action="{{ url('usuarios/update') }}/{{ $usuario->id }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="exampleInputName1">Name:</label>
                <input aria-describedby="nameHelp" class="form-control" id="exampleInputName1" name="name"
                  placeholder="Enter new name" type="text" value="{{ $usuario->name }}">
                <small class="form-text text-muted" id="nameHelp">Please enter your new name.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address:</label>
                <input aria-describedby="emailHelp" class="form-control" id="exampleInputEmail1" name="email"
                  placeholder="Enter new email" type="email" value="{{ $usuario->email }}">
                <small class="form-text text-muted" id="emailHelp">Please enter your new email.</small>
              </div>
              <button class="btn btn-primary" type="submit">Update</button>
            </form>
          @else
            <form action="{{ url('usuarios/add') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="exampleInputName1">Name:</label>
                <input aria-describedby="nameHelp" class="form-control" id="exampleInputName1" name="name"
                  placeholder="Enter name" type="text">
                <small class="form-text text-muted" id="nameHelp">Please enter your first and lastname.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address:</label>
                <input aria-describedby="emailHelp" class="form-control" id="exampleInputEmail1" name="email"
                  placeholder="Enter email" type="email">
                <small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
              </div>
              <button class="btn btn-primary" type="submit">Submit</button>
            </form>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
