<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Slide[]|Collection|Response
     */
    public function index()
    {
        return Slide::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $news = Slide::make($request->only(['header', 'content']));
        $news->image = '/storage/' . $request->file('image')->store('images/slide', 'public');
        $news->user_id = Auth::user()->id;
        $news->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return Slide
     */
    public function show(Slide $slide)
    {
        return $slide;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slide  $slide
     * @return Slide
     */
    public function update(Request $request, Slide $slide)
    {
        $slide->fill($request->only(['header', 'content']));

        if ($request->hasFile('image')) {
            // TODO: добавить удалдение фотоки
            $slide->image = '/storage/' . $request->file('image')->store('images/slide', 'public');
        }
        $slide->update();

        return $slide;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slide  $slide
     * @return Response
     */
    public function destroy(Slide $slide)
    {
        // TODO: добавить удалдение фотоки
        return $slide->delete();
    }

    public function destroyMultiple(Request $request)
    {
        // TODO: добавить удалдение фотоки
        return Slide::whereIn('id', $request->id)->delete();
    }
}
