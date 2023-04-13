<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use App\Models\Languajes;
use App\Models\Languajes_tasks; 

class MainController extends Controller
{
   public function index(){
      //relacion de tarea con lenguaje
      $contents = Languajes_tasks::select('Tasks.id as idtask','Languajes.id as idlang')
      ->join('Languajes','Languajes.id','=','languajes_tasks.languajes_id')
      ->join('Tasks','Tasks.id','=','languajes_tasks.Tasks_id')
      ->get();
      // genero un multiarray 
      $array = array();
      foreach($contents as $content){
         if(!isset($array[$content->idtask])){
               $array[$content->idtask] = array();
         }
         $array[$content->idtask][$content->idlang] = 1;
      }
        $rows=Tasks::all();
        $columns=Languajes::all();
        return view("index",['array'=>$array,'rows'=>$rows,'columns'=>$columns]);
   }



   public function record(Request $request){
      //grabo la nueva tarea
      $task = new Tasks();
      $task->name = $request['name'];
      $task->save();
            //grabo a que lenguajes esta vinculada la nueva tarea
      //NOTA: esto en versiones futuras se podria mejorar con un menu desplegable de checks 
      //      evitanmdo tener que hacer n if  
      if( $request['lang1']!=null){
         $Languajes_tasks = new Languajes_tasks();
         $Languajes_tasks->tasks_id=  $task->id;
         $Languajes_tasks->languajes_id=1;
         $Languajes_tasks->save();
      } 

      if( $request['lang2']!=null){
         $Languajes_tasks = new Languajes_tasks();
         $Languajes_tasks->tasks_id=  $task->id;
         $Languajes_tasks->languajes_id=2;
         $Languajes_tasks->save();
      }

      if( $request['lang3']!=null){
         $Languajes_tasks = new Languajes_tasks();
         $Languajes_tasks->tasks_id=  $task->id;
         $Languajes_tasks->languajes_id=3;
         $Languajes_tasks->save();
      }
     //relacion de tarea con lenguaje
      $contents = Languajes_tasks::select('Tasks.id as idtask','Languajes.id as idlang')
      ->join('Languajes','Languajes.id','=','languajes_tasks.languajes_id')
      ->join('Tasks','Tasks.id','=','languajes_tasks.Tasks_id')
      ->get();
     // genero un multiarray 
     $array = array();
     foreach($contents as $content){
         if(!isset($array[$content->idtask])){
             $array[$content->idtask] = array();
         }
         $array[$content->idtask][$content->idlang] = 1;
     }
     $rows=Tasks::all();
     $columns=Languajes::all();
     return view("index",['array'=>$array,'rows'=>$rows,'columns'=>$columns]);
   }


   public function erase(Request $request){
        Tasks::find($request->id)->delete($request->id);
        return response()->json(array('data'=>'ok'), 200);

   }

   public function search(){
            //relacion de tarea con lenguaje
            $contents = Languajes_tasks::select('Tasks.id as idtask','Languajes.id as idlang')
            ->join('Languajes','Languajes.id','=','languajes_tasks.languajes_id')
            ->join('Tasks','Tasks.id','=','languajes_tasks.Tasks_id')
            ->get();
    
            //genero un multiarray 
            $array = array();
            foreach($contents as $content){
                if(!isset($array[$content->idtask])){
                    $array[$content->idtask] = array();
                }
                $array[$content->idtask][$content->idlang] = 1;
            }
            $rows=Tasks::all();
            $columns=Languajes::all();
            return view("search",['array'=>$array,'rows'=>$rows,'columns'=>$columns]);
   }


//Nota en versiones futuras se puede buscar por categorias o por tareas
// en esta versión se podra buscar por nombre SÓLO
   public function searching(Request $request){
         $taskname = $request['name'];
         //relacion de tarea con lenguaje
         $contents = Languajes_tasks::select('Tasks.id as idtask','Languajes.id as idlang')
         ->join('Languajes','Languajes.id','=','languajes_tasks.languajes_id')
         ->join('Tasks','Tasks.id','=','languajes_tasks.Tasks_id')
         ->get();
    // genero un multiarray 
      $array = array();
      foreach($contents as $content){
          if(!isset($array[$content->idtask])){
              $array[$content->idtask] = array();
          }
          $array[$content->idtask][$content->idlang] = 1;
      }
      //buequeda por tarea SÓLO
      $rows=Tasks::Where('name', 'like', '%' .$taskname. '%')->get();
      $columns=Languajes::all();
      return view("search",['array'=>$array,'rows'=>$rows,'columns'=>$columns]);
   }


}