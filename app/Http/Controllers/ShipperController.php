<?php

namespace App\Http\Controllers;

use App\Models\Shipper;
use Illuminate\Support\Facades\DB;

class ShipperController extends Controller
{
    private function getListMonth($month, $year)
    {
        $res = [];
        for ($i = 4; $i >= 0; $i--) {
            $monthRes = $month - $i;
            $yearRes = $year;
            if ($monthRes <= 0) {
                $monthRes += 12;
                $yearRes -= 1;
            }
            $res[] = ['month' => $monthRes, 'year' => $yearRes];
        }
        return $res;
    }
    private function getOrderAndWage($ListDate)
    {
        $res = [];
        for ($u = 0; $u < count($ListDate); $u++) {
            $month = $ListDate[$u]['month'];
            $year = $ListDate[$u]['year'];
            $order = DB::table('sales_order')
                ->selectRaw('COUNT(status) AS count')
                ->selectRaw('SUM(pay_ship) AS wage')
                ->where('shipper_id', '=', session('shipper_id'))
                ->whereMonth('received_at', '=', $month)
                ->whereYear('received_at', '=', $year)
                ->first();
            $res[] = [
                'month' => $month,
                'year' => $year,
                'count' => $order->count,
                'wage' => $order->wage
            ];
        }
        return $res;
    }
    public function orderPage($status)
    {
        if ($status == 'waitship') {
            $data = DB::table('sales_order')
                ->where('status', '=', $status)
                ->get();
            // return
        } else if ($status == 'shipping' || $status == 'shipped' || $status == 'received') {
            $data = DB::table('sales_order')
                ->where('shipper_id', '=', session('shipper_id'))
                ->where('status', '=', $status)
                ->get();
            // return
        }
        return view('404');
    }
    public function wagePage()
    {

        $data = $this->getOrderAndWage($this->getListMonth(date('n'), (int)date('Y')));
        // return
    }
    public function detailPage()
    {
        $shipper = Shipper::find(session('shipper_id'));
        // return
    }
}
