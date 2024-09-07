<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0"/>
        <title>@yield('title')</title>
        
        @include('back.partials.styles')
        
    </head>

    <body>
    
    <div class="main-wrapper">
        
        @include('back.partials.header')
        @include('back.partials.sidebar')

    
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    @yield('dashboard-header')
                </div>
                @yield('dashboard-content')
            </div>
        </div>

    </div>
        @include('back.partials.script')

        @if(session()->get('error'))
            <script>
                iziToast.error({
                    title: 'Erreur',
                    message: '{{ session()->get('error') }}',
                    position: 'topRight'
                });
            </script>
        @endif

        @if(session()->get('success'))
            <script>
                iziToast.success({
                    title: 'Succès',
                    message: '{{ session()->get('success') }}',
                    position: 'topRight'
                });
            </script>
        @endif


    </body>
</html>
