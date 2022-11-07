import {
  onGetTasks,
  saveTask,
  deleteTask,
  getTask,
  updateTask,
} from "../../database/firebase.js";

const taskForm = document.getElementById("task-form");
const tasksContainer = document.getElementById("tasks-container");

let editStatus = false;
let id = "";

window.addEventListener("DOMContentLoaded", async (e) => {
  // const querySnapshot = await getTasks();
  // querySnapshot.forEach((doc) => {
  //   console.log(doc.data());
  // });

  onGetTasks((querySnapshot) => {
    tasksContainer.innerHTML = "";

    querySnapshot.forEach((doc) => {
      const task = doc.data();

      tasksContainer.innerHTML += `
		<div class="award-winning-hotel">
		<h1> lista de Recervaciones</h1>
		<div class="book-section2">
			<th>
				<tl style="margin-left: 5px; margin-right:10px; font-size:25px;">llegada a Hotel<br /> ${task.llegada}
				</tl>
				<tl style="margin-left: 0px; margin-right:10px; font-size:25px;">Salida del Hotel <br /> ${task.partida}
				</tl>
				<tl style="margin-left: 0px; margin-right:10px; font-size:25px;">Numero de Habitación <br />
					${task.number}</tl>
				<tl style="margin-left: 0px; margin-right:10px; font-size:25px;">Tipo de Habitación <br /> ${task.habitacion}
				</tl>
				<tl style="margin-left: 0px; margin-right:10px; font-size:25px;">Numero de Adultos <br /> ${task.adultos}
				</tl>
				<tl style="margin-left: 0px; margin-right:10px; font-size:25px;">Numero de Niños <br /> ${task.ninos}
				</tl>
			</th>
		</div>
	</div>
		<button class="btn btn-primary btn-delete" data-id="${doc.id}">
		  🗑 Delete
		</button>
		<button class="btn btn-secondary btn-edit" data-id="${doc.id}">
		  🖉 Edit
		</button>
	  </div>
	</div>`;
    });

    const btnsDelete = tasksContainer.querySelectorAll(".btn-delete");
    btnsDelete.forEach((btn) =>
      btn.addEventListener("click", async ({ target: { dataset } }) => {
        try {
          await deleteTask(dataset.id);
        } catch (error) {
          console.log(error);
        }
      })
    );

    const btnsEdit = tasksContainer.querySelectorAll(".btn-edit");
    btnsEdit.forEach((btn) => {
      btn.addEventListener("click", async (e) => {
        try {
          const doc = await getTask(e.target.dataset.id);
          const task = doc.data();

          taskForm["llegada"].value = task.llegada;
          taskForm["partida"].value = task.partida;
          taskForm["habitacion"].value = task.habitacion;
          taskForm["tipo"].value = task.tipo;
          taskForm["adultos"].value = task.adultos;
          taskForm["ninos"].value = task.ninos;

          editStatus = true;
          id = doc.id;
          taskForm["btn-task-form"].innerText = "Update";
        } catch (error) {
          console.log(error);
        }
      });
    });
  });
});

taskForm.addEventListener("submit", async (e) => {
  e.preventDefault();

  const llegada = taskForm["llegada"];
  const partida = taskForm["partida"];
  const habitacion = taskForm["habitacion"];
  const tipo = taskForm["tipo"];
  const adultos = taskForm["adultos"];
  const ninos = taskForm["ninos"];

  try {
    if (!editStatus) {
      await saveTask(
        habitacion.value,
        llegada.value,
        partida.value,
        tipo.value,
        adultos.value,
        ninos.value
      );
    } else {
      await updateTask(id, {
        title: title.value,
        description: description.value,
        habitacion: habitacion.value,
        llegada: llegada.value,
        partida: partida.value,
        tipo: tipo.value,
        adultos: adultos.value,
        ninos: ninos.value,
      });

      editStatus = false;
      id = "";
      taskForm["btn-task-form"].innerText = "Save";
    }

    taskForm.reset();
    title.focus();
  } catch (error) {
    console.log(error);
  }
});
