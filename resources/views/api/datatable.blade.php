@extends('layouts.api')
@extends('layouts.style')
@section('conteudo')
<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            </div>
        </div>
        </div>
    </div>
    <table class="table table-bordered data">
        <thead>
            <tr>
                <th>id</th>
                <th>description</th>
                <th>validity</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <script type="text/javascript">
        $(document).ready(function() {       
            var table = $('.data').DataTable({
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json"
                },
                ajax: {
                    url: "{{ route('api') }}",
                    dataSrc: 'data'
                },
                columns: [
                    {data: 'id'},
                    {data: 'description'},
                    {data: 'validity'},
                ]
            });

            $('.data tbody').on('click', 'tr', function () {
                var data = table.row( this ).data();
                $('#exampleModal').modal("show");
                var datahtml = '';
                for (var i = 0; i < data.questions.length; i++) {
                    console.log(data.questions[i]);
                    datahtml += JSON.stringify(data.questions[i]);
                }
                $('#exampleModalLabel').text(data.description);
                $('.modal-body').text(datahtml);
                console.log(datahtml);
                //alert( 'You clicked on '+data['id']+'\'s row' );
            });
            
        });
    </script>
</div>
@stop