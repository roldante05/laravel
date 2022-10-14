<?php

namespace App\Http\Controllers;

use App\Models\Paddlet;
use Illuminate\Http\Request;

/**
 * Class PaddletController
 * @package App\Http\Controllers
 */
class PaddletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paddlets = Paddlet::paginate();

        return view('paddlet.index', compact('paddlets'))
            ->with('i', (request()->input('page', 1) - 1) * $paddlets->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paddlet = new Paddlet();
        return view('paddlet.create', compact('paddlet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Paddlet::$rules);

        $paddlet = Paddlet::create($request->all());

        return redirect()->route('paddlets.index')
            ->with('success', 'Paddlet created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paddlet = Paddlet::find($id);

        return view('paddlet.show', compact('paddlet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paddlet = Paddlet::find($id);

        return view('paddlet.edit', compact('paddlet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Paddlet $paddlet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paddlet $paddlet)
    {
        request()->validate(Paddlet::$rules);

        $paddlet->update($request->all());

        return redirect()->route('paddlets.index')
            ->with('success', 'Paddlet updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $paddlet = Paddlet::find($id)->delete();

        return redirect()->route('paddlets.index')
            ->with('success', 'Paddlet deleted successfully');
    }
}
