<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\hosts;
use App\Models\User;
use PDF;

class HostController extends Controller
{
    public function index()
    {
        $host = Hosts::all();
        return view('hosts')->with(['hosts'=> $host]);
    }

    public function search(Request $request)
    {
        if ($request->tipo == 'email') {
            $result = Hosts::whereHas('users', function (Builder $query) use (&$request) {
                $query->where('email', 'like', "%" . $request->pesquisar . "%");
            })->get();
        } else {
            $result = Hosts::where($request->tipo, 'like', '%' . $request->pesquisar . '%')->get();
        }
        return view('hosts')->with(['hosts' => $result]);
    }

    public function new(Request $request)
    {
        $request->validate(Hosts::ruleForHost(), Hosts::mensageRulesforHosts());
        Hosts::create([
            'tamanho' => $request->tamanho,
            'localizacao' => $request->localizacao,
            'preco' => $request->preco
        ]);

        return redirect()->action('App\Http\Controllers\HostController@index');
    }

    public function create()
    {
        $hosts = Hosts::all();
        return view('hostsForm')->with(['hosts' => $hosts]);
    }

    public function edit($id)
    {
        $hosts = Hosts::find($id);
        return view('hostsForm')->with(['hosts' => $hosts]);
    }

    public function update(Request $request, $id)
    {
        Hosts::updateOrCreate(['id' => $id], [
            'tamanho' => $request->tamanho,
            'localizacao' => $request->localizacao,
            'preco' => $request->preco
        ]);

        return redirect()->action('App\Http\Controllers\HostController@index');
    }

    public function remove($id)
    {
        $hosts = Hosts::findOrFail($id);
        $hosts->delete();

        return redirect()->action('App\Http\Controllers\HostController@index');
    }

    public function pdfHosts()
    {
        $hosts = Hosts::all();
        return PDF::loadView('hostsPdf', compact('hosts'))->download('hosts.pdf');
    }
}

