$(document).ready(function () {
    // Function to display tasks in the table (can be called initially and after adding a new task)
    function displayTasks() {
        $.ajax({
            url: "get_tasks.php",
            method: "POST",
            dataType: "json",
            success: function (data) {
                console.log("Data received:", data);
                $("#tbody").empty();
                for (var i = 0; i < data.length; i++) {
                    console.log("Task:", add);
                    var add = data[i];
                    var rowHtml = `
                    <tr>
                        <td>${add.id}</td>
                        <td>${add.task_name}</td>
                        <td>${add.time}</td>
                        <td>
                        <button class="btn btn-sm btn-danger update-btn" data-id="${add.id}">Update</button>
                        </td>
                        <td>
                        <button class="btn btn-sm btn-danger delete-task-btn" data-id="${add.id}">Delete</button>

                        </td>
                    </tr>`;
                    $("#tbody").append(rowHtml);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("Error retrieving tasks:", errorThrown);
            }
        });
    }

    displayTasks();

    // Handle form submission for adding a new task
    $('form').submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addTask.php',
            data: $(this).serialize(),
            success: function (response) {
                alert(response);
                displayTasks();
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $(document).ready(function () {
        // Handle delete button click
        $('#tbody').on('click', '.delete-task-btn', function () {
            var taskId = $(this).data('id');

            $.ajax({
                type: 'POST',
                url: 'deleteTask.php',
                data: { id: taskId },
                success: function (response) {
                    alert(response);
                    displayTasks();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });

    $(document).ready(function () {
        // Handle update button click
        $('#tbody').on('click', '.update-btn', function () {
            var taskId = $(this).data('id');
            var existingTaskName = $(this).closest('tr').find('td:nth-child(2)').text();
            var existingTime = $(this).closest('tr').find('td:nth-child(3)').text();

            $('#updateForm').find('#updateTaskName').val(existingTaskName);
            $('#updateForm').find('#updateTime').val(existingTime);
            $('#updateForm').data('taskId', taskId).show();
        });

        // Handle form submission for updating a task
        $('#updateForm').submit(function (e) {
            e.preventDefault();

            var taskId = $(this).data('taskId');
            var updatedTaskName = $('#updateTaskName').val();
            var updatedTime = $('#updateTime').val();

            $.ajax({
                type: 'POST',
                url: 'updateTask.php',
                data: {
                    id: taskId,
                    task_name: updatedTaskName,
                    time: updatedTime
                },
                success: function (response) {
                    console.log(response); 
                    $('#updateForm').hide();
                    displayTasks();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });

});
