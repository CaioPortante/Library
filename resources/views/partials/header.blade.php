<div class="flex flex-row justify-between p-6 mb-10 bg-gray-900">
    <span class="text-lg font-bold text-gray-100">
        @session('user_name')
            {{ session('user_name') }}
        @endsession
    </span>

    <span class="text-lg font-bold text-gray-100">
       @yield('pageTitle')
    </span>
    
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="text-lg font-bold text-gray-100">Sair</button>
    </form>
</div>