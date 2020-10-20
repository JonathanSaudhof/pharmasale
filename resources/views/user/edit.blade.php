@extends('layouts.app')


@section('content')
    {{-- {{ ddd($user) }} --}}
    <div class="container items-center justify-center">
        <div
            class="col-10 sticky flex justify-between items-center rounded mx-auto mb-6 px-6 py-3 shadow-sm bg-gray-50 border border-gray-500">
            <h1>👩🏻‍💻 Update User</h1>
            <a href="{{ route('user.index') }}"><button
                    class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded">
                    < Back</button></a>
        </div>
        <form class="m-auto flex flex-column shadow-sm col-10 p-6 bg-white rounded" method="POST"
            action="{{ route('user.update', $user->id) }}">
            @csrf
            @method("PUT")
            <label class="py-2 font-bold text-base">Username:</label>
            <input class="block border rounded py-2 px-3 mb-2" type="text" name="name" placeholder="Name"
                value="{{ $user->name }}" id="user-name" />
            <label class="py-2 font-bold text-base" for="user-mail">Email:</label>
            <input class="block border rounded py-2 px-3 mb-2" type="email" name="email" placeholder="Email"
                value="{{ $user->email }}" id="user-mail" />
            <label class="py-2 font-bold text-base" for="user-region">Region:</label>
            <select class="block border rounded py-2 px-3 mb-2 text-base" name="region" id="user-region">
                <option value="">Select the region</option>
                @foreach ($regions as $region)
                    <option value="{{ $region->id }}" {{ $user->region_id === $region->id ? 'selected' : '' }}>
                        {{ ucfirst($region->name) }}
                    </option>
                @endforeach
            </select>
            <label class="py-2 font-bold text-base" for="user-role">Role:</label>
            <select class="block border rounded py-2 px-3 mb-2 text-base" name="role" id="user-role">
                <option value="">Select the user role</option>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : ' ' }}>Admin</option>
                <option value="user" {{ $user->role === 'user' ? 'selected' : ' ' }}>User</option>
            </select>
            <div class="flex py-2">
                <button
                    class="bg-blue-500 hover:bg-blue-300 text-gray-800 font-bold text-white py-2 px-4 border border-gray-400 rounded mr-2"
                    type='submit'>Update</button>
                <a href="{{ route('user.index') }}"><button
                        class="bg-gray-100 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded">
                        Cancel</button> </a>
            </div>
        </form>
    </div>
@endsection
