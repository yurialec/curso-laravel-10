<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateSupport;

/**
 * A classe DTO tem a função de receber as informações dos formularios (ja validados)
 */
class CreateSupportDTO
{
    /**
     * O metodo construtor recebe os parametros do formulario
     * @param string $subject
     * @param string $status
     * @param string $body
     */
    public function __construct(
        public string $subject,
        public string $status,
        public string $body
    ) {
    }

    /**
     * O metodo makeFromRequest retorna um novo objeto dele mesmo
     * e recebe como parametro os dados vindos da $request
     * @param StoreUpdateSupport $request Instacia um novo objeto com com as informacoes do formulario
     * @return self
     */
    public static function makeFromRequest(StoreUpdateSupport $request): self
    {
        return new self($request->subject, "a", $request->body);
    }
}
