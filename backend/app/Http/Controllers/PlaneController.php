<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class PlaneController extends Controller
{
    function index(Request $request): View
    {
        $planes = $this->getPlanesCollection();
        $avgSeats = $planes->average("seats");
        $mostSeats = $planes->sortByDesc("seats")->first();
        $oldestPlane = $planes->sortBy("first_flight")->first();

        $manufacturer = $request->query("manufacturer");
        $type = $request->query("type");
        $minSeats = $request->query("minSeats");
        $maxSeats = $request->query("maxSeats");
        $orderBy = $request->query("orderBy");
        $order = $request->query("order");

        if (!is_null($manufacturer)) {
            $planes = $planes->where("manufacturer", "=", "$manufacturer");
        }
        if (!is_null($type)) {
            $planes = $planes->where("type", "=", "$type");
        }
        if (!is_null($minSeats)) {
            $planes = $planes->where("seats", ">=", "$minSeats");
        }
        if (!is_null($maxSeats)) {
            $planes = $planes->where("seats", "<=", "$maxSeats");
        }
        if (!is_null($orderBy) && !is_null($order)) {
        }
        
        if (!is_null($orderBy) && !is_null($order)) {
            if ($order == "asc") {
                $planes = $planes->sortBy($orderBy);
            } else {
                $planes = $planes->sortByDesc($orderBy);
            }
        }
        $count = $planes->count();

        return view("plane.index", [
            "title" => "Repülők ($count db)",
            "planes" => $planes,
            "query" => $request->all(),
            "maxSeats" => $mostSeats,
            "oldest" => $oldestPlane,
            "averageSeats" => $avgSeats
        ]);
    }

    private function getPlanesCollection(): Collection
    {
        return collect(
            [
                [
                    "id" => 1,
                    "manufacturer" => "Airbus",
                    "family" => "A220",
                    "variants" => [
                        "Airbus A220-100",
                        "Airbus A220-300",
                        "ACJ TwoTwenty",
                    ],
                    "type" => "narrow_body",
                    "engines" => 2,
                    "first_flight" => "2013-09-16",
                    "seats" => 160,
                ],
                [
                    "id" => 2,
                    "manufacturer" => "Airbus",
                    "family" => "A320",
                    "variants" => [
                        "Airbus A319",
                        "Airbus A319",
                        "Airbus ACJ319",
                        "Airbus A320",
                        "Airbus A320neo",
                        "Airbus A320P2F",
                        "Airbus A321",
                        "Airbus A321neo",
                        "Airbus A321P2F",
                        "Airbus A321LR",
                        "Airbus A321XLR",
                    ],
                    "type" => "narrow_body",
                    "engines" => 2,
                    "first_flight" => "1987-02-22",
                    "seats" => 244,
                ],
                [
                    "id" => 3,
                    "manufacturer" => "Airbus",
                    "family" => "A330",
                    "variants" => [
                        "Airbus A330-200",
                        "Airbus A330-200F",
                        "Airbus A330-300",
                        "Airbus A330-300HWG",
                        "Airbus A330 Regional",
                        "Airbus A330P2F",
                        "Airbus A330 MRTT",
                        "Airbus Beluga XL",
                        "Airbus CC-330 Husky",
                        "Airbus ACJ330",
                        "Airbus ACJ330neo",
                        "Airbus A330-800",
                        "Airbus A330-900",
                    ],
                    "engines" => 2,
                    "type" => "wide_body",
                    "first_flight" => "1992-11-02",
                    "seats" => 336,
                ],
                [
                    "id" => 4,
                    "manufacturer" => "Airbus",
                    "family" => "A340",
                    "variants" => [
                        "Airbus A340-200",
                        "Airbus A340-300",
                        "Airbus A340-500",
                        "Airbus A340-600",
                    ],
                    "engines" => 4,
                    "type" => "wide_body",
                    "first_flight" => "1991-10-25",
                    "seats" => 244,
                ],
                [
                    "id" => 5,
                    "manufacturer" => "Airbus",
                    "family" => "A350",
                    "variants" => [
                        "Airbus A350-900",
                        "Airbus A350-900ULR",
                        "Airbus A350-1000",
                        "Airbus A350F",
                        "ACJ350",
                    ],
                    "engines" => 2,
                    "type" => "wide_body",
                    "first_flight" => "2013-06-14",
                    "seats" => 480,
                ],
                [
                    "id" => 6,
                    "manufacturer" => "Airbus",
                    "family" => "A380",
                    "variants" => [
                        "Airbus A380",
                    ],
                    "engines" => 4,
                    "type" => "wide_body",
                    "first_flight" => "2005-04-27",
                    "seats" => 525,
                ],
                [
                    "id" => 7,
                    "manufacturer" => "Boeing",
                    "family" => "737",
                    "variants" => [
                        "Boeing 737-100",
                        "Boeing 737-200",
                        "Boeing 737-300",
                        "Boeing 737-400",
                        "Boeing 737-500",
                        "Boeing 737-600",
                        "Boeing 737-700",
                        "Boeing 737-800",
                        "Boeing 737-900",
                        "Boeing 737 MAX 7",
                        "Boeing 737 MAX 8",
                        "Boeing 737 MAX 9",
                        "Boeing 737 MAX 10",
                        "Boeing 787 AEW&C",
                        "Boeing T-43/CT-34A",
                        "Boeing C-40 Clipper",
                        "Boeing P-8 Poseidon",
                        "Boeing 737-800BCF",
                        "BBJ1",
                        "BBJ2",
                        "BBJ3",
                    ],
                    "engines" => 2,
                    "type" => "narrow_body",
                    "first_flight" => "1967-04-09",
                    "seats" => 230,
                ],
                [
                    "id" => 8,
                    "manufacturer" => "Boeing",
                    "family" => "747",
                    "variants" => [
                        "Boeing 747-100",
                        "Boeing 747SR",
                        "Boeing 747-100B",
                        "Boeing 747SP",
                        "Boeing 747-200",
                        "Boeing 747-300",
                        "Boeing 747-400",
                        "Boeing 747 LCF Dreamlifter",
                        "VC-25",
                        "E-4B",
                        "YAL-1",
                        "C-33",
                        "KC-25/33",
                        "Boeing 747F Airlifter",
                        "Boeing 747 CMCA",
                        "Boeing MC-747",
                        "Boeing 747 AAC",
                        "Evergreen 747 Supertanker",
                        "Stratospheric Observatory for Infrared Astronomy",
                    ],
                    "engines" => 4,
                    "type" => "wide_body",
                    "first_flight" => "1969-02-09",
                    "seats" => 605,
                ],
                [
                    "id" => 9,
                    "manufacturer" => "Boeing",
                    "family" => "757",
                    "variants" => [
                        "Boeing 757-200",
                        "Boeing 757-200PF",
                        "Boeing 757-200SF/PCF",
                        "Airborne Research Integrated Experiments System",
                        "C32",
                        "F-22 Flying Testbed",
                        "Active Flow Control System",
                    ],
                    "engines" => 2,
                    "type" => "wide_body",
                    "first_flight" => "1982-02-19",
                    "seats" => 243,
                ],
                [
                    "id" => 10,
                    "manufacturer" => "Boeing",
                    "family" => "767",
                    "variants" => [
                        "Boeing 767-200",
                        "Boeing 767-2C",
                        "Boeing 767-200ER",
                        "Boeing 767-300",
                        "Boeing 767-300ER",
                        "Boeing 767-300F",
                        "Boeing 767-300BCF",
                        "Boeing 767-300FBDSF",
                        "Boeing 767-400ER",
                        "Airborne Surveillance Testbed",
                        "E-767",
                        "KC-767 Tanker Transport",
                        "KC-767 Advanced Tanker",
                        "KC-46",
                        "767 MMTT",
                        "E-10 MC2A",
                    ],
                    "engines" => 2,
                    "type" => "wide_body",
                    "first_flight" => "1981-09-08",
                    "seats" => 269,
                ],
                [
                    "id" => 11,
                    "manufacturer" => "Boeing",
                    "family" => "777",
                    "variants" => [
                        "Boeing 777-200",
                        "Boeing 777-200ER",
                        "Boeing 777-200LR",
                        "Boeing 777-300",
                        "Boeing 777-300ER",
                        "Boeing 777F",
                        "Boeing 777-9",
                        "Boeing 777-8",
                        "BBJ 777X",
                        "Boeing 777-8F",
                        "Boeing 777-10X",
                        "Boeing 777 VIP",
                        "KC-777",
                    ],
                    "engines" => 2,
                    "type" => "wide_body",
                    "first_flight" => "1994-06-12",
                    "seats" => 426,
                ],
                [
                    "id" => 12,
                    "manufacturer" => "Boeing",
                    "family" => "787 Dreamliner",
                    "variants" => [
                        "Boeing 787-8",
                        "Boeing 787-9",
                        "Boeing 787-10",
                        "BBJ 787",
                    ],
                    "engines" => 2,
                    "type" => "wide_body",
                    "first_flight" => "2009-12-15",
                    "seats" => 248,
                ],
            ]
        );
    }
}
