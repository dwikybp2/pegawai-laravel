<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Laravel</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- DataTables -->
  <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

   {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}


  <style>
    body {
      padding-top: 60px;
    }
    footer {
      padding: 1rem;
      background: #f8f9fa;
      text-align: center;
      margin-top: 2rem;
    }

    .required::after {
      content: " *";
      color: red;
    } 
  </style>
</head>
<body class="d-flex flex-column min-vh-100">
  @include('layouts.header')

  <main class="flex-grow-1">
    <div class="container mt-4">
      @yield('content')
    </div>
  </main>

  <footer class="mt-auto">
    &copy; 2025 Dwiky. All rights reserved.
  </footer>

  @include('layouts.scripts')
</body>

</html>
