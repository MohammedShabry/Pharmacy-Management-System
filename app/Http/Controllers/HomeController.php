<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\addPrescription;
use Illuminate\Support\Facades\Storage;
use App\Models\AdImage;
use App\Models\drug;
use Illuminate\Http\Request;
use DB;
use App\Models\prescriptiondrugs;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_role = Auth::user()->user_role;
        if ($user_role == 'admin') {
            return Redirect('/adminPresDetails');
        } else {
            return Redirect('/myprofile');
        }
    }


    // User Functions
    public function myprofile(Request $request)
    {
        $id = Auth::user()->id;
        $user_role = Auth::user()->user_role;

        $profile = User::where("id", $id)->get();

        if (($user_role == 'customer')) {
            return view('myprofile', compact('profile'));
        }
    }

    public function prescriptionForm(Request $request)
    {
        return view('prescriptionForm');
    }

    public function addPrescription(Request $request)
    {

        $this->validate($request, [
            'note' => 'required',
            'delivery_time_slot' => 'required',
            'delivery_address' => 'required',
            'image' => 'required|max:5|min:1',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = $request->all();

        $img = $request->file('image');

        $save['note'] = $data['note'];
        $save['delivery_address'] = $data['delivery_address'];
        $save['delivery_time_slot'] = $data['delivery_time_slot'];
        $save['user_id'] = $data['id'];

        foreach ($img as $i => $image_one) {

            $imageName = time() . rand(10, 1000) . '.' . $image_one->getClientOriginalExtension();

            $destinationPath = Storage::disk('public')->putFileAs('photos', $image_one, $imageName);

            $save['img' . $i + 1] = $destinationPath;
        }

        addPrescription::create($save);

        return redirect()->back()->with("success", "Your Prescription Added successfully");
    }


    public function quatationDetails(Request $request)
    {
        $id = Auth::user()->id;

        $quatationData = DB::select("SELECT * FROM `prescription` WHERE user_id = $id");

        return view('quatationDetails', compact('quatationData'));
    }

    public function viewQuatation($id)
{
    $viewpresData = DB::select("SELECT * FROM `prescription`  
        INNER JOIN `prescriptiondrugs` ON prescription.id = prescriptiondrugs.prescription_id 
        INNER JOIN `drugs` ON prescriptiondrugs.drug_id = drugs.drug_id 
        WHERE prescription.id = ?", [$id]);

    // Debug to check the structure of viewpresData
    // dd($viewpresData);

    foreach ($viewpresData as $user) {
        $quoatation_status = $user->quoatation_status;
    }

    if ($quoatation_status == 'send' || $quoatation_status == 'accept' || $quoatation_status == 'reject') {
        return view('viewQuatation', compact('id', 'viewpresData'));
    }
}


public function acceptQuatation($id)
{
    $id = $id;

    $update['quoatation_status'] = 'accept';
    $updateQuatationstatus = addPrescription::where('id', $id)->update($update);

    return redirect()->back();
}

public function rejectQuatation($id)
{
    $id = $id;

    $update['quoatation_status'] = 'reject';
    $updateQuatationstatus = addPrescription::where('id', $id)->update($update);

    return redirect()->back();
}



    // Admin Function
    public function addQuantity()
    {
        return view('addQuantity');
    }

    // Delete a user
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }


    public function adminUsers()
{
    $users = User::all();
    return view('adminUsers', compact('users'));
}


    public function addDrugs(Request $request)
    {

        $this->validate($request, [
            'drug' => 'required',
            'unit_price' => 'required|numeric',
        ]);

        $data = $request->all();

        $save['drug'] = $data['drug'];
        $save['unit_price'] = $data['unit_price'];

        drug::create($save);

        return redirect()->back()->with("success", "Your Drug Added successfully");
    }


    public function adminPresDetails(Request $request)
    {
        $allPresDetails = DB::select('SELECT prescription.*, users.name,users.email FROM `prescription`  
            INNER JOIN  `users` ON prescription.user_id = users.id');
        return view('adminPresDetails', compact('allPresDetails'));
    }

    public function adminquatationForm($id)
{
    $id = $id;

    $drug = DB::select('SELECT * FROM `drugs`');

    $allPresDetails = DB::select("SELECT * FROM `prescriptiondrugs`  
        INNER JOIN `drugs` ON prescriptiondrugs.drug_id = drugs.drug_id WHERE prescriptiondrugs.prescription_id = ?", [$id]);

    $img = DB::select("SELECT quoatation_status, img1, img2, img3, img4, img5 FROM `prescription` WHERE prescription.id = ?", [$id]);

    foreach ($img[0] as $i => $image_one) {
        if (!empty($image_one)) {
            $image[$i] = Storage::url($image_one);
        } else {
            $image[$i] = '';
        }
    }

    return view('adminquatationForm', compact('id', 'drug', 'allPresDetails', 'image', 'img'));
}

    public function addquatation(Request $request)
    {

        $this->validate($request, [
            'drug' => 'required',
            'quantity' => 'required|numeric',
        ]);

        $data = $request->all();

        $save['prescription_id'] = $data['id'];
        $save['drug_id'] = $data['drug'];
        $save['quantity'] = $data['quantity'];

        prescriptiondrugs::create($save);

        return redirect()->back();
    }

    public function sendQuatation($id)
{
    $id = $id;

    $update['quoatation_status'] = 'send';

    $updateQuatationstatus = addPrescription::where('id', $id)->update($update);

    return back()->with("success", "Quatation send successfully");
}

}