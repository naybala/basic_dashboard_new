<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- csrf token need for using ajax post method --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Common Admin Dashbooard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

</head>

<body class="dark:bg-black">
    {{ $slot }}
</body>
@vite(['resources/js/common/validateDisapper.js', 'resources/js/common/sideActive.js', 'resources/js/common/navShowHide.js'])

</html>
