@csrf()
<div class="mb-3">
    <label for="subject" class="form-label text-light">Título da Dúvida</label>
    <input type="text" id="subject" name="subject" class="form-control bg-dark text-light border-secondary"
        placeholder="Título da dúvida" value="{{ $support->subject ?? old('subject') }}" required>
</div>

<div class="mb-3">
    <label for="body" class="form-label text-light">Descrição</label>
    <textarea id="body" name="body" class="form-control bg-dark text-light border-secondary" rows="5"
        placeholder="Descreva sua dúvida" required>
        {{ $support->body ?? old('body') }}
    </textarea>
</div>

<button type="submit" class="btn btn-primary btn-sm rounded-pill">Salvar</button>