<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\servers;
use App\Models\User;
use PDF;

class ServerController extends Controller
{
    public function index()
    {
        $server = Servers::all();
        return view('servers')->with(['servers'=> $server]);
    }

    public function search(Request $request)
        {
            $result = Servers::where($request->type, 'like', '%' . $request->pesquisar . '%')->get();
            return view('servers')->with(['servers' => $result]);

        }
    public function new(Request $request)
    {
        $request->validate(Servers::rulesForServers(), Servers::mensageRulesforServers());
        Servers::create([
            'tipo' => $request->tipo,
            'preco' => $request->preco,
            'descricao' => $request->descricao
        ]);

        return redirect()->action('App\Http\Controllers\ServerController@index');
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

        return redirect()->action('App\Http\Controllers\ServerController@index');
    }

    public function remove($id)
    {
        $server = Servers::findOrFail($id);
        $server->delete();

        return redirect()->action('App\Http\Controllers\ServerController@index');
    }

    public function pdfServer()
    {
        $server = Servers::all();
        return PDF::loadView('serverPdf', compact('server'))->download('server.pdf');
    }
}
