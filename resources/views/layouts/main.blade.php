<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css')}}">


    <script type="module" src="{{asset ('js/index.js')}}" defer></script>

</head>

<body>
    @yield('content')
    <!-- <Flex direction={"row"} gap={"15px"}>
        <Link href={"https://github.com/ItaloRochaOliveira"}>
          <AiFillGithub size={"25px"}/>
        </Link>
        <Link href={"https://www.linkedin.com/in/italorochaoliveira/"}>
          <BsLinkedin size={"25px"}/>
        </Link>
        <Link href={"mailto:italo.rocha.de.oliveira@gmail.com"}>
          <SiGmail size={"25px"} /> 
        </Link>
      </Flex> -->
    <footer>
        <p>Italo Rocha Oliveira &copy; 2024</p>
    </footer>
</body>

</html>