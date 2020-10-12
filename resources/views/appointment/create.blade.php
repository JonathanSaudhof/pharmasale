@extends('layouts.app')

@section('content')

<div class="container items-center justify-center">
  <div class="col-10 sticky flex justify-between items-center rounded mx-auto mb-6 px-6 py-3 shadow-sm bg-gray-50 border border-gray-500"><h1>🗓 Create new appointment</h1>
    <a href="{{route('appointment.index')}}"><button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded">< Back</button></a>
  </div>
  <form class="m-auto flex flex-column items-start shadow-sm col-10 p-6 bg-white rounded" method="POST" action="{{route('appointment.store')}}" id="form">
    @csrf
    <label class="py-2 font-bold text-base">Pharmacy</label>
    <select class="block border rounded py-2 px-3 mb-2 text-base" name="region" id="user-region">
      <option value="">Select the pharmacy</option>
      @foreach ($pharmacies as $pharmacy)
        <option value="{{$pharmacy->id}}" @if (isset($forPharmacyId)) {{$pharmacy->id==$forPharmacyId ? "selected": ""}} @endif>{{$pharmacy->id." | ".ucfirst($pharmacy->name)}}</option>
      @endforeach
    </select>
    <div class="time-container w-full flex justify-between">
      <div class="street-name-wrapper w-1/2 pr-2">
        <label class="py-2 font-bold text-base">Starts at:</label>
        <input class="w-full border rounded py-2 px-3 mb-2" type="datetime-local" name="starts_at" id="appointment-starts-at"/>
      </div>
      <div class="building-number-wrapperpl-2 w-1/2">
        <label class="py-2 font-bold text-base">Ends at:</label>
        <input class="w-full border rounded py-2 px-3 mb-2" type="datetime-local" name="ends_at" id="appointment-ends-at"/>
      </div>
    </div>
    <label class="py-2 font-bold text-base">Note</label>
    <textarea class="w-full border rounded py-2 px-3 mb-2" rows="5" name="note-body" id="appointment-ends-at" > </textarea>
   
  <div class="flex py-2">
    <button class="bg-blue-500 hover:bg-blue-300 text-gray-800 font-bold text-white py-2 px-4 border border-gray-400 rounded mr-2" type='submit'>Create</button>
    <a  href="{{route('appointment.index')}}"><button class="bg-gray-100 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded"> Cancel</button> </a>
  </div>
</form>
</div>
@endsection