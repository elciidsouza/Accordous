<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Imoveis;
use App\Contratos;

class ImoveisController extends Controller
{
    public function index()
    {
        $imoveis = Imoveis::orderBy('id_imoveis', 'DESC')->leftJoin('contratos', 'contratos.imoveis_id', '=', 'id_imoveis')->get();
        $dados = $imoveis;
        foreach($imoveis as $key => $imovel){
            if($imovel->id_contrato == null){
                $dados[$key]['status'] = 'Não contratado';
            } else {
                $dados[$key]['status'] = 'Contratado por: ' . $imovel->nome_completo;
            }
        }

        return $dados;
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'rua' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
        ]);

        $request->request->add(['uuid' => Str::uuid()->toString()]);
        Imoveis::create($request->all());

        Mail::to($request->email)->send(new SendMailable($request->email, $request->uuid, 'imovel'));
        
        return;
    }

    public function confirmMail(Request $request){
        if($request->tipo == 'contratante'){
            $msg = 'E-mail do contratante validado com sucesso.';
            $banco = Contratos::where('email_contratante', 'LIKE', $request->email)->where('uuid', '=', $request->uuid)->where('validado', '=', 0)->first();
        } else {
            $msg = 'E-mail do imóvel validado com sucesso.';
            $banco = Imoveis::where('email', 'LIKE', $request->email)->where('uuid', '=', $request->uuid)->where('validado', '=', 0)->first();
        }
        if($banco){
            $banco->validado = 1;
            $banco->save();

            return $msg;
        } else {
            return 'Ocorreu um erro. Tente novamente mais tarde.';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imoveis = Imoveis::findOrFail($id);
        $imoveis->delete();
    }
}
