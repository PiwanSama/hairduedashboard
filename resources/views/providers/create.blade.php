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
              <h3 class="mb-0">Add a new service provider</h3>
            </div>
            <!-- Product -->
            <div class="body">
              <form method="post" action="{{ route('providers.store') }}" enctype="multipart/form-data">
                @csrf
                  <div class="form-group row mx-auto">
                    <div class="col-sm">
                      <label for="front-file-upload" class="btn btn-success"><i class="nc-icon nc-cloud-upload-94 upload"></i>Upload ID Front</label>
                      <input id="front-file-upload" name='sp_id_front' type="file" style="display:none;">
                    </div>
                    <div class="col-sm">
                      <label for="back-file-upload" class="btn btn-success"><i class="nc-icon nc-cloud-upload-94 upload"></i>Upload ID Back</label>
                      <input id="back-file-upload" name='sp_id_back' type="file" style="display:none;">
                    </div>
                    <div class="col-sm">
                      <label for="cover-file-upload" class="btn btn-success"><i class="nc-icon nc-cloud-upload-94 upload"></i>Upload Cover</label>
                      <input id="cover-file-upload" name='sp_coverphoto_url' type="file" style="display:none;">
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="service_provider_name">Name:</label>
                    <input type="text" class="form-control" name="service_provider_name" id="service_provider_name" required>
                  </div>
                    <div class="form-group col-md-12">
                      <label for="sp_address">Address:</label>
                      <input type="text" class="form-control" name="sp_address" id="sp_address" required>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="sp_location_lat">Location Latitude:</label>
                      <input type="text" class="form-control" name="sp_location_lat" id="sp_location_lat" required>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="sp_location_lng">Location Longitude:</label>
                      <input type="text" class="form-control" name="sp_location_lng" id="sp_location_lng" required>
                    </div>
                   <div class="form-group col-md-12">
                      <label for="sp_whatsapp_contact">Whatsapp Contact:</label>
                      <input type="text" class="form-control" name="sp_whatsapp_contact" id="sp_whatsapp_contact" maxlength="10" required>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="sp_primary_contact">Primary Contact:</label>
                      <input type="text" class="form-control" name="sp_primary_contact" id="sp_primary_contact" maxlength="10" required>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="sp_secondary_contact">Secondary Contact:</label>
                      <input type="text" class="form-control" name="sp_secondary_contact" id="sp_secondary_contact" maxlength="10">
                    </div>
                <div class="footer">
                  <a class="btn btn-secondary" href="{{ route('providers.index') }}">Cancel</a>
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

$('#front-file-upload').change(function() {
    var i = $(this).prev('label').clone();
    var file = $('#front-file-upload')[0].files[0].name;
    $(this).prev('label').text(file);
  });

  $('#back-file-upload').change(function() {
    var i = $(this).prev('label').clone();
    var file = $('#back-file-upload')[0].files[0].name;
    $(this).prev('label').text(file);
  });

  $('#cover-file-upload').change(function() {
    var i = $(this).prev('label').clone();
    var file = $('#cover-file-upload')[0].files[0].name;
    $(this).prev('label').text(file);
  });

</script>

@endsection
