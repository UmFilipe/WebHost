<?php

namespace App\Http\Controllers;
use App\Mail\sendEmailDomain;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Mail;
use App\Models\DomainCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\domain;
use App\Models\User;
use PDF;

class DomainController extends Controller
{
    public function index()
    {
        $objDomain = Domain::all();
        $domain = Domain::paginate(10);
        return view('domains.domain')->with(['domains' => $domain]);
    }
    
    public function sendEmails()
    {
        $Domain_ = [];
        $Domain_['domains'] = Domain::paginate(50);

        try {
            Mail::to('webhost@gmail.com')
                ->send(new sendEmailDomain($Domain_));

            return \redirect()->action('App\Http\Controllers\DomainController@index')->with('success', 'Envio de email realizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function new(Request $request)
    {
        $domain_categorias = DomainCategoria::all();
        return view("domains.domainForm")->with(['domain_categorias' => $domain_categorias]);
        
        /*$request->validate(Domain::rulesForDomain(), Domain::mensageRulesforDomains());
        Domain::create([
            'dominio' => $request->dominio,
            'preco' => $request->preco,
            'domain_categoria_id' => $request->domain_categoria_id,
            'descricao' => $request->descricao,
        ]);*/

        return redirect()->action('App\Http\Controllers\DomainController@index')->with('success', 'Registro cadastrado com sucesso!');
    }

    public function create()
    {
        $domain_categorias = DomainCategoria::all();
        return view('domains.domainForm')->with(['domain_categorias' => $domain_categorias]);
    }

    public function edit($id)
    {
        $domains = Domain::find($id); 
        $domain_categoria = DomainCategoria::all(); 

        return view("domains.domainForm")->with(['domain' => $domains, 'domain_categorias' => $domain_categoria]);

    }

    public function remove($id)
    {
        $domain = Domain::findOrFail($id);
        $domain->delete();

        return redirect()->action('App\Http\Controllers\DomainController@index')->with('error', 'Registro deletado com sucesso!');
    }

    public function search(Request $request)
    {
        if ($request->tipo == "dominio") {
            $objResult = Domain::where('dominio', 'like', "%" . $request->pesquisar . "%")->paginate(10);
        } else if ($request->tipo == "preco") {
            $objResult =  Domain::where('preco', 'like', "%" . $request->pesquisar . "%")->paginate(10);
        } else if ($request->tipo == "descricao") {
            $objResult =  Domain::where('descricao', 'like', "%" . $request->pesquisar . "%")->paginate(10);
        } else if ($request->tipo == "localidade") {
            $objResult = Domain::whereHas('localidades', function (Builder $query) use (&$request) {
                $query->where('nome', 'like', "%" . $request->pesquisar . "%");
            })->paginate(10);
        }
        return view('domains.domain')->with(['domains' => $objResult]);
    }

    // public function search(Request $request)
    // {
    //     if ($request->tipo == 'email') {
    //         $result = Domain::whereHas('users', function (Builder $query) use (&$request) {
    //             $query->where('email', 'like', "%" . $request->pesquisar . "%");
    //         })->get();
    //     } else {
    //         $result = Domain::where($request->tipo, 'like', '%' . $request->pesquisar . '%')->get();
    //     }
    //     return view('domain')->with(['domains' => $result]);
    // }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), Domain::rulesForDomain(), Domain::mensageRulesforDomains())->validate();
        
        $input = $request->all();
        
        Domain::updateOrCreate(
            ['id' => $request->id],
            $input
        );

        return redirect()->action('App\Http\Controllers\DomainController@index')->with('success', 'Registro atualizado com sucesso!');
    }
    public function pdfDomain()
    {
        $domain = Domain::all();
        return PDF::loadView('domains.domainPdf', compact('domain'))->download('domain.pdf');
    }
}
