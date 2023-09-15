<div class="preloader flex-column justify-content-center align-items-center">

    @if (Auth::user()->rol_id != 1)

        @if (Auth::user()->cliente->imagen == 'cliente.png')
            <img src="{{ asset('img/cliente.png') }}"
                class="{{ config('adminlte.preloader.img.effect', 'animation__shake') }}"
                alt="{{ config('adminlte.preloader.img.alt', 'AdminLTE Preloader Image') }}"
                width="{{ config('adminlte.preloader.img.width', 60) }}"
                height="{{ config('adminlte.preloader.img.height', 60) }}">
        @else
            <img src="{{ asset('storage/img/clientes/' . Auth::user()->cliente->imagen) }}"
                class="{{ config('adminlte.preloader.img.effect', 'animation__shake') }}"
                alt="{{ config('adminlte.preloader.img.alt', 'AdminLTE Preloader Image') }}"
                width="{{ config('adminlte.preloader.img.width', 60) }}"
                height="{{ config('adminlte.preloader.img.height', 60) }}">
        @endif
    @else
        <img src="{{ asset(config('adminlte.preloader.img.path', 'vendor/adminlte/dist/img/AdminLTELogo.png')) }}"
            class="{{ config('adminlte.preloader.img.effect', 'animation__shake') }}"
            alt="{{ config('adminlte.preloader.img.alt', 'AdminLTE Preloader Image') }}"
            width="{{ config('adminlte.preloader.img.width', 60) }}"
            height="{{ config('adminlte.preloader.img.height', 60) }}">
    @endif
</div>
