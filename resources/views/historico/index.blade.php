@extends("admin_layout.index")

@section("admin_template")
<div class="container-fluid px-4">
    <h1 class="mt-4">Histórico</h1>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Históricos de Saída
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <th>ID</th>
                    <th>Usuário ID</th>
                    <th>Skin ID</th>
                    <th>Data</th>
                </thead>
                <tbody>
                    @foreach($historico as $linha)
                    <tr>
                        <td>{{ $linha->id }}</td>
                        <td>{{ $linha->user_id }}</td>
                        <td>{{ $linha->skins_id }}</td>
                        <td>{{ $linha->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
