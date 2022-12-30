<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <hr>
                <div class="input-group">
                    <input wire:mode="file" type="file" class="form-control" id="archivoXlsx" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                </div>
                <div class="text-danger" wire:loading wire:target="file">Uploading...</div>
            </div>
            <div class="col-md-12 mt-5">
                <!--DATA TABLE-->
                <div  class="table-responsive table-responsive-data2">
                    <table id="table" class="table table-data2">
                        <thead>
                            <tr>
                                <th>N° Pedido Cliente</th>
                                <th>Pos Ped Cliente</th>
                                <th>Material</th>
                                <th>Texto breve material</th>
                                <th>Cantidad de pedido</th>
                                <th>Q. Pdte Pedido de Venta</th>
                                <th>Cliente Solicitante</th>
                                <th>1ª Fecha</th>
                                <th>FeFinOF</th>
                                <th>Fecha de entrega Pedido Compras</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos as $dato)
                                <tr>
                                    <td>{{$dato['N° Pedido Cliente']}}</td>
                                    <td>{{$dato['Pos Ped Cliente']}}</td>
                                    <td>{{$dato['Material']}}</td>
                                    <td>{{$dato['Texto breve material']}}</td>
                                    <td>{{$dato['Cantidad de pedido']}}</td>
                                    <td>{{$dato['Q. Pdte Pedido de Venta']}}</td>
                                    <td>{{$dato['Cliente Solicitante']}}</td>
                                    <td>{{$dato['1ª Fecha']->format('d-m-Y')}}</td>
                                    <td>
                                        @if ($dato['FeFinOF'] != null && $dato['FeFinOF']->modify('+3 day') > $dato['1ª Fecha'])
                                            <span class="badge bg-danger">
                                        @else
                                            <span>
                                        @endif
                                            {{$dato['FeFinOF'] != null ? $dato['FeFinOF']->format('d-m-Y') : ""}}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($dato['Fecha de entrega Pedido Compras'] != null && $dato['Fecha de entrega Pedido Compras']->modify('+3 day') > $dato['1ª Fecha'])
                                            <span class="badge bg-danger">
                                        @else
                                            <span>
                                        @endif
                                        {{$dato['Fecha de entrega Pedido Compras'] != null ? $dato['Fecha de entrega Pedido Compras']->format('d-m-Y') : ""}}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('datatable', function(){
            $('#table').DataTable({
                dom: 'Blfrtip',
                lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10', '25', '50', 'Todas las' ]
                ],
                buttons: {
                    buttons: [
                        { extend: 'csv', className: 'btn-info mb-2', text: "Descargar CSV" },
                        { extend: 'excel', className: 'bg-primary mb-2', text: "Descargar Excel (xlsx)" }
                    ]
                },
                order: [2, "desc" ],
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Filas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Filas",
                    "infoFiltered": "(Filtrado de MAX total Filas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Filas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                        }
                },
            });
        });
        $('#archivoXlsx').change(function(e){
            let file = document.querySelector('input[type="file"]').files[0]
            @this.upload('file', file, (uploadedFilename) => {
                Swal.fire({
                    title: 'Cargando...',
                    text: 'Espere un momento',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    }
                });
                @this.load()
            }, () => {
                //Toast notification
                Toast.fire({
                    icon: 'error',
                    title: 'Error al cargar el archivo'
                })
            }, (event) => {
                // Progress callback.
                // event.detail.progress contains a number between 1 and 100 as the upload progresses.
            })
        });
    </script>
</div>