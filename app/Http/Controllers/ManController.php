<?php

namespace App\Http\Controllers;

use App\Exports\ManExport;
use App\Http\TestController;
use App\Man;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;

class ManController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
//        dump(TestController::process());
//        dump(TestController::process());
//        dump(TestController::process());
//        return 1;
//
        $man = Man::select('status')
                    ->selectRaw('count(*) as Count')
                    ->groupBy('status')
                    ->get();
        $scop = Man::active();
        $filt = Man::filter();
        return $filt;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return int
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $request->session()->push('user' , 'hi');
        $sess = $request->session()->get('user');
        return $sess;
    }

    /**
     * Display the specified resource.
     *
     * @param Man $man
     *
     * @return int
     */
    public function show(Man $man)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Man $man
     *
     * @return Response
     */
    public function edit(Man $man)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  Man    $man
     *
     * @return Response
     */
    public function update(Request $request, Man $man)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Man $man
     *
     * @return void
     */
    public function destroy(Man $man)
    {
        //
    }

    public function export()
    {
        return Excel::download(new ManExport(), 'Man.xlsx');
    }
}
