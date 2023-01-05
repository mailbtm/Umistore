@extends('layouts.auth')

@section('title')
  Register
@endsection

@section('content')
  <div class="page-content page-auth" id="register">
    <div class="section-store-auth" data-aos="fade-up">
      <div class="container">
        <div class="row align-items-center justify-content-center row-login">
          <div class="col-lg-5">
            <h2>
              memulai untuk jual beli, <br>
              dengan cara terbaru
            </h2>
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="form-group">
                <label for="name">Full Name</label>
                <input id="name" v-model="name" type="text"
                  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                  required autocomplete="name" autofocus>

                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="email">email Address</label>
                <input id="email" v-model="email" type="email" @change="checkEmailAvailable()"
                  :class="{ 'is-invalid': this.email_unvailable }"
                  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                  required autocomplete="email">

                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="password">password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" required autocomplete>

                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="password_confirmation">konfirmasi password</label>
                <input id="password_confirmation" type="password"
                  class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                  required autocomplete>

                @error('password_confirmation')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="">Store</label>
                <p class="text-muted">Apakah anda juga ingin membuka toko?</p>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" name="is_store_open" class="custom-control-input" id="openStoreTrue"
                    :value="true" v-model="is_store_open">
                  <label for="openStoreTrue" class="custom-control-label">Iya, Boleh</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" name="is_store_open" class="custom-control-input" id="openStoreFalse"
                    :value="false" v-model="is_store_open">
                  <label for="openStoreFalse" class="custom-control-label">Ngga, Makasih</label>
                </div>
              </div>

              <div class="form-group" v-if="is_store_open">
                <label for="">Nama Toko</label>
                <input type="text" v-model="store_name" name="store_name" id="store_name"
                  class="form-control @error('store_name') is-invalid @enderror" required autocomplete autofocus>
                @error('store_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group" v-if="is_store_open">
                <label for="">Kategori</label>
                <select name="categories_id" class="form-control">
                  <option value="" disabled>Select Kategori</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
              <button class="btn btn-success w-100 mt-4" :disabled="this.email_unvailable">
                Sign In To My Account
              </button>
              <a href="{{ route('login') }}" class="btn btn-signup w-100 mt-2">
                Back to Sign In
              </a>
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
    Vue.use(Toasted);

    var register = new Vue({
      el: "#register",
      mounted() {
        AOS.init();
      },
      methods: {
        checkEmailAvailable: function() {
          var self = this;
          axios.get("{{ route('api-register-check') }}", {
              params: {
                email: this.email
              }
            })
            .then(function(response) {
              if (response.data == 'available') {
                self.$toasted.show(
                  "Email anda tersedia!, silahkan lanjutkan ke tahap selanjutnya!", {
                    position: "top-center",
                    className: "rounded",
                    duration: 1000,
                  }
                );
                self.email_unvailable = false;
              } else {
                self.$toasted.error(
                  "Maaf, tampaknya email sudah terdaftar pada sistem kami.", {
                    position: "top-center",
                    className: "rounded",
                    duration: 1000,
                  }
                );
                self.email_unvailable = true;
              }


              console.log(response);
            });
        }
      },
      data() {
        return {
          name: "",
          email: "",
          is_store_open: false,
          store_name: "",
          email_unvailable: false,
        }
      }
    })
  </script>
@endpush
