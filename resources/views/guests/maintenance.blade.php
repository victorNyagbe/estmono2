<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mairie de Golfe 1</title>
        <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css"
    rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/images/logo.jpeg') }}" rel="icon">
    <style>
        @font-face {
            font-family: lato;
            src: url("https://fonts.googleapis.com/css2?family=Lato&display=swap")
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: lato;
            font-weight: 900;
        }
        
        img {
            width: 30%;
        }

        .maintenance-text {
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="maintenance-text">
        <h4 class="mb-3 mb-md-5">Le site de la mairie du golfe1 est en maintenance...</h4>
        <img src="{{ asset('assets/images/gears.gif') }}" alt="">
    </div>
    
    <!-- MDB -->
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"
    ></script>
</body>
</html>