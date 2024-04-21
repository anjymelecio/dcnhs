<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @include('partials.css')
</head>
<body>

  @include('partials.navbar')
  


  <div class="wrapper">
    


    


     

@include('partials.maincontent')
      
   <div class="row widgets">
         <div class="col-md-3 widgets-item">
         <h4 class="navbar-brand text-uppercase widgets-title">
          Total Students
         </h4>

         <span class="widgets-count ">
         {{$totalStudents}}
         </span>
         </div>

         <div class="col-md-3 widgets-item">
          <h4 class="navbar-brand text-uppercase widgets-title">
          Total Teachers
         </h4>

         <span class="widgets-count ">
        {{$totalTeachers}}
         
         </div>
         <div class="col-md-3 widgets-item">
          <h4 class="navbar-brand text-uppercase widgets-title">
          Parents
         </h4>

         <span class="widgets-count ">
        {{$totalParents}}
         </div>
         <div class="col-md-3 widgets-item">
          <h4 class="navbar-brand text-uppercase widgets-title">
          Resigned Teachers
         </h4>

         <span class="widgets-count ">
         {{$resignedTeachers}}
         
         </div>
     </div> 


     
       
        <div id="piechart" style="width: 900px; height: 500px; margin-left: 128px; "></div>
      
 
    



    
    </div>
  </div>
    
 @include('partials.script')


</script>
</body>
</html>
<script>

  
</script>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
     ['Gender', 'Count'],
     ['Male', {{ $studentMale }}],
     ['Female', {{ $studentFemale }}]
    ]);

    var options = {
      title: 'Student Composition',
      backgroundColor: '#f5f5f5',
      chartArea: { left: '70%', top: '30%', width: '100%', height: '100%' }, // add comma here
      slices: {
        0: {color: 'blue'},   
        1: {color: '#eb2f7f'}    
      }
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
  }
</script>

