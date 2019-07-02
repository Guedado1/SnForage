@extends('layout.default')
@section('content')
    

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">SENFORAGE</h4>
                  <p class="card-category"> Consommations
                      <a href="{{route('consommations.create')}}"><div class="btn btn-warning">Nouvelle Consommation <i class="material-icons">add</i></div></a> 
                  </p>
                </div>
                @if (session('message'))
                   <div class="alert alert-success">
                       {{ session('message') }}
                   </div>
                @endif

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="table-consommations">
                      <thead class=" text-primary">
                        <th>
                        ID
                        </th>
                        <th>
                          Date
                        </th>
                        <th>
                          Valeur
                        </th>
                        <th>
                          Mat Agent
                        </th>
                       <th>
                          Prenom_Client
                        </th>
                        <th>
                          Nom_Client
                        </th>
                        <th>
                          Compteur
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
      <!-- Modal-delete-consommation-->
      <div class="modal" id="modal-delete-consommation" tabindex="-1" role="dialog">
        <form method="POST" action="" id="form-delete-consommation">
        {{ csrf_field() }}
        @method('DELETE')
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Êtes-vous sûr de bien vouloir supprimer ce consommation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>cliquez sur close pour annuler</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Supprimer</button>
        </div>
      </div>
    </div>
  </div>
      @endsection

      @push('scripts')
      <script type="text/javascript">
      $(document).ready(function () {
          $('#table-consommations').DataTable( { 
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('consommations.list')}}",
            columns: [
                    { data: 'id', name: 'id' },
                    { data: 'date', name: 'date' },
                    { data: 'valeur', name: 'valeur' },
                    { data: 'agent.matricule', name: 'agent.matricule' },
                    { data: 'compteur.abonnement.client.user.firstname', name: 'compteur.abonnement.client.user.firstname' },
                    { data: 'compteur.abonnement.client.user.name', name: 'compteur.abonnement.client.user.name' },
                    { data: 'compteur.numero_serie', name: 'compteur.numero_serie' },
                    { data: null ,orderable: false, searchable: false}

                ],
                "columnDefs": [
                        {
                        "data": null,
                        "render": function (data, type, row) {
                        url_e =  "{!! route('consommations.edit',':id')!!}".replace(':id', data.id);
                        url_d =  "{!! route('consommations.destroy',':id')!!}".replace(':id', data.id);
                        return '<a href='+url_e+'  class=" btn btn-primary " ><i class="material-icons">edit</i></a>'+
                        '<div class="btn btn-danger delete btn-delete-consommation"  data-href='+url_d+'><i class="material-icons">delete</i></div>'; 
                        },
                        "targets": 7
                        },
                    // {
                    //     "data": null,
                    //     "render": function (data, type, row) {
                    //         url =  "{!! route('consommations.edit',':id')!!}".replace(':id', data.id);
                    //         return check_status(data,url);
                    //     },
                    //     "targets": 1
                    // }
                ],
              
          });

         $('#table-consommations').off('click', '.btn-delete-consommation').on('click', '.btn-delete-consommation', 
          function(){
            var href=$(this).data('href');
            $("#form-delete-consommation").attr("action",href);
            $('#modal-delete-consommation').modal();
          });
        });

      </script>

          
      @endpush