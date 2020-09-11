<?php

namespace App\Http\Controllers;

use App\Models\Support;
use App\Models\Supportcat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SupportController extends Controller
{
    private $cacheSeconds = 600;

    public function __construct() {
        $this->cacheSeconds = now()->addMinutes(1);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /* cache örneği
        $cats = Cache::remember('all-active-support-categories', $this->cacheSeconds, function () {
            return Supportcat::active()->get();
            //silmek için Cache::forget('key');
        });
        */
        $catId = 0;
        $catTitle = '';
        $supportCats = Supportcat::active()->get();
        $supports = Support::latest()->active()->paginate(9);
        return view('frontend.views.support',compact('supportCats','catId','catTitle','supports'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cat(Request $request)
    {
        $slug = $request->slug;
        $catId = 0;
        $catTitle = '';
        $supports = [];
        $supportCats = Supportcat::active()->get();
        foreach ($supportCats as $k => $v) {
            if($v->slug==$slug){
                $catId = $v->id;
                $catTitle = $v->title;
                $supports = $v->supports()
                            ->latest()
                            ->where('status',1)
                            ->paginate(10);
            }
        }

        return view('frontend.views.support',compact('supportCats','catId','catTitle','supports'));
    }

    /**
     * Display a searching of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $q = request('q');
        $supportCategories = Supportcat::active()->get();
        $supports = Support::where('status',true)
                        ->where('title', 'LIKE', "%{$q}%")
                        ->orWhere('slug', 'LIKE', "%{$q}%")
                        ->get();

        return view('frontend.views.support',compact('supportCategories','supports','q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function show(Support $support)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function edit(Support $support)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Support $support)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function destroy(Support $support)
    {
        //
    }
}
