{ "collection" :
    {
        "title" : "VideoGame Database",
            "type" : "VideoGame",
            "version" : "1.0",
            "href" : "{{ path_for('games')}}",
      
            "links" : [
                {"rel" : "profile" , "href" : "http://schema.org/videogames","prompt":"Perfil"},
                {"rel" : "collection", "href" : "{{ path_for('movies') }}","prompt":"Movies"},
                {"rel" : "collection", "href" : "{{ path_for('books') }}","prompt":"Books"},
                {"rel" : "collection", "href" : "{{ path_for('musicalbums') }}","prompt":"Music Albums"},
                {"rel" : "collection", "href" : "{{ path_for('games') }}","prompt":"Videogames"}
            ],
      
            "items" : [
                {
                    "href" : "{{ path_for('games') }}/{{ item.id }}",
                        "data" : [
                            {"name" : "name", "value" : "{{ item.name }}", "prompt" : "Nombre del Juego"},
                            {"name" : "description", "value" : "{{ item.description }}", "prompt" : "Descripción del Juego"},
                            {"name" : "gamePlatform", "value" : "{{ item.gamePlatform }}", "prompt" : "Plataforma del Juego"},
                            {"name" : "applicationSubCategory", "value" : "{{ item.applicationSubCategory }}", "prompt" : "Categoria del Juego"},
                            {"name" : "screenshot", "value" : "{{ item.screenshot }}", "prompt" : "URL of a captura del juego"},
                            {"name" : "datePublished", "value" : "{{ item.datePublished }}", "prompt" : "Fecha de lanzamiento"},
                            {"name" : "embedUrl", "value" : "{{ item.embedUrl }}", "prompt" : "Trailer en Youtube"}
                        ]
                        } 
	  
            ],
      
            "template" : {
            "data" : [
                {"name" : "name", "value" : "", "prompt" : "Nombre del Juego"},
                {"name" : "description", "value" : "", "prompt" : "Descripción del Juego"},
                {"name" : "gamePlatform", "value" : "", "prompt" : "Plataforma del Juego"},
                {"name" : "applicationSubCategory", "value" : "", "prompt" : "Categoria del Juego"},
                {"name" : "screenshot", "value" : "", "prompt" : "URL of a captura del juego"},
                {"name" : "datePublished", "value" : "", "prompt" : "Fecha de lanzamiento"},
                {"name" : "embedUrl", "value" : "", "prompt" : "Trailer en Youtube"}
            ]
                }
    } 
}




