<?php
use Pecee\SimpleRouter\SimpleRouter as Router;
use Jdev2\Apij\app\controllers\SerieController;

Router::get('/', function() {
    return Router::response()->json(["Api about anime series, please add /api in the URL"]);
});

Router::get('/api', function() {
    return Router::response()->json(["Api about anime series, to use it, please add /series in the URL after /api/"]);
});

// HTTP verbs an the example of each one

// GET
Router::get("/api/series", function () {
    return (new SerieController)->returnAllSeries();
});
Router::get("/api/series/{id}", function ($id) {
    return (new SerieController)->returnSpecificSerie($id);
});

// POST -- ¡NO DATA RECEIVED VIA URL BY POST!
Router::post("/api/series/", function () {
    // It's possible get the data here or in the method of the controller calling the input method
    $title = input("title") ?? "";
    $description = input("description") ?? "";
    $gender = input("gender") ?? "";
    $seasons_number = input("seasons_number") ?? "";
    return (new SerieController)->addSerie($title, $description, $gender, $seasons_number);
});
// PUT
Router::put("/api/series/", function (){
    $id = input("id") ?? "";
    $title = input("title") ?? "";
    $description = input("description") ?? "";
    $gender = input("gender") ?? "";
    $seasons_number = input("seasons_number") ?? "";
    return (new SerieController)->updateSerie($id, $title, $description, $gender, $seasons_number);
});
// DELETE
Router::delete("/api/series/", function (){
    $id = input("id") ?? "";
    return (new SerieController)->deleteSerie($id);
});

/* Router::get('/api/series', function() {
    $serie1 = "Don't toy wiht me, Miss Nagatoro";
    $serie2 = "My Dress Up Darling";
    $series = ["1" => $serie1, "2" => $serie2];
    $series2 = ["3" => $serie1, "4" => $serie2];
    $seriesT = [$series, $series2];
    return Router::response()->json($seriesT);
}); */


Router::start();