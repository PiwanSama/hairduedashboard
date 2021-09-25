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
              <h3 class="mb-0">Editing {{$provider->service_provider_name}}'s Details</h3>
            </div>
            <!-- provider -->
            <div class="body">
              <form enctype="multipart/form-data" method="post" action="{{ route('providers.update', $provider->service_provider_id) }}">
                @csrf
                @method('PUT')
                  <div class="form-group col-md-6">
                    <img class="table-img" src={{ asset('images/spimages/'.$provider->sp_id_img) }} alt = "Image"></img>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="file-upload" class="btn btn-success"><i class="nc-icon nc-cloud-upload-94 upload"></i>Upload New Image</label>
                    <input id="file-upload" name='sp_id_img' type="file" style="display:none;">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="service_provider_name">Name:</label>
                    <input type="text" class="form-control" name="service_provider_name" id="service_provider_name" value="{{$provider->service_provider_name}}">
                  </div>
                    <div class="form-group col-md-12">
                      <label for="sp_address">Address:</label>
                      <input type="text" class="form-control" name="sp_address" id="sp_address" value="{{$provider->sp_address}}">
                    </div>
                   <div class="form-group col-md-12">
                      <label for="sp_whatsapp_contact">Whatsapp Contact:</label>
                      <input type="text" class="form-control" name="sp_whatsapp_contact" id="sp_whatsapp_contact" value="{{$provider->sp_whatsapp_contact}}">
                    </div>
                    <div class="form-group col-md-12">
                      <label for="sp_primary_contact">Primary Contact:</label>
                      <input type="text" class="form-control" name="sp_primary_contact" id="sp_primary_contact" value="{{$provider->sp_primary_contact}}">
                    </div>
                    <div class="form-group col-md-12">
                      <label for="sp_secondary_contact">Secondary Contact:</label>
                      <input type="text" class="form-control" name="sp_secondary_contact" id="sp_secondary_contact" value="{{$provider->sp_secondary_contact}}">
                    </div>
                <!-- Card footer -->
                <div class="card-footer py-4">
                  <div class="footer">
                    <a class="btn btn-secondary" href="{{ route('providers.index') }}">Cancel</a>
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
