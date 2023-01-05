@extends('layouts.dashboard')

@section('title')
  Store Dashboard Settings Store
@endsection

@section('content')
  <div class="section-content section-dashboard-home">
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">Store Settings</h2>
        <p class="dashboard-subtitle">
          Make store that profitable
        </p>
      </div>
      <!-- dashboard content -->
      <div class="dashboard-content">
        <div class="row">
          <div class="col-12">
            <form action="{{ route('dashboard-account-redirect', 'dashboard-settings') }}" method="POST"
              enctype="multipart/form-data">
              @csrf
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Nama Toko</label>
                        <input type="text" class="form-control" name="store_name" value="{{ $users->store_name }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="categories_id" class="form-control">
                          <option value="{{ $users->categories_id }}">Tidak Diganti</option>
                          @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Store</label>
                        <p class="text-muted">Apakah anda juga ingin membuka toko?</p>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" name="store_status" class="custom-control-input" id="openStoreTrue"
                            value="1" {{ $users->store_status == 1 ? 'checked' : '' }}>
                          <label for="openStoreTrue" class="custom-control-label">Buka</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" name="store_status" class="custom-control-input" id="openStoreFalse"
                            value="0" {{ $users->store_status == 0 || $users->store_status == null ? 'checked' : '' }}>
                          <label for="openStoreFalse" class="custom-control-label">Sementara Tutup</label>
                        </div>
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
