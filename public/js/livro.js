$(document).ready(function() {
    var way = window.location.pathname;
    if(way !="/AdicionaLivros"){
      buscaDados();
    }else{
      NextId();
    };
   

    function buscaDados() {
      $.getJSON("http://localhost:8000/api/livro/", function(data, status) {
        var sHtml = "";
        $.each(data, function(key, val) {        

          sHtml+= "<tr  class='registro' id='tr" + val.livrocodigo + "'>\
                    <td>" + val.autorcodigo + "</td>\
                    <td>" + val.categoriacodigo + "</td>\
                    <td>" + val.livrocodigo + "</td>\
                    <td>" + val.livrotitulo + "</td>\
                    <td>" + val.livroano + "</td>\
                    <td>\
                        <button id=" + val.livrocodigo + " class='btn alterar'><i class='far fa-edit'></i></button>\
                        <button id=" + val.livrocodigo + " class='btn excluir'><i class='fas fa-trash'></i></button>\
                    </td>\
                  </tr>";
                
        });
        sheader = "<table class='table'>\
                      <thead class='thead-dark'>\
                        <tr>\
                          <th scope='col'>IDAutor</th>\
                          <th scope='col'>IDCategoria</th>\
                          <th scope='col'>IDLivro</th>\
                          <th scope='col'>Nome</th>\
                          <th scope='col'>Ano</th>\
                          <th scope='col'>Ações</th>\
                        </tr>\
                      </thead>\
                      <tbody>";
        sfooter = "</tbody>\
        </table>";

        document.getElementById("tabela").innerHTML = sheader + sHtml + sfooter;
        
        $(".excluir").click(function() {
          let IDLivro = this.id; 
          if(IDLivro == "") {

          } else {
            //enviado
          $.ajax({
            type: "DELETE",
            url: "http://localhost:8000/api/livro/"+ IDLivro,
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
            window.location.href = "ConsultaLivros";
          });
          }
        });        

        $(".alterar").click(function(){              
          let IDLivro = this.id;       
          $("#tabela").load("AlteraLivros");
          carregaAlterar(IDLivro);
        }); 
        
      });
    };

    $("#adicionar").click(function(){              
      //let iIDProduto = this.id;     
      window.location.href = "AdicionaLivros";
    });

    function carregaAlterar(IDLivro){
      $.getJSON("http://localhost:8000/api/livro/"+ IDLivro, function(data, status) {
        $("#IDCategoria").val(data.categoriacodigo),
        $("#IDAutor").val(data.autorcodigo),
        $("#IDLivro").val(data.livrocodigo),
        $("#Titulo").val(data.livrotitulo),
        $("#Ano").val(data.livroano),

        $("#alterar").click(function() {             
            //enviado
            var settings = {
              "async": true,
              "crossDomain": true,
              "url": "http://localhost:8000/api/livro/"+$("#IDLivro").val(),
              "method": "PUT",
              "headers": {
                "Content-Type": "application/x-www-form-urlencoded",
                "Cache-Control": "no-cache",
              },
              "data": {
                "categoriacodigo": $("#IDCategoria").val(),
                "autorcodigo": $("#IDAutor").val(),
                "livrotitulo": $("#Titulo").val(),
                "livroano": $("#Ano").val()
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
    let IDCategoria        = $("#IDCategoria").val(),
        IDAutor            = $("#IDAutor").val(),
        Titulo             = $("#Titulo").val(),
        Ano                = $("#Ano").val();
      var settings = {
        "async": true,
        "crossDomain": true,
        "url": "http://localhost:8000/api/livro",
        "method": "POST",
        "data": {
          "categoriacodigo"   : IDCategoria,
          "autorcodigo"       : IDAutor,
          "livrotitulo"       : Titulo,
          "livroano"          : Ano
        }
      }
      
      $.ajax(settings).done(function (response) {
        alert("O livro foi cadastrado com sucesso!");
        window.location.href = "ConsultaLivros";
      });        
    });         
  
    $("#cancelar").click(function(){
      window.location.href = "ConsultaLivros";
    });    
  
    function NextId(){
      $.getJSON("http://localhost:8000/api/livro/", function(data, status) {
        let max = 0;
        $.each(data, function(key, val) {
          val.livrocodigo > max ? max = val.livrocodigo :"";
        }); 
        $("#IDLivro").val(max+1); 
      });
    }

  });