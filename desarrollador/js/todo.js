 // Función para agregar una nueva tarea
 function addTask() {
    var taskInput = document.getElementById("taskInput");

    // Obtener la lista de tareas almacenada en localStorage
    var tasks = JSON.parse(localStorage.getItem("tasks")) || [];

    // Agregar la nueva tarea a la lista
    var newTask = taskInput.value.trim();
    if (newTask !== "") {
        tasks.push(newTask);
        localStorage.setItem("tasks", JSON.stringify(tasks));

        // Actualizar la visualización de la lista de tareas
        renderTasks();
    }

    // Limpiar el campo de entrada
    taskInput.value = "";
}

// Función para eliminar una tarea
function deleteTask(index) {
    // Obtener la lista de tareas almacenada en localStorage
    var tasks = JSON.parse(localStorage.getItem("tasks")) || [];

    // Eliminar la tarea en la posición index
    tasks.splice(index, 1);

    // Actualizar la información en localStorage
    localStorage.setItem("tasks", JSON.stringify(tasks));

    // Actualizar la visualización de la lista de tareas
    renderTasks();
}

// Función para renderizar las tareas en la lista
function renderTasks() {
    var taskList = document.getElementById("taskList");

    // Limpiar la lista antes de renderizar
    taskList.innerHTML = "";

    // Obtener la lista de tareas almacenada en localStorage
    var tasks = JSON.parse(localStorage.getItem("tasks")) || [];

    tasks.forEach(function(task, index) {
// Crear un div para contener el texto y el botón
var listItemContainer = document.createElement("div");
listItemContainer.classList.add("d-flex", "justify-content-between", "align-items-center");

// Crear el elemento de lista (li) para el texto
var li = document.createElement("li");
li.textContent = task;
li.classList.add("form-control");

// Crear el botón de borrar
var deleteButton = document.createElement("button");
deleteButton.textContent = "X";
deleteButton.classList.add("btn",  "btn-primary", "todo-list-add-btn", "text-white");
deleteButton.onclick = function() {
    deleteTask(index);
};

// Agregar el elemento de lista y el botón al contenedor
listItemContainer.appendChild(li);
listItemContainer.appendChild(deleteButton);

// Agregar el contenedor al taskList
taskList.appendChild(listItemContainer);
});
}

// Renderizar las tareas al cargar la página
renderTasks();