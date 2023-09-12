@if (Auth::user()->rol_id != 1)
    <li class="nav-item">
        <a class="nav-link " href="{{ url('iniciar_ticket') }}">
            <i class="fas fa-fw fa-file "></i>
            Iniciar Ticket
        </a>
    </li>
@endif
