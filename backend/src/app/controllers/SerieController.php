<?php
namespace Jdev2\Apij\app\controllers;

use Exception;
use Pecee\Http\Request;
use Jdev2\Apij\app\models\Serie;
use Jdev2\Apij\app\controllers\BaseController;

class SerieController extends BaseController{

    public function returnAllSeries(): string{

        try {
            // TODO: POBLAR LA BD
            $series = Serie::all();
        } catch (\Throwable $th) {
            $series = null;
            //throw new Exception("Error with use the db: {$th}");
        }

        if(is_null($series)){
            return json_encode("null");
        }else{
            return $this->transformCollectToJSON($series);
        }
    }

    public function returnSpecificSerie(string|int $id) : string{

        try {
            // TODO: POBLAR LA BD
            $serie = Serie::where("id", $id)->get();
        } catch (\Throwable $th) {
            $serie = null;
            //throw new Exception("Error with use the db: {$th}");
        }

        if(is_null($serie)){
            return json_encode("null");
        }else{
            return $this->transformCollectToJSON($serie);
        }
    }

    public function addSerie(string $title = "", string $description = "", string $gender = "", string|int $seasons_number = ""){

        if(empty($title) or empty($description) or empty($gender) or empty($seasons_number)){
            return json_encode([1 => "Incomplete data"]);
        }else{

            try {
                $serie = Serie::create([
                    "title" => $title,
                    "description" => $description,
                    "gender" => $gender,
                    "seasons_number" => $seasons_number
                ]);
            } catch (\Throwable $th) {
                $serie = null;
                //throw new Exception("Error with use the db: {$th}");
            }

            if($serie){
                return json_encode([0 => "Successful insert of a new Serie"]);
            }else{
                json_encode([1 => "An error on insert, please try again or later"]);
            }

        }
    }

    public function updateSerie(string $id = "", string $title = "", string $description = "", string $gender = "", string|int $seasons_number = ""){

        if(empty($id) or empty($title) or empty($description) or empty($gender) or empty($seasons_number)){
            return json_encode([1 => "Incomplete data"]);
        }else{

            try {
                $serie = Serie::where("id", $id)->update([
                    "title" => $title,
                    "description" => $description,
                    "gender" => $gender,
                    "seasons_number" => $seasons_number
                ]);
            } catch (\Throwable $th) {
                $serie = null;
                //throw new Exception("Error with use the db: {$th}");
            }

            if($serie){
                return json_encode([0 => "Successful update the serie by id {$id}"]);
            }else{
                json_encode([1 => "An error on update, please try again or later, verify the data to update"]);
            }

        }
  
    }

    public function deleteSerie(string|int $id = ""){

        if(empty($id)){
            return json_encode([1 => "Incomplete data, ID null"]);
        }else{

            try {
                $serie = Serie::where("id", $id)->delete();
            } catch (\Throwable $th) {
                $serie = null;
                //throw new Exception("Error with use the db: {$th}");
            }

            if($serie){
                return json_encode([0 => "Successful delete the serie by id {$id}"]);
            }else{
                json_encode([1 => "An error on delete, please try again or later, verify the data to update"]);
            }

        }
  
    }
    
}