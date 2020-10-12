@extends('layouts.app')

@section('content')
<div class="container ">
  <div class="col-10 sticky flex justify-between items-center rounded mx-auto mb-6 px-6 py-3 shadow-sm bg-gray-50 border border-gray-500">
    <h1>💊 All pharmacies</h1>
    <a href="{{route('pharmacy.create')}}" >
     <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded"> + New Pharamacy</button>
    </a>
  </div>
  <table class="col-10 ml-auto mr-auto border-collapse shadow-sm overflow-hidden rounded border-gray-200 sm:rounded-lg divide-y divide-gray-200">
    <thead>
      <tr class="border">
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Id</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Employee</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Region</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">City</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Last Update</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Edit</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Delete</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200"> 
    @foreach ($pharmacies as $pharmacy)
      <tr class="border">
          <td class="px-6 py-4 whitespace-no-wrap">
            <a href="{{route('pharmacy.show', $pharmacy->id)}}">{{$pharmacy->id}}</a>
          </td>
          <td class="px-6 py-4">
            <a href="{{route('pharmacy.show', $pharmacy->id)}}">{{$pharmacy->name}}</a>
          </td>
          <td class="px-6 py-4 whitespace-no-wrap">
            {{$pharmacy->user ? $pharmacy->user['name'] : 'No user'}}
          </td>
          <td class="px-6 py-4 whitespace-no-wrap">
            {{$pharmacy->region ? $pharmacy->region->name : 'No region'}}
          </td>
          <td class="px-6 py-4 whitespace-no-wrap">
            {{$pharmacy->adress_city}}
          </td>
          <td class="px-6 py-4 whitespace-no-wrap">
            {{date('Y-m-d', strtotime($pharmacy->updated_at))}}
          </td>
          <td class="px-6 py-4 whitespace-no-wrap w-1">
            <a href="{{route('pharmacy.edit', $pharmacy->id)}}">✏️</a>
          </td>
          <td class="px-6 py-4 whitespace-no-wrap w-1">
            <button onclick="openClose('delete', '{{$pharmacy->id}}')" >🗑</button>
            <div class="hidden bg-gray-100 bg-opacity-75 fixed w-screen h-screen flex justify-center items-center inset-0" id="delete-{{$pharmacy->id}}">
              <div role="alert" class="shadow w-1/4">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                  Are you sure?
                </div>
                <div class="border flex justify-evenly border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700" >
                  <form method="POST" action="{{route('pharmacy.delete', $pharmacy->id)}}" >
                    @csrf
                    @method('DELETE')
                    <button class='hover:bg-red-700 hover:text-white text-black font-bold border py-2 px-4 rounded' type="submit">Yes</button>
                  </form>
                  <button class='border hover:bg-blue-700 hover:text-white text-black font-bold py-2 px-4 rounded' onclick="openClose('delete', '{{$pharmacy->id}}');">No</button>
              </div>
            </div>
          </td>
        </tr>
      
  @endforeach
</tbody>
  </table>
  
  
</div>
@endsection