<?php

require "./vendor/autoload.php";
require "./vendor/easyrdf/easyrdf/lib/Graph.php";
require "./vendor/easyrdf/easyrdf/lib/GraphStore.php";

\EasyRdf\RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
\EasyRdf\RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
\EasyRdf\RdfNamespace::set('dbr', 'http://dbpedia.org/resource/');
\EasyRdf\RdfNamespace::set('foaf', 'http://xmlns.com/foaf/0.1/');
\EasyRdf\RdfNamespace::set('owl', 'http://www.w3.org/2002/07/owl#');
\EasyRdf\RdfNamespace::set('dct', 'http://purl.org/dc/terms/');
\EasyRdf\RdfNamespace::set('muzzy', 'https://example.org/schema/muzzy');

$sparqlDbPedia = new \EasyRdf\Sparql\Client('http://dbpedia.org/sparql');
$sparqlJena = new \EasyRdf\Sparql\Client('http://127.0.0.1:3030/muzzy/sparql');