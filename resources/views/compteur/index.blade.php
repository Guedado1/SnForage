@extends('layout.default')
@section('content')
 <div class="content">
       <div class="container-fluid">
         <div class="row">
           <div class="col-md-12">
              @if (session('message'))
                  <div class="alert alert-success">
                      {{ session('message') }}
                  </div>
                   @endif

             <div class="card">
               <div class="card-header card-header-primary">
                 <h4 class="card-title ">snForage</h4>
                 <p class="card-category"> Compteurs
                     <a href="{{route('compteurs.create')}}"><div class="btn btn-warning">Nouveau Compteur <i class="material-icons">add</i></div></a>
                 </p>
               </div>
               <div class="card-body">
                 <div class="table-responsive">
                   <table class="table" id="table-compteurs">
                     <thead class=" text-primary">
                       <th>
                         ID
                       </th>
                       <th>
                         Numero Serie
                       </th>
                       <th>
                           Administrateur
                       </th>
                       <th>
                         Action
                         </th>
                     </thead>
                     <tbody>
                        
                     </tbody>
                   
                   </table>
              
                 </div>
               </div>
             </div>
           </div>
           <div class="col-md-12">
            
           </div>
         </div>
       </div>
     </div>
  

     @endsection

     @push('scripts')
     <script type="text/javascript">
     $(document).ready(function () {
         $('#table-compteurs').DataTable( {
           "processing": true,
           "serverSide": true,
           "ajax": "{{route('compteurs.list')}}",
           columns: [
                   { data:  'id', name: 'id' },
                   { data: 'numero_serie', name: 'numero_serie' },
                   { data: 'administrateur.user.name', name: 'administrateur.user.name' },
                   { data: null ,orderable: false, searchable: false}

               ],
               "columnDefs": [
                       {
                       "data": null,
                       "render": function (data, type, row) {
                       url_e =  "{!! route('compteurs.edit',':id')!!}".replace(':id', data.id);
                       url_d =  "{!! route('compteurs.destroy',':id')!!}".replace(':id', data.id);
                       return '<a href='+url_e+'  class=" btn btn-primary " ><i class="material-icons">edit</i></a>'+
                       '<div class="btn btn-danger delete btn_delete_client" data-href='+url_d+'><i class="material-icons">delete</i></div>';
                      
                       },
                       "targets": 3
                       },
                   // {
                   //     "data": null,
                   //     "render": function (data, type, row) {
                   //         url =  "{!! route('clients.edit',':id')!!}".replace(':id', data.id);
                   //         return check_status(data,url);
                   //     },
                   //     "targets": 1
                   // }
               ],
            
         });
       
        
     });
     </script>

        
     @endpush

