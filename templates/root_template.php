{ "collection" :
    {
        "title" : "Multimedia Database",
            "type" : "index",
            "version" : "1.0",
            "href" : "{{ path_for('root')}}",
      
            "links" : [
                {"rel" : "collection", "href" : "{{ path_for('movies') }}","prompt":"Movies"},
                {"rel" : "collection", "href" : "{{ path_for('books') }}","prompt":"Books"},
                {"rel" : "collection", "href" : "{{ path_for('musicalbums') }}","prompt":"Music Albums"},
                {"rel" : "collection", "href" : "{{ path_for('games') }}","prompt":"Videogames"}
            ]
            }
}	
