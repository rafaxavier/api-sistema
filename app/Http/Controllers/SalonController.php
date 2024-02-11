<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalonRequest as RequestsStoreSalonRequest;
use App\Models\Salon;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class SalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salons = Salon::all();
        return ['salons'=>$salons];
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

            $user = User::create([
                'name' => 'admin',
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'access_type' => $request->input('access_type', 'admin'),
                'salon_id' => $newSalon->id
            ]);

            DB::commit();

            event(new Registered($user));

            Auth::login($user);
            $user_logged = Auth::user();
            $token = $request->user()->createToken($user_logged->id .'_id_user', ['*'], Carbon::now()->addDays(1));

            return response()->json(['success' => true, 'message' => 'Usuário registrado com sucesso', 'user' => $user_logged, 'token' => $token->plainTextToken], 200);
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
    public function show($id)
    {
        try {
            $salon = Salon::find($id);
            
            if ($salon) {
                return ['salon' => $salon];
            } else {
                return response()->json(['success' => false, 'message' => 'Salão não existe'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
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
    public function destroy($id)
    {
        try {
            $salon = Salon::find($id);
            if ($salon) {
                $salon->delete();
                return response()->json(['success' => true, 'message' => 'Salão deletado com sucesso', 'salon' => $salon], 200);
            } else {
                return response()->json(['success' => false, 'message' => 'Salão não existe'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
