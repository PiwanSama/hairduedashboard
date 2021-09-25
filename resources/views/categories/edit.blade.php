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
              <h3 class="mb-0">Editing {{$category->name}}</h3>
            </div>
            <!-- category -->
            <div class="body">
              <form enctype="multipart/form-data" method="post" action="{{ route('category.update', $category->id) }}">
                @csrf
                @method('PUT')
                  <div class="form-group col-md-6">
                    <img src={{ asset('images/categoryimages/'.$category->image) }} alt = "Image"></img>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control form-control-alternative" name="name" value="{{ $category->name }}" >
                  </div>
                  <div class="form-group col-md-12">
                      <label for="service-provider-id">Parent Category:</label>
                      <select class="form-control" id="service-provider-id">
                        <option value="1">One</option>
                        <option value="2">Two</option>
                    </select>
                <!-- Card footer -->
                <div class="card-footer py-4">
                  <div class="footer">
                    <a class="btn btn-secondary" href="{{ route('category.index') }}">Cancel</a>
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
