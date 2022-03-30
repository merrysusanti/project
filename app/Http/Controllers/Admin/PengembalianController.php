<?php

namespace App\Http\Controllers\Admin;

use App\Pengembalian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPengembalianRequest;
use App\Http\Requests\StorePengembalianRequest;
use App\Http\Requests\UpdatePengembalianRequest;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('pengembalian_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengembalians = Pengembalian::all();

        return view('admin.pengembalians.index', compact('pengembalians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('pengembalian_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pengembalians.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePengembalianRequest $request)
    {
        $pengembalian = Pengembalian::create($request->all());

        return redirect()->route('admin.pengembalians.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function show(Pengembalian $pengembalian)
    {
        abort_if(Gate::denies('pengembalian_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pengembalians.show', compact('pengembalian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengembalian $pengembalian)
    {
        abort_if(Gate::denies('pengembalian_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pengembalians.edit', compact('pengembalian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePengembalianRequest $request, Pengembalian $pengembalian)
    {
        $pengembalian->update($request->all());

        return redirect()->route('admin.pengembalians.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengembalian $pengembalian)
    {
        abort_if(Gate::denies('pengembalian_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengembalian->delete();

        return back();
    }
    public function massDestroy(MassDestroyPengembalianRequest $request)
    {
        Pengembalian::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
