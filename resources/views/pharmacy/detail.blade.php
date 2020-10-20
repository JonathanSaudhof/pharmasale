@extends('layouts.app')


@section('content')
    <div class="container">

        <div
            class="col-10 flex justify-between items-center rounded mx-auto mb-6 px-6 py-3 shadow-sm bg-gray-100 border border-gray-500">
            <h1>💊 Pharmacy: <strong><u>{{ ucfirst($pharmacy->name) }}</u></strong></h1>
            <div class="button-container">
                <a href="{{ route('pharmacy.index') }}"><button
                        class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded">
                        < Back</button></a>
                <a href="{{ route('pharmacy.edit', $pharmacy->id) }}"><button
                        class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded">✏️</button></a>
                <button
                    class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded"
                    onclick="openClose('delete', '{{ $pharmacy->id }}')">🗑</button>
            </div>
        </div>
        <div class="col-10 flex mx-auto p-0 mb-5">
            <table
                class="w-1/2 divide-x divide-gray-200 shadow-sm overflow-hidden border border-gray-500 sm:rounded-lg  mr-1">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-300 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                            colspan='2'>Adress</th>
                    </tr>
                </thead>
                <tbody class=" border divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap w-1">
                            Region:
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap w-1 bg-white">

                            {{ ucfirst($region->name) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap w-1">
                            Employee:
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap w-1 bg-white">
                            {{ ucfirst($pharmacy->user->name) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap w-1">
                            Adress:
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap w-1 bg-white">
                            {{ $pharmacy->adress_street . ' ' . $pharmacy->adress_building_number }}
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap w-1 bg-gray-50">
                            Zip code, City:
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap w-1 bg-white">
                            {{ $pharmacy->adress_zip_code . ' ' . $pharmacy->adress_city }}
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="w-1/2 divide-x divide-gray-200 shadow-sm overflow-hidden border border-gray-500 sm:rounded-lg">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-300 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                            colspan='2'>Contact</th>
                    </tr>
                </thead>
                <tbody class=" border divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap w-1">
                            Name:
                        </td>
                        <td
                            class="px-6 py-4 whitespace-no-wrap w-1 bg-white {{ !$pharmacy->contact_name ? 'text-gray-300' : '' }}">
                            {{ $pharmacy->contact_name ? ucfirst($pharmacy->contact_name) : 'No contact name' }}
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap w-1">
                            Email:
                        </td>
                        <td
                            class="px-6 py-4 whitespace-no-wrap w-1 bg-white {{ !$pharmacy->contact_email ? 'text-gray-300' : '' }}">
                            {{ $pharmacy->contact_email ? $pharmacy->contact_email : 'No contact email' }}
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap w-1 bg-gray-50 ">
                            Phone:
                        </td>
                        <td
                            class="px-6 py-4 whitespace-no-wrap w-1 bg-white {{ !$pharmacy->contact_phone ? 'text-gray-300' : '' }}">
                            {{ $pharmacy->contact_phone ? $pharmacy->contact_phone : 'No contact phone' }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <table
            class="col-10 ml-auto mr-auto divide-y divide-gray-200 shadow-sm overflow-hidden border border-gray-500 sm:rounded-lg">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-300 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider"
                        colspan='4'>
                        appointments

                    </th>
                    <th
                        class="px-6 py-3 bg-gray-300 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider flex justify-end">
                        <a href="{{ route('appointment.create', $pharmacy->id) }}"><button
                                class="ml-auto bg-white hover:bg-gray-100 text-gray-800 font-semibold py-1 px-2 border border-gray-400 rounded">+
                                Add</button></a>
                    </th>
                </tr>
                <tr>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Id</th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        User</th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Note</th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Starts at</th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Ends at</th>
                </tr>
            </thead>
            <tbody class="bg-white border divide-y divide-gray-200">
                @if (!$pharmacy->appointments->isNotEmpty())
                    <tr class="border">
                        <td class="px-6 py-4 whitespace-no-wrap w-1 text-center bg-gray-50 text-gray-400" colspan="5">
                            No Appointments
                        </td>
                    </tr>
                @else
                    @foreach ($pharmacy->appointments as $appointment)
                        <tr class="border">
                            <td class="px-6 py-4 whitespace-no-wrap w-1 text-center">
                                <a href="{{ route('appointment.show', $appointment->id) }}">{{ $appointment->id }}</a>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <a
                                    href="{{ route('appointment.show', $appointment->id) }}">{{ $appointment->user->name }}</a>
                            </td>
                            <td class="px-6 py-4">
                                {!! $appointment->note_body !!}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                {{ ucfirst($appointment->starts_at) }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                {{ $appointment->ends_at }}
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="hidden bg-gray-100 bg-opacity-75 fixed w-screen h-screen flex justify-center items-center inset-0"
            id="delete-{{ $pharmacy->id }}">
            <div role="alert" class="shadow w-1/4">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    Are you sure?
                </div>
                <div
                    class="border flex justify-evenly border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    <form method="POST" action="{{ route('pharmacy.destroy', $pharmacy->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class='hover:bg-red-700 hover:text-white text-black font-bold border py-2 px-4 rounded'
                            type="submit">Yes</button>
                    </form>
                    <button class='border hover:bg-blue-700 hover:text-white text-black font-bold py-2 px-4 rounded'
                        onclick="openClose('delete', '{{ $pharmacy->id }}');">No</button>
                </div>

            </div>
        @endsection
