<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Contratos;

class ContratoController extends Controller
{
    public function store(Request $request)
    {
        $verificarContrato = Contratos::where('imoveis_id', '=', $request->imoveis_id)->first();
        if($verificarContrato){
            throw new \ErrorException('Imóvel já associado a outro contrato.');
        } else {
            $this->validate($request, [
                "tipo_pessoa" => 'required',
                "documento" => 'required',
                "email_contratante" => 'required',
                "nome_completo" => 'required',
                "imoveis_id" => 'required'
            ]);
    
            $request->request->add(['uuid' => Str::uuid()->toString()]);
    
            Contratos::create($request->all());

            Mail::to($request->email_contratante)->send(new SendMailable($request->email_contratante, $request->uuid, 'contratante'));
        }

    }
}
