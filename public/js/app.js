function fLogar() {
    // event.preventDefault(); //Não mostrar login no link
    setTimeout("window.location='../index-user.php'", 0);
}

function fFalhaLogin(){
    setTimeout("window.location='../index.php'", 0);
    window.alert("Nome de usuário ou senha inválida! Tente novamente.");
}

// Outras telas
$("document").ready(function () {
    if(localStorage.getItem("imgFundo") !== ""){
        trocaFundo(localStorage.getItem("imgFundo"));
    }else{
        fTrocarFundo1();
    }
    $("#menuHamburguer,.overlay").on("click", fAbrirModal);//Mostrar modal
    $(".overlay").on("click", fFechaModal);//Tirar overlay
    $(".btConfiguracao").on("click", fAbrirConfig); //Abrir menu de configuração
    $(".criar-usuario").on("click", fAbrirCadastro); //Cadastro de usuário
    $("#fundo1").on("click", fTrocarFundo1);
    $("#fundo2").on("click", fTrocarFundo2);
    $("#fundo3").on("click", fTrocarFundo3);
});

function fAbrirModal() {//Mostrar tela outras contas ao clicar
    $(".overlay,#modal").show();
}

function fFechaModal() {//Fechar tela outras contas
    $(".overlay,#modal,#menu-configuracao,#menu-Cadastro").hide();
}

function fAbrirConfig() {
    $(".overlay,#menu-configuracao").show();
}

function fAbrirCadastro(){
    $(".overlay,#menu-Cadastro").show();
}

function fTrocarFundo1(){
    trocaFundo('https://images.pexels.com/photos/2849042/pexels-photo-2849042.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');
}

function fTrocarFundo2(){
    trocaFundo('https://i.pinimg.com/originals/3b/8a/d2/3b8ad2c7b1be2caf24321c852103598a.jpg');
}

function fTrocarFundo3(){
    trocaFundo('https://image.winudf.com/v2/image1/Y29tLm1vYmlsZXVuaXZlcnNpdHkuc3BhY2Vfc2NyZWVuXzJfMTU0MzI5MzY5OV8wNTM/screen-2.jpg?fakeurl=1&type=.jpg');
}

function trocaFundo(fundo){
    if (typeof(Storage) !== "undefined") {
        localStorage.setItem("imgFundo", fundo);
    }
    document.body.style.backgroundImage = "url("+fundo+")";
    document.body.style.backgroundSize = "cover";
    document.body.style.backgroundAttachment = "fixed";
}
