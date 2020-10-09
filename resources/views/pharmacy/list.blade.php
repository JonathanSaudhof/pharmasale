@extends('layouts.app')

@section('content')
<div class="container shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
  <table class="min-w-full divide-y divide-gray-200">
    <thead>
      <tr>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Id</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Employee</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Region</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">City</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Last Update</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200"> 
    @foreach ($pharmacies as $pharmacy)
      <tr>
          <td class="px-6 py-4 whitespace-no-wrap">
            <a href="{{route('pharmacy.show', $pharmacy->id)}}">{{$pharmacy->id}}</a>
          </td>
          <td class="px-6 py-4 whitespace-no-wrap">
            <a href="{{route('pharmacy.show', $pharmacy->id)}}">{{$pharmacy->name}}</a>
          </td>
          <td class="px-6 py-4 whitespace-no-wrap">
            {{$pharmacy->user->name}}
          </td>
          <td class="px-6 py-4 whitespace-no-wrap">
            {{$pharmacy->region->name}}
          </td>
          <td class="px-6 py-4 whitespace-no-wrap">
            {{$pharmacy->adress_city}}
          </td>
          <td class="px-6 py-4 whitespace-no-wrap">
            {{date('Y-m-d', strtotime($pharmacy->updated_at))}}
          </td>

        </tr>
      
    </tbody>
  @endforeach
  </table>
  
  
</div>
@endsection