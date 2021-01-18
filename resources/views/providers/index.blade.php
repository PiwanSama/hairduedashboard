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
              <h3 class="mb-0">BeautyGo Registered Service Providers</h3>
            </div>
            <!-- Product -->
            <div class="card-body">
            <!-- Light table -->
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <tr>
                          <th scope="col">{{ __('Image') }}</th>
                          <th scope="col">{{ __('Name') }}</th>
                          <th scope="col">{{ __('Address') }}</th>
                          <th scope="col">{{__('Whatsapp Contact')}}</th>
                          <th scope="col">{{__('Primary Contact')}}</th>
                          <th scope="col">Actions</th>
                      </tr>
                    </tr>
                  </thead>
                  <tbody class="list">
                      @foreach ($providers as $provider)
                      <tr>
                          <td class="table-img rounded-circle mr-3">
                            <img src={{ asset('images/spimages/'.$provider->sp_id_img) }} alt = "Image"></img>
                          </td>
                          <td>{{ $provider->service_provider_name }}</td>
                          <td>{{ $provider->sp_address }}</td>
                          <td>{{ $provider->sp_whatsapp_contact }}</td>
                          <td>{{ $provider->sp_primary_contact }}</td>
                          <td class="text-right">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <form action="{{ route('providers.destroy', $provider->service_provider_id) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <a class="dropdown-item" href="{{ route('providers.edit', $provider->service_provider_id) }}">{{ __('Edit') }}</a>
                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this service provider?") }}') ? this.parentElement.submit() : ''">
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

<script src="{{ asset('js/jquery.min.js') }}"></script>

<script type="text/javascript">

$('#file-upload').change(function() {
    var i = $(this).prev('label').clone();
    var file = $('#file-upload')[0].files[0].name;
    $(this).prev('label').text(file);
  });

</script>

@endsection