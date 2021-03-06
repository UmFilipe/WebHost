<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\servers;
use App\Mail\sendEmailServers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use PDF;

class ServerController extends Controller
{
    public function index()
    {
        $server = Servers::paginate(10);
        return view('servers.servers')->with(['servers'=> $server]);
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
            $result = Servers::where($request->type, 'like', '%' . $request->pesquisar . '%')->paginate(10);
            return view('servers.servers')->with(['servers' => $result]);
        }

    public function new(Request $request)
    {
        Validator::make($request->all(), Servers::rulesForServers(), Servers::mensageRulesforServers())->validate();
        $input = $request->all();

        $image = $request->file("nome_arquivo");
        if ($image) {
            $nome_arquivo = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $request->nome_arquivo->storeAs('public/imagem', $nome_arquivo);

            $input['nome_arquivo'] = $nome_arquivo;
        }
    
        Servers::create($input);

        return redirect()->action('App\Http\Controllers\ServerController@index')->with('success', 'Registro cadastrado com sucesso!');
    }

    public function create()
    {
        $server = Servers::all();
        return view('servers.serversForm')->with(['servers' => $server]);
    }

    public function edit($id)
    {
        $server = Servers::find($id);
        return view('servers.serversForm')->with(['servers' => $server]);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), Servers::rulesForServers(), Servers::mensageRulesforServers())->validate();
        $input = $request->all();

        $image = $request->file("nome_arquivo");
        if ($image) {
            $nome_arquivo = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $request->nome_arquivo->storeAs('public/imagem', $nome_arquivo);

            $input['nome_arquivo'] = $nome_arquivo;
        }
    
        Servers::updateOrCreate(
            ['id' => $request->id],
            $input);

        return redirect()->action('App\Http\Controllers\ServerController@index')->with('success', 'Registro atualizado com sucesso!');
    }

    public function remove($id)
    {

        $server = Servers::findOrFail($id);

        if (Storage::exists('public/imagem/' . $server->nome_arquivo)) {
            Storage::delete('public/imagem/' . $server->nome_arquivo);
        }

        $server->delete();

        return redirect()->action('App\Http\Controllers\ServerController@index')->with('error', 'Registro deletado com sucesso!');
    }

    public function pdfServer()
    {
        $servers = Servers::all();
        return PDF::loadView('servers.serverPdf', compact('servers'))->download('server.pdf');
    }
}
