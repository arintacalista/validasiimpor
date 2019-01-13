// Set to 00:00:00:000 today
var today = new Date(),
day = 1000 * 60 * 60 * 24,
map = Highcharts.map,
dateFormat = Highcharts.dateFormat,
series,
surveiDokumens;

// Set to 00:00:00:000 today
today.setUTCHours(0);
today.setUTCMinutes(0);
today.setUTCSeconds(0);
today.setUTCMilliseconds(0);
today = today.getTime();

// surveiDokumens = [
//     {
//         id: 0,
//         jenis_survei: 'A',
//         kegiatan: 'Nissan Leaf',
//         tanggal_mulai: today - 1 * day,
//         tanggal_akhir: today - 1 * day,
//         banyak_dokumen: 1,
//         dokumen_bersih: 2,
//         dokumen_salah: 3,
//         pic_kode: 'A',
//         persentase_selesai: 1,
//         deals: [
//             {
//                 start: today - 1 * day,
//                 end: today + 2 * day
//             },
//             {
//                 start: today - 3 * day,
//                 end: today - 2 * day
//             },
//             {
//                 start: today + 5 * day,
//                 end: today + 6 * day
//             }
//         ]
//     },
//     {
//         id: 0,
//         jenis_survei: 'B',
//         kegiatan: 'Jaguar E-type',
//         tanggal_mulai: today - 1 * day,
//         tanggal_akhir: today - 1 * day,
//         banyak_dokumen: 2,
//         dokumen_bersih: 3,
//         dokumen_salah: 4,
//         pic_kode: 'B',
//         persentase_selesai: 2,
//         deals: [
//             {
//                 start: today - 2 * day,
//                 end: today + 1 * day
//             },
//             {
//                 start: today - 2 * day,
//                 end: today + 1 * day
//             },
//             {
//                 start: today + 2 * day,
//                 end: today + 6 * day
//             }
//         ]
//     },
// ];
// console.log(surveiDokumens);

$.ajax({
    async: false,
    cache: false,
    url: $('#container').attr('data-url'),
    success: function(response) {
        surveiDokumens = response.data;
        // console.log(surveiDokumens);
    },
});

// Parse surveiDokumen data into series.
series = surveiDokumens.map(function (surveiDokumen, i) {
    var data = surveiDokumen.deals.map(function (deal) {
        return {
            id: 'deal-' + i,
            start: deal.start,
            end: deal.end,
            y: i
        };
    });
    return {
        id: surveiDokumen.deals[surveiDokumen.id],
        kegiatan: surveiDokumen.kegiatan,
        tanggal_mulai: surveiDokumen.tanggal_mulai,
        tanggal_akhir: surveiDokumen.tanggal_akhir,
        banyak_dokumen: surveiDokumen.banyak_dokumen,
        dokumen_bersih: surveiDokumen.dokumen_bersih,
        dokumen_salah: surveiDokumen.dokumen_salah,
        pic_kode: surveiDokumen.pic_kode,
        persentase_selesai: surveiDokumen.persentase_selesai,
        data: data
    };
});

Highcharts.ganttChart('container', {
    series: series,
    title: {
        text: 'Survei Dokumen'
    },
    tooltip: {
        pointFormat: '<span>From: {point.start:%e. %b}</span><br/><span>To: {point.end:%e. %b}</span>'
    },
    xAxis: {
        currentDateIndicator: true
    },
    yAxis: {
        type: 'category',
        grid: {
            columns: [
                {
                    title: {
                        text: 'Kegiatan'
                    },
                    categories: map(series, function (s) {
                        return s.kegiatan;
                    })
                },
                {
                    title: {
                        text: 'Tanggal Mulai'
                    },
                    categories: map(series, function (s) {
                        return dateFormat('%d-%m-%y', s.tanggal_mulai);
                    })
                },
                {
                    title: {
                        text: 'Tanggal Akhir'
                    },
                    categories: map(series, function (s) {
                        return dateFormat('%d-%m-%y', s.tanggal_akhir);
                    })
                },
                {
                    title: {
                        text: 'Dokumen Salah'
                    },
                    categories: map(series, function (s) {
                        return s.dokumen_salah;
                    })
                },
                {
                    title: {
                        text: 'Dokumen Bersih'
                    },
                    categories: map(series, function (s) {
                        return s.dokumen_bersih;
                    })
                },
                {
                    title: {
                        text: 'PIC'
                    },
                    categories: map(series, function (s) {
                        return s.pic_kode;
                    })
                },
                {
                    title: {
                        text: 'Persentase Selesai'
                    },
                    categories: map(series, function (s) {
                        return s.persentase_selesai + '%';
                    })
                }
            ]
        }
    },
    navigator: {
        enabled: true,
        series: {
            type: 'gantt',
            pointPlacement: 0.5,
            pointPadding: 0.25
        },
        yAxis: {
            min: 0,
            max: 3,
            reversed: true,
            categories: []
        }
    },
    rangeSelector: {
        enabled: true,
        selected: 0
    },
    scrollbar: {
        enabled: true
    },
});
