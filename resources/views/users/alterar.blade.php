@extends("admin_layout.index")

@section("admin_template")
<div class="container-fluid px-4">
    <h1 class="mt-4">Usuários</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">usuários</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Alteração do Usuário {{ $users->id }}
        </div>
        <div class="card-body">
            <form method="POST" action="/admUsers/upd">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id"
                        value="{{ $users->id}}" />

                    <div class="form-floating mb-3">
                        <input type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            placeholder="Digite o nome do usuário"
                            value="{{ $users->name }}" required>
                        <label for="floatingInput">Nome Usuário</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text"
                            class="form-control"
                            id="email"
                            name="email"
                            placeholder="Digite o email do usuário"
                            value="{{ $users->email }}" required>
                        <label for="floatingInput">Email</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password"
                            class="form-control"
                            id="password"
                            name="password"
                            placeholder="Digite a senha do usuário"
                            value="{{ $users->password }}" required>
                        <label for="floatingInput">Senha</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection