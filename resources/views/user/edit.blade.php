@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            {{ __('Edit Users') }}
          </div>

          <div class="card-body">

            <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PATCH')

              <div class="form-group row">
                @csrf
                <label for="name" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name" name='name' placeholder="name" value="{{ $user->name }}">
                </div>
              </div>
              <div class="form-group row">
                @csrf
                <label for="email" class="col-sm-2 col-form-label">email</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" name='email' placeholder="email" value="{{ $user->email }}">
                </div>
              </div>
          
              <div style="text-align: right">
              <button  type="submit">Save</button>
              </div>
              @if(count($errors))
                  <div class="form-group">
                      <div class="alert alert-danger">
                          <ul>
                              @foreach($errors->all() as $error)
                                  <li>{{$error}}</li>
                              @endforeach
                          </ul>
                      </div>
                  </div>
              @endif
                
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection