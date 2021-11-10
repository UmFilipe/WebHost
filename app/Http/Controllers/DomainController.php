<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\domain;
use App\Models\User;
use PDF;

class DomainController extends Controller
{
    public function index()
    {
        $domain = Domain::all();
        return view('domain')->with(['domains'=> $domain]);
    }

    public function new(Request $request)
    {
        $request->validate(Domain::rulesForDomain(), Domain::mensageRulesforDomains());
        Domain::create([
            'dominio' => $request->dominio,
            'preco' => $request->preco,
            'descricao' => $request->descricao,
            'ownerEmail' => $request->ownerEmail == 'null' ? null : $request->ownerEmail,

        ]);

        return redirect()->action('App\Http\Controllers\DomainController@index');
    }

    public function create()
    {
        $emails = User::all();
        return view('domainForm')->with(['emails' => $emails]);
    }

    public function edit($id)
    {
        $domain = Domain::find($id);
        $emails = User::all();

        return view('domainForm')->with(['domain' => $domain, 'emails' => $emails]);
    }

    public function remove($id)
    {
        $domain = Domain::findOrFail($id);
        $domain->delete();

        return redirect()->action('App\Http\Controllers\DomainController@index');
    }

    public function search(Request $request)
        {
            if ($request->tipo == 'email') {
                $result = Domain::whereHas('users', function (Builder $query) use (&$request) {
                    $query->where('email', 'like', "%" . $request->pesquisar . "%");
                })->get();
            } else {
                $result = Domain::where($request->tipo, 'like', '%' . $request->pesquisar . '%')->get();
            }
            return view('domain')->with(['domains' => $result]);
        }

    public function update(Request $request, $id)
    {
        Domain::updateOrCreate(['id' => $id], [
            'dominio' => $request->dominio,
            'preco' => $request->preco,
            'descricao' => $request->descricao,
            'ownerEmail' => $request->ownerEmail == 'null' ? null : $request->ownerEmail
        ]);

        return redirect()->action('App\Http\Controllers\DomainController@index');
    }
    public function pdfDomain()
    {
        $domain = Domain::all();
        return PDF::loadView('domainPdf', compact('domain'))->download('domain.pdf');
    }
}
