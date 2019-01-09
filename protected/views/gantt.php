

public function actionGantt()
{
  $this->render('gantt');
}

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/dojotool/dojo/resources/dojo.css" /> // memanggil css pada library dojo
<link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/dojotool/dojox/gantt/resources/gantt.css"> // memanggil css pada library gantt chart
<?php 
Yii::app()->getClientScript()->registerCoreScript('jquery'); 
 $cs=Yii::app()->getClientScript();
 $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/dojotool/dojo/dojo.js');  // mendefinisikan library dojo agar dapat kita pakai fungsi-fungsinya
?>
<script type="text/javascript">
  dojo.require("dojo.parser");  // memanggil fungsi dojo.parser
  dojo.require("dojox.gantt.GanttChart"); // memanggil fungsi dojo.gantt.GanttChart
  dojo.addOnLoad(function(){  // menjalankan fungsi ketika load halaman
     var projectDev = new dojox.gantt.GanttProjectItem({
       id: 1,
       name: "Development Project",
       startDate: new Date(2006, 5, 11)
     });  // membuat sebuah project

     var taskRequirement = new dojox.gantt.GanttTaskItem({
        id: 1,
        name: "Requirement",
        startTime: new Date(2006, 5, 11),
        duration: 50,
        percentage: 50,
        taskOwner: "Jack"
     });  // membuat sebuah task baru yang akan masuk di dalam gantt chart
     var taskAnalysis = new dojox.gantt.GanttTaskItem({
        id: 2,
        name: "Analysis",
        startTime: new Date(2006, 5, 18),
        duration: 40,
        percentage: 80,
        previousTaskId: "1",
        taskOwner: "Michael"
     });
     var taskDesign = new dojox.gantt.GanttTaskItem({
        id: 3,
        name: "Design",
        startTime: new Date(2006, 5, 18),
        duration: 60,
        percentage: 80,
        previousTaskId: "1",
        taskOwner: "Jason"
     });
     var taskDetailDesign = new dojox.gantt.GanttTaskItem({
        id: 4,
        name: "Detail design",
        startTime: new Date(2006, 5, 18),
        duration: 30,
        percentage: 50,
        previousTaskId: "1",
        taskOwner: "Michael"
     });
     var taskDevelopmentDoc = new dojox.gantt.GanttTaskItem({
        id: 5,
        name: "Development doc",
        startTime: new Date(2006, 5, 20),
        duration: 20,
        percentage: 10,
        previousTaskId: "1",
        taskOwner: "Rock;Jack"
     });

    projectDev.addTask(taskRequirement);  // task-task yang sudah dimasukkan di input ke dalam project
    projectDev.addTask(taskAnalysis);
    projectDev.addTask(taskDesign);
    projectDev.addTask(taskDetailDesign);
    projectDev.addTask(taskDevelopmentDoc);

   var ganttChart = new dojox.gantt.GanttChart({
       height: 400,
       withResource: false
   }, "gantt");  // memanggil fungsi gantt chart dan menampilkannya di sebuah tag html yang memiliki id="gantt"
   ganttChart.addProject(projectDev); // memasukkan sebuah project ke dalam gantt chart yang telah kita buat
   ganttChart.init();

 });
</script>
<body class="claro">
   <div class="ganttContent">
     <div id="gantt"></div>
  </div>
</body>