<div>
    <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
        <span class="badge headerBadge1">
            @if (count(auth()->user()->unreadNotifications))
                {{ count(auth()->user()->unreadNotifications) }}
            @else
                0
            @endif
        </span>
    </a>
    <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
        <div class="dropdown-header">
         Notificación
            <div class="float-right">
                <a href="{{ route('markAsRead') }}">Marcar todo como leido</a>
            </div>
        </div>
        <div class="dropdown-list-content dropdown-list-icons">
            @foreach (auth()->user()->unreadNotifications as $notification)
            {{-- {{ $notification }} --}}
            <a href="#" class="dropdown-item dropdown-item-unread">
                @if($notification->type == "App\\Notifications\\ObraNotification")
                    <span class="dropdown-item-icon bg-success text-white"><i class="fas fa-check"></i></span>
                @endif
                {{-- <span class="dropdown-item-desc"> {{ $notification->data["title"] }} <span class="time">{{ $notification->created_at->diffForHumans() }}</span> --}}
                </span>
            </a>
            @endforeach
            <a href="#" class="dropdown-item dropdown-item-unread py-2 justify-center">
                <span class=""> Notificaciones Leídas
                </span>
            </a>
            @forelse (auth()->user()->readNotifications as $notification)
            <a href="#" class="dropdown-item dropdown-item-unread">
                @if($notification->type == "App\\Notifications\\ObraNotification")
                    <span class="dropdown-item-icon bg-success text-white"><i class="fas fa-check"></i></span>
                @endif
                {{-- <span class="dropdown-item-desc"> {{ $notification->data["title"] }} <span class="time">{{ $notification->created_at->diffForHumans() }}</span> --}}
                </span>
            </a>
            @empty
                <a href="#" class="dropdown-item">
                    <span class="dropdown-item-desc">Sin notificaciones leidas</span>

                    {{-- <span class="dropdown-item-desc"> <span class="message-user">Sarah
                    Smith</span> <span class="time messege-text">Request for leave
                    application</span>
                    <span class="time">5 Min Ago</span> --}}
                </span>
                </a>
            @endforelse
        </div>
        <div class="dropdown-footer text-center">
            <a href="#">Cerrar <i class="fas fa-chevron-up"></i></a>
        </div>
    </div>
</div>
