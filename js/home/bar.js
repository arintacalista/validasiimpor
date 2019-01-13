var categories;
var seriesData;

$.ajax({
    async: false,
    cache: false,
    url: $('#container').attr('data-categories-url'),
    success: function(response) {
        categories = response.data;
        // console.log(categories);
    },
});

$.ajax({
    async: false,
    cache: false,
    url: $('#container').attr('data-seriesData-url'),
    success: function(response) {
        seriesData = response.data;
        // console.log(categories);
    },
});

Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Survei Dokumen'
    },
    xAxis: {
        categories: categories,
    },
    yAxis: {
        min: 0,
        max: 100,
        title: {
            text: 'Persentase Selesai'
        }
    },
    tooltip: {
        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
        shared: true
    },
    // series: [{
    //     name: 'Survei Dokumen',
    //     data: [
    //         ['John', 5],
    //         ['John', 2],
    //         ['John', 1],
    //     ]
    // }],
    series: [{
        name: 'Survei Dokumen',
        data: seriesData,
    }],
});
