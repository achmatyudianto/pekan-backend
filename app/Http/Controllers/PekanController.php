<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\Pekan as PekanResource;
use App\Http\Resources\Analysis as AnalysisResource;
use App\Pekan;
use Auth;
use DB;

class PekanController extends Controller
{
	public function create(Request $request, Pekan $pekan)
	{
		$this->validate($request, [
			'type'			=> 'required',
			'description'	=> 'required',
			'amount'		=> 'required',
		]);

		$pekan = $pekan->create([
			'user_id'		=> Auth::user()->id,
			'type'			=> $request->type,
			'description'	=> $request->description,
			'amount'		=> $request->amount,
		]);

		return response()->json(new PekanResource($pekan), 201);
	}

	public function read(Request $request, Pekan $pekan)
	{
		$pekan = $pekan
					->where(DB::raw("to_char(created_at, 'MM/YYYY')"), $request->period)
					->where('user_id', Auth::user()->id)
					->where('type', $request->type)
					->orderBy('id', 'DESC')
					->get();

		return PekanResource::collection($pekan);
	}

	public function update(Request $request, Pekan $pekan)
	{	
        $this->authorize('update', $pekan);

		$pekan->description = $request->get('description', $pekan->description);
		$pekan->amount = $request->get('amount', $pekan->amount);
		$pekan->save();

		return new PekanResource($pekan);
	}

	public function delete(Pekan $pekan)
	{
		$this->authorize('delete', $pekan);

		$pekan->delete();

		return response()->json([
			'message' => 'Pekan Deleted',
			'code' => 200,
		]);
	}

	public function analysis(Request $request, Pekan $pekan) 
	{
		$pekan = $pekan
					->select(DB::raw("SUM(amount) as amount, to_char(created_at, 'MM') as month, type"))
					->where('user_id', Auth::user()->id)
					->where(DB::raw("to_char(created_at, 'YYYY')"), $request->year)
					->groupBy('type', 'month')
					->orderBy('month', 'ASC')
					->get();

		return AnalysisResource::collection($pekan);
	}
}
