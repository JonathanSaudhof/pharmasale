@extends('layouts.app')

@section('content')
<div class="container">
  <table class="min-w-full divide-y divide-gray-200">
    <thead>
      <tr>
        <th>Id</th>
        <th>Pharmacy</th>
        <th>Start</th>
        <th>End</th>
        <th>Adress</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($appointments as $appointment)
      <tr>
          <td>
            <a href="{{route('appointment.show', $appointment->id)}}">{{$appointment->id}}</a>
          </td>
          <td>
            <a href="{{route('appointment.show', $appointment->id)}}">{{$appointment->pharmacy->name}}</a>
          </td>
          <td>
            <a href="{{route('appointment.show', $appointment->id)}}">{{date('Y-m-d | h:m', strtotime($appointment->starts_at))}}</a>
          </td>
          <td>
            <a href="{{route('appointment.show', $appointment->id)}}">{{date('Y-m-d | h:m', strtotime($appointment->ends_at))}}</a>
          </td>
          <td>
            <a href="{{route('appointment.show', $appointment->id)}}">{{$appointment->pharmacy->adress_street.' '.$appointment->pharmacy->adress_building_number.'; '.$appointment->pharmacy->adress_zip_code.' '.$appointment->pharmacy->adress_city}}</a>
          </td>
        </tr>
      
    </tbody>
  @endforeach
  </table>
  
  
</div>
@endsection