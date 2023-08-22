@extends('layouts.main')
@section('title','contact app | show companies')
@section('content')
    <!-- content -->
    <main class="py-5">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-title">
                <strong>Company Details</strong>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label for="name" class="col-md-3 col-form-label">Name</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{$companies->name}}</p>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="address" class="col-md-3 col-form-label">address</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{$companies->address}}</p>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="email" class="col-md-3 col-form-label">Email</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{$companies->email}}</p>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="website" class="col-md-3 col-form-label">Website</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{$companies->website}}</p>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group row mb-0">
                      <div class="col-md-9 offset-md-3">
                          <a href="{{route('company.edit', $companies->id)}}" class="btn btn-info">Edit</a>
                          <a href="{{route('company.destroy', $companies->id)}}" class="btn btn-outline-danger" onclick="confirm('Are you sure?')">Delete</a>
                          <a href="{{route('company.index')}}" class="btn btn-outline-secondary">Cancel</a>
                      </div>
                      <form id="form-delete" method="post" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection
