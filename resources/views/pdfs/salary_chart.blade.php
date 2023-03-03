@extends('layouts.main_pdf')

@section('content')

<div class="" style="width: 100%;">
    <div class="card-body emp_sal_chart">
        <br>
        <div>
            <div>
                <div class="row mb-10 card-header">
                    <table class="table">
                        <thead>
                            <tr>
                                <td align="center" class="text-center logo-image">
                                    <img src="https://newhrm.bdtask.com/hrm_v4.5_demo/assets/img/icons/2017-07-22/HRM.png">
                                </td>
                            </tr>
                            <tr>
                                <th align="center" class="text-center fs-20 chart_title">Employee Salary Chart for June 2022
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div style="text-align: center; algin-items:center; justify-content:center;" class="col-xs-12">
                    <div class="row">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div>
                    <div class="row">
                        <div class="">
                            <table width="100%"
                                class="table table-striped table-bordered"
                                >
                                <thead style="background-color: #E7E0EE;">

                                    <tr role="row">
                                        <th class="text-left sorting_disabled" width="2%" rowspan="1" colspan="1"
                                            style="width: 17px;">Sl</th>
                                        <th class="text-left sorting_disabled" width="12%" rowspan="1" colspan="1"
                                            style="width: 68px;">Employee Name</th>
                                        <th class="text-left sorting_disabled" width="8%" rowspan="1" colspan="1"
                                            style="width: 116px;">Basic Salary</th>
                                        <th class="text-left sorting_disabled" width="8%" rowspan="1" colspan="1"
                                            style="width: 116px;">Total Benefit</th>
                                        <th class="text-left sorting_disabled" width="9%" rowspan="1" colspan="1"
                                            style="width: 132px;">Transport Allowance</th>
                                        <th class="text-left sorting_disabled" width="8%" rowspan="1" colspan="1"
                                            style="width: 116px;">Gross Salary</th>
                                        {{-- <th class="text-left sorting_disabled" width="8%" rowspan="1" colspan="1"
                                            style="width: 116px;">State Income Tax</th> --}}
                                        {{-- <th class="text-left sorting_disabled" width="9%" rowspan="1" colspan="1"
                                            style="width: 132px;">Soc.Sec.NPF 5%</th> --}}
                                        <th class="text-left sorting_disabled" width="9%" rowspan="1" colspan="1"
                                            style="width: 132px;">Employer Contribution 10%</th>
                                        <th class="text-left sorting_disabled" width="8%" rowspan="1" colspan="1"
                                            style="width: 116px;">Loan Deduction</th>
                                        <th class="text-left sorting_disabled" width="8%" rowspan="1" colspan="1"
                                            style="width: 116px;">Salary Advance</th>
                                        <th class="text-left sorting_disabled" width="10%" rowspan="1" colspan="1"
                                            style="width: 149px;">Total Deductions</th>
                                        <th class="text-left sorting_disabled" width="8%" rowspan="1"
                                            colspan="1" style="width: 117px;">Net Salary</th>
                                    </tr>

                                </thead>

                                <tbody class="employee_salary_chart">

                                    @foreach ($data as $key => $salary)
                                    <tr role="row" class="odd">
                                        <td class="text-left" tabindex="0">{{$salary['id']}}</td>
                                        <td class="text-left">{{$salary['first_name']}} {{$salary['last_name']}}</td>
                                        <td class="text-left">$ {{$salary['basic']}}</td>
                                        <td class="text-left">$ {{$salary['first_name']}}</td>
                                        <td class="text-left">$ {{$salary['basic_transport_allowance']}}</td>
                                        <td class="text-left">$ {{$salary['gross']}}</td>
                                        {{-- <td class="text-left">$ 0.00</td> --}}
                                        {{-- <td class="text-left">$ 0.00</td> --}}
                                        <td class="text-left">$ {{$salary['employer_contribution']}}</td>
                                        <td class="text-left">$ {{$salary['loan_deduct']}}</td>
                                        <td class="text-left">$ {{$salary['salary_advance']}}</td>

                                        <td class="text-left">$ 0</td>

                                        <td class="text-left">$ {{$salary['net_salary']}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td colspan="13" class="noborder" rowspan="1">
                                            <table class="chart_foot" border="0" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td align="left" class="noborder" width="30%">
                                                            <div class="border-top">Prepared By: <b>Super Admin</b></div>
                                                        </td>
                                                        <td align="left" class="noborder" width="30%">
                                                            <div class="border-top">Checked By</div>
                                                        </td>
                                                        <td align="left" class="noborder" width="20%">
                                                            <div class="border-top">Authorised By</div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tfoot>

                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-7"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
