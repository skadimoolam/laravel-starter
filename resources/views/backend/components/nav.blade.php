<nav class="navbar navbar-expand-md navbar-light border-bottom bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="{{ route('backend.dash') }}">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="icon ion-md-menu text-white"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" data-toggle="dropdown">Master <span class="caret"></span></a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('backend.customers.index') }}">Customers</a>
            <a class="dropdown-item" href="{{ route('backend.deliveryboys.index') }}">Deliveryboy</a>
            <a class="dropdown-item" href="{{ route('backend.suppliers.index') }}">Suppliers</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('backend.transactions.index') }}">Transactions</a>
            <a class="dropdown-item" href="{{ route('backend.deliveries.index') }}">Deliveries</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('backend.products.index') }}">Products</a>
            <a class="dropdown-item" href="{{ route('backend.districts.index') }}">Distircts</a>
            <a class="dropdown-item" href="{{ route('backend.areas.index') }}">Areas</a>
            <a class="dropdown-item" href="{{ route('backend.slides.index') }}">Slides</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('backend.settings.index') }}">Settings</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" data-toggle="dropdown">Reports <span class="caret"></span></a>
          <div class="dropdown-menu">
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" data-toggle="dropdown">Misc <span class="caret"></span></a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('backend.files.index') }}">Files</a>
            <a class="dropdown-item" href="{{ route('backend.logs.index') }}">General Logs</a>
            <a class="dropdown-item" href="{{ route('backend.reports.general.logs') }}">App Logs</a>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" data-toggle="dropdown">{{ Auth::user()->name }} <span class="caret"></span></a>
          <div class="dropdown-menu dropdown-menu-right text-center">
            <p class="dropdown-item mb-0 text-muted">Role : {{ Auth::user()->role }}</p>
            <p class="dropdown-item mb-0 text-muted">{{ Auth::user()->email }}</p>
            <a class="dropdown-item" href="{{ route('backend.logout') }}">Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
