<script>
    $(document).ready(function() {
        $("#senha_nova").keyup(checkPasswordMatch);
        $("#senha_confirmar").keyup(checkPasswordMatch);
 
    });
    function checarSenha() {
        var password = $("#senha_nova").val();
        var confirmPassword = $("#senha_confirmar").val();
 
 
        if (senha == '' || '' == confirma_senha) {
            $("#divcheck").html("<span style='color: red'>Campo de senha vazio!</span>");
            document.getElementById("enviarsenha").disabled = true;
        } else if (senha != confirma_senha) {
            $("#divcheck").html("<span style='color: red'>Senhas não conferem!</span>");
            document.getElementById("enviarsenha").disabled = true;
        } else {
            $("#divcheck").html("<span style='color: green'>Senha iguais!</span>");
            document.getElementById("enviarsenha").disabled = false;
        }
    }
</script>

