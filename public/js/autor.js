$(document).ready(function() {
    var way = window.location.pathname;
    if(way !="/AdicionaAutores"){
      buscaDados();
    }else{
      NextId();
    };

    function buscaDados() {
      $.getJSON("http://localhost:8000/api/autor/", function(data, status) {
        var sHtml = "";
        $.each(data, function(key, val) {
   
          sHtml += "<tr  class='registro' id='tr" + val.autorcodigo + "'>\
                        <td>" + val.autorcodigo + "</td>\
                        <td>" + val.autornome+ "</td>\
                        <td>" + val.autoridade + "</td>\
                        <td>\
                            <button id=" + val.autorcodigo + " class='btn alterar'><i class='far fa-edit'></i></button>\
                            <button id=" + val.autorcodigo + " class='btn excluir'><i class='fas fa-trash'></i></button>\
                        </td>\
                    </tr>";
        });
        sheader = "<table class='table'>\
        <thead class='thead-dark'>\
            <tr>\
                <th scope='col'>IDAutor</th>\
                <th scope='col'>Nome</th>\
                <th scope='col'>Idade</th>\
                <th scope='col'>Ações</th>\
            </tr>\
        </thead>\
        <tbody id='tabela'>";
        sfooter = "</tbody>\
                </table>";

        document.getElementById("tabela").innerHTML = sheader + sHtml + sfooter;
        
        $(".excluir").click(function() {
          let IDAutor = this.id; 
          if(IDAutor == "") {

          } else {
            //enviado
          $.ajax({
            type: "DELETE",
            url: "http://localhost:8000/api/autor/"+ IDAutor,
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
            window.location.href = "ConsultaAutores";
          });
          }
        });        

        $(".alterar").click(function(){              
          let IDAutor = this.id;       
          $("#tabela").load("AlteraAutores");
          carregaAlterar(IDAutor);
        }); 
        
      });
    };

    $("#adicionar").click(function(){   
      window.location.href = "AdicionaAutores";
    });

    function carregaAlterar(IDAutor){
      $.getJSON("http://localhost:8000/api/autor/"+ IDAutor, function(data, status) {
        $("#IDAutor").val(data.autorcodigo),
        $("#Nome").val(data.autornome),
        $("#Idade").val(data.autoridade),

        $("#alterar").click(function() {             
            //enviado
            var settings = {
              "async": true,
              "crossDomain": true,
              "url": "http://localhost:8000/api/autor/"+ $("#IDAutor").val(),
              "method": "PUT",
              "data": {
                "autornome":   $("#Nome").val(),
                "autoridade":  $("#Idade").val(), 
              }
            }

            $.ajax(settings).done(function (response) {
              alert("O autor foi alterada com sucesso!");
              buscaDados();
            });        
        });
      });
    };
       
      
    $("#gravar").click(function() {
      let Nome          = $("#Nome").val(),
          Idade         = $("#Idade").val();

      var settings = {
        "async": true,
        "crossDomain": true,
        "url": "http://localhost:8000/api/autor",
        "method": "POST",
        "data": {
          "autornome"   : Nome,
          "autoridade"  : Idade
        }
      }
      
      $.ajax(settings).done(function (response) {
        alert("O autor foi cadastrado com sucesso!");
        window.location.href = "ConsultaAutores";
      });        
    });     
  
    $("#adicionar").click(function(){   
      window.location.href = "AdicionaAutores";
    });

    $("#cancelar").click(function(){
      window.location.href = "ConsultaAutores";
    });

    function NextId(){
      $.getJSON("http://localhost:8000/api/autor/", function(data, status) {
        let max = 0;
        $.each(data, function(key, val) {
          val.autorcodigo > max ? max = val.autorcodigo :"";
        }); 
        $("#IDAutor").val(max+1); 
      });
    }   
  
});