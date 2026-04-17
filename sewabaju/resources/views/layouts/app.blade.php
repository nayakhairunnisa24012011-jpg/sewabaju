<!DOCTYPE html>
<html>
<head>
    <title>Eventix Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>

<body class="bg-[#EFF8FF] text-[#192853]">

@include('partials.sidebar')

@yield('content')

</body>
</html>