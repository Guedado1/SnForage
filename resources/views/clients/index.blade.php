@extends('layout.default')
@section('content')





<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">SENFORAGE</h4>
                        <p class="card-category"> Clients
                            <a href="{{route('clients.selectvillage')}}"><div class="btn btn-warning">Nouveau Client <i class="material-icons">add</i></div></a>
                        </p>
                    </div>
                    <div class="card-body">
                        @if (session('message'))

                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table" id="table-clients">
                                <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Nom
                                    </th>
                                    <th>
                                        Prenom
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
<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
    Launch
</button> --}}

<!-- Modal -->

<div class="modal fade" id="modal-delete-client" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" id="form-delete-client" action="">
            @csrf
            @method('DELETE')
            <input type="hidden" name="client">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmer l'action en cours</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Suppression de l'utilisateur

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Supprimer</button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#table-clients').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('clients.list')}}",
            columns: [
            { data: 'id', name: 'id' },
            { data: 'user.name', name: 'user.name' },
            { data: 'user.firstname', name: 'user.firstname' },
            { data: 'user.email', name: 'user.email' },
            { data: null ,orderable: false, searchable: false}

            ],
            "columnDefs": [
            {
                "data": null,
                "render": function (data, type, row) {
                    url_e =  "{!! route('clients.edit',':id')!!}".replace(':id', data.id);
                    url_d =  "{!! route('clients.destroy',':id')!!}".replace(':id', data.id);
                    return '<a href='+url_e+'  class=" btn btn-primary " ><i class="material-icons">edit</i></a>'+
                    '<div class="btn btn-danger btn-delete-client" data-id='+data.id+' data-href='+url_d+'><i class="material-icons">delete</i></div>';
                },
                "targets": 4
            },
            ],
            dom: 'lfrtipB',
            buttons: [
            'copy', 'csv', 'excel', {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2]
                }
            }, 'print','columnsToggle'
            ],
            "lengthMenu": [ [10, 25, 50,1000, -1], [10, 25, 50,1000, "All"] ],

        });
        $('#table-clients').off('click','.btn-delete-client').on('click','.btn-delete-client',function(){
            var id=$(this).data('id');
            var url=$(this).data('href');
            $('#form-delete-client').attr('action',url);
            $("#modal-delete-client").modal();
            console.log(id,url);

        });

    });
</script>


@endpush
 