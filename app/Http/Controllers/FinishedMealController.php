<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    

use App\Models\FinishedMeal;

class FinishedMealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meals = FinishedMeal::all();
        return view('meals.index', compact('meals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('meals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        FinishedMeal::create($request->all());
        return redirect()->route('meals.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Auth::check()) {
            $meal = FinishedMeal::findOrFail($id);
            return view('meals.edit', compact('meal'));
        }
        abort(401);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'description' => 'required',
            'meal_date' => 'required|date',
            'meal_time' => 'required'
        ]);

        $meal = FinishedMeal::findOrFail($id);
        $meal->name = $validated['name'];
        $meal->description = $validated['description'];
        $meal->meal_date = $validated['meal_date'];
        $meal->meal_time = $validated['meal_time'];

        if ($meal->save()) {
            return redirect()->route('meals.index', ['id' => $meal->id])->with('status', 'Challenge has been edited!');
        }
        return redirect()->route('meals.edit', ['meal' => $meal])->with('status', 'Something went wrong, try again.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
