{ "collection" :
    {
        "title" : "Book Database",
            "type" : "book",
            "version" : "1.0",
            "href" : "{{ path_for('books')}}",
      
            "links" : [
                {"rel" : "profile" , "href" : "http://schema.org/Book","prompt":"Perfil"},
                {"rel" : "collection", "href" : "{{ path_for('movies') }}","prompt":"Movies"},
                {"rel" : "collection", "href" : "{{ path_for('books') }}","prompt":"Books"},
                {"rel" : "collection", "href" : "{{ path_for('musicalbums') }}","prompt":"Music Albums"}
            ],
      
            "items" : [
                {
                    "href" : "{{ path_for('books') }}/{{ item.id }}",
                        "data" : [
                            {"name" : "name", "value" : "{{ item.name }}", "prompt" : "Nombre del libro"},
                            {"name" : "description", "value" : "{{ item.description }}", "prompt" : "Descripción del libro"},
                            {"name" : "isbn", "value" : "{{ item.isbn }}", "prompt" : "ISBN del libro"},
                            {"name" : "datePublished", "value" : "{{ item.datePublished }}", "prompt" : "Fecha de publicación"},
                            {"name" : "image", "value" : "{{ item.image }}", "prompt" : "Imagen"}
                        ]
                        } 
	  
            ],
      
            "template" : {
            "data" : [
                {"name" : "name", "value" : "", "prompt" : "Nombre del libro"},
                {"name" : "description", "value" : "", "prompt" : "Descripción del libro"},
                {"name" : "isbn", "value" : "", "prompt" : "ISBN del libro"},
                {"name" : "datePublished", "value" : "", "prompt" : "Fecha de publicación"},
                {"name" : "image", "value" : "", "prompt" : "Imagen"}        
            ]
                }
    } 
}




