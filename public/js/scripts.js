$(document).ready(function () {

    // Initialise chart
    var ctx = $("#resultsChart").get(0).getContext("2d");
    var chart = new Chart(ctx);
    
    // Update table with results
    var updateTable = function (data) {
        $('#resultsTable tr').slice(1).remove();

        $.each(data, function(index, obj) {
            $('#resultsTable tr:last').after([
                "<tr>",
                "<td>#"+index+"</td>",
                "<td>$"+obj.sales+"</td>",
                "<td>$"+obj.rents['tier 1']+"</td>",
                "<td>$"+obj.rents['tier 2']+"</td>",
                "<td>$"+obj.rents['tier 3']+"</td>",
                "<td>$"+obj.rents['total']+"</td>",
                "</tr>"
            ].join())
        });
    };
    
    var updateChart = function (data) {
        var labels = [];
        var rentDataset = [];

        $.each(data, function(index, obj) {
            labels.push("Year "+index);
            rentDataset.push(obj.rents['total']);
        });

        var dataset = { labels: labels, datasets: [{
                label: "Rent",
                data: rentDataset,
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)"
            }]
        };

        chart.Line(dataset, {scaleOverride: true, scaleStartValue: 1450000, scaleStepWidth: 20000, scaleSteps: 15, scaleLabel: "$<%=value%>"});
    };

    $('#calculate').on('click', function () {
        $.ajax({
            method: "POST",
            url: "/calculate",
            data: {
                baseRent: $('#baseRent').val(),
                rentAfterFiveYears: $('#rentAfterFiveYears').val(),
                annualSales: $('#annualSales').val()
            }
        }).success(function (data) {
            updateTable(data);
            updateChart(data);
            console.log(data);
        });
    });

    // Pre-populate field values with defaults
    $('#baseRent').val(750000);
    $('#rentAfterFiveYears').val(850000);
    $('#annualSales').val(50000000);

});