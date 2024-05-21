@if (!empty(session('response')))
    @if (session('response')[0] === 200)
        <div class="absolute bottom-32 right-5 bg-green-100 border-l-4 border-green-500 text-green-700 px-6 py-4" role="alert" id="error" hidden>
            <p class="text-lg">
                {{ session('response')[1] }}
            </p>
        </div>
    @else
        <div class="absolute bottom-32 right-5 bg-red-100 border-l-4 border-red-500 text-red-700 px-6 py-4" role="alert" id="error" hidden>
            <p class="text-lg">
                {{ session('response')[1] }}
            </p>
        </div>
    @endif
@endif