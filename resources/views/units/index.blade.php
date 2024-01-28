<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in! Administrador") }}
                </div>
            </div>
        </div>
    </div>

    

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Path</th>
                <th scope="col">is_active</th>
            </tr>
        </thead>
        <tbody>
            @if($unit->count() > 0)
                @foreach($unit as $rs)
                    <tr>
                        <td>{{ $rs->name }}</td>
                        <td>{{ $rs->path }}</td>
                        <td>{{ $rs->is_active }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">No data found</td>
                </tr>
            @endif
        </tbody>

    </table>
</x-app-layout>
