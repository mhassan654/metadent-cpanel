@extends('layouts.app')

@section('content')
<div class="panel-body emp_sal_chart">

    <div class="text-right" id="print">

       <button type="button" class="btn btn-warning" id="btnPrint" onclick="printPageArea('printArea');"><i class="fa fa-print"></i></button>

       <a href="https://newhrm.bdtask.com/hrm_v4.5_demo/assets/data/pdf/employee_salary_chart_for_June 2022.pdf" target="_blank" title="download pdf">
            <button class="btn btn-success btn-md" name="btnPdf" id="btnPdf" autocomplete="off"><i class="fa-file-pdf-o"></i> PDF</button>
        </a>

    </div>

    <br>

    <div id="printArea">

    <div>

        <div class="row mb-10">
            <table class="table" width="99%">
                <thead>
                    <tr>
                        <td align="center" class="text-center logo-image">
                            <img src="https://newhrm.bdtask.com/hrm_v4.5_demo/assets/img/icons/2017-07-22/HRM.png">
                        </td>
                    </tr>
                    <tr>
                        <th align="center" class="text-center fs-20 chart_title">Employee Salary Chart for June 2022</th>
                    </tr>
                </thead>
            </table>
        </div>


        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table width="99%" class="payrollDatatableReport table table-striped table-bordered table-hover dataTable dtr-inline" id="DataTables_Table_0" role="grid" style="width: 99%;">
            <thead bgcolor="#E7E0EE">

              <tr role="row"><th class="text-left sorting_disabled" width="2%" rowspan="1" colspan="1" style="width: 17px;">Sl</th><th class="text-left sorting_disabled" width="5%" rowspan="1" colspan="1" style="width: 68px;">Employee Name</th><th class="text-left sorting_disabled" width="8%" rowspan="1" colspan="1" style="width: 116px;">Basic Salary</th><th class="text-left sorting_disabled" width="8%" rowspan="1" colspan="1" style="width: 116px;">Total Benefit</th><th class="text-left sorting_disabled" width="9%" rowspan="1" colspan="1" style="width: 132px;">Transport Allowance</th><th class="text-left sorting_disabled" width="8%" rowspan="1" colspan="1" style="width: 116px;">Gross Salary</th><th class="text-left sorting_disabled" width="8%" rowspan="1" colspan="1" style="width: 116px;">State Income Tax</th><th class="text-left sorting_disabled" width="9%" rowspan="1" colspan="1" style="width: 132px;">Soc.Sec.NPF 5%</th><th class="text-left sorting_disabled" width="9%" rowspan="1" colspan="1" style="width: 132px;">Employer Contribution 10%</th><th class="text-left sorting_disabled" width="8%" rowspan="1" colspan="1" style="width: 116px;">Loan Deduction</th><th class="text-left sorting_disabled" width="8%" rowspan="1" colspan="1" style="width: 116px;">Salary Advance</th><th class="text-left sorting_disabled" width="10%" rowspan="1" colspan="1" style="width: 149px;">Total Deductions</th><th class="text-left sorting_disabled" width="8%" rowspan="1" colspan="1" style="width: 117px;">Net Salary</th></tr>

            </thead>

            <tbody class="employee_salary_chart">







            <tr role="row" class="odd">
                <td class="text-left" tabindex="0">1</td>
                <td class="text-left">Saklain Musthak</td>
                <td class="text-left">$ 317.31</td>
                <td class="text-left">$ 0</td>
                <td class="text-left">$ 63.46</td>
                <td class="text-left">$ 380.78</td>
                <td class="text-left">$ 0.00</td>
                <td class="text-left">$ 0.00</td>
                <td class="text-left">$ 0</td>
                <td class="text-left">$ 0.00</td>
                <td class="text-left">$ 0.00</td>

                <td class="text-left">$ 0</td>

                <td class="text-left">$ 380.78</td>
              </tr><tr role="row" class="even">
                <td class="text-left" tabindex="0">2</td>
                <td class="text-left">Willam Afton</td>
                <td class="text-left">$ 0.00</td>
                <td class="text-left">$ 0</td>
                <td class="text-left">$ 0.00</td>
                <td class="text-left">$ 0.00</td>
                <td class="text-left">$ 0.00</td>
                <td class="text-left">$ 0.00</td>
                <td class="text-left">$ 0</td>
                <td class="text-left">$ 0.00</td>
                <td class="text-left">$ 0.00</td>

                <td class="text-left">$ 0</td>

                <td class="text-left">$ 0.00</td>
              </tr><tr role="row" class="odd">
                <td class="text-left" tabindex="0">3</td>
                <td class="text-left">Roberts Brown</td>
                <td class="text-left">$ 3386.83</td>
                <td class="text-left">$ 0</td>
                <td class="text-left">$ 141.12</td>
                <td class="text-left">$ 3527.95</td>
                <td class="text-left">$ 0.00</td>
                <td class="text-left">$ 169.34</td>
                <td class="text-left">$ 338.68</td>
                <td class="text-left">$ 0.00</td>
                <td class="text-left">$ 0.00</td>

                <td class="text-left">$ 169.34</td>

                <td class="text-left">$ 3358.61</td>
              </tr><tr role="row" class="even">
                <td class="text-left" tabindex="0">4</td>
                <td class="text-left">Alice Oseman</td>
                <td class="text-left">$ 10000.00</td>
                <td class="text-left">$ 0</td>
                <td class="text-left">$ 1000.00</td>
                <td class="text-left">$ 11000.00</td>
                <td class="text-left">$ 70.00</td>
                <td class="text-left">$ 500.00</td>
                <td class="text-left">$ 1000</td>
                <td class="text-left">$ 500.00</td>
                <td class="text-left">$ 1000.00</td>

                <td class="text-left">$ 2070</td>

                <td class="text-left">$ 8930.00</td>
              </tr></tbody>

            <tfoot>
               <tr><td colspan="13" class="noborder" rowspan="1">
                    <table class="chart_foot" border="0" width="100%">
                    <tbody><tr>
                        <td align="left" class="noborder" width="30%">
                            <div class="border-top">Prepared By: <b>Super Admin</b></div>
                        </td>
                        <td align="left" class="noborder" width="30%"> <div class="border-top">Checked By</div>
                        </td>
                         <td align="left" class="noborder" width="20%">
                            <div class="border-top">Authorised By</div>
                        </td>
                    </tr>
                 </tbody></table>
                </td></tr>
          </tfoot>

        </table></div></div><div class="row"><div class="col-sm-5"></div><div class="col-sm-7"></div></div></div>

        </div>
    </div>
   </div>

@endsection
