

/**
 * EXECUTA A FUNÇÃO "ATUALIZA" PARA VERIFICAR SE HÁ ALGUMA NOTIFICAÇÃO
 */
$(document).ready(function() {
  atualiza();
});
  /**
   * FUNÇÃO ATUALIZA QUE BUCA A PÁGINA AÇÃO PARA IMPRIMIR NA ID NOTIFICAÇÃO
   */

function atualiza(){
  $.get("/new_sistem/dist/php/acao.php", function(resultado){

if(resultado == ""){
resultadoA = "0";
    $('.notiA').html(resultadoA);
    $('.noti').html(resultado);
    tst = resultado + 2;
}else{
    $('.notiA').html(resultado);
    $('.noti').html(resultado);
    tst = resultado + 2;
}

  })

/**
* FUNÇÃO E TEMPO DE ATUALIZAÇÃO DA ID NOTIFICAÇÃO
*/
  setInterval('atualiza()', 100000);
  
}

/* FUNÇÃO PARA O TITULO */


var title = document.title;

$(document).ready(function() {
  changeTitle();
});
  
  function changeTitle() {
    $.get("/new_sistem/dist/php/acao.php", function(resultado){
    if (resultado == "") {
    var newTitle = ''+ title;
     document.title = newTitle;
    }else{
    var newTitle = '(' + resultado + ') ' + title;
    document.title = newTitle;
   } })
}

function newUpdate() {
    update = setInterval(changeTitle, 100000);
}
var docBody = document.getElementById('body-athena');
docBody.onload = newUpdate;