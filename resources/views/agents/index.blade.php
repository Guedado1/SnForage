@extends('layout.default')
@section('content')
    

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">SENFORAGE</h4>
                  <p class="card-category"> Agents
                      <a href="{{route('agents.create')}}"><div class="btn btn-warning">Nouveau Agent <i class="material-icons">add</i></div></a> 
                  </p>
                </div>
                @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
             @endif
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="table-agents">
                      <thead class=" text-primary">
                       <!--  <th>
                          ID
                        </th> -->
                        <th>
                          Matricule
                        </th>
                        <th>
                            Prenom
                        </th>
                        <th>
                            Nom
                        </th>
                        <th>
                          Email
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
       <!-- Modal-delete-agent -->
       <div class="modal" id="modal-delete-agent" tabindex="-1" role="dialog">
        <form method="POST" action="" id="form-delete-agent">
        {{ csrf_field() }}
        @method('DELETE')
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Êtes-vous sûr de bien vouloir supprimer ce agent</h5>
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
      @endsection

      @push('scripts')
      <script type="text/javascript">
      $(document).ready(function () {
          $('#table-agents').DataTable( { 
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('agents.list')}}",
            columns: [
                    /* { data: 'id', name: 'id' }, */
                    { data: 'matricule', name: 'matricule' }, 
                    { data: 'user.name', name: 'user.name' },
                    { data: 'user.firstname', name: 'user.firstname' },
                    { data: 'user.email', name: 'user.email' }, 
                    { data: null ,orderable: false, searchable: false}

                ],
                "columnDefs": [
                        {
                        "data": null,
                        "render": function (data, type, row) {
                        url_e =  "{!! route('agents.edit',':id')!!}".replace(':id', data.id);
                        url_d =  "{!! route('agents.destroy',':id')!!}".replace(':id', data.id);
                        return '<a href='+url_e+'  class=" btn btn-primary " ><i class="material-icons">edit</i></a>'+
                        '<div class="btn btn-danger delete btn-delete-agent"  data-href='+url_d+'><i class="material-icons">delete</i></div>'; 
                        },
                        "targets": 4
                        },
                    // {
                    //     "data": null,
                    //     "render": function (data, type, row) {
                    //         url =  "{!! route('agents.edit',':id')!!}".replace(':id', data.id);
                    //         return check_status(data,url);
                    //     },
                    //     "targets": 1
                    // }
                ],
              
          });
          $('#table-agents').off('click', '.btn-delete-agent').on('click', '.btn-delete-agent', 
          function(){
            var href=$(this).data('href');
            $("#form-delete-agent").attr("action",href);
            $('#modal-delete-agent').modal();
          });
      });
      </script>

          
      @endpush