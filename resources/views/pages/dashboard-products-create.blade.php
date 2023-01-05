@extends('layouts.dashboard')

@section('title')
  Store Dashboard Products Details
@endsection

@section('content')
  <div class="section-content section-dashboard-home">
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">Create New Product</h2>
        <p class="dashboard-subtitle">
          Create your own product
        </p>
      </div>
      <!-- dashboard content -->
      <div class="dashboard-content">
        <div class="row">
          <div class="col-12">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form action="{{ route('dashboard-products-store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Product name</label>
                        <input type="text" class="form-control" name="name">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Price </label>
                        <input type="number" class="form-control" name="price">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="categories_id" id="categories_id" class="form-control">
                          @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Desckripsi </label>
                        <textarea name="description" id="editor"></textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Thumbnail </label>
                        <input type="file" class="form-control" name="photo">
                        <p class="text-muted">
                          kamu bisa memilih lebih dari 1 foto
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col text-right">
                      <button class="btn btn-success px-5">
                        Save Now
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
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
