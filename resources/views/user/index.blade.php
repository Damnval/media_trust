@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          {{ __('Manage Users') }}
        </div>
        <div class="card-body">
          <table class="table table-md table-striped">
            <tr>
              <th>Username</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
        
            @foreach($users as $user)
            <tr>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>
                <a href="{{ route('users.show', $user->id) }}">View </a>
                @if($user->id == Auth::id())         
                  <a href="{{ route('users.edit', $user->id) }}">Edit </a>
                  <form method="POST" action="{{ route('users.destroy', [$user->id]) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" type="submit"> Delete
                    </button>
                  </form>
                @endif

              </td>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection