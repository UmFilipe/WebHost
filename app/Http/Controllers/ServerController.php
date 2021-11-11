<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Mail\sendEmailServers;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\servers;
use App\Models\User;
use PDF;

class ServerController extends Controller
{
    public function index()
    {
        $server = Servers::paginate(10);
        return view('servers')->with(['servers'=> $server]);
    }

    public function sendEmails()
    {
        $Servers = [];
        $Servers['servers'] = Servers::paginate(50);

        try {
            Mail::to('webhost@gmail.com')
                ->send(new sendEmailServers($Servers));

            return \redirect()->action('App\Http\Controllers\ServerController@index')->with('success', 'Envio de email realizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function search(Request $request)
        {
            $result = Servers::where($request->type, 'like', '%' . $request->pesquisar . '%')->get();
            return view('servers')->with(['servers' => $result]);
        }

        /* public function search(Request $request)
    {

        if ($request->tipo == "nome") {
            $objResult = Turma::where('nome', 'like', "%" . $request->valor . "%")->get();
        } else if ($request->tipo == "codigo") {
            $objResult =  Turma::where('codigo', 'like', "%" . $request->valor . "%")->get();
        } else if ($request->tipo == "categoria") {
            $objResult = Turma::whereHas('categorias', function (Builder $query) use (&$request) {
                $query->where('nome', 'like', "%" . $request->valor . "%");
            })->get();
        }
        // dd($objResult);
        return view("turma.list")->with(['turmas' => $objResult]);
    } 
    */

    public function new(Request $request)
    {
        $request->validate(Servers::rulesForServers(), Servers::mensageRulesforServers());
        Servers::create([
            'tipo' => $request->tipo,
            'preco' => $request->preco,
            'descricao' => $request->descricao
        ]);

        return redirect()->action('App\Http\Controllers\ServerController@index')->with('success', 'Registro cadastrado com sucesso!')->with('error', 'Ocorreu um erro ao cadastrar este registro');
    }

    public function create()
    {
        $server = Servers::all();
        return view('serversForm')->with(['servers' => $server]);
    }

    public function edit($id)
    {
        $server = Servers::find($id);
        return view('serversForm')->with(['servers' => $server]);
    }

    public function update(Request $request, $id)
    {
        Servers::updateOrCreate(['id' => $id], [
            'tipo' => $request->tipo,
            'preco' => $request->preco,
            'descricao' => $request->descricao
        ]);

        return redirect()->action('App\Http\Controllers\ServerController@index')->with('success', 'Registro atualizado com sucesso!');
    }

    public function remove($id)
    {
        $server = Servers::findOrFail($id);
        $server->delete();

        return redirect()->action('App\Http\Controllers\ServerController@index')->with('error', 'Registro deletado com sucesso!');
    }

    public function pdfServer()
    {
        $server = Servers::all();
        return PDF::loadView('serverPdf', compact('server'))->download('server.pdf');
    }
}
