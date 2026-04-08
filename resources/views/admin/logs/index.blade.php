<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Activity Logs</h1>
        <div class="flex space-x-4">
            <div class="bg-blue-100 text-blue-800 px-4 py-2 rounded">
                <div class="text-sm">Total Logs</div>
                <div class="text-xl font-bold">{{ $stats['total'] }}</div>
            </div>
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded">
                <div class="text-sm">Today</div>
                <div class="text-xl font-bold">{{ $stats['today'] }}</div>
            </div>
        </div>
    </div>

    <!-- Filter Form -->
    <div class="bg-white p-4 rounded shadow mb-6">
        <form action="{{ route('admin.logs.filter') }}" method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Action</label>
                <select name="action" class="w-full border rounded p-2">
                    <option value="all" {{ request('action') == 'all' || !request('action') ? 'selected' : '' }}>All Actions</option>
                    <option value="LOGIN" {{ request('action') == 'LOGIN' ? 'selected' : '' }}>Login</option>
                    <option value="LOGOUT" {{ request('action') == 'LOGOUT' ? 'selected' : '' }}>Logout</option>
                    <option value="CREATE" {{ request('action') == 'CREATE' ? 'selected' : '' }}>Create</option>
                    <option value="UPDATE" {{ request('action') == 'UPDATE' ? 'selected' : '' }}>Update</option>
                    <option value="DELETE" {{ request('action') == 'DELETE' ? 'selected' : '' }}>Delete</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Date From</label>
                <input type="date" name="date_from" value="{{ request('date_from') }}" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Date To</label>
                <input type="date" name="date_to" value="{{ request('date_to') }}" class="w-full border rounded p-2">
            </div>
            <div class="flex space-x-2 items-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 w-full">
                    Filter
                </button>
                <a href="{{ route('admin.logs.index') }}"
                   class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 whitespace-nowrap">
                    Clear
                </a>
            </div>
            <div class="flex items-end">
                @if(auth()->user()->canDeleteLogs())
                <form action="{{ route('admin.logs.clear') }}" method="POST"
                      onsubmit="return confirm('Hapus logs yang lebih dari 30 hari?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 w-full">
                        Clear Old Logs
                    </button>
                </form>
                @endif
            </div>
        </form>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full border-collapse">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="p-3 text-left">User</th>
                    <th class="p-3 text-left">Action</th>
                    <th class="p-3 text-left">Description</th>
                    <th class="p-3 text-left">IP Address</th>
                    <th class="p-3 text-left">Date</th>
                    <th class="p-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($logs as $log)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">
                        <div class="font-semibold">{{ $log->user->username ?? 'Unknown' }}</div>
                        <div class="text-sm text-gray-500">{{ $log->user->role ?? 'N/A' }}</div>
                    </td>
                    <td class="p-3">
                        <span class="px-2 py-1 rounded-full text-xs font-semibold
                            @if($log->action == 'CREATE') bg-green-100 text-green-800
                            @elseif($log->action == 'UPDATE') bg-blue-100 text-blue-800
                            @elseif($log->action == 'DELETE') bg-red-100 text-red-800
                            @elseif($log->action == 'LOGIN') bg-purple-100 text-purple-800
                            @elseif($log->action == 'LOGOUT') bg-gray-100 text-gray-800
                            @else bg-yellow-100 text-yellow-800 @endif">
                            {{ $log->action }}
                        </span>
                    </td>
                    <td class="p-3 text-sm">{{ Str::limit($log->description, 80) }}</td>
                    <td class="p-3 text-sm text-gray-500">{{ $log->ip_address }}</td>
                    <td class="p-3 text-sm text-gray-500">
                        {{ $log->created_at->format('M j, Y H:i') }}
                    </td>
                    <td class="p-3 text-center">
                        <a href="{{ route('admin.logs.show', $log->id) }}"
                            class="text-blue-600 hover:underline text-sm">
                            Details
                        </a>
                        @if(auth()->user()->canDeleteLogs())
                        <span class="text-gray-400 mx-2">|</span>
                        <form action="{{ route('admin.logs.destroy', $log->id) }}" method="POST"
                              class="inline" onsubmit="return confirm('Hapus log ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline text-sm">
                                Delete
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-4 text-center text-gray-500">No logs found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $logs->appends(request()->query())->links() }}
    </div>

    <!-- Quick Stats -->
    <div class="mt-6 grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-white p-4 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <i class="fas fa-history text-blue-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Total Logs</p>
                    <p class="text-xl font-bold">{{ $stats['total'] }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-2 bg-green-100 rounded-lg">
                    <i class="fas fa-calendar-day text-green-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Today</p>
                    <p class="text-xl font-bold">{{ $stats['today'] }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-2 bg-purple-100 rounded-lg">
                    <i class="fas fa-user-clock text-purple-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Active Users</p>
                    <p class="text-xl font-bold">{{ $stats['active_users'] ?? 0 }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-2 bg-orange-100 rounded-lg">
                    <i class="fas fa-filter text-orange-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Filtered</p>
                    <p class="text-xl font-bold">{{ $logs->count() }}</p>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
