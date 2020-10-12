@extends('layouts.app')

@section('content')
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
              <h3 class="mb-0">Add a new service provider</h3>
            </div>
            <!-- Product -->
            <div class="body">
              <form method="post" action="{{ route('providers.store') }}" enctype="multipart/form-data">
                @csrf
                  <div class="form-group col-md-12">
                    <label for="file-upload" class="btn btn-success"><i class="nc-icon nc-cloud-upload-94 upload"></i>Upload ID</label>
                    <input id="file-upload" name='sp_id_img' type="file" style="display:none;" required>
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
                      <label for="sp_whatsapp_contact">Whatsapp Contact:</label>
                      <input type="text" class="form-control" name="sp_whatsapp_contact" id="sp_whatsapp_contact" required>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="sp_primary_contact">Primary Contact:</label>
                      <input type="text" class="form-control" name="sp_primary_contact" id="sp_primary_contact" required>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="sp_secondary_contact">Secondary Contact:</label>
                      <input type="text" class="form-control" name="sp_secondary_contact" id="sp_secondary_contact" required>
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

$('#file-upload').change(function() {
    var i = $(this).prev('label').clone();
    var file = $('#file-upload')[0].files[0].name;
    $(this).prev('label').text(file);
  });

</script>

@endsection
