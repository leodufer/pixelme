<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Application;



$app->get('/fotos', function(){
    $fotos = R::findAll('foto',' ORDER BY id DESC LIMIT 50 ');
    //$fotos = R::findAll('foto');
    $res = array();
    foreach ($fotos as $f) {
        $r = array(
               'id'=>$f->id,
               'datauri'=>$f->datauri,
               'tag'=>$f->tag,
               'evento'=>$f->evento,
               'fecha'=>$f->fecha
            );
        $res[] = $r;
    }

    return new Response(json_encode($res), 200); 
});

$app->get('/fotos/{page}', function(Request $request, $page){
    $init = 50*$page;
    $max = $init+50;
    $query = ' ORDER BY id DESC LIMIT '.$init.','.$max;
    //echo $query;
     $fotos = R::findAll('foto', $query);
    //$fotos = R::findAll('foto');
    $res = array();
    foreach ($fotos as $f) {
        $r = array(
               'id'=>$f->id,
               'datauri'=>$f->datauri,
               'tag'=>$f->tag,
               'evento'=>$f->evento,
               'fecha'=>$f->fecha
            );
        $res[] = $r;
    }

    return new Response(json_encode($res), 200); 
});

$app->post('/fotos', function(Request $request){
 

    $f = R::dispense('foto');
    $f->datauri = $request->get('datauri');
    $f->tag = $request->get('tag');
    $f->evento = $request->get('evento');
    $f->fecha = $request->get('fecha');
    $id = R::store($f);
    $r = array(
            'id'=>$id,
            'datauri'=>$f->datauri,
            'tag'=>$f->tag,
            'evento'=>$f->evento,
            'fecha'=>$f->fecha
        );
    return new Response(json_encode(array($r)), 201);
    
});

return $app;