@extends('layouts.app')


@section('content')
    <div class="container">
        <div
            class="col-10 sticky flex justify-between items-center rounded mx-auto mb-6 px-6 py-3 shadow-sm bg-gray-50 border border-gray-500">
            <h1>🗓 All appointments</h1>
            <a href="{{ route('appointment.create') }}">
                <button
                    class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border  border-gray-400 rounded">
                    + New Appointment</button>
            </a>
        </div>
        <table
            class="col-10 ml-auto mr-auto shadow-sm overflow-hidden border-collapse border-gray-200 roundend sm:rounded-lg divide-y divide-gray-200">

            <thead>
                <tr class="border">
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider w-3">
                        Start</th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider w-3">
                        End</th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Pharmacy</th>
                    @if (Auth::user()->isAdmin())
                        <th
                            class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Employee</th>
                    @endif
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider w-3">
                        Adress</th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider w-1">
                        Edit</th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider w-1">
                        Delete</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($appointments as $appointment)
                    <tr class="border">
                        <td class="px-6 py-4 w-3">
                            <a href="{{ route('appointment.show', $appointment->id) }}">
                                {{ date('Y-m-d | h:m', strtotime($appointment->starts_at)) }}
                            </a>
                        </td>
                        <td class="px-6 py-4  w-3">
                            <a href="{{ route('appointment.show', $appointment->id) }}">
                                {{ date('Y-m-d | h:m', strtotime($appointment->ends_at)) }}
                            </a>
                        </td>

                        <td class="px-6 py-4 w-5">
                            <a href="{{ route('pharmacy.show', $appointment->pharmacy->id) }}">
                                {{ $appointment->pharmacy->name }}</a>
                        </td>
                        @if (Auth::user()->isAdmin())
                            <td class="px-6 py-4  w-3">
                                <a href="{{ route('user.show', $appointment->user->id) }}">
                                    {{ $appointment->user->name }}
                                </a>
                            </td>
                        @endif

                        <td class="px-6 py-4 ">
                            {{ $appointment->pharmacy->adress_street . ' ' . $appointment->pharmacy->adress_building_number . ';' }}<br />
                            {{ $appointment->pharmacy->adress_zip_code . ' ' . $appointment->pharmacy->adress_city }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap w-1">
                            <a href="{{ route('appointment.edit', $appointment->id) }}">✏️</a>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap w-1">
                            <button onclick="openClose('delete', '{{ $appointment->id }}')">🗑</button>
                            <div class="hidden bg-gray-100 bg-opacity-75 fixed w-screen h-screen flex justify-center items-center inset-0"
                                id="delete-{{ $appointment->id }}">
                                <div role="alert" class="shadow w-1/4">
                                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                        Are you sure?
                                    </div>
                                    <div
                                        class="border flex justify-evenly border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                                        <form method="POST" action="{{ route('appointment.destroy', $appointment->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class='hover:bg-red-700 hover:text-white text-black font-bold border py-2 px-4 rounded'
                                                type="submit">Yes</button>
                                        </form>
                                        <button
                                            class='border hover:bg-blue-700 hover:text-white text-black font-bold py-2 px-4 rounded'
                                            onclick="openClose('delete', '{{ $appointment->id }}');">No</button>
                                    </div>
                                </div>
                        </td>
                        </a>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
@endsection
