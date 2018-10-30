{ "collection" :
    {
        "title" : "MusicAlbum Database",
            "type" : "music",
            "version" : "1.0",
            "href" : "{{ path_for('musicalbums')}}",
      
            "links" : [
                {"rel" : "profile" , "href" : "http://schema.org/MusicAlbums","prompt":"Perfil"},
                {"rel" : "collection", "href" : "{{ path_for('movies') }}","prompt":"Movies"},
                {"rel" : "collection", "href" : "{{ path_for('books') }}","prompt":"Books"},
                {"rel" : "collection", "href" : "{{ path_for('musicalbums') }}","prompt":"Music Albums"}
            ],
      
            "items" : [
                {
                    "href" : "{{ path_for('musicalbums') }}/{{ item.id }}",
                        "data" : [
                            {"name" : "name", "value" : "{{ item.name }}", "prompt" : "Nombre del Album"},
                            {"name" : "description", "value" : "{{ item.description }}", "prompt" : "Descripción del Album"},
                            {"name" : "datePublished", "value" : "{{ item.datePublished }}", "prompt" : "Fecha de publicación"},
                            {"name" : "image", "value" : "{{ item.image }}", "prompt" : "Imagen"},
                            {"name" : "embedUrl", "value" : "{{ item.embedUrl }}", "prompt" : "URL"}
                        ]
                        } 
	  
            ],
      
            "template" : {
            "data" : [
                {"name" : "name", "value" : "", "prompt" : "Nombre del Album"},
                {"name" : "description", "value" : "", "prompt" : "Descripción del Album"},
                {"name" : "datePublished", "value" : "", "prompt" : "Fecha de publicación"},
                {"name" : "image", "value" : "", "prompt" : "Imagen"},
                {"name" : "embedUrl", "value" : "", "prompt" : "URL"}     
            ]
                }
    } 
}




