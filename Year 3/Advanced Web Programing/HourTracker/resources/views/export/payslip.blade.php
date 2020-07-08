<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Invoice</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
        .text-right {
            text-align: right;
        }
    </style>

</head>
<body style="background: white">

    <div>
        <div class="row">
            <div class="col-xs-7">
                <strong>{{ $paySlip->staff->companyInfo->name }}</strong><br>
                {{ $paySlip->staff->companyDetails->Line1 }} <br>
                {{ $paySlip->staff->companyDetails->Line2 }}<br>
                {{ $paySlip->staff->companyDetails->postCode }}<br>
                P: {{ $paySlip->staff->companyDetails->contactNumber }} <br>
                <br>
            </div>

            <div class="col-xs-4">
               <h1 class="text-right">{{ $paySlip->staff->companyInfo->name }}</h1>
            </div>
        </div>

        <div style="margin-bottom: 0px">&nbsp;</div>

        <div class="row">
            <div class="col-xs-6">
                <address>
                    <strong>{{ $paySlip->staff->firstName . ' ' . $paySlip->staff->lastName }}</strong><br>
                    <span>{{ $paySlip->staff->contactDetails->Line1 }}</span> <br>
                    <span>{{ $paySlip->staff->contactDetails->Line2 }}</span> <br>
                    <span>{{ $paySlip->staff->contactDetails->postCode }}</span> <br>
                </address>
            </div>

            <div class="col-xs-5">
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <th>PaySlip Date:</th>
                            <td class="text-right">{{ Carbon\Carbon::parse($paySlip->date)->format('l jS M') }}</td>
                        </tr>
                    </tbody>
                </table>

                <div style="margin-bottom: 0px">&nbsp;</div>

                <table style="width: 100%; margin-bottom: 20px">
                    <tbody>
                        <tr class="well" style="padding: 5px">
                            <th style="padding: 5px"><div> Total Pay</div></th>
                            <td style="padding: 5px" class="text-right"><strong> {{ formatCurency($paySlip->totalPay) }} </strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <table class="table">
            <thead style="background: #F5F5F5;">
                <tr>
                    <th>Hours Worked</th>
                    <th>Total Pay</th>
                    <th>Tax Deductions</th>
                    <th>Net Pay</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><div><strong> {{ formatCurency($paySlip->hoursWorked) }}</strong></div>
                    <td><div><strong>{{ formatCurency($paySlip->totalPay) }}</strong></div>
                    <td><div><strong>{{ formatCurency($paySlip->taxDeductions) }}</strong></div>
                    <td><div><strong>{{ formatCurency($paySlip->netPay) }}</strong></div>
                </tr>
            </tbody>
        </table>

            <div class="row">
                <div class="col-xs-6"></div>
                <div class="col-xs-5">
                    <table style="width: 100%">
                        <tbody>
                            <tr class="well" style="padding: 5px">
                                <th style="padding: 5px"><div> Total Pay: </div></th>
                                <td style="padding: 5px" class="text-right"><strong> {{ formatCurency($paySlip->totalPay) }} </strong></td>
                            </tr>
                            <tr class="well" style="padding: 5px">
                                <th style="padding: 5px"><div> Tax Deductions: </div></th>
                                <td style="padding: 5px" class="text-right"><strong>{{ formatCurency($paySlip->taxDeductions) }} </strong></td>
                            </tr>
                            <tr class="well" style="padding: 5px">
                                <th style="padding: 5px"><div> Net Pay: </div></th>
                                <td style="padding: 5px" class="text-right"><strong>{{ formatCurency($paySlip->netPay) }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div style="margin-bottom: 0px">&nbsp;</div>
        </div>

    </body>
    </html>