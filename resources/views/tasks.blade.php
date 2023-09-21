<!DOCTYPE html>
<html>
<head>
    <title>Laravel Vue.js CRUD</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">

    <!-- Include Bootstrap JavaScript (Popper.js is required for some features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div id="app">
        <Header></Header> <!-- Include the Header component -->
        <router-view></router-view> <!-- Include the main content -->

    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
