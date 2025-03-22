<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\General;
use App\Models\User;
use App\Models\Bill;
use Illuminate\Support\Facades\Session;
use Auth;
use Image;
use Carbon\Carbon;
class BillController extends Controller
{
    //
    public function index(){
        $bill = Bill::latest()->get();
        return view('backend.bill.index', ['bill' => $bill]);
    }
}
