<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

/**
 * Controller de todo o CRUD do suporte de duvidas
 */
class SupportController extends Controller
{
    /**
     * A classe tem um metodo construtor 
     * para instanciar um novo objeto da camada Service
     *
     * @param SupportService $service
     */
    public function __construct(protected SupportService $service)
    {
    }

    /** Listar todos os registros @param Request $request @return void */
    public function index(Request $request)
    {
        $supports = $this->service->getAll($request->filter);
        return view('Admin.Supports.index', compact('supports'));
    }

    public function create()
    {
        return view('Admin.Supports.create');
    }

    /**
     * metodo para registro de dados
     *
     * @param StoreUpdateSupport $request objeto de validacao dos campos
     * @return void
     */
    public function store(StoreUpdateSupport $request)
    {
        $this->service->create(CreateSupportDTO::makeFromRequest($request));
        return redirect()->route('supports.index');
    }

    public function show(int $id)
    {
        if (!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('Admin.Supports.show', compact('support'));
    }

    public function edit(int $id)
    {
        if (!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('Admin.Supports.edit', compact('support'));
    }

    public function update(StoreUpdateSupport $request, Support $support)
    {
        $support = $this->service->update(UpdateSupportDTO::makeFromRequest($request));

        if (!$support) {
            return back();
        }

        return redirect()->route('supports.index');
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);
        return redirect()->route('supports.index');
    }
}
