<div class="flex flex-row justify-between p-6 mb-10 bg-gray-900">
    <div class="w-1/3 text-start">
        <span class="text-lg font-bold text-gray-100">
            @session('user_name')
                {{ session('user_name') }}
            @endsession
        </span>
    </div>

    <div class="w-1/3 text-center">
        <span class="text-lg font-bold text-gray-100">
            @yield('pageTitle')
        </span>
    </div>

    <div class="w-1/3 text-end">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-lg font-bold text-gray-100">Sair</button>
        </form>
    </div>
</div>