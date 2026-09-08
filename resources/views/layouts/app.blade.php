<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'MyStore')</title>

  <link rel="stylesheet" href="{{ asset('css/main.css') }}">

  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}" />
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}" />
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}" />
  <link rel="mask-icon" href="{{ asset('safari-pinned-tab.svg') }}" color="#00b4b6" />

  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
</head>

<body>

  <div id="app">

    <nav id="navbar-main" class="navbar is-fixed-top">
      <div class="navbar-brand">
        <a class="navbar-item mobile-aside-button">
          <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
        </a>
      </div>
      <div class="navbar-brand is-right">
        <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
          <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
        </a>
      </div>
      <div class="navbar-menu" id="navbar-menu"></div>
    </nav>

    <aside class="aside is-placed-left is-expanded">
      <div class="aside-tools">
        <div>MyStore <b class="font-black">Admin</b></div>
      </div>
      <div class="menu is-menu-main">
        <p class="menu-label">Catalog</p>
        <ul class="menu-list">
          <li><a href="{{ route('products.index') }}"><span class="icon"><i class="mdi mdi-cube-outline"></i></span><span class="menu-item-label">Products</span></a></li>
          <li><a href="{{ route('categories.index') }}"><span class="icon"><i class="mdi mdi-table"></i></span><span class="menu-item-label">Categories</span></a></li>
          <li><a href="{{ route('colors.index') }}"><span class="icon"><i class="mdi mdi-palette"></i></span><span class="menu-item-label">Colors</span></a></li>
          <li><a href="{{ route('sizes.index') }}"><span class="icon"><i class="mdi mdi-ruler"></i></span><span class="menu-item-label">Sizes</span></a></li>
          <li><a href="{{ route('brands.index') }}"><span class="icon"><i class="mdi mdi-tag-outline"></i></span><span class="menu-item-label">Brands</span></a></li>
        </ul>
      </div>
    </aside>

    <section class="section main-section">

      @if (session('success'))
        <div class="notification is-success">{{ session('success') }}</div>
      @endif

      @if ($errors->any())
        <div class="notification is-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      @yield('content')

    </section>

    <footer class="footer">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
        <div>MyStore &copy; {{ date('Y') }}</div>
      </div>
    </footer>

  </div>

  <script type="text/javascript" src="{{ asset('js/main.min.js') }}"></script>

</body>

</html>