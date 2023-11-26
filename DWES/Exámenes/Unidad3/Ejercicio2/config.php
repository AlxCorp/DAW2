<?php 
#array de idiomas
//Este es un array de idiomas
define("IDIOMAS", 
["Español", "Inglés","Francés", "Aleman","Italiano","Portugués"]
);

#array con el cuestionario.
// Sustituye este comentario por la descripción del array
define("PREGUNTAS",
[
    ["pregunta" => "The room where secretaries work is called an .....",
	     "Tipo"=>"text",
         "Respuesta"=>["office"],
	     "Acierto"=>1,
         "Fallo"=>0],
    ["pregunta" => "To go to the top of the building you can take the .....",
	     "Tipo"=>"text",
         "Respuesta"=>["lift","elevator"],
	     "Acierto"=>1,
         "Fallo"=>0],
    ["pregunta" => "I ..... tennis every Sunday morning.",
	     "Tipo"=>"Multiple-choice",
         "Opciones"=>["playing","play","am playing","am play"],
	     "Respuesta"=>"play",
         "Acierto"=>1,
         "Fallo"=>-0.25],
	["pregunta" => "Don't make so much noise. Noriko ..... to study for her ESL test!",
	     "Tipo"=>"Multiple-choice",
         "Opciones"=>["try","tries","tried","is trying"],
	     "Respuesta"=>"is trying",
         "Acierto"=>1,
         "Fallo"=>-0.25],
	["pregunta" => "Jun-Sik ..... his teeth before breakfast every morning.",
	     "Tipo"=>"Multiple-choice",
         "Opciones"=>["will cleaned","is cleaning","cleans","clean"],
	     "Respuesta"=>"cleans",
         "Acierto"=>1,
         "Fallo"=>-0.25],
	["pregunta" => "Sorry, she can't come to the phone. She ..... a bath!",
	     "Tipo"=>"Multiple-choice",
         "Opciones"=>["is having","having","have","has"],
	     "Respuesta"=>"is having",
         "Acierto"=>1,
         "Fallo"=>-0.25],
	["pregunta" => "	..... many times every winter in Frankfurt.",
	    "Tipo"=>"Multiple-choice",
         "Opciones"=>["It snows","snowed","It is snowing","It is snow"],
		   "Respuesta"=>"It snows",
         "Acierto"=>1,
         "Fallo"=>-0.25]   
]
);
?>