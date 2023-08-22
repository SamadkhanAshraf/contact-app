@extends('layouts.main')
@section('title', 'contact app | edit company')
@section('content')
    <main class="py-5">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-title">
                <strong>Update Contact</strong>
              </div>
              @if ($message = session('message'))
              <small class="alert alert-success">{{$message}}</small>
              @endif
              <form action="{{route('company.update', $companies->id)}}" method="POST">
                @csrf
                @method('PUT')
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label for="name" class="col-md-3 col-form-label">Name</label>
                      <div class="col-md-9">
                        <input type="text" name="name" id="name" class="form-control is-invalid" value="{{$companies->name}}">
                        <div class="invalid-feedback">
                          Please choose a username.
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="address" class="col-md-3 col-form-label">Address</label>
                      <div class="col-md-9">
                        <input type="text" name="address" id="address" class="form-control" value="{{$companies->address}}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="email" class="col-md-3 col-form-label">Email</label>
                      <div class="col-md-9">
                        <input type="text" name="email" id="email" class="form-control" value="{{$companies->email}}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="website" class="col-md-3 col-form-label">Website</label>
                      <div class="col-md-9">
                        <input type="text" name="website" id="website" class="form-control" value="{{$companies->website}}">
                        <small class="danger">{{$errors->first('website')}}</small>
                      </div>
                    </div>
                    {{-- <div class="form-group row">
                      <label for="company_id" class="col-md-3 col-form-label" value="{{$contacts->company}}">Company</label>
                      <div class="col-md-9">
                        <select name="company_id" id="company_id" class="form-control">
                            @foreach ($companies as $id => $name)
                                <option {{$id===old('company_id', $contacts->company_id) ? 'selected': ''}} value="{{$contacts->company_id}}">{{$name}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div> --}}
                    <hr>
                    <div class="form-group row mb-0">
                      <div class="col-md-9 offset-md-3">
                          <button type="submit" class="btn btn-primary">{{$companies->exists ? 'Update' : 'Save'}}</button>
                          <a href="{{route('company.index')}}" class="btn btn-outline-secondary">Cancel</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </main>
</html>
@endsection
