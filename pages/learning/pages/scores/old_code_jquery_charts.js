var options = {
                    animationEnabled: true,
                    backgroundColor: null,
                    title: {
                        text: "GPAT",
                        fontColor: "#eec378",
                        fontFamily: "arial",


                    },
                    axisY: {
                        title: "GPAT",
                        suffix: "",
                        gridColor: "gray",
                        fontColor: "white",
                        tickColor: "white",
                        lineThickness: 1,
                        lineColor: "white",
                        titleFontColor: "white",
                        labelFontColor: "white",




                    },
                    axisX: {
                        title: "Scores",
                        gridColor: "gray",
                        fontColor: "white",
                        tickColor: "white",
                        lineThickness: 1,
                        lineColor: "white",
                        titleFontColor: "white",
                        labelFontColor: "white",





                    },
                    data: [{
                        type: "column",
                        yValueFormatString: "#,##0.0#" % "",
                        dataPoints: [{
                                label: "Proficiency",
                                y: 10.09
                            },
                            {
                                label: "Difficulty",
                                y: 9.40
                            },
                            {
                                label: "Fraction",
                                y: 8.50
                            },


                        ]
                    }]
                };
                $("#chartContainer").CanvasJSChart(options);

                //code for jquery charts