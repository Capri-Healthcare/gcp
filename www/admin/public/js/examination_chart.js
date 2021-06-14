// Chart
Highcharts.chart('container', {

    title: {
        text: ''
    },

    subtitle: {
        text: ''
    },

    yAxis: {
        title: {
            text: ''
        },
        categories: ['0', '5', '10', '15', '20', '25', '30'],
    },

    xAxis: {
        categories: ['1', '2', '3', '4', '5']
    },

    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 0,
            pointEnd: 5
        }
    },
    colors: ['#ff0000', '#00A4EF'],
    series: [{
        name: 'RE',
        data: [1, 2, 3, 4, 5]
    }, {
        name: 'LE',
        data: [2, 3, 3, 4, 5]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500,
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});

// NFL CHART

Highcharts.chart('nfl-chart-container', {

    title: {
        text: 'NFL Thickness'
    },

    subtitle: {
        text: ''
    },

    yAxis: {
        title: {
            text: ''
        },
        categories: ['0', '20', '40', '60', '80', '100', '120'],
    },

    xAxis: {
        categories: ['1', '2', '3', '4', '5']
    },

    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 0,
            pointEnd: 5
        }
    },
    colors: ['#ff0000', '#00A4EF'],
    series: [{
        name: 'RE - NFL',
        data: [1, 2, 3, 4, 5]
    }, {
        name: 'LE - NFL',
        data: [2, 3, 3, 4, 5]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500,
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});

// MD CHART

Highcharts.chart('md-chart-container', {

    title: {
        text: 'Mean Deviation'
    },

    subtitle: {
        text: ''
    },

    yAxis: {
        title: {
            text: ''
        },
        categories: ['-5', '-4', '-3', '-2', '-1','0'],
    },

    xAxis: {
        categories: ['1', '2', '3', '4', '5']
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 0,
            pointEnd: 5
        }
    },
    colors: ['#ff0000', '#00A4EF'],
    series: [{
        name: 'RE - MD',
        data: [1, 2, 3, 4, 5]
    }, {
        name: 'LE - MD',
        data: [2, 3, 3, 4, 5]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500,
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});

// PSD CHART

Highcharts.chart('psd-chart-container', {

    title: {
        text: 'PSD Deviation'
    },

    subtitle: {
        text: ''
    },

    yAxis: {
        title: {
            text: ''
        },
        categories: ['0', '0.5', '1', '1.5', '2','2.5','3','3.5','4'],
    },

    xAxis: {
        categories: ['1', '2', '3', '4', '5']
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 0,
            pointEnd: 5
        }
    },
    colors: ['#ff0000', '#00A4EF'],
    series: [{
        name: 'RE - PSD',
        data: [1, 2, 3, 4, 5]
    }, {
        name: 'LE - PSD',
        data: [2, 3, 3, 4, 5]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500,
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});