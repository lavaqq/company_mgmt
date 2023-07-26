<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 500;
            src: url({{ storage_path('fonts/Poppins-Medium.ttf') }}) format('truetype');
        }

        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 600;
            src: url({{ storage_path('fonts/Poppins-SemiBold.ttf') }}) format('truetype');
        }

        .h1 {
            font-family: 'Poppins';
        }
    </style>
</head>

<body>
    <h1 class="h1">Lorem ipsum dolor sit amet.</h1>
</body>

</html>
