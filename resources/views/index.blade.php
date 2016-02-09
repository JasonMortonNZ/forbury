<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Hello, Forbury!</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <h3>Settings</h3>

            <div class="form-group">
                <label for="baseRent">Base rent:</label>
                <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input type="text" name="baseRent" id="baseRent" class="form-control" aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-addon">.00</span>
                </div>
            </div>

            <div class="form-group">
                <label for="rentAfterFiveYears">Rent after five years:</label>
                <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input type="text" name="rentAfterFiveYears" id="rentAfterFiveYears" class="form-control" aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-addon">.00</span>
                </div>
            </div>

            <div class="form-group">
                <label for="annualSales">Annual sales:</label>
                <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input type="text" name="annualSales" id="annualSales" class="form-control" aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-addon">.00</span>
                </div>
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-primary" id="calculate">Calculate</button>
                <br><br>
                <span><strong>* Note:</strong> Percentage rents are <strong>NOT</strong> inclusive of the base rent.</span>
            </div>
        </div>
        <div class="col-sm-8">
            <h3>Results graph</h3>
            <canvas id="resultsChart" width="400" height="400"></canvas>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <h2 class="text-center">Results table</h2>
            <table id="resultsTable" class="table">
                <thead>
                    <tr>
                        <th>Year</th>
                        <th>Annual sales</th>
                        <th>Tier 1</th>
                        <th>Tier 2</th>
                        <th>Tier 3</th>
                        <th>Total percentage rent</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

@include('partials.foot')
</body>
</html>