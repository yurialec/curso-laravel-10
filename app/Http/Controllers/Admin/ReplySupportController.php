<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Replies\CreateReplyDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReplySupportRequest;
use App\Services\ReplySupportService;
use App\Services\SupportService;
use Illuminate\Http\Request;

class ReplySupportController extends Controller
{
    public function __construct(
        protected SupportService $SupportService,
        protected ReplySupportService $replyService,
    ) {
    }

    public function index(string $id)
    {
        if (!$support = $this->SupportService->findOne($id)) {
            return back();
        }

        $replies = $this->replyService->getAllBySupportId($id);

        return view('Admin.Supports.Replies.index', compact('support', 'replies'));
    }

    public function store(StoreReplySupportRequest $request)
    {
        $this->replyService->createNew(CreateReplyDTO::makeFromRequest($request));
        $supportId = $request->support_id;

        session()->flash('success', 'Resposta cadastrada com sucesso!');
        return redirect()->route('replies.index', ['id' => $supportId]);
    }

    public function destroy($supportId, $id)
    {
        $this->replyService->delete($id);

        session()->flash('success', 'Resposta excluida com sucesso!');

        return redirect()
            ->route('replies.index', ['id' => $supportId]);
    }
}
