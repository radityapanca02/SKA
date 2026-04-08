<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Log Details</h1>
        <a href="{{ route('admin.logs.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
            Back to Logs
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Basic Info -->
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold mb-4">Basic Information</h2>
            <div class="space-y-3">
                <div>
                    <label class="font-medium text-gray-700">User:</label>
                    <p>{{ $log->user->username }} ({{ $log->user->role }})</p>
                </div>
                <div>
                    <label class="font-medium text-gray-700">Action:</label>
                    <span class="px-2 py-1 rounded-full text-xs font-semibold
                        @if($log->action == 'CREATE') bg-green-100 text-green-800
                        @elseif($log->action == 'UPDATE') bg-blue-100 text-blue-800
                        @elseif($log->action == 'DELETE') bg-red-100 text-red-800
                        @elseif($log->action == 'LOGIN') bg-purple-100 text-purple-800
                        @elseif($log->action == 'LOGOUT') bg-gray-100 text-gray-800
                        @endif">
                        {{ $log->action }}
                    </span>
                </div>
                <div>
                    <label class="font-medium text-gray-700">Description:</label>
                    <p>{{ $log->description }}</p>
                </div>
                <div>
                    <label class="font-medium text-gray-700">Date & Time:</label>
                    <p>{{ $log->created_at->format('F j, Y \a\t H:i:s') }}</p>
                </div>
            </div>
        </div>

        <!-- Technical Info -->
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold mb-4">Technical Information</h2>
            <div class="space-y-3">
                <div>
                    <label class="font-medium text-gray-700">IP Address:</label>
                    <p>{{ $log->ip_address }}</p>
                </div>
                <div>
                    <label class="font-medium text-gray-700">User Agent:</label>
                    <p class="text-sm break-words">{{ $log->user_agent }}</p>
                </div>
                <div>
                    <label class="font-medium text-gray-700">Model:</label>
                    <p>{{ $log->model_type ? class_basename($log->model_type) : 'N/A' }}</p>
                </div>
                <div>
                    <label class="font-medium text-gray-700">Model ID:</label>
                    <p>{{ $log->model_id ?? 'N/A' }}</p>
                </div>
            </div>
        </div>

        <!-- Data Changes (for UPDATE actions) -->
        @if($log->action === 'UPDATE' && ($log->old_data || $log->new_data))
        <div class="bg-white p-6 rounded shadow lg:col-span-2">
            <h2 class="text-lg font-semibold mb-4">Data Changes</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="font-medium text-red-600 mb-2">Old Data</h3>
                    <pre class="bg-gray-100 p-4 rounded text-sm overflow-auto max-h-60">{{ json_encode(json_decode($log->old_data), JSON_PRETTY_PRINT) }}</pre>
                </div>
                <div>
                    <h3 class="font-medium text-green-600 mb-2">New Data</h3>
                    <pre class="bg-gray-100 p-4 rounded text-sm overflow-auto max-h-60">{{ json_encode(json_decode($log->new_data), JSON_PRETTY_PRINT) }}</pre>
                </div>
            </div>
        </div>
        @endif
    </div>
</x-admin-layout>
