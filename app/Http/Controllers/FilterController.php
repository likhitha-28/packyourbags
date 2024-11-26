<?php
namespace App\Http\Controllers;

use App\Models\Availability;
use Illuminate\Http\Request;
use App\Models\Accommodation;
use App\Models\Hotel\HotelApproved;
use Illuminate\Support\Facades\View;

class FilterController extends Controller
{

    public function filterHotels(Request $request)
    {
        $query = HotelApproved::query();

        //set default0
        $filtersApplied = false;

        //checkboxes
        $checkboxFilters = ['pool', 'resto', 'breakfast', 'cancle'];
        foreach ($checkboxFilters as $checkboxFilter) {
            if ($request->has($checkboxFilter)) {
                $query->where($checkboxFilter, 1);
                $filtersApplied = true;
            }
        }

        //price range
        if ($request->has('price-range')) {
            $priceRange = $request->input('price-range');
            if ($priceRange != '') {
                if ($priceRange == '15000+') {
                    $query->where('price', '>', 15000);
                } else {
                    $range = explode('-', $priceRange);
                    $query->whereBetween('price', [$range[0], $range[1]]);
                }
                $filtersApplied = true;
            }
        }

        //property type
        if ($request->has('property-type')) {
            $propertyType = $request->input('property-type');
            if ($propertyType != '') {
                $query->where('property_type', $propertyType);
                $filtersApplied = true;
            }
        }

        try {
            if ($filtersApplied) {
                $filteredHotels = $query->get();
            } else {
                //return all on none added
                $filteredHotels = HotelApproved::all();
            }

            if ($filteredHotels->isEmpty()) {
                return redirect('/')->with('sorry', "No hotels found. Please try different filters.");
            } else {
                return view('explore.after-filter', ['approvedHotels' => $filteredHotels]);
            }
        } catch (\Exception $e) {
            return view('explore.no-results-page')->with('error', $e->getMessage());
        }
    }
}

