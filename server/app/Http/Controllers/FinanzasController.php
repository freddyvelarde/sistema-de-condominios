<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;

class FinanzasController extends Controller
{
    public function pagos()
    {
        $pagos = Pago::all();
    }
}
