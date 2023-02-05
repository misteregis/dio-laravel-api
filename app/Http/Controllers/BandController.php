<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandController extends Controller
{
    private array $bands = array(
        [
            'id' => 1,
            'name' => 'dream teather',
            'gender' => 'progressivo'
        ],
        [
            'id' => 2,
            'name' => 'megadeth',
            'gender' => 'trash metal'
        ],
        [
            'id' => 3,
            'name' => 'dio',
            'gender' => 'heavy metal'
        ],
        [
            'id' => 4,
            'name' => 'metallica',
            'gender' => 'heavy metal'
        ],
        [
            'id' => 5,
            'name' => 'barões da pisadinha',
            'gender' => 'tecno forró'
        ],
    );
    public function getAll()
    {
        $bands = $this->getBands();

        return response()->json($bands);
    }

    public function getById($id)
    {
        $band = null;

        foreach ($this->getBands() as $_band)
            if ($_band->id == $id)
                $band = $_band;

        return $band ? response()->json($band) : abort(404);
    }

    public function getBandsByGender($gender)
    {
        $bands = array();

        foreach ($this->getBands() as $_band)
            if ($_band->gender == $gender)
                $bands[] = $_band;

        return response()->json($bands);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'numeric',
            'name' => 'required|min:3'
        ]);

        return response()->json($request->all());

    }

    protected function getBands()
    {
        return json_decode(json_encode($this->bands));
    }
}
