@extends('layouts.app')

@section('content')
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
              <h3 class="mb-0">BeautyGo Registered Products</h3>
            </div>
            <!-- Product -->
            <div class="card-body">
      <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-custom">
              <tr>
                <tr>
                    <th scope="col">{{ __('Image') }}</th>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Price') }}</th>
                    <th scope="col">{{__('Category')}}</th>
                    <th scope="col"></th>
                </tr>
              </tr>
            </thead>
            <tbody class="list">
                @foreach ($products as $product)
                <tr>
                    <td class="avatar rounded-circle mr-3">
                      <img src={{ asset('images/productimages/'.$product->p_img_url) }} alt = "Image"></img>
                    </td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->product_price }}</td>
                    <td>{{ $product->product_category->pc_name }}</td>
                    <td class="text-right">
                      <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                              <form action="{{ route('products.destroy', $product->product_id) }}" method="post">
                                  @csrf
                                  @method('delete')

                                  <a class="dropdown-item" href="{{ route('products.edit', $product->product_id) }}">{{ __('Edit') }}</a>
                                  <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this product?") }}') ? this.parentElement.submit() : ''">
                                      {{ __('Delete') }}
                                  </button>
                              </form>
                          </div>
                      </div>
                  </td>
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