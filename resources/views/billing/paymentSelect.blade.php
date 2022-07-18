@include('layouts.site-header')
@include('layouts.error')

<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="card mt-4">
                <div class="card-body bg-white p-3">
                    <h3 class="text-center">Resumo do pedido</h3>
                    <hr>
                    <span class="">Assinatura básica: R$ 49,90</span>
                    <br>
                    <span class="">Descontos: R$ 0,00</span>
                    <hr>
                    <strong><span class="">Total: R$ 49,90</span></strong>
                    <hr>
                    <form action="">
                        <div class="form-group">
                            <label for="">Cupom de Desconto:</label>
                            <input type="text" name="coupon" id="" class="form-control">
                        </div>
                        <button class="btn btn-info btn-block">Aplicar cupom</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8 float-right">
            <div class="mt-3">
                <div class="col">
                    <h2>Escolha o meio de pagamento</h2>
                </div>
                <div class="col mt-3">
                    <div class="card bg-white">
                        <div class="card-body">
                            <span>Boleto Bancário</span>
                            <a href="" class="float-right">
                                <button class="btn btn-primary">Pagar</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col mt-3">
                    <div class="card bg-white">
                        <div class="card-body">
                            <span>PIX </span>
                            <span class="badge badge-success ml-2">Aprovação Imediata</span>
                            <a href="" class="float-right">
                                <button class="btn btn-primary">Pagar</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col mt-3">
                    <div class="card bg-white">
                        <div class="card-body">
                            <span>Cartão de Crédito </span>
                            <a href="" class="float-right">
                                <button class="btn btn-primary">Pagar</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.site-footer')