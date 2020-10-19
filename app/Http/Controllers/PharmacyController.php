<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Phar;
use PhpParser\Node\Expr\New_;
use Symfony\Contracts\Service\Attribute\Required;

class PharmacyController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        
        return view('pharmacy.index', ['pharmacies'=> Pharmacy::allMyPharmacies($user)]);
    }

    public function show(Pharmacy $pharmacy)
    {
        return view('pharmacy.detail', [
        'pharmacy'=> $pharmacy,
        'appointments' => $pharmacy->appointments,
        'region'=> $pharmacy->region
      ]);
    }

    public function edit(Pharmacy $pharmacy)
    {
        return view('pharmacy.edit', ['pharmacy' => $pharmacy]);
    }

    public function update(Request $request, Pharmacy $pharmacy)
    {
        return view('pharmacy.show', $pharmacy->update($this->validation($request)));
    }

    public function create()
    {
        return view('pharmacy.create');
    }

    public function store(Request $request)
    {
        return redirect(route('pharmacy.show', Pharmacy::create($this->validation($request))));
    }

    public function delete(Pharmacy $pharmacy)
    {
        // TODO: change to accept arrays to allow mutliple deletes at once
        $pharmacy->delete();
        return view(route('pharmacy.index'));
    }

    private function validation(Request $request)
    {
        return $request->validate([
        "name"=> "required",
        "adress_street" => "reuqired",
        "adress_building_number"=> "reuqired",
        "adress_zip_code"=> "reuqired","adress_city"=> "reuqired",
      ]);
    }
}
