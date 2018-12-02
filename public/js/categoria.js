$(document).ready(function() {
    var way = window.location.pathname;
    if(way !="/AdicionaCategorias"){
      buscaDados();
    }else{
      NextId();
    };

    function buscaDados() {
      $.getJSON("http://localhost:8000/api/categoria", function(data, status) {
        var sHtml = "";
        $.each(data, function(key, val) {
   
          sHtml +=      "<tr  class='registro' id='tr" + val.categoriacodigo + "'>\
                          <td>" + val.categoriacodigo + "</td>\
                          <td>" + val.categoriadescricao + "</td>\
                          <td>\
                            <button id=" + val.categoriacodigo + " class='btn alterar'><i class='far fa-edit'></i></button>\
                            <button id=" + val.categoriacodigo + " class='btn excluir'><i class='fas fa-trash'></i></button>\
                          </td>\
                        </tr>";                   
        });  
        sheader = "<table class='table'>\
                    <thead class='thead-dark'>\
                        <tr>\
                            <th scope='col'>IDCategoria</th>\
                            <th scope='col'>Descrição</th>\
                            <th scope='col'>Ações</th>\
                        </tr>\
                    </thead>\
                    <tbody>"; 
        sfooter = "</tbody>\
        </table>";

        document.getElementById("tabela").innerHTML = sheader + sHtml + sfooter;

        $(".excluir").click(function() {
          let IDCategoria = this.id; 
          if(IDCategoria == "") {

          } else {
            //enviado
          $.ajax({
            type: "DELETE",
            url: "http://localhost:8000/api/categoria/"+ IDCategoria,
            success: function(data) {
              alert("Excluido com Sucesso!");
            },
            statusCode: {
              500: function() {
                alert( "Este registro não pode ser excluido pois viola o vinculo com outros registros" );
              }
            },
            contentType: "application/json",
            dataType: "json"
          }).then(res => {
            window.location.href = "ConsultaCategorias";
          });
          }
        });        

        $(".alterar").click(function(){              
          let IDCategoria = this.id;       
          $("#tabela").load("AlteraCategorias");
          carregaAlterar(IDCategoria);
        }); 
        
      });
    };

    function carregaAlterar(IDCategoria){
      $.getJSON("http://localhost:8000/api/categoria/"+ IDCategoria, function(data, status) {
        $("#IDCategoria").val(data.categoriacodigo),
        $("#Descricao").val(data.categoriadescricao);
        
        $("#alterar").click(function() {             
            //enviado
            var settings = {
              "async": true,
              "crossDomain": true,
              "url": "http://localhost:8000/api/categoria/"+$("#IDCategoria").val(),
              "method": "PUT",
              "data": {
                "categoriadescricao":  $("#Descricao").val()
              }
            }

            $.ajax(settings).done(function (response) {
              alert("A categoria foi alterada com sucesso!");
              buscaDados();
            });        
        });
      });
    };

    $("#gravar").click(function() {
      let Descricao         = $("#Descricao").val();
      var settings = {
        "async": true,
        "crossDomain": true,
        "url": "http://localhost:8000/api/categoria",
        "method": "POST",
        "data": {
          "categoriadescricao": Descricao
        }
      }
      
      $.ajax(settings).done(function (response) {
        alert("A categoria foi cadastrado com sucesso!");
        window.location.href = "ConsultaCategorias";
      });        
    });      
  
    $("#adicionar").click(function(){   
      window.location.href = "AdicionaCategorias";
    });

    $("#cancelar").click(function(){
      window.location.href = "ConsultaCategorias";
    });

    function NextId(){
      $.getJSON("http://localhost:8000/api/categoria/", function(data, status) {
        let max = 0;
        $.each(data, function(key, val) {
          val.categoriacodigo > max ? max = val.categoriacodigo :"";
        }); 
        $("#IDCategoria").val(max+1); 
      });
    }
  
});
