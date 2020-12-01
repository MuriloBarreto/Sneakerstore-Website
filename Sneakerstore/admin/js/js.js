$(document).ready(function(){
    $("#categorias").change(function(){
       var id_cat = $(this).val();
        $.ajax({
            type : "get",
            url : "./op/retornoSubcategoria.php",
            data : {"id": id_cat},
            success : function(data){
                var subcategorias = "";
                $.each($.parseJSON(data), function(chave, valor){
                    subcategorias +='<option value="'+ valor.id_subcategoria + '">'+ valor.subcategoria + '</option>'
                })
                $("#subcategorias").html(subcategorias);
            }
        })
    })

})