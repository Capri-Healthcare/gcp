var firstChart,nflChart,mdChart,psdChart,categories;


// Chart
var chartFirstChart = Highcharts.chart('container', {
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
        categories:categories
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

chartFirstChart.setSize(0, 300, false);


// NFL CHART

var chartnfl = Highcharts.chart('nfl-chart-container', {

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
        categories:categories
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

chartnfl.setSize(0, 300, false);

// MD CHART

var chartMD = Highcharts.chart('md-chart-container', {

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
        categories:categories
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

chartMD.setSize(0, 300, false);

// PSD CHART

var chartPSD = Highcharts.chart('psd-chart-container', {

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
        categories:categories
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

chartPSD.setSize(0, 300, false);