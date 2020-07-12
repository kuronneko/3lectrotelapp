var chart1, options;   //variables globales para almacenar los datos que llegan desde la base de datos
$(document).ready(function(){ //funcion para representar los graficos estadisticos que corresponden a las labores
$("#dateLabor").change(function(){ 
    var dateLabor = $(this).val();
        $.ajax({
    url:"controller/ajaxEstadisticasController.php",
    type:"POST",
    dataType:"json",
    data:{dateLabor:dateLabor},
    success:function(data){
        options.series[0].data = data;
        chart1 = new Highcharts.Chart(options);
        console.log(data);
    }
    })
  tortaLabores(); //funcion de highcharts para formatear la información recopilada desde la base de datos a traves de determinada consulta SQL
});
});

$(document).ready(function(){ //funcion para representar los graficos estadisticos que corresponden a los items
$("#dateItem").change(function(){ 
    var dateItem = $(this).val();

        $.ajax({
    url:"controller/ajaxEstadisticasController.php",
    type:"POST",
    dataType:"json",
    data:{dateItem:dateItem},
    success:function(data){
        options.series[0].data = data;
        chart1 = new Highcharts.Chart(options);
        console.log(data);
    }
    })
  tortaItems(); //funcion de highcharts para formatear la información recopilada desde la base de datos a traves de determinada consulta SQL
});
});

$(document).ready(function(){ //funcion para representar los graficos estadisticos que corresponden a las localizaciones
$("#dateLocalizacion").change(function(){ 
    var dateLocalizacion = $(this).val();

        $.ajax({
    url:"controller/ajaxEstadisticasController.php",
    type:"POST",
    dataType:"json",
    data:{dateLocalizacion:dateLocalizacion},
    success:function(data){
        options.series[0].data = data;
        chart1 = new Highcharts.Chart(options);
        console.log(data);
    }
    })
  tortaLocalizacion(); //funcion de highcharts para formatear la información recopilada desde la base de datos a traves de determinada consulta SQL
});
});


//var chart1, options;
$(document).ready(function(){  //funcion de jquery para recopilar el total de items de la base de datos a través de SQL
$("#btnBD").click(function(){
	var btnBD = $(this).attr("id");
	//$("#modal-1").modal('show');

		$.ajax({
		url:"controller/ajaxEstadisticasController.php",
		type:"POST",
		dataType:"json",
		data:{btnBD:btnBD},
		success:function(data){
    		options.series[0].data = data;
    		chart1 = new Highcharts.Chart(options);
    		console.log(data);
		}
		})
	datosItems();           //funcion de highcharts para formatear la información recopilada desde la base de datos
});
});

$(document).ready(function(){     // funcion de jquery para recopilar la información total de las labores a traves de SQL
$("#btnBDLabores").click(function(){
	var btnBDLabores = $(this).attr("id");
	//$("#modal-1").modal('show');

		$.ajax({
		url:"controller/ajaxEstadisticasController.php",
		type:"POST",
		dataType:"json",
		data:{btnBDLabores:btnBDLabores},
		success:function(data){
    		options.series[0].data = data;
    		chart1 = new Highcharts.Chart(options);
    		console.log(data);
		}
		})

	datosLabores();    //funcion highcharts para formatear la información recopilada desde la base de datos
});
});

$(document).ready(function(){   //   funcion de jquery para recopilar la información total de las localizaciones a traves de SQL
$("#btnBDlocalizaciones").click(function(){
  var btnBDlocalizaciones = $(this).attr("id");
  //$("#modal-1").modal('show');

    $.ajax({
    url:"controller/ajaxEstadisticasController.php",
    type:"POST",
    dataType:"json",
    data:{btnBDlocalizaciones:btnBDlocalizaciones},
    success:function(data){
        options.series[0].data = data;
        chart1 = new Highcharts.Chart(options);
        console.log(data);
    }
    })

  datosLocalizaciones();    //funcion highcharts para formatear la información recopilada desde la base de datos
});
});


