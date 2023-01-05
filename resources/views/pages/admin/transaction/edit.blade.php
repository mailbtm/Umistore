@extends('layouts.admin')

@section('title')
  Transaction
@endsection

@section('content')
  <div class="section-content section-dashboard-home">
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">Edit Transaction</h2>
        <p class="dashboard-subtitle">
          Edit Transaction
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
                <form action="{{ route('transaction.update', $item->id) }}" method="POST">
                  @method('PUT')
                  @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="transaction_status">Transaction Status</label>
                        <select name="transaction_status" id="transaction_status" class="form-control">
                          <option value="{{ $item->transaction_status }}">{{ $item->transaction_status }}</option>
                          <option value="" disabled>-----------------</option>
                          <option value="PENDING">PENDING</option>
                          <option value="SHIPPING">SHIPPING</option>
                          <option value="SUCCESS">SUCCESS</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="total_price">Total Harga</label>
                        <input type="number" id="total_price" name="total_price" class="form-control"
                          value="{{ $item->total_price }}" required>
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
