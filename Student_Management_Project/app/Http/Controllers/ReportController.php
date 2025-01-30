<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function report1($id) 
    {
        // Tìm dữ liệu payment
        $payment = Payment::where('payment_id', $id)->first();

        // Kiểm tra nếu không tìm thấy payment
        if (!$payment) {
            return redirect()->back()->with('error', 'Payment not found');
        }

        // Tạo nội dung HTML
        $print = "<div style='margin:20px; padding:20px;'>";
        $print .= "<h1 align='center'>Payment Receipt</h1>";
        $print .= "<hr/>";
        $print .= "<p> Receipt No: <b>".$id."</b> </p>";
        $print .= "<p> Date: <b> ".$payment->payment_date."</b> </p>";
        $print .= "<p> Student Name: <b> ".$payment->student->full_name."</b> </p>"; // Đảm bảo bạn có quan hệ giữa Payment và Student
        $print .= "<hr/>";
        
        // Bảng chi tiết thanh toán
        $print .= "<table style='width:100%; border-collapse: collapse;' border='1'>";
        $print .= "<tr>";
        $print .= "<th>Amount</th>";
        $print .= "<th>Payment Method</th>";
        $print .= "</tr>";
        $print .= "<tr>";
        $print .= "<td style='text-align: center;' > <h3>". $payment->amount ."</h3> </td>";
        $print .= "<td style='text-align: center;' > <h3>". $payment->payment_method ."</h3> </td>";
        $print .= "</tr>";
        $print .= "</table>";

        $print .= "<hr/>";
        //$print .= "<span> Printed By: <b>" . Auth::user()->name . "</b> </span><br/>";
        $print .= "<span> Printed Date: <b>" . date('Y-m-d') . "</b> </span>";
        $print .= "</div>";

        // Tạo PDF từ nội dung HTML
        $pdf = Pdf::loadHTML($print);

        // Trả về file PDF
        return $pdf->stream();
    }
}
