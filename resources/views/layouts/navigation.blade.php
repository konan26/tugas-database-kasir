<nav class="bg-white border-b border-gray-200 p-4">
    <div class="max-w-7xl mx-auto flex justify-between">
        <div class="font-bold">Dashboard</div>
        <div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded text-white">
                    Logout
                </button>
            </form>

        </div>
    </div>
</nav>
