@include('layouts.site-header')
@include('layouts.error')
<div class="container mb-5">
    <div class="row">
        <div class="col-8">
            <div class="">
                <div class="alert">
                    <h2>Pedido efetuado com sucesso!</h2>
                    <div class="mt-3">
                        <strong class="mt-3">Nº do pedido: </strong><span>{{ $paymentInfo->id }}</span><br>
                    </div>
                    <strong>Valor do pedido: </strong><span>R$ {{ number_format($paymentInfo->amount/100, 2, ',', '.') }}</span><br>
                    <strong>Status: </strong><span>Aguardando Pagamento</span><br>
                    <div class="mt-3 mb-3">
                        <strong><span>Chave do PIX Copia e Cola: <span></strong><br>
                            <div class="form-group">
                                <textarea class="form-control" id="pixKey" rows="3">{{ $paymentInfo->pix->code }}</textarea>
                            </div>
                            <button class="btn btn-primary" onclick="copyToClipBoard()">Copiar chave PIX</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body bg-white">
                    <center>
                        <h2>Pague com QRCode</h2>
                    </center>
                    <img src="{{ $paymentInfo->pix->qrcode }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal"id="pixModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-3">
                <center class="mt-3">
                    <span class="h3">Chave PIX copiada com sucesso!</span>
                    <div class="mt-3 mb-3">
                        <button type="button" class="btn btn-success btn-large pr-3 pl-3" data-dismiss="modal">OK</button>
                        <button type="button" class="btn btn-secondary btn-large pr-3 pl-3" data-dismiss="modal">Fechar</button>
                    </div>
                </center>
            </div>
        </div>
    </div>
</div>

<script>
    function copyToClipBoard() {

    var content = document.getElementById('pixKey');

    content.select();
        document.execCommand('copy');
        $('#pixModal').modal(focus);
    }
</script>

@include('layouts.site-footer')