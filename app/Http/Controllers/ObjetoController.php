<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objeto;
use DB;
use App\Http\Requests;

class ObjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
public function probarconsulta()
{
        $posts =  DB::table('objeto')
                ->select('objeto.id', 'objeto.nombre', 'objeto.url', 'objeto.tipoobjeto','modulo.nombre as modulo','modulo.id as idmodulo')
                 ->join('modulo', 'modulo.id', '=', 'objeto.idmodulo')
                ->where('objeto.eliminar', '=', 0)->get();
         return   $posts ;
}

       public function allObjeto(Request $request)
    {
        $columns = array( 
                            0 =>'id', 
                            1 =>'nombre',
                            2=>'url',
                            3=>'tipoobjeto',
                            4=>'modulo',
                            5=>'action'
                        

                            
                        );
        $totalData = DB::table('objeto')
            ->where('eliminar', '=', 0)
                         ->count();
        $totalFiltered = $totalData; 
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        if(empty($request->input('search.value')))
        {            
          $posts =  DB::table('objeto')
                         ->select('objeto.id', 'objeto.nombre', 'objeto.url', 'objeto.tipoobjeto','modulo.nombre as modulo','modulo.id as idmodulo')
                         ->join('modulo', 'modulo.id', '=', 'objeto.idmodulo')
                         ->where('objeto.eliminar', '=', 0)
                         ->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }
        else {
            $search = $request->input('search.value'); 
           $posts =  DB::table('objeto')
                ->select('objeto.id', 'objeto.nombre', 'objeto.url', 'objeto.tipoobjeto','modulo.nombre as modulo','modulo.id as idmodulo')
                ->join('modulo', 'modulo.id', '=', 'objeto.idmodulo')
                ->where('objeto.eliminar', '=', 0)
                          ->where('objeto.id','LIKE',"%{$search}%")
                          ->orWhere('objeto.url','LIKE',"%{$search}%")
                          ->orWhere('objeto.nombre', 'LIKE',"%{$search}%")
                          ->offset($start)
                          ->limit($limit)
                          ->orderBy($order,$dir)
                          ->get();
            $totalFiltered = DB::table('objeto')
                        ->select('objeto.id', 'objeto.nombre', 'objeto.url', 'objeto.tipoobjeto','modulo.nombre as modulo','modulo.id as idmodulo')
                        ->join('modulo', 'modulo.id', '=', 'objeto.idmodulo')
                        ->where('objeto.eliminar', '=', 0)
                        ->where('objeto.id','LIKE',"%{$search}%")
                        ->orWhere('objeto.url','LIKE',"%{$search}%")
                        ->orWhere('objeto.nombre', 'LIKE',"%{$search}%")
                         
                             ->count();
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
          //      $show =  route('Modulo.show',$post->id);
           //      $edit =  route('Modulo.edit',$post->id);
                $nestedData["DT_RowId"]=$post->id;
                $nestedData['id'] = $post->id;
                $nestedData['nombre'] = $post->nombre;
                $nestedData['url'] = $post->url;
                $nestedData['tipoobjeto'] = $post->tipoobjeto;
                $nestedData['modulo'] = $post->modulo;
                $nestedData['action'] = "&emsp; 
                                          <button data-toggle='modal' data-target='#edit-item'  onclick='mostrardata({$post->id})' class='btn btn-primary edit-item'>Edit</button> 
                                          &emsp;<button class='btn btn-danger remove-item'>Delete</button>";
                $data[] = $nestedData;

            }
        }
          
        $json_data = array(
                    "draw"            => intval($request->input('draw')),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );
            
        echo json_encode($json_data); 
        
    }
}