$(document).ready(function(){   //   funcion de jquery para recopilar la información total de las localizaciones a traves de SQL
$("#datePrecios").change(function(){
  var datePrecios = $(this).val();
  //$("#modal-1").modal('show');

    $.ajax({
    url:"controller/ajaxEstadisticasController.php",
    type:"POST",
    dataType:"json",
    data:{datePrecios:datePrecios},
    success:function(data){
        options.series[0].data = data;
        chart1 = new Highcharts.Chart(options);
        console.log(data);
    }
    })

  precios();    //funcion highcharts para formatear la información recopilada desde la base de datos
});
});

$(document).ready(function(){
$("#btnColumnas").click(function(){
  columnas();
});
});

$(document).ready(function(){
$("#btnLineas").click(function(){
  lineas();
});
});

$(document).ready(function(){
$("#btnTorta").click(function(){
  $("#modal-1").modal('show');
  torta();
});
});

$(document).ready(function(){
$("#btnPruebas").click(function(){
	//$(".modal-header").css("background-color, white");
	//$(".modal-header").css("color, black");
	//$(".modal-header").text("Gráfico de pruebas");
	$("#modal-1").modal('show');
	prueba();
});
});


function precios(){
  
  //var v_modal = $("#modal-1").modal({show:false});

  options = {
       chart:{
           renderTo: 'contenedor',
           type: 'column'
       },
       title:{
           text: 'Gastos realizados en los últimos reportes'
       },
       xAxis:{
           type: 'category'
       },
       yAxis:{
        title:{
          text: 'Total Gastos'
        }
       },
       plotOptions: {
           series:{
            borderWidth:1,
            dataLabels:{
              enabled:true,
              format:'{point.y:0f}'
            }
           }
       },
       tooltip:{
        headerFormat:"<span style='font-size:11px'>{series.name}</span><br>",
        pointFormat: "<span style='color:{point.color}'>{point.name}</span>:<b>{point.y:.0f}</b>"
       },
       series:[{
           name:'Items',
           colorByPoint:true,
           data:[],
       }]
  }

  //v_modal.on("shown", function(){});
  //v_modal.modal("show");
}

function datosLabores(){
	
  //var v_modal = $("#modal-1").modal({show:false});

  options = {
  	   chart:{
  	   	   renderTo: 'contenedor',
  	   	   type: 'column'
  	   },
  	   title:{
  	   	   text: 'Labores especificadas en los últimos reportes (total)'
  	   },
  	   xAxis:{
  	   	   type: 'category'
  	   },
  	   yAxis:{
  	   	title:{
  	   		text: 'Cantidad'
  	   	}
  	   },
  	   plotOptions: {
  	   	   series:{
  	   	   	borderWidth:1,
  	   	   	dataLabels:{
  	   	   		enabled:true,
  	   	   		format:'{point.y:0f}'
  	   	   	}
  	   	   }
  	   },
  	   tooltip:{
  	   	headerFormat:"<span style='font-size:11px'>{series.name}</span><br>",
  	   	pointFormat: "<span style='color:{point.color}'>{point.name}</span>:<b>{point.y:.0f}</b>"
  	   },
  	   series:[{
  	   	   name:'Labores',
  	   	   colorByPoint:true,
  	   	   data:[],
  	   }]
  }

  //v_modal.on("shown", function(){});
  //v_modal.modal("show");
}

function datosLocalizaciones(){
  
  //var v_modal = $("#modal-1").modal({show:false});

  options = {
       chart:{
           renderTo: 'contenedor',
           type: 'column'
       },
       title:{
           text: 'Localizaciones especificadas en los últimos reportes (total)'
       },
       xAxis:{
           type: 'category'
       },
       yAxis:{
        title:{
          text: 'Cantidad'
        }
       },
       plotOptions: {
           series:{
            borderWidth:1,
            dataLabels:{
              enabled:true,
              format:'{point.y:0f}'
            }
           }
       },
       tooltip:{
        headerFormat:"<span style='font-size:11px'>{series.name}</span><br>",
        pointFormat: "<span style='color:{point.color}'>{point.name}</span>:<b>{point.y:.0f}</b>"
       },
       series:[{
           name:'Localizaciones',
           colorByPoint:true,
           data:[],
       }]
  }

  //v_modal.on("shown", function(){});
  //v_modal.modal("show");
}

