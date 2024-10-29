@extends("admin_layout.index")

@section("admin_template")
<div class="container-fluid px-4">
    <h1 class="mt-4">Usuários</h1>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Lista de Usuários
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <a href="#" class="btn btn-success"
                        data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Novo
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <th>ID</th>
                    <th>Nome Usuário</th>
                    <th>Email</th>
                    <th>Senha</th>
                    <th>Opções</th>
                </thead>
                <tbody>
                    @foreach($users as $linha)
                    <tr>
                        <td>{{ $linha->id }}</td>
                        <td>{{ $linha->name }}</td>
                        <td>{{ $linha->email }}</td>
                        <td>{{ $linha->password }}</td>
                        <td>
                            <a href='{{ route('user_upd', [ "id" => $linha->id ]) }}' class='btn btn-success'>
                                <li class='fa fa-pencil'></li>
                            </a>
                            |
                            <a href='{{ route('user_ex', [ "id" => $linha->id ]) }}'
                                class='btn btn-danger'>
                                <li class='fa fa-trash'></li>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="/admUsers">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Novo Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            placeholder="Digite o nome do usuário" required>
                        <label for="floatingInput">Nome Usuário</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text"
                            class="form-control"
                            id="email"
                            name="email"
                            placeholder="Digite o email do usuário" required>
                        <label for="floatingInput">Email</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password"
                            class="form-control"
                            id="password"
                            name="password"
                            placeholder="Digite a senha do usuário" required>
                        <label for="floatingInput">Senha</label>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection