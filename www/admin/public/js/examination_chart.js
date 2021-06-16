var firstChart,nflChart,mdChart,psdChart;

// Chart
Highcharts.chart('container', {

    title: {
        text: 'Intraocular Pressure'
    },

    subtitle: {
        text: ''
    },

    yAxis: {
        title: {
            text: ''
        },
    },

    xAxis: {
        categories: firstChart[2]['categories']
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
    series: firstChart,

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
    },

    xAxis: {
        categories: nflChart[2]['categories']
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
    series:nflChart,

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
    },

    xAxis: {
        categories: mdChart[2]['categories']
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
    series:mdChart,

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
    },

    xAxis: {
        categories: psdChart[2]['categories']
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
    series:psdChart,

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