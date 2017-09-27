@if($currentLanguage == "ru")
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:100,100i,300,300i,400,400i,500,500i&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Mono|Roboto:100,300,400,500,700&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
@else
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:100,200,300,400,500,600,700,900|Work+Sans:100,200,300,400,500,600,700,800,900&amp;subset=latin-ext" rel="stylesheet">
@endif
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<link rel="stylesheet" href="{{ asset('vendor-bundle.min.css') }}">
<link rel="stylesheet" href="{{ asset($currentLanguage == 'ru' ? 'lang-ru.css' : 'default.css') }}">