@extends('layouts.admin')

@section('title')
  Product Gallery
@endsection

@section('content')
  <div class="section-content section-dashboard-home">
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">Gallery</h2>
        <p class="dashboard-subtitle">
          List of Gallery
        </p>
      </div>
      <!-- dashboard content -->
      <div class="dashboard-content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <a href="{{ route('product-gallery.create') }}" class="btn btn-primary mb-3">+ Tambah Product</a>

                <div class="table-responsive">
                  <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                    <thead>
                      <tr>
                        <td>ID</td>
                        <td>Produk</td>
                        <td>Photo</td>
                        <td>Action</td>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
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
  <script>
    var datatable = $('#crudTable').DataTable({
      processing: true,
      serverSide: true,
      ordering: true,
      ajax: {
        url: '{!! url()->current() !!}',
      },
      columns: [{
          data: 'id',
          name: 'id'
        },
        {
          data: 'product.name',
          name: 'product.name'
        },
        {
          data: 'photo',
          name: 'photo'
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searcable: false,
          width: '15%'
        }
      ]
    })
  </script>
@endpush
