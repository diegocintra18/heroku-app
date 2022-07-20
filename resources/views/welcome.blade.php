            
@include('layouts.site-header')
<div class="col-5 mt-5 mb-5" style="margin: auto">
    <h2>Cadastre-se</h2>
    <form action="{{ route('clients.store') }}" method="POST" class="bg-white p-3">
        @csrf
        <div class="form-group">
            <label for="">Nome ou Nome da empresa<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="name" placeholder="João das Neves" id="name" aria-describedby="emailHelp" value="{{ old('name') }}" >
        </div>
        <div class="form-group">
            <label for="">E-mail <span class="text-danger">*</span></label>
            <input type="email" class="form-control" name="email" placeholder="ned-stark@winterfell.com" id="email" aria-describedby="emailHelp" value="{{ old('email') }}" >
        </div>
        <div class="form-group">
            <label for="">Whatsapp <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="phone" placeholder="(16)99123-4567" id="phone" value="{{ old('phone') }}"  >
        </div>
        <div class="form-group">
            <label for="">Senha (no mínimo 8 digitos)<span class="text-danger">*</span></label>
            <input type="password" class="form-control" name="password" id="password" >
        </div>
        <div class="form-group">
            <label for="">CNPJ <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="cnpj" placeholder="12.345.678/0001-99" id="cnpj" value="{{ old('cnpj') }}"  >
        </div>
        <div class="form-group">
            <label for="">CEP <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="zipcode" placeholder="12.345-000" id="zipcode" value="{{ old('zipcode') }}"  >
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="">Logradouro <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="address_name" id="address_name" value="{{ old('address_name') }}"  >
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Número <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="address_number" id="address_number" value="{{ old('address_number') }}"  >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="">Bairro <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="district" id="district" value="{{ old('district') }}"  >
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Complemento</label>
                    <input type="text" class="form-control" name="complement" id="complement" value="{{ old('complement') }}"  >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="">Cidade <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="city" id="city" value="{{ old('city') }}"  >
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Estado <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="state" id="state" value="{{ old('state') }}"  >
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
</div>
<!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
       
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
        -->

        <!-- Documentação das mascaras utilizadas: https://igorescobar.github.io/jQuery-Mask-Plugin/docs.html  -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

        <script>
            $(document).ready(function(){
                $('#phone').mask('(00)00000-0000');
                $('#cnpj').mask('00.000.000/0000-00', {reverse: false});
                $('#zipcode').mask('00.000-000');
        
                function cleanForm() {
                    $("#address_name").val("");
                    $("#district").val("");
                    $("#city").val("");
                    $("#state").val("");
                }
        
                $("#zipcode").blur(function() {
                    var zipcode = $(this).val().replace(/\D/g, '');
        
                    if (zipcode != "") {
                        
                        var zipcodeValidate = /^[0-9]{8}$/;
        
                        if(zipcodeValidate.test(zipcode)) {
        
                            $("#address_name").val("consultando endereço...");
                            $("#district").val("consultando endereço...");
                            $("#city").val("consultando endereço...");
                            $("#state").val("consultando endereço...");
        
                            $.getJSON("https://viacep.com.br/ws/"+ zipcode +"/json/?callback=?", function(data) {
        
                                if (!("erro" in data)) {
                                    $("#address_name").val(data.logradouro);
                                    $("#district").val(data.bairro);
                                    $("#city").val(data.localidade);
                                    $("#state").val(data.uf);
        
                                    $("#zipcode").addClass('text-success border-success');
                                    $("#address_name").addClass('text-success border-success');
                                    $("#district").addClass('text-success border-success');
                                    $("#city").addClass('text-success border-success');
                                    $("#state").addClass('text-success border-success');
        
                                    $('#address_number').focus();
                                } else {
                                    cleanForm();
                                    alert("CEP não encontrado.");
                                }
                            });
                        }else {
                            cleanForm();
                            alert("Formato de CEP inválido.");
                        }
                    } else {
                        cleanForm();
                    }
                });
        
                $("#name").blur(function(){
                    if($(this).val() != ""){
                        $("#name").addClass('text-success border-success');
                    }else{
                        $("#name").addClass('text-danger border-danger');
                    }
                });
        
                $("#name").click(function(){
                    $("#name").removeClass('text-success border-success text-danger border-danger');
                });
        
                $("#email").blur(function(){
                    if($(this).val() != ""){
                        $("#email").addClass('text-success border-success');
                    }else{
                        $("#email").addClass('text-danger border-danger');
                    }
                });
        
                $("#email").click(function(){
                    $("#email").removeClass('text-success border-success text-danger border-danger');
                });
        
                $("#password").blur(function(){
                    if($(this) != ""){
                        $("#password").addClass('text-success border-success');
                    }else{
                        $("#password").addClass('text-danger border-danger');
                    }
                });
        
                $("#password").click(function(){
                    $("#password").removeClass('text-success border-success text-danger border-danger');
                });
        
                $("#business_name").blur(function(){
                    if($(this).val() != ""){
                        $("#business_name").addClass('text-success border-success');
                    }else{
                        $("#business_name").addClass('text-danger border-danger');
                    }
                });
        
                $("#business_name").click(function(){
                    $("#business_name").removeClass('text-success border-success text-danger border-danger');
                });
        
                $("#cnpj").blur(function(){
                    if($(this).val() != ""){
                        var cnpjValidate = /^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$/;
        
                        if(cnpjValidate.test($(this).val())){
                            var cnpj = $(this).val().replaceAll('.', '');
                            if(validarCNPJ(cnpj) == true){
                                $("#cnpj").addClass('text-success border-success');
                            }else{
                                $("#cnpj").addClass('text-danger border-danger');
                                alert("CNPJ inválido, tente novamente");
                            }
                        } else {
                            $("#cnpj").addClass('text-danger border-danger');
                            alert("CNPJ inválido, tente novamente");
                        }
                    } else {
                        $("#cnpj").addClass('text-danger border-danger');
                    }
                });
        
                $("#cnpj").click(function(){
                    $("#cnpj").removeClass('text-success border-success text-danger border-danger');
                });
        
                $("#phone").blur(function(){
                    if($(this).val() != ""){
                        $("#phone").addClass('text-success border-success');
                    }else{
                        $("#phone").addClass('text-danger border-danger');
                    }
                });
        
                $("#phone").click(function(){
                    $("#phone").removeClass('text-success border-success text-danger border-danger');
                });
        
                $("#address_number").blur(function(){
                    if($(this).val() != ""){
                        $("#address_number").addClass('text-success border-success');
                    }else{
                        $("#address_number").addClass('text-danger border-danger');
                    }
                });
        
                $("#address_number").click(function(){
                    $("#address_number").removeClass('text-success border-success text-danger border-danger');
                });
        
                function validarCNPJ(cnpj) {
                    cnpj = cnpj.replace(/[^\d]+/g,'');
        
                    if(cnpj == '') return false;
                    
                    if (cnpj.length != 14)
                        return false;
        
                    // Elimina CNPJs invalidos conhecidos
                    if (cnpj == "00000000000000" || 
                        cnpj == "11111111111111" || 
                        cnpj == "22222222222222" || 
                        cnpj == "33333333333333" || 
                        cnpj == "44444444444444" || 
                        cnpj == "55555555555555" || 
                        cnpj == "66666666666666" || 
                        cnpj == "77777777777777" || 
                        cnpj == "88888888888888" || 
                        cnpj == "99999999999999"){
                        return false;
                    }
                        
                    // Valida DVs
                    tamanho = cnpj.length - 2
                    numeros = cnpj.substring(0,tamanho);
                    digitos = cnpj.substring(tamanho);
                    soma = 0;
                    pos = tamanho - 7;
        
                    for (i = tamanho; i >= 1; i--) {
                        soma += numeros.charAt(tamanho - i) * pos--;
                        if (pos < 2){
                            pos = 9;
                        }
                    }
                    
                    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
                    if (resultado != digitos.charAt(0)){
                        return false;
                    }
                        
                    tamanho = tamanho + 1;
                    numeros = cnpj.substring(0,tamanho);
                    soma = 0;
                    pos = tamanho - 7;
        
                    for (i = tamanho; i >= 1; i--) {
                        soma += numeros.charAt(tamanho - i) * pos--;
                        if (pos < 2){
                            pos = 9;
                        }
                    }
        
                    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
                    if (resultado != digitos.charAt(1)){
                        return false;
                    }
                            
                    return true;
                }
            });
        </script>
    </body>
</html>
        
