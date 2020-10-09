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
              <h3 class="mb-0">Editing {{$product->product_name}}</h3>
            </div>
            <!-- product -->
            <div class="body">
              <form enctype="multipart/form-data" method="post" action="{{ route('products.update', $product->product_id) }}">
                @csrf
                @method('PUT')
                  <div class="form-group col-md-6">
                    <img src={{ asset('images/productimages/'.$product->p_img_url) }} alt = "Image"></img>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="file-upload" class="btn btn-success"><i class="nc-icon nc-cloud-upload-94 upload"></i>Upload New Image</label>
                    <input id="file-upload" name='p_img_url' type="file" style="display:none;">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="product_name">Name:</label>
                    <input type="text" class="form-control" name="product_name" id="product_name" value="{{$product->product_name}}">
                  </div>
                    <div class="form-group col-md-12">
                      <label for="product_price">Price:</label>
                      <input type="text" class="form-control" name="product_price" id="product_price" value="{{$product->product_price}}">
                    </div>
                    <div class="form-group col-md-12">
                      <label for="p_service_provider_id">Service Provider:</label>
                      <select class="form-control" id="p_service_provider_id" name="p_service_provider_id">
                        @foreach ($providers as $provider)
                        <option value="{{$provider->service_provider_id}}">{{$provider->service_provider_name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                      <label for="p_service_category_id">Service Category:</label>
                      <select class="form-control" id="p_service_category_id" name="p_service_category_id">
                        @foreach ($categories as $category)
                          <option value="{{$category->service_category_id}}">{{$category->sc_name}}</option>
                        @endforeach
                    </select>
                  </div>
                <!-- Card footer -->
                <div class="card-footer py-4">
                  <div class="footer">
                    <a class="btn btn-secondary" href="{{ route('products.index') }}">Cancel</a>
                    <button type="submit" class="btn btn-success">Update</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

  @include('layouts.footers.auth')
</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>

<script type="text/javascript">

$('#image').change(function() {
    var i = $(this).prev('label').clone();
    var file = $('#image')[0].files[0].name;
    $(this).prev('label').text(file);
  });

</script>

@endsection
