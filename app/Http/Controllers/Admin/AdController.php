<?php

namespace App\Http\Controllers\Admin;

use App\Ad;
use App\Http\Controllers\Controller;

class AdController extends Controller
{
    /**
     * Display a list of Ads.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::getList();

        return view('admin.ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new Ad
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ads.add');
    }

    /**
     * Save new Ad
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Ad::validationRules());

        $ad = Ad::create($validatedData);

        return redirect()->route('admin.ads.index')->with([
            'type' => 'success',
            'message' => 'Ad added'
        ]);
    }

    /**
     * Show the form for editing the specified Ad
     *
     * @param \App\Ad $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        return view('admin.ads.edit', compact('ad'));
    }

    /**
     * Update the Ad
     *
     * @param \App\Ad $ad
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Ad $ad)
    {
        $validatedData = request()->validate(
            Ad::validationRules($ad->id)
        );

        $ad->update($validatedData);

        return redirect()->route('admin.ads.index')->with([
            'type' => 'success',
            'message' => 'Ad Updated'
        ]);
    }

    /**
     * Delete the Ad
     *
     * @param \App\Ad $ad
     * @return void
     */
    public function destroy(Ad $ad)
    {
        $ad->delete();

        return redirect()->route('admin.ads.index')->with([
            'type' => 'success',
            'message' => 'Ad deleted successfully'
        ]);
    }
}
