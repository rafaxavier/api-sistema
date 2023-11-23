<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalonRequest as RequestsStoreSalonRequest;
use App\Models\Salon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsStoreSalonRequest $request)
    {
        try {
            DB::beginTransaction();

            $newSalon = Salon::create([
                'name' => $request->name,
                'description' => $request->description,
                'phone' => $request->phone,
                'street' => $request->street,
                'number' => $request->number,
                'district' => $request->district,
                'city' => $request->city,
                'state' => $request->state,
                'zip_code' => $request->zip_code
            ]);

            User::create([
                'name' => 'admin',
                'email' => $request->email,
                'password' => $request->password,
                'access_type' => $request->input('access_type', 'admin'),
                'salon_id' => $newSalon->id
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function show(Salon $salon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function edit(Salon $salon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, salon $salon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salon $salon)
    {
        //
    }
}
