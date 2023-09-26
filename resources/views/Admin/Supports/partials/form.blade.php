@csrf()
<input type="text" name="subject" placeholder="Título da dúvida" value="{{ $support->subject ?? old('subject') }}">
<textarea rows="5" cols="30" name="body">{{ $support->body ?? old('body') }}</textarea>
<button type="submit" value="cadastrar">Cadastrar</button>