function datosItems(){
	
  //var v_modal = $("#modal-1").modal({show:false});

  options = {
  	   chart:{
  	   	   renderTo: 'contenedor',
  	   	   type: 'column'
  	   },
  	   title:{
  	   	   text: 'Items especificados en los últimos reportes (total)'
  	   },
  	   xAxis:{
  	   	   type: 'category'
  	   },
  	   yAxis:{
  	   	title:{
  	   		text: 'Cantidad'
  	   	}
  	   },
  	   plotOptions: {
  	   	   series:{
  	   	   	borderWidth:1,
  	   	   	dataLabels:{
  	   	   		enabled:true,
  	   	   		format:'{point.y:0f}'
  	   	   	}
  	   	   }
  	   },
  	   tooltip:{
  	   	headerFormat:"<span style='font-size:11px'>{series.name}</span><br>",
  	   	pointFormat: "<span style='color:{point.color}'>{point.name}</span>:<b>{point.y:.0f}</b>"
  	   },
  	   series:[{
  	   	   name:'Items',
  	   	   colorByPoint:true,
  	   	   data:[],
  	   }]
  }

  //v_modal.on("shown", function(){});
  //v_modal.modal("show");
}


function tortaLabores(){
  
   options = {
             chart:{
            renderTo: 'contenedor',
             type:'pie',
             plotBackgroundColor: '#f8f9fa', //color de fondo del grafico
             plotBorderwidth: 1,
             plotShadow:false
             },
             title:{
              text:'Labores especificadas en los últimos reportes'
             },
             tooltip:{
              pointFormat:'<b>{series.name}:</b>{point.percentage:.2f}%',
             },
             plotOptions:{
              pie:{
                allowPointSelect:true,
                cursor:'pointer',
                dataLabels:{
                  enabled:true,
                  format: '<b>{point.name}:</b>{point.percentage:.2f}%'

                }
              }
             },
             series:[{
              name:'Labores',
              colorByPoint: true,
              data:[],
             }]
  }


}

function tortaItems(){
  
   options = {
             chart:{
            renderTo: 'contenedor',
             type:'pie',
             plotBackgroundColor: '#f8f9fa', //color de fondo del grafico
             plotBorderwidth: 1,
             plotShadow:false
             },
             title:{
              text:'Items especificados en los últimos reportes'
             },
             tooltip:{
              pointFormat:'<b>{series.name}:</b>{point.percentage:.2f}%',
             },
             plotOptions:{
              pie:{
                allowPointSelect:true,
                cursor:'pointer',
                dataLabels:{
                  enabled:true,
                  format: '<b>{point.name}:</b>{point.percentage:.2f}%'

                }
              }
             },
             series:[{
              name:'Items',
              colorByPoint: true,
              data:[],
             }]
  }


}


function tortaLocalizacion(){
  
   options = {
             chart:{
            renderTo: 'contenedor',
             type:'pie',
             plotBackgroundColor: '#f8f9fa', //color de fondo del grafico
             plotBorderwidth: 1,
             plotShadow:false
             },
             title:{
              text:'Localizaciones especificadas en los últimos reportes'
             },
             tooltip:{
              pointFormat:'<b>{series.name}:</b>{point.percentage:.2f}%',
             },
             plotOptions:{
              pie:{
                allowPointSelect:true,
                cursor:'pointer',
                dataLabels:{
                  enabled:true,
                  format: '<b>{point.name}:</b>{point.percentage:.2f}%'

                }
              }
             },
             series:[{
              name:'Localizaciones',
              colorByPoint: true,
              data:[],
             }]
  }


}


function torta(){
	Highcharts.chart('contenedor-modal', {
             chart:{
             type:'pie',
             plotBackgroundColor: '#f8f9fa', //color de fondo del grafico
             plotBorderwidth: 1,
             plotShadow:false
             },
             title:{
             	text:'Navegadores web. Participación en el mercado, Enero 2018'
             },
             tooltip:{
             	pointFormat:'<b>{series.name}:</b>{point.percentage:.2f}%',
             },
             plotOptions:{
             	pie:{
             		allowPointSelect:true,
             		cursor:'pointer',
             		dataLabels:{
             			enabled:true,
             			format: '<b>{point.name}:</b>{point.percentage:.2f}%'

             		}
             	}
             },
             series:[{
             	name:'Marcas',
             	colorByPoint: true,
             	data:[{
             		name:'Chrome',
             		y:61.41,
             		//sliced:true
             		//selected:true

             	},{
             			name:'IE',
             		y:11.84,
             	},{
             			name:'Edge',
             		y:4.67,
             	},{
             			name:'Safari',
             		y:4.18,
             	},{
             			name:'Sogou Explorer',
             		y:1.64,
             	},{
             			name:'Opera',
             		y:1.6,
             	},{
             			name:'Otros',
             		y:3.81,
             	}]
             }]
	});
}


