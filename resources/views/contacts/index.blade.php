@extends('layouts.main')
@section('title', 'contact app | all contacts')
@section('content')
<main class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header card-title">
                <div class="d-flex align-items-center">
                  <h2 class="mb-0">All Contacts</h2>
                  <div class="ml-auto">
                    <a href="{{route('contacts.create')}}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
                  </div>
                </div>
              </div>
              @if ($message = session('message'))
                <small class="alert alert-success">{{$message}}</small>
              @endif

            <div class="card-body">
              <form>
                  <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col">
                          <select id="filter_company_id" name="company_id" class="custom-select">
                            @foreach ($companies as $id => $name)
                                <option {{$id==request('company_id')}} value="{{$id}}">{{$name}}</option>
                            @endforeach
                          </select>
                        </div>
                            <div class="col">
                              <div class="input-group mb-3">
                                <input type="text" name="search" id="search" value="{{request('search')}}" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-clear btn-outline-secondary" id="btn-clear" type="button">
                                        <i class="fa fa-refresh"></i>
                                      </button>
                                  <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                    <i class="fa fa-search"></i>
                                  </button>
                                </div>
                              </div>
                            </div>
                      </div>
                    </div>
                  </div>
              </form>
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col"></th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Company</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>

                    @if ($contacts->count())
                        @foreach ($contacts as $index => $contact)
                        <tr>
                            <th scope="row">{{$index + $contacts->firstItem()}}</th>
                            <td>{{$contact->first_name}}</td>

                            <td>{{$contact->last_name}}</td>
                            <td>{{$contact->email}}</td>
                            <td>{{$contact->company->name ?? 'not set'}}</td>

                            <td width="150">


                              <a href="{{route('contacts.show', $contact->id)}}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                              <a href="{{route('contacts.edit', $contact->id)}}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                              <a href="{{route('contacts.destroy', $contact->id)}}" class="btn btn-delete btn-sm btn-circle btn-outline-danger" title="Delete" onclick="confirm('Are you sure?')"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        <form id="form-delete" method="post" style="display: none;">
                            @csrf
                            @method('delete')
                        </form>
                    @endif

                </tbody>
              </table>
              {{$contacts->appends(request()->only('company_id'))->links()}}
{{-- pagination --}}
              {{-- <nav class="mt-4">
                  {{-- <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">Next</a>
                    </li>
                  </ul> --}}

                {{-- </nav> --}}

            </div>


          </div>
        </div>
      </div>
    </div>
  </main>

@endsection
