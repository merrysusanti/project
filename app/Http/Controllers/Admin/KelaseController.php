<?php

namespace App\Http\Controllers\Admin;

use App\Kelase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKelaseRequest;
use App\Http\Requests\StoreKelaseRequest;
use App\Http\Requests\UpdateKelaseRequest;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class KelaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('kelase_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kelases = Kelase::all();

        return view('admin.kelases.index', compact('kelases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('kelase_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kelases.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreKelaseRequest $request)
    {
        $kelase = Kelase::create($request->all());

        return redirect()->route('admin.kelases.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Kelase  $kelase
     * @return \Illuminate\Http\Response
     */
    public function show(Kelase $kelase)
    {
        abort_if(Gate::denies('kelase_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kelases.show', compact('kelase'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelase  $kelase
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelase $kelase)
    {
        abort_if(Gate::denies('kelase_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kelases.edit', compact('kelase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelase  $kelase
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKelaseRequest $request, Kelase $kelase)
    {
        $kelase->update($request->all());

        return redirect()->route('admin.kelases.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelase  $kelase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelase $kelase)
    {
        abort_if(Gate::denies('kelase_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kelase->delete();

        return back();
    }
    public function massDestroy(MassDestroyKelaseRequest $request)
    {
        Kelase::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
