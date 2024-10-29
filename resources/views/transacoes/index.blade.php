@extends("admin_layout.index")

@section("admin_template")
<div class="container-fluid px-4">
    <h1 class="mt-4">Transações</h1>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Lista de Transações
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <th>ID</th>
                    <th>Usuário ID</th>
                    <th>Valor</th>
                    <th>Forma de Pagamento</th>
                    <th>Data</th>
                </thead>
                <tbody>
                    @foreach($transacao as $linha)
                    <tr>
                        <td>{{ $linha->id }}</td>
                        <td>{{ $linha->user_id }}</td>
                        <td>R${{ $linha->valor_transacao }}</td>
                        <td>{{ $linha->forma_pagamento }}</td>
                        <td>{{ $linha->data_transacao }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
