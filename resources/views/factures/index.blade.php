@extends('layout.default')
@section('content')
    

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">SENFORAGE</h4>
                  <p class="card-category"> factures
                      <a href="{{route('factures.create')}}"><div class="btn btn-warning">Nouvelle facture <i class="material-icons">add</i></div></a> 
                  </p>
                </div>
                @if (session('message'))
                   <div class="alert alert-success">
                       {{ session('message') }}
                   </div>
                @endif

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="table-factures">
                      <thead class=" text-primary">
                        <th>
                        ID
                        </th>
                        <th>
                          Date_Limite
                        </th>
                       <th>
                          Montant
                        </th> 
                       {{--  <th>
                          Details
                        </th> --}}
                       <th>
                          Type
                        </th>
                        <th>
                            Debut cons
                        </th>
                         <th>
                            Fin cons
                             </th>
                             <th>
                                Prenom Client
                                 </th>
                                 <th>
                                    Nom Client
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
      <!-- Modal-delete-facture-->
      <div class="modal" id="modal-delete-facture" tabindex="-1" role="dialog">
        <form method="POST" action="" id="form-delete-facture">
        {{ csrf_field() }}
        @method('DELETE')
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Êtes-vous sûr de bien vouloir supprimer ce facture</h5>
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
          $('#table-factures').DataTable( { 
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('factures.list')}}",
            columns: [
                    { data: 'id', name: 'id' },
                    { data: 'date_limite', name: 'date_limite' },
                    { data: 'montant', name: 'montant' }, 
                   /*  { data: 'details', name: 'details' }, */ 
                    { data: 'reglement.type.name', name: 'reglement.type.name' },
                    { data: 'debut_consommation', name: 'debut_consommation' },
                    { data: 'fin_consommation', name: 'fin_consommation' },
                    { data: 'user.firstname', name: 'user.firstname' },
                    { data: 'user.name', name: 'user.name' },

                    { data: null ,orderable: false, searchable: false}

                ],
                "columnDefs": [
                        {
                        "data": null,
                        "render": function (data, type, row) {
                        url_e =  "{!! route('factures.show',':id')!!}".replace(':id', data.id);
                        url_d =  "{!! route('reglements.create',':id')!!}".replace(':id', data.id);
                        return '<a href='+url_e+'  class=" btn btn-primary " title="Afficher Reglement"><i class="material-icons">edit</i></a>'+
                        '<a href='+url_d+' class=" btn btn-danger" title="Effectuer Reglement"><i class="material-icons">edit</i></a>'; 
                        },
                        "targets": 8
                        
                        },
                
                ],
                dom: 'lBfrtip',
           buttons: [
           'copy', 'csv', 'excel', {
               extend: 'pdfHtml5',
               exportOptions: {
                   columns: [ 0, 1, 2,5]
               }
           },, 'print','columnsToggle'
           ],
           "lengthMenu": [ [10, 25, 50,1000, -1], [10, 25, 50,1000, "All"] ],

              
          });

         $('#table-factures').off('click', '.btn-delete-facture').on('click', '.btn-delete-facture', 
          function(){
            var href=$(this).data('href');
            $("#form-delete-facture").attr("action",href);
            $('#modal-delete-facture').modal();
          });
        });

      </script>

          
      @endpush