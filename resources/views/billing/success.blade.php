@include('layouts.site-header')
@include('layouts.error')

<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="">
                <div class="alert">
                    <h2>Pedido efetuado com sucesso!</h2>
                    <div class="mt-3">
                        <strong class="mt-3">Nº do pedido: </strong><span>123</span><br>
                    </div>
                    <strong>Valor do pedido: </strong><span>R$ 49,90</span><br>
                    <strong>Status: </strong><span>Aguardando Pagamento</span><br>
                    <div class="mt-3 mb-3">
                        <strong><span>Código do PIX Copia e Cola: <span></strong><br>
                            <div class="form-group">
                                <textarea class="form-control" id="pixKey" rows="3">00020101021226990014br.gov.bcb.pix2577pix.bpp.com.br/23114447/qrs1/v2/01nrYOnZVEmM69ONbdfucZzVrlsl24ASW6Us6uXlLmVbg52040000530398654045.005802BR59102RPAY LTDA6009SAO PAULO62070503***6304067F</textarea>
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
                    <img src="https://cdn.2rpay.com.br/qrcodes/2022/07/040a763362d2051a88248e3be24a1ff2d502dc92.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function copyToClipBoard() {

var content = document.getElementById('pixKey');

content.select();
    document.execCommand('copy');
    alert("Chave PIX copiada com sucesso!");
}
</script>

@include('layouts.site-footer')