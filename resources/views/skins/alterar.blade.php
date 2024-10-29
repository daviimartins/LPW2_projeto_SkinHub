@extends("admin_layout.index")

@section("admin_template")
<div class="container-fluid px-4">
    <h1 class="mt-4">Skins</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">skins</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Alteração da Skin {{ $skins->id }}
        </div>
        <div class="card-body">
            <form method="POST" action="/admSkins/upd">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id"
                        value="{{ $skins->id}}" />

                    <div class="form-floating mb-3">
                        <input type="text"
                            class="form-control"
                            id="skin_nome"
                            name="skin_nome"
                            placeholder="Digite o nome da skin"
                            value="{{ $skins->skin_nome }}" required>
                        <label for="floatingInput">Nome Skin</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text"
                            class="form-control"
                            id="arma_nome"
                            name="arma_nome"
                            placeholder="Digite o nome da arma"
                            value="{{ $skins->arma_nome }}" required>
                        <label for="floatingInput">Nome Arma</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-control" id="raridade" name="raridade" required>
                            <option value="" disabled selected>Escolha a raridade da skin</option>
                            <option value="Extraordinary">Extraordinary</option>
                            <option value="Covert">Covert </option>
                            <option value="Classified">Classified</option>
                            <option value="Restricted">Restricted</option>
                            <option value="Mil-Spec">Mil-Spec</option>
                            <option value="Industrial Grade">Industrial Grade</option>
                        </select>
                        <label for="tipo">Raridade</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text"
                            class="form-control"
                            id="valor"
                            name="valor"
                            placeholder="Digite o valor da skin"
                            value="{{ $skins->valor }}" required>
                        <label for="floatingInput">Valor</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-control" id="tipo" name="tipo" required>
                            <option value="" disabled selected>Escolha o tipo de arma</option>
                            <option value="faca">Faca</option>
                            <option value="luva">Luva</option>
                            <option value="Rifle de Assalto">Rifle de Assalto</option>
                            <option value="Rifle de Precisão">Rifle de Precisão</option>
                            <option value="Pistola">Pistola</option>
                            <option value="Submetralhadora">Submetralhadora</option>
                        </select>
                        <label for="tipo">Tipo</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-control" id="exterior" name="exterior" required>
                            <option value="" disabled selected>Escolha o exterior de arma</option>
                            <option value="Nova de Fábrica">Nova de Fábrica</option>
                            <option value="Pouco Usada">Pouco Usada</option>
                            <option value="Testada em Campo">Testada em Campo</option>
                            <option value="Bem Desgastada">Bem Desgastada</option>
                            <option value="Veterana de Guerra">Veterana de Guerra</option>
                        </select>
                        <label for="tipo">Exterior</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text"
                            class="form-control"
                            id="url_imagem"
                            name="url_imagem"
                            placeholder="Digite a url da imagem da skin"
                            value="{{ $skins->url_imagem }}" required>
                        <label for="floatingInput">Imagem</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text"
                               class="form-control"
                               id="vendido"
                               name="vendido"
                               placeholder="Digite ao status da skin"
                               value="{{ $skins->vendido }}" required>
                        <label for="floatingInput">Status</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('adm_index') }}" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
