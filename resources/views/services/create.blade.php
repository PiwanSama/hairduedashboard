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
              <h3 class="mb-0">Add a new service</h3>
            </div>
            <!-- Product -->
            <div class="body">
              <form method="post" action="{{ route('services.store') }}" enctype="multipart/form-data">
                @csrf
                  <div class="form-group col-md-12">
                    <label for="file-upload" class="btn btn-success"><i class="nc-icon nc-cloud-upload-94 upload"></i>Upload Image</label>
                    <input id="file-upload" name='s_img_url' type="file" style="display:none;" required>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="service_name">Name:</label>
                    <input type="text" class="form-control" name="service_name" id="service_name" required>
                  </div>
                    <div class="form-group col-md-12">
                      <label for="service_price">Price:</label>
                      <input type="text" class="form-control" name="service_price" id="service_price" required>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="service-provider-id">Service Provider:</label>
                      <select class="form-control" id="s_service_provider_id" name="s_service_provider_id">
                        @foreach ($providers as $provider)
                        <option value="{{$provider->service_provider_id}}">{{$provider->service_provider_name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                      <label for="s_service_category_id">Service Category:</label>
                      <select class="form-control" id="s_service_category_id" name="s_service_category_id">
                        @foreach ($categories as $category)
                          <option value="{{$category->service_category_id}}">{{$category->sc_name}}</option>
                        @endforeach
                    </select>
                  </div>
                <div class="footer">
                  <a class="btn btn-secondary" href="{{ route('services.index') }}">Cancel</a>
                  <button class="btn btn-success">Add</button>
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

$('#file-upload').change(function() {
    var i = $(this).prev('label').clone();
    var file = $('#file-upload')[0].files[0].name;
    $(this).prev('label').text(file);
  });

</script>

@endsection
