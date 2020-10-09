@extends('layouts.app')

@section('content')
  <div class="content">
      @if(session()->get('success'))
        <div class="alert alert-success fade show">
          {{ session()->get('success') }}
        </div>
      @endif
  </div>
  <div class="header bg-gradient-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0"></h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Hairdue Service Categories</h3>
            </div>
            <!-- Product -->
            <div class="card-body">
            <!-- Light table -->
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                      <tr>
                          <th scope="col">{{ __('Image') }}</th>
                          <th scope="col">{{ __('Name') }}</th>
                      </tr>
                  </thead>
                  <tbody class="list">
                      @foreach ($categories as $category)
                      <tr>
                          <td class="avatar mr-3">
                            <img src={{ asset('images/categoryimages/'.$category->sc_img_url) }} alt = "Image"></img>
                          </td>
                          <td>{{ $category->sc_name }}</td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

  @include('layouts.footers.auth')
</div>

@endsection