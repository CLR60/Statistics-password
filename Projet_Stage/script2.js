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
                { x: 1, y: arrayPassRepeat[1], indexLabel: arrayPassRepeat[0]},
                { x: 2, y: arrayPassRepeat[3], indexLabel: arrayPassRepeat[2] },
                { x: 3, y: arrayPassRepeat[5], indexLabel: arrayPassRepeat[4]},
                { x: 4, y: arrayPassRepeat[7], indexLabel: arrayPassRepeat[6]},
                { x: 5, y: arrayPassRepeat[9], indexLabel: arrayPassRepeat[8]},
                { x: 6, y: arrayPassRepeat[11], indexLabel: arrayPassRepeat[10]},
                { x: 7, y: arrayPassRepeat[13], indexLabel: arrayPassRepeat[12]},
                { x: 8, y: arrayPassRepeat[15], indexLabel: arrayPassRepeat[14]},
                { x: 9, y: arrayPassRepeat[17], indexLabel: arrayPassRepeat[16]},
                { x: 10, y: arrayPassRepeat[19], indexLabel: arrayPassRepeat[18]}
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