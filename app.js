$(document).ready(function() {
  console.log("hello world");
  $("#task-result").hide();
  fetchTasks();
  let edit = false;

  $("#search").keyup(function(e) {
    if ($("#search").val()) {
      let search = $("#search").val();
      $.ajax({
        url: "task-search.php",
        type: "POST",
        data: { search },
        success: function(response) {
          let tasks = JSON.parse(response);
          console.log(response);
          let template = "";

          tasks.forEach(task => {
            template += `<li>
               ${task.nombre}
            </li>`;
          });

          $("#container").html(template);
          $("#task-result").show();
        }
      });
    }
  });

  $("#task-form").submit(function(e) {
    //console.log("submiting");
    const postData = {
      nombre: $("#nombre").val(),
      descripcion: $("#descripcion").val(),
      id: $("#task-id").val()
    };

    let url = edit === false ? "task-add.php" : "task-edit.php";
    //console.log(url);
    //e.preventDefault();
    $.post(url, postData, function(response) {
      //console.log(response);
      fetchTasks();
      $("#task-form").trigger("reset");
    });
    e.preventDefault();
  });

  function fetchTasks() {
    $.ajax({
      url: "task-list.php",
      type: "GET",
      success: function(response) {
        let tasks = JSON.parse(response);
        //console.log(response);

        let template = "";
        tasks.forEach(task => {
          template += `   <tr taskId = "${task.id}">
                                <td>${task.id}</td>
                                <td><a href="#" class="task-item">${task.nombre}</a></td>
                                <td>${task.descripcion}</td>
                                <td>
                                    <button class=" task-delete btn btn-danger">Eleminar
                                    </button>
                                </td>
                                </tr>`;
        });
        $("#tasks").html(template);
      }
    });
  }

  $(document).on("click", ".task-delete", function() {
    //console.log("clicked");
    if (confirm("estas seguro de eliminar ?")) {
      let element = $(this)[0].parentElement.parentElement;
      let id = $(element).attr("taskId");
      //console.log($id);
      $.post("task-delete.php", { id }, function(response) {
        //console.log(response);
        fetchTasks();
      });
    }
  });

  $(document).on("click", ".task-item", function() {
    //console.log("editing");
    let element = $(this)[0].parentElement.parentElement;
    let id = $(element).attr("taskId");
    //console.log(id);
    $.post("task-single.php", { id }, function(response) {
      //console.log(response);

      const task = JSON.parse(response);
      //console.log(task);
      $("#nombre").val(task.nombre);
      $("#descripcion").val(task.descripcion);
      $("#task-id").val(task.id);
      edit = true;
      console.log(edit);
      //fetchTasks();
    });
  });
});
