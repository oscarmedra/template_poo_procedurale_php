// c'est içi que doit etre gerer tout mes ajout de fomulaire je compte utiliser ajax avec jquery .
$(
    function(){
        $('form#ajout').submit(function(e){
            e.preventDefault();
            $.post('./index.php?p=ajout&message', $(this).serialize()).done(result =>{
                if(!result)
                {
                    // si t'a une erreur a signaler tu le fait içi
                    return null;
                }


                // si sa arrive içi c'est par ce que tout est bon 

                let [data] = JSON.parse(result);
                $('#contents').append('<div class="cmb-2 rounded my-1 border rounded border text-light rounded alert">'+data["content"]+'</div>');
                $('form#ajout').find('textarea')[0].content = '';

            });
        });
    }
)