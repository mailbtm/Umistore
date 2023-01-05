@extends('layouts.success')

@section('title')
  Store Success Page
@endsection

@section('content')
  <div class="page-content page-success">
    <div class="section-success" data-aos="zoom-in">
      <div class="container">
        <div class="row align-items-center justify-content-center row-login">
          <div class="col-lg-6 text-center">
            <img src="/images/success.svg" class="mb-4" alt="">
            <h2>Transaction Processed</h2>
            <p>silahkan tunggu konfirmasi email dari kami dan kami akan mengkonfirmasi resi secepat mungkin!</p>
            <div>
              <a href="/dashboard.html" class="btn btn-success w-50 mt-4">My Dashboard</a>
              <a href="index.html" class="btn btn-signup w-50 mt-4">Go To Shooping</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
