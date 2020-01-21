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
    $(".menuHamburguer,.overlay").on("click", fAbrirModal);//Mostrar modal
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
    trocaFundo('img/fundo.jpeg');
}

function fTrocarFundo2(){
    trocaFundo('img/fundo2.jpg');
}

function fTrocarFundo3(){
    trocaFundo('img/fundo3.jpg');
}

function trocaFundo(fundo){
    if (typeof(Storage) !== "undefined") {
        localStorage.setItem("imgFundo", fundo);
    }
    document.body.style.backgroundImage = "url("+fundo+")";
    document.body.style.backgroundSize = "cover";
    document.body.style.backgroundAttachment = "fixed";
}