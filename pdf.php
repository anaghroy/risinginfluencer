<?php
if(!empty($_POST['download']))
{
    $user_name = $_POST['user_name'];
    $customer_id = $_POST['customer_id'];
    $company_name = $_POST['company_name'];
    $company_address = $_POST['company_address'];
    $phoneno = $_POST['phoneno'];
    $email = $_POST['email'];
    $select_plan = $_POST['select_plan'];
    $plan_duration = $_POST['plan_duration'];
    $amount = $_POST['amount'];

    require("fpdf/fpdf.php"); //include the fpdf file

    $pdf = new FPDF(); //create new object
    $pdf->AddPage(); //add new page
    $pdf->SetFont("Arial","B",16); //font-Arial bold-B size-16 
    $pdf->Cell(0,10,"Customer Details",1,1,"C"); //width:0,height:10,text:Customer Details,border:1,nextline: 1,align:center
    $pdf->Cell(30,10, "Username", 1,0);
    $pdf->Cell(0,10, $user_name, 1,1,'C');
    $pdf->Cell(39,10, "Customer ID", 1,0);
    $pdf->Cell(0,10, $customer_id, 1,1,'C');
    $pdf->Cell(47,10, "Company Name", 1,0);
    $pdf->Cell(0,10, $company_name, 1,1,'C');
    $pdf->Cell(55,10, "Company Address", 1,0);
    $pdf->Cell(0,10, $company_address, 1,1,'C');
    $pdf->Cell(29,10, "Phoneno", 1,0);
    $pdf->Cell(0,10, $phoneno, 1,1,'C');
    $pdf->Cell(20,10, "email", 1,0);
    $pdf->Cell(0,10, $email, 1,1,'C');
    $pdf->Cell(33,10, "Select plan", 1,0);
    $pdf->Cell(0,10, $select_plan, 1,1,'C');
    $pdf->Cell(40,10, "Plan Duration", 1,0);
    $pdf->Cell(0,10, $plan_duration, 1,1,'C');
    $pdf->Cell(24,10, "Amount", 1,0);// Align Amount cell content to the left
    $pdf->Cell(0,10, $amount, 1,1,'C'); // Align Amount content to the center side of the cell

    // Add thanks message at the end of the page
    $pdf->Cell(0,10,"Thanks for your input",0,1,"C");
    $pdf->output(); //output the pdf file
}
?>