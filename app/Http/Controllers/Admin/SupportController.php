<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;

class SupportController extends Controller
{
    public function index(Support $support)
    {
        $supports = $support->all();
        return view('Admin.Supports.index', compact('supports'));
    }

    public function create()
    {
        return view('Admin.Supports.create');
    }

    public function store(StoreUpdateSupport $request, Support $support)
    {
        $data = $request->validated();
        $data['status'] = 'a';

        $support = $support->create($data);
        return redirect()->route('supports.index');
    }

    public function show(int $id)
    {
        if (!$support = Support::find($id)) {
            return back();
        }

        return view('Admin.Supports.show', compact('support'));
    }

    public function edit(int $id, Support $support)
    {
        if (!$support = $support->where('id', $id)->first()) {
            return back();
        }

        return view('Admin.Supports.edit', compact('support'));
    }

    public function update(int $id, StoreUpdateSupport $request, Support $support)
    {
        if (!$support = $support->find($id)) {
            return back();
        }

        $support->update($request->validated());

        return redirect()->route('supports.index');
    }

    public function destroy(int $id, Support $support)
    {
        if (!$support = $support->find($id)) {
            return back();
        }

        $support->delete();
        return redirect()->route('supports.index');
    }
}
