@include('layouts.site-header')
@include('layouts.error')

<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="card mt-4">
                <div class="card-body bg-white">
                    <h3 class="text-center">Dados de Cadastro</h3>
                    <hr>
                    <span>Diego Cintra</span><br>
                    <span>E-mail: diegoffcintra@gmail.com</span><br>
                    <span>CNPJ: 36.771.571/0001-77</span><br>
                    <span>Razão Social: Fishway Pesca LTDA</span>
                </div>
            </div>
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
        <div class="col-7 float-right">
            <div class="mt-3">
                <div class="col">
                    <h2>Escolha o meio de pagamento</h2>
                </div>
                <div class="col mt-3">
                    <div class="card bg-white">
                        <div class="card-body">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                    <label class="form-check-label" for="exampleRadios1">
                                        <span>Boleto Bancário - <span>5% de Desconto</span></span>
                                    </label>
                                </div>
                            </div>
                            <!-- <div class="col">
                                <a href="" class="">
                                    <button class="btn btn-primary">Pagar</button>
                                </a>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col mt-3">
                    <div class="card bg-white">
                        <div class="card-body">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        <span>PIX - <span>10% de Desconto</span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mt-3">
                    <div class="card bg-white">
                        <div class="card-body">
                        <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                    <label class="form-check-label" for="exampleRadios1">
                                        <span>Cartão de Crédito</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.site-footer')