@extends('layouts.main')
@section('title', 'contact app | create new company')
@section('content')
<main class="py-5">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-title">
              <strong>Add New Company</strong>
            </div>
            @if ($message=session('message'))
                <small class="alert alert-success">{{$message}}</small>
            @endif
            <form action="{{route('company.store')}}" method="post">
                @method('post')
                @csrf
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group row">
                        <label for="first_name" class="col-md-3 col-form-label">Name</label>
                        <div class="col-md-9">
                        <input type="text" name="name" value="{{old('name')}}" id="first_name" class="form-control is-invalid">
                      @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-md-3 col-form-label">Address</label>
                        <div class="col-md-9">
                        <input type="text" name="address" value="{{old('address')}}" id="address" class="form-control">
                        <small class="text-danger">{{ $errors->first('address') }}</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-3 col-form-label">Email</label>
                        <div class="col-md-9">
                        <input type="text" name="email" value="{{old('email')}}" id="email" class="form-control">
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="website" class="col-md-3 col-form-label">Website</label>
                        <div class="col-md-9">
                        <input type="text" name="website" value="{{old('website')}}" id="website" class="form-control">
                        <small class="text-danger">{{ $errors->first('website') }}</small>

                        </div>
                    </div>
                    <hr>
                    <div class="form-group row mb-0">
                        <div class="col-md-9 offset-md-3">
                            <button type="submit" class="btn btn-primary">Save</button>
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
@endsection
