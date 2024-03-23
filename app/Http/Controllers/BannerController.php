<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banners;

use Illuminate\Support\Str;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $banners;
    public function __construct()
    {   
        $this->banners = new Banners();
    }   

    public function index()
    {
        $banners = $this->banners->getAllBanners();
        return view('admin.banner', ['banners' => $banners, 'UI'=> 'banners']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imageName = Str::uuid().'.'.$request->image->extension();
        $image = $request->file('image')->move('banner_images', $imageName); // move the image to the banner_images folder in the public folder
        $data = $request->all();
        $data['image'] = $imageName;
        $this->banners->addBanner($data);
        return redirect()->route('banners.index')->with('success', 'Banner created successfully.');
    }

    public function edit(string $id)
    {
        $banner = $this->banners::findOrFail($id);
        return view('admin.bannerEdit', compact('banner'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->only([
            'name', 'status'
        ]);
        if ($request->hasFile('image')) {
            $imageName = Str::uuid().'.'.$request->image->extension();
            $request->file('image')->move('banner_images', $imageName);
            $data['image'] = $imageName;
        }
        $banner = $this->banners::findOrFail($id);
        $banner->update($data);
        return redirect()->route('banners.index')->with('success', 'banner updated successfully.');
    }

    public function destroy(string $id)
    {
        Banners::destroy($id);
        return redirect()->route('banners.index')->with('success', 'Banner deleted successfully.');
    }
}
