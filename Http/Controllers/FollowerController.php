<?php

namespace App\Http\Controllers;

use App\Follower;
use App\Nationality;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

class FollowerController extends Controller
{

    public function index()
    {
        if (!Auth::guard('client')->check()) {
            return redirect('cLogin');
        }
        $objects = Follower::where('user_id', Auth::guard('client')->user()->id)->get();
        return view('client.followers', compact('objects'));

    }

    public function showRegisterFollower()
    {
        $nationalitys = Nationality::all();

        //echo    $client_id = Auth::guard('client')->user()->name;
        return view('client.registerFollower')->with(['nationalitys' => $nationalitys]);
    } //
    public function registerActionFollower(Request $request)
    {
        if (!Auth::guard('client')->check()) {
            return redirect('cLogin');
        }
        $this->validate($request,
            [
                'name' => 'required|string|max:255',

                'relation' => 'required|string|max:255',

            ]);

        $client = User::find(Auth::guard('client')->user()->id);
        if ($client) {
            $Newclient = Follower::create([
                'name' => $request->name,

                'relation' => $request->relation,
                'user_id' => Auth::guard('client')->user()->id,
                'nationality' => $request->nationality,
                'birthdate' => Carbon::parse($request->birthdate)->format('Y-m-d'),

                'gender' => $request->gender,

            ]);
        }
        if ($Newclient) {

            $message = (app()->getLocale() == 'en') ? "successfully Added" : "تم إضافة تابع بنجاح";
            Session::flash('message', $message);

            return redirect()->back();
        } else {
            $error_message = (app()->getLocale() == 'en') ? "An error has occurred" : "حدث خطأ أثناء إضافة تابع. برجاء المحاولة مرة أخرى";
            Session::flash('error_message', $error_message);
            return redirect()->back();
            //  return redirect(session('link'));
        }

    }

    public function add($id = null)
    {
        if ($id) {
            $nationalitys = Nationality::all();
            $object = Follower::find($id);
            return view('views.client.follower-edit')->with(['nationalitys' => $nationalitys, 'object' => $object]);
        }
        // return view ('client.followerEdit');
    }
    public function update(request $request, $id)
    {
        $this->validate($request, [

            'name' => 'required|string|max:255',

            'relation' => 'required|string|max:255',

        ]);
        $follower = Follower::find($id);
        $follower->name = $request->name;
        $follower->relation = $request->relation;
        $follower->gender = $request->gender;
        $follower->user_id = Auth::guard('client')->user()->id;
        $follower->nationality = $request->nationality;
        $follower->birthdate = Carbon::parse($request->birthdate)->format('Y-m-d');

        $follower->update();
        $message = (app()->getLocale() == 'en') ? "successfully updated" : "تم تعديل تابع المراجع بنجاح";
        Session::flash("message", $message);
        return redirect('/clientDashboard');

    }

    public function destroy($id)
    {
        Follower::find($id)->delete();
        $message = (app()->getLocale() == 'en') ? "successfully deleted" : "تم الحذف بنجاح";
        Session::flash("message", $message);

        return redirect()->back();
    }
}
