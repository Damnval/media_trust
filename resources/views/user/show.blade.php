@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          {{ __('User\'s Profile') }}
        </div>

        <div class="card-body">
          <form>
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Username:</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $user->name }}">
              </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email:</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $user->email }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Date Created:</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ \Carbon\Carbon::parse($user->created_at)->format('j F, Y') }}">
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection