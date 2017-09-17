<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParkingLocation;

class HomeController extends Controller
{

    protected $parking;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ParkingLocation $parking)
    {
        $this->parking = $parking;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  $this->parking->all();
        return view('home', [ 'parking' => $data ]);
    }

    public function add_parking()
    {
        return view('user.parking.create');
    }

    public function store_parking(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users',
            'latittude' => 'required',
            'longitude' => 'required',
            'location' => 'required',
            'cost' => 'required',
            'levels' => 'required',
            'cover_image' => 'image:jpeg,png',
        ]);

       try{

        $data = $request->all();

        if ($request->hasFile('cover_image')) {

            $data['cover_image'] = Helper::upload_picture($request->cover_image);
        }

        $this->parking->create($data);

        return redirect()->route('home')->with('alerts', [
            'type' => 'success',
            'message' => 'Parking Added Sucessfully!'
        ]);

       } catch(\Exception $e){
         echo $e->getMessage();
       }
       
    }

    public function profile()
    {
        $user = user();
        return view('user.profile', [ 'user' => $user]);
    }

    
}
