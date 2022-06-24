<!-- Zendesk Modal -->
<div class="modal fade" id="zendeskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Integração com o Zendesk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('zendesk.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email de acesso ao Zendesk</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user_email" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Senha</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Sub-domínio da conta ex: empresa.zendesk.com</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="domain" placeholder="empresa.zendesk.com">
                    </div>
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>