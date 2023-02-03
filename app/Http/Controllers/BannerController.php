<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public function allBanner(){
        $data = [
            'title' => 'All Banners | Urban Adventure',
            'banners'=>Banner::latest()->filter(request(['search']))->paginate(10)->withQueryString()
        ];
        return view('dashboard.admin.banners.banner-all',$data);
    }
    public function createBanner(){
        $data = [
            'title' => 'Create Banner | Urban Adventure',
        ];
        return view('dashboard.admin.banners.banner-add',$data);
    }

    public function detailBanner(Banner $banner){
        $data = [
            'title' => 'All Banners | Urban Adventure',
            'banner'=>$banner,
        ];
        return view('dashboard.admin.banners.banner-detail', $data);
    }
    public function storeBanner(Request $request){
        $validator=Validator::make($request->all(), [
            'title' => 'required|string',
        ]);

        if ($validator->failed()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Input error!');
        }

        $banner_created = Banner::create($validator->validate());
        if ($banner_created) {
            return redirect()->route('manage_banner.all')->with('success', 'New Banner successfully created');
        }
        return redirect()->back()->with('error', 'Something Error! <br> Try Again!');

    }

    public function deleteBanner(Banner $banner){
        if ($banner->delete()) {
            return redirect()->route('manage_banner.all')->with('success', $banner->title. "successfully deleted");
        }
        return redirect()->back()->with('error', $banner->title. "delete failed");

    }
}