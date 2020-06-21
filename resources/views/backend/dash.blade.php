@extends('_layouts.backend')
@section('title', 'Dashboard')
@section('content')

  <div class="container-fluid mt-3">
    <div class="mb-4">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <form action="{{ route('backend.dash.search') }}">
            <div class="input-group w-100">
              <input class="form-control" name="q" placeholder="Find" type="search" required>
              <select class="form-control w-50" name="model">
                <option value="customers" selected>Customers</option>
                <option value="deliveryboys">Deliveryboys</option>
                <option value="suppliers">Suppliers</option>
                <option value="products">Products</option>
                <option value="transactions">Transactions</option>
                <option value="deliveries">Deliveries</option>
                <option value="settings">Settings</option>
                <option value="slides">Slides</option>
                <option value="districts">Districts</option>
                <option value="areas">Areas</option>
                <option value="logs">General Logs</option>
                <option value="files">Files</option>
              </select>
              <input class="input-group-append btn btn-primary" type="submit" value="Search">
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-6 col-sm-4 col-md-3 col-lg-2 mt-3">
        <h5><a class="text-muted" href="{{ route('backend.customers.index') }}">All Customers</a></h5>
        <h5><b>{{ $data['countCustomers']->total }}</b></h5>
      </div>

      <div class="col-6 col-sm-4 col-md-3 col-lg-2 mt-3">
        <h5><a class="text-muted" href="{{ route('backend.customers.index', ['q' => 'active']) }}">Active Customers</a></h5>
        <h5><b>{{ $data['countCustomers']->active }}</b></h5>
      </div>

      <div class="col-6 col-sm-4 col-md-3 col-lg-2 mt-3">
        <h5><a class="text-muted" href="{{ route('backend.customers.index', ['q' => 'inactive']) }}">Inactive Customers</a></h5>
        <h5><b>{{ $data['countCustomers']->inactive }}</b></h5>
      </div>

      <div class="col-6 col-sm-4 col-md-3 col-lg-2 mt-3">
        <h5><a class="text-muted" href="{{ route('backend.customers.index', ['q' => 'lead']) }}">Leads</a></h5>
        <h5><b>{{ $data['countCustomers']->lead }}</b></h5>
      </div>

      <div class="col-6 col-sm-4 col-md-3 col-lg-2 mt-3">
        <h5><a class="text-muted" href="{{ route('backend.deliveryboys.index') }}">Deliveryboys</a></h5>
        <h5><b>{{ $data['countDeliveryboys'] }}</b></h5>
      </div>

      <div class="col-6 col-sm-4 col-md-3 col-lg-2 mt-3">
        <h5><a class="text-muted" href="{{ route('backend.suppliers.index') }}">Suppliers</a></h5>
        <h5><b>{{ $data['countSuppliers'] }}</b></h5>
      </div>
    </div>

    <div class="row">
      <div class="col-6 col-sm-4 col-md-3 col-lg-2 mt-3">
        <h5><a class="text-muted" href="{{ route('backend.deliveries.index') }}">Deliveries <small>(Today)</small></a></h5>
        <h5><b>{{ $data['countDeliveriesToday'] }}</b></h5>
      </div>

      <div class="col-6 col-sm-4 col-md-3 col-lg-2 mt-3">
        <h5><a class="text-muted" href="{{ route('backend.deliveries.index') }}">Deliveries <small>(Yest.)</small></a></h5>
        <h5><b>{{ $data['countDeliveriesYesterday'] }}</b></h5>
      </div>

      <div class="col-6 col-sm-4 col-md-3 col-lg-2 mt-3">
        <h5>SMS Balance</h5>
        <a href="{{ route('backend.dash.smsbalance') }}" class="btn btn-sm btn-primary">Check</a>
      </div>
    </div>
    <hr>

    <h4 class="mt-5">New Customers <small>({{ $data['leads']->count() }})</small></h4>
    <div class="table-responsive mt-3">
      <table class="table table-sm table-bordered table-fullwidth table-hover">
        <thead><tr><th>Name</th><th>Phone</th></th><th>Area</th><th>Address</th><th>Actions</th></tr></thead>
        <tbody>
          @forelse($data['leads'] as $item)
            <tr>
              <td><a href="{{ route('backend.customers.show', $item) }}">{{ $item->name }}</a></td>
              <td><a href="tel:{{ $item->phone }}">{{ $item->phone }}</a></td>
              <td>{{ $item->area->name }}, {{ $item->district->name }}</td>
              <td>{{ $item->address }}</td>
              <td>
                <a title="Assign Deliveryboy" class="btn btn-primary btn-sm" href="{{ route('backend.customers.index', ['assign' => $item->id]) }}"><i class="ion-md-person-add"></i></a>
                <a title="Edit" class="btn btn-info btn-sm" href="{{ route('backend.customers.index', ['edit' => $item->id]) }}"><i class="ion-md-create"></i></a>
              </td>
            </tr>
          @empty
            <tr><td colspan="100%"><h5 class="my-5 text-center">No Data</h5></td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  @include('backend.components.message')
@endsection
