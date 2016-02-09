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
                <label for="twoPercent">Charge 2% over:</label>
                <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input type="text" name="twoPercent" id="twoPercent" class="form-control" aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-addon">.00</span>
                </div>
            </div>
            <div class="form-group">
                <label for="fourPercent">Charge 4% over:</label>
                <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input type="text" name="fourPercent" id="fourPercent" class="form-control" aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-addon">.00</span>
                </div>
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-primary">Calculate</button>
            </div>
        </div>
        <div class="col-sm-8">
            <h3>Results</h3>
        </div>
    </div>
</div>

@include('partials.foot')
</body>
</html>