@extends("admin_layout.index")

@section("admin_template")
<div class="container-fluid px-4">
    <h1 class="mt-4">Skins</h1>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Lista de Skins
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
                    <th>Nome Skin</th>
                    <th>Nome Arma</th>
                    <th>Raridade</th>
                    <th>Valor</th>
                    <th>Tipo</th>
                    <th>Exterior</th>
                    <th>Status</th>
                    <th>Opções</th>
                </thead>
                <tbody>
                    @foreach($skins as $linha)
                    <tr>
                        <td>{{ $linha->id }}</td>
                        <td>{{ $linha->skin_nome }}</td>
                        <td>{{ $linha->arma_nome }}</td>
                        <td>{{ $linha->raridade }}</td>
                        <td>R${{ $linha->valor }}</td>
                        <td>{{ $linha->tipo }}</td>
                        <td>{{ $linha->exterior }}</td>
                        <td>{{ $linha->vendido }}</td>
                        <td>
                            <a href='{{ route('skin_upd', [ "id" => $linha->id ]) }}' class='btn btn-success'>
                                <li class='fa fa-pencil'></li>
                            </a>
                            |
                            <a href='{{ route('skin_ex', [ "id" => $linha->id ]) }}'
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
            <form method="POST" action="/admSkins">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nova Skin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text"
                            class="form-control"
                            id="skin_nome"
                            name="skin_nome"
                            placeholder="Digite o nome da skin" required>
                        <label for="floatingInput">Nome Skin</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text"
                            class="form-control"
                            id="arma_nome"
                            name="arma_nome"
                            placeholder="Digite o nome da arma" required>
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
                            placeholder="Digite o valor da skin" required>
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
                            placeholder="Digite a url da imagem da skin" required>
                        <label for="floatingInput">Imagem</label>
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
