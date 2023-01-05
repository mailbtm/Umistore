@extends('layouts.admin')

@section('title')
  Product
@endsection

@section('content')
  <div class="section-content section-dashboard-home">
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">Create Product</h2>
        <p class="dashboard-subtitle">
          Create New Product
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
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="name">Nama Product</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="users_id">Pemilik Product</label>
                        <select name="users_id" id="users_id" class="form-control">
                          @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="categories_id">Kategori Product</label>
                        <select name="categories_id" id="categories_id" class="form-control">
                          @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="price">Harge</label>
                        <input type="number" id="price" name="price" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="editor"></textarea>
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

@push('addon-script')
  <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('editor');
  </script>
@endpush
