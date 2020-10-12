@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card mb-4 shadow-sm">
                <div class="card-header">{{ __('Welcome') }}</div>
                  <div class="card-body">
                    Hello {{Auth::user()->name}}! Nice to see you again.
                  </div>
            </div>
              
            @if (Auth::user()->isAdmin())
            <div class="card button-container shadow-sm mb-4">
              <div class="card-header">Shortcuts</div>
              <div class="card-body">
                <a class="no-underline" href="{{route('user.create')}}" >
                  <button class="bg-gray-400 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 border border-gray-800 rounded shadow-sm"> + User</button>
                </a>

               <a class="no-underline"  href="{{route('region.create')}}" >
                <button class="bg-gray-400 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow-sm"> + Region</button>
               </a>
              </div>
            </div>
                
            <div class="card mb-4 shadow-sm">
              <div class="card-header">{{ __('Current Statistics') }}</div>
              <div class="card-body">
                 <p>Users: {{$data['userCount']}} </p>
                 <p>Regions: {{$data['regionCount']}} </p>
              </div>
            </div>
            
          
            @else
            <div class="card button-container shadow-sm mb-4">
              <div class="card-header">Shortcuts</div>
              <div class="card-body">
                <a class="no-underline" href="{{route('pharmacy.create')}}" >
                  <button class="bg-gray-400 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 border border-gray-800 rounded shadow-sm"> + Pharmacy</button>
                </a>

               <a class="no-underline"  href="{{route('appointment.create')}}" >
                <button class="bg-gray-400 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow-sm"> + Appointment</button>
               </a>
              </div>
            </div>
            {{-- Todays Appointments --}}
            <table class="col-12 ml-auto mr-auto shadow-sm overflow-hidden border-collapse border-gray-200 roundend sm:rounded-lg divide-y divide-gray-200 mb-4">

              <thead>
                <tr class="border">
                  <th class="px-6 py-3 bg-gray-300 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider" colspan="4">Today's appointments</th>
                </tr>
                <tr class="border">
                  <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Start</th>
                  <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">End</th>
                  <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Pharmacy</th>
                  <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Adress</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
              @if($data['todaysAppointments']->isEmpty())
                <tr class="border">
                  <td class="px-6 py-4 whitespace-no-wrap w-1 text-center bg-gray-50 text-gray-400" colspan="4">
                    No Appointments 
                  </td>
                </tr>
              @else
                @foreach ($data['todaysAppointments'] as $appointment)
                  <tr class="border">
                    <td class="px-6 py-4">
                      <a href="{{route('appointment.show', $appointment->id)}}">
                        {{date('Y-m-d | h:m', strtotime($appointment->starts_at))}}
                      </a>
                    </td>
                    <td class="px-6 py-4">
                      <a href="{{route('appointment.show', $appointment->id)}}">
                        {{date('Y-m-d | h:m', strtotime($appointment->ends_at))}}
                      </a>
                    </td>
                    <td class="px-6 py-4">
                      <a href="{{route('pharmacy.show', $appointment->pharmacy->id)}}">
                      {{$appointment->pharmacy->name}}</a>
                      </td>
                      <td class="px-6 py-4 ">
                        {{$appointment->pharmacy->adress_street.' '.$appointment->pharmacy->adress_building_number.';'}}<br /> {{ $appointment->pharmacy->adress_zip_code.' '.$appointment->pharmacy->adress_city}}
                      </td>   
                  </tr>
                    @endforeach
                  @endif
                </tbody>
            </table>

            <table class="col-12 ml-auto mr-auto shadow-sm overflow-hidden border-collapse border-gray-200 roundend sm:rounded-lg divide-y divide-gray-200 mb-4">

              <thead>
                <tr class="border">
                  <th class="px-6 py-3 bg-gray-300 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider" colspan="4">Next's appointments</th>
                </tr>
                <tr class="border">
                  <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Start</th>
                  <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">End</th>
                  <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Pharmacy</th>
                  <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Adress</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
              @if($data['nextAppointment']=== null)
                <tr class="border">
                  <td class="px-6 py-4 whitespace-no-wrap w-1 text-center bg-gray-50 text-gray-400" colspan="4">
                    No Appointments 
                  </td>
                </tr>
              @else
                  <tr class="border">
                    <td class="px-6 py-4">
                      <a href="{{route('appointment.show', $data['nextAppointment']->id)}}">
                        {{date('Y-m-d | h:m', strtotime($data['nextAppointment']->starts_at))}}
                      </a>
                    </td>
                    <td class="px-6 py-4">
                      <a href="{{route('appointment.show', $data['nextAppointment']->id)}}">
                        {{date('Y-m-d | h:m', strtotime($data['nextAppointment']->ends_at))}}
                      </a>
                    </td>
                    <td class="px-6 py-4">
                      <a href="{{route('pharmacy.show', $data['nextAppointment']->pharmacy->id)}}">
                      {{$data['nextAppointment']->pharmacy->name}}</a>
                      </td>
                      <td class="px-6 py-4 ">
                        {{$data['nextAppointment']->pharmacy->adress_street.' '.$data['nextAppointment']->pharmacy->adress_building_number.';'}}<br /> {{ $data['nextAppointment']->pharmacy->adress_zip_code.' '.$data['nextAppointment']->pharmacy->adress_city}}
                      </td>   
                  </tr>
                  @endif
                </tbody>
            </table>
            
            
       
        
            @endif
        
    </div>
</div>
@endsection
