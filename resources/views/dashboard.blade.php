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
  <div class="container-fluid mt--6 card-view">
    <div class="row">
        <div class="card card-stats mb-4 mb-xl-0 col-md-12 mcard">
            <div class="card-body row">
              <div class="col-10">
                  <h5 class="card-title text-uppercase text-muted mb-0">Orders Received</h5>
                  <span class="h2 font-weight-bold mb-0">12</span>
              </div>
              <div class="col-2">
                  <div class="icon icon-shape bg-purple text-white rounded-circle shadow">
                      <i class="fas fa-shopping-basket"></i>
                  </div>
              </div>
            </div>
        </div>
    </div>
  </div>

@endsection
