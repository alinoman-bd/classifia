<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\PaymentInfo;
use App\UserBalance;
use App\UserInformation;

use App\MainCategory;
use App\SubCategory;
use App\InnerCategory;
use App\ThirdInner;

use App\Advertisement;
use App\OurPricing;


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
        return view('home');
    }


    // -------------------------------I M A G E S -------------------------

    public function imagesUpload()

    {
        return view('imagesUpload');
    }

    public function imagesUploadPost(Request $request)

    {
        request()->validate([

            'uploadFile' => 'required',

        ]);
        foreach ($request->file('uploadFile') as $key => $value) {

            $imageName = time(). $key . '.' . $value->getClientOriginalExtension();

            $value->move(public_path('images'), $imageName);

        }
        return response()->json(['success'=>'Images Uploaded Successfully.']);
    }


    public function userProfile($mentho = null)
    {
        if ($mentho) {
            $data['method'] = 1;
            if ($mentho == 'submit') {
                $data['s_msg'] = 'Added';
            }else{
                $data['s_msg'] = 'Updated';
            }
        } else {
            $data['method'] = 0;
        }
        $data['menu'] = 1;
        $data['posts'] = Advertisement::where('user_id', Auth::user()->_id)
        ->with('paymentInfo.package', 'paymentInfo.promot', 'paymentInfo.advert','images', 'coverImage')
        ->orderBy('created_at', 'desc')
        ->paginate(3);
        // dd($data['posts']);
        // ->paginate(3);
        $payments = PaymentInfo::where('user_id', Auth()->user()->_id)->get();
        // $data = $payments->map(function($payment){
        //  $promot_days = $payment->promot_days;
        //  $advert_days = $payment->advert_days;
        //  $diff  = $payment->created_at->diffInDays(Carbon::now());
        //  if ($promot_days - 3 <= $diff || $advert_days - 3 <= $diff) {
        //      return $payment;
        //  }
        // })->filter(function($data){
        //  if ($data != null) {
        //      return $data;
        //  }
        // });
        // dd($data);
        // $pay = PaymentInfo::where('user_id', Auth()->user()->_id)->get();
        // dd($pay);
        // dd($pay[0]->advert_days - $pay[0]->updated_at->diffInDays(now()));

        return view('frontend.user-profile.user-profile', $data);
    }

    public function settingUserProfile()
    {
        $data['menu'] = 4;
        return view('frontend.user-profile.profile-setting', $data);
    }

    public function userBalance(Request $request){
        $data['menu'] = 3;
        $data['balance'] = UserBalance::where('user_id', Auth::user()->_id)->first();
        return view('frontend.user-profile.user-balance', $data);
    }

    public function userInfo()
    {
        $data['menu'] = 2;
        $data['user_info'] = UserInformation::where('user_id', Auth::user()->id)->first();
        return view('frontend.user-profile.profile-info', $data);
    }
    
    public function ourPricing(){
        $data['menu'] = 5;


        $data['our_pricing'] = OurPricing::with('languages')->get();
        
        $data['description'] = $data['our_pricing']->map(function($description){
            if ($description->languages) {
                foreach ($description->languages as $value) {
                    if ($value->key == app()->getLocale()) {
                        $description->description = $value->value;
                        return $description;
                    }
                }
                return $description;
            }
            return $description;
        });
        // dd($data['description']);
        return view('frontend.user-profile.our-pricing', $data);
    }


    public function category($root = null) 
    {
        if ($root){
            if ($root == 'buy-sale') {
                $data['root'] = "buy / sale";
            }else{
                $data['root'] = $root;
            }
        }else{
            $data['root'] = $root;
        }
        $data['m_cat'] = MainCategory::orderBy('category_name','asc')->with('languages')->get();
        
        $data['main_categories'] = $data['m_cat']->map(function($m_category){
            if ($m_category->languages) {
                foreach ($m_category->languages as $value) {
                    if ($value->key == app()->getLocale()) {
                        $m_category->category_name = $value->value;
                        return $m_category;
                    }
                }
                return $m_category;
            }
            return $m_category;
        });

        $data['s_cat'] = SubCategory::with('languages')->get();
        $data['sub_categories'] = $data['s_cat']->map(function($s_category){
            if ($s_category->languages) {
                foreach ($s_category->languages as $value) {
                    if ($value->key == app()->getLocale()) {
                        $s_category->category_name = $value->value;
                        return $s_category;
                    }
                }
                return $s_category;
            }
            return $s_category;
        });

        $data['in_cat'] = InnerCategory::orderBy('category_name')->get()->sortBy('category_name', SORT_NATURAL|SORT_FLAG_CASE);

        $data['inner_categories'] = $data['in_cat']->map(function($in_category){
            if ($in_category->languages) {
                foreach ($in_category->languages as $value) {
                    if ($value->key == app()->getLocale()) {
                        $in_category->category_name = $value->value;
                        return $in_category;
                    }
                }
                return $in_category;
            }
            return $in_category;
        });
        $data['thd_in_cat'] = ThirdInner::orderBy('category_name')->get()->sortBy('category_name', SORT_NATURAL|SORT_FLAG_CASE);

        $data['third_inners'] = $data['thd_in_cat']->map(function($thd_in_category){
            if ($thd_in_category->languages) {
                foreach ($thd_in_category->languages as $value) {
                    if ($value->key == app()->getLocale()) {
                        $thd_in_category->category_name = $value->value;
                        return $thd_in_category;
                    }
                }
                return $thd_in_category;
            }
            return $thd_in_category;
        });
        return view('frontend.category.index', $data);
    }


}
