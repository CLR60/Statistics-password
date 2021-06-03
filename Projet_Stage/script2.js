window.onload = function () {

    var chart = new CanvasJS.Chart("histogramme", {
        animationEnabled: true,
        exportEnabled: true,
        theme: "light1",
        title:{
            text: "Mots de Passe les plus utilisés"
        },
        data: [{
            type: "column",
            indexLabelFontColor: "#5A5757",
            indexLabelPlacement: "outside",
            dataPoints: [
                { x: 1, y: 71, indexLabel: "Highest"},
                { x: 2, y: 55, indexLabel: "Highest" },
                { x: 3, y: 50, indexLabel: "Highest"},
                { x: 4, y: 65, indexLabel: "Highest"},
                { x: 5, y: 92, indexLabel: "Highest"},
                { x: 6, y: 68, indexLabel: "Highest"},
                { x: 7, y: 38, indexLabel: "Highest"},
                { x: 8, y: 71, indexLabel: "Highest"},
                { x: 9, y: 54, indexLabel: "Highest"},
                { x: 10, y: 60, indexLabel: "Highest"}
            ]
        }]
    });
    chart.render();

    var chart = new CanvasJS.Chart("pie", {
        theme: "light2",
        exportEnabled: true,
        animationEnabled: true,
        title: {
            text: "Moyenne Caractères Dans Les Mots De Passe"
        },
        data: [{
            type: "pie",
            startAngle: 25,
            toolTipContent: "<b>{label}</b>: {y}%",
            showInLegend: "true",
            legendText: "{label}",
            indexLabelFontSize: 16,
            indexLabel: "{label} - {y}%",
            dataPoints: [
                { y: averageCharPass, label: "Alphabets" },
                { y: averageNumPass, label: "Chiffres" },
                { y: averageSpePass, label: "Caractères Spéciaux" }
            ]
        }]
    });
    chart.render();

}