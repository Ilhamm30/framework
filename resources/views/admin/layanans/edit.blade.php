<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Layanan
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow rounded">
            <form method="POST" action="{{ route('admin.layanans.update', $layanan->id) }}">
                @csrf
                @method('PUT')
                @include('admin.layanans.form')
                <button type="submit" class="mt-4 bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
