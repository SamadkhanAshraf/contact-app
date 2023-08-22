@extends('layouts.main')
@section('title', 'contact app | create new contacts')
@section('content')
<main class="py-5">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-title">
              <strong>Add New Contact</strong>
            </div>
            @if ($message=session('message'))
                <small class="alert alert-success">{{$message}}</small>
            @endif
            <form action="{{route('contacts.store')}}" method="post">
                @method('post')
                @csrf
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group row">
                        <label for="first_name" class="col-md-3 col-form-label">First Name</label>
                        <div class="col-md-9">
                        <input type="text" name="first_name" value="{{old('first_name')}}" id="first_name" class="form-control is-invalid">
                      @error('first_name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="last_name" class="col-md-3 col-form-label">Last Name</label>
                        <div class="col-md-9">
                        <input type="text" name="last_name" value="{{old('last_name')}}" id="last_name" class="form-control">
                        <small class="text-danger">{{ $errors->first('last_name') }}</small>
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
                        <label for="phone" class="col-md-3 col-form-label">Phone</label>
                        <div class="col-md-9">
                        <input type="text" name="phone" value="{{old('phone')}}" id="phone" class="form-control">
                        <small class="text-danger">{{ $errors->first('phone') }}</small>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-3 col-form-label">Address</label>
                        <div class="col-md-9">
                        <textarea name="address" value="{{old('address')}}" id="address" rows="3" class="form-control"></textarea>
                        <small class="text-danger">{{ $errors->first('address') }}</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="company_id" class="col-md-3 col-form-label">Company</label>
                        <div class="col-md-9">
                        <select name="company_id" id="company_id" class="form-control">
                            @foreach ($companies as $id=>$name)
                               <option {{$id===old('company_id') ? 'selected':''}} value="{{$id}}">{{$name}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row mb-0">
                        <div class="col-md-9 offset-md-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{route('contacts.index')}}" class="btn btn-outline-secondary">Cancel</a>
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
