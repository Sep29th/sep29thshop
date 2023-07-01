<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shipper;
use App\Models\Manager;
use Illuminate\Support\Facades\DB;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private function sumPerchaseOrderPrice($month, $year)
    {
        $result = DB::table('purchase_orders')
            ->selectRaw('IFNULL(SUM(price), 0) AS total')
            ->whereYear('purchase_at', '=', $year)
            ->whereMonth('purchase_at', '=', $month)
            ->first();
        return $result->total;
    }
    private function sumWageOfShipper($month, $year)
    {
        $result = DB::table('sales_order')
            ->selectRaw('IFNULL(SUM(pay_ship), 0) AS total')
            ->whereYear('received_at', '=', $year)
            ->whereMonth('received_at', '=', $month)
            ->first();
        return $result->total;
    }
    private function sumSaleOrderPrice($month, $year)
    {
        $result = DB::table('sales_order')
            ->selectRaw('IFNULL(SUM(price), 0) AS total')
            ->whereYear('received_at', '=', $year)
            ->whereMonth('received_at', '=', $month)
            ->first();
        return $result->total;
    }
    private function getResults($ListDate)
    {
        $res = [];
        for ($u = 0; $u < count($ListDate); $u++) {
            $month = $ListDate[$u]['month'];
            $year = $ListDate[$u]['year'];
            $spop = (int)$this->sumPerchaseOrderPrice($month, $year);
            $swos = (int)$this->sumWageOfShipper($month, $year);
            $ssop = (int)$this->sumSaleOrderPrice($month, $year);
            $res[] = [
                'month' => $month,
                'year' => $year,
                'spop' => $spop,
                'swos' => $swos,
                'ssop' => $ssop,
                'interest' => $ssop - $swos - $spop
            ];
        }
        return $res;
    }
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
    private function getCount($status)
    {
        $result = DB::table('sales_order')
            ->selectRaw('COUNT(status) AS count')
            ->where('status', '=', $status)
            ->first();
        return $result->count;
    }
    private function getDataOrder()
    {
        $res = [];
        $res['waitconfirm'] = $this->getCount('waitconfirm');
        $res['preparing'] = $this->getCount('preparing');
        $res['waitship'] = $this->getCount('waitship');
        $res['shipping'] = $this->getCount('shipping');
        $res['shipped'] = $this->getCount('shipped');
        return $res;
    }
    public function dashBoard()
    {
        $dataMoney = $this->getResults($this->getListMonth(date('n'), (int)date('Y')));
        $dataOrder = $this->getDataOrder();
        // return view('ManagerView/dashBoard', compact('dataMoney', 'dataOrder'));
    }
    public function orderPage($status)
    {
        $dataOrder = DB::table('sales_order')
            ->where('status', '=', $status)
            ->get();

        // return view('ManagerView/' . $status, compact('dataOrder'));
    }
    public function productPage($page)
    {
        if ($page == 'Product' || $page == 'Purchase') {
            $dataProducts = Product::all();
            // return view('ManagerView/' . $page, compact('dataProducts'));
        } else if ($page == 'Statistical') {
            $dataPurchase = DB::table('purchase_orders')->get();
            $dataSale = DB::table('sales_order')
                ->where('status', '=', 'received')
                ->get();
            $dataChart = [];
            $ListDate = $this->getListMonth(date('n'), (int)date('Y'));
            for ($u = 0; $u < count($ListDate); $u++) {
                $month = $ListDate[$u]['month'];
                $year = $ListDate[$u]['year'];
                $spop = (int)$this->sumPerchaseOrderPrice($month, $year);
                $ssop = (int)$this->sumSaleOrderPrice($month, $year);
                $dataChart[] = [
                    'month' => $month,
                    'year' => $year,
                    'spop' => $spop,
                    'ssop' => $ssop
                ];
            }
            return view('ManagerView/' . $page, compact('dataPurchase', 'dataSale', 'dataChart'));
        }
        // return view('404');
    }
    public function shipperPage()
    {
        $dataShipper = Shipper::all();
        $arrayShipper = [];
        foreach ($dataShipper as $shipper) {
            $arrayShipper[] = ['info' => $shipper, 'wage' => DB::table('sales_order')
                ->selectRaw('SUM(pay_ship) AS sum')
                ->where('shipper_id', '=', $shipper->id)
                ->where('status', '=', 'received')
                ->first()->sum];
        }
        // return view('ManagerView/Shipper', compact('arrayShipper'));
    }
    public function managerPage(){
        $dataManager = Manager::all();
        // return view('ManagerView/Manager', compact('dataManager'));
    }
}
