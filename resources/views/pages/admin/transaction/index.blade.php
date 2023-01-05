@extends('layouts.admin')

@section('title')
  Transaction
@endsection

@section('content')
  <div class="section-content section-dashboard-home">
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">Transaction</h2>
        <p class="dashboard-subtitle">
          List of Transaction
        </p>
      </div>
      <!-- dashboard content -->
      <div class="dashboard-content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                    <thead>
                      <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Harga</td>
                        <td>Status</td>
                        <td>Dibuat</td>
                        <td>Action</td>
                      </tr>
                    </thead>
                    <tbody></tbody>
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
          data: 'user.name',
          name: 'user.name'
        },
        {
          data: 'total_price',
          name: 'total_price'
        },
        {
          data: 'transaction_status',
          name: 'transaction_status'
        },
        {
          data: 'created_at',
          name: 'created_at'
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