function lineas(){
	Highcharts.chart('contenedor', {
          chart:{
          	  type:'line'
          },
              title:{
              	 text:'Crecimiento del empleo por area'
              },
              xAxis:{
              	allowDecimals:false
              },
              yAxis:{
              	title:{
              		text:'Numero de empleados'
              	}
              },
              legend:{
              	layout:'vertical',
              	align:'right',
              	verticalAlign:'middle'

              },
              plotOptions:{
              	series:{
              		pointStart:2010
              	}
              },
              series:[{
              	name:'Instalación',
              	data:[1000,2000,3000,3500]
              },{
              	name:'Fabricación',
              	data:[1880,2580,3900,4000]
              },{
              	name:'Ventas',
              	data:[780,2000,3100,3700]
              }],

	});
}


function columnas(){
 Highcharts.chart('contenedor' , {
       chart:{
       	type: 'column'
       },
       title:{
       	   text:'Gráficos de columnas con profundidad'
       },
       xAxis:{
       	    type:'category'
       },
       yAxis:{
       	   title:{
       	   	   text:'Cantidad de modelos por marca'
       	   },
       },
       series:[{
       	name:'Moviles',
       	colorByPoint:true,
       	data:[{
       		name:'Samsung',
       		y:5,  //cantidad de modelos
       		drilldown:'Samsung'
       	},{
       		name:'Xiaomi',
       		y:6,
       		drilldown:'Xiaomi'
       	},{
       		name:'Motorola',
       		y:4,
       		drilldown:'Motorola'
       	}]
       }],
       drilldown:{
       	series:[{
       		id:'Samsung',
       		data:[
              ['Samsung Galaxy S10', 4],
              ['Samsung Galaxy S10+', 2],
              ['Samsung Note 9', 1],
              ['Samsung J7 Prime', 2],
              ['Samsung A10', 1]
       		]
       	},{
       		id:'Xiaomi',
       		data:[
       		  ['Xiaomi MI1', 4],
              ['Xiaomi MI2', 6],
              ['Xiaomi MI3', 7],
              ['Xiaomi MI4', 1],
              ['Xiaomi MI5', 10],
              ['Xiaomi MI6', 5]
       		]
       	},{
       		id:'Motorola',
       		data:[
      		  ['Moto G3', 4],
              ['Moto G4', 2],
              ['Moto G5', 3],
              ['Moto G6', 6]
       		]
       	}]
       }
 });
}

function prueba(){
	//1era forma
	/*
Highcharts.chart('contenedor-modal', {
chart:{
	type: 'line'
},
   title:{
   	text: 'Valores mensaules'
   },
   xAxis:{
   	  categories:['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
   },
   series:[{
   	  data: [1,2,100,4,5,6,2,8,9,10,11,12]
   }],
});
*/

//2da forma
/*
Highcharts.chart('contenedor-modal', {
xAxis:{
	minPadding:0.05,
	maxPadding:0.05
},
    series:[{
    	data:[
             [0,29.9],
             [1, 71.5],
             [3, 106.4]
    	]
    }]
});
*/

//3ra forma
Highcharts.chart('contenedor-modal', {
chart: {
	type:'column'
   }, 
     xAxis:{
     	categories: ['Rojo', 'Verde', 'Negro']
     },
     series:[{
     	data:[{
     		 name:'Color 1',
     		 color: '#ff0031',
     		 y:1
     	},
         {
         			 name:'Color 2',
     		 color: '#28a745',
     		 y:3
     		},
     		{
     					 name:'Color 3',
     		 color: 'black',
     		 y:5
     		}]
     }]

});



}
