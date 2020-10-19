@extends('layouts.app')


@section('content')
    <div class="container">

        <div
            class="col-10 flex justify-between items-center rounded mx-auto mb-6 px-6 py-3 shadow-sm bg-gray-100 border border-gray-500">
            <h1>🗓 appointment:</h1>
            <div class="button-container">
                <a href="{{ route('appointment.index') }}"><button
                        class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded">
                        < Back</button></a>
                <a href="{{ route('appointment.edit', $appointment->id) }}"><button
                        class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded">✏️</button></a>
                <button
                    class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded"
                    onclick="openClose('delete', '{{ $appointment->id }}')">🗑</button>
            </div>
        </div>
        <div class="col-10 flex-column mx-auto p-0 mb-5">
            <table
                class="w-full divide-x divide-gray-200 shadow-sm overflow-hidden border border-gray-500 sm:rounded-lg  mr-1">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-300 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                            colspan='2'>Appointment Details</th>
                    </tr>
                </thead>
                <tbody class=" border divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap w-1">
                            Starts at:
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap w-1 bg-white">
                            {{ ucfirst($appointment->starts_at) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap w-1">
                            <div>asdfasdfsdfasdf</div>
                            Ends at:
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap w-1 bg-white">
                            {{ ucfirst($appointment->ends_at) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap w-1">
                            Pharmacy:
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap w-1 bg-white">
                            {{ $appointment->Pharmacy->name }}
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap w-1 bg-gray-50">
                            Note
                        </td>
                        <td class="px-6 py-4 bg-white">
                            {!! $appointment->note_body !!}
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

        <table
            class="col-10 mx-auto divide-x divide-gray-200 shadow-sm overflow-hidden border border-gray-500 sm:rounded-lg">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-300 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                        colspan='2'>Pharmacy</th>
                </tr>
            </thead>
            <tbody class=" border divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 w-2">
                        Name:
                    </td>
                    <td class="px-6 py-4 bg-white">
                        {{ $appointment->pharmacy->name }}
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 w-1">
                        Adress:
                    </td>
                    <td class="px-6 py-4 w-1 bg-white">
                        {{ $appointment->pharmacy->adress_street . ' ' . $appointment->pharmacy->adress_building_number . ';' }}<br />
                        {{ $appointment->pharmacy->adress_zip_code . ' ' . $appointment->pharmacy->adress_city }}
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 w-1 bg-blue-200 ">
                        Contact Person:
                    </td>
                    <td class="px-6 py-4  bg-blue-100 {{ !$appointment->pharmacy->contact_name ? 'text-gray-300' : '' }}">
                        {{ $appointment->pharmacy->contact_name ? $appointment->pharmacy->contact_name : 'No contact person' }}
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 w-1 bg-blue-200 ">
                        Phone:
                    </td>
                    <td
                        class="px-6 py-4 w-1 bg-blue-100 {{ !$appointment->pharmacy->contact_phone ? 'text-gray-300' : '' }}">
                        {{ $appointment->pharmacy->contact_phone ? $appointment->pharmacy->contact_phone : 'No contact phone' }}
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 w-1 bg-blue-200 ">
                        Email:
                    </td>
                    <td
                        class="px-6 py-4 w-1 bg-blue-100 {{ !$appointment->pharmacy->contact_email ? 'text-gray-300' : '' }}">
                        {{ $appointment->pharmacy->contact_email ? $appointment->pharmacy->contact_email : 'No contact email' }}
                    </td>
                </tr>
            </tbody>
        </table>
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
                        <button class='hover:bg-red-700 hover:text-white text-black font-bold border py-2 px-4 rounded'
                            type="submit">Yes</button>
                    </form>
                    <button class='border hover:bg-blue-700 hover:text-white text-black font-bold py-2 px-4 rounded'
                        onclick="openClose('delete', '{{ $appointment->id }}');">No</button>
                </div>

            </div>
        @endsection
