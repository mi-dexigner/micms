<?php include("Common.php"); ?>
<?php include("CheckAdminLogin.php"); ?>
<?php 
// if (!file_exists('assets/ordersdocuments/1')) {
    // mkdir('assets/ordersdocuments/1', 0755, true);
// }

$Today=date("Y-m-d");
$d=strtotime("-1 Days");		
$Yesterday=date("Y-m-d", $d);
$d=strtotime("-2 Days");		
$days2Date=date("Y-m-d", $d);
$days2Day=date("l", $d);
$d=strtotime("-3 Days");		
$days3Date=date("Y-m-d", $d);
$days3Day=date("l", $d);
$d=strtotime("-4 Days");		
$days4Date=date("Y-m-d", $d);
$days4Day=date("l", $d);
$d=strtotime("-5 Days");		
$days5Date=date("Y-m-d", $d);
$days5Day=date("l", $d);
$d=strtotime("-6 Days");		
$days6Date=date("Y-m-d", $d);
$days6Day=date("l", $d);
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- jVectorMap -->
    <link href="css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        
		<?php include_once("Sidebar.php"); ?>
		
		
		<?php include_once("Header.php"); ?>

       

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
		  
			<!-- top tiles -->
			  <div class="row tile_count">
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				  <span class="count_top"><i class="fa fa-envelope"></i> Total Feedbacks</span>
				  <div class="count dark"><?php echo total_feedbacks(1,0,0,0,0,0,$_SESSION["UserID"]); ?></div>
				  <span class="count_bottom"><?php echo total_feedbacks_history(1,0,0,0,0,0,$_SESSION["UserID"]); ?> From last Week</span>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				  <span class="count_top"><i class="fa fa-male"></i> Male Feedbacks</span>
				  <div class="count green"><?php echo total_feedbacks(0,1,0,0,0,0,$_SESSION["UserID"]); ?></div>
				  <span class="count_bottom"><?php echo total_feedbacks_history(0,1,0,0,0,0,$_SESSION["UserID"]); ?> From last Week</span>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				  <span class="count_top"><i class="fa fa-female"></i> Female Feedbacks</span>
				  <div class="count green"><?php echo total_feedbacks(0,0,1,0,0,0,$_SESSION["UserID"]); ?></div>
				  <span class="count_bottom"><?php echo total_feedbacks_history(0,0,1,0,0,0,$_SESSION["UserID"]); ?> From last Week</span>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				  <span class="count_top"><i class="fa fa-bar-chart"></i> Below 20 Age Feedbacks</span>
				  <div class="count"><?php echo total_feedbacks(0,0,0,1,0,0,$_SESSION["UserID"]); ?></div>
				  <span class="count_bottom"><?php echo total_feedbacks_history(0,0,0,1,0,0,$_SESSION["UserID"]); ?> From last Week</span>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				  <span class="count_top"><i class="fa fa-bar-chart"></i> Above 20 Age Feedbacks</span>
				  <div class="count"><?php echo total_feedbacks(0,0,0,0,1,0,$_SESSION["UserID"]); ?></div>
				  <span class="count_bottom"><?php echo total_feedbacks_history(0,0,0,0,1,0,$_SESSION["UserID"]); ?> From last Week</span>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				  <span class="count_top"><i class="fa fa-bar-chart"></i> Above 40 Age Feedbacks</span>
				  <div class="count"><?php echo total_feedbacks(0,0,0,0,0,1,$_SESSION["UserID"]); ?></div>
				  <span class="count_bottom"><?php echo total_feedbacks_history(0,0,0,0,0,1,$_SESSION["UserID"]); ?> From last Week</span>
				</div>
			  </div>
			<!-- /top tiles -->

            <div class="row">
				
				
			  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Feedback Statistics</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="echart_line" style="height:350px;"></div>

                  </div>
                </div>
              </div>
			
             <!-- <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bar Graph</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="mainb" style="height:350px;"></div>

                  </div>
                </div>
              </div>

              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Mini Pie</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="echart_mini_pie" style="height:350px;"></div>

                  </div>
                </div>
              </div>


              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pie Graph</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="echart_pie" style="height:350px;"></div>

                  </div>
                </div>
              </div>

              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pie Area</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="echart_pie2" style="height:350px;"></div>

                  </div>
                </div>
              </div>

              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Donut Graph</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="echart_donut" style="height:350px;"></div>

                  </div>
                </div>
              </div>


              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Scatter Graph</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="echart_scatter" style="height:350px;"></div>

                  </div>
                </div>
              </div>

              

              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Horizontal Bar</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="echart_bar_horizontal" style="height:370px;"></div>

                  </div>
                </div>
              </div>

              <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>World Map</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="echart_world_map" style="height:370px;"></div>

                  </div>
                </div>
              </div>


              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pyramid</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="echart_pyramid" style="height:370px;"></div>

                  </div>
                </div>
              </div>

              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Sonar</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="echart_sonar" style="height:370px;"></div>

                  </div>
                </div>
              </div>


              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Guage</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="echart_guage" style="height:370px;"></div>
                  </div>
                </div>
              </div>-->
            </div>
          </div>
        </div>
        <!-- /page content -->

		<?php include_once("Footer.php"); ?>
        
      </div>
    </div>

   <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- ECharts -->
    <script src="vendors/echarts/dist/echarts.min.js"></script>
    <script src="vendors/echarts/map/js/world.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

    <script>
      var theme = {
          color: [
              '#26B99A', '#34495E', '#BDC3C7', '#c7bc06',
              '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
          ],

          title: {
              itemGap: 8,
              textStyle: {
                  fontWeight: 'normal',
                  color: '#408829'
              }
          },

          dataRange: {
              color: ['#1f610a', '#97b58d']
          },

          toolbox: {
              color: ['#408829', '#408829', '#408829', '#408829']
          },

          tooltip: {
              backgroundColor: 'rgba(0,0,0,0.5)',
              axisPointer: {
                  type: 'line',
                  lineStyle: {
                      color: '#408829',
                      type: 'dashed'
                  },
                  crossStyle: {
                      color: '#408829'
                  },
                  shadowStyle: {
                      color: 'rgba(200,200,200,0.3)'
                  }
              }
          },

          dataZoom: {
              dataBackgroundColor: '#eee',
              fillerColor: 'rgba(64,136,41,0.2)',
              handleColor: '#408829'
          },
          grid: {
              borderWidth: 0
          },

          categoryAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },

          valueAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitArea: {
                  show: true,
                  areaStyle: {
                      color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },
          timeline: {
              lineStyle: {
                  color: '#408829'
              },
              controlStyle: {
                  normal: {color: '#408829'},
                  emphasis: {color: '#408829'}
              }
          },

          k: {
              itemStyle: {
                  normal: {
                      color: '#68a54a',
                      color0: '#a9cba2',
                      lineStyle: {
                          width: 1,
                          color: '#408829',
                          color0: '#86b379'
                      }
                  }
              }
          },
          map: {
              itemStyle: {
                  normal: {
                      areaStyle: {
                          color: '#ddd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  },
                  emphasis: {
                      areaStyle: {
                          color: '#99d2dd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  }
              }
          },
          force: {
              itemStyle: {
                  normal: {
                      linkStyle: {
                          strokeColor: '#408829'
                      }
                  }
              }
          },
          chord: {
              padding: 4,
              itemStyle: {
                  normal: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  },
                  emphasis: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  }
              }
          },
          gauge: {
              startAngle: 225,
              endAngle: -45,
              axisLine: {
                  show: true,
                  lineStyle: {
                      color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                      width: 8
                  }
              },
              axisTick: {
                  splitNumber: 10,
                  length: 12,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              axisLabel: {
                  textStyle: {
                      color: 'auto'
                  }
              },
              splitLine: {
                  length: 18,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              pointer: {
                  length: '90%',
                  color: 'auto'
              },
              title: {
                  textStyle: {
                      color: '#333'
                  }
              },
              detail: {
                  textStyle: {
                      color: 'auto'
                  }
              }
          },
          textStyle: {
              fontFamily: 'Arial, Verdana, sans-serif'
          }
      };


      var echartLine = echarts.init(document.getElementById('echart_line'), theme);

      echartLine.setOption({
        title: {
          text: 'Weekly Feedbacks Graph',
          subtext: 'For Every Criteria'
        },
        tooltip: {
          trigger: 'axis'
        },
        legend: {
          x: 200,
          y: 40,
          data: ['Total Feedbacks', 'Male', 'Female', 'Below 20 Age', '21 to 40 Age', 'Above 40 Age']
        },
        toolbox: {
          show: true,
          feature: {
            magicType: {
              show: true,
              title: {
                line: 'Line',
                bar: 'Bar',
                stack: 'Stack',
                tiled: 'Tiled'
              },
              type: ['line', 'bar', 'stack', 'tiled']
            },
            restore: {
              show: true,
              title: "Restore"
            },
            saveAsImage: {
              show: true,
              title: "Save Image"
            }
          }
        },
        calculable: true,
        xAxis: [{
          type: 'category',
          boundaryGap: false,
          data: ['<?php echo $days6Day ?>', '<?php echo $days5Day ?>', '<?php echo $days4Day ?>', '<?php echo $days3Day ?>', '<?php echo $days2Day ?>', 'Yesterday', 'Today']
        }],
        yAxis: [{
          type: 'value'
        }],
        series: [{
          name: 'Total Feedbacks',
          type: 'line',
          smooth: true,
          itemStyle: {
            normal: {
              areaStyle: {
                type: 'default'
              }
            }
          },
          data: [<?php echo total_feedbacks_by_date(1,0,0,0,0,0,$_SESSION["UserID"],$days6Date); ?>, <?php echo total_feedbacks_by_date(1,0,0,0,0,0,$_SESSION["UserID"],$days5Date); ?>, <?php echo total_feedbacks_by_date(1,0,0,0,0,0,$_SESSION["UserID"],$days4Date); ?>, <?php echo total_feedbacks_by_date(1,0,0,0,0,0,$_SESSION["UserID"],$days3Date); ?>, <?php echo total_feedbacks_by_date(1,0,0,0,0,0,$_SESSION["UserID"],$days2Date); ?>, <?php echo total_feedbacks_by_date(1,0,0,0,0,0,$_SESSION["UserID"],$Yesterday); ?>, <?php echo total_feedbacks_by_date(1,0,0,0,0,0,$_SESSION["UserID"],$Today); ?>]
        }, {
          name: 'Male',
          type: 'line',
          smooth: true,
          itemStyle: {
            normal: {
              areaStyle: {
                type: 'default'
              }
            }
          },
          data: [<?php echo total_feedbacks_by_date(0,1,0,0,0,0,$_SESSION["UserID"],$days6Date); ?>, <?php echo total_feedbacks_by_date(0,1,0,0,0,0,$_SESSION["UserID"],$days5Date); ?>, <?php echo total_feedbacks_by_date(0,1,0,0,0,0,$_SESSION["UserID"],$days4Date); ?>, <?php echo total_feedbacks_by_date(0,1,0,0,0,0,$_SESSION["UserID"],$days3Date); ?>, <?php echo total_feedbacks_by_date(0,1,0,0,0,0,$_SESSION["UserID"],$days2Date); ?>, <?php echo total_feedbacks_by_date(0,1,0,0,0,0,$_SESSION["UserID"],$Yesterday); ?>, <?php echo total_feedbacks_by_date(0,1,0,0,0,0,$_SESSION["UserID"],$Today); ?>]
        }, {
          name: 'Female',
          type: 'line',
          smooth: true,
          itemStyle: {
            normal: {
              areaStyle: {
                type: 'default'
              }
            }
          },
          data: [<?php echo total_feedbacks_by_date(0,0,1,0,0,0,$_SESSION["UserID"],$days6Date); ?>, <?php echo total_feedbacks_by_date(0,0,1,0,0,0,$_SESSION["UserID"],$days5Date); ?>, <?php echo total_feedbacks_by_date(0,0,1,0,0,0,$_SESSION["UserID"],$days4Date); ?>, <?php echo total_feedbacks_by_date(0,0,1,0,0,0,$_SESSION["UserID"],$days3Date); ?>, <?php echo total_feedbacks_by_date(0,0,1,0,0,0,$_SESSION["UserID"],$days2Date); ?>, <?php echo total_feedbacks_by_date(0,0,1,0,0,0,$_SESSION["UserID"],$Yesterday); ?>, <?php echo total_feedbacks_by_date(0,0,1,0,0,0,$_SESSION["UserID"],$Today); ?>]
        }, {
          name: 'Below 20 Age',
          type: 'line',
          smooth: true,
          itemStyle: {
            normal: {
              areaStyle: {
                type: 'default'
              }
            }
          },
          data: [<?php echo total_feedbacks_by_date(0,0,0,1,0,0,$_SESSION["UserID"],$days6Date); ?>, <?php echo total_feedbacks_by_date(0,0,0,1,0,0,$_SESSION["UserID"],$days5Date); ?>, <?php echo total_feedbacks_by_date(0,0,0,1,0,0,$_SESSION["UserID"],$days4Date); ?>, <?php echo total_feedbacks_by_date(0,0,0,1,0,0,$_SESSION["UserID"],$days3Date); ?>, <?php echo total_feedbacks_by_date(0,0,0,1,0,0,$_SESSION["UserID"],$days2Date); ?>, <?php echo total_feedbacks_by_date(0,0,0,1,0,0,$_SESSION["UserID"],$Yesterday); ?>, <?php echo total_feedbacks_by_date(0,0,0,1,0,0,$_SESSION["UserID"],$Today); ?>]
        }, {
          name: '21 to 40 Age',
          type: 'line',
          smooth: true,
          itemStyle: {
            normal: {
              areaStyle: {
                type: 'default'
              }
            }
          },
          data: [<?php echo total_feedbacks_by_date(0,0,0,0,1,0,$_SESSION["UserID"],$days6Date); ?>, <?php echo total_feedbacks_by_date(0,0,0,0,1,0,$_SESSION["UserID"],$days5Date); ?>, <?php echo total_feedbacks_by_date(0,0,0,0,1,0,$_SESSION["UserID"],$days4Date); ?>, <?php echo total_feedbacks_by_date(0,0,0,0,1,0,$_SESSION["UserID"],$days3Date); ?>, <?php echo total_feedbacks_by_date(0,0,0,0,1,0,$_SESSION["UserID"],$days2Date); ?>, <?php echo total_feedbacks_by_date(0,0,0,0,1,0,$_SESSION["UserID"],$Yesterday); ?>, <?php echo total_feedbacks_by_date(0,0,0,0,1,0,$_SESSION["UserID"],$Today); ?>]
        }, {
          name: 'Above 40 Age',
          type: 'line',
          smooth: true,
          itemStyle: {
            normal: {
              areaStyle: {
                type: 'default'
              }
            }
          },
          data: [<?php echo total_feedbacks_by_date(0,0,0,0,0,1,$_SESSION["UserID"],$days6Date); ?>, <?php echo total_feedbacks_by_date(0,0,0,0,0,1,$_SESSION["UserID"],$days5Date); ?>, <?php echo total_feedbacks_by_date(0,0,0,0,0,1,$_SESSION["UserID"],$days4Date); ?>, <?php echo total_feedbacks_by_date(0,0,0,0,0,1,$_SESSION["UserID"],$days3Date); ?>, <?php echo total_feedbacks_by_date(0,0,0,0,0,1,$_SESSION["UserID"],$days2Date); ?>, <?php echo total_feedbacks_by_date(0,0,0,0,0,1,$_SESSION["UserID"],$Yesterday); ?>, <?php echo total_feedbacks_by_date(0,0,0,0,0,1,$_SESSION["UserID"],$Today); ?>]
        }]
      });

     


      var dataStyle = {
        normal: {
          label: {
            show: false
          },
          labelLine: {
            show: false
          }
        }
      };

      var placeHolderStyle = {
        normal: {
          color: 'rgba(0,0,0,0)',
          label: {
            show: false
          },
          labelLine: {
            show: false
          }
        },
        emphasis: {
          color: 'rgba(0,0,0,0)'
        }
      };

      var echartMiniPie = echarts.init(document.getElementById('echart_mini_pie'), theme);

      echartMiniPie .setOption({
        title: {
          text: 'Chart #2',
          subtext: 'From ExcelHome',
          sublink: 'http://e.weibo.com/1341556070/AhQXtjbqh',
          x: 'center',
          y: 'center',
          itemGap: 20,
          textStyle: {
            color: 'rgba(30,144,255,0.8)',
            fontFamily: '微软雅黑',
            fontSize: 35,
            fontWeight: 'bolder'
          }
        },
        tooltip: {
          show: true,
          formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
          orient: 'vertical',
          x: 170,
          y: 45,
          itemGap: 12,
          data: ['68%Something #1', '29%Something #2', '3%Something #3'],
        },
        toolbox: {
          show: true,
          feature: {
            mark: {
              show: true
            },
            dataView: {
              show: true,
              title: "Text View",
              lang: [
                "Text View",
                "Close",
                "Refresh",
              ],
              readOnly: false
            },
            restore: {
              show: true,
              title: "Restore"
            },
            saveAsImage: {
              show: true,
              title: "Save Image"
            }
          }
        },
        series: [{
          name: '1',
          type: 'pie',
          clockWise: false,
          radius: [105, 130],
          itemStyle: dataStyle,
          data: [{
            value: 68,
            name: '68%Something #1'
          }, {
            value: 32,
            name: 'invisible',
            itemStyle: placeHolderStyle
          }]
        }, {
          name: '2',
          type: 'pie',
          clockWise: false,
          radius: [80, 105],
          itemStyle: dataStyle,
          data: [{
            value: 29,
            name: '29%Something #2'
          }, {
            value: 71,
            name: 'invisible',
            itemStyle: placeHolderStyle
          }]
        }, {
          name: '3',
          type: 'pie',
          clockWise: false,
          radius: [25, 80],
          itemStyle: dataStyle,
          data: [{
            value: 3,
            name: '3%Something #3'
          }, {
            value: 97,
            name: 'invisible',
            itemStyle: placeHolderStyle
          }]
        }]
      });

      var echartMap = echarts.init(document.getElementById('echart_world_map'), theme);
      
      echartMap.setOption({
        title: {
          text: 'World Population (2010)',
          subtext: 'from United Nations, Total population, both sexes combined, as of 1 July (thousands)',
          x: 'center',
          y: 'top'
        },
        tooltip: {
          trigger: 'item',
          formatter: function(params) {
            var value = (params.value + '').split('.');
            value = value[0].replace(/(\d{1,3})(?=(?:\d{3})+(?!\d))/g, '$1,') + '.' + value[1];
            return params.seriesName + '<br/>' + params.name + ' : ' + value;
          }
        },
        toolbox: {
          show: true,
          orient: 'vertical',
          x: 'right',
          y: 'center',
          feature: {
            mark: {
              show: true
            },
            dataView: {
              show: true,
              title: "Text View",
              lang: [
                "Text View",
                "Close",
                "Refresh",
              ],
              readOnly: false
            },
            restore: {
              show: true,
              title: "Restore"
            },
            saveAsImage: {
              show: true,
              title: "Save Image"
            }
          }
        },
        dataRange: {
          min: 0,
          max: 1000000,
          text: ['High', 'Low'],
          realtime: false,
          calculable: true,
          color: ['#087E65', '#26B99A', '#CBEAE3']
        },
        series: [{
          name: 'World Population (2010)',
          type: 'map',
          mapType: 'world',
          roam: false,
          mapLocation: {
            y: 60
          },
          itemStyle: {
            emphasis: {
              label: {
                show: true
              }
            }
          },
          data: [{
            name: 'Afghanistan',
            value: 28397.812
          }, {
            name: 'Angola',
            value: 19549.124
          }, {
            name: 'Albania',
            value: 3150.143
          }, {
            name: 'United Arab Emirates',
            value: 8441.537
          }, {
            name: 'Argentina',
            value: 40374.224
          }, {
            name: 'Armenia',
            value: 2963.496
          }, {
            name: 'French Southern and Antarctic Lands',
            value: 268.065
          }, {
            name: 'Australia',
            value: 22404.488
          }, {
            name: 'Austria',
            value: 8401.924
          }, {
            name: 'Azerbaijan',
            value: 9094.718
          }, {
            name: 'Burundi',
            value: 9232.753
          }, {
            name: 'Belgium',
            value: 10941.288
          }, {
            name: 'Benin',
            value: 9509.798
          }, {
            name: 'Burkina Faso',
            value: 15540.284
          }, {
            name: 'Bangladesh',
            value: 151125.475
          }, {
            name: 'Bulgaria',
            value: 7389.175
          }, {
            name: 'The Bahamas',
            value: 66402.316
          }, {
            name: 'Bosnia and Herzegovina',
            value: 3845.929
          }, {
            name: 'Belarus',
            value: 9491.07
          }, {
            name: 'Belize',
            value: 308.595
          }, {
            name: 'Bermuda',
            value: 64.951
          }, {
            name: 'Bolivia',
            value: 716.939
          }, {
            name: 'Brazil',
            value: 195210.154
          }, {
            name: 'Brunei',
            value: 27.223
          }, {
            name: 'Bhutan',
            value: 716.939
          }, {
            name: 'Botswana',
            value: 1969.341
          }, {
            name: 'Central African Republic',
            value: 4349.921
          }, {
            name: 'Canada',
            value: 34126.24
          }, {
            name: 'Switzerland',
            value: 7830.534
          }, {
            name: 'Chile',
            value: 17150.76
          }, {
            name: 'China',
            value: 1359821.465
          }, {
            name: 'Ivory Coast',
            value: 60508.978
          }, {
            name: 'Cameroon',
            value: 20624.343
          }, {
            name: 'Democratic Republic of the Congo',
            value: 62191.161
          }, {
            name: 'Republic of the Congo',
            value: 3573.024
          }, {
            name: 'Colombia',
            value: 46444.798
          }, {
            name: 'Costa Rica',
            value: 4669.685
          }, {
            name: 'Cuba',
            value: 11281.768
          }, {
            name: 'Northern Cyprus',
            value: 1.468
          }, {
            name: 'Cyprus',
            value: 1103.685
          }, {
            name: 'Czech Republic',
            value: 10553.701
          }, {
            name: 'Germany',
            value: 83017.404
          }, {
            name: 'Djibouti',
            value: 834.036
          }, {
            name: 'Denmark',
            value: 5550.959
          }, {
            name: 'Dominican Republic',
            value: 10016.797
          }, {
            name: 'Algeria',
            value: 37062.82
          }, {
            name: 'Ecuador',
            value: 15001.072
          }, {
            name: 'Egypt',
            value: 78075.705
          }, {
            name: 'Eritrea',
            value: 5741.159
          }, {
            name: 'Spain',
            value: 46182.038
          }, {
            name: 'Estonia',
            value: 1298.533
          }, {
            name: 'Ethiopia',
            value: 87095.281
          }, {
            name: 'Finland',
            value: 5367.693
          }, {
            name: 'Fiji',
            value: 860.559
          }, {
            name: 'Falkland Islands',
            value: 49.581
          }, {
            name: 'France',
            value: 63230.866
          }, {
            name: 'Gabon',
            value: 1556.222
          }, {
            name: 'United Kingdom',
            value: 62066.35
          }, {
            name: 'Georgia',
            value: 4388.674
          }, {
            name: 'Ghana',
            value: 24262.901
          }, {
            name: 'Guinea',
            value: 10876.033
          }, {
            name: 'Gambia',
            value: 1680.64
          }, {
            name: 'Guinea Bissau',
            value: 10876.033
          }, {
            name: 'Equatorial Guinea',
            value: 696.167
          }, {
            name: 'Greece',
            value: 11109.999
          }, {
            name: 'Greenland',
            value: 56.546
          }, {
            name: 'Guatemala',
            value: 14341.576
          }, {
            name: 'French Guiana',
            value: 231.169
          }, {
            name: 'Guyana',
            value: 786.126
          }, {
            name: 'Honduras',
            value: 7621.204
          }, {
            name: 'Croatia',
            value: 4338.027
          }, {
            name: 'Haiti',
            value: 9896.4
          }, {
            name: 'Hungary',
            value: 10014.633
          }, {
            name: 'Indonesia',
            value: 240676.485
          }, {
            name: 'India',
            value: 1205624.648
          }, {
            name: 'Ireland',
            value: 4467.561
          }, {
            name: 'Iran',
            value: 240676.485
          }, {
            name: 'Iraq',
            value: 30962.38
          }, {
            name: 'Iceland',
            value: 318.042
          }, {
            name: 'Israel',
            value: 7420.368
          }, {
            name: 'Italy',
            value: 60508.978
          }, {
            name: 'Jamaica',
            value: 2741.485
          }, {
            name: 'Jordan',
            value: 6454.554
          }, {
            name: 'Japan',
            value: 127352.833
          }, {
            name: 'Kazakhstan',
            value: 15921.127
          }, {
            name: 'Kenya',
            value: 40909.194
          }, {
            name: 'Kyrgyzstan',
            value: 5334.223
          }, {
            name: 'Cambodia',
            value: 14364.931
          }, {
            name: 'South Korea',
            value: 51452.352
          }, {
            name: 'Kosovo',
            value: 97.743
          }, {
            name: 'Kuwait',
            value: 2991.58
          }, {
            name: 'Laos',
            value: 6395.713
          }, {
            name: 'Lebanon',
            value: 4341.092
          }, {
            name: 'Liberia',
            value: 3957.99
          }, {
            name: 'Libya',
            value: 6040.612
          }, {
            name: 'Sri Lanka',
            value: 20758.779
          }, {
            name: 'Lesotho',
            value: 2008.921
          }, {
            name: 'Lithuania',
            value: 3068.457
          }, {
            name: 'Luxembourg',
            value: 507.885
          }, {
            name: 'Latvia',
            value: 2090.519
          }, {
            name: 'Morocco',
            value: 31642.36
          }, {
            name: 'Moldova',
            value: 103.619
          }, {
            name: 'Madagascar',
            value: 21079.532
          }, {
            name: 'Mexico',
            value: 117886.404
          }, {
            name: 'Macedonia',
            value: 507.885
          }, {
            name: 'Mali',
            value: 13985.961
          }, {
            name: 'Myanmar',
            value: 51931.231
          }, {
            name: 'Montenegro',
            value: 620.078
          }, {
            name: 'Mongolia',
            value: 2712.738
          }, {
            name: 'Mozambique',
            value: 23967.265
          }, {
            name: 'Mauritania',
            value: 3609.42
          }, {
            name: 'Malawi',
            value: 15013.694
          }, {
            name: 'Malaysia',
            value: 28275.835
          }, {
            name: 'Namibia',
            value: 2178.967
          }, {
            name: 'New Caledonia',
            value: 246.379
          }, {
            name: 'Niger',
            value: 15893.746
          }, {
            name: 'Nigeria',
            value: 159707.78
          }, {
            name: 'Nicaragua',
            value: 5822.209
          }, {
            name: 'Netherlands',
            value: 16615.243
          }, {
            name: 'Norway',
            value: 4891.251
          }, {
            name: 'Nepal',
            value: 26846.016
          }, {
            name: 'New Zealand',
            value: 4368.136
          }, {
            name: 'Oman',
            value: 2802.768
          }, {
            name: 'Pakistan',
            value: 173149.306
          }, {
            name: 'Panama',
            value: 3678.128
          }, {
            name: 'Peru',
            value: 29262.83
          }, {
            name: 'Philippines',
            value: 93444.322
          }, {
            name: 'Papua New Guinea',
            value: 6858.945
          }, {
            name: 'Poland',
            value: 38198.754
          }, {
            name: 'Puerto Rico',
            value: 3709.671
          }, {
            name: 'North Korea',
            value: 1.468
          }, {
            name: 'Portugal',
            value: 10589.792
          }, {
            name: 'Paraguay',
            value: 6459.721
          }, {
            name: 'Qatar',
            value: 1749.713
          }, {
            name: 'Romania',
            value: 21861.476
          }, {
            name: 'Russia',
            value: 21861.476
          }, {
            name: 'Rwanda',
            value: 10836.732
          }, {
            name: 'Western Sahara',
            value: 514.648
          }, {
            name: 'Saudi Arabia',
            value: 27258.387
          }, {
            name: 'Sudan',
            value: 35652.002
          }, {
            name: 'South Sudan',
            value: 9940.929
          }, {
            name: 'Senegal',
            value: 12950.564
          }, {
            name: 'Solomon Islands',
            value: 526.447
          }, {
            name: 'Sierra Leone',
            value: 5751.976
          }, {
            name: 'El Salvador',
            value: 6218.195
          }, {
            name: 'Somaliland',
            value: 9636.173
          }, {
            name: 'Somalia',
            value: 9636.173
          }, {
            name: 'Republic of Serbia',
            value: 3573.024
          }, {
            name: 'Suriname',
            value: 524.96
          }, {
            name: 'Slovakia',
            value: 5433.437
          }, {
            name: 'Slovenia',
            value: 2054.232
          }, {
            name: 'Sweden',
            value: 9382.297
          }, {
            name: 'Swaziland',
            value: 1193.148
          }, {
            name: 'Syria',
            value: 7830.534
          }, {
            name: 'Chad',
            value: 11720.781
          }, {
            name: 'Togo',
            value: 6306.014
          }, {
            name: 'Thailand',
            value: 66402.316
          }, {
            name: 'Tajikistan',
            value: 7627.326
          }, {
            name: 'Turkmenistan',
            value: 5041.995
          }, {
            name: 'East Timor',
            value: 10016.797
          }, {
            name: 'Trinidad and Tobago',
            value: 1328.095
          }, {
            name: 'Tunisia',
            value: 10631.83
          }, {
            name: 'Turkey',
            value: 72137.546
          }, {
            name: 'United Republic of Tanzania',
            value: 44973.33
          }, {
            name: 'Uganda',
            value: 33987.213
          }, {
            name: 'Ukraine',
            value: 46050.22
          }, {
            name: 'Uruguay',
            value: 3371.982
          }, {
            name: 'United States of America',
            value: 312247.116
          }, {
            name: 'Uzbekistan',
            value: 27769.27
          }, {
            name: 'Venezuela',
            value: 236.299
          }, {
            name: 'Vietnam',
            value: 89047.397
          }, {
            name: 'Vanuatu',
            value: 236.299
          }, {
            name: 'West Bank',
            value: 13.565
          }, {
            name: 'Yemen',
            value: 22763.008
          }, {
            name: 'South Africa',
            value: 51452.352
          }, {
            name: 'Zambia',
            value: 13216.985
          }, {
            name: 'Zimbabwe',
            value: 13076.978
          }]
        }]
      });
    </script>
  </body>
</html>