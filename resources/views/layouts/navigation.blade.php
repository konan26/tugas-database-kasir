<nav class="bg-white border-b border-gray-200 p-4">
    <div class="max-w-7xl mx-auto flex justify-between">
        <div class="font-bold">Dashboard</div>
        <div>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="text-red-600">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </div>
</nav>
