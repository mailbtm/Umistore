@extends('layouts.dashboard')

@section('title')
  Store Dashboard Products Details
@endsection

@section('content')
  <div class="section-content section-dashboard-home">
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">Shirup Marjan</h2>
        <p class="dashboard-subtitle">
          Product Detail
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
            <form action="{{ route('dashboard-products-update', $product->id) }}" method="POST"
              enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Product name</label>
                        <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Price </label>
                        <input type="number" class="form-control" name="price" value="{{ $product->price }}">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="categories_id" class="form-control">
                          <option value="{{ $product->categories_id }}">{{ $product->category->name }}</option>
                          @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Desckripsi </label>
                        <textarea name="description" id="editor">{!! $product->description !!}</textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col text-right">
                      <button class="btn btn-success w-100">
                        Save
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  @foreach ($product->galleries as $gallery)
                    <div class="col-md-4">
                      <div class="gallery-container">
                        <img src="{{ Storage::url($gallery->photo ?? '') }}" alt="" class="w-100">
                        <a href="{{ route('dashboard-products-gallery-delete', $gallery->id) }}" class="deleta-gallery">
                          <img src="/images/icon-delete.svg" alt="">
                        </a>
                      </div>
                    </div>
                  @endforeach
                  <div class="col-12 mt-3">
                    <form action="{{ route('dashboard-products-gallery-upload') }}" method="post"
                      enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="products_id" value="{{ $product->id }}">
                      <input type="file" id="file" name="photo" class="d-none" onchange="form.submit()">
                      <button type="button" class="btn btn-secondary w-100" onclick="thisFileUpload()">
                        Add Image
                      </button>
                    </form>
                  </div>
                </div>
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
  <script>
    function thisFileUpload() {
      document.getElementById('file').click();
    }
  </script>
@endpush
