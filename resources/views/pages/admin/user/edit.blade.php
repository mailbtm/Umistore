@extends('layouts.admin')

@section('title')
  Category
@endsection

@section('content')
  <div class="section-content section-dashboard-home">
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">Create Category</h2>
        <p class="dashboard-subtitle">
          Create New categories
        </p>
      </div>
      <!-- dashboard content -->
      <div class="dashboard-content">
        <div class="row">
          <div class="col-md-12">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <div class="card">
              <div class="card-body">
                <form action="{{ route('user.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                  @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="name">Nama User</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $item->name }}" required>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="email">Email User</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ $item->email }}" required>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="password">Password User</label>
                        <input type="password" id="password" name="password" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="roles">Role USer</label>
                        <select name="roles" id="roles" class="form-control" required>
                          <option value="{{ $item->roles }}">Tidak diganti</option>
                          <option value="USER">User</option>
                          <option value="ADMIN">Admin</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col text-right">
                        <button type="submit" class="btn btn-success px-5">
                            Save Now
                        </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
