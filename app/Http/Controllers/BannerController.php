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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
