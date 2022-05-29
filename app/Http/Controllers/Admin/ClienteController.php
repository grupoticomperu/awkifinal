<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Zona;
use Carbon\Carbon;
use App\Http\Requests\StoreClienteRequest;
use Illuminate\Support\Facades\Storage;


class ClienteController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('can:admin.clientes.index')->only('index');
        $this->middleware('can:admin.clientes.create')->only('create','store');
        $this->middleware('can:admin.clientes.edit')->only('edit','update');
        $this->middleware('can:admin.clientes.destroy')->only('destroy');
        $this->middleware('can:admin.clientes.show')->only('show');
        
    }



    public function index()
    {
        //aqui indicamos cuantos van a ser supervisores
        if(auth()->user()->id == 1 or auth()->user()->id == 2 or auth()->user()->id == 3 or auth()->user()->id == 4 or auth()->user()->id == 5 or auth()->user()->id == 6) {
       // if(auth()->user()->id == 1) {    
            $clientes = Cliente::all();
        }else{
            $clientes = Cliente::where('user_id', auth()->user()->id)->get();
        }
   
        return view('admin.clientes.index', compact('clientes'));
    }

  
    public function create()
    {
        //$categories = Category::all();
         $users = User::pluck('name', 'id');
         $zonas = Zona::pluck('name', 'id');
 
         return view('admin.clientes.create', compact('users', 'zonas'));
    }

   
    public function store(Request $request)
    {
     
        
        $this->validate($request, [
            'nombres' => 'required'
        ]);

        $cliente = Cliente::create([
            //$request->only('title')
            'nombres' => $request->get('nombres')
            //'user_id' => auth()->id()
        ]);

        return redirect()->route('admin.clientes.edit', compact('cliente'));




       
    /*   
        $this->validate($request, [
            'nombres' => 'required'
        ]);

        $cliente = Cliente::create([
            //$request->only('title')
            'dni' => $request->get('dni'),
            'nombres' => $request->get('nombres'),
            'apellidos' => $request->get('apellidos'),
            'user_id' => $request->get('user_id'),
            'zona_id' => $request->get('zona_id'),
        ]);

        return redirect()->route('admin.clientes.index', $cliente);
    */

    }

  
    public function show(Cliente $cliente)
    {
        $users = User::all();
        return view('admin.clientes.show', compact('cliente','users'));
    }

  
    public function edit(Cliente $cliente)
    {


        //$this->authorize('update', $post);
       // $this->authorize('view', $post);

       $users = User::all();
       //$zonas = Zona::all();
       return view('admin.clientes.edit',compact('cliente','users'));



       // $this->authorize('author', $post);

      //  $categories = Category::pluck('name', 'id');
      //  $tags = Tag::all();

       // return view('admin.clientes.edit', compact('cliente'));
    }


    public function update(Cliente $cliente, StoreClienteRequest $request)
    {
       
       //$cliente = Cliente::findorFail($cliente->id);

       $cliente->nombres = $request->get('nombres');
       $cliente->dni = $request->get('dni');

       $cliente->user_id = $request->get('user_id');
       //$cliente->zona_id = $request->get('zona_id');
       $cliente->zona = $request->get('zona');
       $cliente->tipodocumento = $request->get('tipodocumento');
       $cliente->numdocumento = $request->get('numdocumento');

       $cliente->fechadeventa =  $request->has('fechadeventa')?Carbon::parse($request->get('fechadeventa')):null;
       $cliente->fechaderecepcion =  $request->has('fechaderecepcion')?Carbon::parse($request->get('fechaderecepcion')):null;
       $cliente->estadocivil = $request->get('estadocivil');
       $cliente->pagoadministrativo = $request->get('pagoadministrativo');
       $cliente->tipoventa = $request->get('tipoventa');
       $cliente->montodelacompra = $request->get('montodelacompra');

       $cliente->marca = $request->get('marca');
       $cliente->modelo = $request->get('modelo');
       $cliente->chasis = $request->get('chasis');
       $cliente->motor = $request->get('motor');
       $cliente->color = $request->get('color');
       $cliente->anio = $request->get('anio');
       $cliente->categoria = $request->get('categoria');
       $cliente->dua = $request->get('dua');
       $cliente->item = $request->get('item');
       $cliente->certificado = $request->get('certificado');

       if($request->file('pdfcertificado')){
            $pdfcertificado = Storage::put('public/pdfcertificado', $request->file('pdfcertificado'));
            if($cliente->pdfcertificado){
                Storage::delete($cliente->pdfcertificado);
                $cliente->pdfcertificado = $pdfcertificado;

            }else{

                $cliente->pdfcertificado = $pdfcertificado;
            }

        }



        $cliente->oficinaregistral = $request->get('oficinaregistral');
        $cliente->fechadeingreso =  $request->has('fechadeingreso')?Carbon::parse($request->get('fechadeingreso')):null;
        $cliente->titulo = $request->get('titulo');
        $cliente->codigodeverificacion = $request->get('codigodeverificacion');
        $cliente->recibo = $request->get('recibo');
        $cliente->importe = $request->get('importe');
        $cliente->statussunarp = $request->get('statussunarp');
    
        

     
        if($request->file('pdfobservacion')){
            $pdfobservacion = Storage::put('public/pdfobservacion', $request->file('pdfobservacion'));
            if($cliente->pdfobservacion){
                Storage::delete($cliente->pdfobservacion);
                $cliente->pdfobservacion = $pdfobservacion;
    
            }else{
    
                $cliente->pdfobservacion = $pdfobservacion;
            }
        }

        $cliente->fechadeobservacion =  $request->has('fechadeobservacion')?Carbon::parse($request->get('fechadeobservacion')):null;
        //cuarta columna
        if($request->file('pdftarjetadepropiedad')){
            $pdftarjetadepropiedad = Storage::put('public/pdftarjetadepropiedad', $request->file('pdftarjetadepropiedad'));
            if($cliente->pdftarjetadepropiedad){
                Storage::delete($cliente->pdftarjetadepropiedad);
                $cliente->pdftarjetadepropiedad = $pdftarjetadepropiedad;
    
            }else{
    
                $cliente->pdftarjetadepropiedad = $pdftarjetadepropiedad;
            }
        }

       // $cliente->fechadevencimiento =  $request->has('fechadevencimiento')?Carbon::parse($request->get('fechadevencimiento')):null;

        if($request->file('pdfcargodeenvio')){
            $pdfcargodeenvio = Storage::put('public/pdfcargodeenvio', $request->file('pdfcargodeenvio'));
            if($cliente->pdfcargodeenvio){
                Storage::delete($cliente->pdfcargodeenvio);
                $cliente->pdfcargodeenvio = $pdfcargodeenvio;
    
            }else{
    
                $cliente->pdfcargodeenvio = $pdfcargodeenvio;
            }
        }

        $cliente->numerodeplaca = $request->get('numerodeplaca');
        $cliente->fechadeenvio =  $request->has('fechadeenvio')?Carbon::parse($request->get('fechadeenvio')):null;

        $cliente->guiaderemision = $request->get('guiaderemision');
        $cliente->statusfinal = $request->get('statusfinal');
        $cliente->observacion = $request->get('observacion');

       $cliente->save();


      // return redirect()->route('admin.clientes.edit', $cliente)->with('flash', 'Tu publicación fue guardada Con éxito');
       //return redirect()->route('admin.clientes.edit', $cliente)->with('flash', 'Tu publicación fue guardada Con éxito');
       return back()->with('info','El Cliente fue actualizado Con éxito');

    }


    public function destroy(Cliente $cliente)
    {
       // $this->authorize('author', $post);
        
        $cliente->delete();
        return redirect()->route('admin.clientes.index')->with('info', 'El Cliente se elimino con exito');
    }
}
