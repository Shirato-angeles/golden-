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
	  <h1> Recervaciones <span>Activas</span> </h1>
	  <div class="book-section2">
		  <table>
			  <tr>
				  <th style="color:#035b5b; font-size: 28px;">Llegada al Hotel</th>
				  <th style="color:#035b5b; font-size: 28px; ">Salida del Hotel</th>
				  <th style="color:#035b5b; font-size: 28px; ">Habitacion</th>
				  <th style="color:#035b5b; font-size: 28px; ">Numero de Habitación</th>
				  <th style="color:#035b5b; font-size: 28px; ">tipo de Habitación</th>
				  <th style="color:#035b5b; font-size: 28px; ">Adultos</th>
				  <th style="color:#035b5b; font-size: 28px; ">Niños</th>
			  </tr>
			  <tr>
				  <td></td>
				  <td></td>
				  <td></td>
				  <td></td>
				  <td></td>
				  <td></td>
				  <td></td>
			  </tr>
			  <tr>
				  <td></td>
				  <td></td>
				  <td></td>
				  <td></td>
				  <td></td>
				  <td></td>
				  <td></td>
			  </tr>
			  <tr style=" margin-top: 10px;">
				  <td style="color:#d3d2d2; font-size: 24px;  margin-top: 10px;"> ${task.llegada}</td>
				  <td style="color:#d3d2d2; font-size: 24px; margin-left: 10px; "> ${task.partida}</td>
				  <td style="color:#d3d2d2; font-size: 24px; margin-left: 10px; "> ${task.habitacion}</td>
				  <td style="color:#d3d2d2; font-size: 24px;  margin-left: 10px;"> ${task.habitacion}</td>
				  <td style="color:#d3d2d2; font-size: 24px;  margin-left: 10px;"> ${task.tipo}</td>
				  <td style="color:#d3d2d2; font-size: 24px;  margin-left: 10px;"> ${task.adultos}</td>
				  <td style="color:#d3d2d2; font-size: 24px; margin-left: 10px;"> ${task.ninos}</td>

			  </tr>
		  </table>
		  <div class="book-btn">
			  <button style=" padding: 1.1rem ;
							  margin-right: 290px;
							  margin-top: 40px;
							  margin-bottom: -30;
							  border-radius:23px;
							  background: transparent;
							  color:rgb(202, 199, 199);
							  font-weight:bold; font-size:
							  24px; border: none;
							  cursor: pointer;" data-id="${doc.id}">
				  🗑 Eliminar Recervaciones
			  </button>
		  </div>
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
