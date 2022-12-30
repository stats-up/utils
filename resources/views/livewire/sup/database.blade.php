<div>
    @livewire('sup.nav')
    <div class="container">
        @if ($error != "")
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @else
            <div class="row">
                <div class="col-md-4">
                    <div class="list-group">
                        @foreach ($tables as $table)
                        <div class="list-group-item ">
                            <span  >
                                {{$table["name"]}}
                            </span>
                            <div class="text-end">
                                <a wire:click="selectTable('{{$table["name"]}}')" class="load" href="#" >Estructura</a>
                                <a wire:click="selectTableData('{{$table["name"]}}')" class="load" href="#">Datos</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-8">
                    @if($selectedTable != null)
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Campos</h5>
                            </div>
                            <div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>campo</th>
                                            <th>tipo</th>
                                            <th>Nulo</th>
                                            <th>Llave</th>
                                            <th>Valor por defecto</th>
                                            <th>Otros</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($selectedTable as $column)
                                            <tr>
                                                <td>{{$column["index"]}}</td>
                                                <td>{{$column["name"]}}</td>
                                                <td>{{$column["type"]}}</td>
                                                <td>{{$column["null"]}}</td>
                                                <td>{{$column["key"]}}</td>
                                                <td>{{$column["default"]}}</td>
                                                <td>{{$column["extra"]}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                    @if($selectedTableData != null)
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Datos</h5>
                            </div>
                            <div>
                                <table class="table table-bordered">
                                    @php $index = 0; @endphp
                                    @foreach ($selectedTableData as $row)
                                        @if ($index == 0)
                                            <thead>
                                                <tr>
                                                @for ($i = 0; $i < count($row); $i++)
                                                    <th>{{$row[$i]}}</th>
                                                @endfor
                                                </tr>
                                            </thead>
                                        @else
                                            <tbody>
                                                @foreach ($row as $item)
                                                    <td>{{$item}}</td>
                                                @endforeach
                                            </tbody>
                                        @endif
                                        @php $index++; @endphp
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>
