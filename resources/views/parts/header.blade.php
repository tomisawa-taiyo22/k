<header class="bg-blue-900 py-6">
    <div class="container mx-auto flex justify-between items-center px-6">
        <div>
            <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                {{ ('Kanban-Board') }}
            </a>
        </div>
        <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
            @guest
                <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                @if (Route::has('register'))
                    <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('ユーザ登録') }}</a>
                @endif
            @else
                <span>{{ Auth::user()->name }}</span>

                <a href="{{ route('logout') }}"
                class="no-underline hover:underline"
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">{{ __('ログアウト') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    {{ csrf_field() }}
                </form>
            @endguest
        </nav>
    </div>
</header>