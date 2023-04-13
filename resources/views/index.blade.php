<link href="{{ asset('css/app.css') }}" rel="stylesheet"><!-- v2.0 usar compilación npm-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
  .box{
    background-color:#DCDCDC;
    padding:5px;
    border: 1px solid black;
    border-radius: 5px;
  }
</style>
<?php 
  use App\Models\Tasks;
  use App\Models\Languajes;
?>
<div class="container border border-primary mt-3" >
<div class="row">
    <div class="col-sm-12  mx-auto" style="padding:20px;">
        <a class="btn btn-primary" href="{{ url('search') }}">Busqueda</a>
    </div>
    <div class="col-sm-12  mx-auto" style="padding:20px;">
        <h3>GESTOR DE TAREAS</h3>
        <hr>
    </div>
    <div class="col-sm-12  mx-auto" style="padding:20px;">
      <form method="POST"  action="{{ route('record') }}"  enctype="multipart/form-data">
                 @csrf
                <input type="text" class="form-control" id="name" name="name" required  style="width:300px; display: inline;" placeholder="Nueva tarea...">
                <input class="form-check-input " type="checkbox"  id="lang1" name="lang1" style="margin-top:10px;"  >
                <label class="form-check-label" style="width:12%;min-width:60px;">
                  php 
                </label>
              
                <input class="form-check-input" type="checkbox"  id="lang2"  name="lang2" style="margin-top:10px;">
                <label class="form-check-label" style="width:12%;min-width:70px;">
                  javascript
                </label>
              
                <input class="form-check-input" type="checkbox"  id="lang3"  name="lang3" style="margin-top:10px;" >
                <label class="form-check-label" style="width:12%;min-width:60px;">
                  css
                </label>
                <button type="submit" class="btn btn-primary" style="margin-top:5px;">añadir</button>
          </form>
      </div> 
      <div class="col-sm-12  mx-auto">
          <table class="table">
              <thead class="thead-dark">
                  <tr>
                      <th scope="col">Tarea</th>
                      <th scope="col">Categoria</th>
                      <th scope="col">Acciones</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($rows as $r)
                  <tr id="row{{$r->id}}">
                    <td>{{Tasks::find($r->id)->name}}</td>   
                    <td> 
                    @foreach($columns as $c)
                    <!--    pinto si exiset en esa tarea ese  parametro -->
                        @if(isset($array[$r->id][$c->id]))
                            <span class="box">{{Languajes::find($c->id)->name}}</span>
                        @endif
                    @endforeach
                  </td>
                    <td>
                      <button onclick="erase('{{$r->id}}')" class="btn btn-danger" >x</button>
                    
                    </td>
                  </tr>
                @endforeach
              </tbody>
          </table>
        </div>
    </div>
</div>
<script>
  //evita el resubmit
  if (window.history.replaceState) { 
    // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
  }

//NOTA : versiones futuras añadir capa frontend para llamadas asincronas (LIVEWIRE,NODE,ANGULAR ETC...)
      function erase(id){
            // inhabilito el row a nivel css que voy a borrar para no tener que refrescar la página
            $("#row"+id).css( "display","none");   
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });

            $.ajax({
                type:'post',
                url:'erase',
                data:{id:id},
                success: function(data) {
                  console.log("borrado");
                },
                error: function() {
                  alert("Error!!");
              }
            });
        }
	
</script>