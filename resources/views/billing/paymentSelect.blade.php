@include('layouts.site-header')
@include('layouts.error')

<div class="container">
    <div class="row">
        <div class="col-7 float-right">
            <div class="mt-3">
                <div class="col">
                    <h2>Escolha o meio de pagamento</h2>
                </div>
                <div class="col mt-3">
                    <form action="">
                        <div class="card bg-white">
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                    <label class="form-check-label" for="exampleRadios1">
                                        <span>Boleto Bancário</span>
                                    </label>
                                </div>
                                <hr>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        <span>PIX </span><span class="badge badge-pill badge-primary">Aprovação Imediata</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="client_id" value="{{$client->id}}">
                        <button class="btn btn-success btn-lg mt-3">Efetuar Pagamento</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card mt-4">
                <div class="card-body bg-white">
                    <h3 class="text-center">Dados Cadastrais</h3>
                    <hr>
                    <span>{{ $client->name }}</span><br>
                    <span>E-mail: {{ $client->email }}</span><br>
                    <span>CNPJ: {{ $client->cnpj }}</span><br>
                    @if(isset($client->business_name))
                        <span>Razão Social: {{ $client->business_name }}</span>
                    @endif
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
                    {{-- <form action="">
                        <div class="form-group">
                            <label for="">Cupom de Desconto:</label>
                            <input type="text" name="coupon" id="" class="form-control">
                        </div>
                        <button class="btn btn-info btn-block">Aplicar cupom</button>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.site-footer')