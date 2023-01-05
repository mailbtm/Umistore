@extends('layouts.dashboard')

@section('title')
  Store Dashboard Settings Account
@endsection

@section('content')
  <div class="section-content section-dashboard-home">
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">My Account</h2>
        <p class="dashboard-subtitle">
          Update your current profile
        </p>
      </div>
      <!-- dashboard content -->
      <div class="dashboard-content">
        <div class="row">
          <div class="col-12">
            <form action="{{ route('dashboard-account-redirect', 'dashboard-account') }}" method="POST"
              enctype="multipart/form-data" id="locations">
              @csrf
              <div class="card">
                <div class="card-body">
                  <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" class="form-control"
                          value="{{ $users->name }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="email" id="email" name="email" class="form-control"
                          value="{{ $users->email }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="address_one">Address 1</label>
                        <input type="text" id="address_one" name="address_one" class="form-control"
                          value="{{ $users->address_one }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="address_two">Address 2</label>
                        <input type="text" id="address_two" name="address_two" class="form-control"
                          value="{{ $users->address_two }}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="provinces_id">Province</label>
                        <select id="provinces_id" name="provinces_id" class="form-control" v-if="provinces"
                          v-model="provinces_id">
                          <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                        </select>
                        <select v-else class="form-control"></select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="regencies_id">City</label>
                        <select id="regencies_id" name="regencies_id" class="form-control" v-if="regencies"
                          v-model="regencies_id">
                          <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option>
                        </select>
                        <select v-else class="form-control"></select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="zip_code">Postal Code</label>
                        <input type="text" id="zip_code" name="zip_code" class="form-control"
                          value="{{ $users->zip_code }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="caountry">Caountry</label>
                        <input type="text" id="caountry" name="caountry" class="form-control"
                          value="{{ $users->country }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="phone_number">Mobile</label>
                        <input type="text" id="phone_number" name="phone_number" class="form-control"
                          value="{{ $users->phone_number }}">
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
  <script src="/vendor/vue/vue.js"></script>
  <script src="https://unpkg.com/vue-toasted"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script>
    var locations = new Vue({
      el: "#locations",
      mounted() {
        AOS.init();
        this.getProvincesData();
      },
      data: {
        provinces: null,
        regencies: null,
        provinces_id: null,
        regencies_id: null,
      },
      methods: {
        getProvincesData() {
          var self = this;
          axios.get("{{ route('api-provinces') }}")
            .then(function(response) {
              self.provinces = response.data;
            })
        },
        getRegenciesData() {
          var self = this;
          axios.get("{{ url('api/regencies') }}/" + self.provinces_id)
            .then(function(response) {
              self.regencies = response.data;
            })
        },
      },
      watch: {
        provinces_id: function(val, oldVal) {
          this.regencies_id = null;
          this.getRegenciesData();
        }
      },
    });
  </script>
@endpush
